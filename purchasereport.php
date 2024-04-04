<?php
include("header.php");
include("sidebar.php");
if(isset($_GET['st']))
{
	$sql = "UPDATE purchase SET purchasestatus='Delivered' WHERE purch_id='$_GET[purch_id]'";
	$qsql = mysqli_query($con,$sql);
	echo "<script>alert('Product delivery record updated successfully..');</script>";
}
?>
        <div id="content" class="float_r">
        	<h1>Purchase Report</h1>
        <div class="cleaner"></div>    
<form method="get" action="">
<table width="615" border="1" class="tftable" >
  <tr>
    <th width="159" height="34" scope="row">&nbsp;From Date</th>
    <td width="347">&nbsp;<input type="date" name="fromdate" value="<?php echo $_GET['fromdate'];?>" /></td>
  </tr>
  <tr>
    <th height="36" scope="row">&nbsp;To Date</th>
    <td>&nbsp;<input type="date" name="todate" value="<?php echo $_GET['todate'];?>" /></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;<input name="btnrptsearch" type="submit" value="Search Report" /></td>
  </tr>
</table>
</form>
   <div style='overflow:auto; width:700px;height:370px;'><br>
<table style="width: 100%;" border="1" class="tftable" >
  <tr>
    <th width="138" scope="col">Bill ID</th>
    <th width="138" scope="col">Purchase date</th>
    <th width="173" scope="col">Product Name</th>
    <th width="162" scope="col">Size</th>
    <th width="177" scope="col">Customer Name</th>
    <th width="177" scope="col">Quantity</th>
     <th width="177" scope="col">Price</th>
      <th width="177" scope="col">Purchase Status</th>
    </tr>
<?php
$pursql="SELECT  products.*, purchase.*, billing.* FROM billing INNER JOIN purchase ON billing.bill_id = purchase.bill_id LEFT OUTER JOIN products ON purchase.prod_id = products.prod_id WHERE (products.shop_id = '$_SESSION[shop_id]')";
if(isset($_GET['btnrptsearch']))
{
$pursql= $pursql . " AND purch_date BETWEEN '$_GET[fromdate]' AND '$_GET[todate]'";
}
$pursql= $pursql . "  ORDER BY purchase.purch_id";
	$purres=mysqli_query($con,$pursql);
	while($prs=mysqli_fetch_array($purres))
	{		
		$rss2="select * from type where size_id='$prs[size_id]'";
		$resrs2=mysqli_query($con,$rss2);
		$rs2=mysqli_fetch_array($resrs2);
		
		$rss3="select * from `customer` where custid='$prs[cust_id]'";
		$resrs3=mysqli_query($con,$rss3);
		$rs3=mysqli_fetch_array($resrs3);
		
  echo"<tr>
    <td>$prs[bill_id]</td>
	<td>$prs[purch_date]</td>
    <td>$prs[prodname]</td>
    <td>$rs2[size]</td>
    <td>$rs3[custfname]</td>
	<td>$prs[qty]</td>
	<td>$prs[price]</td>
	<td>$prs[purchasestatus]";
		if($prs['purchasestatus'] == "PAID")
		{
		echo "<br /><a href='purchasereport.php?purch_id=$prs[purch_id]&st=Delievered'>Delivered</a>";
		}
	echo "</td></tr>";
	}
	?>
</table>
    </div>
</div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
<?php
include("footer.php");
?>