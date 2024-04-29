<?php
// include("../Admin/conn.php");
session_start();
$conn = mysqli_connect('localhost','root','','royal_edge');

if (isset($_SESSION['user_email'])) {
}
else{
   echo "<script>alert('Please login first')
   window.location.href='./User-Login.php'</script>";
// echo " 
// Swal.fire({
//     icon: 'error',
//     title: 'Oops...',
//     text: 'Something went wrong!',
//     footer:})";
   exit();
}

if(isset($_POST['submit'])){
   
  $name = $_POST['name'];
  $user_id=$_POST['bid'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $person = $_POST['person'];
  $catagory = $_POST['catagory'];
  $hotel = $_POST['hotel'];
  $checkin_date = $_POST['checkin_date'];
  $checkout_date = $_POST['checkout_date'];
  $cnic_no = $_POST['cnic_no'];
  $payment_method = $_POST['payment_method'];

  $cnic_img = $_FILES['image']['name'];
  $image_temp = $_FILES['image']['tmp_name'];
  $folder = "../Admin/Dashboard/upload/";
  $target = $folder.$cnic_img;
  move_uploaded_file($image_temp, $target);

  $reserved_query = "INSERT INTO `booked_hotel` (`name`, `email`, `phone`,`person`,`catagory`, `hotel`, `checkin_date`,`checkout_date`,`cnic_no`,`cnic_img`,`payment_method`,`user_id`) VALUES ('$name','$email','$phone','$person','$catagory','$hotel','$checkin_date','$checkout_date','$cnic_no','$target','$payment_method','$user_id')";
  $query_run = mysqli_query($conn,$reserved_query);


//   $select_id="SELECT MAX(id) as bookid FROM booked_hotel";
//   $res2=mysqli_query($conn,$select_id);
//   while($x`=mysqli_fetch_assoc($res2))
//   {
//       $insert="INSERT INTO ";
//   }
 

 
  $msg="Thanks Your Message is Submited";
	
	$html="
    <h2 style='font-size:13px;'>Your Hotel Reservation is Confirm, Here is your Details:</h2>
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
    <th style='text-align:left;'>Person:</th>
    <td>$person</td>
    </tr>
    <tr>
    <th style='text-align:left;'>Room Catagory:</th>
    <td>$catagory</td>
    </tr>
    <tr>
    <th style='text-align:left;'>Hotel:</th>
    <td>$hotel</td>
    </tr>
    <tr>
    <th style='text-align:left;'>Checkin Date:</th>
    <td>$checkin_date</td>
    </tr>
    <tr>
    <th style='text-align:left;'>Checkout Date:</th>
    <td>$checkout_date</td>
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
	$mail->Subject="Royal Edge - Reservation Confirm";
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
    // $query = "SELECT * from hotels where id = $id ";
    $query = "SELECT hotels.name, hotels.description , hotels.price , hotel_details.logo , hotel_details.manager_name , hotel_details.manager_img , hotel_details.img1 , hotel_details.img2 , hotel_details.img3 , hotel_details.img4 , hotel_details.img5 , hotel_details.img6 FROM hotels

    INNER JOIN hotel_details
    
    ON hotels.id=hotel_details.hotelid
    
    WHERE hotel_details.hotelid= $id";

    $row = mysqli_query($conn,$query);


 
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

    <!-- our-hotel-rooms-start -->
    <section>

        <div class="noor-hotel-room-container">
            <div class="noor-hotel-bgr">
                <div class="noor-hotel-room-aera">

                    <div class="noor-room-left-col">
                        <div class="noor-room-box">
                        <div class="card-body samad-car-rental-reserve-form">

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];    
    $query = "SELECT hotels.name, hotels.description , hotels.price , hotel_details.logo , hotel_details.manager_name , hotel_details.manager_img , hotel_details.img1 , hotel_details.img2 , hotel_details.img3 , hotel_details.img4 , hotel_details.img5 , hotel_details.img6, hotel_details.hotelid  FROM hotels
    INNER JOIN hotel_details
    ON hotels.id=hotel_details.hotelid
    WHERE hotel_details.hotelid= $id";
    $query_run = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($query_run)){
?>

            <h5 class="card-title">Hotel Reservation Form</h5>
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
                <label for="name" class="form-label">Full Name:</label>
                <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="bid" id="">
                <input type="name" class="form-control" id="name" value="<?php echo $roww['username'] ?>"  name="name" placeholder="Name">
              </div>          
              <?php
            }
              ?>
              <div class="col-md-6 col-sm-12">
                <label for="email" class="form-label">Email Address:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              </div>
              <div class="col-md-6 col-sm-12">
                <label for="phone" class="form-label">Phone no:</label>
                <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone">
              </div>
              <div class="col-md-6 col-sm-12">
                <label for="person" class="form-label">Persons:</label>
                <input type="number" class="form-control" id="person" name="person" placeholder="Persons">
              </div>
              <div class="col-md-6 col-sm-12">
                <label for="" class="form-label">Room Catagory:</label>
                <select class="form-select" name="catagory" id="catagory">
                    <option selected>Select Catagory</option>
                    <option value="Standard Room">Standard Room</option>
                    <option value="Premium Room">Premium Room</option>
                    <option value="Deluxe Room">Deluxe Room</option>
                </select>
              </div>
              <div class="col-md-6 col-sm-12">
                <label for="hotel" class="form-label">Hotel:</label>
                <input type="text" class="form-control" id="hotel" value="<?php echo $row['name'] ?>" name="hotel" placeholder="hotel">
              </div>
              <!-- <div class="col-6">
                <label for="city" class="form-label">City:</label>
                <input type="text" class="form-control" id="city" value="<?php echo $row['name'] ?>" name="city" placeholder="City">
              </div> -->
              <div class="col-md-6 col-sm-12">
                <label for="checkin" class="form-label">Checkin Date:</label>
                <input type="date" class="form-control" id="checkin" name="checkin_date">
              </div>
              <div class="col-md-6 col-sm-12">
                <label for="checkout" class="form-label">Checkout Date:</label>
                <input type="date" class="form-control" id="checkout" name="checkout_date">
              </div>
              <div class="col-md-6 col-sm-12">
                <label for="cnic_no" class="form-label">CNIC no:</label>
                <input type="number" class="form-control" id="cnic_no" name="cnic_no" placeholder="CNIC">
              </div>
              <div class="col-md-6 col-sm-12">
                <label for="image" class="form-label">CNIC Img</label>
                <input type="file" class="form-control" id="image" name="image">
              </div>
              <div class="col-md-12 col-sm-12">
                <label for="payment_method" class="form-label">Payment Method:</label>
                <select class="form-select" name="payment_method" id="payment_method">
                    <option selected>Select Payment Method</option>
                    <option value="Cash Payment">Cash Payment</option>
                </select>
              </div>
              <div class="text-center">
                <button type="submit" name="submit" class="btn">Reserved</button>
              </div>
            </form><!-- Vertical Form -->
            <?php 
}
}
            ?>
          </div>
                        </div>
                    </div>

                    <!-- sidebar-hotel-room-info-start-->
                    <div class="noor-room-right-col">
                        <div class="noor-room-content">
                        <?php

                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                
                            $query = "SELECT hotels.name, hotels.description , hotels.price , hotel_details.logo , hotel_details.manager_name , hotel_details.manager_img , hotel_details.img1 , hotel_details.img2 , hotel_details.img3 , hotel_details.img4 , hotel_details.img5 , hotel_details.img6, hotel_details.hotelid  FROM hotels

                            INNER JOIN hotel_details
                            
                            ON hotels.id=hotel_details.hotelid
                            
                            WHERE hotel_details.hotelid= $id";
                            $query_run = mysqli_query($conn,$query);
                            while($row = mysqli_fetch_assoc($query_run)){

                        ?>

                            <div class="noor-room-details">
                                <div class="noor-logo">                               
                                    <img src="../Admin/Dashboard/<?php echo $row['logo'] ?>" alt="..">   
                                </div>
                                <div class="noor-info">
                                        <h3>
                                            <?php echo $row['name'] ?>
                                        </h3>
                                    <p><i class="fa-solid fa-location-dot"></i> Club Rd، opposite PIDC, Civil Lines,
                                        Karachi, Karachi City, Sindh</p>
                                    <div class="noor-map">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3620.4789515611346!2d67.02279117465807!3d24.84748644577794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33ddfa27f7849%3A0xc2fbc4a56857f36a!2sPearl-Continental%20Hotel%20Karachi!5e0!3m2!1sen!2s!4v1695395975499!5m2!1sen!2s"
                                            width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                    <div class="noor-price">
                                        <input type="text" name="reserve" value="RS <?php echo $row['price'] ?>/PerDay" class="reserve-btn w-100 text-center">
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                        }
                        
                            ?>

                        </div>
                    </div>
                    <!-- sidebar-hotel-room-info end-->
                </div>

              

            </div>
            <!-- main-container-end -->
        </div>
    </section>
    <!-- our-hotel-rooms-end -->

    <!-- Footer-Start -->
    <?php
    include('./assets/footer.php')
    ?>  

    <script>
        let filter_btn = document.querySelectorAll('.filter-btn');
        let tab_items = document.querySelectorAll('.tab-item');

        for (let i = 0; i < filter_btn.length; i++) {
            filter_btn[i].addEventListener('click', function () {
                for (let j = 0; j < filter_btn.length; j++) {
                    filter_btn[j].classList.remove('active');
                }
                let select_tab = filter_btn[i].getAttribute('data-tab');
                filter_btn[i].classList.add('active');
                for (let t = 0; t < tab_items.length; t++) {
                    document.querySelector('.tab-filter-item-container').style.height =
                        tab_items[t].scrollHeight + 'px';
                    if (tab_items[t].classList.contains(select_tab)) {
                        tab_items[t].classList.add('select_tab');
                    } else {
                        tab_items[t].classList.remove('select_tab');
                    }
                }
            });
        }

        for (let th = 0; th < tab_items.length; th++) {
            document.querySelector('.tab-filter-item-container').style.height =
                tab_items[th].scrollHeight + 'px';
        }
    </script>
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

    
    <script src="../javascript//code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="../javascript//sweetalert2.all.min.js"></script>
</body>

</html>