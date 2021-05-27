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
  $roomid="";
  $roomno="";
  $roomtype="";
  $facilities="";
  $capacity="";                                                             
  $df=new DataFunctions();

?>

<?php
if($_SESSION["trans"]=="update") 
  {
    $roomid=$_SESSION['roomid'];
    $query="select * from classroom where roomid='$roomid'";
    $row=$df->getRecord($query);
    $roomid=$row['roomid'];
    $roomno=$row['roomno'];
    $roomtype=$row['roomtype'];
    $facilities=$row['facilities'];
    $capacity=$row['capacity'];
  }
  
  if(isset($_POST['btnsave']))
  {
    
     $roomno=$_POST['txtroomno'];
     $roomtype=$_POST['txtroomtype'];
     $facilities=$_POST['txtfacilities'];
     $capacity=$_POST['txtcapacity'];

     if($_SESSION['trans']=="new")
     {
        $query="insert into classroom(roomno,roomtype,facilities,capacity) values('$roomno','$roomtype','$facilities','$capacity')";

     }  
     if($_SESSION['trans']=="update")
     {
        $classroomid=$_SESSION['roomid'];  
         $query="update classroom set roomno='$roomno',roomtype='$roomtype',facilities='$facilities',capacity='$capacity' where roomid='$roomid' ";
      }  
      $result=$df->saveRecord($query);
      if($result)
      {
          $_SESSION["trans"]="";
          $_SESSION["roomid"]="";
          header('location:classroom_table.php');
      }
      else
      {
        echo '<script>alert("Record not saved..")</script>';  
      }
    
   }
  
    if(isset($_POST['btncancel']))
    {
       $_SESSION["trans"]="";
       $_SESSION["classroomid"]="";
       header('location:classroom_table.php');
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
                             classroom DETAIL <small>FORM</small>
                        </h1>
    </div>

        <div id="page-inner">
      <div class="col-md-3 "></div> 
      <div class=" col-md-6">
      <div class="form">
        <form name="frm" action="" method="post">

              <div class="form-group">
                <label for="roomno" class="form-label">Room No</label>
                <input type="text" class="form-control" name="txtroomno" id="roomno" value='<?php echo($roomno) ?>'> 
              </div>
              <div class="form-group">
                <label for="roomtype" class="form-label">Room Type</label>
                <input type="text" class="form-control" id="roomtype" name="txtroomtype" value='<?php echo($roomtype) ?>'>
              </div>
              <div class="form-group">
                <label for="capacity" class="form-label">Capacity</label>
                <input type="text" class="form-control" id="capacity" name="txtcapacity" value='<?php echo($capacity) ?>'>
              </div>

                <div class="form-group">
                    <label for="facilities" class="form-label">Facilities</label>
                    <input type="text" class="form-control" id="facilities" name="txtfacilities" value='<?php echo($facilities) ?>'>
                </div>

              <div class="form-group"> <button type="submit" class="btn
btn-success " name="btnsave" style="margin-left: 4px; font-weight:
bold; font-size: 20px;">SAVE</button> <button type="submit" class="btn btn-success pull-right"
name="btncancel" style=" font-weight:
bold; font-size: 20px;">CANCEl</button> </div> </form>
         
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