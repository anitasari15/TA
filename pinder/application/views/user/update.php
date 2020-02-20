<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pinder</title>
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/colors/blue.css" id="theme" rel="stylesheet">
</head>

<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <b>
                            <img src="../assets/images/logo-icon.png" alt="dashboard" class="dark-logo" />
                        </b>
                        <span>
                            <img src="../assets/images/logo-text.png" alt="" class="dark-logo" />
                        </span>
                    </a>
                </div>
                <div class="navbar-collapse">
                    
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <?php if($this->session->userdata('user_role') == '0') { ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/dashboard/user" class="waves-effect"><i class="fa fa-users m-r-10" aria-hidden="true"></i>User</a>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/dashboard/player" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Player</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/dashboard/setting" class="waves-effect"><i class="fa fa-cogs m-r-10" aria-hidden="true"></i>Setting</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/login/do_logout" class="waves-effect"><i class="fa fa-power-off m-r-10" aria-hidden="true"></i>Logout</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-12 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">User</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div>
                </div>
                <?php foreach($user as $value) { ?>
                <form action="<?php echo base_url(); ?>index.php/dashboard/user/process_update" method="POST" enctype="multipart/form-data" class="form-horizontal form-material">
                    <input type="hidden" name="user_id" value="<?php echo $value->user_id; ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header" style="background-color: #fafafa;">
                                    <h4 class="header-title">Update User</h4>
                                </div>
                                <div class="card-block">
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="user_fullname" placeholder="" class="form-control form-control-line" required="required" value="<?php echo $value->user_fullname; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Title</label>
                                        <div class="col-md-12">
                                            <input type="text" name="user_title" placeholder="" class="form-control form-control-line" required="required" value="<?php echo $value->user_title; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" name="user_email" placeholder="" class="form-control form-control-line" required="required" value="<?php echo $value->user_email; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Change Password</label>
                                        <div class="col-md-12">
                                            <input type="password" name="user_password" placeholder="" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Role</label>
                                        <div class="col-md-12">
                                            <select name="user_role" class="form-control form-control-line">
                                                <option value="1" <?php echo ($value->user_role == '1' ? 'selected="selected"' : ''); ?>>Pelatih Sekolah</option>
                                                <option value="2" <?php echo ($value->user_role == '2' ? 'selected="selected"' : ''); ?>>Pelatih Kota</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php } ?>
            </div>
            <footer class="footer text-center">
                © 2018 Pinder by Politeknik Negeri Malang
            </footer>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/sidebarmenu.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/flot-data.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
