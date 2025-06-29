<!-- resources/views/frontend-pages/homepage.blade.php -->

@extends('layouts.app')

@section('title', 'Digitales - Homepage')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/web/homepage.css') }}">
@endpush

@section('content')    
    <!-- Hero Section Component -->
    <x-home.hero-section/>

    <br><br><br>
    
    <!-- Search Section Component -->
    <div id="search-section">
        <x-home.search-bar/>
    </div>

    <!-- Trending Books  -->
    <h2 class="section-header" style="font-size: 30px;">TRENDING BOOKS</h2>
    <x-home.book-carousel :books="$v_trending_books" />
    <!-- Trending Books  -->

    <!-- Best Selling Books -->
    <h2 class="section-header" style="font-size: 30px;">BEST SELLING BOOKS</h2>
    <x-home.book-carousel :books="$v_best_selling_books" />
    <!-- Best Selling Books -->

    <!-- Newly added book   -->
    <h2 class="section-header" style="font-size: 30px;">NEWLY ADDED BOOKS</h2>
    <x-home.book-carousel :books="$v_newly_added_books" />
    <!-- Newly added book   -->



        <!-- Authors Section Component -->
        <h2 class="section-header" style="font-size: 30px;">POPULAR AUTHORS OF THE YEAR</h2>
        <div class="popular-authors">
            <x-home.popular-author :authors="$v_popular_authors"/>
        </div>



        
        <!-- News Section Component -->
                    <!-- dont see any cover img for news in the DB, so will have to talk with my team leader regarding this  -->
        <h2 class="section-header" style="font-size: 30px;">DIGITALES NEWS</h2>
        <div class="digitales-news">
            <x-home.news-section :news="$v_digitales_news"/>
        </div>
    </div>


@endsection  
