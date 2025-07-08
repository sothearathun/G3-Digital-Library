<!-- resources/views/frontend-pages/homepage.blade.php -->

@extends('layouts.app')

@section('title', 'Digitales - Homepage')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/web/profile.css') }}">
@endpush

@section('content')

    <div class="user-profile-page-wrapper">
        <div class="user-profile-card">
            <div class="profile-avatar">
                <span class="placeholder-avatar">
                    <i class="fas fa-user"></i>
                </span> </div>
            <div class="profile-info">
               
                    <h2>{{$user->name}}</h2>
                    <p>User ID: <span>1230{{$user->id}}</span></p>
                    <p>Joined Date: <span>{{$user->created_at}}</span></p>

            </div>
        </div>

    <br>

        <h3 class="section-title">Activity Log</h3>
        <ul class="activity-log">
            <li><span>O</span> Total book read</li>
            <li><span>O</span> Book reviewed</li>
            <li><span>O</span> Books commented</li>
        </ul>

        <h3 class="section-title">Interest</h3>
        <div class="genre-tags">
            <span class="genre-tag">Science Fiction</span>   
            <span class="genre-tag">Mystery</span>
            <span class="genre-tag">Adventure</span>
            <span class="genre-tag">Genre</span>        <!-- have to get genre from db -->
            <span class="genre-tag">Science Fiction</span>
            <span class="genre-tag">Adventure</span>
            <span class="genre-tag">Genre</span>
            <span class="genre-tag">Science Fiction</span>
            <span class="genre-tag">Mystery</span>
        </div>

        <h3 class="section-title">Continue Reading</h3>
       <div class="continue-reading-shelf">
        @foreach ($continueReading as $continue)
            <div class="continue-reading-item">
                <img src="{{ asset('uploads/' . $continue->book_cover) }}" alt="{{ $continue->book_title }}">
                <div class="progress-bar-container">
                    <div class="progress-bar">
                        <div class="progress-fill" style="--progress: {{ $continue->completion_percentage }}%"></div>
                    </div>
                    <div class="progress-footer">
                        <span class="progress-text">{{ $continue->completion_percentage }}%</span>

                        <button class="continue-button" onclick="location.href=`{{ route('readbook', ['book_id' => $continue->book_id]) }}`">Continue Reading</button>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

        <h3 class="section-title">User's Favorite Book</h3>
        <div class="favorite-books-carousel">

            <!-- will need js to make to swipe automatcally -->
            <button class="carousel-arrow left-arrow">&lt;</button>
            <div class="carousel-content">
                
                <!-- display fav books -->
                <div class="favorite-book-item">
                    <img src="  " alt="Book Cover">
                </div>
                <div class="favorite-book-item">
                    <img src="  " alt="Book Cover">
                </div>
                <div class="favorite-book-item">
                    <img src="  " alt="Book Cover">
                </div>
                <div class="favorite-book-item">
                    <img src="  " alt="Book Cover">
                </div>
                <div class="favorite-book-item">
                    <img src="  " alt="Book Cover">
                </div>
                <!-- display fav books -->
                
            </div>
            <button class="carousel-arrow right-arrow">&gt;</button>
            <!-- will need js to make to swipe automatcally -->

        </div>

        <br>

    </div>

@endsection