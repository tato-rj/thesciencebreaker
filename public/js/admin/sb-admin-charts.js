// Chart.js scripts
// -- Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// -- Bar Chart Example
$barChart = $("#myBarChart");
$color = $barChart.attr('data-color');
$labels = [];
$data = [];
$barChart.children().each(function() {
	$labels.push($(this).attr('data-month'));
	$data.push(parseInt($(this).attr('data-count')));
});
$max = Math.max.apply(Math,$data)+2;
var myLineChart = new Chart($barChart, {
  type: 'bar',
  data: {
    labels: $labels,
    datasets: [{
      label: "New Breaks",
      backgroundColor: $color,
      borderColor: "#06b2b8",
      data: $data,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: $max,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

// -- Pie Chart Example
$pieChart = $("#myPieChart");
$colors = [];
$labels = [];
$data = [];
$pieChart.children().each(function() {
	$colors.push($(this).attr('data-color'));
	$labels.push($(this).attr('data-category'));
	$data.push($(this).attr('data-count'));
});

var myPieChart = new Chart($pieChart, {
  type: 'pie',
  data: {
    labels: $labels,
    datasets: [{
      data: $data,
      backgroundColor: $colors,
    }],
  },
});
