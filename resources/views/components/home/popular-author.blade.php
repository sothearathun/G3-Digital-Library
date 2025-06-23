{{-- resources/views/components/popular-authors.blade.php --}}

@foreach ($authors as $author)
<div class="author-card">
    <!-- <img src="{{ asset($author->author_image) }}" alt="Author Image"> -->
    <p>{{ $author->author_name }}</p>
</div>
@endforeach

