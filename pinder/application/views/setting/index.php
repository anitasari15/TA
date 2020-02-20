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
                                <a href="<?php echo base_url(); ?>index.php/dashboard/player_assessment" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Player Assessment</a>
                            </li>
                            <?php if($this->session->userdata('user_role') == '0' || $this->session->userdata('user_role') == '2') { ?>
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
                            <h3 class="text-themecolor m-b-0 m-t-0">Setting</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Setting</li>
                            </ol>
                        </div>
                    </div>
                    <!-- <form action="<?php echo base_url(); ?>index.php/dashboard/setting/save_setting" method="POST" enctype="multipart/form-data" class="form-horizontal form-material"> -->
                    <div class="row">
                        <div class="col-md-6">
                            <!-- <div class="card">
                                <div class="card-header" style="background-color: #fafafa;">
                                    <h4 class="header-title">Setting</h4>
                                </div>
                                <div class="card-block">
                                    <div class="form-group">
                                        <label class="col-md-12">IP Server</label>
                                        <div class="col-md-12">
                                            <input type="text" name="ip_server" placeholder="" class="form-control form-control-line" required="required" value="<?php echo ($this->session->has_userdata('ip_server') ? $this->session->userdata('ip_server') : ''); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            
                            <div class="card">
                                <div class="card-header" style="background-color: #fafafa;">
                                    <h4 class="header-title">Setting</h4>
                                </div>
                                <div class="card-block">
                                    <div class="form-group">
                                        <label class="col-md-12">Status</label>
                                        
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <?php if(checkAssessment())  {?>
                                            <a href="<?php echo site_url('dashboard/setting/hentikan'); ?>"><button type="button" class="btn btn-danger">Hentikan</button></a>
                                            <?php } else { ?>
                                            <a href="<?php echo site_url('dashboard/setting/nyalakan'); ?>"><button type="button" class="btn btn-success">Nyalakan</button></a>
                                            <?php } ?>
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form action="<?php echo base_url(); ?>index.php/dashboard/setting/save_criteria" method="POST" enctype="multipart/form-data" class="form-horizontal form-material">
                                <input type="hidden" name="player_id" value="<?php echo $this->uri->segment(4); ?>">
                                <div class="card">
                                    <div class="card-header" style="background-color: #fafafa;">
                                        <h4 class="header-title">Kriteria Rank</h4>
                                    </div>
                                    <div class="card-block">
                                        <div class="form-group">
                                            <label class="col-md-12">Body Balance</label>
                                            <div class="col-md-12">
                                                

                                                <!-- Modal -->
                                                <div class="modal fade" id="modalBodyBalance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Body Balance</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="<?php echo base_url('uploads/panduan/bodynew.jpg'); ?>" alt="" width="100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <select name="body_balance" class="form-control form-control-line">
                                                    <option value="1" <?php echo (count($kriteria) > 0 && $kriteria[0]['body_balance'] == '1' ? 'selected="selected"' : ''); ?>>sangat kurang</option>
                                                    <option value="2" <?php echo (count($kriteria) > 0 && $kriteria[0]['body_balance'] == '2' ? 'selected="selected"' : ''); ?>>kurang</option>
                                                    <option value="3" <?php echo (count($kriteria) > 0 && $kriteria[0]['body_balance'] == '3' ? 'selected="selected"' : ''); ?>>cukup</option>
                                                    <option value="4" <?php echo (count($kriteria) > 0 && $kriteria[0]['body_balance'] == '4' ? 'selected="selected"' : ''); ?>>baik</option>
                                                    <option value="5" <?php echo (count($kriteria) > 0 && $kriteria[0]['body_balance'] == '5' ? 'selected="selected"' : ''); ?>>sangat baik</option>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Leap</label>
                                            <div class="col-md-12">
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="modalLeap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Leap</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="<?php echo base_url('uploads/panduan/leapnew.jpg'); ?>" alt="" width="100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <select name="leap" class="form-control form-control-line">
                                                    <option value="1" <?php echo (count($kriteria) > 0 && $kriteria[0]['leap'] == '1' ? 'selected="selected"' : ''); ?>>sangat kurang</option>
                                                    <option value="2" <?php echo (count($kriteria) > 0 && $kriteria[0]['leap'] == '2' ? 'selected="selected"' : ''); ?>>kurang</option>
                                                    <option value="3" <?php echo (count($kriteria) > 0 && $kriteria[0]['leap'] == '3' ? 'selected="selected"' : ''); ?>>cukup</option>
                                                    <option value="4" <?php echo (count($kriteria) > 0 && $kriteria[0]['leap'] == '4' ? 'selected="selected"' : ''); ?>>baik</option>
                                                    <option value="5" <?php echo (count($kriteria) > 0 && $kriteria[0]['leap'] == '5' ? 'selected="selected"' : ''); ?>>sangat baik</option>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Running Speed</label>
                                            <div class="col-md-12">
                                               
                                                <div class="modal fade" id="modalRunningspeed" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Panduan</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="<?php echo base_url('uploads/panduan/running.jpg'); ?>" alt="" width="100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <select name="running_speed" class="form-control form-control-line">
                                                    <option value="1" <?php echo (count($kriteria) > 0 && $kriteria[0]['running_speed'] == '1' ? 'selected="selected"' : ''); ?>>sangat kurang</option>
                                                    <option value="2" <?php echo (count($kriteria) > 0 && $kriteria[0]['running_speed'] == '2' ? 'selected="selected"' : ''); ?>>kurang</option>
                                                    <option value="3" <?php echo (count($kriteria) > 0 && $kriteria[0]['running_speed'] == '3' ? 'selected="selected"' : ''); ?>>cukup</option>
                                                    <option value="4" <?php echo (count($kriteria) > 0 && $kriteria[0]['running_speed'] == '4' ? 'selected="selected"' : ''); ?>>baik</option>
                                                    <option value="5" <?php echo (count($kriteria) > 0 && $kriteria[0]['running_speed'] == '5' ? 'selected="selected"' : ''); ?>>sangat baik</option>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12">Agility</label>
                                            <div class="col-sm-12">
                                               
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="modalLeap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Agility</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="<?php echo base_url('uploads/panduan/agilitynew.jpg'); ?>" alt="" width="100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <select name="agility" class="form-control form-control-line">
                                                    <option value="1" <?php echo (count($kriteria) > 0 && $kriteria[0]['agility'] == '1' ? 'selected="selected"' : ''); ?>>sangat kurang</option>
                                                    <option value="2" <?php echo (count($kriteria) > 0 && $kriteria[0]['agility'] == '2' ? 'selected="selected"' : ''); ?>>kurang</option>
                                                    <option value="3" <?php echo (count($kriteria) > 0 && $kriteria[0]['agility'] == '3' ? 'selected="selected"' : ''); ?>>cukup</option>
                                                    <option value="4" <?php echo (count($kriteria) > 0 && $kriteria[0]['agility'] == '4' ? 'selected="selected"' : ''); ?>>baik</option>
                                                    <option value="5" <?php echo (count($kriteria) > 0 && $kriteria[0]['agility'] == '5' ? 'selected="selected"' : ''); ?>>sangat baik</option>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12">Stamina</label>
                                            <div class="col-sm-12">
                                                
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="modalStamina" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Stamina</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="<?php echo base_url('uploads/panduan/staminanew.jpg'); ?>" alt="" width="100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <select name="stamina" class="form-control form-control-line">
                                                    <option value="1" <?php echo (count($kriteria) > 0 && $kriteria[0]['stamina'] == '1' ? 'selected="selected"' : ''); ?>>sangat kurang</option>
                                                    <option value="2" <?php echo (count($kriteria) > 0 && $kriteria[0]['stamina'] == '2' ? 'selected="selected"' : ''); ?>>kurang</option>
                                                    <option value="3" <?php echo (count($kriteria) > 0 && $kriteria[0]['stamina'] == '3' ? 'selected="selected"' : ''); ?>>cukup</option>
                                                    <option value="4" <?php echo (count($kriteria) > 0 && $kriteria[0]['stamina'] == '4' ? 'selected="selected"' : ''); ?>>baik</option>
                                                    <option value="5" <?php echo (count($kriteria) > 0 && $kriteria[0]['stamina'] == '5' ? 'selected="selected"' : ''); ?>>sangat baik</option>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12">Dribble</label>
                                            <div class="col-sm-12">
                                              
                                                <!-- Modal -->
                                                <div class="modal fade" id="modalDribble" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Dribble</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="<?php echo base_url('uploads/panduan/driblenew.jpg'); ?>" alt="" width="100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <select name="dribble" class="form-control form-control-line">
                                                    <option value="1" <?php echo (count($kriteria) > 0 && $kriteria[0]['dribble'] == '1' ? 'selected="selected"' : ''); ?>>sangat kurang</option>
                                                    <option value="2" <?php echo (count($kriteria) > 0 && $kriteria[0]['dribble'] == '2' ? 'selected="selected"' : ''); ?>>kurang</option>
                                                    <option value="3" <?php echo (count($kriteria) > 0 && $kriteria[0]['dribble'] == '3' ? 'selected="selected"' : ''); ?>>cukup</option>
                                                    <option value="4" <?php echo (count($kriteria) > 0 && $kriteria[0]['dribble'] == '4' ? 'selected="selected"' : ''); ?>>baik</option>
                                                    <option value="5" <?php echo (count($kriteria) > 0 && $kriteria[0]['dribble'] == '5' ? 'selected="selected"' : ''); ?>>sangat baik</option>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12">Shooting Accuracy</label>
                                            <div class="col-sm-12">
                                                
                                               
                                                <!-- Modal -->
                                                <div class="modal fade" id="modalShooting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Shooting Accuracy</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="<?php echo base_url('uploads/panduan/shootingnew.jpg'); ?>" alt="" width="100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <select name="shooting_accuracy" class="form-control form-control-line">
                                                    <option value="1" <?php echo (count($kriteria) > 0 && $kriteria[0]['shooting_accuracy'] == '1' ? 'selected="selected"' : ''); ?>>sangat kurang</option>
                                                    <option value="2" <?php echo (count($kriteria) > 0 && $kriteria[0]['shooting_accuracy'] == '2' ? 'selected="selected"' : ''); ?>>kurang</option>
                                                    <option value="3" <?php echo (count($kriteria) > 0 && $kriteria[0]['shooting_accuracy'] == '3' ? 'selected="selected"' : ''); ?>>cukup</option>
                                                    <option value="4" <?php echo (count($kriteria) > 0 && $kriteria[0]['shooting_accuracy'] == '4' ? 'selected="selected"' : ''); ?>>baik</option>
                                                    <option value="5" <?php echo (count($kriteria) > 0 && $kriteria[0]['shooting_accuracy'] == '5' ? 'selected="selected"' : ''); ?>>sangat baik</option>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12">Passing Accuracy</label>
                                            <div class="col-sm-12">
                                                
                                             
                                                <!-- Modal -->
                                                <div class="modal fade" id="modalPassing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Passing Accuracy</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="<?php echo base_url('uploads/panduan/passingnew.jpg'); ?>" alt="" width="100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <select name="passing_accuracy" class="form-control form-control-line">
                                                    <option value="1" <?php echo (count($kriteria) > 0 && $kriteria[0]['passing_accuracy'] == '1' ? 'selected="selected"' : ''); ?>>sangat kurang</option>
                                                    <option value="2" <?php echo (count($kriteria) > 0 && $kriteria[0]['passing_accuracy'] == '2' ? 'selected="selected"' : ''); ?>>kurang</option>
                                                    <option value="3" <?php echo (count($kriteria) > 0 && $kriteria[0]['passing_accuracy'] == '3' ? 'selected="selected"' : ''); ?>>cukup</option>
                                                    <option value="4" <?php echo (count($kriteria) > 0 && $kriteria[0]['passing_accuracy'] == '4' ? 'selected="selected"' : ''); ?>>baik</option>
                                                    <option value="5" <?php echo (count($kriteria) > 0 && $kriteria[0]['passing_accuracy'] == '5' ? 'selected="selected"' : ''); ?>>sangat baik</option>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-success">Send</button>
                                                </disv>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- </form> -->
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