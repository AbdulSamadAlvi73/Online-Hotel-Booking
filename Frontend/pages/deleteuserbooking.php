<?php
include("../Admin/conn.php");

if (isset($_GET['delete'])) {
    $getid = $_GET['delete'];
    $query_del = "DELETE FROM `booked_hotel` WHERE `id` = $getid";
    $run_id = mysqli_query($conn, $query_del);
    if ($run_id) {
      // header("location:./User-Booking.php");
      echo "<script>alert('You want to delete a booking')
      window.location.href='./User-Booking.php'</script>";
    } else {
    ?>
      <script>
        alert("Some Error Occur In Deleting");
      </script>
  <?php
    }
}
  ?>