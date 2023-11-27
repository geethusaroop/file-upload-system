<?php
session_start();
if(!isset($_SESSION['id']) && $_SESSION['user_type']!=2){
    header('location: login.php');
}
$conn=mysqli_connect('localhost','root','','file_upload_system');

function isAllowedFileType($fileType) {
    $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    return in_array($fileType, $allowedTypes);
}

// Function to sanitize file name
function sanitizeFileName($fileName) {
    // Remove potentially harmful characters
    $sanitizedFileName = preg_replace("/[^a-zA-Z0-9_.-]/", "", $fileName);
    return $sanitizedFileName;
}

function handleFileUpload() {
    $conn=mysqli_connect('localhost','root','','file_upload_system');
    $uploadDir = 'uploads/';  // Set your desired upload directory
    $maxFileSize = 5 * 1024 * 1024;  // 5 MB

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES['file'])) {
            $file = $_FILES['file'];

            // Check for file type
            if (!isAllowedFileType($file['type'])) {
                echo "Invalid file type. Allowed types are JPG, PNG, PDF, and DOCX.";
                return;
            }

            // Check for file size
            if ($file['size'] > $maxFileSize) {
                echo "File size exceeds the limit of 5MB.";
                return;
            }

            // Sanitize file name
            $fileName = sanitizeFileName($_FILES["file"]["name"]);

            // Move the uploaded file to the desired directory
            $destination = $uploadDir . $fileName;
            if (move_uploaded_file($file['tmp_name'], $destination)) {
                $sql = "INSERT INTO tbl_uploads (user_id_fk, upload_filename,upload_status,created_at) VALUES ('".$_SESSION['id']."','".$fileName."',1,NOW())";
                $result = mysqli_query($conn,$sql);
                if($result)
                {
                    $sqllog = "INSERT INTO tbl_log (log_user_id_fk,log_ip_address,log_filename,log_time) VALUES ('".$_SESSION['id']."','".$_SERVER['REMOTE_ADDR']."','".$fileName."',NOW())";
                    $resultlog = mysqli_query($conn,$sqllog);
                }
                ?>
                <script>
                alert("File Uploaded Successfully");
                window.location.href = "dashboard.php";
                </script>
                <?php	
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "No file uploaded.";
        }
    }
}
handleFileUpload();
?>

<?php include('header.php');?>

<div class="container-fluid mt-3">
<form action="" name="form1" method="post" enctype="multipart/form-data">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">  <h2>Upload New File</h2></div>
            <div class="card-body">
                <div class="form-group">
                    <div class="col-md-12">
                    <label for="email">Upload:</label>
                    <input type="file" class="form-control" id="file" name="file" value=""  accept=".jpg, .png, .pdf, .docx">
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
<script>
    function validate()
{
	
	if(document.form1.file.value=="")
	{

		alert('Please Select a File');	
		document.form1.file.focus();
		return false;

	}

   
	return true;
}


</script>



