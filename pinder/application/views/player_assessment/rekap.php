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
                                <a href="<?php echo base_url(); ?>index.php/dashboard/player" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Player Assessment</a>
                            </li>

                            <?php if($this->session->userdata('user_role') == '0' ||  $this->session->userdata('user_role') == '2') { ?>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/dashboard/setting" class="waves-effect"><i class="fa fa-cogs m-r-10" aria-hidden="true"></i>Setting</a>
                            </li>

                            <li>
                                <a href="<?php echo base_url(); ?>index.php/dashboard/Player/tampilPlayer" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Rekap</a>
                            </li>
                            <?php } ?>
                            
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

                            <a href="<?php echo base_url(); ?>index.php/dashboard/Player/tampilPlayer" class="btn pull-right hidden-sm-down btn-success"> Rekap Bio</a>

                            <h3 class="text-themecolor m-b-0 m-t-0">Player</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Player</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Male</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Female</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="card">
                                        <div class="card-block">
                                            
                                            <!-- <?php if($this->session->userdata('user_role') == '1') { ?>
                                            
                                            <a href="<?php echo base_url(); ?>index.php/dashboard/player/createbio" class="btn pull-right hidden-sm-down btn-success"> Add Bio Player</a>
                                            <?php } ?> -->
                                            <h4 class="card-title">Player List</h4>
                                            <div class="table-responsive m-t-40">

                                                 <?php echo form_open('dashboard/Player/tampilRekap'); ?>
                                              <?php if($this->session->userdata('user_role') == '0' || $this->session->userdata('user_role') == '2') { ?>
                                            <?php echo form_open('dashboard/Player/tampilPlayer'); ?>
                                              <?php
                                              $now=date('Y');
                                              echo "<select name='tahun'>";
                                              for ($a=2015;$a<=$now;$a++)
                                              {
                                                   echo "<option value='$a'>$a</option>";
                                              }
                                              echo "</select>";
                                              ?>

                                              <input class="btn btn-primary btn-sm" type="submit" value="Submit">
                                            <?php echo form_close(); ?>
                                             <?php } ?>

                                                <table class="table stylish-table">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Avatar</th>
                                                            <th>Player Name</th>
                                                            <th>School</th>
                                                            
                                                            <?php if($this->session->userdata('user_role') == '2') { ?>
                                                                    <th>Posibble Position</th>
                                                                    <th>Confirmation Position</th>
                                                            <?php } ?>

                                                            <?php if(!checkAssessment()){ ?>
                                                            <th>Score</th>
                                                            <?php } ?>

                                                            <?php if($this->session->userdata('user_role') == '2') { ?>
                                                            <th>Action</th>
                                                            <?php } ?>
                                                            <!-- <th>Possible Positions</th> -->
                                                            <!-- <th>Confirmation Player</th> -->
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if(count($player_male) > 0) { ?>

                                                        <?php if(!checkAssessment()){ ?>
                                                                <?php usort($player_male, 'sortByPoint'); ?>

                                                        <?php } ?>
                                                        <?php $i=0; ?>
                                                        <?php foreach($player_male as $player) { ?>

                                                        <?php if($i <= 14) { ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo ++$i; ?>
                                                            </td>
                                                            <td>
                                                                <img src="<?php echo base_url('uploads/avatar/'. $player['player_avatar']) ?>" alt="" width="100">
                                                            </td>
                                                            <td>
                                                                <h6><?php echo $player['player_fullname']; ?><!-- </h6><small class="text-muted"><?php echo $player['player_origin']; ?></small> -->
                                                            </td>
                                                            <td>
                                                                <h6><?php echo $player['player_origin']; ?></h6>
                                                            </td>

                                                            <?php if($this->session->userdata('user_role') == '2') { ?>
                                                            <td><?php echo $this->assessment->get_positions($player['assessment_id']); ?></td>
                                                            <td><?php echo $this->assessment->get_position($player['assessment_id']); ?></td>
                                                            <?php } ?>
                                                            
                                                            <?php if(!checkAssessment()){ ?>
                                                            <td>
                                                                <?php echo $player['point']?>
                                                            </td>
                                                            <?php } ?>

                                                            <?php if($this->session->userdata('user_role') == '2') { ?>
                                                            <td>
                                                                <a href="<?php echo base_url(); ?>index.php/dashboard/player_assessment/detail/<?php echo $player['assessment_id']; ?>" class="btn pull-right hidden-sm-down btn-success"> See Detail</a></a>
                                                            </td>
                                                            <?php } ?>
                                                        </tr>
                                                        <?php } ?>
                                                        <?php } ?>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="card">
                                        <div class="card-block">
                                            
                                            <!-- <?php if($this->session->userdata('user_role') == '1') { ?>
                                            
                                            <a href="<?php echo base_url(); ?>index.php/dashboard/player/createbio" class="btn pull-right hidden-sm-down btn-success"> Add Bio Player</a>
                                            <?php } ?> -->
                                            <h4 class="card-title">Player List</h4>
                                            <div class="table-responsive m-t-40">
                                                <?php echo form_open('dashboard/Player/tampilRekap'); ?>
                                              <?php
                                              $now=date('Y');
                                              echo "<select name='tahun'>";
                                              for ($a=2015;$a<=$now;$a++)
                                              {
                                                   echo "<option value='$a'>$a</option>";
                                              }
                                              echo "</select>";
                                              ?>

                                              <input class="btn btn-primary btn-sm" type="submit" value="Submit">
                                            <?php echo form_close(); ?>
                                                <table class="table stylish-table">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2">Player</th>
                                                            <th>School</th>
                                                            <th>score</th>
                                                            <!-- <th>Possible Positions</th> -->
                                                            <!-- <th>Confirmation Player</th> -->
                                                            <?php if($this->session->userdata('user_role') == '2') { ?>
                                                            <th>Action</th>
                                                            <?php } ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if(count($player_female) > 0) { ?>
                                                        <?php usort($player_female, 'sortByPoint'); ?>

                                                        <?php foreach($player_female as $player) { ?>
                                                        <tr>
                                                            <td>
                                                                <h6><?php echo $player['player_fullname']; ?></h6><small class="text-muted"><?php echo $player['player_origin']; ?></small>
                                                            </td>
                                                            <td><?php echo $this->assessment->get_positions($player['assessment_id']); ?></td>
                                                            <td><?php echo $this->assessment->get_position($player['assessment_id']); ?></td>

                                                            <td>
                                                                <?php echo $player['point']?>
                                                            <td>
                                                                <a href="<?php echo base_url(); ?>index.php/dashboard/player_assessment/detail/<?php echo $player['player_id']; ?>" class="btn pull-right hidden-sm-down btn-success"> See Detail</a></a>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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