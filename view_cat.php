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
 
 if (isset($_GET['delcat'])) {
    $delcat = $_GET['delcat'];

    $getdelete = $category->Deletecat($delcat);
 }
 ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Case Category List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View All Case Category List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Sl no</th>
                                        <th>Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $category = new Category();
                                $getcat = $category->getcategory();
                                if ($getcat) {
                                    $i = 0;
                                   while($result = $getcat->fetch_assoc()){
                                       $i++;
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?= $i; ?></td>
                                        <td><?php echo $result['name'];?></td>
                                        <td class="center"><a class="btn btn-xs btn-primary" href="edit_cat.php?edit_cat=<?php echo $result['cat_id']; ?>"><i class="fa fa-edit"></i> Edit</a></td>
                                        <td class="center">
                                        <a class="btn btn-xs btn-danger" onclick="return confirm('Are You Sure Want To Delete')" href="?delcat=<?php echo $result['cat_id']; ?>"><i class="fa fa-remove"></i> Delete</a></td>
                                    </tr>
                                   <?php } } ?>
                                </tbody>
                                <?php
                                if (isset($getdelete)) {
                                    echo $getdelete;
                                }
                                ?>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
<?php include 'inc/footer.php'; ?>
