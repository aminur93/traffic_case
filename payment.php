<?php include 'inc/head.php'; ?>
<div id="wrapper">
<?php include 'inc/top.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
include_once ('lib/Database.php');
include_once ('lib/Session.php');
include_once ('classes/Casecontrol.php');
include_once ('classes/Category.php');
include_once ('classes/User.php');
include_once ('classes/Payment.php');
?>
<?php
$case = new Casecontrol();
$usr = new User();

$pay = new Payment();

if (($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['payment'])) {
   $getpayment = $pay->addpayment($_POST);
}
?>

 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Payment Now</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Adding Your Payment
                            <?php
                            if(isset($getpayment)){
                                echo $getpayment;
                            }
                            ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <form role="form" method="post"><!--start form case-->
                                <div class="col-lg-6">
                                       <?php 
                                        if(Session::get("usrrole") == 1){
                                        ?>

                                        <input type="hidden" name="user_id" value="<?php echo Session::get('usrId');?>">
                                            <?php } ?>

                                          <?php
                                            $getcases = $case->getAllCases();
                                            if($getcases){
                                                while($result = $getcases->fetch_assoc()){
                                            ?>
                                            <input type="hidden" name="case_id" value="<?php echo $result['id'];?>">
                                            <?php  } } ?>

                                        <div class="form-group">
                                            <label for="tnumber">Transaction Number</label>
                                            <input class="form-control" name="tnumber" type="text" id="tnumber">
                                        </div>

                                        <div class="form-group">
                                            <label for="tid">Transaction ID</label>
                                            <input class="form-control" name="tid" type="text" id="tid">
                                        </div>

                                         <div class="form-group">
                                            <label for="cvc">CVC</label>
                                            <input class="form-control" name="cvc" type="text" id="cvc">
                                        </div>

                                        <div class="form-group">
                                            <label for="amount">Amount</label>
                                            <input class="form-control" name="amount" type="text" id="amount">
                                        </div>
                                       
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                   <h3 class="text-info">Chose Your Payment Option</h3>
                                    <div class="form-group">
                                        <ul style="margin-top:20px;list-style:none;">
                                           <li>Bikash Number: 01687938424</li>
                                           <li>Rocket Number: 01687938424</li>
                                           <li>Sure-Cash Number: 01687938424</li>
                                           <li>M-cash Number: 01687938424</li>
                                           <li>U-Cash Number: 01687938424</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                                <div class="col-lg-12">
                                <button type="submit" name="payment" class="btn btn-success">Submit</button>
                                <a href="my_case.php" class="btn btn-info">Back</a>
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