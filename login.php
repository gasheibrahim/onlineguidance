<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Guidance and counselling System</title>

    <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="header">
<section class="flex">
   <a href="index.php" class="logo">online student orientation and guidance counseling System</a>
   <nav class="navbar">
         <a href="index.php">home</a>
         <a href="about.php">about</a>
         <a href="courses.php">Our Programs</a>
         <a href="contact.php">Where to find us</a>
         <a href="login.php">Login</a>
         <a href="register.php">Register</a>
   </nav>
   <div id="menu-btn" class="fas fa-bars"></div>
</section>
</header>

<section class="contact" id="contact" style="margin-top:7rem;">

   <h1 class="heading"><span>Log</span>In</h1>

   <div class="row">

      <div class="image">
         <img src="images/contact-img.svg" alt="">
      </div>
      <?php
        require('config.php');
        session_start();
        // When form submitted, check and create user session.
        if (isset($_REQUEST['email'])) {
            $email = stripslashes($_REQUEST['email']);    // removes backslashes
            $email = mysqli_real_escape_string($con, $email);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con, $password);
            // Check user is exist in the database
            $query = "SELECT * FROM `students` WHERE email='$email'
                        AND password='" . $password . "'";
            $result = mysqli_query($con, $query) or die(mysqli_connect_errno());
            $rows = mysqli_num_rows($result);
            if ($rows == 1) {
                $_SESSION['email'] = $email;
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Your Welcome, Thank You');
                window.location.href='http://localhost/onlineguidance/students/index.php';
                </script>");
            } else {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Incorrect email or password');
                window.location.href='http://localhost/onlineguidance/login.php';
                </script>");
                }
            } else {
        ?>
      <form action="" method="post">
         <span>your email</span>
         <input type="email" required placeholder="enter your valid email" maxlength="50" name="email" class="box">
         <span>your Password</span>
         <input type="password" required placeholder="enter your password" maxlength="50" name="password" class="box">
         <input type="submit" value="Login" class="btn" name="send">
         <span>Don't have An account??</span>&nbsp;&nbsp;
         <a href="register.php" style="text-decoration:none;color:#00E77F;font-size:15px;">Create An account</a>
      </form>
      <?php
        }
    ?>
   </div>

</section>

<footer class="footer">

   <section>

      <div class="share">
         <a href="#" class="fab fa-facebook-f"></a>
         <a href="#" class="fab fa-twitter"></a>
         <a href="#" class="fab fa-linkedin"></a>
         <a href="#" class="fab fa-instagram"></a>
         <a href="#" class="fab fa-youtube"></a>
      </div>

      <div class="credit">&copy; copyright @ 2022 by <span>Bugingo Huguete</span> | all rights reserved!</div>

   </section>

</footer>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>