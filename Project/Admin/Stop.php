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

        if (isset($_POST["btn_save"])) {

            $insQry = "insert into tbl_stop(route_id,place_id,stop_time,stop_number,stop_km)values('".$_POST["sel_route"]."','".$_POST["sel_place"] ."','".$_POST["txt_time"] ."','".$_POST["txt_stop"]. "','".$_POST["txt_km"]. "')";
            if ($con->query($insQry)) {
                header("Location:Stop.php");
            }
        }

        if (isset($_GTE["del"])) {
            $delQry = "delete from tbl_stop where stop_id='". $_GET["del"]."'";
            if ($con->query($delQry)) {
                header("Location:Stop.php");
            }
        }


?>

<body>
<section class="main_content dashboard_part">

<!--/ menu  -->
<div class="main_content_iner">
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
                                        <h3 class="mb-0" >Table Stop</h3>
                                    </div>
                                </div>
                                <form method="post">

                                    <div class="form-group">
                                        <label for="sel_route">Select Route</label>
                                        <select required="" class="form-control" name="sel_route" id="sel_route">
                                            <option value="" >Select</option>
                                            <?php $disQry1 = "select * from tbl_route";
                                                $row1 = $con->query($disQry1);
                                                while ($data1 =$row1 ->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $data1["route_id"]; ?>"><?php echo $data1["route_name"]; ?></option>
                                            <?php
                                                }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                                    <label for="txt_state">State</label>
                                                    <select class="form-control" name="sel_state" id="sel_state" onchange="getDistrict(this.value)">
                                                    <option value="">-----Select-----</option>
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
                                                    <label for="txt_district">District</label>
                                                    <select class="form-control" name="sel_district" onchange="getPlace(this.value)" id="sel_district">
                                                    <option value="">-----Select-----</option>
                                                    </select>
                                                </div>
                                    <div class="form-group">
                                        <label for="sel_place">Select Place</label>
                                        <select required="" class="form-control" name="sel_place" id="sel_place">
                                            <option value="" >Select</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_stop">Stop Number</label>
                                        <input required="" type="number" class="form-control" id="txt_stop" name="txt_stop">
                                    </div>
                                     <div class="form-group">
                                        <label for="txt_stop">Stop KM</label>
                                        <input required="" type="number" class="form-control" id="txt_km" name="txt_km">
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_time">Required Time From Previous Stop</label>
                                        <input required="" type="number" class="form-control" id="txt_time" name="txt_time">
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
                                    <td align="center" scope="col">Stop No</td>
                                    <td align="center" scope="col">Stop</td>
                                    <td align="center" scope="col">Time</td>
                                    <td align="center" scope="col">KM</td>
                                    <td align="center" scope="col">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                                                
                                $i = 0;
                                    $selQry = "select * from tbl_stop s inner join tbl_route r on r.route_id=s.route_id inner join tbl_place l on l.place_id=s.place_id";
                                    $row = $con->query($selQry);
                                    while ($data = $row->fetch_assoc()) {

                                        $i++;

                                ?>
                                <tr>    
                                    <td align="center"><?php echo $i; ?></td>
                                    <td align="center"><?php echo $data["route_name"];?></td>
                                    <td align="center"><?php echo $data["stop_number"];?></td>
                                    <td align="center"><?php echo $data["place_name"];?></td>
                                    <td align="center"><?php echo $data["stop_time"];?> Min</td>
                                    <td align="center"><?php echo $data["stop_km"];?> KM</td>
                                    <td align="center"> 
                                        <a href="Stop.php?del=<?php echo $data["stop_id"];?>" class="status_btn">Delete</a>
                                    </td> 
                                </tr>
                                <?php                      }


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
	 function getDistrict(sid) {
        $.ajax({
          type: "POST",
          data: { sid: sid },
          url: "../Assets/AjaxPages/AjaxDistrict.php",
          success: function (result) {
            $("#sel_district").html(result);
          },
        });
      }
                                                        function getPlace(did)
                                                        {

                                                            $.ajax({
                                                                type: "POST",
                                                                data: {did: did},
                                                                url: "../Assets/AjaxPages/Ajaxplace.php",
                                                                success: function(result) {
                                                                    $("#sel_place").html(result);
                                                                }});
                                                        }
    </script>
        <?php
		include('Foot.php');
		 ob_end_flush();
		?>
</body>
</html>