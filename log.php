<?php
session_start();
if(!isset($_SESSION['id']) && $_SESSION['user_type']!=1){
    header('location: login.php');
}
$conn=mysqli_connect('localhost','root','','file_upload_system');

    $users="select * from tbl_log left join tbl_users on(user_id=log_user_id_fk)";
    $resultuser = mysqli_query($conn,$users);

?>

<?php include('header.php');?>

<div class="container-fluid mt-3">
  <h3>Users Details</h3>
  <table class="table table-striped">
    <thead>
      <tr>
      <th>Sl.No</th>
        <th>user name</th>
        <th>IP Address</th>
        <th>File name</th>
        <th>Date & Time</th>
      </tr>
    </thead>
    <tbody>
    <?php $i=1; while($rowuser = mysqli_fetch_assoc($resultuser)) {  ?>         
      <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $rowuser['name']; ?></td>
      <td><?php echo $rowuser['log_ip_address']; ?></td>
      <td><?php echo $rowuser['log_filename']; ?></td>
        <td><?php echo date('d/m/Y h:i:s a',strtotime($rowuser['log_time'])) ?></td>
      </tr>
      <?php $i++; } ?>
    </tbody>
  </table>
</div>

<?php include('footer.php');?>



