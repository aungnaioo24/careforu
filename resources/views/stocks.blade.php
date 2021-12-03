
@extends("master")

@section("body")
<div id="content">

        <!-- Begin Page Content -->
  <div class="container-fluid">

          <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
      <h1 class="h3 mb-0 text-gray-800">Stocks</h1>
    </div>

          <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Stocks Datatable</h6>
      </div>
      <div class="card-header py-3">
        <a href="addbuydata" class="btn btn-warning btn-icon-split" style="margin-bottom: 5px; margin-top: 5px;">
          <span class="icon text-white-50">
            <i class="fa fa-pencil-square-o"></i>
          </span>
          <span class="text">Add New Medicines</span>
        </a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Expire Date</th>
                <th>Quantity</th>
              </tr>
            </thead>
            <tbody>
            <?php

            foreach($result as $data){ ?>
              <tr>
                <td><?php echo $data->name ?></td>
                <td><?php echo $data->stocks_exp_date ?></td>
                <td><?php echo $data->qty ?></td>
              </tr>

            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-header py-3">
        <a href="{{ url('logout') }}" class="btn btn-danger btn-icon-split" style="margin-bottom: 5px; margin-top: 5px;">
          <span class="icon text-white-50">
            <i class="fa fa-angle-double-left"></i>
          </span>
          <span class="text">Logout</span>
        </a>
      </div>
    </div>
    
    <div id="chartContainer" style="height: 370px; width: 100%;" class="card shadow mb-4"></div>
  </div>
        <!-- /.container-fluid -->

</div>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
  
  window.onload = function() {

    var chart = new CanvasJS.Chart("chartContainer", {
	    animationEnabled: true,
	    title: {
		    text: "Stock Chart"
    	},
	    data: [{
		    type: "pie",
	  	  startAngle: 240,
	  	  yValueFormatString: "##0.00\"%\"",
	  	  indexLabel: "{label} {y}",
        
        <?php
        $total = $resultTotalQty->totalqty;
        ?>

	  	  dataPoints: [

          <?php foreach($resultForChart as $data){ ?>

	  	  	{y: <?php echo ($data->qty/$total)*100 ?>, label: "<?php echo $data->name ?>"},

          <?php } ?>

	    	]
  	  }]
    });
    chart.render();
  }

  $(document).ready(function(){
    $("#nav3").addClass("active");
  });
</script>

@stop