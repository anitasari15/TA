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
                        <h3 class="text-themecolor m-b-0 m-t-0">Player</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Player</li>
                        </ol>
                    </div>
                </div>
                <form action="<?php echo base_url(); ?>index.php/dashboard/player_assessment/process_create" method="POST" enctype="multipart/form-data" class="form-horizontal form-material">
                    <div class="row">
                        <!-- <div class="col-md-6">
                            <div class="card">
                                <div class="card-header" style="background-color: #fafafa;">
                                    <h4 class="header-title">Biodata</h4>
                                </div>
                                <div class="card-block">
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="player_fullname" placeholder="" class="form-control form-control-line" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Gender</label>
                                        <div class="col-sm-12">
                                            <select name="player_gender" class="form-control form-control-line">
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">School</label>
                                        <div class="col-md-12">
                                            <input type="text" name="player_origin" placeholder="" class="form-control form-control-line" value="<?php echo str_replace('Pelatih ', '', $this->session->userdata('user_title')); ?>" required="required" readonly="readonly">
                                        </div>
                                    </div>


    
                                    <div class="form-group">
                                        <label class="col-md-12">Usia</label>
                                        <div class="col-md-12">
                                            <input type="number" name="player_age" placeholder="" class="form-control form-control-line" step="1" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">No Kartu Pelajar</label>
                                        <div class="col-md-12">
                                            <input type="number" name="player_card" placeholder="" class="form-control form-control-line" step="1" required="required">
                                        </div>
                                    </div>
                                    






                                    <div class="form-group">
                                        <label class="col-md-12">Weight (kg)</label>
                                        <div class="col-md-12">
                                            <input type="number" name="player_weight" placeholder="" class="form-control form-control-line" step="1" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Height (centimeter)</label>
                                        <div class="col-md-12">
                                            <input type="number" name="player_height" placeholder="" class="form-control form-control-line" step="1" required="required">
                                        </div>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label class="col-md-12">Note</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" name="player_note" class="form-control form-control-line"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Image</label>
                                        <div class="col-md-12">
                                            <input type="file" name="player_avatar" class="form-control form-control-line" required="required">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
 -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header" style="background-color: #fafafa;">
                                    <h4 class="header-title">Assessment</h4>
                                </div>
                                <div class="card-block">
                                    <div class="form-group">
                                        <label class="col-md-12">Body Balance</label>
                                        <div class="col-md-12">
                                            <select name="body_balance" class="form-control form-control-line">
                                                <option value="1">Very Weak</option>
                                                <option value="2">Weak</option>
                                                <option value="3">Medium</option>
                                                <option value="4">Strong</option>
                                                <option value="5">Very Strong</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Leap</label>
                                        <div class="col-md-12">
                                            <select name="leap" class="form-control form-control-line">
                                                <option value="1">< 30 centimeter</option>
                                                <option value="2">30 - 40 centimeter</option>
                                                <option value="3">41 - 45 centimeter</option>
                                                <option value="4">46 - 50 centimeter </option>
                                                <option value="5">> 50 centimeter</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Running Speed</label>
                                        <div class="col-md-12">
                                            <select name="running_speed" class="form-control form-control-line">
                                                <option value="1">> 16 second</option>
                                                <option value="2">14 - 16 second</option>
                                                <option value="3">11 - 13 second</option>
                                                <option value="4">8 - 10 second </option>
                                                <option value="5">< 8 second</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Agility</label>
                                        <div class="col-sm-12">
                                            <select name="agility" class="form-control form-control-line">
                                                <option value="1">> 69 second</option>
                                                <option value="2">60 - 69 second</option>
                                                <option value="3">50 - 59 second</option>
                                                <option value="4">30 - 49 second </option>
                                                <option value="5">< 30</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Stamina</label>
                                        <div class="col-sm-12">
                                            <select name="stamina" class="form-control form-control-line">
                                                <option value="1">< 1026 meter</option>
                                                <option value="2">1026 - 2099 meter</option>
                                                <option value="3">2100 - 2519 meter</option>
                                                <option value="4">2520 - 3359 meter </option>
                                                <option value="5">> 3359 meter</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Dribble</label>
                                        <div class="col-sm-12">
                                            <select name="dribble" class="form-control form-control-line">
                                                <option value="1">> 7 second</option>
                                                <option value="2">7 second</option>
                                                <option value="3">6 second</option>
                                                <option value="4">5 second</option>
                                                <option value="5">< 5 second</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Shooting Accuracy</label>
                                        <div class="col-sm-12">
                                            <select name="shooting_accuracy" class="form-control form-control-line">
                                                <option value="1">< 5</option>
                                                <option value="2">5 - 7</option>
                                                <option value="3">8 - 11</option>
                                                <option value="4">12 - 17</option>
                                                <option value="5">> 17</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Passing Accuracy</label>
                                        <div class="col-sm-12">
                                            <select name="passing_accuracy" class="form-control form-control-line">
                                                <option value="1">< 10</option>
                                                <option value="2">10 - 19</option>
                                                <option value="3">20 - 29</option>
                                                <option value="4">30 - 39</option>
                                                <option value="5">> 39</option>
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
