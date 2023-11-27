<?php
session_start();
if(!isset($_SESSION['id']) && $_SESSION['user_type']!=1){
    header('location: login.php');
}
$conn=mysqli_connect('localhost','root','','file_upload_system');

    $users="select * from tbl_users where tbl_users.user_type=2";
    $resultuser = mysqli_query($conn,$users);

?>

<?php include('header.php');?>

<div class="container-fluid mt-3">
  <h3>Users Details</h3>
  <table class="table table-striped">
    <thead>
      <tr>
      <th>Sl.No</th>
      <th>name</th>
        <th>email</th>
        <th>Phone Number</th>
        <th>Date & Time</th>
      </tr>
    </thead>
    <tbody>
    <?php $i=1; while($rowuser = mysqli_fetch_assoc($resultuser)) {  ?>         
      <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $rowuser['name']; ?></td>
      <td><?php echo $rowuser['email']; ?></td>
      <td><?php echo $rowuser['phone']; ?></td>
        <td><?php echo date('d/m/Y h:i:s a',strtotime($rowuser['created_at'])) ?></td>
      </tr>
      <?php $i++; } ?>
    </tbody>
  </table>
</div>

<?php include('footer.php');?>



