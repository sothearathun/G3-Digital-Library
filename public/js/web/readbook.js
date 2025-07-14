// Configure PDF.js worker
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

let pdfDoc = null;
let pageNum = 1;
let scale = 1.5;
let canvas = document.getElementById('pdf-canvas');
let ctx = canvas.getContext('2d');

// Initialize when page loads
document.addEventListener('DOMContentLoaded', function() {
    // Load PDF first, then set page number
    loadPDF();
    
    // Set up save progress button
    const saveBtn = document.getElementById('saveProgressBtn');
    if (saveBtn) {
        saveBtn.addEventListener('click', function() {
            // Show SweetAlert first
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Your progress has been saved",
                showConfirmButton: false,
                timer: 1500
            });
            
            // Delay the save function slightly to let SweetAlert render
            setTimeout(() => {
                saveProgressTraditional();
            }, 1500); // Small delay to ensure SweetAlert shows
        });
    }
    
    // Auto-save progress every 30 seconds
    setInterval(autoSaveProgress, 30000);
});

// Load PDF from uploads folder
async function loadPDF() {
    try {
        if (!window.bookData || !window.bookData.filePath) {
            throw new Error('Book data not available');
        }
        
        // Make sure the path is correct - remove any leading slashes from filePath
        const pdfUrl = window.bookData.filePath;
        
        console.log('Loading PDF from:', pdfUrl); // Debug log
        
        const loadingTask = pdfjsLib.getDocument(pdfUrl);
        pdfDoc = await loadingTask.promise;
        
        // Update total pages in UI
        const totalPagesElement = document.getElementById('totalPagesStat');
        if (totalPagesElement) {
            totalPagesElement.textContent = pdfDoc.numPages;
        }
        
        const loadingOverlay = document.getElementById('loadingOverlay');
        if (loadingOverlay) {
            loadingOverlay.style.display = 'none';
        }
        
        // Update book data with actual PDF page count
        window.bookData.totalPages = pdfDoc.numPages;
        
        // NOW set the page number after PDF is loaded and we know the total pages
        if (window.bookData && window.bookData.currentPage) {
            // Ensure the saved page number is within valid range
            const savedPage = parseInt(window.bookData.currentPage);
            if (savedPage >= 1 && savedPage <= pdfDoc.numPages) {
                pageNum = savedPage;
            } else {
                console.warn(`Saved page ${savedPage} is out of range. Using page 1.`);
                pageNum = 1;
            }
        }
        
        renderPage(pageNum);
        updateProgress();
        
    } catch(error) {
        console.error('Error loading PDF:', error);
        const loadingOverlay = document.getElementById('loadingOverlay');
        if (loadingOverlay) {
            loadingOverlay.innerHTML = 'Error loading PDF: ' + error.message;
        }
    }
}

async function renderPage(num) {
    try {
        if (!pdfDoc) {
            throw new Error('PDF not loaded');
        }
        
        // Validate page number before attempting to render
        if (num < 1 || num > pdfDoc.numPages) {
            throw new Error(`Invalid page number: ${num}. Must be between 1 and ${pdfDoc.numPages}`);
        }
        
        const page = await pdfDoc.getPage(num);
        const viewport = page.getViewport({scale: scale});
        
        canvas.height = viewport.height;
        canvas.width = viewport.width;
        
        const renderContext = {
            canvasContext: ctx,
            viewport: viewport
        };
        
        await page.render(renderContext).promise;
        
        // Update UI
        const pageInfoElement = document.getElementById('pageInfo');
        if (pageInfoElement) {
            pageInfoElement.textContent = `Page ${num} of ${pdfDoc.numPages}`;
        }
        
        const currentPageElement = document.getElementById('currentPageStat');
        if (currentPageElement) {
            currentPageElement.textContent = num;
        }
        
        // Update navigation buttons
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        
        if (prevBtn) {
            prevBtn.disabled = (num <= 1);
        }
        if (nextBtn) {
            nextBtn.disabled = (num >= pdfDoc.numPages);
        }
        
    } catch (error) {
        console.error('Error rendering page:', error);
        // Show error in loading overlay
        const loadingOverlay = document.getElementById('loadingOverlay');
        if (loadingOverlay) {
            loadingOverlay.style.display = 'block';
            loadingOverlay.innerHTML = 'Error rendering page: ' + error.message;
        }
    }
}

// Navigation functions
function previousPage() {
    if (!pdfDoc || pageNum <= 1) return;
    pageNum--;
    renderPage(pageNum);
    updateProgress();
}

function nextPage() {
    if (!pdfDoc || pageNum >= pdfDoc.numPages) return;
    pageNum++;
    renderPage(pageNum);
    updateProgress();
}

// Update progress bar
function updateProgress() {
    if (!pdfDoc) return;
    
    const progress = (pageNum / pdfDoc.numPages) * 100;
    
    const progressFill = document.getElementById('progressFill');
    if (progressFill) {
        progressFill.style.width = progress + '%';
    }
    
    const progressPercentage = document.getElementById('progressPercentage');
    if (progressPercentage) {
        progressPercentage.textContent = Math.round(progress) + '%';
    }
}

// Auto-save progress function
function autoSaveProgress() {
    if (!window.bookData || !window.bookData.userId) {
        console.log('User not logged in, skipping auto-save');
        return;
    }
    
    // Only auto-save if we have a valid page number and PDF is loaded
    if (pageNum && pdfDoc && pageNum >= 1 && pageNum <= pdfDoc.numPages) {
        console.log('Auto-saving progress...');
        saveProgressSilent(); // Use silent version for auto-save
    }
}

// Silent save (for auto-save, no alerts)
function saveProgressSilent() {
    if (!window.bookData || !window.bookData.userId) {
        return;
    }
    
    // Validate page number before saving
    if (!pdfDoc || pageNum < 1 || pageNum > pdfDoc.numPages) {
        console.error('Invalid page number for saving:', pageNum);
        return;
    }
    
    // Create a hidden form and submit it
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '/storeReadingProgress';
    form.style.display = 'none';
    
    // Add CSRF token
    const csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '_token';
    csrfInput.value = window.bookData.csrfToken;
    form.appendChild(csrfInput);
    
    // Add book ID
    const bookIdInput = document.createElement('input');
    bookIdInput.type = 'hidden';
    bookIdInput.name = 'book_id';
    bookIdInput.value = window.bookData.id;
    form.appendChild(bookIdInput);
    
    // Add current page
    const currentPageInput = document.createElement('input');
    currentPageInput.type = 'hidden';
    currentPageInput.name = 'current_page';
    currentPageInput.value = pageNum;
    form.appendChild(currentPageInput);
    
    // Add total pages
    const totalPagesInput = document.createElement('input');
    totalPagesInput.type = 'hidden';
    totalPagesInput.name = 'total_pages';
    totalPagesInput.value = pdfDoc ? pdfDoc.numPages : window.bookData.totalPages;
    form.appendChild(totalPagesInput);
    
    document.body.appendChild(form);
    form.submit();
}

// Traditional form submission (for manual save button)
function saveProgressTraditional() {
    // Debug the book data
    console.log('Book data:', window.bookData);
    console.log('User ID:', window.bookData ? window.bookData.userId : 'undefined');
    console.log('CSRF Token:', window.bookData ? window.bookData.csrfToken : 'undefined');
    
    if (!window.bookData || !window.bookData.userId) {
        alert('Please log in to save your progress');
        return;
    }
    
    // Validate page number before saving
    if (!pdfDoc || pageNum < 1 || pageNum > pdfDoc.numPages) {
        alert('Invalid page number. Cannot save progress.');
        return;
    }
    
    // Create a hidden form and submit it
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '/storeReadingProgress';
    form.style.display = 'none';
    
    // Add CSRF token
    const csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '_token';
    csrfInput.value = window.bookData.csrfToken;
    form.appendChild(csrfInput);
    
    // Add book ID
    const bookIdInput = document.createElement('input');
    bookIdInput.type = 'hidden';
    bookIdInput.name = 'book_id';
    bookIdInput.value = window.bookData.id;
    form.appendChild(bookIdInput);
    
    // Add current page
    const currentPageInput = document.createElement('input');
    currentPageInput.type = 'hidden';
    currentPageInput.name = 'current_page';
    currentPageInput.value = pageNum;
    form.appendChild(currentPageInput);
    
    // Add total pages
    const totalPagesInput = document.createElement('input');
    totalPagesInput.type = 'hidden';
    totalPagesInput.name = 'total_pages';
    totalPagesInput.value = pdfDoc ? pdfDoc.numPages : window.bookData.totalPages;
    form.appendChild(totalPagesInput);
    
    document.body.appendChild(form);
    form.submit();
}

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    if (e.key === 'ArrowLeft') {
        previousPage();
    } else if (e.key === 'ArrowRight') {
        nextPage();
    }
});