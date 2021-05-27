<HTML>
<HEAD>
<?php
  session_start();
  include("csslink.php");
  include('../class/datafunctions.php');
?>

<?php
  $msg="";
  $df=new DataFunctions();

?>

<?php



?>

</HEAD>
<BODY>
<form name="frm" action="#" method="post">
 <?php  include("menu.php"); ?>
  
 <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Courses</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>BCA</h4>
                </div>

                <h3><a href="course-details.html">Bachelor of Computer Applications</a></h3>
                <p>BCA is an undergraduate program in Computer Applications. It is open for students who have qualified Higher Secondary Examination with a minimum of 45% marks.BCA is a 3 year regular program and is often seen as equivalent to a B.E. or B.Tech. in Computer Science. The course is, usually, divided in six semesters.</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                   Affiliation: Veer Narmad South Gujarat University
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->


          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>BBA</h4>
                </div>

                <h3><a href="course-details.html">Bachelor of Business Administration</a></h3>
                <p>BBA is a professional undergraduate course in Business Management. To apply for the course, a candidate should have cleared class 12th/ Higher Secondary Examination with minimum of 50%.As mentioned, the duration of BBA course is for three years and six semesters.</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                   Affiliation: Veer Narmad South Gujarat University
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->

          

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              <img src="assets/img/course-3.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Content</h4>
                  <p class="price">$180</p>
                </div>

                <h3><a href="course-details.html">Copywriting</a></h3>
                <p>B.Com. course imparts the basic knowledge about trade and commerce practices in society and prepares a student for job opportunities in a wide variety of sectors. A B.Com. graduate can work in both public and private sectors.They are fit to work in a variety of industries and take on varied roles like administartion, hospitality, accounting, marketing, retailing, production planning etc.</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
                    <span>Brandon</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i>&nbsp;20
                    &nbsp;&nbsp;
                    <i class="bx bx-heart"></i>&nbsp;85
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->

        </div>

      </div>
    </section><!-- End Courses Section -->
 

</form>
  <?php  include("footer.php"); ?>
<?php  include("jslink.php"); ?>
</BODY>
</HTML>