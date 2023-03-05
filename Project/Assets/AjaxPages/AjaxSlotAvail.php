<?php
	include('../Connection/Connection.php');
session_start();	
		
		$j=0;
		for($i=1;$i<=30;$i++)
		{
			$j++;
			
			
			$sel = "SELECT * from tbl_booking b inner join tbl_user u on u.user_id=b.user_id inner join tbl_seat s on s.booking_id=b.booking_id where seat_no='"."s".$i."' and booking_date='".$_GET["date"]."'";
		$result = $con->query($sel);
		if($row = $result->fetch_array()){
			
			if($row["seat_no"]=="s".$i && $row["seat_status"]==1 && $row["booking_status"]==1)
			{
				?>
                <i class='fas fa-chair' style='font-size:50px;color:red;padding: 20px;'  id="s<?php echo $i;?>"></i>
                <?php
				
			}
			else if($row["seat_no"]=="s".$i && $row["seat_status"]==0 && $row["booking_status"]==0 && $row["user_id"]==$_SESSION["uid"])
			{
				?>
                <i onClick="deleteSlot(this.id,<?php echo $_GET["id"] ?>)" id="s<?php echo $i;?>" class='fas fa-chair' style='font-size:50px;color:green;padding: 20px;'  id="s<?php echo $i;?>"></i>
                <?php
			}
			
			
		}
		else
			{
				?>
                <i onClick="insert(this.id,<?php echo $_GET["id"] ?>)" id="s<?php echo $i;?>" class='fas fa-chair' style='font-size:50px;color:grey;padding: 20px;'></i> 
                <?php
				$flag = 1;
			}
		if($j==10)
			{
				echo "<br>";
				$j=0;
			}
		}
		?>