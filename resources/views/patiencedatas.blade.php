
@extends("master")

@section("body")
<div id="content">

        <!-- Begin Page Content -->
  <div class="container-fluid">

          <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
      <h1 class="h3 mb-0 text-gray-800">Patience Datas</h1>
    </div>

          <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Patience Datas Datatable</h6>
      </div>
      <div class="card-header py-3">
        <a href="addbuydata" class="btn btn-warning btn-icon-split" style="margin-bottom: 5px; margin-top: 5px;">
          <span class="icon text-white-50">
            <i class="fa fa-pencil-square-o"></i>
          </span>
          <span class="text">Add New Data</span>
        </a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Date</th>
                <th>Name</th>
                <th>NRC</th>
                <th>Blood Pressure Result</th>
                <th>Urine(Sugar) Result</th>
              </tr>
            </thead>
            <tbody>
            <?php

            foreach($result as $data){ ?>
              <tr>
                <td><?php echo $data->pt_date ?></td>
                <td><a href="patiencescv/<?php echo $data->p_id ?>"><?php echo $data->p_name ?></a></td>
                <td><?php echo $data->p_nrc ?></td>
                <td><?php echo $data->pt_bloodtest ?></td>
                <td><?php echo $data->pt_urinetest ?></td>
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

  </div>
        <!-- /.container-fluid -->

</div>

<script>
  $(document).ready(function(){
    $("#nav5").addClass("active");
  });
</script>

@stop