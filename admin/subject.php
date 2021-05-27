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
  $subid="";
  $subname="";
  $subtype="";    
  $courseid="";                                                
  $df=new DataFunctions();

?>


<?php
if($_SESSION["trans"]=="update") 
  {
    $subid=$_SESSION['subid'];
    $query="select * from subject where subid='$subid'";
    $row=$df->getRecord($query);
    $subid=$row['subid'];
    $subname=$row['subname'];
    $subtype=$row['subtype'];
    $courseid=$row["courseid"];
  }
  
  if(isset($_POST['btnsave']))
  {
    
     $subname=$_POST['txtsubname'];
     $subtype=$_POST['txtsubtype'];
     $courseid=$_POST['lstcourse'];
   
     if($_SESSION['trans']=="new")
     {
        $query="insert into subject(subname,subtype,courseid) values('$subname','$subtype','$courseid')";

     }  
     if($_SESSION['trans']=="update")
     {
        $subid=$_SESSION['subid'];  
         $query="update subject set subname='$subname',subtype='$subtype',courseid='$courseid' where subid='$subid' ";
      }  
      $result=$df->saveRecord($query);
      if($result)
      {
          $_SESSION["trans"]="";
          $_SESSION["subid"]="";
          header('location:subject_table.php');
      }
      else
      {
        echo '<script>alert("Record not saved..")</script>';  
      }
    
   }
  
    if(isset($_POST['btncancel']))
    {
       $_SESSION["trans"]="";
       $_SESSION["subid"]="";
       header('location:subject_table.php');
    } 

?>

<style>
    button
    {
      margin-top: 10px;
      width: 100PX;

    }
</style>


</head>

<body>
<?php  include("navbar.php"); ?>
 <?php  include("sidebar.php"); ?>
  <div class="container-fluid">
     <div class="row">
        <div class="wrapper">

  <div id="page-wrapper">
     <div class="header"> 
                        <h1 class="page-header">
                             SUBJECT  <small>FORM</small>
                        </h1>
    </div>

        <div id="page-inner">
      <div class="col-md-3 "></div> 
      <div class=" col-md-6">
      <div class="form">
        <form name="frm" action="" method="post">

              <div class="form-group">
                <label for="subname" class="form-label">Subject Name</label>
                <input type="text" class="form-control" name="txtsubname" id="subname" value='<?php echo($subname) ?>'> 
              </div>
              <div class="form-group">
                <label for="subtype" class="form-label">Subject Type</label>
                <input type="text" class="form-control" id="subtype" name="txtsubtype" value='<?php echo($subtype) ?>'>
              </div>

               <div class="form-group">
                <label for="subtype" class="form-label">Course</label>
                <select name="lstcourse" class="form-control">
                  <?php
                   $query="select courseid,coursename from course";
                   $tb=$df->gettable($query);
                   while($row=mysqli_fetch_array($tb))
                   {
                      echo("<option value=".$row["courseid"].">".$row["coursename"]."</option>");
                   }
                  ?>
                </select>
              </div>

              <div class="form-group"> <button type="submit" class="btn btn-success" name="btnsave" style="margin-left: 4px; font-weight:bold; font-size: 20px;">SAVE</button> <button type="submit" class="btn btn-success pull-right"name="btncancel" style=" font-weight:bold; font-size: 20px;">CANCEl</button> </div> </form>
         
            </div>
          </div>
        </div>
          <?php  include("footer.php"); ?>
  </div>    
        </div>
     </div>
  </div>

</div>

<?php  include("jslink.php"); ?>
</body>
</html>