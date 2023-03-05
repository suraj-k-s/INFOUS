<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
ob_start();
include('../Assets/Connection/Connection.php');
include('Head.php');
?>

<?php

        if (isset($_POST["btn_save"])) {

            $insQry = "insert into tbl_route(route_name,place_from,place_to,route_time,route_km)values('".$_POST["txt_route"]. "','".$_POST["sel_place1"] ."','".$_POST["sel_place2"] ."','".$_POST["txt_time"]. "','".$_POST["txt_km"]. "')";
            if ($con->query($insQry)) {
                header("location:Route.php");
            }
        }

        if (isset($_GTE["del"])) {
            $delQry = "delete from tbl_route where route_id='". $_GET["del"]."'";
            if ($con->query($delQry)) {
                header("location:Route.php");
            }
        }


?>

<body>
<section class="main_content dashboard_part">

<!--/ menu  -->
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <!--Form-->
                    <div class="white_box_tittle list_header">
                        <div class="col-lg-12">
                            <div class="white_box mb_30">
                                <div class="box_header ">
                                    <div class="main-title">
                                        <h3 class="mb-0" >Table Route</h3>
                                    </div>
                                </div>
                                <form method="post">

                                    <div class="form-group">
                                        <label for="txt_route">Route Name</label>
                                        <input required="" type="text" class="form-control" id="txt_route" name="txt_route">
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_time">Required Time</label>
                                        <input required="" type="number" placeholder="In Minute" class="form-control" id="txt_time" name="txt_time">
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_time">Route KM</label>
                                        <input required="" type="number" class="form-control" id="txt_km" name="txt_km">
                                    </div>
                                    <div class="form-group">
                                        <br>
                                        <h3 class="mb-0" align="center" >Starting Place</h3>
                                        <br>
                                        <label for="sel_state1">Select State</label>
                                        <select required="" class="form-control" onchange="getDistrict1(this.value)" name="sel_state1" id="sel_state1">
                                            <option value="" >Select</option>
                                             <?php
                                                          $sel ="select * from tbl_state";
                                                  $row = $con->query($sel);
                                                  while($data = $row->fetch_assoc())
                                                  {
                                                 ?>
                                                     <option value="<?php echo $data['state_id'];?> " 
                                                      ><?php echo $data['state_name']; ?></option >
                                                     
                                                     <?php
                                                     }
                                                     ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                       <label for="sel_district1">Select District</label>
                                        <select required="" class="form-control" onchange="getPlace1(this.value)" name="sel_district1" id="sel_district1">
                                            <option value="" >Select</option>
                                           
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="sel_place1">Select Place</label>
                                        <select required="" class="form-control" name="sel_place1" id="sel_place1">
                                            <option value="" >Select</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <br>
                                        <h3 class="mb-0" align="center" >End place</h3>
                                        <br>
                                        <label for="sel_state2">Select State</label>
                                        <select required="" class="form-control" onchange="getDistrict2(this.value)" name="sel_state2" id="sel_state2">
                                            <option value="" >Select</option>
                                            <?php
                                                          $sel ="select * from tbl_state";
                                                  $row = $con->query($sel);
                                                  while($data = $row->fetch_assoc())
                                                  {
                                                 ?>
                                                     <option value="<?php echo $data['state_id'];?> " 
                                                      ><?php echo $data['state_name']; ?></option >
                                                     
                                                     <?php
                                                     }
                                                     ?>
                                        </select>
                                    </div>
                                     <div class="form-group">
                                      <label for="sel_district2">Select district</label>
                                        <select required="" class="form-control" onchange="getPlace2(this.value)" name="sel_district2" id="sel_district2">
                                            <option value="" >Select</option>
                                          
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="sel_place2">Select Place</label>
                                        <select required="" class="form-control" name="sel_place2" id="sel_place2">
                                            <option value="" >Select</option>
                                        </select>
                                    </div>
                                    <div class="form-group" align="center">
                                        <input type="submit" class="btn-dark" name="btn_save" style="width:100px; border-radius: 10px 5px " value="Save">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="QA_table mb_30">
                        <!-- table-responsive -->
                        <table class="table lms_table_active">
                            <thead>
                                <tr style="background-color: #74CBF9">
                                    <td align="center" scope="col">Sl.No</td>
                                    <td align="center" scope="col">Route</td>
                                    <td align="center" scope="col">Time</td>
                                    <td align="center" scope="col">From</td>
                                    <td align="center" scope="col">To</td>
                                    <td align="center" scope="col">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                   $selQry = "select * from tbl_route";
                                    $row = $con->query($selQry);
                                    while ($data = $row->fetch_assoc()) {
                                        $selQry1 = "select * from tbl_place where place_id='".$data["place_from"]."'";
                                        $row1 = $con->query($selQry1);
                                        $data1 =$row1->fetch_assoc();

                                        $selQry2 = "select * from tbl_place where place_id='".$data["place_to"]."'";
                                        $row2 = $con->query($selQry2);
                                        $data2 =$row2->fetch_assoc();

                                        $i++;

                               ?>
                                <tr>    
                                    <td align="center"><?php echo $i; ?></td>
                                    <td align="center"><?php echo $data["route_name"]; ?></td>
                                    <td align="center"><?php echo $data["route_time"]; ?> Min</td>
                                    <td align="center"><?php echo $data1["place_name"]; ?></td>
                                    <td align="center"><?php echo $data2["place_name"]; ?></td>
                                    <td align="center"> 
                                        <a href="Route.php?del=<?php echo $data["route_id"]; ?>" class="status_btn">Delete</a>
                                    </td> 
                                </tr>
                                <?php                  }


                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</section>
        <script src="../Assets/Jq/jQuery.js"></script>
    <script>
	function getDistrict1(sid) {
        $.ajax({
          type: "POST",
          data: { sid: sid },
          url: "../Assets/AjaxPages/AjaxDistrict.php",
          success: function (result) {
            $("#sel_district1").html(result);
          },
        });
      }
	  
	  function getDistrict2(sid) {
        $.ajax({
          type: "POST",
          data: { sid: sid },
          url: "../Assets/AjaxPages/AjaxDistrict.php",
          success: function (result) {
            $("#sel_district2").html(result);
          },
        });
      }
                                                        function getPlace1(did1)
                                                        {

                                                            $.ajax({
                                                                type: "POST",
                                                                data: {did: did1},
                                                                url: "../Assets/AjaxPages/AjaxPlace.php",
                                                                success: function(result) {
                                                                    $("#sel_place1").html(result);
                                                                }});
                                                        }
                                                        function getPlace2(did2)
                                                        {
                                                            var id = document.getElementById("sel_place1").value;

                                                            $.ajax({
                                                                type: "POST",
                                                                data: {did: did2, id: id},
                                                                url: "../Assets/AjaxPages/AjaxPlace1.php",
                                                                success: function(result) {

                                                                    $("#sel_place2").html(result);
                                                                }});
                                                        }
    </script>
        <?php
		include('Foot.php');
		 ob_end_flush();
		?>
</body>
</html>