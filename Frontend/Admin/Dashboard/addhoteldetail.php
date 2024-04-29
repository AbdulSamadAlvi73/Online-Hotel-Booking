<?php
include("./conn.php");
if(isset($_POST['submit'])){
 $logo = $_FILES['logo']['name'];
 $image_temp = $_FILES['logo']['tmp_name'];
 $folder = "upload/";
 $target = $folder.$logo;
 move_uploaded_file($image_temp, $target);
 
  $manager = $_POST['manager'];
  
  $manager_img = $_FILES['manager_img']['name'];
  $image_temp = $_FILES['manager_img']['tmp_name'];
  $folder = "upload/";
  $target0 = $folder.$manager_img;
  move_uploaded_file($image_temp, $target0);

  $img1 = $_FILES['image1']['name'];
  $image_temp = $_FILES['image1']['tmp_name'];
  $folder = "upload/";
  $target1 = $folder.$img1;
  move_uploaded_file($image_temp, $target1);
  
  $img2 = $_FILES['image2']['name'];
  $image_temp = $_FILES['image2']['tmp_name'];
  $folder = "upload/";
  $target2 = $folder.$img2;
  move_uploaded_file($image_temp, $target2);
  
  $img3 = $_FILES['image3']['name'];
  $image_temp = $_FILES['image3']['tmp_name'];
  $folder = "upload/";
  $target3 = $folder.$img3;
  move_uploaded_file($image_temp, $target3); 
  
  $img4 = $_FILES['image4']['name'];
  $image_temp = $_FILES['image4']['tmp_name'];
  $folder = "upload/";
  $target4 = $folder.$img4;
  move_uploaded_file($image_temp, $target4);  
  
  $img5 = $_FILES['image5']['name'];
  $image_temp = $_FILES['image5']['tmp_name'];
  $folder = "upload/";
  $target5 = $folder.$img5;
  move_uploaded_file($image_temp, $target5); 
  
  $img6 = $_FILES['image6']['name'];
  $image_temp = $_FILES['image6']['tmp_name'];
  $folder = "upload/";
  $target6 = $folder.$img6;
  move_uploaded_file($image_temp, $target6);

  $hotel_id = $_POST['hotelid']; 

  $query = "INSERT INTO `hotel_details` (`logo`, `manager_name`, `manager_img`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`,`hotelid`) VALUES ('$target', '$manager', '$target0', '$target1', '$target2', '$target3', '$target4', '$target5', '$target6', '$hotel_id')";
  $query_run = mysqli_query($conn, $query);
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
            <h5 class="card-title">Add Hotal Details</h5>

            <!-- Vertical Form -->
            <form class="row g-3" action="#" method="POST" enctype="multipart/form-data">
            <div class="col-12">
                <label for="logo" class="form-label">Hotel Logo</label>
                <input type="file" class="form-control" id="logo" name="logo">
              </div>
              <div class="col-12">
                <label for="manager" class="form-label">Manager Name</label>
                <input type="text" class="form-control" id="manager" name="manager">
              </div>
              <div class="col-12">
                <label for="manager_img" class="form-label">Manager Picture</label>
                <input type="file" class="form-control" id="manager_img" name="manager_img">
              </div>
              <div class="col-12">
                <label for="hotel" class="form-label">Hotel Name</label>
                <select name="hotelid" id="hotel" class="form-control">
                  <option selected disabled>Choose Hotel</option>
                  <?php
                    $sql = "SELECT * FROM hotels";
                    $row = mysqli_query($conn,$sql);
                      while ($data = mysqli_fetch_assoc($row)) {
                          echo "<option value=\"" . $data['id'] . "\">" . $data['name'] . "</option>";
                      }
                  ?>
                </select>
              </div>
              <div class="col-6">
                <label for="image1" class="form-label">Slider First Image</label>
                <input type="file" class="form-control" id="image1" name="image1">
              </div>
              <div class="col-6">
                <label for="image2" class="form-label">Slider Second Image</label>
                <input type="file" class="form-control" id="image2" name="image2">
              </div>  
              <div class="col-6">
                <label for="image3" class="form-label">Slider Third Image</label>
                <input type="file" class="form-control" id="image3" name="image3">
              </div>  
              <div class="col-6">
                <label for="image4" class="form-label">Slider Fourth Image</label>
                <input type="file" class="form-control" id="image4" name="image4">
              </div>  
              <div class="col-6">
                <label for="image5" class="form-label">Slider Fiveth Image</label>
                <input type="file" class="form-control" id="image5" name="image5">
              </div> 
               <div class="col-6">
                <label for="image6" class="form-label">Slider Sixth Image</label>
                <input type="file" class="form-control" id="image6" name="image6">
              </div>
              <div class="text-center">
                <button type="submit" class="btn samad-btn-color" name="submit">Add</button>
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