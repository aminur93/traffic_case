<?php include 'inc/head.php'; ?>
<div id="wrapper">
<?php include 'inc/top.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
include_once ('lib/Database.php');
include_once ('lib/Session.php');
include_once ('classes/Category.php');
 ?>
<?php

if(!isset($_GET['edit_cat']) || $_GET['edit_cat'] == NULL){
    echo "<script>window.location = 'view_cat.php'</script>";
}else{
    $id = $_GET['edit_cat'];
}

 $category = new Category();

 if (($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['update'])) {
    $getudpateCat = $category->UpdateCategoryData($id,$_POST);
}

?>

 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Case Catgory</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Adding Case Category
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <?php
                            $getcats = $category->getCatById($id);
                            if($getcats){
                                while($result = $getcats->fetch_assoc()){
                            ?>
                            <form role="form" method="post">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Case Category</label>
                                        <input class="form-control" value="<?= $result['name'];?>" name="name" type="text" id="name">
                                    </div>
                                    <?php
                                        if (isset($getudpateCat)) {
                                            echo $getudpateCat;
                                        }
                                    ?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                                <div class="col-lg-6" style="margin-top:25px;">
                                <button type="submit" name="update" class="btn btn-success">Update</button>
                                <a href="view_cat.php" class="btn btn-info">Back</a>
                                </div>
                            </form>
                                    <?php } } ?>
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
