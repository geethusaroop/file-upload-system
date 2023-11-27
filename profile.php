<?php
session_start();
if(!isset($_SESSION['id']) && $_SESSION['user_type']!=1){
    header('location: login.php');
}
$conn=mysqli_connect('localhost','root','','file_upload_system');

    $userss="select * from tbl_users where user_id='".$_SESSION['id']."'";
    $resultusers = mysqli_query($conn,$userss);
    $row=mysqli_fetch_row($resultusers)

?>

<?php include('header.php');?>

<div class="container-fluid mt-3">
  <center>
    <div class="col-lg-6">
  <div class="card">
  <div class="card-header">
  <h3>My Profile</h3>
  </div>
  <div class="card-body">
    <h5 class="card-title">Name :<?php echo $row['name']; ?></h5>
    <p class="card-text">Email :<?php echo $row['email']; ?></p>
    <p class="card-text">Phone :<?php echo $row['phone']; ?></p>
    <a href="edit.php" class="btn btn-primary">Edit</a>
  </div>
</div>
</div>
  </center>
</div>

<?php include('footer.php');?>



