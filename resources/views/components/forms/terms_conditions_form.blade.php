<!-- Terms & Conditions Edit Modal -->
@props(['v_terms_conditions'])

<div class="modal fade" id="terms_conditions_Modal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="termsModalLabel">Edit Terms & Conditions</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

          @foreach ($v_terms_conditions as $tc)
              @csrf
              <input type="hidden" name="tc_id[]" value="{{ $tc->tc_id }}">
              <ol start="{{ $loop->iteration }}">
                  <li>
                      <div class="d-flex align-items-center gap-2">
                          <input type="text" name="tc_des[]" class="form-control" value="{{ $tc->tc_des }}">
                          
                          <form action="{{ route('deleteTC', [$tc->tc_id]) }}" method="post">
                              @csrf
                              <button type="submit" class="btn btn-outline-danger btn-sm delete-term">
                                  <i class="fa-solid fa-delete-left"></i>
                              </button>
                          </form>

                      </div>
                  </li>
              </ol>
          @endforeach
      

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="saveTerms">Save Terms & Conditions</button>
      </div>

    </div>
  </div>
</div>