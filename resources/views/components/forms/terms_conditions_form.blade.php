
<!-- Terms & Conditions Delete Modal -->
@props(['v_terms_conditions'])

<div class="modal fade" id="terms_conditions_Modal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="termsModalLabel">Delete Terms & Conditions</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ol>
          @foreach ($v_terms_conditions as $tc)
            <li class="mb-3">
              <div>
                <div class="mb-2">{{ $tc->tc_des }}</div>
                <form action="{{ route('deleteTC', [$tc->tc_id]) }}" method="post" style="display:inline;">
                  @csrf
                  <button type="submit" class="btn btn-outline-danger btn-sm delete-term">
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