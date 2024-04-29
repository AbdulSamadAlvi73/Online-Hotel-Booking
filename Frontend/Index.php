<?php
include("./Admin/conn.php");
session_start();
?>

<?php
include("./Admin/conn.php");
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $occupation = $_POST['occupation'];
  $massage = $_POST['massage'];

  $image = $_FILES['image']['name'];
  $image_temp = $_FILES['image']['tmp_name'];
  $folder = "./Admin/Dashboard/upload/";
  $target = $folder.$image;
  move_uploaded_file($image_temp, $target);

  $feedback_query = "INSERT INTO testimonail (name, massage,image, occupation) VALUES ('$name','$massage','$target','$occupation')";
  $query_run = mysqli_query($conn,$feedback_query);
}
if(isset($_POST['sub'])){
$des = $_POST['destination'];
$query = "SELECT * FROM cities Where id = '$des'";
$row = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($row);

// $_SESSION['city'] = $data['city_name'];
echo $_SESSION['cit'] = $data['id'];
 header("location:./pages/All-Hotels.php?session=" .$_SESSION['cit']);

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
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/style.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Royal Edge</title>
</head>

<body>

    <!-- header-start -->
    <header>

    <div class="noor-main-navgbar" id="noor-navgbar">
    <div class="noor-logo">
        <a href="./Index.php"><img src="./images/royallogo.png" alt="RoyalEdge"></a>
    </div>
    <div class="noor-menu">
        <div class="noor-btn">
            <i class="fa-solid fa-xmark close-btn"></i>
        </div>
        <ul class="noor-navgbar">
            <li><a href="./Index.php">Home</a></li>
            <!-- <li><a href="#">Add Hotels</a></li> -->
            <li><a href="./pages/car-rental.php">Car Rentals</a></li>
            <li><a href="./pages/our-events.php">Our-Events</li>
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Feedback</a></li>
            <li><a href="./pages/contactus.php">Contact Us</a></li>
        </ul>
    </div>
    <div class="noor-login">
        <?php if (!isset($_SESSION['user_id'])): ?>
            <a href="./pages/User-Login.php"><button type="button" class="login-btn">Login</button></a>
            <a href="./pages/User-Register.php"><button type="button" class="login-btn">Register</button></a>
        <?php endif ?>
        <?php if (isset($_SESSION['user_id'])): ?>
            <li style="list-style-type:none;">
            <!-- <img src="./images/feedbackimg.jpeg" alt=""> -->
            <a href="#" class="user-profile mx-3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src=<?php echo $_SESSION['user_pic']; ?> alt=Image path Invalid name=image />
                  <?php echo $_SESSION['user_name']; ?><i class="fa-solid fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu login-menu rounded-0">
                    <li><a class="dropdown-item" href="./pages/User-Profile.php?uid=<?php echo $_SESSION['user_id']?>">My Profile</a></li>
                    <li><a class="dropdown-item" href="./pages/User-Booking.php">My Bookings</a></li>
                    <li><a class="dropdown-item" href="./pages/Logout.php">Logout</a></li>
                </ul>
            </li>
        <?php endif ?>
        <i class="fa-solid fa-bars open-btn"></i>
    </div>
</div>

        <div class="noor-hero-border gradient-color">
            
            <div class="noor-hero-section">

                <div class="noor-hero-main">

                    <div class="noor-hero-content">

                        <div class="noor-hero-text">
                            <h2>The Royal Edge Classic <br> Elegance In Heart!</h2>
                            <p>The Royal Edge Classic: Where elegance and convenience converge in the heart of your travel plans. Discover luxurious accommodations and book for an unforgettable experience. Your journey starts here.</p>
                            <button type="button" class="exp-btn"><i class="fa-solid fa-play"></i> Explore Now</button>
                        </div>

                        <div class="noor-hero-searchbar">

                            <form action="" method="POST">

                                <div class="row">
                                    <div class="col-md-8 col-sm-6 p-0 px-1">
                                        <label for="city">Chosse Your Best Destination</label>
                                        <div class="noor-user">
                                            <?php
                                            $conn = mysqli_connect('localhost', 'root', '', 'royal_edge');
                                            $query = "SELECT * FROM cities";
                                            $row = mysqli_query($conn, $query);
                                            // session_start();
                                            ?>
                                            <select class="form-select noor-input p-0 rounded-0" name="destination">

                                                <option>Select City</option>
                                                <?php while ($data = mysqli_fetch_assoc($row)) { ?>
                                                    <option value="<?php echo $data['id'] ?>">
                                                        <?php echo $data['city_name'];  ?>

                                                    </option>
                                                    <?php
                                                   }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 p-0 px-1">
                                        <p class="pb-3"></p>
                                        <div class="noor-user">

                                            
                                                <input type="submit" name="sub" value="Search"
                                                    class="form-control src-btn">
                                            
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>


                    <div class="noor-hero-slider-box">
                        <div class="noor-slider">
                            <div class="noor-overlay"></div>
                            <img src="./imgs/main.webp" alt="">
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </header>
    <!-- header-end -->

    <!-- destination-cards-start -->
    <section id="tranding " class="destination-section " style="padding: 35px 3%;">
        <div class="noor-desti-title ">
            <h2>Our Top Destination</h2>
        </div>
        <div class="container1 pt-4 pb-2">
            <div class="swiper tranding-slider pt-3">
                <div class="swiper-wrapper">
                <a href="./pages/All-Hotels.php?session=1">
                    <div class="swiper-slide tranding-slide">

                        <div class="tranding-slide-img">
                            <img src="./images/d2.jpg" alt="Tranding">
                        </div>
                        <div class="tranding-slide-content">
                            <h1 class="food-price">4.3 <i class="fa-solid fa-star"></i></h1>
                            <div class="tranding-slide-content-bottom">
                                <h2 class="city-name">
                                    Karachi
                                </h2>
                            </div>
                        </div>
                    </div>
                </a>

                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <img src="./images/d1.jpeg" alt="Tranding">
                        </div>
                        <div class="tranding-slide-content">
                            <h1 class="food-price">4.1 <i class="fa-solid fa-star"></i></h1>
                            <div class="tranding-slide-content-bottom">
                                <h2 class="city-name">
                                    Lahore
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <img src="./images/d3.jpeg" alt="Tranding">
                        </div>
                        <div class="tranding-slide-content">
                            <h1 class="food-price">4.5 <i class="fa-solid fa-star"></i></h1>
                            <div class="tranding-slide-content-bottom">
                                <h2 class="city-name">
                                    Islamabad
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <img src="./images/d4.jpeg" alt="Tranding">
                        </div>
                        <div class="tranding-slide-content">
                            <h1 class="food-price">$15</h1>
                            <div class="tranding-slide-content">
                                <h1 class="food-price">4.0 <i class="fa-solid fa-star"></i></h1>
                                <div class="tranding-slide-content-bottom">
                                    <h2 class="city-name">
                                        Peshawar
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <img src="./images/d5.jpeg" alt="Tranding">
                        </div>
                        <div class="tranding-slide-content">
                            <h1 class="food-price">4.2 <i class="fa-solid fa-star"></i></h1>
                            <div class="tranding-slide-content-bottom">
                                <h2 class="city-name">
                                    Hyderabad
                                </h2>
                            </div>
                        </div>
                    </div> -->

                </div>
                <br><br>
                <div class="tranding-slider-control">
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </div>
    </section>
    <!-- destination-cards-end -->

    <!-- packages-cards-start-->
    <section>
        <div class="noor-main-packages mb-2">
            <h2>Our Packages</h2>
            <div class="row pt-3 pb-3">

                <div class="col-md-3 col-sm-6 px-1 p-0" data-aos="zoom-out">
                <?php
                    $query = "SELECT * from hotels where id = 15;";

                    $row = mysqli_query($conn, $query);
                    while ($data = mysqli_fetch_assoc($row)) {
                        ?>
                    <div class="noor-packages-box">
                        <div class="noor-packages-card">
                            <div class="noor-content-img">
                                <div class="noor-overlay-img"></div>
                                <span class="noor-rating-icon"><i class="fa-regular fa-heart"></i></span>
                                <div class="noor-packages-img">
                                    <img src="./Admin/Dashboard/<?php echo $data['image'] ?>"  alt="">
                                </div>
                            </div>
                            <div class="noor-packages-content">
                                <ul>
                                    <li>Islamabad</li>
                                    <li><i class="fa-solid fa-star"></i> 4.5</li>
                                </ul>
                                <h5><?php echo $data['name'] ?></h5>
                                <h6>Price: <?php echo $data['price'] ?>/Night</h6>
                                <a href="./pages/Hotel-Rooms.php?id=15">
                                <button type="button" class="view-btn">View Details</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>

                </div>

                <div class="col-md-3 col-sm-6 px-1 p-0" data-aos="zoom-out">
                <?php
                    $query = "SELECT * from hotels where id = 16;";

                    $row = mysqli_query($conn, $query);
                    while ($data = mysqli_fetch_assoc($row)) {
                        ?>
                    <div class="noor-packages-box">
                        <div class="noor-packages-card">
                            <div class="noor-content-img">
                                <div class="noor-overlay-img"></div>
                                <span class="noor-rating-icon"><i class="fa-regular fa-heart"></i></span>
                                <div class="noor-packages-img">
                                <img src="./Admin/Dashboard/<?php echo $data['image'] ?>"  alt="">
                                </div>
                            </div>
                            <div class="noor-packages-content">
                                <ul>
                                    <li>Lahore</li>
                                    <li><i class="fa-solid fa-star"></i> 4.5</li>
                                </ul>
                                <h5><?php echo $data['name'] ?></h5>
                                <h6>Price:<?php echo $data['price'] ?>/Night</h6>
                                <a href="./pages/Hotel-Rooms.php?id=16">
                                <button type="button" class="view-btn">View Details</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php 
                    }
                    ?>

                </div>

                <div class="col-md-3 col-sm-6 px-1 p-0" data-aos="zoom-out">

                <?php
                    $query = "SELECT * from hotels where id = 29;";

                    $row = mysqli_query($conn, $query);
                    while ($data = mysqli_fetch_assoc($row)) {
                        ?>
                    <div class="noor-packages-box">
                        <div class="noor-packages-card">
                            <div class="noor-content-img">
                                <div class="noor-overlay-img"></div>
                                <span class="noor-rating-icon"><i class="fa-regular fa-heart"></i></span>
                                <div class="noor-packages-img">
                                <img src="./Admin/Dashboard/<?php echo $data['image'] ?>"  alt="">
                                </div>
                            </div>
                            <div class="noor-packages-content">
                                <ul>
                                    <li>Karachi</li>
                                    <li><i class="fa-solid fa-star"></i> 4.5</li>
                                </ul>
                                <h5><?php echo $data['name'] ?></h5>
                                <h6>Price:<?php echo $data['price'] ?>/Night</h6>
                                <a href="./pages/Hotel-Rooms.php?id=29">
                                <button type="button" class="view-btn">View Details</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>

                </div>

                <div class="col-md-3 col-sm-6 px-1 p-0" data-aos="zoom-out">

                <?php
                    $query = "SELECT * from hotels where id = 31;";

                    $row = mysqli_query($conn, $query);
                    while ($data = mysqli_fetch_assoc($row)) {
                        ?>
                    <div class="noor-packages-box">
                        <div class="noor-packages-card">
                            <div class="noor-content-img">
                                <div class="noor-overlay-img"></div>
                                <span class="noor-rating-icon"><i class="fa-regular fa-heart"></i></span>
                                <div class="noor-packages-img">
                                <img src="./Admin/Dashboard/<?php echo $data['image'] ?>"  alt="">
                                </div>
                            </div>
                            <div class="noor-packages-content">
                                <ul>
                                    <li>Murree</li>
                                    <li><i class="fa-solid fa-star"></i> 4.5</li>
                                </ul>
                                <h5><?php echo $data['name'] ?></h5>
                                <h6>Price: <?php echo $data['price'] ?>"/Night</h6>
                                <a href="./pages/Hotel-Rooms.php?id=31">
                                <button type="button" class="view-btn">View Details</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>

                </div>

            </div>
        </div>
    </section>
    <!-- packages-cards-end-->

    <!-- testimonial-section-start -->
    <section class="noor-testimonials-section mb-2">
        <div class="noor-test-title">
            <h2>Our Testimonials</h2>
        </div>
        <div class="owl-carousel owl-theme testimonials-container" data-aos="flip-up">
                  <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'royal_edge');
                    $query = "SELECT * FROM testimonail";
                    $query_run = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
            <div class="item noor-testimonials-card">

                <div class="noor-test-box">
                    <div class="noor-test-imgbox">
                        <img src="<?php echo $row['image'];?>" alt="">
                    </div>
                    <div class="noor-test-contentbox">
                        <p><?php echo $row['massage'] ?></p>
                        <h4><?php echo $row['name'] ?></h4>
                        <h5><?php echo $row['occupation'] ?></h5>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>

    </section>
    <!-- testimonial-section-end -->

    <!-- start-modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="samad-modal modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 modal-heading" id="exampleModalLabel">Feedback Form</h1>
                    <button type="button" class="btn-close btn-close-red" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
        <form action="#" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="name" class="col-form-label samad-modal-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
          </div>
          <div class="mb-3">
            <label for="occupation" class="col-form-label samad-modal-label">Occupation:</label>
            <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Occupation">
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
            <button type="submit" class="btn samad-modal-btn" name="submit">Submit</button>
        </div>
    </form>
</div>
</div>
</div>
</div>

<!-- end-modal -->

<!-- Footer-start -->
<!-- Footer-start -->
<footer>
    
    <div class="noor-container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="footer-about">
                    <h3><img src="./images/footerlogo.png" alt=""></h3>
                    <p>
                        The Royal Edge Classic: Where elegance and convenience converge in the heart of your travel plans.
                    </p>
                <div class="footer-social">
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-youtube"></i></a>
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="footer-contact">
                <h3>Get In Touch</h3>
                <p><i class="fa fa-map-marker-alt"></i>Aptech Education Latifabad,HYD</p>
                <p><i class="fa fa-phone-alt"></i>+92 000 0000000</p>
                <p><i class="fa fa-envelope"></i>royaledge@email.com</p>
                <p><i class="far fa-clock"></i>Mon - Sun, 12AM - 12AM</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="footer-links ">
                <h3>Useful Links</h3>
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">FeedBack</a>
                <a href="">Contact Us</a>
                <a href="">Our Services</a>
                <a href="./pages/car-rental.php">Car Rentals</a>
                <a href="./Admin/admin.php" target="_blank">Login As a Admin</a>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="footer-project ">
                <h3>Latest Projects</h3>
                        <a href=""><img src="./images/cecilexterior.jpg" alt="Image"></a>
                        <a href=""><img src="./images/luxusexterior.jpg" alt="Image"></a>
                        <a href=""><img src="./images/exterior1.jpg" alt="Image"></a>
                        <a href=""><img src="./images/exterior.jpg" alt="Image"></a>
                        <a href=""><img src="./images/d3.jpeg" alt="Image"></a>
                        <a href=""><img src="./images/d2.jpg" alt="Image"></a>
            </div>
        </div>
    </div>
</div>

</footer>
<!-- Footer-end -->
    <!-- Footer-end -->

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript" src="./javascript/script.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
  AOS.init();
</script>
</body>

</html>