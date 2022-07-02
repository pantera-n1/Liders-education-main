<?php session_start();
    // $conn = mysqli_connect('localhost','root','','webstar');

    // if(!isset($_SESSION['email'])){
    //   echo "<script>window.open('calendar.php', '_self');</script>";
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./fullCalendarCss/font-awesome.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="./fullCalendarCss/fullCalendar.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./fullCalendarCss/theme.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <nav class="mt-2" style="height: 200vh;">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item">
                <a href="dashboardtable.php" class="nav-link">
                  <i class="far fa-circle nav-icon active"></i>
                  <p>Dashboard</p>
                </a>
              </li>
          </li>
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar Events
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Chart
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="videoUpload/view.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Uploaded Video
                <span class="badge badge-info right">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
               Pupil's Punishment list
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="userFeedback.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
               User's feedback
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<div class="container" style="width: 60%;">
<h2>User Feedback Table</h2>
  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Deatils</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $conn = mysqli_connect('localhost','root','','webstar');
        $select = "SELECT * FROM `description`";
        $run = mysqli_query($conn,$select);
        while( $row_user = mysqli_fetch_array($run)){;
          $user_id = $row_user['id'];
          $user_name = $row_user['name'];
          $user_email = $row_user['email'];
          $user_details = $row_user['details'];
      ?>
      <tr>
        <td><?= $user_id;?></td>
        <td><?= $user_name;?></td>
        <td><?= $user_email;?></td>
        <td><?= $user_details;?></td>
      </tr>
      <?php }?>
    </tbody>
  </table>
  <a class="btn btn-danger" href="logout.php">Log Out</a>
</div>

  </div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
