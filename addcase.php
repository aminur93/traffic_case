<?php include 'inc/head.php'; ?>
<div id="wrapper">
<?php include 'inc/top.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
include_once ('lib/Database.php');
include_once ('lib/Session.php');
include_once ('classes/Casecontrol.php');
include_once ('classes/Category.php');
?>
<?php
$case = new Casecontrol();

if (($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['submit'])) {
   $getcase = $case->Casedata($_POST);
}
?>

 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Case</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Adding Case
                            <?php
                            if(isset($getcase)){
                                echo $getcase;
                            }
                            ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <form role="form" method="post"><!--start form case-->
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Case Title</label>
                                            <input class="form-control" name="title" type="text" id="name">
                                        </div>

                                        <div class="form-group">
                                            <label for="number">Car Number</label>
                                            <input class="form-control" name="car_number" type="text" id="number">
                                        </div>
                                        <div class="form-group">
                                            <label>Selects Case Catgeoires</label>
                                            <select class="form-control" name="cat_id">
                                            <option>~~Select~~</option>
                                            <?php
                                            $category = new Category();
                                            $getcat = $category->getcategory();
                                            if($getcat){
                                                while($result = $getcat->fetch_assoc()){
                                            ?>
                                                <option value="<?php echo $result['cat_id'];?>"><?php echo $result['name'];?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>

                                         <div class="form-group">
                                        <input name="status" type="checkbox" value="1"> Status
                                    </div>
                                       
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="vname">Vichel User Name</label>
                                        <input class="form-control" name="vname" type="text" id="vname">
                                    </div>

                                     <div class="form-group">
                                        <label for="vemail">Vichel User Email</label>
                                        <input class="form-control" name="vemail" type="text" id="vemail">
                                    </div>

                                    <div class="form-group">
                                        <label for="vphone">Vichel User Phone</label>
                                        <input class="form-control" name="vphone" type="text" id="vphone">
                                    </div>

                                </div>
                                <!-- /.col-lg-6 (nested) -->

                                <div class="col-lg-12 ">
                                <label for="">Case Details</label>
                                 <textarea name="details" id="" cols="30" rows="10" style="width:100%;"></textarea>
                                </div>

                                <div class="col-lg-6">
                                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                <a href="view_case.php" class="btn btn-info">Back</a>
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