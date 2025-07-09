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
                <li><span>{{$totalBooksRead}}</span> Total book read</li>
                <li><span>{{$totalBooksRated}}</span> Book rated</li>
                <li><span>{{$totalBooksCommented}}</span> Books commented</li>
            </ul>
     

        <!-- ...existing code... -->

<!-- ...existing code... -->

<h3 class="section-title">Interest</h3>
@if(count($genre_preferences) > 0)
    @foreach ($genre_preferences as $genre)
        <div class="genre-tags">
            <span class="genre-tag">{{$genre->prefered_genres}}</span>   
        </div>
    @endforeach
@else
    <div class="genre-tags">
        <span class="genre-tag" style="background:#eee; color:#888;">No interests selected yet.</span>
    </div>
@endif

<h3 class="section-title">Continue Reading</h3>
@if(count($continueReading) > 0)
    <div class="continue-reading-shelf">
        @foreach ($continueReading as $continue)
            <div class="continue-reading-item">
                <img src="{{ asset('uploads/' . $continue->book_cover) }}" alt="{{ $continue->book_title }}">
                <h4>{{ $continue->book_title }}</h4>
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
@else
    <div class="continue-reading-shelf">
        <span style="color:#888;">No books to continue reading.</span>
    </div>
@endif

<h3 class="section-title">User's Favorite Book</h3>
@if(count($favoriteBooks) > 0)
    <div class="favorite-books-carousel">
        <button class="carousel-arrow left-arrow">&lt;</button>
        <div class="carousel-content">
            @foreach ($favoriteBooks as $favorite)
                <div class="favorite-book-item">
                    <img src="{{ asset('uploads/' . $favorite->book_cover) }}" alt="{{ $favorite->book_title }}">
                    <h4>{{ $favorite->book_title }}</h4>
                    <p>{{ $favorite->book_author }}</p>
                    <button class="read-button" onclick="location.href=`{{ route('readbook', ['book_id' => $favorite->book_id]) }}`">Read Now</button>
                </div>
            @endforeach
        </div>
        <button class="carousel-arrow right-arrow">&gt;</button>
    </div>
@else
     <div class="favorite-books-carousel">
        <span style="color:#888;">No favorite books yet.</span>
    </div>
@endif

        <br>

    </div>

@endsection