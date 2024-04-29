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
    <link rel="stylesheet" href="../cssswiper-bundle.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Royal Edge</title>
</head>

<body>
    <!-- navbar-section-start -->
    <?php
    include("./assets/header.php");
    ?>
    <!-- navbar-section-end -->

    <section class="noor-events-sec">
        <div class="noor-events-slider">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../images/wedding-slider-picture.jpg" class="d-block w-100" alt="...">
                        <div class="noor-overlay-slider"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <h2>Our Wedding Recceptions</h2>
                            <p>"Welcome to our Wedding Section, where dreams come to life. Discover the perfect inspiration for your special day, from elegant themes to breathtaking venues. Explore expert tips on planning, décor, and more to ensure your wedding is a seamless and memorable experience. Join us on this journey of love and commitment."</p>
                            <button class="sid-btn">Explore Now</button>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../images/birthday-slider-picture.jpg" class="d-block w-100" alt="...">
                        <div class="noor-overlay-slider"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <h2>Our Birthday Celebrations</h2>
                            <p>"Explore our Birthday Party Section and ignite the spark of celebration. Dive into a world of creative ideas and themes to make your next birthday unforgettable. From cake designs to party games, find all you need to plan an exceptional birthday gathering. Let's create lasting memories with family and friends, one birthday at a time!"</p>
                            <button class="sid-btn">Explore Now</button>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
    </section>

    <div class="container swiper ">

        <h2>Our Wedding Packages</h2>
        <div class="slide-container">

            <div class="card-wrapper swiper-wrapper noor-main-packages">

            <?php
                    $query = "SELECT * FROM wedding";
                    $query_run = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                ?>

                <div class="card swiper-slide" data-aos="zoom-in">

                
                    <div class="noor-packages-box">
                        <div class="noor-packages-card">
                            <div class="noor-content-img">
                                <div class="noor-overlay-img"></div>
                                <span class="noor-rating-icon"><i class="fa-regular fa-heart"></i></span>
                                <div class="noor-packages-img">
                                    <!-- <img src="../images/exterior1.jpg" alt=""> -->
                                    <img src="../Admin/Dashboard/<?php echo $row['image'] ?>" alt="">
                                </div>
                            </div>
                            <div class="noor-packages-content">
                                <ul class="city-info">
                                    <li><?php echo $row['city'] ?></li>
                                    <li><i class="fa-solid fa-star"></i> 4.5</li>
                                </ul>
                                <h5><?php echo $row['hotal_name'] ?></h5>
                                <ul class="pkg-info">
                                    <li>Price: <?php echo $row['price'] ?></li>
                                </ul>
                                <a href="./wedding-reserve.php?id=<?php echo $row['id'] ?>"><button  type="button" class="view-btn">Go for Reserve</button></a> 
                            </div>
                        </div>
                    </div>

                </div>
                <?php
                    }
                    ?>
            </div>

            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div>

    </div>

    <div class="container swiper ">

        <h2>Our Birthday Packages</h2>
        <div class="slide-container">

            <div class="card-wrapper swiper-wrapper noor-main-packages">



            <?php
                    $query = "SELECT * FROM birthday";
                    $query_run = mysqli_query($conn, $query);
                    while ($roww = mysqli_fetch_assoc($query_run)) {
                ?>

                <div class="card swiper-slide" data-aos="zoom-in">

                
                    <div class="noor-packages-box">
                        <div class="noor-packages-card">
                            <div class="noor-content-img">
                                <div class="noor-overlay-img"></div>
                                <span class="noor-rating-icon"><i class="fa-regular fa-heart"></i></span>
                                <div class="noor-packages-img">
                                    <!-- <img src="../images/exterior1.jpg" alt=""> -->
                                    <img src="../Admin/Dashboard/<?php echo $roww['image'] ?>" alt="">
                                </div>
                            </div>
                            <div class="noor-packages-content">
                                <ul class="city-info">
                                    <li><?php echo $roww['city'] ?></li>
                                    <li><i class="fa-solid fa-star"></i> 4.5</li>
                                </ul>
                                <h5><?php echo $roww['hotal_name'] ?></h5>
                                <ul class="pkg-info">
                                    <li>Price <?php echo $roww['price'] ?></li>
                                </ul>
                                <a href="./birthday-reserve.php?id=<?php echo $roww['id'] ?>"><button  type="button" class="view-btn">Go for Reserve</button></a> 
                            </div>
                        </div>
                    </div>

                </div>
                <?php
                    }
                    ?>

                <!-- <div class="card swiper-slide ">

                    <div class="noor-packages-box">
                        <div class="noor-packages-card">
                            <div class="noor-content-img">
                                <div class="noor-overlay-img"></div>
                                <span class="noor-rating-icon"><i class="fa-regular fa-heart"></i></span>
                                <div class="noor-packages-img">
                                    <img src="../images/exterior1.jpg" alt="">
                                </div>
                            </div>
                            <div class="noor-packages-content">
                                <ul class="city-info">
                                    <li>Lahore</li>
                                    <li><i class="fa-solid fa-star"></i> 4.5</li>
                                </ul>
                                <h5>Ramada By Wyndham Lahore Gulberg II.</h5>
                                <ul class="pkg-info">
                                    <li>For Valima : 35,000/Rs</li>
                                </ul>
                                <button type="button" class="view-btn">View Details</button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card swiper-slide ">

                    <div class="noor-packages-box">
                        <div class="noor-packages-card">
                            <div class="noor-content-img">
                                <div class="noor-overlay-img"></div>
                                <span class="noor-rating-icon"><i class="fa-regular fa-heart"></i></span>
                                <div class="noor-packages-img">
                                    <img src="../images/exterior1.jpg" alt="">
                                </div>
                            </div>
                            <div class="noor-packages-content">
                                <ul class="city-info">
                                    <li>Lahore</li>
                                    <li><i class="fa-solid fa-star"></i> 4.5</li>
                                </ul>
                                <h5>Ramada By Wyndham Lahore Gulberg II.</h5>
                                <ul class="pkg-info">
                                    <li>For Barat : 25,000/Rs</li>
                                </ul>
                                <button type="button" class="view-btn">View Details</button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card swiper-slide ">

                    <div class="noor-packages-box">
                        <div class="noor-packages-card">
                            <div class="noor-content-img">
                                <div class="noor-overlay-img"></div>
                                <span class="noor-rating-icon"><i class="fa-regular fa-heart"></i></span>
                                <div class="noor-packages-img">
                                    <img src="../images/exterior1.jpg" alt="">
                                </div>
                            </div>
                            <div class="noor-packages-content">
                                <ul class="city-info">
                                    <li>Lahore</li>
                                    <li><i class="fa-solid fa-star"></i> 4.5</li>
                                </ul>
                                <h5>Ramada By Wyndham Lahore Gulberg II.</h5>
                                <ul class="pkg-info">
                                    <li>For Engagement : 18,500/Rs</li>
                                </ul>
                                <button type="button" class="view-btn">View Details</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card swiper-slide ">

                    <div class="noor-packages-box">
                        <div class="noor-packages-card">
                            <div class="noor-content-img">
                                <div class="noor-overlay-img"></div>
                                <span class="noor-rating-icon"><i class="fa-regular fa-heart"></i></span>
                                <div class="noor-packages-img">
                                    <img src="../images/exterior1.jpg" alt="">
                                </div>
                            </div>
                            <div class="noor-packages-content">
                                <ul class="city-info">
                                    <li>Lahore</li>
                                    <li><i class="fa-solid fa-star"></i> 4.5</li>
                                </ul>
                                <h5>Ramada By Wyndham Lahore Gulberg II.</h5>
                                <ul class="pkg-info">
                                    <li>For Valima : 35,000/Rs</li>
                                </ul>
                                <button type="button" class="view-btn">View Details</button>
                            </div>
                        </div>
                    </div>

                </div> -->

            </div>

            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div>

    </div>

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
    <script type="text/javascript" src="../javascript/swiper-bundle.min.js"></script>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>