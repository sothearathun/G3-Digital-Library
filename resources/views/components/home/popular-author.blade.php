{{-- resources/views/components/popular-authors.blade.php --}}

 @foreach ($authors as $author)
        <div class="author-card">
            <i class="fas fa-feather-alt author-icon"></i>
            <strong class="author-name">{{ $author->author_name }}</strong>
            <span class="author-badge">Popular Author</span>
        </div>
    @endforeach
