<?php
include("header.php");
include("sidebar.php");
if(isset($_POST['submit']))
{
	$sql="UPDATE shopowner SET compname='$_POST[compname]',address='$_POST[address]',contact_no='$_POST[contactno]',login_id='$_POST[email]' WHERE shop_id='$_SESSION[shop_id]'";
	if(!mysqli_query($con,$sql))
	{
		echo mysqli_error($con);
	}
	else
	{
		echo "<script>alert('Profile updated successfully..');</script>";
	}
	echo "<script>window.location='shopownerlogin.php';</script>";
}

$psql="SELECT * FROM shopowner WHERE shop_id='$_SESSION[shop_id]'";
$psql1=mysqli_query($con,$psql);
$psql2=mysqli_fetch_array($psql1);

?>
    
        <div id="content" class="float_r">
        <form action="" method="post" name="frmregistration" onsubmit="return validatereg()">
        	<h2>Customer Profile</h2>
            <h5><strong> You can change your profile here.</strong></h5>
				<table width="531" height="181" border="1" class="tftable" >
                <tr>
                <td>Company Name</td>
                  <td><input name="compname" type="text" id="firstname"  style="width:300px;"  value="<?php echo $psql2['compname']; ?>" /></td>
                </tr>
               
             <tr>
               <td>Address</td> 
			  <td><textarea name="address" id="address" style="width:300px;" cols="45" rows="5"><?php echo $psql2['address'];?> </textarea></td>
    </tr>
         <tr>
           <td>Contact Number</td> 
    <td>   <input name="contactno" type="text" id="contactno"  style="width:300px;" value="<?php echo $psql2['contact_no'];?>" onkeydown='return isNumeric(event.keyCode);'/></td></tr>
               
               <tr>
                 <td>Login ID</td>
                 <td><input type="email" name="email" style="width:300px;" value="<?php echo $psql2['login_id']; ?>"required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" /></td>
                  </tr>

                
                <tr>
			        <th colspan="2" scope="row">
                <input name="submit" type="submit" id="submit" /></th></tr>
                </table>
         
       
          </form>
          
            </div>
            
       
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
          <?php
  include("footer.php");
  ?>
  
  <script type="application/javascript">
	function validatereg()
	{
		if(document.frmregistration.compname.value == "")
		{
			alert("Company Name should not be empty..");
			document.frmregistration.compname.focus();
			return false;
		}
		else if(document.frmregistration.address.value == "")
		{
			alert("Address should not be empty..");
			document.frmregistration.address.focus();
			return false;
		}
		else if(document.frmregistration.contactno.value =="")
		{
			alert("Contact No should not be empty..");
			document.frmregistration.contactno.focus();
			return false;
		}
		else if(document.frmregistration.contactno.value.length<10)
		{
			alert("Enter 10 digit contact number..");
			document.frmregistration.contactno.focus();
			return false;
		}
		else if(document.frmregistration.email.value=="" )
		{
			alert("Login ID should not be empty..");
			document.frmregistration.email.focus();
			return false;
		}
		/*else if(document.frmregistration.address.value == "")
		{
			alert("Address should not be empty..");
			document.frmregistration.address.focus();
			return false;
		}
		else if(document.frmregistration.contactno.value == "")
		{
			alert("Contact Number should not be empty..");
			document.frmregistration.contactno.focus();
			return false;
		}
		else if(document.frmregistration.country.value == "")
		{
			alert("Select country..");
			document.frmregistration.country.focus();
			return false;
		}
		else if(document.frmregistration.state.value == "")
		{
			alert("Select State..");
			document.frmregistration.state.focus();
			return false;
		}*/
		/*else if(document.frmregistration.email.value == "")
		{
			alert("Email ID should not be empty..");
			document.frmregistration.email.focus();
			return false;
		}
		/*else if(document.frmregistration.password.value == "")
		{
			alert("Enter password..");
			document.frmregistration.password.focus();
			return false;
		}
		else if(document.frmregistration.cpassword.value == "")
		{
			alert("Confirm your password..");
			document.frmregistration.cpassword.focus();
			return false;
		}*/
		else
		{
			return true;
		}
	}
  </script>