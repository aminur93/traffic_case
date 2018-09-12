<?php include 'inc/head.php'; ?>
<div id="wrapper">
<?php include 'inc/top.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php 
include_once ('lib/Database.php');
include_once ('lib/Session.php');
include_once ('classes/User.php');
 ?>
<?php
if(!isset($_GET['user_id']) || $_GET['user_id'] == NULL){
    echo "<script>window.location = 'dashborad.php'</script>";
}else{
    $id = $_GET['user_id'];
}

 $usr = new User();

 if (($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['update'])) {
    $getchangepass = $usr->changepass($id,$_POST);
}

?>

 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Reset Password</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User Pasword Resetting
                            <?php 
                            if(isset($getchangepass)){
                                echo $getchangepass;
                            }
                            ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <form role="form" action="" method="post">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="password">Old Password</label>
                                        <input class="form-control" name="old_password" type="password" id="password">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <input class="form-control" name="password" type="password" id="password">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Confirm Password</label>
                                        <input class="form-control" name="confirm" type="password" id="password">
                                    </div>  
 
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                                <div class="col-lg-12">
                                <button type="submit" name="update" class="btn btn-success">Update</button>
                                <a href="dashborad.php" class="btn btn-info">Back</a>
                                </div>
                            </form>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<?php include 'inc/footer.php'; ?>
