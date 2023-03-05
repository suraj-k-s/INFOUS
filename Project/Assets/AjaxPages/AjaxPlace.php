<?php 
include("../Connection/Connection.php");
?>
 <option value="">Select Place</option> 
         <?php
		 				
						
							$did=$_POST["did"];
						
		 				$sel="select * from  tbl_place  where  district_id='".$did."'";
						
						$row=$con->query($sel);
						
						while($data=$row->fetch_assoc())
						{
						
					
						
						  $d=$data['place_id'];
							$dname=$data['place_name'] ; 
								
		  ?>
           <option value="<?php echo $d;?>"  ><?php  echo $dname; ?></option>
                    <?php 
						}
					?>