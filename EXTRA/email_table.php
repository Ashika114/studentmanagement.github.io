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
  $emailid="";
  $emaildate="";
  $emailfrom="";
  $emailto="";
  $subject="";
  $description="";                                                            
  $df=new DataFunctions();

?>

<?php
   if(isset($_POST['btnnew']))
    {
        $_SESSION['trans']="new"; 
        header('location:email.php');
    } 

    if(isset($_POST['btnupdate']))
    {
        $_SESSION['emailid']=$_POST['btnupdate']; 
        $_SESSION['trans']="update";  
        header('location:email.php');
    }

    if(isset($_POST['btndelete']))
    {
        $emailid=$_POST['btndelete'];
        $query="delete from email where emailid='$emailid'";
        $result=$df->saveRecord($query);   
        if($result)
        { 
            echo '<script>alert("Record Delete Successfully...")</script>';  
        }
        else
        {
             echo '<script>alert("Record can not Delete...")</script>';  
        }
    
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
                             Email <small>Report</small>
                        </h1>
    </div>
        <div id="page-inner">

         <div class="row">
         <div class="col-md-12">
          <!-- Advanced Tables -->
          <div class="panel panel-default">
              <div class="panel-heading">
                <span style="font-size: 25px;">Email Detail</span>
                  <button class="btn btn-success pull-right"  style=" font-weight:bold; font-size: 18px;" type='submit' name='btnnew' value="new">NEW</button>
              </div>
              <div class="panel-body">
              <div class="table-responsive">
                <?php 
                          echo("<table class='table table-bordered table-hove table-striped bg-light text-center' id='dataTables-example'>");
                          echo("<thead class='thead'><tr>");
                          echo("<th>EMAIL ID</th><th>EMAIL DATE</th><th>EMAILFROM</th><th>EMAILTO</th><th>SUBJECT</th><th>DESCRITION</th>");
                          echo("</tr></thead>");
                          $query="select * from email";
                          $tb=$df->getTable($query);             
                          echo("<tbody>");
                          while($row=mysqli_fetch_array($tb))
                         {
                               echo("<tr style='font-size:18px;'>");
                               echo("<td>".$row['emailid']."</td>");
                                echo("<td>".$row['emaildate']."</td>");
                               echo("<td>".$row['emailfrom']."</td>");
                               echo("<td>".$row['emailto']."</td>");
                               echo("<td>".$row['subject']."</td>");
                               echo("<td>".$row['description']."</td>");
                               
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