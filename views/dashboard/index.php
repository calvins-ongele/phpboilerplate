<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require 'includes/header.inc.php' ?>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #chart-container {
           width: 700px;
           height: 450px;
        }
      </style>
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
         
        <?php 
        $pageid = 'home';
        
        require 'includes/sidebar.inc.php' ?>
        
        
        
        <div class="content-wrapper px-4 py-2">
            <div class="content-header"> 
            </div>
            <div class="content px-2">
                
                    <div class='container alert' >
                        
                        <?php if (isset($_GET['unauthorized'])) { ?>
                        <div class='alert alert-danger'>
                            You tried to visit unauthorized page. Please ask admins to elevate your role.
                        </div>
                        <?php } ?>
                         
                        
                        <div class='row'>  
                        
            				<div class="col-md-4 ml-xx2" >
            					<div class="single-bolg hover01 card alert" style='border-bottom:2px solid var(--blend)' >
            						<center><figure><i class="fas fa-users " alt="slide 1" style="font-size: 40px;color:var(--blend)"></i></figure></center>
            					 
            						<div class="blog-content"><br>
            							<span class='h4'>Total Users: <a  style='color:blue' href='/<?= PROFILE_NAV ?>/users'><?= number_format($this->more['users']) ?></a> </span>
            						</div>
            					</div>
            				</div>
            				
            				<div class="col-md-4 ml-xx2" >
            					<div class="single-bolg hover01 card alert" style='border-bottom:2px solid var(--blend)' >
            						<center><figure><i class="fas fa-headphones " alt="slide 1" style="font-size: 40px;color:var(--blend)"></i></figure></center>
            					 
            						<div class="blog-content"><br>
            							<span class='h4'>Support Tickets: <a  style='color:blue' href='/<?= PROFILE_NAV ?>/support_tickets'><?= number_format($this->more['contact']) ?></a> </span>
            						</div>
            					</div>
            				</div>
            				
            				<div class="col-md-4 ml-xx2" >
            					<div class="single-bolg hover01 card alert" style='border-bottom:2px solid var(--blend)' >
            						<center><figure><i class="fas fa-bar-chart " alt="slide 1" style="font-size: 40px;color:var(--blend)"></i></figure></center>
            					 
            						<div class="blog-content"><br>
            							<span class='h4'>Total Visits: <a  style='color:blue' href='/<?= PROFILE_NAV ?>/reports'><?= number_format($this->more['visits']) ?></a> </span>
            						</div>
            					</div>
            				</div>
                    
            			  
            				<hr>
            				<div class="card mb-4">
                        		<div class="card-header"> 
                        			Your Recent Logs [Max-50] 
                        		</div>
                        		<div class="card-body" style='max-height: 600px; overflow:auto;'>
                        			<div class="table-responsive">
                        				<table class="table table-bordered">
                        					<thead>
                        					    <tr>
                        							<th>Date</th> 
                        							<th>Narration</th>
                        							<th>Activity type</th> 
                        					    </tr>
                        					</thead>
                        					<tbody>
                        							    <?php  foreach($this->logs as $row) {   ?>
                        									<tr> 
                        									    <td><?php echo date('d-m-Y', $row['l_date'])   ?></td>
                        										<td><?php echo $row['l_message']   ?></td>  
                        										<td><?php echo $row['l_type'] ?></td>     
                        								         
                        								    </tr>
                        								    <?php } ?>
                        							 
                        					</tbody>
                        				</table>
                        			</div>
                        		</div>
                        	</div>
            				<hr>
            				
            				<div class="col-md-12 ml-xx2" style='background:black' >
            				    <div id="chart-container">
                                  <canvas id="ticketChart"></canvas>
                                </div>
            				</div>
                     
                            
                        </div>
                        
                        
 
                    </div>
                
                 
            </div>
        </div>
        
        
        <?php require 'includes/footer.inc.php' ?>
        
        <script>
        
        const ctx = document.getElementById('ticketChart').getContext('2d');

  const data = {
    labels: ['VIP', 'Regular', 'Early Bird', 'Student'],
    datasets: [
      {
        type: 'bar',
        label: 'Tickets Sold',
        data: [120, 350, 90, 60],
        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'],
        borderRadius: 10,
        yAxisID: 'y',
      },
      {
        type: 'line',
        label: 'Total Sales (KSh)',
        data: [60000, 105000, 27000, 12000], // Example: price x quantity
        borderColor: '#ffffff',
        backgroundColor: 'rgba(255, 255, 255, 0.2)',
        borderWidth: 2,
        tension: 0.4,
        fill: false,
        yAxisID: 'y1',
      }
    ]
  };

  const config = {
    data: data,
    options: {
      responsive: true,
      interaction: {
        mode: 'index',
        intersect: false
      },
      plugins: {
        title: {
          display: true,
          text: 'Ticket Sales vs. Revenue'
        },
        legend: {
          labels: {
            color: '#fff'
          }
        }
      },
      scales: {
        y: {
          type: 'linear',
          position: 'left',
          title: {
            display: true,
            text: 'Tickets Sold',
            color: '#fff'
          },
          ticks: {
            color: '#fff'
          },
          grid: {
            color: '#333'
          }
        },
        y1: {
          type: 'linear',
          position: 'right',
          title: {
            display: true,
            text: 'Revenue (KSh)',
            color: '#fff'
          },
          ticks: {
            color: '#fff'
          },
          grid: {
            drawOnChartArea: false
          }
        },
        x: {
          ticks: {
            color: '#fff'
          },
          grid: {
            color: '#333'
          }
        }
      }
    }
  };

  new Chart(ctx, config);
               
        </script> 
        <script>
            function copyFunc() {
              // Get the text field
              var copyText = document.getElementById("myInput");  
              copyText.select();
              copyText.setSelectionRange(0, 99999);  
              navigator.clipboard.writeText(copyText.value); 
              alert("Copied link to clipboard: " + copyText.value);
            }

            $(function() {
                $('.btncopy').click(function(e) {
                    e.preventDefault();
                    $('#myInput').val( $(this).attr('rel') );
                    copyFunc();
                });
                $('.deactivateservice').click(function(e) {
                    e.preventDefault();
                    var form = new FormData();
                    form.append('id', $(this).attr('rel') );
                    var data = _data(form ,'deactivateservice');
                    alert(data['msg']);
                    location.reload();
                     
                });
            });
        </script>
    </main> 
 
</body>

</html>