<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DIGITALES Admin Dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      display: flex;
      margin: 0;
    }
    .sidebar {
      width: 200px;
      background-color: #f4f4f4;
      padding: 10px;
      height: 100vh;
    }
    .sidebar a{
    text-decoration: none;
    color: black;
    }
    .sidebar h2 {
      font-size: 16px;
      margin: 10px 0;
    }
    .sidebar ul {
      list-style-type: none;
      padding: 0;
    }
    .sidebar ul li {
      padding: 8px;
      cursor: pointer;
    }
    .sidebar ul li:hover {
      background-color: #ddd;
    }
    .main {
      flex-grow: 1;
      padding: 20px;
    }
    .section {
      margin-bottom: 40px;
    }
    canvas {
      max-width: 100%;
    }
    .charts {
      display: flex;
      gap: 40px;
      flex-wrap: wrap;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h2>DIGITALES admin</h2>
    <ul>
      <li style="background-color: #cbd5f1; color: blue"><a style="color: blue;" href="{{ route('admin.analytics') }}">📊 Analytics</a></li>
      <li><a href="{{ route('admin.publishs') }}">🚀 Publish Books</a></li>
      <li><a href="{{ route('admin.booksPublished') }}">✅ Books Published</a></li>
      <li><a href="{{ route('admin.userRecord') }}">📝 Users Records</a></li>
      <li><a href="{{ route('admin.statistic') }}">📈 Book Statistics</a></li>
      <li><a href="{{ route('admin.guideline') }}">💡 Guidelines</a></li>
      <li><a href="{{ route('admin.authors') }}">🧑 Author</a></li>
      <li><a href="{{ route('admin.digitalsNews') }}">📰 Digital News</a></li>
    </ul>
  </div>

  <div class="main">
    <div class="section">
      <h3>📚 Analytics</h3>
      <h4>📖 User Activities</h4>
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
      <h4>📚 Content Engagement</h4>
      <h5>📊 Most Read Books</h5>
      <canvas id="bookChart" width="600" height="300"></canvas>
    </div>

    <div class="section">
      <h4>📖 Popular Genres</h4>
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

  <script>
    // User Activities Chart
    new Chart(document.getElementById("userActivityChart"), {
      type: "doughnut",
      data: {
        labels: ["Active Users", "Non-Active Users"],
        datasets: [{
          data: [70, 30],
          backgroundColor: ["#758bbd", "#c5c5c5"]
        }]
      },
      options: {
        responsive: false
      }
    });

    // Book Chart
    new Chart(document.getElementById("bookChart"), {
      type: "bar",
      data: {
        labels: ["Harry Potter", "Dr. Si", "Glow Up", "Nowhere", "Sky is Black"],
        datasets: [{
          label: "Reads",
          data: [27000, 20000, 16000, 5000, 3000],
          backgroundColor: "#888"
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    // Genre Chart
    new Chart(document.getElementById("genreChart"), {
      type: "doughnut",
      data: {
        labels: ["Fiction", "Romance", "Horror"],
        datasets: [{
          data: [33, 33, 33],
          backgroundColor: ["#a3b9d4", "#8ca2c8", "#718dbd"]
        }]
      },
      options: {
        responsive: false
      }
    });
  </script>
</body>
</html>
