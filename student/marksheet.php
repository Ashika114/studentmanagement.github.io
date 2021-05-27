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
    <div class="breadcrumbs" style="margin-bottom: 10PX;
    " data-aos="fade-in">
      <div class="container">
        <h2>MARKSHEET REPORT</h2>
      </div>
    </div><!-- End Breadcrumbs -->
  
  <div class="container-fluid">
     <div class="row">
	    <div class="col-md-12">

        <!-- Advanced Tables -->
          <div class="panel panel-default">
              
              <div class="panel-body">
              <div class="table-responsive">
                <?php 
                          echo("<table class='table table-bordered table-hove table-striped bg-light text-center' id='dataTables-example'>");
                          echo("<thead class='thead'><tr>");
                          echo("<th>EXAM TYPE</th><th>SUB ID</th><th>TOTAL MARKS</th><th>OBTAIN MARKS</th><th>PASSING MARKS</th>");
                          echo("</tr></thead>");
                          $grno=$_SESSION['regid'];
                          $query="select examtype,subid,totalmarks,obtainmarks,passingmarks FROM marksheet m, marksdetail d, admission e  WHERE m.marksheetid=d.marksheetid AND m.admid=e.admid AND e.grno = {$grno}";
                          
                          $tb=$df->getTable($query);             
                          echo("<tbody>");
                          while($row=mysqli_fetch_array($tb))
                         {
                               echo("<tr style='font-size:18px;'>");
                              
                               echo("<td>".$row['examtype']."</td>");
                               echo("<td>".$row['subid']."</td>");
                                echo("<td>".$row['totalmarks']."</td>");
                                echo("<td>".$row['obtainmarks']."</td>");
                                echo("<td>".$row['passingmarks']."</td>");
                               
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
 

</form>
  <?php  include("footer.php"); ?>
<?php  include("jslink.php"); ?>
</BODY>
</HTML>