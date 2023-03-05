<?php
include('../Assets/Connection/Connection.php');
session_start();

if(isset($_POST["btn_save"]))
{
	$sel = "select count(seat_no) as no ,b.booking_id as bid from tbl_booking b inner join tbl_seat s on s.booking_id=b.booking_id where user_id='".$_SESSION["uid"]."' and shedule_id='".$_GET["id"]."' and booking_date='".$_POST["txt_date"]."' and booking_status=0";
	
			$result = $con->query($sel);
			if($row=$result->fetch_assoc())
			{
				$amount = $row["no"] * $_GET["amount"];
				
				$up = "update tbl_booking set booking_status=1, booking_amount='".$amount."' where booking_id='".$row["bid"]."'";
				if($con->query($up))
				{
					$up = "update tbl_seat set seat_status=1 where booking_id='".$row["bid"]."'";
					if($con->query($up))
					{
						?>
                        	<script>
								window.location="Payment.php";
                            </script>
                        <?php
					}
				}
				
			}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <script src="../Assets/Jq/jQuery.js" type="text/javascript"></script> 

    </head>
    
    
    <body align='center' onLoad="getData()">
       
       
      <i class='fas fa-chair' style='font-size:50px;color:red; padding: 20px;'></i>Booked Seat 
      <i class='fas fa-chair' style='font-size:50px;color:gray;padding: 20px;'></i>Available Seat
      <i class='fas fa-chair' style='font-size:50px;color:green;padding: 20px;'></i>Selected Seat
      
      
      
       
      <br><br><br>
     <form method="post">  
      <input type="date" name="txt_date" min="<?php echo date("Y-m-d")?>" value="<?php echo date("Y-m-d")?>" onChange="getData()" id="txt_date">
      <br><br><br>
     <div id="dataT">
  		
     </div>
    
     	<input type="hidden" name="txt_amount" value="<?php echo $_GET["amount"] ?>">
        <input type="submit" name="btn_save" value="Pay Now">
     </form>
    </body>
     <script>
     	function insert(seat,id)
		{
			var date = document.getElementById("txt_date").value;
			
			 $.ajax({
                   url: "../Assets/AjaxPages/AjaxSlot.php?action=insert&seat="+seat+"&id="+id+"&date="+date,
                   success: function(result) {
				  document.getElementById(seat).style.color="green";
            }});
		}
		function deleteSlot(seat,id)
		{
			var date = document.getElementById("txt_date").value;
			
			 $.ajax({
                   url: "../Assets/AjaxPages/AjaxSlot.php?action=delete&seat="+seat+"&id="+id+"&date="+date,
                   success: function(result) {
                  document.getElementById(seat).style.color="grey";
            }});
		}
		
		function getData()
		{
			var date = document.getElementById("txt_date").value;
			
			 $.ajax({
                   url: "../Assets/AjaxPages/AjaxSlotAvail.php?id="+<?php echo $_GET["id"]?>+"&date="+date,
                   success: function(result) {
                document.getElementById("dataT").innerHTML=result;
            }});
		}
     </script>
</html>
