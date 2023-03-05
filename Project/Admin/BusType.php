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


	if(isset($_POST['btn_save']))
	{
		$bustype = $_POST['txt_bustype'];
		
		if($_POST['txt_id'])
		{
			
			$up = "update tbl_bustype set bustype_name = '".$bustype."' where bustype_id  = '".$_POST['txt_id']."'";
		
			if($con->query($up))
			{
				header("Location:bustype.php");
			}
		}
		else
		{
			$ins = "insert into tbl_bustype (bustype_name) values('".$bustype."')";
		
			if($con->query($ins))
			{
				header("Location:bustype.php");
			}
		}
		
		
		
	}
	
	if($_GET['id'])
	{
		$del = "delete from tbl_bustype where bustype_id = '".$_GET['id']."'";
		if($con->query($del))
		{
			header("Location:bustype.php");
		}
	}
	
	if($_GET['eid'])
	{
		$did = $_GET['eid'];
		$dname = $_GET['ename'];
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
                                                    <h3 class="mb-0" >Table bustype</h3>
                                                </div>
                                            </div>
                                            <form method="post">
                                                <div class="form-group">
                                                    <label for="txt_bustype">bustype Name</label>
                                                    <input required="" type="text" class="form-control" id="txt_bustype" name="txt_bustype" value="<?php echo $dname;?>">
                                                    <input type="hidden" name="txt_id" value="<?php echo $did;?>">
                                                </div>
                                                <div class="form-group" align="center">
                                                    <input type="submit" class="btn-dark" style="width:100px; border-radius: 10px 5px " name="btn_save" value="Save">
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
                                                <td align="center" scope="col">bustype</td>
                                                <td align="center" scope="col">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 0;
                                                $selQry = "select * from tbl_bustype";
                                                $rs = $con->query($selQry);
                                                while ($data = $rs->fetch_assoc()) {

                                                    $i++;

                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $i;?></td>
                                                <td align="center"><?php echo $data["bustype_name"];?></td>
                                                <td align="center"><a href="bustype.php?id=<?php echo $data["bustype_id"];?>" class="status_btn">Delete</a> &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href="bustype.php?eid=<?php echo $data["bustype_id"];?>&ename=<?php echo $data["bustype_name"];?>" class="status_btn">Edit</a></td>
                                            </tr>
                                            <?php                    
                                              }


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
        <?php
		include('Foot.php');
		 ob_end_flush();
		?>
</body>
</html>