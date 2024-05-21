<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
{
    header('location:index.php');
}
else {
    if(isset($_POST['ajax']) && isset($_POST['submit']))
    {
        $category=$_POST['category'];
        $subcategory=$_POST['subcategory'];
        $complaintype=$_POST['complaintype'];
        $state=$_POST['state'];
        $noc=$_POST['noc'];
        $complaindetails=$_POST['complaindetails'];
        $compfile=$_FILES["compfile"]["name"];
        move_uploaded_file($_FILES["compfile"]["tmp_name"],"complaintdocs/".$_FILES["compfile"]["name"]);
        $query=mysqli_query($bd, "insert into tblcomplaints(userId,category,subcategory,complaintType,state,noc,complaintDetails,complaintFile) values('".$_SESSION['id']."','$category','$subcategory','$complaintype','$state','$noc','$complaindetails','$compfile')");
        
        if($query) {
            echo json_encode(['status' => 'success', 'message' => 'Your complaint has been successfully filed']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Something went wrong. Please try again.']);
        }
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>CMS | Register Complaint</title>

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

    <script src="assets/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container">
    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Register Complaint</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="content-panel">
                        <div id="alert-container"></div> <!-- Alert container -->
                        <form id="complaintForm" method="post" enctype="multipart/form-data">
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
                            <input type="hidden" name="ajax" value="1">
                            <input type="hidden" name="submit" value="1">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmModal">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <?php include("includes/footer.php"); ?>
</section>

<!-- Confirm Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirm Submission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to submit the complaint?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmSubmit">Submit</button>
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
    // Custom select box
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

    // Function to display Bootstrap alerts
    function showAlert(message, type) {
        var alertHtml = '<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' +
                        message +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '</button>' +
                        '</div>';
        document.getElementById('alert-container').innerHTML = alertHtml;
    }

    // Form submission using AJAX
    function submitForm() {
        var formData = new FormData(document.getElementById('complaintForm'));

        $.ajax({
            type: 'POST',
            url: 'register-complaint.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);  // Debugging: Log the response
                var res = JSON.parse(response);
                if (res.status === 'success') {
                    showAlert(res.message, 'success');
                    setTimeout(function() {
                        window.location.href = 'dashboard.php';
                    }, 2000);
                } else {
                    showAlert(res.message, 'danger');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error: ' + textStatus, errorThrown);  // Debugging: Log any errors
                showAlert('An error occurred. Please try again.', 'danger');
            }
        });
    }

    // Handle confirm submit button click
    document.getElementById('confirmSubmit').addEventListener('click', function() {
        $('#confirmModal').modal('hide');
        submitForm();
    });
</script>

</body>
</html>
<?php } ?>
