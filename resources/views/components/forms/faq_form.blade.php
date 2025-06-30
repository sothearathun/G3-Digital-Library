<!-- FAQ Edit Modal -->
<div class="modal fade" id="faq_Modal" tabindex="-1" aria-labelledby="faqModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="faqModalLabel">Edit FAQ</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        
        <form id="faqForm">
          <div class="mb-3">
            <label class="form-label">FAQ Items</label>
            <div id="faqContainer">
              @if(isset($v_faq->questions) && isset($v_faq->answers))
                @foreach ($v_faq->questions as $index => $question)
                  <div class="faq-item border rounded p-3 mb-3">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                      <h6 class="mb-0">FAQ Item {{ $index + 1 }}</h6>
                      <button class="btn btn-sm btn-outline-danger remove-faq" type="button">
                        <i class="fas fa-trash"></i>
                      </button>
                    </div>
                    <div class="mb-2">
                      <label class="form-label small">Question:</label>
                      <textarea class="form-control faq-question" rows="2" name="questions[]">{{ $question }}</textarea>
                    </div>
                    <div>
                      <label class="form-label small">Answer:</label>
                      <textarea class="form-control faq-answer" rows="3" name="answers[]">{{ $v_faq->answers[$index] ?? '' }}</textarea>
                    </div>
                  </div>
                @endforeach
              @endif
            </div>
            <button type="button" class="btn btn-outline-primary btn-sm" id="addFaqItem">
              <i class="fas fa-plus"></i> Add FAQ Item
            </button>
          </div>
        </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveFaq">Save FAQ</button>
      </div>
    </div>
  </div>
</div>
