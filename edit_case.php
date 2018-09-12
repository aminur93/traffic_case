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
if(!isset($_GET['caseid']) || $_GET['caseid'] == NULL){
    echo "<script>window.location = 'view_case.php'</script>";
}else{
    $id = $_GET['caseid'];
}

$case = new Casecontrol();

if (($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['update'])) {
   $getcaseupdate = $case->CasedataUpdate($id,$_POST);
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
                            Update Case
                            <?php
                              if(isset($getcaseupdate)){
                                  echo $getcaseupdate;
                              }
                            ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <?php
                            $updatecase = $case->getcaseById($id);
                            if($updatecase){
                                while($results = $updatecase->fetch_assoc()){
                            ?>
                            <form role="form" method="post"><!--start form case-->
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Case Title</label>
                                            <input class="form-control" value="<?= $results['name'];?>" name="name" type="text" id="name">
                                        </div>

                                        <div class="form-group">
                                            <label for="number">Car Number</label>
                                            <input class="form-control" value="<?=  $results['car_number'];?>"  name="car_number" type="text" id="number">
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
                                                <option value="<?php echo $result['cat_id'];?>" <?= ((isset($result['cat_id']) == $results['cat_id'])?'selected="selected"':'');?>><?php echo $result['name'];?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>

                                         <div class="form-group">
                                        <input name="status" type="checkbox" value="1" 
                                          <?php
                                            if($results['status'] == 1){
                                                echo 'checked';
                                            }
                                          ?>
                                        > Status
                                    </div>
                                       
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="vname">Vichel User Name</label>
                                        <input class="form-control" value="<?= $results['vname'];?>" name="vname" type="text" id="vname">
                                    </div>

                                     <div class="form-group">
                                        <label for="vemail">Vichel User Email</label>
                                        <input class="form-control" value="<?= $results['vemail'];?>" name="vemail" type="text" id="vemail">
                                    </div>

                                    <div class="form-group">
                                        <label for="vphone">Vichel User Phone</label>
                                        <input class="form-control" value="<?= $results['vphone'];?>" name="vphone" type="text" id="vphone">
                                    </div>

                                </div>
                                <!-- /.col-lg-6 (nested) -->

                                <div class="col-lg-12 ">
                                <label for="details">Case Details</label>
                                 <textarea name="details" id="details" cols="30" rows="10" style="width:100%;"><?= $results['details']; ?></textarea>
                                </div>

                                <div class="col-lg-6">
                                <button type="submit" name="update" class="btn btn-success">Update</button>
                                <a href="view_case.php" class="btn btn-info">Back</a>
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
