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