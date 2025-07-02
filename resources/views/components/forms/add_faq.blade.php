<form action="" method="post" id="addGuidlines" style="display: none;">

  @csrf
  <div class="form-floating mb-3">
    <input type="text" class="form-control" id="question" name="question" placeholder="Question">
    <label for="question">Question</label>
  </div>
  <div class="form-floating mb-3">
    <input type="text" class="form-control" id="answer" name="answer" placeholder="Answer">
    <label for="answer">Answer</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>

</form>