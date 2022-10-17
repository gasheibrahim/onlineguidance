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
                                    <li class="breadcrumb-item active" aria-current="page">Course</li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="table-responsive">
                            <a class="btn btn-sm elevation-2" href="addcourse.php" data-toggle="modal"
                        data-target="#add" style="margin-top: 20px;margin-left: 10px;background-color: rgba(131,219,214);"><i
                        class="fa fa-plus"></i> Add New</a>
                        <table id="example" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Course Code</th>
                                            <th scope="col">Course Complete Name</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $query=mysqli_query($con,"select * from course");
                                            while($row=mysqli_fetch_array($query))
                                            {
                                        ?>
                                        <tr>
                                            <td><?php echo htmlentities($row['course_code']);?></td>
                                            <td><?php echo htmlentities($row['complete_name']);?></td>
                                            <td><a href="javascript:void(0)"><i class="fa fa-edit"></i></a>
                                            <a href="course.php?id=<?php echo $row["course_id"]; ?>" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
            </div>
            <?php
                if(isset($_GET['del']))
                {
                    if(mysqli_query($con,"DELETE FROM course WHERE course_id = '".$_GET['course_id']."'") or die(mysqli_error($con)))
                    {
                        ?>
                            <script LANGUAGE='JavaScript'>
                                window.location="course.php";
                            </script>
                        <?php
                    }
                    else
                    {
                        ?>
                            <script LANGUAGE='JavaScript'>
                                window.location="course.php";
                            </script>
                        <?php
                    }
                }
            ?>
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