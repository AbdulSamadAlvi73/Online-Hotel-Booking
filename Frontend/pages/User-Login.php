<?php

session_start();
include("../Admin/conn.php");

if (isset($_POST['User-Login'])) {
    /**
     * Summary of validate
     * @param mixed $data
     * @return string
     */
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $email = $_POST['rsgemail'];
    $password = $_POST['rsgpass'];

    if (empty($email)) {
        header("Location: User-Login.php?error=Email is required");
    } else if (empty($password)) {
        header("Location: User-Login.php?error=Password is required");
    } else {

        $query = "SELECT * FROM `user-account` 
        WHERE `useremail` = '$email' AND `userpassword` = '$password'";

        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['uid'];
            $_SESSION['user_name'] = $row['username'];
            $_SESSION['user_phone'] = $row['userphone-no'];
            $_SESSION['user_email'] = $_POST['rsgemail'];
            $_SESSION['user_pic'] = $row['userpicture'];
            $_SESSION['user_dob'] = $row['userdob'];
            header("Location:../index.php");
        } 
        else{
            header("Location: User-Login.php?error=Invalid Details");
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

    <!-- user-login-form-->
    <section class="user-bgr">
       <div class="user-login m-0 pt-5 pb-5 px-5">
            <h1 class="user-title">Login Here</h1>
            <form action="#" method="POST">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error">
                        <?php echo $_GET['error']; ?>
                    </p>
                <?php } ?>
                <div class="row">
                    <div class="col-md-12">
                        <label for="message-text" class="col-form-label user-label">Email:</label>
                        <input type="email" class="form-control user-input" required placeholder="Enter Your Email" id="recipient-name"
                            name="rsgemail">
                    </div>
                    <div class="col-md-12">
                        <label for="message-text" class="col-form-label user-label">Password:</label>
                        <input type="password" class="form-control user-input" required placeholder="Enter Your Password" id="recipient-name"
                            name="rsgpass">
                    </div>
                    <div class="col-md-12 mt-3 mb-1">
                     <a href="User-Register.php"  style="color: red; text-decoration:none;">Register</a>
                    </div>
                    <div class="col-md-12">
                       <input type="submit" name="User-Login" value="Login" class="user-btn">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- user-login-form-->

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