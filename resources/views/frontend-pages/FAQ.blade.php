<!-- resources/views/frontend-pages/homepage.blade.php -->

@extends('layouts.app')

@section('title', 'Digitales - Homepage')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/web/FAQ.css') }}">
@endpush

@section('content')


    <div class="container">
        <!-- Help Center Header -->
        <div class="help-header">
            <h1 class="help-title">Help Center</h1>
            

            <!-- search problem  -->
            <div class="search-container">
                <div class="search-icon">🔍</div>
                <input type="text" class="search-input" placeholder="Ask us a question" id="searchInput">
                <!-- <div class="search-results" id="searchResults">
                    <div class="search-result-item">How to reset my password?</div>
                    <div class="search-result-item">How to update my profile?</div>
                    <div class="search-result-item">How to contact support?</div>
                    <div class="search-result-item">How to delete my account?</div>
                </div> -->
            </div>
            <!-- search problem  -->


        </div>

        <div class="divider"></div>



        <!-- FAQ looping -->
        <div class="faq-section">
            @foreach($faqs as $faq)
                <div class="faq-item">
                    <h3 class="faq-question">{{ $faq->question }}</h3>
                    <div class="faq-answer">
                        @if(Str::contains($faq->answer, '<ol>') || Str::contains($faq->answer, '<p>'))
                            {!! $faq->answer !!}
                        @else
                            <p>{{ $faq->answer }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <!-- FAQ looping -->



        <div class="divider"></div>
    </div>


@endsection