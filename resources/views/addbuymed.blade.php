<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Careforu Add Buydata</title>

  <!-- Custom fonts for this template-->

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-md-6 col-sm-12">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div>
              <div>
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Buy Data
                      <i class="fa fa-pencil-square"></i>
                    </h1>
                  </div>
                  <form class="user" method="post" action="submitbuydata">
                    @csrf
                    <label for="name">Select list (select one):</label>
                    <select class="form-control" id="name" name="name">
                    <?php foreach($result as $data){ ?>
                      <option value="<?php echo $data->id ?>"><?php echo $data->name ?></option>
                    <?php } ?>
                    </select>
                    <br>
                    <label for="buydate">Choose buy date:</label>
                    <input class="form-control" type="date" id="buydate" name="buydate" required>
                    <br>
                    <label for="expdate">Choose expire date:</label>
                    <input class="form-control" type="date" id="expdate" name="expdate" required>
                    <br>
                    <label for="buyqty">Quantity:</label>
                    <input class="form-control" type="number" min="1" id="buyqty" name="buyqty" required>
                    <br>
                    <br>
                    <input type="submit" class="btn btn-success btn-user btn-block" value="Add Data">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
