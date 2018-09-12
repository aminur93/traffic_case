 <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        
                        <li>
                            <a href="dashborad.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <?php 
                        if (Session::get("usrrole") == 0) {
                         ?>
                        <li>
                            <a href="#"><i class="fa fa-automobile"></i> ADD Case <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="addcase.php"><i class="fa fa-plus"></i> Adding Case</a>
                                </li>
                                <li>
                                    <a href="view_case.php"><i class="fa fa-folder-open"></i> View Case</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-list"></i> Category <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="addcat.php"><i class="fa fa-plus"></i> Adding Category</a>
                                </li>
                                <li>
                                    <a href="view_cat.php"><i class="fa fa-folder-open"></i> View Category</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>


                         <li>
                            <a href="#"><i class="fa fa-refresh"></i> Archive Case <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="archive.php"><i class="fa fa-folder-open"></i> View Archive</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                         <li>
                            <a href="#"><i class="fa fa-users"></i> Case User <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="view_case_user.php"><i class="fa fa-user"></i> View Case User</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php }else if (Session::get("usrrole") == 1){ ?>
                          <li>
                            <a href="#"><i class="fa fa-plus"></i> Case <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="my_case.php"><i class="fa fa-folder-open"></i> MY Case</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <?php }else { ?>
                            <span class="error">Something Have Problem !!!</span>
                       <?php } ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>