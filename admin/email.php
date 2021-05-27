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

  if(isset($_POST['btnsave']))
  {
     $emaildate=date('y-m-d');
    $emailfrom=$_POST['txtemailfrom'];
     $emailto=$_POST['lstemail'];
     $subject=$_POST['txtsubject'];
     $description=$_POST['txtdescription'];
     $regid=$_POST['lstemail'];
 

        $query="insert into email(emaildate,emailfrom,emailto,subject,description,regid) values('$emaildate','$emailfrom','$emailto','$subject','$description','$regid')";
        echo $query;
      $result=$df->saveRecord($query);
      
      if($result)
      {
        header('location:email.php');
        echo '<script>alert("Record saved..")</script>'; 
      }
      else
      {
        echo '<script>alert("Record not saved..")</script>';  
      }
    
   }
  
    if(isset($_POST['btncancel']))
    {
       header('location:email.php');
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
                             EMAIL <small>FORM</small>
                        </h1>
    </div>

        <div id="page-inner">
      <div class="col-md-3 "></div> 
      <div class=" col-md-6">
      <div class="form">
        <form name="frm" action="" method="post">

              <div class="form-group">
                <label for="emailfrom" class="form-label">Emailfrom</label>
                <input type="email" class="form-control" name="txtemailfrom" id="emailfrom" value="<?php
                    $query="Select emailid from register where regid=regid";
                    $row=$df->getRecord($query);
                    $emailfrom=$row['emailid'];
                     echo $emailfrom;
                ?>"> 
              </div>
              
               <div class="form-group">
                <label for="emialto" class="form-label">Emailto</label>
                <select name="lstemail" class="form-control">
                  <?php
                    $regid=$_SESSION['regid'];
                   $query="select regid,emailid from register where regid!='$regid'";
                   $tb=$df->gettable($query);
                   while($row=mysqli_fetch_array($tb))
                   {
                      echo("<option value=".$row["regid"].">".$row["emailid"]."</option>");
                   }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="txtsubject" >
              </div>

                <div class="form-group">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="txtdescription" rows="4">
                    </textarea>
                   
                </div>

              <div class="form-group"> <button type="submit" class="btn btn-success " name="btnsave" style="margin-left: 4px; font-weight:bold; font-size: 20px;">SAVE</button> <button type="submit" class="btn btn-success pull-right" name="btncancel" style=" font-weight:bold; font-size: 20px;">CANCEl</button> </div> </form>
         
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