<?php
error_reporting(0);
header('Content-Type: text/html; charset=utf-8; content-Transfer-encoding: 8bit');
header('Set-Cookie:SameSite=None; Secure');

include ("topMenu.php");
include ("footer.php");

if(!$title)
	$title="وحدة إدارة الأزمات والكوارث | جامعة بنها";
?>

<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> <?php echo $title ?> </title>

  <meta name="descriptison" content="وحدة إدارية مختصة بتوفير عناصر الأمن والسلامه، لإدارة الأزمات والكوارث  بالجامعة">
  <meta name="keywords" content="وحدات, الأزمات,الكوارث,جامعة بنها">
  <meta name="y_key" content="fcc18e98f5e5578b" >
  <meta name="robots" content="all, index, follow">
  <meta name="revisit-after" content="1 days">
  <meta name="author" content="البوابة الإلكترونية لجامعة بنها">
  <meta name="contact" content="dev1@bu.edu.eg">
  <meta name="copyright" content="جامعة بنها">
  <meta name="distribution" content="global">
  <meta name="generator" content="Dreamweaver">
  <meta name="language" content="Arabic">
  <meta name="reply-to" content="dev1@bu.edu.eg">
  <meta property="fb:app_id" content="468239029902521"/>
  <meta property="og:url" content="https://dcmu.bu.edu.eg" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?php echo ($title); ?>" />
  <meta property="og:description" content=" وحدة إدارية تابعة لرئيس الجامعة  مختصة بتوفير عناصر الأمن والسلامه، لإدارة الأزمات والكوارث  بالجامعة (وهذه الوحدة لها كيانها ومسئولياتها قبل واثناء وبعدد حدوث الأزمه أو الكارثة وتضم الوحدة فريق عمل متميز لإدارة تلك الأزمات)" />
  <meta property="og:image" content="https://bu.edu.eg/portal/uploads/NewsImgs/1557746227.jpg" />

  <!-- Favicons -->
  <link href="assets/img/BU.ico" rel="icon">
  <link href="assets/img/BU.ico" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor - v2.1.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <?php echo $topMenu ?>
  </header><!-- End Header -->

    <main id="main">
        <?php echo $mainbody ?>
    </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
  <?php echo $footer ?>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>