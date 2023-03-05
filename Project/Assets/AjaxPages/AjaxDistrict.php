<?php 
include("../Connection/Connection.php");
?>
 <option value="">Select District</option> 
         <?php
		 				
						
							$sid=$_POST["sid"];
						
		 				$sel="select * from  tbl_district  where  state_id='".$sid."'";
						
						$row=$con->query($sel);
						
						while($data=$row->fetch_assoc())
						{
						
					
						
						  $d=$data['district_id'];
							$dname=$data['district_name'] ; 
								
		  ?>
           <option value="<?php echo $d;?>"  ><?php  echo $dname; ?></option>
                    <?php 
						}
					?>