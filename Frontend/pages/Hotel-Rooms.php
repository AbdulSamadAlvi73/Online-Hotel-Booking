<?php
session_start();

?>


<?php
include("../Admin/conn.php");
if(isset($_POST['userreview'])){
  $name = $_POST['name'];
  $massage = $_POST['massage'];

  $image = $_FILES['image']['name'];
  $image_temp = $_FILES['image']['tmp_name'];
  $folder = "../Admin/Dashboard/upload/";
  $target = $folder.$image;
  move_uploaded_file($image_temp, $target);

  $user_review = "INSERT INTO `user_review` (`name`, `massage`,`image`) VALUES ('$name','$massage','$target')";
  $query_run = mysqli_query($conn,$user_review);
}
?>


<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $conn = mysqli_connect('localhost','root','','royal_edge');
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
                            <div class="noor-room-slider">                                  
                                        <?php
                                        if(isset($_GET['id'])){
                                            $id = $_GET['id'];
                                            
                                         $query = "SELECT * FROM hotel_details where hotelid = $id";
                                         $query_run = mysqli_query($conn,$query);
                                         while($row = mysqli_fetch_assoc($query_run)){
                                        ?>
                                <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="../Admin/Dashboard/<?php echo $row['img1'] ?>"
                                                class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="../Admin/Dashboard/<?php echo $row['img2'] ?>"
                                                class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="../Admin/Dashboard/<?php echo $row['img3'] ?>"
                                                class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="../Admin/Dashboard/<?php echo $row['img4'] ?>"
                                                class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="../Admin/Dashboard/<?php echo $row['img5'] ?>"
                                                class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="../Admin/Dashboard/<?php echo $row['img6'] ?>"
                                                class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                    <div class="carousel-indicators  samad-thumbnail-btn">
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="0" class="active img-thumbnail" aria-current="true"
                                            aria-label="Slide 1">
                                            <img src="../Admin/Dashboard/<?php echo $row['img1'] ?>"
                                                class="d-block w-100" alt="...">
                                        </button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="1" class="img-thumbnail" aria-label="Slide 2">
                                            <img src="../Admin/Dashboard/<?php echo $row['img2'] ?>"
                                                class="d-block w-100" alt="...">
                                        </button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="2" class="img-thumbnail" aria-label="Slide 3">
                                            <img src="../Admin/Dashboard/<?php echo $row['img3'] ?>"
                                                class="d-block w-100" alt="...">
                                        </button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="3" class="img-thumbnail" aria-current="true"
                                            aria-label="Slide 4">
                                            <img src="../Admin/Dashboard/<?php echo $row['img4'] ?>"
                                                class="d-block w-100" alt="...">
                                        </button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="4" class="img-thumbnail" aria-label="Slide 5">
                                            <img src="../Admin/Dashboard/<?php echo $row['img5'] ?>"
                                                class="d-block w-100" alt="...">
                                        </button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="5" class="img-thumbnail" aria-label="Slide 6">
                                            <img src="../Admin/Dashboard/<?php echo $row['img6'] ?>"
                                                class="d-block w-100" alt="...">
                                        </button>
                                    </div>
                                </div>
                                <?php                                         
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
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
                                        <!-- <span>price <?php echo $row['price'] ?></span> -->
                                        <a href="./hotelreserve.php?id=<?php echo $row['hotelid'] ?>">
                                            <button class="reserve-btn" name="details">Reserved</button>
                                        </a>
                                    </div>
                                </div>
                                <?php

 }
}
                                    ?>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- sidebar-hotel-room-info end-->
            </div>

            <div class="noor-room-desc-tab mt-3">

                <div class="container p-0">

                    <div class="tab-container">

                        <div class="tab-filter-container">
                            <li class="filter-btn active" data-tab="web-design">
                                Hotel-Description
                            </li>
                            <li class="filter-btn" data-tab="app-development">
                                Room-Types
                            </li>
                            <li class="filter-btn" data-tab="ux-design">
                                User-Reviews
                            </li>
                        </div>
                        <?php 
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    
 $query = "SELECT hotels.name, hotels.description , hotels.price , hotel_details.logo , hotel_details.manager_name , hotel_details.manager_img , hotel_details.img1 , hotel_details.img2 , hotel_details.img3 , hotel_details.img4 , hotel_details.img5 , hotel_details.img6 FROM hotels

 INNER JOIN hotel_details
 
 ON hotels.id=hotel_details.hotelid
 
 WHERE hotel_details.hotelid= $id";
 $query_run = mysqli_query($conn,$query);
 while($row = mysqli_fetch_assoc($query_run)){

 
 ?>
                        <div class="tab-filter-item-container">

                            <div class="tab-item web-design select_tab pb-4">
                                <div class="noor-desc-main">
                                    <div class="noor-desc-tab">
                                        <div class="noor-desc-img">
                                            <img src="../Admin/Dashboard/<?php echo $row['manager_img'] ?>" alt="">
                                        </div>
                                        <div class="noor-desc-info">
                                            <h5><?php echo $row['manager_name'] ?></h5>
                                            <p><?php echo $row['description'] ?></p>
                                        </div>
                                    </div>

                                    <div class="noor-desc-subinfo">
                                        <h5>Our Facilities:-</h5>
                                        <div class="row">
                                            <div class="col-md-4 mb-2">
                                                <li><i class="fa-solid fa-wifi"></i> Wifi</li>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <li><i class="fa-solid fa-temperature-arrow-up"></i> Air Conditioner
                                                </li>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <li><i class="fa-solid fa-bowl-food"></i> Food Buffiet</li>
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <li><i class="fa-solid fa-dumbbell"></i> Gym</li>
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <li><i class="fa-solid fa-person-swimming"></i> Swimming Pool</li>
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <li><i class="fa-solid fa-mug-hot"></i> Cafeteria</li>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-item app-development">
                                <div class="noor-room-tab ">
                                    <div class="noor-room-type ">
                                        <h2>Our-Categories</h2>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12 mb-2 px-1">
                                                <div class="noor-room-img">
                                                    <img src="../images/room4.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-sm-12 mb-2 px-1">
                                                <div class="noor-room-content">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <h3>Standard Room:</h3>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <h4>Price: 20000</h4>
                                                        </div>
                                                    </div>
                                                    <p>A standard room typically offers basic amenities and features commonly found in a hotel or accommodation. These facilities typically include a comfortable bed (or beds), a private bathroom with essential toiletries, a television, a telephone, and some storage space like a closet or dresser. Standard rooms are designed to provide a comfortable and convenient stay without extra frills or luxuries, making them a budget-friendly choice for travelers. Additional features may vary depending on the specific hotel or lodging establishment.</p>
                                                    <h5>Room Facilities:</h5>
                                                    <ul>
                                                        <li>Basic Comfort</li>
                                                        <li>Private Bathroom</li>
                                                        <li>Entertainment</li>
                                                        <li>Communication</li>
                                                        <li>Storage Space</li>
                                                    </ul>
                                                    <!-- </div> -->
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-2 px-1">
                                                <div class="noor-room-img">
                                                    <img src="../images/room2.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-8 mb-2 px-1">
                                            <div class="noor-room-content">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <h3>Permiun Room:</h3>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <h4>Price: 30000</h4>
                                                        </div>
                                                    </div>
                                                    <p>A premium room is a step up from a standard hotel room, featuring larger and more luxurious accommodations. These rooms often include high-quality bedding, well-equipped bathrooms with premium toiletries, and enhanced entertainment options. Guests in premium rooms may also enjoy special views, additional amenities, and personalized services, making their stay more comfortable and indulgent. This option is ideal for those seeking an elevated and upscale experience during their hotel stay.</p>
                                                    <h5>Room Facilities:</h5>
                                                    <ul>
                                                        <li>Enhanced Comfort</li>
                                                        <li>Luxurious Bathrooms</li>
                                                        <li>Superior Entertainment</li>
                                                        <li>Exclusive Views</li>
                                                        <li>Tailored Services</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-2 px-1">
                                                <div class="noor-room-img ">
                                                    <img src="../images/room4.webp" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-8 mb-2 px-1">
                                            <div class="noor-room-content">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <h3>Deluxe Room:</h3>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <h4>Price: 35000</h4>
                                                        </div>
                                                    </div>
                                                    <p>A deluxe room is an upgraded lodging option, offering more space and enhanced amenities compared to standard rooms. These rooms typically feature larger beds, a well-appointed bathroom, and more in-room conveniences. Guests in deluxe rooms can enjoy a comfortable and stylish stay without the premium price tag. These rooms are a popular choice for those seeking a touch of luxury and added comfort during their travels. Specific offerings may vary from one hotel or accommodation to another.</p>
                                                    <h5>Room Facilities:</h5>
                                                    <ul>
                                                        <li>Increased Space</li>
                                                        <li>Enhanced Comfort</li>
                                                        <li>Well-Appointed Bathrooms</li>
                                                        <li>Affordable Luxury</li>
                                                        <li>In-Room Conveniences</li>
                                                    </ul>
                                                    <!-- </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-item ux-design">
                                <div class="noor-review-tab">
                                    <div class="noor-users row m-0 p-0">
                                        <h2>Users Review</h2>

                                        <?php
                    $query = "SELECT * FROM user_review";
                    $query_run = mysqli_query($conn, $query);
                    while ($reviewrow = mysqli_fetch_assoc($query_run)) {
                ?>

                                        <div class="col-md-6 col-sm-12 mb-2">
                                            <div class="noor-card">
                                                <img src="<?php echo $reviewrow['image'] ?>" alt="">
                                                <!-- <img src="../Admin/Dashboard/upload/feedbackimg.jpeg" alt=""> -->
                                                <h5><?php echo $reviewrow['name'] ?></h5>
                                                <p><?php echo $reviewrow['massage'] ?></p>
                                            </div>
                                        </div>
                                        <?php
                                                }
                                                ?>
                                        <button class="samad-hotel-feedback-btn" data-bs-toggle="modal"
                                            data-bs-target="#userfeedback" data-bs-whatever="@getbootstrap">Add
                                            Review</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <?php 
 }
}
                            ?>

                    </div>

                </div>

            </div>

        </div>
        <!-- main-container-end -->
        </div>
    </section>

    <!-- our-hotel-rooms-end -->

    <!-- start-modal -->

    <div class="modal fade" id="userfeedback" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="samad-modal modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 modal-heading" id="exampleModalLabel">User Review Form</h1>
                    <button type="button" class="btn-close btn-close-red" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="col-form-label samad-modal-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <label for="massage" class="col-form-label samad-modal-label">Massage:</label>
                            <input type="text" class="form-control" id="massage" name="massage" placeholder="Massage">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="col-form-label samad-modal-label">Your Picture:</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            <button type="submit" class="btn samad-modal-btn" name="userreview">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- end-modal -->


    <!-- Footer-Start -->
    <?php
    include('./assets/footer.php')
    ?>

    <script>
    let filter_btn = document.querySelectorAll('.filter-btn');
    let tab_items = document.querySelectorAll('.tab-item');

    for (let i = 0; i < filter_btn.length; i++) {
        filter_btn[i].addEventListener('click', function() {
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
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript" src="../javascript/script.js"></script>
</body>

</html>