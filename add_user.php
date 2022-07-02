<!DOCTYPE html>
<html lang="en">
<head>
  <title>Enroll in a course</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Enroll in a course</h2>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Name:</label>
      <input type="text" class="form-control" placeholder="name" name="user_name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" placeholder="Enter email" name="user_email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="user_password">
    </div>
	<div class="form-group">
      <label>Image:</label>
    </div>
	<div class="form-group">
      <label>Details:</label>
	  <textarea name="user_details" class="form-control"></textarea>
	</div>
    
    <input type="submit" name="insert-btn" class="btn btn-primary"/>
  </form>

	<?php
		$conn = mysqli_connect('localhost','root','','webstar');

		if(isset($_POST['insert-btn'])){
			$user_name = $_POST['user_name'];
			$user_email = $_POST['user_email'];
			$user_password = $_POST['user_password'];
			$image = $_FILES['user_image']['name'];
			$tmp_name = $_FILES['user_image']['tmp_name'];
			$user_details = $_POST['user_details'];

			$insert = "INSERT INTO user(user_name,user_email,user_password,user_image,user_details) VALUES('$user_name','$user_email','$user_password','$image','$user_details')";

			$run_insert = mysqli_query($conn,$insert);
      var_dump($run_insert);"<br><br>";
      var_dump($image);
			if($run_insert === true){
				echo "You have successfully registered";
				move_uploaded_file($tmp_name,"upload/$image");
			}else{
				echo "You haven't successfully registered";
			}
		}
	?>
  
    <a class="btn btn-success" href="/index.php"> HOME </a>
</div>

</body>
</html>
