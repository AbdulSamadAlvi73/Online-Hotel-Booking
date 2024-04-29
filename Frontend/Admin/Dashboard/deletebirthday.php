<?php
include("./conn.php");
if (isset($_GET['delete'])) {
    $getid = $_GET['delete'];
    $query_del = "DELETE FROM `birthday` WHERE `id` = $getid";
    $run_id = mysqli_query($conn, $query_del);
    if ($run_id) {
      header("location:viewbirthday.php");
    } else {
    ?>
      <script>
        alert("Some Error Occur In Deleting");
      </script>
  <?php
    }
}
  ?>