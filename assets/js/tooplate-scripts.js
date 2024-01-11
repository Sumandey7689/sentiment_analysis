const width_threshold = 480;

function drawLineChart(data) {
  if ($("#lineChart").length) {
    ctxLine = document.getElementById("lineChart").getContext("2d");
    optionsLine = {
      scales: {
        yAxes: [
          {
            scaleLabel: {
              display: true,
            },
          },
        ],
      },
    };

    optionsLine.maintainAspectRatio =
      $(window).width() < width_threshold ? false : true;

    configLine = {
      type: "line",
      data: {
        labels: Object.values(data.labels),
        datasets: [
          {
            label: "Positive Sentiment",
            data: Object.values(data.columnValues),
            fill: false,
            borderColor: "rgb(75, 192, 192)",
            cubicInterpolationMode: "monotone",
            pointRadius: 5,
          },
        ],
      },
      options: optionsLine,
    };

    lineChart = new Chart(ctxLine, configLine);
  }
}

function drawBarChart(data) {
  if ($("#barChart").length) {
    ctxBar = document.getElementById("barChart").getContext("2d");

    optionsBar = {
      responsive: true,
      scales: {
        yAxes: [
          {
            barPercentage: 0.2,
            ticks: {
              beginAtZero: true,
            },
            scaleLabel: {
              display: true,
            },
          },
        ],
      },
    };

    optionsBar.maintainAspectRatio =
      $(window).width() < width_threshold ? false : true;

    configBar = {
      type: "bar",
      data: {
        labels: ["Neutral", "Positive", "Negative"],
        datasets: [
          {
            label: "Sentiment Analysis",
            data: Object.values(data.countSentiment),
            backgroundColor: ["#A8D582", "#4ED6B8", "#F7604D"],
            borderWidth: 0,
          },
        ],
      },
      options: optionsBar,
    };

    barChart = new Chart(ctxBar, configBar);
  }
}

function drawPieChart(data) {
  if ($("#pieChart").length) {
    var chartHeight = 300;

    $("#pieChartContainer").css("height", chartHeight + "px");

    ctxPie = document.getElementById("pieChart").getContext("2d");

    optionsPie = {
      responsive: true,
      maintainAspectRatio: false,
      layout: {
        padding: {
          left: 10,
          right: 10,
          top: 10,
          bottom: 10,
        },
      },
      legend: {
        position: "top",
      },
    };

    configPie = {
      type: "pie",
      data: {
        datasets: [
          {
            data: Object.values(data.countSentiment),
            backgroundColor: ["#A8D582", "#4ED6B8", "#F7604D"],
            label: "Sentiment Distribution",
          },
        ],
        labels: ["Neutral", "Positive", "Negative"],
      },
      options: optionsPie,
    };

    pieChart = new Chart(ctxPie, configPie);
  }
}

if (localStorage.getItem("SearchUsername")) {
  var username = localStorage.getItem("SearchUsername");
  localStorage.removeItem("SearchUsername");
}

var apiUrl = "api.php?username=" + encodeURIComponent(username);

fetch(apiUrl)
  .then((response) => {
    if (!response.ok) {
      throw new Error("Network response was not ok");
    }
    return response.json();
  })
  .then((data) => {
    drawLineChart(data);
    drawBarChart(data);
    drawPieChart(data);
  })
  .catch((error) => {
    console.error("Error fetching data:", error);
  });

function updateLineChart() {
  if (lineChart) {
    lineChart.options = optionsLine;
    lineChart.update();
  }
}

function updateBarChart() {
  if (barChart) {
    barChart.options = optionsBar;
    barChart.update();
  }
}
