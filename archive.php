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

 if(isset($_GET['delcaseid'])){
     $id = $_GET['delcaseid'];

     $DeleteCase = $case->DeletecaseControl($id);
 }

 if(isset($_GET['refreshid'])){
    $id = $_GET['refreshid'];

    $RefreshCase = $case->RefreshcaseControl($id);
}
 ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Archive List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View All Archive Case List
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
                                        <th>Date</th>
                                        <th>Delete</th>
                                        <th>Refresh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $fm = new Format();
                                $case = new Casecontrol();
                                $getArchivecases = $case->getAllArchiveCases();
                                if($getArchivecases){
                                    $i = 0;
                                    while($result = $getArchivecases->fetch_assoc()){
                                    $i++;
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result['title']; ?></td>
                                        <td><?php echo $result['car_number']; ?></td>
                                        <td><?php echo $result['name']; ?></td>
                                        <td><?php echo $result['vname']; ?></td>
                                        <td><?php echo $result['vphone']; ?></td>
                                        <td><?php echo $fm->formatDate($result['date']); ?></td>
<td class="center"><a class="btn btn-xs btn-danger" onclick="return confirm('Are You Sure Want To Delete')" href="?delcaseid=<?php echo $result['id']; ?>"><i class="fa fa-remove"></i> Delete</a></td>
<td class="center"><a class="btn btn-xs btn-info"  href="?refreshid=<?php echo $result['id']; ?>"><i class="fa fa-refresh"></i> Refresh</a></td>
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

