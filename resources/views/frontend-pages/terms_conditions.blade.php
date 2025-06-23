<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Terms and Conditions</title>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/terms.css') }}">
</head>
<body>

    <!-- Header -->
    <x-navigation.header />

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

    <!-- Footer -->
    <x-navigation.footer />

</body>
</html>
