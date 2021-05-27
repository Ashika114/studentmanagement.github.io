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
  $msgid="";
  $msgdate="";
  $message="";
  $mobileno="";
                                                             
  $df=new DataFunctions();

?>

<?php
   if(isset($_POST['btnnew']))
    {
        $_SESSION['trans']="new"; 
        header('location:message.php');
    } 

    if(isset($_POST['btnupdate']))
    {
        $_SESSION['msgid']=$_POST['btnupdate']; 
        $_SESSION['trans']="update";  
        header('location:message.php');
    }

    if(isset($_POST['btndelete']))
    {
        $msgid=$_POST['btndelete'];
        $query="delete from message where msgid='$msgid'";
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
                             Message <small>Report</small>
                        </h1>
    </div>
        <div id="page-inner">

         <div class="row">
         <div class="col-md-12">
          <!-- Advanced Tables -->
          <div class="panel panel-default">
              <div class="panel-heading">
                <span style="font-size: 25px;">Message Detail</span>
                  <button class="btn btn-success pull-right"  style=" font-weight:bold; font-size: 18px;" type='submit' name='btnnew' value="new">NEW</button>
              </div>
              
              <div class="panel-body">
              <div class="table-responsive">
              <?php
                echo("<table class='table table-bordered table-hove table-striped bg-light text-center' id='dataTables-example'>");
                echo("<thead class='thead'><tr>");
                echo("<th>MSG ID</th><th>MSG DATE</th><th>USERNAME</th><th>MESSAGE </th><th>MOBILE NO</th><th>DELETE</th><th>UPDATE</th>");
                echo("</tr></thead>");
                $query="select msgid,msgdate,username,message,mobileno from message m,register r where m.regid=r.regid";
                $tb=$df->getTable($query);             
                echo("<tbody>");
                while($row=mysqli_fetch_array($tb))
                {
                    echo("<tr style='font-size:18px;'>");
                    echo("<td>".$row['msgid']."</td>");
                    echo("<td>".$row['msgdate']."</td>");
                    echo("<td>".$row['username']."</td>");
                    echo("<td>".$row['message']."</td>");
                    echo("<td>".$row['mobileno']."</td>");
                    echo("<td><button class='btn btn-danger' type='submit' name='btndelete' value=".$row['msgid'].">DELETE</button></td>");
                    echo("<td><button class='btn btn-primary' type='submit' name='btnupdate' value=".$row['msgid'].">UPDATE</button></td>");
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