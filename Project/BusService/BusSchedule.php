<?php
ob_start();
include("../Assets/Connection/Connection.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Location</title>
        <?php
			include("Head.php");
		?>
    </head>

    <?php

        if (isset($_POST["btn_save"])) 
		{
            $insQry = "insert into tbl_schedule(route_id,bus_name,schedule_time)values('" . $_POST["sel_route"] . "','" . $_POST["txt_name"]. "','" . $_POST["txt_time"] . "')";
            if ($con->query($insQry)) {
                header("location:BusSchedule.php");
            } 
        }

        if (isset($_GET["del"])) {
            $delQry = "delete from tbl_schedule where schedule_id='" . $_GET["del"] . "'";
            if ($con->query($delQry)) {
                header("location:BusSchedule.php");
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
                                                    <h3 class="mb-0" >Table Schedule </h3>
                                                </div>
                                            </div>
                                            <form method="post">

                                                <div class="form-group">
                                                    <label for="sel_route">Select Route</label>
                                                    <select required="" class="form-control" name="sel_route" id="sel_route">
                                                        <option value="" >Select</option>
                                                        <?php   
                                                        $disQry = "select * from tbl_route";
                                                            $row = $con->query($disQry);
                                                            while ($data=$row->fetch_assoc()) {
                                                        ?>
                                                        <option value="<?php echo $data["route_id"]; ?>"><?php echo $data["route_name"]; ?></option>
                                                        <?php
                                                            }

                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txt_name">Bus Name</label>
                                                    <input type="text" name="txt_name" class="form-control"> 
                                                </div>

                                                <div class="form-group">
                                                    <label for="txt_time">Starting Time</label>
                                                    <input required type="time" class="form-control" id="txt_time" name="txt_time">
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
                                                <td align="center" scope="col">Bus</td>
                                                <td align="center" scope="col">Time</td>
                                                <td align="center" scope="col">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php                                               $i = 0;
                                                $selQryD = "select * from tbl_schedule s inner join tbl_route r on r.route_id=s.route_id ";
                                                $rowD = $con->query($selQryD);
                                                while ($dataD=$rowD->fetch_assoc()) {
                                                    
                                                    $i++;

                                            ?>
                                            <tr>    
                                                <td align="center"><?php echo $i; ?></td>
                                                <td align="center"><?php echo $dataD["route_name"]; ?></td>
                                                <td align="center"><?php echo $dataD["bus_name"]; ?></td>
                                                <td align="center"><?php echo $dataD["schedule_time"]; ?></td>
                                                <td align="center"> 
                                                    <a href="BusSchedule.php?del=<?php echo $dataD["schedule_id"]; ?>" class="status_btn">Delete</a>
                                                </td> 
                                            </tr>
                                            <?php                     }


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
    </body>

    
    <?php include("Foot.php"); 
    ob_end_flush();?>
</html>

