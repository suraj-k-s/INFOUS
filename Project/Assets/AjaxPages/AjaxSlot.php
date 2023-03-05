<?php
include('../Connection/Connection.php');
session_start();

if(isset($_GET["action"]))
{
	$uid = $_SESSION["uid"];
	$id = $_GET["id"];
	$date = $_GET["date"];
	$seat = $_GET["seat"];
	
	
	if($_GET["action"]=="insert")
		{
			$sel = "select * from tbl_booking where user_id='".$uid."' and shedule_id='".$id."' and booking_date='".$date."' and booking_status=0";
			$result = $con->query($sel);
			if($row=$result->fetch_assoc())
			{
				$ins = "insert into tbl_seat(seat_no,booking_id)values('".$seat."','".$row["booking_id"]."')";
				if($con->query($ins))
				{
					echo "Inserted as Exist	";		
							
				}
			}
			else
			{
				$ins = "insert into tbl_booking(user_id,shedule_id,booking_date,booked_date)values('".$uid."','".$id."','".$date."',curdate())";
				if($con->query($ins))
					{
									
							$sel = "select * from tbl_booking where user_id='".$uid."' and shedule_id='".$id."' and booking_date='".$date."' and booking_status=0";
							$result = $con->query($sel);
							if($row=$result->fetch_assoc())
							{
								$bid = $row["booking_id"];
							}
				$ins = "insert into tbl_seat(seat_no,booking_id)values('".$seat."','".$bid."')";
							if($con->query($ins))
							{
								
								echo "Inserted as New";		
										
							}	
					}
			}
		}	
		if($_GET["action"]=="delete")
		{
			
			$sel = "select * from tbl_booking where user_id='".$uid."' and shedule_id='".$id."' and booking_date='".$date."' and booking_status=0";
			$result = $con->query($sel);
			if($row=$result->fetch_assoc())
			{
				$del = "delete from tbl_seat where seat_no='".$seat."' and '".$row["booking_id"]."'";
				if($con->query($del))
				{
					echo "Deleted";		
							
				}
			}
		}	
	}

?>