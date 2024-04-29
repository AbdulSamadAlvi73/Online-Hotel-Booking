<?php
session_start();
include('../Admin/conn.php');
$id = $_SESSION['user_id'];
$sql = "SELECT * from `user-account` Where `uid` = '$id'";
$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) == 1) {
    $row = mysqli_fetch_assoc($query);
}
if (isset($_POST['dataupdate'])) {
    $username = $_POST['rsgname'];
    $email = $_POST['rsgemail'];
    $phone = $_POST['rsgphone'];
    $dob = $_POST['rsgdob'];
    $pass = $_POST['rsgpass'];
    $Cpass = $_POST['rsgCpass'];

    $image = $_FILES['rsgpic']['name'];
    $folder = '../Images/';

    $tempname = $_FILES['rsgpic']['tmp_name'];
    $ttarget = $folder . basename($_FILES['rsgpic']['name']);
    move_uploaded_file($tempname, $ttarget);

    $sql = "UPDATE `user-account` SET `username`='$username', `useremail`='$email', `userphone-no`='$phone', `userpicture`='$ttarget', `userdob`='$dob',`userpassword`='$pass', `userconfirm-password`='$Cpass'";
    // $query = mysqli_query(); 
    if (mysqli_query($conn, $sql)) {
        $msg = "<div class='alert alert-success mt-3 mx-2 rounded-1 p-2 px-3'>Update Successfully</div>";
    } else {
        $msg = "<div class='alert alert-danger'>Update Failed!</div>";
    }
}
;
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

    <section class="noor-user-section  mt-3 mb-3">
        <div class="noor-profile-box">
            <div class="noor-profile-content">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="noor-profile-img">
                        <h3>Profile Picture</h3>
                        <img src="../<?php echo $row['userpicture'] ?>" alt="mypic" width="200px">
                        <label for="recipient-name" class="col-form-label user-label">Select New-Pic:</label>
                        <input type="file" class="form-control user-input mb-0" name="rsgpic">
                    </div>
                    <div class="noor-profile-form">
                        <h3>Basic Information</h3>
                        <div class="row m-0 p-0">
                            <div class="col-md-6 col-sm-12 mb-2">
                                <label for="recipient-name" class="col-form-label user-label">Full Name:</label>
                                <input type="name" class="form-control user-input"
                                    value="<?php echo $row['username'] ?>" id="name" name="rsgname">
                            </div>
                            <div class="col-md-6 col-sm-12 mb-2">
                                <label for="recipient-name" class="col-form-label user-label">Email:</label>
                                <input type="email" class="form-control user-input"
                                    value="<?php echo $row['useremail'] ?>" id="name" name="rsgemail">
                            </div>
                            <div class="col-md-6 col-sm-12 mb-2">
                                <label for="recipient-name" class="col-form-label user-label">Phone no:</label>
                                <input type="text" class="form-control user-input"
                                    value="<?php echo $row['userphone-no'] ?>" id="name" name="rsgphone">
                            </div>
                            <div class="col-md-6 col-sm-12 mb-2">
                                <label for="recipient-name" class="col-form-label user-label">Date Of Birth:</label>
                                <input type="text" class="form-control user-input" value="<?php echo $row['userdob'] ?>"
                                    onfocus="(this.type='date')" onblur="if(this.value) this.type='text'" id="name"
                                    name="rsgdob">
                            </div>
                            <div class="col-md-6 col-sm-12 mb-2">
                                <label for="recipient-name" class="col-form-label user-label">New Password:</label>
                                <input type="password" class="form-control user-input" id="name" name="rsgpass" placeholder="New Password">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="recipient-name" class="col-form-label user-label">Confirm Password:</label>
                                <input type="password" class="form-control user-input" id="name" name="rsgCpass" placeholder="Confirm Passowrd">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <input type="submit" class="btn update-btn" name="dataupdate" value="Save Changes">
                            </div>
                        </div>
                        <?php if (isset($msg)) {
                            echo $msg;
                        } ?>
                    </div>
                </form>
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