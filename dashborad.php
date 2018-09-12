<?php include 'inc/head.php'; ?>
<div id="wrapper">
<?php include 'inc/top.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/Casecontrol.php';?>
<?php include 'classes/Category.php';?>
<?php include 'classes/User.php';?>
<?php include 'classes/Payment.php';?>
<?php
$case = new Casecontrol();
$getTotal = $case->totalcase();
$getarchive = $case->archivecase();
?>
<?php
$category = new Category();
$getTotalcategory = $category->totalcategory();
?>

<?php
$usr = new User();
$getUser = $usr->TotoalUser();
?>

<?php 
    if (Session::get("usrrole") == '0') {
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-automobile fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <?php
                            if (isset($getTotal)) {
                            ?>
                            <div class="huge"><?php echo $getTotal; ?></div>
                            <?php } ?>
                            <div>Total Cases!</div>
                        </div>
                    </div>
                </div>
                <a href="view_case.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <?php
                            if (isset($getTotalcategory)) {
                            ?>
                            <div class="huge"><?php echo $getTotalcategory; ?></div>
                            <?php } ?>
                            <div>Catgroy List!</div>
                        </div>
                    </div>
                </div>
                <a href="view_cat.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <?php
                            if (isset($getUser)) {
                            ?>
                            <div class="huge"><?php echo $getUser; ?></div>
                            <?php } ?>
                            <div>User List!</div>
                        </div>
                    </div>
                </div>
                <a href="view_case_user.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-support fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <?php
                            if (isset($getarchive)) {
                            ?>
                            <div class="huge"><?php echo $getarchive; ?></div>
                            <?php } ?>
                            <div>Archive!</div>
                        </div>
                    </div>
                </div>
                <a href="archive.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->

<!-- /.col-lg-6 -->
<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            Recent Cases
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Car Number</th>
                            <th>Vichle user Name</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $getcase = $case->getcases();
                    if($getcase){
                        $i =0;
                        while($result = $getcase->fetch_assoc()){
                         $i++;
                    ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $result['title'];?></td>
                            <td><?= $result['car_number'];?></td>
                            <td><?= $result['vname'];?></td>
                        </tr>
                        <?php } }?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-6 -->

<!-- /.col-lg-6 -->
<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            Recent Category List
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cat = $category->getcategories();
                    if($cat){
                        $i =0;
                        while($result = $cat->fetch_assoc()){
                        $i++;
                    ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $result['name'];?></td>
                            
                        </tr>
                        <?php } }?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-6 -->

<!-- /.col-lg-6 -->
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Recent Archive List
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Car Number</th>
                            <th>Vichle User Name</th>
                            <th>Vichle User Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $archive = $case->archivecases();
                    if($archive){
                        $i=0;
                        while($result = $archive->fetch_assoc()){
                            $i++;
                    ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $result['title'];?></td>
                            <td><?= $result['car_number'];?></td>
                            <td><?= $result['vname'];?></td>
                            <td><?= $result['vphone'];?></td>
                        </tr>
                        <?php } }?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-6 -->
<?php }else if (Session::get("usrrole") == '1'){ ?>
    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Clear Casses List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Email</th>
                                        <th>car Number</th>
                                        <th>Case Title</th>
                                        <th>Amount</th>
                                        <th>Transaction Number</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $pay = new Payment();
                                $getpaymentData = $pay->clear();
                                if($getpaymentData){
                                    $i = 0;
                                    while($result = $getpaymentData->fetch_assoc()){
                                    $i++;
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result['email']; ?></td>
                                        <td><?php echo $result['car_number']; ?></td>
                                        <td><?php echo $result['title']; ?></td>
                                        <td><?php echo $result['amount']; ?></td>
                                        <td><?php echo $result['tnumber']; ?>
                                        <td>
                                        <?php
                                        if($result['status'] == 0){
                                        ?>
                                        <a class="btn btn-xs btn-warning">Running</a>
                                        <?php }else{ ?>
                                        <a class="btn btn-xs btn-success">Case Clear</a>
                                        <?php } ?>
                                        </td>
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
<?php }else { ?>
    <span class="error">Something Have Problem !!!</span>
<?php } ?>
<?php include 'inc/footer.php'; ?>