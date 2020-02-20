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
                            <?php echo $this->session->userdata('user_fullname'); ?> 
                        </b>
                        <span>
                            <img src="#" alt="" class="dark-logo" />
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
                            <a href="<?php echo base_url(); ?>index.php/dashboard/player_assessment" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Player Assessment</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/dashboard/setting" class="waves-effect"><i class="fa fa-cogs m-r-10" aria-hidden="true"></i>Setting</a>
                        </li>
                         <li>
                                <a href="<?php echo base_url(); ?>index.php/dashboard/Player/tampilPlayer" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Rekap</a>
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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                
                                <!-- <?php if($this->session->userdata('user_role') == '1') { ?>
                                

                                <a href="<?php echo base_url(); ?>index.php/dashboard/player/createbio" class="btn pull-right hidden-sm-down btn-success"> Add Bio Player</a>
                                <?php } ?> -->


                                <h4 class="card-title">Player Detail</h4>
                                <div class="table-responsive m-t-40">
                                    <table class="table stylish-table">
                                        <tbody>
                                            <tr>
                                                <td><strong>Body Balance</strong></td>
                                                <td><?php echo $assessment['body_balance']; ?></td>
                                                <td>
                                                <?php for($i=0; $i<5; $i++) {?>
                                                
                                                <?php if($i < $this->assessment->body_balance($assessment['body_balance'])) { ?>
                                                <i class="fa fa-star"></i>
                                                <?php } else { ?>
                                                <i class="fa fa-star-o"></i>
                                                <?php } ?>
                                                
                                                <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Leap</strong></td>
                                                <td><?php echo $assessment['leap']; ?></td>
                                                <td>
                                                <?php for($i=0; $i<5; $i++) {?>
                                                
                                                <?php if($i < $this->assessment->leap($assessment['leap'])) { ?>
                                                <i class="fa fa-star"></i>
                                                <?php } else { ?>
                                                <i class="fa fa-star-o"></i>
                                                <?php } ?>
                                                
                                                <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Running Speed</strong></td>
                                                <td><?php echo $assessment['running_speed']; ?></td>
                                                <td>
                                                <?php for($i=0; $i<5; $i++) {?>
                                                
                                                <?php if($i < $this->assessment->running_speed($assessment['running_speed'])) { ?>
                                                <i class="fa fa-star"></i>
                                                <?php } else { ?>
                                                <i class="fa fa-star-o"></i>
                                                <?php } ?>
                                                
                                                <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Agility</strong></td>
                                                <td><?php echo $assessment['agility']; ?></td>
                                                <td>
                                                <?php for($i=0; $i<5; $i++) {?>
                                                
                                                <?php if($i < $this->assessment->agility($assessment['agility'])) { ?>
                                                <i class="fa fa-star"></i>
                                                <?php } else { ?>
                                                <i class="fa fa-star-o"></i>
                                                <?php } ?>
                                                
                                                <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Stamina</strong></td>
                                                <td><?php echo $assessment['stamina']; ?></td>
                                                <td>
                                                <?php for($i=0; $i<5; $i++) {?>
                                                
                                                <?php if($i < $this->assessment->stamina($assessment['stamina'])) { ?>
                                                <i class="fa fa-star"></i>
                                                <?php } else { ?>
                                                <i class="fa fa-star-o"></i>
                                                <?php } ?>
                                                
                                                <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Drible</strong></td>
                                                <td><?php echo $assessment['dribble']; ?></td>
                                                <td>
                                                <?php for($i=0; $i<5; $i++) {?>
                                                
                                                <?php if($i < $this->assessment->dribble($assessment['dribble'])) { ?>
                                                <i class="fa fa-star"></i>
                                                <?php } else { ?>
                                                <i class="fa fa-star-o"></i>
                                                <?php } ?>
                                                
                                                <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Shooting Accuracy</strong></td>
                                                <td><?php echo $assessment['shooting_accuracy']; ?></td>
                                                <td>
                                                <?php for($i=0; $i<5; $i++) {?>
                                                
                                                <?php if($i < $this->assessment->shooting_accuracy($assessment['shooting_accuracy'])) { ?>
                                                <i class="fa fa-star"></i>
                                                <?php } else { ?>
                                                <i class="fa fa-star-o"></i>
                                                <?php } ?>
                                                
                                                <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Passing Accuracy</strong></td>
                                                <td><?php echo $assessment['passing_accuracy']; ?></td>
                                                <td>
                                                <?php for($i=0; $i<5; $i++) {?>
                                                
                                                <?php if($i < $this->assessment->passing_accuracy($assessment['passing_accuracy'])) { ?>
                                                <i class="fa fa-star"></i>
                                                <?php } else { ?>
                                                <i class="fa fa-star-o"></i>
                                                <?php } ?>
                                                
                                                <?php } ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
