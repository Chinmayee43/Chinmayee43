<?php
include("header.php");
include("sidebar.php");

if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//echo $_GET[editid];
		mysqli_query($con,"UPDATE category SET cat_name= '$_POST[catname]',cat_des= '$_POST[description]' WHERE cat_id = $_GET[editid]");
		echo "<script>alert('Record updated successfully..')</script>";
		echo "<script>window.location='viewcategory.php';</script>";
		}
	else
{
	
$query=mysqli_query($con,"insert into category(cat_name,cat_des)values('$_POST[catname]','$_POST[description]')");
echo "<script>alert('Main Category record inserted....')</script>";
}
}
if(isset($_GET['editid']))
{
	$sql="select * from category where cat_id='$_GET[editid]'";
	$qsql=mysqli_query($con,$sql);
	$res=mysqli_fetch_array($qsql);
	
}


?>
    
        <div id="content" class="float_r">
        	<h2> Main Category          </h2>
       	  <div class="content_half float_l checkout">
			 <form method="post" action="" name="maincategory" onsubmit="return validatemaincategory()">
			    <table width="531" height="181" border="1">
			      <tr>
			        <th width="170" scope="row">Category name</th>
			        <td width="305"><label for="catname"></label>
		            <input type="text" name="catname" id="catname" value="<?php echo $res['cat_name'];?>" /></td>
		          </tr>
			      <tr>
			        <th scope="row">Description</th>
			        <td><label for="description"></label>
		            <textarea name="description" id="description" cols="45" rows="5"><?php echo $res['cat_des'];?></textarea></td>
		          </tr>
			      <tr>
			        <th colspan="2" scope="row"><input type="submit" name="submit" id="submit" value="Submit" /></th>
		          </tr>
	        </table>
            </form>
          </div>
            
          <div class="content_half float_r checkout"><br />
          </div>
            
          <div class="cleaner h50"></div>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
  <?php
  include("footer.php");
  ?>
  <script type="application/javascript">
	function  validatemaincategory()
	{
		if(document.maincategory.catname.value == "")
		{
			alert("Category name should not be empty..");
			document.maincategory.catname.focus();
			return false;
		}
		else if(document.maincategory.description.value == "")
		{
			alert("Description should not be empty..");
			document.maincategory.description.focus();
			return false;
		}
		else
		{
			return true;
		}
	}
  </script>