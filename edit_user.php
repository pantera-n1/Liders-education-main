<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit user data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Edit user</h2>

  <?php

    $conn = mysqli_connect('localhost','root','','webstar');
    if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $select = "SELECT * FROM user WHERE user_id='$edit_id'";
      $run = mysqli_query($conn,$select);
      $row_user = mysqli_fetch_array($run);
          $user_name = $row_user['user_name'];
          $user_email = $row_user['user_email'];
          $user_password = $row_user['user_password'];
        echo  $user_image = $row_user['user_image'];
          $user_details = $row_user['user_details'];
      
    }
  ?>

  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Name:</label>
      <input type="text" value="<?= $user_name?>" class="form-control" placeholder="name" name="user_name"/>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" value="<?= $user_email?>" class="form-control" placeholder="Enter email" name="user_email"/>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" value="<?= $user_password?>" class="form-control" placeholder="Enter password" name="user_password"/>
    </div>
	<div class="form-group">
      <label>Image:</label>
      <input type="file"  class="form-control" value="<?= $user_image?>" placeholder="Name" name="image"/>
    </div>
	<div class="form-group">
      <label>Details:</label>
	  <textarea name="user_details" class="form-control"><?= $user_details?></textarea>
	</div>
    
    <input type="submit" name="insert-btn" class="btn btn-primary"/>
  </form>

	<?php
		$conn = mysqli_connect('localhost','root','','webstar');

		if(isset($_POST['insert-btn'])){
			$euser_name = $_POST['user_name'];
			$euser_email = $_POST['user_email'];
			$euser_password = $_POST['user_password'];
			$eimage = $_FILES['image']['name'];
			$eimage_tmp = $_FILES['image']['tmp_name'];
			$euser_details = $_POST['user_details'];

            if(empty($eimage)){
                $eimage = $user_image;
            }

			$update = "UPDATE user SET user_name='$euser_name',user_email='$euser_email',user_password='$euser_password',user_image='$eimage',user_details='$euser_details' WHERE user_id='$edit_id'";

			$run_update = mysqli_query($conn,$update);
      var_dump($run_update);
			if($run_update === true){
				echo "Data Seccesfull update";
				move_uploaded_file($eimage_tmp, "upload/$eimage");
			}else{
        echo "Failed";
      }

		}
	?>
    <br><br>
<a class="btn btn-primary" href="/dashboardtable.php">View users</a>
<br><br><br>
</div>

</body>
</html>
