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
        </div>

        <div class="divider"></div>

        <!-- FAQ looping -->
        <div class="faq-section">
            @foreach($faqs as $faq)
                <div class="faq-item">
                    <h3 class="faq-question">{{ $faq->questions}}</h3>
                    <div class="faq-answer">
                        @if(Str::contains($faq->answers, '<ol>') || Str::contains($faq->answers, '<p>'))
                            {!! $faq->answers !!}
                        @else
                            <p>{{ $faq->answers }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="divider"></div>
    </div>


@endsection