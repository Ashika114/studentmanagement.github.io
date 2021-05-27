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
  $docid="";
  $docname="";
  $doctype="";
  $sem="";
  $file="";
  $filetype="";  
  $courseid="";                                                           
  $df=new DataFunctions();

?>

<?php
if($_SESSION["trans"]=="update") 
  {
    $docid=$_SESSION['docid'];
    $query="select * from document where docid='$docid'";
    $row=$df->getRecord($query);
    $docid=$row['docid'];
    $docname=$row['docname'];
    $doctype=$row['doctype'];
    $sem=$row['sem'];
    $file=$row['file'];
    $filetype=$row['filetype'];
    $courseid=$row["courseid"];

  }
  
  if(isset($_POST['btnsave']))
  {
    
     $docname=$_POST['txtdocname'];
     $doctype=$_POST['txtdoctype'];
     $sem=$_POST['txtsem'];
     $courseid=$_POST['lstcourse'];

      $file=$_FILES['fupfile'];
     $filename= $file['name']; 
     $filepath=$file['tmp_name'];
     $fileerror= $file['error'];

     $file_ext = explode('.',$filename);
     $file_ext_check = strtolower(end($file_ext));

     $valid_file_ext = array('doc','zip','txt','docx');

     if($fileerror === 0)
      {
          if (in_array($file_ext_check,$valid_file_ext)) 
          {
             $destfile = 'docfiles/'.$filename;
             move_uploaded_file($filepath,$destfile); 
            if($_SESSION['trans']=="new")
            {
                $query="insert into document(docname,doctype,sem,file,courseid) values('$docname','$doctype','$sem','$destfile','$courseid')";
             }  
            if($_SESSION['trans']=="update")
            {
               $docid=$_SESSION['docid'];  
                $query="update document set docname='$docname',doctype='$doctype',sem='$sem',file='$destfile',courseid='$courseid' where docid='$docid' ";
            }  
            $result=$df->saveRecord($query);
            if($result)
            {
               $_SESSION["trans"]="";
              $_SESSION["docid"]="";      
                 header('location:document_table.php');
            }
            else
           {
               echo '<script>alert("Record not saved..")</script>';  
           }
         } 
         else
         {
            $msg="Not a Valid Extension";
         }
  
      }   

   
    
    
   }
  
    if(isset($_POST['btncancel']))
    {
       $_SESSION["trans"]="";
       $_SESSION["docid"]="";
       header('location:document_table.php');
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

        <div id="page-inner">

      <div class="col-md-3 "></div> 
      <div class=" col-md-6">
      <div class="form">
        <form name="frm" action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <p style="text-align: center; font-size: 25px; font-weight: bold;">Document Upload Form</p>
                
              </div>

              <div class="form-group">
                <label for="docname" class="form-label">docname</label>
                <input type="text" class="form-control" name="txtdocname" id="docname" value='<?php echo($docname) ?>'> 
              </div>
              <div class="form-group">
                <label for="doctype" class="form-label">doctype</label>
                <input type="text" class="form-control" id="doctype" name="txtdoctype" value='<?php echo($doctype) ?>'>
              </div>
              <div class="form-group">
                <label for="file" class="form-label">file</label>
                <input type="file" class="form-control" id="file" name="fupfile" >
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

              <div class="form-group dropdown"> 
                <label for="sem" class="form-label">sem</label>
                <input type="text" class="form-control" id="sem" name="txtsem" value='<?php echo($sem) ?>'>
               </div>

              
              <div class="form-group"> <button type="submit" class="btn btn-success " name="btnsave" style="margin-left: 4px; font-weight: bold; font-size: 14px;">SAVE</button> <button type="submit" class="btn btn-success pull-right" name="btncancel" style=" font-weight: bold; font-size: 14px;">CANCEl</button> </div>
              <div class="form-group">
                <p class="bg-danger text-white px-4" style="font-size: 20px; font-weight: bold; border-radius: 5px;"> <?php echo($msg); ?></p>
               
              </div> </form>
         
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