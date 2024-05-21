<?php
session_start();
include('include/config.php');

if(strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Dashboard</title>

    <!-- Bootstrap core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Additional CSS Files -->
<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
<link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
<link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/style-responsive.css" rel="stylesheet">
<link href="assets/css/dashboard-custom.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container">
    <?php include("include/dashboard-header.php"); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3">
                <?php include("include/dashboard-sidebar.php"); ?>
            </div>
            <div class="span9">
                <section id="main-content">
                    <section class="wrapper">
                        <h3 class="center-text"> Welcome to Admin Dashboard</h3>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="d-flex justify-content-left">
                                    <!-- Total Users -->
                                    <div class="span2 box0">
                                        <div class="box1">
                                            <span class="fa fa-users"></span>
                                            <?php 
                                            $query = mysqli_query($bd, "SELECT COUNT(*) as totalUsers FROM users");
                                            $result = mysqli_fetch_array($query);
                                            ?>
                                            <h3><?php echo htmlentities($result['totalUsers']);?></h3>
                                        </div>
                                        <p>Total Users</p>
                                    </div>

                                    <!-- Total Complaints -->
                                    <div class="span2 box0">
                                        <div class="box1">
                                            <span class="fa fa-file-text"></span>
                                            <?php 
                                            $query = mysqli_query($bd, "SELECT COUNT(*) as totalComplaints FROM tblcomplaints");
                                            $result = mysqli_fetch_array($query);
                                            ?>
                                            <h3><?php echo htmlentities($result['totalComplaints']);?></h3>
                                        </div>
                                        <p>Total Hazards</p>
                                    </div>

                                    <!-- Open Complaints -->
                                    <div class="span2 box0">
                                        <div class="box1">
                                            <span class="fa fa-folder-open"></span>
                                            <?php 
                                            $query = mysqli_query($bd, "SELECT COUNT(*) as openComplaints FROM tblcomplaints WHERE status IS NULL");
                                            $result = mysqli_fetch_array($query);
                                            ?>
                                            <h3><?php echo htmlentities($result['openComplaints']);?></h3>
                                        </div>
                                        <p>Open Hazards</p>
                                    </div>

                                    <!-- Closed Complaints -->
                                    <div class="span2 box0">
                                        <div class="box1">
                                            <span class="fa fa-folder"></span>
                                            <?php 
                                            $query = mysqli_query($bd, "SELECT COUNT(*) as closedComplaints FROM tblcomplaints WHERE status='closed'");
                                            $result = mysqli_fetch_array($query);
                                            ?>
                                            <h3><?php echo htmlentities($result['closedComplaints']);?></h3>
                                        </div>
                                        <p>Closed Hazards</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
        </div>
    </div>
    <?php include("include/dashboard-footer.php");?>
</section>

<!-- js placed at the end of the document so the pages load faster -->
<!-- JS placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="assets/js/jquery.sparkline.js"></script>

<!-- Common script for all pages -->
<script src="assets/js/common-scripts.js"></script>

<script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="assets/js/gritter-conf.js"></script>

<!-- Script for this page -->
<script src="assets/js/sparkline-chart.js"></script>
<script src="assets/js/zabuto_calendar.js"></script>

</body>
</html>
<?php } ?>
