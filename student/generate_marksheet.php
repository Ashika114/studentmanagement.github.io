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
        <h2>REPORT</h2>
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
                           $grno=$_SESSION['regid'];
                           $query="select * FROM student where grno = {$grno}";
                           $tb=$df->getTable($query);             
                          echo("<tbody>");
                          while($row=mysqli_fetch_array($tb))
                         {
                           echo("<label>Student Name : </label>&nbsp;");
                            echo("<td>".$row['fname']."</td>&nbsp;" );
                             echo("<td>".$row['mname']."</td>&nbsp;"); 
                              echo("<td>".$row['lname']."</td>&nbsp;");
                          }
                          echo("<table class='table table-bordered table-hove table-striped bg-light text-center' id='dataTables-example'>");
                          echo("<thead class='thead'><tr>");
                          echo("<th>EXAM TYPE</th><th>SUB ID</th><th>TOTAL MARKS</th><th>OBTAIN MARKS</th><th>PASSING MARKS</th>");
                          echo("</tr></thead>");
                         
                          
                          $query="select fname,examtype,subid,totalmarks,obtainmarks,passingmarks FROM marksheet m, marksdetail d, admission e , student s WHERE m.marksheetid=d.marksheetid AND m.admid=e.admid AND e.grno = {$grno} AND s.grno=e.grno";
                          
                          $tb=$df->getTable($query);             
                          echo("<tbody>");
                          while($row=mysqli_fetch_array($tb))
                         {
                                echo("<tr style='font-size:18px;'>");
                                echo("<td>".$row['fname']."</td>");
                                echo("</tr>");

                                echo("<tr style='font-size:18px;'>");
                                echo("</tr>");

                               echo("<tr style='font-size:18px;'>");
                              
                               echo("<td>".$row['examtype']."</td>");
                               echo("<td>".$row['subid']."</td>");
                                echo("<td>".$row['totalmarks']."</td>");
                                echo("<td>".$row['obtainmarks']."</td>");
                                echo("<td>".$row['passingmarks']."</td>");
                                echo("</tr>");
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