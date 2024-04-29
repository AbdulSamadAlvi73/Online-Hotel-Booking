<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'royal_edge');

// if(isset($_SESSION['cit'])){

//  $des = $_SESSION['cit'];


// $query = "SELECT city_name , name ,description , image,price 
// from hotels
// INNER JOIN cities
// ON 
// hotels.cityId = cities.id where cityid = $des";
// $row = mysqli_query($conn, $query);



// }
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

            <div class="noor-hotel-info-box">
                <div class="noor-info-bgr">
                    <div class="noor-info-text">
                        <?php
                        // session_start();
                        $conn = mysqli_connect('localhost', 'root', '', 'royal_edge');
                      
                        if(isset($_SESSION['cit'])){

                           $des = $_SESSION['cit'];
                               
                       $query = "SELECT * FROM cities Where id = '$des'";
                      $row = mysqli_query($conn, $query);

                       while( $data = mysqli_fetch_assoc($row)){
                            ?>
                        <h1>
                            <span>"</span><?php echo $data['city_name'] ;
                            
                         } 
                         
                        }?><span>"</span>
                        </h1>
                        <?php

                        ?>
                        <h3>-Our Top Hotels-</h3>
                        <h5>In Best Price <i class="fa-solid fa-leaf"></i></h5>
                    </div>
                </div>
            </div>
            <?php
            
            if(isset($_POST['searchp']))
{
    if(isset($_SESSION['cit'])){
        
    $first = $_POST['first'];
    $second = $_POST['second'];
    $des = $_SESSION['cit'];
    ?>

    <div class="noor-hotel-list-container">
        <div class="noor-hotel-left-col">
            <?php





            $query = "SELECT city_name, name, description, image, price, hotels.id
            FROM hotels
            INNER JOIN cities 
            ON hotels.cityId = cities.id
            WHERE cityid = $des AND hotels.price BETWEEN $first AND $second;
            ;";

            $row = mysqli_query($conn, $query);
            while ($data = mysqli_fetch_assoc($row)) {
                ?>

                <div class="noor-hotel-box">
                    <div class="noor-hotel-img">
                        <img src="../Admin/Dashboard/<?php echo $data['image'] ?>" alt="">
                    </div>
                    <div class="noor-hotel-content">
                        <div class="noor-hotel-details">
                            <h3>
                                <?php echo $data['name'] ?>
                            </h3>
                            <h5>
                                <?php echo $data['description'] ?>
                            </h5>
                            <ul>
                                <li>Bedroom/</li>
                                <li>Balcony/</li>
                                <li>Kitchen</li>
                            </ul>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star-half-stroke"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>

                        <div class="noor-hotel-price">
                            <span>Rs
                                <?php echo $data['price'] ?>/PerDay
                            </span>

                            <br>

                            <a href="./Hotel-Rooms.php?id=<?php echo $data['id'] ?>">
                            <button class="detail-btn" name="details">More Details</button>
                        </a>
                        </div>
                    </div>
                </div>
                <?php
            }

        }
            ?>
        </div>


        <?php


}
else
{


?>

            <div class="noor-hotel-list-container">
                <div class="noor-hotel-left-col">
                    <?php


if(isset($_SESSION['cit'])){

    $des = $_SESSION['cit'];

                    $query = "SELECT city_name, name, description, image, price, hotels.id
                    FROM hotels
                    INNER JOIN cities 
                    ON hotels.cityId = cities.id
                    WHERE cityid = $des ";

                     $row = mysqli_query($conn, $query);
                    while ($data = mysqli_fetch_assoc($row)) {
                        ?>

                        <div class="noor-hotel-box" data-aos="fade-up">
                            <div class="noor-hotel-img">
                                <img src="../Admin/Dashboard/<?php echo $data['image'] ?>" alt="">
                            </div>
                            <div class="noor-hotel-content">
                                <div class="noor-hotel-details">
                                    <h3>
                                        <?php echo $data['name'] ?>
                                    </h3>
                                    <h5>
                                        <?php echo $data['description'] ?>
                                    </h5>
                                    <ul>
                                        <li>Bedroom/</li>
                                        <li>Balcony/</li>
                                        <li>Kitchen</li>
                                    </ul>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star-half-stroke"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>

                                <div class="noor-hotel-price">
                                    <span>Rs
                                        <?php echo $data['price'] ?>/PerDay
                                    </span>

                                    <br>

                                    <a href="./Hotel-Rooms.php?id=<?php echo $data['id'] ?>">
                                    <button class="detail-btn" name="details">More Details</button>
                                </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>


                <?php
}
}      
                ?>
                <div class="noor-hotel-right-col" data-aos="fade-right">
                    <div class="noor-hotel-sidebar">
                        <h3>Select Filters</h3>
                        <div class="noor-hotel-options">
                            <div class="noor-hotel-price">
                                <h5>By Price.</h5>
                                <form action="#" method="post">
                                    <label for="name" class="mb-1" >Starting Price</label>
                                    <input type="number" name="first" placeholder="Enter Your Price" class="user-price">
                                    <label for="name" class="mt-1">Ending Price</label>
                                    <input type="number" placeholder="Enter Your Price" name="second" class="user-price">
                                    <input type="submit" name="searchp" value="Filter By Price" class="user-btn">
                                </form>
                            </div>
                            <hr style="border: 1.2px solid #008186;">
                            <div class="noor-hotel-facilities">
                                <h5>Facilities.</h5>
                                <form action="#" method="post">
                                    <span><input type="checkbox" name="" id=""> Air Conditioner</span>
                                    <span><input type="checkbox" name="" id=""> Wifi</span>
                                    <span><input type="checkbox" name="" id=""> Gym</span>
                                    <span><input type="checkbox" name="" id=""> Pool</span>
                                    <span><input type="checkbox" name="" id=""> Lunch & Dinner</span>
                                    <span><input type="checkbox" name="" id=""> BreakFast</span>
                                </form>
                            </div>
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

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
<?php

?>