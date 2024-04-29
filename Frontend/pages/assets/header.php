<?php
// session_start();
$conn = mysqli_connect('localhost','root','','royal_edge');
// include("../../Admin/conn.php");
?>



<?php
// $conn = mysqli_connect('localhost', 'root', '', 'royal_edge');
// if(isset($_POST['submit'])){
//   $name = $_POST['name'];
//   $occupation = $_POST['occupation'];
//   $massage = $_POST['massage'];

//   $image = $_FILES['image']['name'];
//   $image_temp = $_FILES['image']['tmp_name'];
//   $folder = "../Admin/Dashboard/upload/";
//   $target = $folder.$image;
//   move_uploaded_file($image_temp, $target);

//   $feedback_query = "INSERT INTO `testimonail` (`name`, `massage`,`image`, `occupation`) VALUES ('$name','$massage','$target','$occupation')";
//   $query_run = mysqli_query($conn,$feedback_query);
// }
?>




<!-- navbar-section-start -->
<div class="noor-main-navgbar" id="noor-navgbar">
    <div class="noor-logo">
        <a href=".././Index.php"><img src="../images/royallogo.png" alt="RoyalEdge"></a>
    </div>
    <div class="noor-menu">
        <div class="noor-btn">
            <i class="fa-solid fa-xmark close-btn"></i>
        </div>
        <ul class="noor-navgbar">
            <li><a href=".././Index.php">Home</a></li>
            <!-- <li><a href="#">Add Hotels</a></li> -->
            <li><a href="../../../../AptechVision/Frontend/pages/car-rental.php">Car Rantals</a></li>
            <li><a href="../../../../AptechVision/Frontend/pages/our-events.php">Our-Events</a></li>
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Feedback</a></li>
            <li><a href="../../../../AptechVision/Frontend/pages/contactus.php">Contact Us</a></li>
        </ul>
    </div>
    <div class="noor-login">
        <?php if (!isset($_SESSION['user_id'])): ?>
            <a href="./User-Login.php"><button type="button" class="login-btn">Login</button></a>
            <a href="./User-Register.php"><button type="button" class="login-btn">Register</button></a>
        <?php endif ?>
        <?php if (isset($_SESSION['user_id'])): ?>
            <li style="list-style-type:none;">
            <a href="#" class="user-profile mx-3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src=../<?php echo $_SESSION['user_pic']; ?> alt=Image path Invalid name=image />
                  <?php echo $_SESSION['user_name']; ?>
                </a>
                <ul class="dropdown-menu login-menu rounded-0">
                    <li><a class="dropdown-item" href="./User-Profile.php?uid=<?php echo $_SESSION['user_id']?>">My Profile</a></li>
                    <li><a class="dropdown-item" href="./User-Booking.php">My Bookings</a></li>
                    <li><a class="dropdown-item" href="./Logout.php">Logout</a></li>
                </ul>
            </li>
        <?php endif ?>
        <i class="fa-solid fa-bars open-btn"></i>
    </div>
</div>
<!-- navbar-section-end -->




   <!-- start-modal -->

   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="samad-modal modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 modal-heading" id="exampleModalLabel">Feedback Form</h1>
                    <button type="button" class="btn-close btn-close-red" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
        <form action=".././Index.php" method="POST" enctype="multipart/form-data">
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