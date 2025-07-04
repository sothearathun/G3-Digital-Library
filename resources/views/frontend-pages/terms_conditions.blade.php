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
            <ol>

                @foreach ($terms as $term)
                    <article class="term-section">
                        <li>
                            <div class="term-text">{!! nl2br(e($term->tc_des)) !!}</div>
                        </li>
                    </article>
                @endforeach
                
            </ol>
        </section>
        <!-- looping terms -->

    </main>

@endsection
