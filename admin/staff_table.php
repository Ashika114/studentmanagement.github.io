<!DOCTYPE html>
<html>
<Head>

<?php
  session_start();
  include("csslink.php");
  include('../class/datafunctions.php');
?>

<?php
  $msg=""; 
  $df=new DataFunctions();

?>

</head>

<body>
<form name="frm" action="#" method="post">
<div class="wrapper">
  <?php  include("navbar.php"); ?>
 <?php  include("sidebar.php"); ?>
   <div class="container-fluid">
     <div class="row">
  <div id="page-wrapper">
     <div class="header"> 
                        <h1 class="page-header">
                             Staff <small>Report</small>
                        </h1>
    </div>
        <div id="page-inner">

         <div class="row">
         <div class="col-md-12">
          <!-- Advanced Tables -->
          <div class="panel panel-default">
              
              <div class="panel-body">
              <div class="table-responsive">
                <?php 
                          echo("<table class='table table-bordered table-hove table-striped bg-light text-center' id='tabsearch'>");
                          echo("<thead class='thead'><tr>");
                          echo("<th>STAFF ID</th><th>STAFF NAME</th><th>CONTACTNO</th><th>EMAILID</th><th>QUALIFICATION</th><th>EXPERIENCE</th><th>SPECIALIZATION</th><th>PHOTO</th>");
                          echo("</tr></thead>");
                          $query="select * from staff";
                          $tb=$df->getTable($query);             
                          echo("<tbody>");
                          while($row=mysqli_fetch_array($tb))
                         {
                               $img=$row['photo'];
                               echo("<tr style='font-size:18px;'>");
                               echo("<td>".$row['staffid']."</td>");
                                echo("<td>".$row['staffname']."</td>");
                               echo("<td>".$row['contactno']."</td>");
                               echo("<td>".$row['emailid']."</td>");
                               echo("<td>".$row['qualification']."</td>");
                               echo("<td>".$row['exp']."</td>");
                               echo("<td>".$row['specialization']."</td>");
                  ?>
                                <td><img alt="Profile picture" src='<?php echo("../staff/staffimages/".$img) ?>' width="150px" height="100px"></td>

                  <?php
                               
                               
                          }
                          echo("</tbody>");
                          echo("</table>");
                 ?>

                   </div>             
             </div>
        </div>
        <!--End Advanced Tables -->
        </div>
      </div>

        </div>
        <?php  include("footer.php"); ?>
  </div>
</div>
</div>
</div>
</form>

<?php  include("jslink.php"); ?>
<script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
</body>
</html>