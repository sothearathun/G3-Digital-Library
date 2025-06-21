{{-- resources/views/components/popular-authors.blade.php --}}
<div class="authors-section">
    <h2 class="section-header">POPULAR AUTHORS OF THE YEAR</h2>
    <div class="popular-authors">
        @foreach ($authors as $author)
        <div class="author-card">
            <img src="{{ asset($author->profile_picture) }}" alt="Author Image">
            <p>{{ $author->author_name }}</p>
        </div>
        @endforeach
    </div>
</div>