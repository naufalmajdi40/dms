
<script src="<?php echo base_url('assets/bower_components/grafik/jquery-3.4.0.min.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/grafik/mdb.min.js')?>"></script>



<?php  
// echo "jancok"; 
$bulan = array();
$disturbance = array();
foreach($grafik_data as $data){
  $d1=strtotime($data->tanggal);
  
  array_push($bulan,date('F',$d1));
  array_push($disturbance,$data->jumlah);
  echo date('F',$d1)." jumlah ".$data->jumlah."<br>";

  
}

//$dataBulan = ["january"]
$dataChart = array_combine($bulan,$disturbance);

//print_r($dataChart);
//echo json_encode($bulan);

usort($dataChart, "compare_months");
print_r($dataChart);

function compare_months($a, $b) {
    $monthA = date_parse($a);
    $monthB = date_parse($b);
    
    return $monthA["month"] - $monthB["month"];
}


// $keys = ["2018-August","2018-October","2018-September","2019-January","2019-October"];
// $values = [21,3,3,1,1];

// For($i= strtotime($keys[0]); $i<=strtotime(end($keys)); $i+=86400*31){
//     $search = array_search(date("F", $i), $keys);
//     if($search !== false){
//         $new[$keys[$search]] = $values[$search];
//     }else{
//         $new[date("F", $i)] =0;
//     }
// }
// $new[end($keys)] = end($values); //add last item since I loop between the dates
// Var_dump($new);

?> 

<canvas id="pieChart" style="width:150px;height:150px"></canvas>


      <script>
       var canvas = document.getElementById('myChart');
        
        var data = {
            type: 'line',
            labels: <?php echo json_encode($bulan);?>,
            datasets: [
            {
                label: "Disturbance",
                fill: false,
                lineTension: 0.1,

                borderColor: "#ff5900cc",
                backgroundColor: "#ff5900cc",
                
                borderColor: "rgba(255,89,0,0.8)",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(255,89,0,0.8)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(255,89,0,0.8)",
                pointHoverBorderColor: "rgba(255,89,0,0.8)",
                pointHoverBorderWidth: 2,
                pointRadius: 5,
                pointHitRadius: 10,

                // pointBackgroundColor: "#fff",
                // pointBorderWidth: 1,
                // pointHoverRadius: 5,
                // pointHoverBackgroundColor: "rgba(200, 99, 132, .7)",
                // pointHoverBorderColor: "rgba(200, 99, 132, .7)",
                // pointHoverBorderWidth: 2,
                // pointRadius: 5,
                // pointHitRadius: 10,
                data: <?php echo json_encode($disturbance);?>,
            }
            ]
            
        };

        var option = 
        {
          showLines: true,
          responsive : true,
          animation: {duration: 0}
        };
        
        var myLineChart = Chart.Line(canvas,{
          data:data,
          options:option
        });

      </script>   





<script>
     var chartColors = {
	red: 'rgb(255, 99, 132)',
	orange: 'rgb(255, 159, 64)',
	yellow: 'rgb(255, 205, 86)',
	green: 'rgb(75, 192, 192)',
	blue: 'rgb(54, 162, 235)',
	purple: 'rgb(153, 102, 255)',
	grey: 'rgb(201, 203, 207)'
};
var effectColors = {
	highlight: 'rgba(255, 255, 255, 0.75)',
	shadow: 'rgba(0, 0, 0, 0.5)',
	glow: 'rgb(255, 255, 0)'	
};

function randomScalingFactor() {
	return Math.round(Math.random() * 100);
}

var color = Chart.helpers.color;
var config = {
	type: 'doughnut',
	data: {
		// labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
		datasets: [{
			data: [100, 5, 2, 3, 6],
			backgroundColor: [
				window.chartColors.red,
				window.chartColors.orange,
				window.chartColors.yellow,
				window.chartColors.green,
				window.chartColors.blue,
			],
			shadowOffsetX: 3,
			shadowOffsetY: 3,
			shadowBlur: 10,
			shadowColor: effectColors.shadow,
			bevelWidth: 2,
			bevelHighlightColor: effectColors.highlight,
			bevelShadowColor: effectColors.shadow,
			hoverInnerGlowWidth: 20,
			hoverInnerGlowColor: effectColors.glow,
			hoverOuterGlowWidth: 20,
			hoverOuterGlowColor: effectColors.glow
		}],
		labels: [
			'Red',
			'Orange',
			'Yellow',
			'Green',
			'Blue'
		]
	},
	options: {
		title: {
            responsive : true,
			display: true,
			// text: 'Mixed (doughnut chart) sample'
		},
		tooltips: {
			shadowOffsetX: 3,
			shadowOffsetY: 3,
			shadowBlur: 10,
			shadowColor: effectColors.shadow,
			bevelWidth: 2,
			bevelHighlightColor: effectColors.highlight,
			bevelShadowColor: effectColors.shadow
		},
		animation: {
			animateScale: true,
			animateRotate: true
		},
		layout: {
			padding: {
				bottom: 10
			}
		}
	}
};

window.onload = function() {
	var ctx = document.getElementById('pieChart').getContext('2d');
	window.myChart = new Chart(ctx, config);
};

document.getElementById('randomizeData').addEventListener('click', function() {
	config.data.datasets.forEach(function(dataset) {
		dataset.data = dataset.data.map(function() {
			return randomScalingFactor();
		});
	});
	window.myChart.update();
});

var colorNames = Object.keys(chartColors);
document.getElementById('addDataset').addEventListener('click', function() {
	var colorName = colorNames[config.data.datasets.length % colorNames.length];
	var newColor = chartColors[colorName];
	var newDataset = {
		data: [],
		backgroundColor: [],
		shadowOffsetX: 3,
		shadowOffsetY: 3,
		shadowBlur: 10,
		shadowColor: effectColors.shadow,
		bevelWidth: 2,
		bevelHighlightColor: effectColors.highlight,
		bevelShadowColor: effectColors.shadow,
		hoverInnerGlowWidth: 20,
		hoverInnerGlowColor: effectColors.glow,
		hoverOuterGlowWidth: 20,
		hoverOuterGlowColor: effectColors.glow
	};

	for (var index = 0; index < config.data.labels.length; ++index) {
		newDataset.data.push(randomScalingFactor());

		var colorName = colorNames[index % colorNames.length];
		var newColor = window.chartColors[colorName];
		newDataset.backgroundColor.push(newColor);
	}

	config.data.datasets.push(newDataset);
	window.myChart.update();
});

document.getElementById('removeDataset').addEventListener('click', function() {
	config.data.datasets.pop();
	window.myChart.update();
});

document.getElementById('addData').addEventListener('click', function() {
	if (config.data.datasets.length > 0) {
		var colorName = colorNames[config.data.datasets[0].data.length % colorNames.length];
		var newColor = window.chartColors[colorName];

		config.data.labels.push(colorName.charAt(0).toUpperCase() + colorName.slice(1));

		config.data.datasets.forEach(function(dataset) {
			dataset.data.push(randomScalingFactor());
			dataset.backgroundColor.push(newColor);
		});

		window.myChart.update();
	}
});

document.getElementById('removeData').addEventListener('click', function() {
	config.data.labels.splice(-1, 1); // remove the label first

	config.data.datasets.forEach(function(dataset) {
		dataset.data.pop();
		dataset.backgroundColor.pop();
	});

	window.myChart.update();
});
      </script>   
