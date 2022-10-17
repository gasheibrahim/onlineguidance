<?php
    session_start();
    include "config.php";
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

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title"><i class="mdi mdi-account-multiple-plus"></i>Add Referrals</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Referral</li>
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
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                    require('config.php');
                                    session_start();
                                    if (isset($_REQUEST['reason'])) {
                                        // removes backslashes
                                        $reason = stripslashes($_REQUEST['reason']);
                                        //escapes special characters in a string
                                        $reason = mysqli_real_escape_string($con, $reason);
                                        $description    = stripslashes($_REQUEST['description']);
                                        $description = mysqli_real_escape_string($con, $description);
                                        $query    = "INSERT into `referral_reason` (reason, description)
                                                     VALUES ('$reason','$description')";
                                        $result   = mysqli_query($con, $query);
                                        if ($result) {
                                            echo ("<script LANGUAGE='JavaScript'>
                                            window.alert('Referral Added Successfully, Thank You');
                                            window.location.href='http://localhost/onlineguidance/admin/referral.php';
                                            </script>");
                                            
                                            
                                        } else {
                                            echo ("<script LANGUAGE='JavaScript'>
                                            window.alert('Referral Added Failed, Try Again');
                                            window.location.href='http://localhost/onlineguidance/admin/addreferral.php';
                                            </script>");
                                        }
                                    } else {
                                    ?>
                                <form method="post" class="form-horizontal form-material mx-2">
                                    <div class="form-group">
                                        <label class="col-md-12">Reasons for Referral</label>
                                        <div class="col-md-12">
                                            <select name="reason" class="form-control">
                                                <option value="Bullying" selected>Bullying</option>
                                                <option value="Depression">Depression</option>
                                                <option value="Stressed">Stressed</option>
                                            </select>
                                            <!-- <textarea rows="5" class="form-control form-control-line"></textarea> -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Description</label>
                                        <div class="col-md-12">
    
                                                <textarea name="description" placeholder="Enter Reason Description" class="form-control form-control-line"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button name="submit" class="btn btn-success text-white">Add Referral</button>
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
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
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