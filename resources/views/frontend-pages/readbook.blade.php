@extends('layouts.app')

@section('title', 'Digitales - Homepage')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/web/readbook.css') }}">
@endpush
@section('content')

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
         <!-- use js -->
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

         <button class="btn btn-success" >Save Progress</button>

          </div>
        </div>

        <!-- Reading Statistics -->
        <div class="progress-section">
          <div class="section-title">
            <div class="section-icon"></div>
            Statistics
          </div>
          <div class="stats-grid">
            <div class="stat-card">
              <div class="stat-label">Current Page</div>
              <!-- load current page from database, then js handles track page -->
              <div class="stat-value" id="currentPageStat"></div>
            </div>
            <div class="stat-card">
              <div class="stat-label">Total Pages</div>
              <div class="stat-value" id="totalPagesStat">{{ $book->total_pages }}</div>
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

@push('scripts')
  <script src="{{ asset('js/web/readbook.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.7.570/build/pdf.min.js"></script>
@endpush
@endsection