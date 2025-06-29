<!-- resources/views/frontend-pages/homepage.blade.php -->

@extends('layouts.app')

@section('title', 'Digitales - Homepage')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/web/terms.css') }}">
@endpush

@section('content')

    <main class="terms-wrapper container" role="main" aria-labelledby="terms-title">
        <h1 class="terms-title" id="terms-title">Terms and Conditions</h1>
        <p class="terms-meta">
            Last updated on {{ \Carbon\Carbon::parse($terms->max('updated_at'))->format('F j, Y') }}
        </p>

        <!-- looping terms -->
        <section class="terms-content">
            @foreach ($terms as $term)
                <article class="term-section">
                    <h2 class="term-subtitle">{{ $term->title }}</h2>
                    <div class="term-text">{!! nl2br(e($term->content)) !!}</div>
                </article>
            @endforeach
        </section>
        <!-- looping terms -->

    </main>

@endsection
