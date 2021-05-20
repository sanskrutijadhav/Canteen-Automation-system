$(document).ready(function(){

	$.ajax({
		url: "http://localhost/PHP/kamu/files/admin/chr/data.php",
		method: "GET",
		data: $('#myform').serialize(),
		success: function(data) {
			console.log(data);
			var cr = [];
			var co = [];
		
		
			for(var i in data) {
				cr.push(data[i].label);
				co.push(data[i].y);
			}
			

			var chartdata = {
				labels: cr,
				datasets : [
					{
						label: 'Orders Analysis Bar Graph',
						backgroundColor: 'rgba(200,200,200,0,0.75)',
					    borderColor:'rgba(200,200,200,0,0.75)',
						hoveBackgroundColor:'rgba(200,200,200,0,1)',
						hoverBorderColor:'rgba(200,200,200,0,1)',
						data: co
					} 
				],
			}
				
		

			var ctx = $("#mycanvase");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata,
				    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true

                },
		
			scaleLabel: {
        			display: true,
       			 labelString: 'No.of Orders'
      			}
            }],
			xAxes: [{
                ticks: {
					autoSkip:false,
					maxRotation:90,
					minRotation:90,
                },
                scaleLabel: {
        			display: true,
       			 labelString: 'Food Items'
      			}
            }]
        }
    }
			});
		},
		
		error: function(data) {
			console.log(data);
		}
	});
});
