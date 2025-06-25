 // PDF.js Configuration
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdn.jsdelivr.net/npm/pdfjs-dist@2.7.570/build/pdf.worker.min.js';

    // Global Variables
    let pdfDoc = null;
    let pageNum = 1;
    let totalPages = 0;
    let pageRendering = false;
    let pageNumPending = null;
    let sessionStartTime = new Date();
    let totalReadingSeconds = 0;
    let sessionInterval;
    
    // got from database table
    const bookKey = `{{ $book->book_title }}_{{ $book->author_name }}`.replace(/[^a-zA-Z0-9]/g, '_');
    const canvas = document.getElementById('pdf-canvas');
    const ctx = canvas.getContext('2d');
    const pdfUrl = "{{ asset($book->file_path) }}";

    // Initialize PDF and Progress Tracking
    // i want this to load from database table
    document.addEventListener('DOMContentLoaded', function() {
      loadPDF(); 
      loadProgress();
    });

    // Load PDF Document
    function loadPDF() {
      pdfjsLib.getDocument(pdfUrl).promise.then(function(pdf) {
        pdfDoc = pdf;
        totalPages = pdf.numPages;
        
        // Load saved page or start from page 1
        const saved = JSON.parse(localStorage.getItem(`${bookKey}_progress`) || '{}');
        if (saved.currentPage) {
          pageNum = saved.currentPage;
        }
        
        document.getElementById('loadingOverlay').style.display = 'none';
        renderPage(pageNum);
        updateProgress();
        
        console.log(`PDF loaded: ${totalPages} pages`);
      }).catch(function(error) {
        console.error('Error loading PDF:', error);
        document.getElementById('loadingOverlay').innerHTML = 'Error loading PDF. Please refresh the page.';
      });
    }

    // Render PDF Page
    function renderPage(num) {
      pageRendering = true;
      
      pdfDoc.getPage(num).then(function(page) {
        const viewport = page.getViewport({ scale: 1.5 });
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        const renderContext = {
          canvasContext: ctx,
          viewport: viewport
        };

        const renderTask = page.render(renderContext);
        renderTask.promise.then(function() {
          pageRendering = false;
          if (pageNumPending !== null) {
            renderPage(pageNumPending);
            pageNumPending = null;
          }
        });
      });

      // Update UI
      pageNum = num;
      updateProgress();
      updatePageInfo();
    }

    // Queue Page Rendering
    function queueRenderPage(num) {
      if (pageRendering) {
        pageNumPending = num;
      } else {
        renderPage(num);
      }
    }

    // Update Page Information
    function updatePageInfo() {
      document.getElementById('pageInfo').textContent = `Page ${pageNum} of ${totalPages}`;
      document.getElementById('prevBtn').disabled = (pageNum <= 1);
      document.getElementById('nextBtn').disabled = (pageNum >= totalPages);
    }

    // Update Progress Display
    function updateProgress() {
      if (totalPages > 0) {
        const percentage = Math.round((pageNum / totalPages) * 100);
        document.getElementById('progressFill').style.width = percentage + '%';
        document.getElementById('progressPercentage').textContent = percentage + '%';
        document.getElementById('currentPageStat').textContent = pageNum;
        document.getElementById('totalPagesStat').textContent = totalPages;
        document.getElementById('remainingPagesStat').textContent = Math.max(0, totalPages - pageNum);
        document.getElementById('currentPageInput').value = pageNum;
      }
    }

    // Load Progress from Storage
    function loadProgress() {
      const saved = JSON.parse(localStorage.getItem(`${bookKey}_progress`) || '{}');
      if (saved.currentPage) {
        totalReadingSeconds = saved.totalReadingSeconds || 0;
        
        if (saved.lastUpdated) {
          document.getElementById('lastUpdated').textContent = 
            new Date(saved.lastUpdated).toLocaleDateString();
        }
      }
    }

    // Save Progress to Storage
    function saveProgress() {
      const sessionSeconds = Math.floor((new Date() - sessionStartTime) / 1000);
      const newTotalSeconds = totalReadingSeconds + sessionSeconds;
      
      const progress = {
        currentPage: pageNum,
        totalPages: totalPages,
        totalReadingSeconds: newTotalSeconds,
        lastUpdated: new Date().toISOString()
      };
      
      localStorage.setItem(`${bookKey}_progress`, JSON.stringify(progress));
      
      // Update display
      totalReadingSeconds = newTotalSeconds;
      updateTotalReadingTime();
      document.getElementById('lastUpdated').textContent = new Date().toLocaleDateString();
      
      // Reset session timer
      sessionStartTime = new Date();
    }

    // Navigation Functions
    function previousPage() {
      if (pageNum <= 1) return;
      queueRenderPage(pageNum - 1);
    }

    function nextPage() {
      if (pageNum >= totalPages) return;
      queueRenderPage(pageNum + 1);
    }

    // Mark Current Page and Save
    function markCurrentPage() {
      saveProgress();
      
      // Visual feedback
      const button = event.target;
      const originalText = button.textContent;
      button.textContent = '✅ Saved!';
      button.style.background = 'linear-gradient(135deg, #27ae60, #229954)';
      
      setTimeout(() => {
        button.textContent = originalText;
        button.style.background = 'linear-gradient(135deg, #27ae60, #229954)';
      }, 1500);
    }


    // Keyboard Navigation
    document.addEventListener('keydown', function(e) {
      if (e.target.tagName.toLowerCase() === 'input') return;
      
      switch(e.key) {
        case 'ArrowLeft':
          e.preventDefault();
          previousPage();
          break;
        case 'ArrowRight':
          e.preventDefault();
          nextPage();
          break;
        case 's':
          if (e.ctrlKey || e.metaKey) {
            e.preventDefault();
            markCurrentPage();
          }
          break;
      }
    });

    // Auto-save Progress
    setInterval(() => {
      saveProgress();
    }, 60000); // Auto-save every minute

    // Save Progress on Page Unload
    window.addEventListener('beforeunload', function() {
      saveProgress();
    });

    console.log('PDF Reader with Progress Tracking initialized');