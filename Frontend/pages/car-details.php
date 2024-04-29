<?php
session_start();

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

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Royal Edge</title>
</head>

<body>
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

            <?php
                $query = "SELECT * from car_rental where id = $id ";
                 $query_run = mysqli_query($conn, $query);
                 while ($row = mysqli_fetch_assoc($query_run)) {            
            ?>

            <div class="noor-hotel-list-container">

                <div class="noor-hotel-right-col samad-car-rental-details-leftbar" data-aos="fade-left">
                    <div class="noor-hotel-sidebar">
                        <h3><?php echo $row['price'] ?> Per Day</h3>
                        <div class="noor-hotel-options">
                            <div class="noor-hotel-price">
                            <div class="row text-center">
                                <h5 style="text-align: left;">Car Color: White</h5>
                                <hr>
                                <h5 style="text-align: left;">Seats: <?php echo $row['seats'] ?></h5>
                                <hr>
                                <h5 style="text-align: left;">Luggage Space: <?php echo $row['big_suitcases'] ?> Bags</h5>
                            </div>
                                <a href="./car-reserve.php?id=<?php echo $row['id'] ?>"><button class="user-btn" name="details">Book Now</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="noor-hotel-left-col" data-aos="fade-right">

                    <div class="noor-hotel-box">
                        <div class="noor-hotel-img">
                            <img src="../Admin/Dashboard/<?php echo $row['image'] ?>" alt="">
                        </div>

                        <div class="noor-hotel-content">
                            <div class="samad-car-rental-details">
                                <h3><?php echo $row['car_name'] ?></h3>
                                <ul>
                                    <li><i class="fa-solid fa-user-large"></i> <?php echo $row['seats'] ?> Seats</li>
                                    <li><i class="fa-solid fa-suitcase"></i> <?php echo $row['big_suitcases'] ?> Big Suitcases</li>
                                    <li><i class="fa-solid fa-suitcase-rolling"></i> <?php echo $row['small_suitcases'] ?> Small Suitcase</li>
                                </ul>
                                <ul>
                                    <li><i class="fa-solid fa-snowflake"></i> Air Condition</li>
                                    <li><i class="fa-solid fa-bolt"></i> Mob Charging</li>
                                    <li><i class="fa-solid fa-music"></i> Music</li>
                                </ul>
                                <h5><?php echo $row['description'] ?></h5>
                            </div>
                        </div> 
                    </div>

                </div>
            </div>
            <?php
                 }
            ?>

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

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
  AOS.init();
</script>
</body>

</html>