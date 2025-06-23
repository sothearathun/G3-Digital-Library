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
      <h4>User Activities</h4>
      <div class="charts">
        <canvas id="userActivityChart" width="300"></canvas>
        <div>
          <p><strong>Total User:</strong> 1 million</p>
          <p>A - Total Active Users This Week: 70%</p>
          <p>B - Non-Active Users: 30%</p>
        </div>
      </div>
    </div>

    <div class="section">
      <h4>Content Engagement</h4>
      <h5>Most Read Books</h5>
      <canvas id="bookChart" width="600" height="300"></canvas>
    </div>

    <div class="section">
      <h4>Popular Genres</h4>
      <div class="charts">
        <canvas id="genreChart" width="300"></canvas>
        <div>
          <p>A - Fiction: 33%</p>
          <p>B - Romance: 33%</p>
          <p>C - Horror: 33%</p>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/admin/analytics.js') }}"></script>
</body>
</html>
