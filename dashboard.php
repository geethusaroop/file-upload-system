<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location: login.php');
}
$conn=mysqli_connect('localhost','root','','file_upload_system');
if($_SESSION['user_type']==1){
   $uploads="select *,tbl_uploads.created_at as upload_created_at from tbl_uploads left join tbl_users on(user_id=user_id_fk)";
    $resultuploads = mysqli_query($conn,$uploads);
}
else
{
    $uploads="select *,tbl_uploads.created_at as upload_created_at from tbl_uploads left join tbl_users on(user_id=user_id_fk) where user_id_fk='".$_SESSION['id']."'";
    $resultuploads = mysqli_query($conn,$uploads);
}
?>

<?php include('header.php');?>

<div class="container-fluid mt-3">
  <h3>Uploads</h3>
  <table class="table table-striped">
    <thead>
      <tr>
      <th>Sl.No</th>
      <th>User</th>
        <th>Uploads</th>
        <th>Date & Time</th>
      </tr>
    </thead>
    <tbody>
    <?php $i=1; while($rowuploads = mysqli_fetch_assoc($resultuploads)) {  ?>         
      <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $rowuploads['name']; ?></td>
      <?php $fileName = $rowuploads['upload_filename'];$ext = substr(strrchr($fileName, '.'), 1);?>
        <?php if($ext=="pdf")
        {
        ?>
         <td><a href='uploads/<?php echo $rowuploads['upload_filename'] ?>' target='_blank'>View PDF</a></td>
        <?php
        }else if($ext=="docx"){ ?> 
         <td><a href='uploads/<?php echo $rowuploads['upload_filename'] ?>' target='_blank'>View Word Document</a></td>
        <?php } else{ ?> 
       
         <td><img src="uploads/<?php echo $rowuploads['upload_filename'] ?>" width="100" height="100"></td>
        <?php } ?>
       
        <td><?php echo date('d/m/Y h:i:s a',strtotime($rowuploads['upload_created_at'])) ?></td>
      </tr>
      <?php $i++; } ?>
    </tbody>
  </table>
</div>

<?php include('footer.php');?>



