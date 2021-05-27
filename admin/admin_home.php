<!DOCTYPE html>
<html>
<Head>

<?php
  session_start();
  include("csslink.php");
  include('../class/datafunctions.php');
?>

<?php
  $tstudent="";
  $msg="";
  $df=new DataFunctions();

?>

<?php
 $tstudent=$df->getcount("select count(*) from student");
 $tstaff=$df->getcount("select count(*) from staff");
  $tcourse=$df->getcount("select count(*) from course");
  $tsubject=$df->getcount("select count(*) from subject");


?>

</head>

<body>
<form name="frm" action="#" method="post">
    <?php  include("navbar.php"); ?>
 <?php  include("sidebar.php"); ?>
  <div class="container-fluid">
     <div class="row">
        <div class="wrapper">

  <div id="page-wrapper">
        <div id="page-inner">
         
  <h1 style="margin-bottom: 20px;">WELCOME TO OUR ADMIN PANEL</h1>


  <div class="row">
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
            <h4>Students</h4>
            <div class="easypiechart" id="easypiechart-blue" data-percent=<?php echo($tstudent) ?> ><span class="percent"><?php echo($tstudent) ?></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
            <h4>Staff</h4>
            <div class="easypiechart" id="easypiechart-orange" data-percent=<?php echo($tstaff) ?> ><span class="percent"><?php echo($tstaff) ?></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
            <h4>Course</h4>
            <div class="easypiechart" id="easypiechart-teal" data-percent=<?php echo($tcourse) ?> ><span class="percent"><?php echo($tcourse) ?></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
            <h4>Subject</h4>
            <div class="easypiechart" id="easypiechart-red" data-percent=<?php echo($tsubject) ?> ><span class="percent"><?php echo($tsubject) ?></span>
            </div>
          </div>
        </div>
      </div>


        </div>
          <?php  include("footer.php"); ?>
  </div>    
        </div>
     </div>
  </div>

</div>
</form>
<?php  include("jslink.php"); ?>
</body>
</html>