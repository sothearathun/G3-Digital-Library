<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DIGITALES Admin Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/admin/usersRecords.css') }}"> 
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<x-navigation.admin-sidebar/>

   <div class="content">
    <h2>📖 User Records</h2>
    <table class="user-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Joined</th>
          <th>Email</th>
          <th>User's Interaction</th>
        </tr>
      </thead>
      <tbody>
       
              <tr>
                <td>001</td>
                <td>username_123</td>
                <td>02/05/2025</td>
                <td>user@gmail.com</td>
                <td><button class="interaction-btn">see interactions</button></td>
              </tr>

        </script>
      </tbody>
    </table>
  </div>

</body>
</html>