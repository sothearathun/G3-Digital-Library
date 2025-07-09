<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Guidelines</title>
  <link rel="stylesheet" href="{{ asset('css/admin/guidelines.css') }}"> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>

<!-- guidelines blade -->

<x-navigation.admin-sidebar/>

    <div class="content">
      <h2>📖 Guidelines</h2>
      
      <h3>Terms & Conditions</h3>
        <ol>
          @foreach($v_terms_conditions as $tc)
            <li>{{$tc->tc_des}}</li>
          @endforeach
        </ol>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#terms_conditions_Modal">
          Edit Terms & Conditions
        </button>
        <!-- Add More Terms & Conditions Button and Collapsible Form -->
        <div class="addTC my-2">
          <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#addTCForm" aria-expanded="false" aria-controls="addTCForm">
            <i class="fa-solid fa-pen-to-square"></i> Add More
          </button>
        </div>
        <div class="collapse" id="addTCForm">
          <div class="card card-body">
            <form action="{{ route('writeTC') }}" method="post">
              @csrf
              <div class="mb-2">
                <label for="tc_des" class="form-label">Description</label>
                <input type="text" name="tc_des" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary">Add</button>
              <button type="cancel" class="btn btn-danger">Cancel</button>
            </form>
          </div>
        </div> 

        <x-forms.terms_conditions_form :v_terms_conditions="$v_terms_conditions" />
        

     <!-- FAQ Section -->
<h3>FAQ</h3>
<ol>
    @foreach($v_faq as $faq)
    <li>{{$faq->questions}}</li>
    <p>{{$faq -> answers}}</p>
    @endforeach
</ol>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#faq_Modal">
    Edit FAQ
</button>
<!-- Add More FAQ Button and Collapsible Form -->
<div class="addFAQ my-2">
    <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#addFAQForm" aria-expanded="false" aria-controls="addFAQForm" id="addFAQButton">
        <i class="fa-solid fa-pen-to-square"></i>
        Add More
    </button>
</div>
<div class="collapse" id="addFAQForm">
    <div class="card card-body">
        <form action="{{ route ('writeFAQ') }}" method="post">
            @csrf
            <div class="mb-2">
                <label for="questions" class="form-label">Question</label>
                <input type="text" name="questions" class="form-control" required>
            </div>
            <div class="mb-2">
                <label for="answers" class="form-label">Answer</label>
                <input type="text" name="answers" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
            <button type="button" class="btn btn-danger">Cancel</button>
        </form>
    </div>
</div>

<x-forms.faq_form :v_faq="$v_faq" />


    </div>
  </div>
</body>
<script src="{{ asset('js/admin/guidelines.js') }}"></script>
</html>
