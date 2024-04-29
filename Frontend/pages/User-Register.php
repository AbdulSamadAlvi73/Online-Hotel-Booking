<?php
include("../Admin/conn.php");

if (isset($_POST['User-Register'])) {

    $rsgName = $_POST['rsgname'];
    $rsgEmail = $_POST['rsgemail'];
    $rsgPhone = $_POST['rsgphone'];
    $rsgDob = $_POST['rsgdob'];
    $rsgPass = $_POST['rsgpass'];
    $rsgCpass = $_POST['rsgCpass'];

    $image = $_FILES['rsgpic']['name'];
    $folder = './images/';

    $tempname = $_FILES['rsgpic']['tmp_name'];
    $ttarget = $folder . basename($_FILES['rsgpic']['name']);
    move_uploaded_file($tempname, $ttarget);

    $rsgComp = "SELECT * FROM `user-account` WHERE username='$rsgName' OR useremail='$rsgEmail'";
    $result = mysqli_query($conn, $rsgComp);

    if ($result) {
        $num = mysqli_num_rows($result);

        if ($num > 0) {
            echo " <script> 
            alert('Username Or Email Has Already Taken')
            </script> 
            ";
        } else {
            if ($rsgPass == $rsgCpass) {
                $rsginsert = " INSERT INTO `user-account`(`username`, `useremail`, `userphone-no`, `userdob`, `userpicture`, `userpassword`, `userconfirm-password`) 
            VALUES ('$rsgName','$rsgEmail','$rsgPhone','$rsgDob','$ttarget','$rsgPass','$rsgCpass')";
                $result = mysqli_query($conn, $rsginsert);
                header('location:User-Login.php');
            } else {
                echo "<script> 
                 alert('Password Is Not Matched')
              </script>";
            }
        }
    }

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
    <link rel="stylesheet" href="../css/style.css">
    <title>Royal Edge</title>
</head>

<body>

    <!-- user-register-form-->
    <section class="user-bgr">
        <div class="user-login m-0 pt-5 pb-5 px-5 w-100">
            <h1 class="user-title">Register Here</h1>
            <img src="" alt="">
            <form action="User-Register.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <label for="recipient-name" class="col-form-label user-label">Full Name:</label>
                        <input type="name" class="form-control user-input" required placeholder="Name"
                            id="recipient-name" name="rsgname">
                    </div>
                    <div class="col-md-6">
                        <label for="message-text" class="col-form-label user-label">Email:</label>
                        <input type="email" class="form-control user-input" required placeholder="Email"
                            id="recipient-name" name="rsgemail">
                    </div>
                    <div class="col-md-6">
                        <label for="recipient-name" class="col-form-label user-label">Phone no:</label>
                        <input type="number" class="form-control user-input" required placeholder="Phone"
                            id="recipient-name" name="rsgphone">
                    </div>
                    <div class="col-md-6">
                        <label for="message-text" class="col-form-label user-label">Date Of Birth:</label>
                        <input type="text" placeholder="Select Date Of Birth" required name="rsgdob" onfocus="(this.type='date')"
                            onblur="if(this.value) this.type='text'" class="form-control user-input"
                            id="recipient-name">
                    </div>
                    <div class="col-md-12">
                        <label for="message-text" class="col-form-label user-label ">Profile Picture:</label>
                        <input type="file" class="form-control user-input" id="recipient-name" required name="rsgpic">
                    </div>
                    <div class="col-md-6">
                        <label for="message-text" class="col-form-label user-label">Password:</label>
                        <input type="password" class="form-control user-input" required hash placeholder="Password"
                            id="recipient-name" name="rsgpass">
                    </div>
                    <div class="col-md-6">
                        <label for="message-text" class="col-form-label user-label">Confirm Password:</label>
                        <input type="password" class="form-control user-input" required hash placeholder="Confirm Password"
                            id="recipient-name" name="rsgCpass">
                    </div>
                    <div class="col-md-12 mt-3 mb-1">
                        <a href="User-Login.php" style="color: red; text-decoration:none;">Login</a>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" name="User-Register" value="Register" class="user-btn">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- user-register-form-->

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