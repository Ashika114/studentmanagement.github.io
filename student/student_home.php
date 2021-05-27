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
  
  <div class="container-fluid">
     <div class="row">
	    <div class="col-md-12">

        <h1 style="margin-top: 100px;">Student home page</H1>
	 
        </div>
     </div>
  </div>
 

</form>
  <?php  include("footer.php"); ?>
<?php  include("jslink.php"); ?>
</BODY>
</HTML>