
<style>
.progress-fill {
    width: var(--progress);
    background-color: #3b82f6;
    height: 100%;
    transition: width 0.3s ease;
}
</style>
@props(['v_progress'])
<div class="modal fade" tabindex="-1" id="progress_Modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">User Reading Progress</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      @foreach ($v_progress as $continue)
        <div class="books" style="margin-bottom: 1.5rem;">
          <img src="{{ asset('uploads/' . $continue->book_cover) }}" alt="Book Cover" style="width:60px;height:80px;object-fit:cover;border-radius:6px;">
          <div class="book-title" style="font-weight:600;margin-top:8px;">{{ $continue->book_title }}</div>
          <div class="progress-bar-container" style="margin-top:10px;">
            <div class="progress-bar" style="background:#e5e7eb;width:100%;height:16px;border-radius:8px;overflow:hidden;">
                <div class="progress-fill" style="--progress: {{ number_format($continue->completion_percentage, 2) }}%"></div>
            </div>
            <div class="progress-footer" style="margin-top:4px;">
                <span class="progress-text">{{ $continue->completion_percentage }}%</span>
            </div>
          </div>
        </div>
      @endforeach
      </div>
    </div>
  </div>
</div>