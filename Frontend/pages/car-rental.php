<?php
include("../Admin/conn.php");
session_start();
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

            <div class="samad-services-card container">

                <div class="samad-services-card-inner">
                    <div class="row">
                        <div class="column" data-aos="fade-right">
                          <div class="card card1">
                            <h3>City Tour</h3>
                            <p>Explore the city's rich history and vibrant culture on our guided city tour. Visit iconic landmarks and hidden gems while learning about the heart and soul of our beautiful city.</p>
                          </div>
                        </div>
                      
                        <div class="column" data-aos="fade-up">
                          <div class="card card2">
                            <h3>Long-Distance Travel</h3>
                            <p>Embark on an unforgettable journey of discovery during our long travel adventure. Traverse diverse landscapes, immerse in local traditions, and create lasting memories as you explore new horizons.</p>
                          </div>
                        </div>
                        
                        <div class="column" data-aos="fade-left">
                          <div class="card card3">
                            <h3>Discounts and Loyalty</h3>
                            <p>Enjoy exclusive discounts and rewards with our loyalty program. As a valued member, you'll save more and earn perks as a token of our appreciation for your continued support.</p>
                          </div>
                        </div>
                        
                      </div>
                      
                </div>


            </div>

            <div class="noor-hotel-list-container">
                <div class="samad-car-rental-main-card">


                <?php
                    $query = "SELECT * FROM car_rental";
                    $query_run = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                ?>


                    <div class="noor-hotel-box" data-aos="fade-right">
                        <div class="noor-hotel-img">
                            <img src="../Admin/Dashboard/<?php echo $row['image'] ?>" alt="">
                        </div>

                        <div class="noor-hotel-content">
                            <div class="samad-car-rental-details">
                                <h3><?php echo $row['car_name'] ?></h3>
                                <ul>
                                    <li><i class="fa-solid fa-user-large"></i>  <?php echo $row['seats'] ?> Seats</li>
                                    <li><i class="fa-solid fa-suitcase"></i> <?php echo $row['big_suitcases'] ?> Big Suitcases</li>
                                    <li><i class="fa-solid fa-suitcase-rolling"></i> <?php echo $row['small_suitcases'] ?> Small Suitcase</li>
                                </ul>
                                <ul>
                                    <li><i class="fa-solid fa-snowflake"></i> Air Condition</li>
                                    <li><i class="fa-solid fa-bolt"></i> Mob Charging</li>
                                    <li><i class="fa-solid fa-music"></i> Music</li>
                                </ul>
                            </div>

                            <div class="samad-car-rental-price">
                                <span>Rs <?php echo $row['price'] ?></span>
                                <br>
                                <a href="./car-details.php?id=<?php echo $row['id'] ?>"><button class="detail-btn" name="details">View Details</button></a>
                            </div>
                        </div>
                    </div>

                    <?php
                    }
                    ?>
                    <!-- <center>
                        <div class="pagination">
                            <a href="#">&laquo;</a>
                            <a href="#">1</a>
                            <a href="#" class="active">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">5</a>
                            <a href="#">6</a>
                            <a href="#">&raquo;</a>
                        </div>
                    </center> -->
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

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
  AOS.init();
</script>
</body>
</html>