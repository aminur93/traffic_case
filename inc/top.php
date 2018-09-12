        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Traffic Case Control ||
                  <?php echo Session::get("usrfname");?>
                </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                    <?php 
                        if (Session::get("usrrole") == 0) {
                         ?>
                        <li><a href="pprofile.php?user_id=<?php echo Session::get("usrId");?>"><i class="fa fa-user fa-fw"></i> <?php echo Session::get('usrfname');?> Profile</a> </li>
                        <li><a href="changepass.php?user_id=<?php echo Session::get("usrId");?>"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                        <li class="divider"></li>
                        <?php }else if (Session::get("usrrole") == 1){ ?>
                        <li><a href="pprofile.php?user_id=<?php echo Session::get("usrId");?>"><i class="fa fa-user fa-fw"></i> <?php echo Session::get('usrfname');?> Profile</a> </li>
                        <li><a href="changepass.php?user_id=<?php echo Session::get("usrId");?>"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                        <li class="divider"></li>
                        <?php }else { ?>
                            <span class="error">Something Have Problem !!!</span>
                       <?php } ?>
                       
                        <?php 
                        if (isset($_GET['logout'])) {
                            Session::destroy();
                            exit();
                        }
                         ?>
                        <li><a href="?logout=<?php echo  Session::get('usrId');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->