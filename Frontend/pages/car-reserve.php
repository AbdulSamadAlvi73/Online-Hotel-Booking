<?php
// include("../Admin/conn.php");
session_start();
$conn = mysqli_connect('localhost','root','','royal_edge');


if (isset($_SESSION['user_email'])) {
}
else{
   echo "<script>alert('Please Login First')
   window.location.href='./User-Login.php'</script>";
   exit();
}




if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $cnic_no = $_POST['cnic_no'];
  $pickup_date = $_POST['pickup_date'];
  $dropof_date = $_POST['dropof_date'];
  $hotel = $_POST['hotel'];
  $car_name = $_POST['car_name'];
  $payment_method = $_POST['payment_method'];
  // $user_id =$_POST['bid'];
  //   $cnic_img = $_FILES['image']['name'];
//   $image_temp = $_FILES['image']['tmp_name'];
//   $folder = "../Admin/Dashboard/upload/";
//   $target = $folder.$cnic_img;
//   move_uploaded_file($image_temp, $target);

  $reservequery = "INSERT INTO `booked_carrental` (`name`, `email`, `phone`,`cnic_no`, `pickup_date`, `dropof_date`,`car_name`,`hotel`,`payment_method`) VALUES ('$name','$email','$phone','$cnic_no','$pickup_date','$dropof_date','$car_name','$hotel','$payment_method')";
  $query_run = mysqli_query($conn,$reservequery);



  $msg="Thanks Your Message is Submited";
	
	$html="
  <h2 style='font-size:13px;'>Your Car Booking is Confirm, Here is your Details:</h2>
  <table>
  <tr>
  <th style='text-align:left;'>Name:</th>
  <td>$name</td>
  </tr>
  <tr>
  <th style='text-align:left;'>Email:</th>
  <td>$email</td>
  </tr>
  <tr>
  <th style='text-align:left;'>Car Name:</th>
  <td>$car_name</td>
  </tr>
  <tr>
  <th style='text-align:left;'>Hotel:</th>
  <td>$hotel</td>
  </tr>
  <tr>
  <th style='text-align:left;'>Pickup Date:</th>
  <td>$pickup_date</td>
  </tr>
  <tr>
  <th style='text-align:left;'>Dropof Date:</th>
  <td>$dropof_date</td>
  </tr>
  <tr>
  <th style='text-align:left;'>Payment Method:</th>
  <td>$payment_method</td>
  </tr>
  </table>";
	
	include('../smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="samadalvihafizabdul@gmail.com";
	$mail->Password="oyam wefr dmxn edih";
	$mail->SetFrom("samadalvihafizabdul@gmail.com");
	$mail->addAddress("$email");
	$mail->IsHTML(true);
	$mail->Subject="Royal Edge - Booking Confirm";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		//echo "Mail send";
	}else{
		//echo "Error occur";
	}
	// echo $msg;


  
  
  
}
?>

<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $conn = mysqli_connect('localhost','root','','royal_edge');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <title>Royal Edge</title>
</head>

<body>
    <!-- navbar-section-start -->
    <?php
         include("./assets/header.php");
    ?>
    <!-- navbar-section-end -->

    <!-- our-hotels-start -->
    <section>
        <div class="noor-hotels-container">

            <div class="samad-car-rental-info-box">
                <div class="noor-info-bgr">
                    <div class="noor-info-text">
                        <h1>Car Rentals</h1>
                        <h3>24/7 Available For You</h3>
                        <h5>In Best Price <i class="fa-solid fa-leaf"></i></h5>
                    </div>
                </div>
            </div>

<div class="noor-hotel-list-container samad-car-rental-reserve">
            <?php
                $query = "SELECT * from car_rental where id = $id ";
                 $query_run = mysqli_query($conn, $query);
                 while ($row = mysqli_fetch_assoc($query_run)) {            
            ?>
    <div class="noor-hotel-right-col samad-car-rental-reserve-detail">
        <div class="noor-hotel-sidebar">
            <h3><?php echo $row['car_name'] ?></h3>
            <div class="noor-hotel-options">
                <div class="noor-hotel-price">
                    <div class="row text-center">
                        <h5 style="text-align: left;">Car Color: White</h5>
                        <hr>
                        <h5 style="text-align: left;">Seats: <?php echo $row['seats'] ?></h5>
                        <hr>
                        <h5 style="text-align: left;">Big Siutcases: <?php echo $row['big_suitcases'] ?> Bags</h5>
                        <hr>
                        <h5 style="text-align: left;">Small Siutcases: <?php echo $row['small_suitcases'] ?> Bags</h5>
                        <hr>
                        <h5 style="text-align: left;">Per Day: <?php echo $row['price'] ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    } 
    ?>

    <div class="noor-hotel-left-col">
        <div class="card noor-hotel-box">
          <div class="card-body samad-car-rental-reserve-form">

        
          <?php 
                $query = "SELECT * from car_rental where id = $id ";
                 $query_run = mysqli_query($conn, $query);
                 while ($row = mysqli_fetch_assoc($query_run)) {     
            ?>

            <h5 class="card-title">Car Reservation Form</h5>
            <hr>
            <!-- Vertical Form -->
            <form class="row g-3"action="#" method="POST" enctype="multipart/form-data">
            <?php
            $id = $_SESSION['user_id'];

            $sql = "SELECT * from `user-account` Where `uid` = '$id'";
            $query = mysqli_query($conn, $sql);
            if (mysqli_num_rows($query) == 1) {
                $roww = mysqli_fetch_assoc($query);
            ?>
              <div class="col-md-6 col-sm-12">
                <label for="name" class="form-label">Name:</label>
                <!-- <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="bid" id=""> -->
                <input type="name" class="form-control" id="name" value="<?php echo $roww['username'] ?>" name="name" placeholder="Name">
              </div>
              <?php
            }
              ?>
              <div class="col-md-6 col-sm-12">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              </div>
              <div class="col-md-6 col-sm-12">
                <label for="carname" class="form-label">Car Name:</label>
                <input type="text" class="form-control" id="carname" value="<?php echo $row['car_name'] ?>" name="car_name" placeholder="Car Name">
              </div>
              <div class="col-md-6 col-sm-12">
                <label for="phone" class="form-label">Phone no:</label>
                <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone">
              </div>
              <div class="col-md-6 col-sm-12">
                <label for="hotel" class="form-label">Hotel:</label>
                <input type="text" class="form-control" id="hotel" name="hotel" placeholder="Hotel">
              </div>
              <div class="col-md-6 col-sm-12">
                <label for="cnic_no" class="form-label">CNIC No:</label>
                <input type="number" class="form-control" id="cnic_no" name="cnic_no" placeholder="Cnic">
              </div>
              <div class="col-md-6 col-sm-12">
                <label for="pickup_date" class="form-label">Pickup Date:</label>
                <input type="date" class="form-control" id="pickup_date" name="pickup_date">
              </div>
              <div class="col-md-6 col-sm-12">
                <label for="dropof_date" class="form-label">Drop of Date:</label>
                <input type="date" class="form-control" id="dropof_date" name="dropof_date">
              </div>
              <div class="col-md-12 col-sm-12">
                <label for="payment_method" class="form-label">Payment Method:</label>
                <select class="form-select" name="payment_method" id="payment_method">
                    <option selected>Select Payment Method</option>
                    <option value="Cash Payment">Cash Payment</option>
                </select>
              </div>
<!--               
              <div class="col-md-6 col-sm-12">
                <label for="city" class="form-label">City:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="City">
              </div> -->
              <!-- <div class="col-12">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" class="form-control" id="image" name="image">
              </div> -->
              <div class="text-center">
                <button type="submit" name="submit" class="btn">Booked</button>
              </div>
            </form><!-- Vertical Form -->
            <?php 
                 }
              ?>
          </div>
        </div>
      </div>
    </div>
   </div>
    </section>
    <!-- our-hotels-end -->

    <!-- Footer-Start -->
    <?php
    include('./assets/footer.php')
    ?>
    <!-- Footer-End -->

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript" src="../javascript/script.js"></script>
</body>

</html>