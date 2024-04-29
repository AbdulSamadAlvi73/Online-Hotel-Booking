<?php 
include("./conn.php");
  $id=$_GET['id'];
  $sel="SELECT * FROM `meeting` WHERE id='$id'";
  $res=mysqli_query($conn,$sel);
  $row=mysqli_fetch_array($res);
 if(isset($_POST['submit'])){
  $hotal_name = $_POST['hotal_name'];
  $description = $_POST['description'];
  $city = $_POST['city'];
  $price = $_POST['price'];
  $image = $_FILES['image']['name'];
  $image_temp = $_FILES['image']['tmp_name'];
  $folder = "upload/";
  $target = $folder.$image;
  move_uploaded_file($image_temp, $target);

  $query = "UPDATE `meeting` SET `hotal_name`='$hotal_name', `description`='$description', `city`='$city', `price`='$price', `image`='$target' WHERE `id`='$id'";
  $query_run = mysqli_query($conn, $query);

    if($query_run) {
        header('location:viewmeeting.php');
    } else {
        echo "Update Unsuccessful";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Royal Edge</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../images/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>


 <!-- ======= Header ======= -->
 <?php
  include('./header.php');
  ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php
  include('./sidebar.php');
  ?>
 <!-- End Sidebar-->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Meeting</h5>

            <!-- Vertical Form -->
            <form class="row g-3" action="#" method="POST" enctype="multipart/form-data">
              <div class="col-12">
                <label for="hotal_name" class="form-label">Hotel Name</label>
                <input type="text" class="form-control" id="hotal_name" name="hotal_name" value="<?php echo $row['hotal_name']?>">
              </div>
              <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="<?php echo $row['description']?>">
              </div>
              <div class="col-12">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value="<?php echo $row['city']?>">
              </div>
              <div class="col-12">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo $row['price']?>">
              </div>
              <div class="col-12">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" value="<?php echo $row['image']?>">
              </div>
              <div class="text-center">
                <button type="submit" class="btn samad-btn-color" name="submit">Update</button>
              </div>
            </form><!-- Vertical Form -->
          </div>
        </div>


      </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include('./footer.php');
  ?>
 <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>