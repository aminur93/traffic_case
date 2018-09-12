<?php include 'inc/head.php'; ?>
<div id="wrapper">
<?php include 'inc/top.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
include_once ('lib/Database.php');
include_once ('helpers/Format.php');
include_once ('lib/Session.php');
include_once ('classes/Casecontrol.php');
include_once ('classes/Category.php');
 ?>
 <?php
 
 $case = new Casecontrol();

 if(isset($_GET['delcase'])){
     $id = $_GET['delcase'];

     $DeleteCase = $case->DelcaseControl($id);
 }
 ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Case List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View All Case List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Title</th>
                                        <th>car Number</th>
                                        <th>category</th>
                                        <th>name</th>
                                        <th>Phone</th>
                                        <th>Details</th>
                                        <th>Date</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $fm = new Format();
                                $case = new Casecontrol();
                                $getcases = $case->getAllCases();
                                if($getcases){
                                    $i = 0;
                                    while($result = $getcases->fetch_assoc()){
                                    $i++;
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result['title']; ?></td>
                                        <td><?php echo $result['car_number']; ?></td>
                                        <td><?php echo $result['name']; ?></td>
                                        <td><?php echo $result['vname']; ?></td>
                                        <td><?php echo $result['vphone']; ?></td>
                                        <td><?php echo $fm->textShorten($result['details'],20); ?></td>
                                        <td><?php echo $fm->formatDate($result['date']); ?></td>
<td class="center"><a class="btn btn-xs btn-primary" href="edit_case.php?caseid=<?php echo $result['id'];?>"><i class="fa fa-edit"></i> Edit</a></td>
<td class="center"><a class="btn btn-xs btn-danger" href="?delcase=<?php echo $result['id']; ?>"><i class="fa fa-remove"></i> Delete</a></td>
                                    </tr>
                                    <?php } } ?>
                                </tbody>
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
