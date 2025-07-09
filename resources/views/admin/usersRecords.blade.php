<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DIGITALES Admin Dashboard</title>

  <link rel="stylesheet" href="{{ asset('css/admin/usersRecords.css') }}"> 
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<x-navigation.admin-sidebar/>

   <div class="content">
    <h2>📖 User Records</h2>
    <table class="user-table">
      <thead>
        <tr>
          
          <th>Username</th>
          <th>Joined</th>
          <th>Email</th>
          <th>User's Interaction</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
              <tr>
                <td>{{ $user-> name }}</td>
                <td>{{ $user-> created_at }}</td>
                <td>{{ $user-> email }}</td>
                <td>
                  <!-- drop down -->
                  <select class="user-interaction-select">
                    <option value="view" disabled se selected>See Interactions</option>
                    
                    <option value="interest">Genres Interest</option>
                    <option value="progress">Reading Progress</option>
                    <option value="fav">Favorite Books</option>
                  </select>

              </tr>
        @endforeach
      </tbody>
    </table>
  </div>

 
  <x-forms.interest_user : v_interests="$v_interests"/>
  <x-forms.continue_user : v_progress="$v_progress"/>
  <x-forms.fav_user : v_fav="$v_fav"/>

</body>
<script src="{{ asset('js/admin/userRecords.js') }}"></script>

</html>