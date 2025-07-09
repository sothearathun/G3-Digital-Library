<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DIGITALES Admin Dashboard</title>
  <!-- <link rel="stylesheet" href="{{ asset('css/admin.css') }}">  -->

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="{{ asset('css/admin/analytics.css') }}">
</head>
<body>

  <x-navigation.admin-sidebar/>

  <div class="main">
    <div class="section">
      <h3>Analytics</h3>

      <h4>
        <i class="fa-solid fa-user"></i>  
      User Activities</h4>
      <div class="charts">
        <canvas id="userActivityChart" width="300"></canvas>
        <div>
          <p><strong>Total User:</strong> {{$user->totalUser}}</p>
          <p>A - Total Active Users This Week: {{$user->activeUsers}}</p>
          <p>B - Non-Active Users: {{$user->noneActiveUsers}}</p>
        </div>
      </div>
    </div>

    <div class="section">
      <h4>
        <i class="fa-solid fa-book"></i>
      Content Engagement</h4>
      <h4>Most Read Books</h4>
      <canvas id="bookChart" width="600" height="300"></canvas>
    </div>

    <div class="section">
      <h4>Popular Genres</h4>
      <div class="charts">
        <canvas id="genreChart" width="300"></canvas>
        <div>
         @foreach ($genreStats as $index => $genre)
          <p>{{ chr(65 + $index) }} - {{ $genre->genre_name }}: {{ $genre->percentage }}%</p>
        @endforeach

        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/admin/analytics.js') }}"></script>

<script>
  const userData = JSON.parse(`{!! json_encode($user) !!}`);

  new Chart(document.getElementById("userActivityChart"), {
    type: "doughnut",
    data: {
      labels: ["Active Users", "Non-Active Users"],
      datasets: [{
        data: [userData.activeUsers, userData.noneActiveUsers],
        backgroundColor: ["#758bbd", "#c5c5c5"]
      }]
    },
    options: {
      responsive: false
    }
  });

  const books = JSON.parse(`{!! json_encode($mostRatedBook) !!}`);

  const labels = books.map(book => book.book_title);
  const data = books.map(book => book.total_ratings);

  new Chart(document.getElementById("bookChart"), {
    type: "bar",
    data: {
      labels: labels,
      datasets: [{
        label: "Total Ratings",
        data: data,
        backgroundColor: "#888"
      }]
    },
    options: {
      scales: {
        y: { beginAtZero: true }
      }
    }
  });

   const genreStats = JSON.parse(`{!! json_encode($genreStats) !!}`);

  const genreLabels = genreStats.map(g => g.genre_name);
  const genreData = genreStats.map(g => g.percentage);
  const genreColors = ["#a3b9d4", "#8ca2c8", "#718dbd"]; // Add more if needed

  new Chart(document.getElementById("genreChart"), {
    type: "doughnut",
    data: {
      labels: genreLabels,
      datasets: [{
        data: genreData,
        backgroundColor: genreColors
      }]
    },
    options: {
      responsive: false
    }
  });

</script>

</body>
</html>
