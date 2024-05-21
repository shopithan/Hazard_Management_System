<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
{ 
    header('location:index.php');
}
else { ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>CMS | Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        #main-content {
            flex: 1;
        }
        .site-footer {
            background-color: #f8f9fa;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        .btn-register-complaint {
            display: block;
            width: 100%;
            max-width: 300px;
            margin: 20px auto;
            padding: 15px;
            font-size: 18px;
            text-align: center;
        }
        .box0 {
            margin-bottom: 20px;
        }
        .box1 {
            padding: 20px;
            background-color: #f4f4f4;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }
        .box1 .fa {
            font-size: 40px;
            color: #d9534f;
        }
       .box1:hover {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* No additional border on hover */
        }
        .box1 p {
            margin-top: 10px;
            color: #d9534f;
        }
        .box1:hover {
            color: #fff !important;
            text-decoration: none;
        }
    </style>
</head>

<body>

<section id="container">
    <?php include("includes/header.php");?>
    <?php include("includes/sidebar.php");?>
    <section id="main-content">
        <section class="wrapper">
            <div class="row">

            <!-- Register Complaint Button -->
            <button type="button" class="btn btn-danger btn-register-complaint" onclick="window.location.href='register-complaint.php'">Submit New Hazard Report
            </button>
                <div class="col-lg-12 main-chart">
                <div class="d-flex justify-content-center">
                    <div class="col-md-2 col-sm-2 box0">
                        <div>
                        </div>
                    </div>
                    
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <i class="fa fa-spinner"></i>
                            <?php 
                            $rt = mysqli_query($bd, "SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and status is null");
                            $num1 = mysqli_num_rows($rt);
                            ?>
                            <h3><?php echo htmlentities($num1);?></h3>
                        </div>
                        <p><?php echo htmlentities($num1);?> Complaints not Process yet</p>
                    </div>

                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <i class="fa fa-file-text-o"></i>
                            <?php 
                            $status="in Process";                   
                            $rt = mysqli_query($bd, "SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and  status='$status'");
                            $num1 = mysqli_num_rows($rt);
                            ?>
                            <h3><?php echo htmlentities($num1);?></h3>
                        </div>
                        <p><?php echo htmlentities($num1);?> Complaints Status in process</p>
                    </div>

                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <i class="fa fa-file-text-o"></i>
                            <?php 
                            $status="closed";                   
                            $rt = mysqli_query($bd, "SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and  status='$status'");
                            $num1 = mysqli_num_rows($rt);
                            ?>
                            <h3><?php echo htmlentities($num1);?></h3>
                        </div>
                        <p><?php echo htmlentities($num1);?> Complaint has been closed</p>
                    </div>
    </div>
                </div>
            </div><!-- /row mt -->
        </section>
    </section>
    <?php include("includes/footer.php");?>
</section>

<!-- Register Complaint Modal -->
<div class="modal fade" id="registerComplaintModal" tabindex="-1" role="dialog" aria-labelledby="registerComplaintModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerComplaintModalLabel">Register Complaint</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="complaintForm" method="post" enctype="multipart/form-data" action="register-complaint.php">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="">Select Category</option>
                            <?php
                            $sql = mysqli_query($bd, "select id,categoryName from category");
                            while ($rw = mysqli_fetch_array($sql)) {
                            ?>
                            <option value="<?php echo htmlentities($rw['id']);?>"><?php echo htmlentities($rw['categoryName']);?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategory">Sub Category</label>
                        <select name="subcategory" id="subcategory" class="form-control">
                            <option value="">Select Subcategory</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="complaintype">Complaint Type</label>
                        <select name="complaintype" class="form-control" required>
                            <option value="Complaint">Complaint</option>
                            <option value="General Query">General Query</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="state">State</label>
                        <select name="state" class="form-control" required>
                            <option value="">Select State</option>
                            <?php 
                            $sql = mysqli_query($bd, "select stateName from state");
                            while ($rw = mysqli_fetch_array($sql)) {
                            ?>
                            <option value="<?php echo htmlentities($rw['stateName']);?>"><?php echo htmlentities($rw['stateName']);?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="noc">Nature of Complaint</label>
                        <input type="text" name="noc" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="complaindetails">Complaint Details (max 2000 words)</label>
                        <textarea name="complaindetails" cols="10" rows="10" class="form-control" maxlength="2000" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="compfile">Complaint Related Doc (if any)</label>
                        <input type="file" name="compfile" class="form-control">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery-1.8.3.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="assets/js/jquery.sparkline.js"></script>

<!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script>

<script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="assets/js/gritter-conf.js"></script>

<!--script for this page-->
<script src="assets/js/sparkline-chart.js"></script>    
<script src="assets/js/zabuto_calendar.js"></script>    

<script>
    //custom select box
    $(function(){
        $('select.styled').customSelect();
    });

    // Load subcategories when category changes
    $('#category').change(function() {
        $.ajax({
            type: "POST",
            url: "getsubcat.php",
            data: {catid: $(this).val()},
            success: function(data){
                $("#subcategory").html(data);
            }
        });
    });
</script>

</body>
</html>
<?php } ?>
