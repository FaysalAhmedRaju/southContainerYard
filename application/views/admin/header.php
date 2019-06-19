<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>South Container Yard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
<!--    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>">
    <script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js') ?>"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css')?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/_all-skins.min.css')?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/flat/blue.css')?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/morris/morris.css')?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css')?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datepicker/datepicker3.css')?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.css')?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header" style="background-color:">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>S</b>CY</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>S.C.Yard</b> Project</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->



                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo base_url('assets/dist/img/noImg.jpg') ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs"> <?php echo  $this->session->userdata('username');?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <!--                  src="dist/img/user2-160x160.jpg"-->
                                <img  src="<?php echo base_url('assets/dist/img/noImg.jpg') ?>" class="img-circle" alt="User Image">

                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo base_url('admin_controller/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->

                </ul>
            </div>
        </nav>
    </header>

    <!-- -------------------------------------------------------------------sidebar start ------------------------------------------------------------------------>



    <aside class="main-sidebar" style="background-color: ghostwhite">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" >
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img  src="<?php echo base_url('assets/dist/img/noImg.jpg') ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo  $this->session->userdata('username');?></p>
<!--                    <p>--><?php //echo  $this->session->userdata('id');?><!--</p>-->
                    <!--          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
                </div>
            </div>
            <!-- search form -->
            <!--      <form action="#" method="get" class="sidebar-form">-->
            <!--        <div class="input-group">-->
            <!--          <input type="text" name="q" class="form-control" placeholder="Search...">-->
            <!--              <span class="input-group-btn">-->
            <!--                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>-->
            <!--                </button>-->
            <!--              </span>-->
            <!--        </div>-->
            <!--      </form>-->
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <!--        <li class="header">MAIN NAVIGATION</li>-->
                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <!--          <ul class="treeview-menu">-->
                    <!--            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>-->
                    <!--            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>-->
                    <!--          </ul>-->
                </li>
                <!--        <li class="treeview">-->
                <!--          <a href="#">-->
                <!--            <i class="fa fa-files-o"></i>-->
                <!--            <span>Layout Options</span>-->
                <!--            <span class="pull-right-container">-->
                <!--              <span class="label label-primary pull-right">4</span>-->
                <!--            </span>-->
                <!--          </a>-->
                <!--          <ul class="treeview-menu">-->
                <!--            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>-->
                <!--            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>-->
                <!--            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>-->
                <!--            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>-->
                <!--          </ul>-->
                <!--        </li>-->
                <li>
                    <!--          <a href="pages/widgets.html">-->
                    <!--            <i class="fa fa-th"></i> <span>Widgets</span>-->
                    <!--            <span class="pull-right-container">-->
                    <!--              <small class="label pull-right bg-green">new</small>-->
                    <!--            </span>-->
                    <!--          </a>-->
                </li>
                <!--        <li class="treeview">-->
                <!--          <a href="#">-->
                <!--            <i class="fa fa-pie-chart"></i>-->
                <!--            <span>Charts</span>-->
                <!--            <span class="pull-right-container">-->
                <!--              <i class="fa fa-angle-left pull-right"></i>-->
                <!--            </span>-->
                <!--          </a>-->
                <!--          <ul class="treeview-menu">-->
                <!--            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>-->
                <!--            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>-->
                <!--            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>-->
                <!--            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>-->
                <!--          </ul>-->
                <!--        </li>-->
                <!--        <li class="treeview">-->
                <!--          <a href="#">-->
                <!--            <i class="fa fa-laptop"></i>-->
                <!--            <span>UI Elements</span>-->
                <!--            <span class="pull-right-container">-->
                <!--              <i class="fa fa-angle-left pull-right"></i>-->
                <!--            </span>-->
                <!--          </a>-->
                <!--          <ul class="treeview-menu">-->
                <!--            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>-->
                <!--            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>-->
                <!--            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>-->
                <!--            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>-->
                <!--            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>-->
                <!--            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>-->
                <!--          </ul>-->
                <!--        </li>-->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Head</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('admin_controller/head_view')?>"><i class="fa fa-circle-o"></i> Head Entry Form</a></li>
                        <!--            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>-->
                        <!--            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>-->
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Sub Head</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('admin_controller/sub_head_view_form')?>"><i class="fa fa-circle-o"></i> Sub Head Entry Form</a></li>
                        <!--            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>-->
                        <!--            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>-->
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Income/Expenditure</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('admin_controller/income_expenditure_form_view')?>"><i class="fa fa-circle-o"></i> Income/Expenditure Form</a></li>
                        <li><a href="<?php echo base_url('admin_controller/dataListView')?>"><i class="fa fa-circle-o"></i> Data List</a></li>
                        <!--            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>-->
                        <!--            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>-->
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i> <span>Report</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href='<?php echo base_url('admin_controller/income_expenditure_report_view_fun')?>'><i class="fa fa-circle-o"></i> Head Wise Income/Expenditure</a></li>
                        <!--            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>-->
                        <!--            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>-->
                    </ul>
                </li>
        <?php
          if($this->session->userdata('id') == 1){


        ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>User Registration</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href='<?php echo base_url('admin_controller/user_registration_view')?>'><i class="fa fa-circle-o"></i> Registration Entry Form</a></li>
                        <!--            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>-->
                        <!--            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>-->
                    </ul>
                </li>

                <?php


                }
                ?>
                <!--        <li class="treeview">-->
                <!--          <a href="#">-->
                <!--            <i class="fa fa-table"></i> <span>Tables</span>-->
                <!--            <span class="pull-right-container">-->
                <!--              <i class="fa fa-angle-left pull-right"></i>-->
                <!--            </span>-->
                <!--          </a>-->
                <!--          <ul class="treeview-menu">-->
                <!--            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>-->
                <!--            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>-->
                <!--          </ul>-->
                <!--        </li>-->
                <li>
                    <!--          <a href="pages/calendar.html">-->
                    <!--            <i class="fa fa-calendar"></i> <span>Calendar</span>-->
                    <!--            <span class="pull-right-container">-->
                    <!--              <small class="label pull-right bg-red">3</small>-->
                    <!--              <small class="label pull-right bg-blue">17</small>-->
                    <!--            </span>-->
                    <!--          </a>-->
                </li>
                <li>
                    <!--          <a href="pages/mailbox/mailbox.html">-->
                    <!--            <i class="fa fa-envelope"></i> <span>Mailbox</span>-->
                    <!--            <span class="pull-right-container">-->
                    <!--              <small class="label pull-right bg-yellow">12</small>-->
                    <!--              <small class="label pull-right bg-green">16</small>-->
                    <!--              <small class="label pull-right bg-red">5</small>-->
                    <!--            </span>-->
                    <!--          </a>-->
                </li>
                <!--        <li class="treeview">-->
                <!--          <a href="#">-->
                <!--            <i class="fa fa-folder"></i> <span>Examples</span>-->
                <!--            <span class="pull-right-container">-->
                <!--              <i class="fa fa-angle-left pull-right"></i>-->
                <!--            </span>-->
                <!--          </a>-->
                <!--          <ul class="treeview-menu">-->
                <!--            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>-->
                <!--            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>-->
                <!--            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>-->
                <!--            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>-->
                <!--            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>-->
                <!--            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>-->
                <!--            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>-->
                <!--            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>-->
                <!--            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>-->
                <!--          </ul>-->
                <!--        </li>-->
                <!--        <li class="treeview">-->
                <!--          <a href="#">-->
                <!--            <i class="fa fa-share"></i> <span>Multilevel</span>-->
                <!--            <span class="pull-right-container">-->
                <!--              <i class="fa fa-angle-left pull-right"></i>-->
                <!--            </span>-->
                <!--          </a>-->
                <!--          <ul class="treeview-menu">-->
                <!--            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>-->
                <!--            <li>-->
                <!--              <a href="#"><i class="fa fa-circle-o"></i> Level One-->
                <!--                <span class="pull-right-container">-->
                <!--                  <i class="fa fa-angle-left pull-right"></i>-->
                <!--                </span>-->
                <!--              </a>-->
                <!--              <ul class="treeview-menu">-->
                <!--                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>-->
                <!--                <li>-->
                <!--                  <a href="#"><i class="fa fa-circle-o"></i> Level Two-->
                <!--                    <span class="pull-right-container">-->
                <!--                      <i class="fa fa-angle-left pull-right"></i>-->
                <!--                    </span>-->
                <!--                  </a>-->
                <!--                  <ul class="treeview-menu">-->
                <!--                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>-->
                <!--                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>-->
                <!--                  </ul>-->
                <!--                </li>-->
                <!--              </ul>-->
                <!--            </li>-->
                <!--            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>-->
                <!--          </ul>-->
                <!--        </li>-->
                <!--        <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>-->
                <!--        <li class="header">LABELS</li>-->
                <!--        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>-->
                <!--        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>-->
                <!--        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>-->
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- -------------------------------------------------------------------sidebar end ------------------------------------------------------------------------>
