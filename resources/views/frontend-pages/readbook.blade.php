<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $book->book_title }}</title>
  <link rel="stylesheet" href="{{ asset('css/web/readbook.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.7.570/build/pdf.min.js"></script>
  <link rel="stylesheet" href="{{ asset('css/web/readbook.css') }}">
</head>
<body>
  <div class="container">
    <div class="book-header">
      <h1>{{ $book->book_title }}</h1>
      <p>Author: {{ $book->author_name }}</p>
      <p>Published: {{ \Carbon\Carbon::parse($book->released_date)->format('j F Y') }}</p>
    </div>

    <div class="main-content">
      <div class="progress-sidebar">

        <!-- Reading Progress -->
        <div class="progress-section">
          <div class="section-title">
            <div class="section-icon">📊</div>
            Reading Progress
          </div>
          <div class="progress-bar">
            <div class="progress-fill" id="progressFill"></div>
            <div class="progress-percentage" id="progressPercentage">0%</div>
          </div>
          
          
          <div class="controls-grid">
            
            <button class="btn btn-success" onclick="markCurrentPage()">Save Progress</button>
            
          </div>
        </div>

        <!-- Reading Statistics -->
        <div class="progress-section">
          <div class="section-title">
            <div class="section-icon">📈</div>
            Statistics
          </div>
          <div class="stats-grid">
            <div class="stat-card">
              <div class="stat-label">Current Page</div>
              <div class="stat-value" id="currentPageStat">1</div>
            </div>
            <div class="stat-card">
              <div class="stat-label">Total Pages</div>
              <div class="stat-value" id="totalPagesStat">{{ $book->total_pages }}</div>
            </div>
            <div class="stat-card">
              <div class="stat-label">Pages Remaining</div>
              <div class="stat-value" id="remainingPagesStat"></div>
            </div>
          </div>
        </div>


      <div class="reader-wrapper">
        <div class="reader-controls">
          <div class="page-info" id="pageInfo">Loading PDF...</div>
          <div class="nav-controls">
            <button class="nav-btn" id="prevBtn" onclick="previousPage()">← Previous</button>
            <button class="nav-btn" id="nextBtn" onclick="nextPage()">Next →</button>
          </div>
        </div>
        
        <div class="pdf-container">
          <div class="loading-overlay" id="loadingOverlay">
            Loading PDF...
          </div>
          <canvas id="pdf-canvas"></canvas>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/web/readbook.js') }}"></script>
   
  </script>
</body>
</html>