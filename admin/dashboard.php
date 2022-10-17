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
                        <h4 class="page-title"><i class="mdi mdi-view-dashboard"></i> Dashboard</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Feeds</h4>
                                <div class="feed-widget">
                                    <ul class="list-style-none feed-body m-0 p-b-20">
                                        <li class="feed-item">
                                            <div class="feed-icon bg-info"><i class="mdi mdi-calendar-multiple-check"></i></div>Number of Appointments<span class="ms-auto font-12 text-muted">
                                                <?php
                                                        $sql = "SELECT * FROM reservation";
                                                        if ($result=mysqli_query($con,$sql)) {
                                                            $rowcount=mysqli_num_rows($result);
                                                            echo "<h1>" .$rowcount. "</h1>"; 
                                                        }
                                                ?>
                                            </span>
                                        </li>
                                        <li class="feed-item">
                                            <div class="feed-icon bg-success"><i class="mdi mdi-alarm-check"></i></div> Number of Completed<span class="ms-auto font-12 text-muted">
                                            <?php
                                                $sql = "SELECT * FROM reservation where status = 'completed'";
                                                if ($result=mysqli_query($con,$sql)) {
                                                    $rowcount=mysqli_num_rows($result);
                                                    echo "<h1>" .$rowcount. "</h1>"; 
                                                }
                                            ?>
                                            </span>
                                        </li>
                                        <li class="feed-item">
                                            <div class="feed-icon bg-warning"><i class="mdi mdi-book-open-page-variant"></i></div> Number of Courses<span class="ms-auto font-12 text-muted">
                                            <?php
                                                $sql = "SELECT * FROM course";
                                                if ($result=mysqli_query($con,$sql)) {
                                                    $rowcount=mysqli_num_rows($result);
                                                    echo "<h1>" .$rowcount. "</h1>"; 
                                                }
                                            ?>
                                            </span>
                                        </li>
                                        <li class="feed-item">
                                            <div class="feed-icon bg-danger"><i class="mdi mdi-account-multiple"></i></div> Number of Students<span class="ms-auto font-12 text-muted">
                                            <?php
                                                $sql = "SELECT * FROM students";
                                                if ($result=mysqli_query($con,$sql)) {
                                                    $rowcount=mysqli_num_rows($result);
                                                    echo "<h1>" .$rowcount. "</h1>"; 
                                                }
                                            ?>
                                            </span>
                                        </li>
                                        <li class="feed-item">
                                            <div class="feed-icon bg-primary"><i class="mdi mdi-account-multiple-plus"></i></div> Number of Reasons for Referral<span class="ms-auto font-12 text-muted">
                                            <?php
                                                $sql = "SELECT * FROM referral_reason";
                                                if ($result=mysqli_query($con,$sql)) {
                                                    $rowcount=mysqli_num_rows($result);
                                                    echo "<h1>" .$rowcount. "</h1>"; 
                                                }
                                            ?>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex">
                                    <div>
                                        <h4 class="card-title">Reservation List</h4>
                                    </div>
                                    <div class="ms-auto">
                                        <div class="dl">
                                            <select class="form-select shadow-none">
                                                <option value="0" selected>Monthly</option>
                                                <option value="1">Daily</option>
                                                <option value="2">Weekly</option>
                                                <option value="3">Yearly</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- title -->
                            </div>
                            <div class="table-responsive">
                                
                            <table id="example" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Student Name</th>
                                            <th scope="col">Referral Reason</th>
                                            <th scope="col">Concern</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Meeting Link</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $query=mysqli_query($con,"select * from reservation");
                                         while($row=mysqli_fetch_array($query))
                                         {
                                         ?>
                                        <tr>
                                            <td><?php echo htmlentities($row['student_name']);?></td>
                                            <td><?php echo htmlentities($row['referral']);?></td>
                                            <td><?php echo htmlentities($row['concern']);?></td>
                                            <td><?php echo htmlentities($row['date']);?></td>
                                            <td><?php echo htmlentities($row['time']);?></td>
                                            <td><?php echo htmlentities($row['meeting_link']);?></td>
                                            <td><label class="label label-success">approved</label></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
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