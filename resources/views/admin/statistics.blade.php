<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DIGITALES Admin Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/admin/statistics.css') }}"> 
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<x-navigation.admin-sidebar/>

   <div class="content">
    <h2>📖 Book Statistics</h2>
    <table class="book-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Cover</th>
          <th>Titles</th>
          <th>Avg. Ratings</th>
          <th>Total Favs</th>
          <th>Total Read</th>
          <th>Total Finished</th>
          <th>Comments</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Repeat this row -->
       
              <tr>

                <td>001</td>
                <td><img src="https://covers.openlibrary.org/b/id/10958362-L.jpg" class="book_cover" alt="book_cover" style="width: 100px;"></td>
                <td>Before the coffee gets cold</td>

                <td>5/5</td>
                <td>100</td>
                <td>233</td>
                <td>98</td>
                <td>98</td>
                <td><button class="see-btn">See all</button></td>
              </tr>
            
      </tbody>
    </table>
  </div>

</body>
</html>