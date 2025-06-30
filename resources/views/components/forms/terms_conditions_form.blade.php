
<!-- Terms & Conditions Edit Modal -->
<div class="modal fade" id="terms_conditions_Modal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="termsModalLabel">Edit Terms & Conditions</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="termsForm">

        <!-- populate old one first -->
          <div class="mb-3">
            <label class="form-label">Terms & Conditions Points</label>
            <div id="termsContainer">
              @if(isset($v_terms_conditions->terms_conditions_points))
                @foreach ($v_terms_conditions->terms_conditions_points as $index => $point)
                  <div class="input-group mb-2">
                    <span class="input-group-text">{{ $index + 1 }}.</span>
                    <textarea class="form-control terms-point" rows="2" name="terms_points[]">{{ $point }}</textarea>
                    <button class="btn btn-outline-danger remove-term" type="button">
                      <i class="fas fa-trash"></i>
                    </button>
                  </div>
                @endforeach
              @endif
            </div>
            <button type="button" class="btn btn-outline-primary btn-sm" id="addTermPoint">
              <i class="fas fa-plus"></i> Add Term
            </button>
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveTerms">Save Terms & Conditions</button>
      </div>
    </div>
  </div>
</div>