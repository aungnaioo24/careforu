
@extends("master")

@section("body")
<div id="content">

        <!-- Begin Page Content -->
  <div class="container-fluid">

          <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
      <h1 class="h3 mb-0 text-gray-800">Patience CV</h1>
    </div>

          <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Patience CV</h6>
      </div>
      <div class="card-header py-3">
        <a href="addbuydata" class="btn btn-warning btn-icon-split" style="margin-bottom: 5px; margin-top: 5px;">
          <span class="icon text-white-50">
            <i class="fa fa-pencil-square-o"></i>
          </span>
          <span class="text">Add New Patience</span>
        </a>
      </div>
      <div class="card-body">
        <h4><i class="fa fa-user"></i> Name: <?php echo $result->p_name ?></h4>
        <h5><i class="fa fa-user"></i> Father's Name: <?php echo $result->p_father ?></h5>
        <h5><i class="fa fa-birthday-cake"></i> Age: <?php echo $result->p_age ?></h5>
        <h5><i class="fa fa-id-card"></i> NRC: <?php echo $result->p_nrc ?></h5>
        <h5><i class="fa fa-phone"></i> Phone: <?php echo $result->p_phone ?></h5>
        <h5><i class="fa fa-address-book"></i> Address: <?php echo $result->p_address ?></h5>
      </div>
    </div>

  </div>
        <!-- /.container-fluid -->

</div>

@stop