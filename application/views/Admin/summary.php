<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
      google.charts.load('visualization', "1", {
          packages: ['corechart']
      });
  </script>

  <!-- javascript -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Graphical Representation <?php //echo date("d/m/Y")?>
            <i class="fa fa-globe" aria-hidden="true"><?php echo $totalMaleFemale;?></i>&nbsp;&nbsp;&nbsp;&nbsp;
            <i class="fa fa-male" aria-hidden="true"><?php echo $male;?></i>&nbsp;&nbsp;&nbsp;&nbsp;    
            <i class="fa fa-female" aria-hidden="true"><?php echo $female;?></i>
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $this->session->userdata['username'];?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->

      <div class="page-content-toggle" id="page-content-wrapper">
		  <div class="container-fluid">

			<!-- 1st row -->
        <div class="row m-b-2">
          <div class="col-lg-4">
            <div class="card card-block">
              
              <div id="year"></div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-block">
             
              <div id="gender"></div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-block">
              
              <div id="category"></div>
            </div>
          </div>
        </div>
        <!-- /1st row -->

        <!-- 2nd row -->
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-block">
              <div id="nssYear"></div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card card-block">
              <div id="Branch"></div>
            </div>
          </div>
        </div>
			<!-- /2nd row -->

    </div>
      </div>
      
      
        <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- <?php //echo "<pre>";
print_r($category); ?>   -->


  <script type="text/javascript">
    $(document).ready(function() {
      $("#dashboardMainMenu").addClass('active');
    });
  </script>


    <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'students'],
                ['1st', <?php echo $year1?>],
                ['2nd', <?php echo $year2?>],
                ['3rd', <?php echo $year3?>],
                ['4th', <?php echo $year4?>],
                ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'YEAR', 'width':400, 'height':235};

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('year'));
        chart.draw(data, options);
        }
    </script>
  
  <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['GENDER', 'students'],
                ['Boys', <?php echo $male?>],
                ['Girls', <?php echo $female?>],
                ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'GENDER', 'width':400, 'height':235};

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('gender'));
        chart.draw(data, options);
        }
    </script>

<script type="text/javascript">
	
  // Load google charts
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  
  // Draw the chart and set the chart values
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['CATEGORY', 'students'],
      <?php
      foreach($category as $row){
        echo "['".$row['category']."',".$row['count(*)']."],";
      }
  
      ?>
      ]);
  
    // Optional; add a title and set the width and height of the chart
    var options = {'title':'CATEGORY', 'width':400, 'height':235};
  
    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('category'));
    chart.draw(data, options);
  }
  </script>
   

   <script type="text/javascript">
	
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    
    // Draw the chart and set the chart values
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['NSS JOINING YEAR', 'students'],
        <?php
        
        foreach($nssYear as $row){
          echo "['".$row['nssYear']."',".$row['count(*)']."],";
        }
    
        ?>
        ]);
    
      // Optional; add a title and set the width and height of the chart
      var options = {'title':'NSS JOINING YEAR', 'width':550, 'height':235};
    
      // Display the chart inside the <div> element with id="piechart"
      var chart = new google.visualization.PieChart(document.getElementById('nssYear'));
      chart.draw(data, options);
    }
  </script>
  

  <script type="text/javascript">
	
  // Load google charts
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  
  // Draw the chart and set the chart values
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Branch', 'students'],
      <?php
      
      foreach($branch as $row){
        echo "['".$row['branch']."',".$row['count(*)']."],";
      }
  
      ?>
      ]);
  
    // Optional; add a title and set the width and height of the chart
    var options = {'title':'Branch', 'width':550, 'height':235};
  
    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('Branch'));
    chart.draw(data, options);
  }
  </script>


  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
	<script src="<?= base_url('assets/vendor/bootstrap/js/bootstr')?>ap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
   <script src="<?= base_url('assets/vendor/jquery-easing/jquery')?>.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="<?= base_url('assets/vendor/chart.js/Chart.min.j')?>s"></script>
  <script src="<?= base_url('assets/vendor/datatables/jquery.da')?>taTables.js"></script>
	<script src="<?= base_url('assets/vendor/datatables/dataTable')?>s.bootstrap4.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url('assets/js/sb-admin.min.js')?>"></script>

	<!-- Demo scripts for this page-->
	<script src="<?= base_url('assets/js/demo/datatables-demo.js')?>"></script>
	<script src="<?= base_url('assets/js/demo/chart-area-demo.js')?>"></script>