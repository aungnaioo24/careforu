
@extends("master")

@section("body")
<div id="content">

        <!-- Begin Page Content -->
  <div class="container-fluid">

          <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
      <h1 class="h3 mb-0 text-gray-800">Daily Income/Outcome</h1>
    </div>

          <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">In/Out Datatable</h6>
      </div>
      <div class="card-header py-3">
        <a href="{{ url('addbuydata') }}" class="btn btn-warning btn-icon-split" style="margin-bottom: 5px; margin-top: 5px;">
          <span class="icon text-white-50">
            <i class="fa fa-pencil-square-o"></i>
          </span>
          <span class="text">Add Buy Data</span>
        </a>
        <a href="{{ url('addselldata') }}" class="btn btn-info btn-icon-split" style="margin-bottom: 5px; margin-top: 5px;">
          <span class="icon text-white-50">
            <i class="fa fa-pencil-square-o"></i>
          </span>
          <span class="text">Add Sell Data</span>
        </a>
      </div>
      <div class="card-header py-3">
        <form  class="form-inline" method="get" action="dailysearch">
          @csrf
          <input style="margin: 4px;" class="form-control" type="date" id="date" name="date"  value="<?php echo $date ?>" required>
          <input style="margin: 4px; margin-left: 0;" type="submit" class="btn btn-success" value="Search">
        </form>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Date/Time</th>
                <th>Name</th>
                <th>Medicine Name</th>
                <th>Selling Point</th>
                <th>Exp Date</th>
                <th>Original Price</th>
                <th>Selling Price</th>
                <th>Qty of item sold</th>
                <th>Income</th>
                <th>Qty of item bought</th>
                <th>Outcome</th>
              </tr>
            </thead>
            <tbody>
            <?php

            //buydata result
            $buytotal = 0;

            foreach($result1 as $data){ ?>
              <tr>
                <td style="font-weight: bold"><?php echo $data->buy_date ?><br><i style="color: orange">Buy Data</i></td>
                <td><?php echo $data->name ?></td>
                <td><?php echo $data->medname ?></td>
                <td><?php echo $data->sell_point ?></td>
                <td><?php echo substr($data->exp_date, 0, 10) ?></td>
                <td><?php echo $data->or_price ?></td>
                <td><?php echo $data->sell_price ?></td>
                <td>-</td>
                <td>-</td>
                <td><?php echo $data->buy_qty ?></td>
                <?php
                $totaloutcome = ($data->buy_qty*$data->or_price);
                $buytotal += $totaloutcome;
                ?>
                <td><?php echo $totaloutcome ?></td>
              </tr>
            <?php }

            //selldata result
            $selltotal = 0;

            foreach($result2 as $data){ ?>
              <tr>
                <td style="font-weight: bold"><?php echo $data->sell_date ?><br><i style="color: lightblue">Sell Data</i></td>
                <td><?php echo $data->name ?></td>
                <td><?php echo $data->medname ?></td>
                <td><?php echo $data->sell_point ?></td>
                <td><?php echo substr($data->exp_date, 0, 10) ?></td>
                <td><?php echo $data->or_price ?></td>
                <td><?php echo $data->sell_price ?></td>
                <td><?php echo $data->sell_qty ?></td>
                <?php
                $totalincome = ($data->sell_qty*$data->sell_price);
                $selltotal += $totalincome;
                ?>
                <td><?php echo $totalincome ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
            <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>Total income:</th>
                <th><?php echo $selltotal ?></th>
                <th>Total outcome:</th>
                <th><?php echo $buytotal ?></th>
              </tr>
            </tfoot>
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

  </div>
        <!-- /.container-fluid -->

</div>

<script>
  $(document).ready(function(){
    $("#nav1").addClass("active");
  });
</script>

@stop