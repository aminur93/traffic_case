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
    $getupdateUser = $usr->updateUserData($id,$_POST,$_FILES);
}

?>

 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User Profile Updating
                            <?php 
                            if(isset($getupdateUser)){
                                echo $getupdateUser;
                            }
                            ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <?php 
                            $getUserData = $usr->UserData($id);
                            if($getUserData){
                                while($result = $getUserData->fetch_assoc()){
                            ?>
                            <form role="form" action="" method="post" enctype="multipart/form-data">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control" value="<?= $result['email'];?>" name="email" type="email" id="email">
                                    </div>

                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input class="form-control" value="<?= $result['fname'];?>" name="fname" type="text" id="fname">
                                    </div>

                                    <div class="form-group">
                                        <label for="lname">Last Name</label>
                                        <input class="form-control" value="<?= $result['lname'];?>" name="lname" type="text" id="lname">
                                    </div>  

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="form-control" value="***********" name="password" type="password" id="password">
                                    </div> 
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                                <div class="col-lg-6">
                                     

                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image">
                                    </div>

                                    <div class="form-group">
                                        <img src="<?= $result['image'];?>" width="100" height="">
                                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                                <div class="col-lg-12">
                                <button type="submit" name="update" class="btn btn-success">Update</button>
                                <a href="dashborad.php" class="btn btn-info">Back</a>
                                </div>
                            </form>
                                <?php } }?>
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
