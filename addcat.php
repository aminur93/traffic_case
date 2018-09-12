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

 $category = new Category();

 if (($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['submit'])) {
    $getcategory = $category->CategoryData($_POST);
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
                            <form role="form" method="post">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Case Category</label>
                                        <input class="form-control" name="name" type="text" id="name">
                                    </div>
                                    <?php
                                        if (isset($getcategory)) {
                                            echo $getcategory;
                                        }
                                        ?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                                <div class="col-lg-6" style="margin-top:25px;">
                                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                <a href="view_cat.php" class="btn btn-info">Back</a>
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
