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

   <h1 class="heading"><span>Sign</span>Up</h1>

   <div class="row">

      <div class="image">
         <img src="images/contact-img.svg" alt="">
      </div>

      <?php
      require('config.php');
      session_start();
    // When form submitted, insert values into the database.
         if(isset($_POST["submit1"])){
            $count = 0;
            $res = mysqli_query($con, "select * from students where email = '$_POST[email]'") or die(mysqli_error($con));
            $count=mysqli_num_rows($res);
            if($count>0)
            {
               echo ("<script LANGUAGE='JavaScript'>
               window.alert('Registration Successfully, Thank You');
               window.location.href='login.php';
               </script>");
            }
            else{
               mysqli_query($con, "insert into students value(Null, '$_POST[fullname]','$_POST[email]','$_POST[phone]','$_POST[course]','$_POST[age]','$_POST[gender]','$_POST[password]')") or die(mysqli_error($con));
               echo ("<script LANGUAGE='JavaScript'>
               window.alert('Registration Successfully, Thank You');
               window.location.href='login.php';
               </script>");
            }
      }
      ?>

      <form action="" method="post">
         <span>your names</span>
         <input type="text" required placeholder="enter your full name" maxlength="50" name="fullname" class="box">
         <span>your email</span>
         <input type="email" required placeholder="enter your valid email" maxlength="50" name="email" class="box">
         <span>your number</span>
         <input type="number" required placeholder="enter your phone number" maxlength="50" name="phone" class="box">
         <span>your Course</span>
         <input type="text" required placeholder="enter Course you study" maxlength="50" name="course" class="box">
         <span>your age</span>
         <input type="number" required placeholder="enter your age" maxlength="50" name="age" class="box">
         <span>select gender</span>
         <div class="radio">
            <input type="radio" name="gender" value="male" id="male">
            <label for="male">male</label>
            <input type="radio" name="gender" value="female" id="female">
            <label for="female">female</label>
         </div>
         <span>your Password</span>
         <input type="password" required placeholder="enter your password" maxlength="50" name="password" class="box">
         <input type="submit" value="Register Now" class="btn" name="submit1">
         <span>have An account??</span>&nbsp;&nbsp;
         <a href="login.php" style="text-decoration:none;color:#00E77F;font-size:15px;">Log In</a>
      </form>
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