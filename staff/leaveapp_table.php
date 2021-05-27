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
<?php
if(isset($_POST['btnaccept']))
{
  $appid=$_POST['btnaccept'];
  $query="update leaveapp set status='accept' where appid='$appid'";
  $df->saveRecord($query);

}
if(isset($_POST['btnreject']))
{
   $appid=$_POST['btnreject'];
  $query="update leaveapp set status='reject' where appid='$appid'";
  $df->saveRecord($query);

}
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
                             Leave application <small>Report</small>
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
                          echo("<table class='table table-bordered table-hove table-striped bg-light text-center' id='dataTables-example'>");
                          echo("<thead class='thead'><tr>");
                          echo("<th>APP ID</th><th>APP DATE</th><th>GRNO</th><th>DATEFROM</th><th>DATETO</th><th>DETAILS</th><th>STATUS</th><th>ACCEPT</th><th>REJECT</th>");
                          echo("</tr></thead>");
                          $query="select * from leaveapp";
                          $tb=$df->getTable($query);             
                          echo("<tbody>");
                          while($row=mysqli_fetch_array($tb))
                         {
                               echo("<tr style='font-size:18px;'>");
                               echo("<td>".$row['appid']."</td>");
                                echo("<td>".$row['appdate']."</td>");
                               echo("<td>".$row['grno']."</td>");
                               echo("<td>".$row['datefrom']."</td>");
                               echo("<td>".$row['dateto']."</td>");
                               echo("<td>".$row['details']."</td>");
                               echo("<td>".$row['status']."</td>");
                                echo("<td><button class='btn btn-primary' type='submit' name='btnaccept' value=".$row['appid'].">ACCEPT</button></td>");
                                echo("<td><button class='btn btn-primary' type='submit' name='btnreject' value=".$row['appid'].">REJECT</button></td>");
                               
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