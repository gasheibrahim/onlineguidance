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
                        <h4 class="page-title"><i class="mdi mdi-book-open-page-variant"></i> Course</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Course</li>
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
                                    if (isset($_REQUEST['course_code'])) {
                                        // removes backslashes
                                        $course_code = stripslashes($_REQUEST['course_code']);
                                        //escapes special characters in a string
                                        $course_code = mysqli_real_escape_string($con, $course_code);
                                        $complete_name    = stripslashes($_REQUEST['complete_name']);
                                        $complete_name = mysqli_real_escape_string($con, $complete_name);
                                        $query    = "INSERT into `course` (course_code, complete_name)
                                                     VALUES ('$course_code','$complete_name')";
                                        $result   = mysqli_query($con, $query);
                                        if ($result) {
                                            echo ("<script LANGUAGE='JavaScript'>
                                            window.alert('Course Added Successfully, Thank You');
                                            window.location.href='http://localhost/onlineguidance/admin/course.php';
                                            </script>");
                                            
                                            
                                        } else {
                                            echo ("<script LANGUAGE='JavaScript'>
                                            window.alert('Course Added Failed, Try Again');
                                            window.location.href='http://localhost/onlineguidance/admin/addcourse.php';
                                            </script>");
                                        }
                                    } else {
                                    ?>
                                <form method="post" class="form-horizontal form-material mx-2">
                                    <div class="form-group">
                                        <label class="col-md-12">Course Code</label>
                                        <input type="text" name="course_code" placeholder="Enter course_code"
                                                class="form-control form-control-line">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Course Complete Name</label>
                                        <div class="col-md-12">
                                        <input type="text" name="complete_name" placeholder="Enter complete_name"
                                                class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button name="submit" class="btn btn-success text-white">Add Course</button>
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