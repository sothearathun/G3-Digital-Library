<form action="" method="post" id="addGuidlines" style="display: none;">

  @csrf
  <div class="form-floating mb-3">
    <input type="text" class="form-control" id="tc_des" name="tc_des" placeholder="Terms & Conditions">
    <label for="tc_des">Terms & Conditions</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>

</form>