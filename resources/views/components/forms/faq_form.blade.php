
<!-- FAQ Delete Modal -->
@props(['v_faq'])

<div class="modal fade" id="faq_Modal" tabindex="-1" aria-labelledby="faqModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="faqModalLabel">Delete FAQ</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ol>
          @foreach ($v_faq as $f)
            <li class="mb-3">
              <div>
                <div class="mb-1"><strong>Q:</strong> {{ $f->questions }}</div>
                <div class="mb-2"><strong>A:</strong> {{ $f->answers }}</div>
                <form action="{{ route('deleteFAQ', [$f->faq_id]) }}" method="post" style="display:inline;">
                  @csrf
                  <button type="submit" class="btn btn-outline-danger btn-sm delete-faq">
                    <i class="fa-solid fa-delete-left"></i> Delete
                  </button>
                </form>
              </div>
            </li>
          @endforeach
        </ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>