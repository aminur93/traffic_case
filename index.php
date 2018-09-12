<?php 
include_once ('lib/Database.php');
include_once ('lib/Session.php');
include_once ('classes/User.php');

Session::checkLogin();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Traffic || Login</title>
        
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
       <!-- bootstrap theme-->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css">
       <!-- Font Awesome-->
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
       <!-- Custom Css-->
        <link rel="stylesheet" href="css/style.css">
       <!-- Jquery-->
       <script src="assets/jquery/jquery-3.2.1.min.js" charset="utf-8"></script>
       <!-- jqueryUI-->
       <link rel="stylesheet" href="assets/jquery-ui/jquery-ui.min.css">
       <!-- jquery script-->
       <script src="assets/jquery-ui/jquery-ui.min.js" charset="utf-8"></script>
       <!-- Bootstrap js-->
       <script src="assets/bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
      

</head>
<body>
 <div class="container">
 <?php 
 $usr = new User(); 
if (($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['login'])) {
    $getlogin = $usr->getLoginData($_POST);
}
  ?>    
<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Sign In</div>
                <?php 
                if (isset($getlogin)) {
                    echo $getlogin;
                }
                 ?>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
            </div>     

            <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    
                <form action="" method="post" class="form-horizontal">
                            
                    <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="username or email">                                        
                            </div>
                        
                    <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                            </div>
                        
                    <div class="input-group">
                              <div class="checkbox">
                                <label>
                                  <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                </label>
                              </div>
                            </div>

                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                            <div class="col-sm-12 controls">
                               <button id="btn-signup"  name="login" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Login</button>
                              <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                    Don't have an account! 
                                <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                    Sign Up Here
                                </a>
                                </div>
                            </div>
                        </div>    
                    </form>    
                </div>                     
            </div>  
      </div>
<?php 
$usr = new User(); 

if (($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['register'])) {
    $getreg = $usr->getRegisterData($_POST, $_FILES);
}
 ?>
<div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Sign Up</div>
            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
        </div>  
        <div class="panel-body" >
            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">                     
                <div class="form-group">
                    <label for="email" class="col-md-3 control-label">Email</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                    </div>
                </div>
                    
                <div class="form-group">
                    <label for="firstname" class="col-md-3 control-label">First Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="fname" placeholder="First Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="lname" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-3 control-label">Password</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="image" class="col-md-3 control-label">Image</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control" name="image" placeholder="Image">
                    </div>
                </div>

                 <div class="form-group">
                    <label for="Acces Type" class="col-md-3 control-label">Acces Type</label>
                    <div class="col-md-9">
                        <select class="form-control" name="role">
                        	<option>~~Select Type~~</option>
                        	<option value="0">Police</option>
                        	<option value="1">User</option>
                        </select>
                    </div>
                </div>
                  
                <div class="form-group">
                    <!-- Button -->                                        
                    <div class="col-md-offset-3 col-md-9">
                        <button id="btn-signup"  name="register" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                        <span style="margin-left:8px;">or</span>  
                    </div>
                </div>
                
                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                    
                    <div class="col-md-offset-3 col-md-9">
                        <?php 
                        if (isset($getreg)) {
                            echo $getreg;
                        }
                       ?>
                    </div>                                           
                        
                </div>    
            </form>
         </div>
    </div>
</body>
</html>