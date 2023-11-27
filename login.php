<?php
session_start();
$conn=mysqli_connect('localhost','root','','file_upload_system');
if(isset($_POST['submit']))
{
    $username=$_POST['user_name'];
    $password=$_POST['password'];
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($conn, $username);  
    $password = mysqli_real_escape_string($conn, $password);  
    $sql = "SELECT * FROM tbl_users WHERE user_name='$username'";
    $result = mysqli_query($conn,$sql);
  
    $count = mysqli_num_rows($result);  
    if ($count == 1) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
        $user_id = $row['user_id'];
        $user_name = $row['user_name']; 
        $type = $row['user_type']; 
        if (password_verify($password, $row['user_password'])) 
        {
            $_SESSION['id'] =  $user_id ;
            $_SESSION['username'] =  $user_name;
            $_SESSION['user_type'] =  $type;
                ?>
                <script>
                alert("Login successful");
                window.location.href = "dashboard.php";
                </script>
                <?php	
           
        } 
        else 
        {
            echo '<div class="alert alert-danger">Invalid password</div>';
        }
        } 
        else 
        {
            echo '<div class="alert alert-danger">User not found</div>';
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>File Upload System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <form action="" name="form1" method="post">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">  <h2>Login Form</h2></div>
            <div class="card-body">
                <div class="form-group">
                    <div class="col-md-12">
                    <label for="email">Username:</label>
                    <input type="text" class="form-control" id="user_name" placeholder="Enter Username" name="user_name" value="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="">
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-success"  onClick="return validate();" name="submit">Submit</button>
                <a href="register.php"><button type="button" class="btn btn-primary">Register Now</button></a>
            </div>
        </div>
    </div>
  </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>
<script  type="text/javascript" language="javascript">
function validate()
{
	
	if(document.form1.user_name.value=="")
	{

		alert('Enter Username');	
		document.form1.user_name.focus();
		return false;

	}

    if(document.form1.password.value=="")
	{

		alert('Enter Password');	
		document.form1.password.focus();
		return false;

	}

	
	return true;
}


</script>

