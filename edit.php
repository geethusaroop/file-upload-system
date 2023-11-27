<?php
session_start();
$conn=mysqli_connect('localhost','root','','file_upload_system');
$userss="select * from tbl_users where user_id='".$_SESSION['id']."'";
$resultusers = mysqli_query($conn,$userss);
$row=mysqli_fetch_array($resultusers);
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $sql = "update tbl_users set name='".$name."', email='".$email."', phone='".$phone."' where user_id='".$_SESSION['id']."'";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        ?>
        <script>
        alert("User Details Updated successfully");
        window.location.href = "profile.php";
        </script>
        <?php	
    }
    else
    {
        echo '<div class="alert alert-danger">Unsuccessful</div>';
    }
}
?>
<?php include('header.php');?>

<div class="container mt-3">
  <form action="" name="form1" method="post">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">  <h2>Edit User Details</h2></div>
            <div class="card-body">
            <div class="form-group">
                    <div class="col-md-12">
                    <label for="email">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?php echo $row['name'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                    <label for="pwd">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $row['email'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                    <label for="pwd">Phone:</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter phone Number" name="phone" value="<?php echo $row['phone'] ?>">
                    </div>
                </div>
             
                <hr>
                <button type="submit" class="btn btn-success"  onClick="return validate();" name="submit">Submit</button>
            </div>
        </div>
    </div>
  </form>
</div>

<?php include('footer.php');?>
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

