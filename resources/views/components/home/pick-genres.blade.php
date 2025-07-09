<div class="genre-modal-overlay" id="genreModal">
    <div class="genre-modal-content">

 <div class="bg-particles" id="particles"></div>
    <main class="main-content">
        <section class="hero-section">
            <h1 class="hero-title">Discover Your Next Adventure</h1>
            <p class="hero-subtitle">Personalized book recommendations powered by your favorite genres</p>
        </section>

        <div class="genre-card">
            
          <form action="{{ route('saveGenres', ['user_id' => auth()->id()]) }}" method="POST">
            @csrf
            <div class="genre-grid" id="genreGrid">
                @foreach($genres as $genre)
                    <label class="genre-item" style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                        <input type="checkbox" name="genres[]" value="{{ $genre }}">
                        <span>{{ $genre }}</span>
                    </label>
                @endforeach
            </div>

            <div class="action-buttons">
                <button type="submit" class="btn btn-primary" id="saveBtn">
                    Save
                </button>
                <a href="{{ route('homepage') }}" class="btn btn-secondary" id="laterBtn">
                    Skip
                </a>
            </div>
        </form>
        </div>
    </main>
  </div>
</div>
