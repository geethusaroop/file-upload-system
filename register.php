<?php
session_start();
$conn=mysqli_connect('localhost','root','','file_upload_system');
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $username=$_POST['user_name'];
    $password=$_POST['password'];
    $username = mysqli_real_escape_string($conn, $username);   
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $sql = "INSERT INTO tbl_users (name,email,phone,user_name, user_password,user_status,user_type,created_at) VALUES ('".$name."','".$email."','".$phone."','".$username."','".$password."',1,2,NOW())";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        ?>
        <script>
        alert("Registration successful");
        window.location.href = "login.php";
        </script>
        <?php	
    }
    else
    {
        echo '<div class="alert alert-danger">Unsuccessful</div>';
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
  <form action="register.php" name="form1" method="post">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">  <h2>Registration Form</h2></div>
            <div class="card-body">
            <div class="form-group">
                    <div class="col-md-12">
                    <label for="email">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                    <label for="pwd">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                    <label for="pwd">Phone:</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter phone Number" name="phone" value="">
                    </div>
                </div>
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
    if(document.form1.name.value=="")
	{

		alert('Enter name');	
		document.form1.name.focus();
		return false;

	}
	
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

    if(document.form1.email.value!="")
    {
        var x=document.form1.email.value;

        if(x!="")

        {

            var atpos=x.indexOf("@");

            var dotpos=x.lastIndexOf(".");

            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)

            {

                alert("Not a valid e-mail address");
                document.form1.email.focus();
                return false;

            }

        }
    }

	
	return true;
}


</script>

