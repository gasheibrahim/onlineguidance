<?php
    session_start();
    include "config.php";
    $email=$_GET["email"];
    $res=mysqli_query($con, "select * from students where email='".$_SESSION['email']."'");
    while($row=mysqli_fetch_array($res))
    {
        $fullname=$row["fullname"];
    }
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include 'includes/header.php'?>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <?php include 'includes/topbar.php'?>
        <?php include 'includes/sidebar.php'?>

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title"><i class="mdi mdi-alarm-check"></i> New Appointment</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Appointment</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                    require('config.php');
                                    session_start();
                                    if (isset($_REQUEST['student_name'])) {
                                        // removes backslashes
                                        $email = stripslashes($_SESSION['email']);
                                        //escapes special characters in a string
                                        $email = mysqli_real_escape_string($con, $email);
                                        $referral    = stripslashes($_REQUEST['referral']);
                                        $referral = mysqli_real_escape_string($con, $referral);
                                        $concern    = stripslashes($_REQUEST['concern']);
                                        $concern    = mysqli_real_escape_string($con, $concern);
                                        $date    = stripslashes($_REQUEST['date']);
                                        $date = mysqli_real_escape_string($con, $date);
                                        $time    = stripslashes($_REQUEST['time']);
                                        $time = mysqli_real_escape_string($con, $time);
                                        $password    = stripslashes($_REQUEST['password']);
                                        $password = mysqli_real_escape_string($con, $password);
                                        $query    = "INSERT into `reservation` (student_name, referral, concern, date, time)
                                                     VALUES ('$email','$referral','$concern','$date','$time')";
                                        $result   = mysqli_query($con, $query);
                                        if ($result) {
                                            echo ("<script LANGUAGE='JavaScript'>
                                            window.alert('Reservation Successfully, Thank You');
                                            window.location.href='http://localhost/onlineguidance/students/index.php';
                                            </script>");
                                            
                                            
                                        } else {
                                            echo ("<script LANGUAGE='JavaScript'>
                                            window.alert('Reservation Failed, Try Again');
                                            window.location.href='http://localhost/onlineguidance/students/new-appointment.php';
                                            </script>");
                                        }
                                    } else {
                                    ?>
                                <form method="post" class="form-horizontal form-material mx-2">
                                    <div class="form-group">
                                        <label class="col-md-12">Student Email</label>
                                        <div class="col-md-12">
                                            <input type="text" name="fullname" value="<?php echo $_SESSION['email'];?>"
                                                class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Reasons for Referral</label>
                                        <div class="col-md-12">
                                            <select name="referral" class="form-control">
                                                <option value="Bullying" selected>Bullying</option>
                                                <option value="Depression">Depression</option>
                                                <option value="Stressed">Stressed</option>
                                            </select>
                                            <!-- <textarea rows="5" class="form-control form-control-line"></textarea> -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">State Reasons/Concern</label>
                                        <div class="col-md-12">
                                            <select name="concern" class="form-control">
                                                <option value="Bullying" selected>Bullying</option>
                                                <option value="Depression">Depression</option>
                                                <option value="Stressed">Stressed</option>
                                            </select>
                                            <!-- <textarea rows="5" class="form-control form-control-line"></textarea> -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Select Date</label>
                                        <div class="col-md-12">
                                            <input type="date" name="date" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Select Time</label>
                                        <div class="col-md-12">
                                            <input type="time"  name="time" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button name="submit" class="btn btn-success text-white">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->

    <?php include 'includes/footer.php'?>
</body>

</html>