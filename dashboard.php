<?php
include("header.php");
if(!isset($_SESSION["loginid"]))
{
	if($_SESSION["logintype"] != "Administrator")
	{
		echo "<script>window.location='adminlogin.php';</script>";
	}
}
include("sidebar.php");
?>
        <div id="content" class="float_r">
        	<h1>Admin Dashboard</h1>
        
        <div class="cleaner"></div>
        <blockquote>
        Number of Administrator  : 
        <?php
		$sql= "SELECT * FROM administrator";
		$qadmin = mysqli_query($con,$sql);
		echo mysqli_num_rows($qadmin);
		?>
        </blockquote>
        <blockquote>
        Number of Customer  : 
        <?php
		$sql= "SELECT * FROM customer";
		$qcustomer = mysqli_query($con,$sql);
		echo mysqli_num_rows($qcustomer);
		?></blockquote>
        <blockquote>
        Number of Products  :
        <?php
		$sql= "SELECT * FROM products";
		$qproducts = mysqli_query($con,$sql);
		echo mysqli_num_rows($qproducts);
		?>
        </blockquote>
        <blockquote>
        Number of Purchase  : 
        <?php
		$sql= "SELECT * FROM purchase";
		$qpurchase = mysqli_query($con,$sql);
		echo mysqli_num_rows($qpurchase);
		?>
        </blockquote>
         <blockquote>
        Number of Shopowner  :
        <?php
		$sql= "SELECT * FROM shopowner";
		$qshopowner = mysqli_query($con,$sql);
		echo mysqli_num_rows($qshopowner);
		?>
        </blockquote>
         <blockquote>
        Number of Category  :
        <?php
		$sql= "SELECT * FROM category";
		$qCategory = mysqli_query($con,$sql);
		echo mysqli_num_rows($qCategory);
		?>
        </blockquote>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
<?php

include("footer.php");
?>