<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<br><br>
<div class="container">
  <h2>View Users</h2>
  <?php

    $conn = mysqli_connect('localhost','root','','webstar');
    if(isset($_GET['del'])){
      $del_id = $_GET['del'];

      $delete = "DELETE FROM user WHERE user_id='$del_id'";
      $run_delete = mysqli_query($conn,$delete);
        if($run_delete === true){
          echo "<script>alert('User deleted')</script>";
        }else{
          echo "Faild DELETED";
        }
    }
  ?>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Image</th>
        <th>Deatils</th>
        <th>Delete</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $conn = mysqli_connect('localhost','root','','webstar');
        $select = "SELECT * FROM user";
        $run = mysqli_query($conn,$select);
        while( $row_user = mysqli_fetch_array($run)){;
          $user_id = $row_user['user_id'];
          $user_name = $row_user['user_name'];
          $user_email = $row_user['user_email'];
          $user_password = $row_user['user_password'];
          $user_image = $row_user['user_image'];
          $user_details = $row_user['user_details'];
      ?>
      <tr>
        <td><?= $user_id;?></td>
        <td><?= $user_name;?></td>
        <td><?= $user_email;?></td>
        <td><?= $user_password;?></td>
        <td><img src="upload/<?= $user_image?>" height=70px></img></td>
        <td><?= $user_details;?></td>
        <td><a class="btn btn-danger" href="view_user.php?del=<?= $user_id;?>">Delete</a></td>
        <td><a class="btn btn-success" href="edit_user.php?edit=<?= $user_id;?>">Edit</a></td>
      </tr>
      <?php }?>
    </tbody>
  </table>
</div>

</body>
</html>
