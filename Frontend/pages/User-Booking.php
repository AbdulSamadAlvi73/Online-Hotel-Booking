<?php
session_start();
include('../Admin/conn.php');

if(isset($_GET['id'])){
    $id = $_SESSION['user_id'];
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
    <link rel="shortcut icon" href="../images/royalbaba.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <title>Royal Edge</title>
</head>

<body> 

    <?php
    include('./assets/header.php');
    ?>

    <section class="noor-booking-sec">
        <div class="noor-booking-box">
           <div class="row m-0 p-0">   

              <div class="col col-md-12 col-sm-12 p-3">
                 <div class="noor-booking-card">

                    <!-- <div class="noor-booking-logo">
                        <img src="../Images/Pearl-Continental-Logo.png" alt="hotel-logo">
                    </div> -->
                    

                    <?php
                        $sid = $_SESSION['user_id'];
                 
                $query = "SELECT * from booked_hotel where user_id = '$sid'";
                 $query_run = mysqli_query($conn, $query);
                 while ($row = mysqli_fetch_assoc($query_run)) {            
            ?>


                    <div class="noor-booking-details">
                        <h2 class="hotel-name"><?php echo $row['hotel']?></h1>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped samad-booking-table">
                                    <thead class="samad-booking-header">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone no</th>
                                            <th scope="col">Person</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Checkin Date</th>
                                            <th scope="col">Checkout date</th>
                                            <th scope="col">Booking</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="">
                                            <td scope="row"><?php echo $row['name']?></td>
                                            <td><?php echo $row['phone']?></td>
                                            <td><?php echo $row['person']?></td>
                                            <td><?php echo $row['catagory']?></td>
                                            <td><?php echo $row['checkin_date']?></td>
                                            <td><?php echo $row['checkout_date']?></td>
                                            <td class="text-left">
                                            <form action="./deleteuserbooking.php" method="POST">
                                                <a href="deleteuserbooking.php?delete=<?php echo $row['id'] ?>" class="text-center btn btn-danger" name="delete">Cancel Booking</a>
                                            </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <?php
                     }
                    ?>
                    
                    <!-- <div class="noor-booking-btn"> 
                        <input type="submit" class="book-btn" value="Download Pdf">
                         <input type="submit" class="book-btn" value="Rate & Review">
                    </div> -->

                 </div>
              </div>

              

           </div>
        </div>
    </section>

    <?php
    include('./assets/footer.php');
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript" src="../javascript/script.js"></script>
</body>

</html>