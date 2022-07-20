<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>English 4000 Hours</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/backend/images/logo.png">
    <!-- DataTables -->
    <link href="/assets/backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/backend/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="/assets/backend/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="/assets/backend/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/backend/css/jquery-ui.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/backend/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="/assets/backend/css/select2.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body data-topbar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">


                        <a href="/admin/dashboard" class="text-white" style="font-size:16px;">
                            <br>
                            English
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>

                </div>

                <div class="d-flex">
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="/assets/backend/images/users/user4.png" alt="Header Avatar">
                            <span class="d-none text-white d-xl-inline-block ml-1">User</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <!-- <a class="dropdown-item" href="/admin/change_password"><i class="dripicons-user d-inlne-block text-muted mr-2"></i> Change Password</a> -->
                            <!-- <a class="dropdown-item d-block" href="#"><i class="dripicons-gear d-inlne-block text-muted mr-2"></i> Settings</a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout?is_admin=true"><i class="dripicons-exit d-inlne-block text-muted mr-2"></i> Logout</a>
                        </div>
                    </div>

                    <!-- <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="mdi mdi-spin mdi-settings"></i>
                            </button>
                        </div> -->

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
       

        <div class="vertical-menu">
            <div data-simplebar class="h-100">
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <!-- Department section from here -->
                            <li>
                                <a href="/admin/dashboard/" class=" waves-effect">
                                    <i class="mdi mdi-view-dashboard mdi-24px"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-shopping mdi-24px"></i>
                                    <span>Pages</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/admin/dashboard/huyb">Our Services</a></li>
                                    <li><a href="/admin/dashboard/jnjh">The Benefit</a></li>
                                    <li><a href="/admin/dashboard/jjh">FAQ</a></li>
                                </ul>
                            </li> -->
                            <li>
                            <a href="/admin/users" class=" waves-effect">
                                <i class="mdi mdi-account-supervisor mdi-24px"></i>
                                <span>Users</span>
                            </a>
                            <!-- <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/admin/users">All Users</a></li>
                                <li><a href="/admin/dashboard/iuihuh">Mailing List Subscribers</a></li>
                            </ul> -->
                        </li>
                        <li>
                            <a href="/admin/topics/" class=" waves-effect">
                                <i class="mdi mdi-format-list-bulleted mdi-24px"></i>
                                <span>Topics</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class=" waves-effect">
                                <i class="mdi mdi-cash mdi-24px"></i>
                                <span>Payment</span>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="/admin/dashboard/oh" class=" waves-effect">
                                <i class="mdi mdi-email-multiple mdi-24px"></i>
                                <span>Inbox</span>
                            </a>
                        </li> -->
                        <!-- <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-settings mdi-24px"></i>
                                <span>Setting</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/admin/settings">Site Setting</a></li>
                                <li><a href="/admin/settings/s">Email Setting</a></li>
                                <li><a href="/admin/settings/social">Social Links</a></li>
                                <li><a href="/admin/settings/my_account">My Account</a></li>
                            </ul>
                        </li> -->
                        <li>
                            <a href="/logout?is_admin=true" onclick="return confirm('Are you sure want to logout?');" class=" waves-effect">
                                <i class="mdi mdi-logout mdi-24px"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">


                    <?= $page ?>


                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- 2018 - <script>
                                document.write(new Date().getFullYear())
                            </script> © Amezia. -->
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Crafted with<i class="mdi mdi-heart text-danger"></i> by Sublime Technologies
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="/assets/backend/libs/jquery/jquery.min.js"></script>
    <script src="/assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/backend/libs/metismenu/metisMenu.min.js"></script>
    <script src="/assets/backend/libs/simplebar/simplebar.min.js"></script>
    <script src="/assets/backend/libs/node-waves/waves.min.js"></script>
    <!-- Required datatable js -->
    <script src="/assets/backend/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets/backend/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>


    <script src="/assets/backend/libs/clipboard/clipboard.min.js"></script>

    <script src="/assets/backend/js/pages/clipboard.init.js"></script>
    <script src="/assets/backend/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/assets/backend/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="/assets/backend/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/assets/backend/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/assets/backend/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="/assets/backend/libs/jszip/jszip.min.js"></script>
    <script src="/assets/backend/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="/assets/backend/libs/pdfmake/build/vfs_fonts.js"></script>
    <!-- Chart -->
    <script src="/assets/backend/libs/chartist/chartist.min.js"></script>
    <script src="/assets/backend/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js"></script>
    <script src="/assets/backend/libs/morris.js/morris.min.js"></script>
    <script src="/assets/backend/libs/raphael/raphael.min.js"></script>
    <script src="/assets/backend/libs/peity/jquery.peity.min.js"></script>
    <!-- Responsive examples -->
    <script src="/assets/backend/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/backend/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="/assets/backend/js/pages/datatables.init.js"></script>
    <!--tinymce js-->
    <script src="/assets/backend/libs/tinymce/tinymce.min.js"></script>
    <!-- init js -->
    <script src="/assets/backend/js/pages/form-editor.init.js"></script>
    <script src="/assets/backend/js/jquery-ui.min.js"></script>
    <script src="/assets/backend/js/app.js"></script>
    <script src="/assets/backend/libs/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <script src="/assets/backend/js/ephone.js?v=1.10"></script>

    <!-- reapeter lib -->
    <script src="/assets/backend/libs/jquery.repeater/jquery.repeater.min.js"></script>
    <script src="/assets/backend/js/pages/form-repeater.init.js"></script>
    <script src="/assets/backend/js/pages/dashboard2.init.js"></script>
    <script src="/assets/backend/js/select2.min.js"></script>

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


</body>

</html>