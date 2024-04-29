<?php
include("./conn.php");
if (isset($_GET['delete'])) {
    $getid = $_GET['delete'];
    $query_del = "DELETE FROM `car_rental` WHERE `id` = $getid";
    $run_id = mysqli_query($conn, $query_del);
    if ($run_id) {
      header("location:viewcarrental.php");
    } else {
    ?>
      <script>
        alert("Some Error Occur In Deleting");
      </script>
  <?php
    }
}
  ?>