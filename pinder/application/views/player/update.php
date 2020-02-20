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
                        <?php echo $this->session->userdata('user_fullname'); ?> <!-- tampil nama user ambil dari kolom user -->  
                        <!-- <img src="" alt="<?php echo $this->session->userdata('user_fullname'); ?>" class="dark-logo" /> -->
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
                <?php foreach($player as $value) { ?>
                <form action="<?php echo base_url(); ?>index.php/dashboard/player/process_update" method="POST" enctype="multipart/form-data" class="form-horizontal form-material">
                    <input type="hidden" name="player_id" value="<?php echo $value->player_id; ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header" style="background-color: #fafafa;">
                                    <h4 class="header-title">Update Player</h4>
                                </div>
                                <div class="card-block">
                                    <div class="form-group">
                                        <label class="col-md-12">Player Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="player_fullname" placeholder="" class="form-control form-control-line" required="required" value="<?php echo $value->player_fullname; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Gender</label>
                                        <div class="col-md-12">
                                            <input type="text" name="player_gender" placeholder="" class="form-control form-control-line" required="required" value="<?php echo $value->player_gender; ?>" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Tanggal Lahir</label>
                                        <div class="col-md-12">
                                            <input type="date" name="born" placeholder="" class="form-control form-control-line" step="1" required="required" value="<?php echo $value->born; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">School</label>
                                        <div class="col-md-12">
                                            <input type="text" name="player_origin" placeholder="" class="form-control form-control-line" value="<?php echo str_replace('Pelatih ', '', $this->session->userdata('user_title')); ?>" required="required" readonly="readonly">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Periode</label>
                                        <div class="col-md-12">
                                            <input type="text" name="periode" placeholder="" class="form-control form-control-line" value="<?php echo date('Y', time()) ?>" required="required" readonly="readonly">
                                        </div>
                                    </div>

                                  <!--   <div class="form-group">
                                        <label class="col-md-12">No Kartu Pelajar</label>
                                        <div class="col-md-12">
                                            <input type="number" name="player_card" placeholder="" class="form-control form-control-line" step="1" required="required" value="<?php echo $value->player_card; ?>">
                                        </div>
                                    </div>
                                     -->

                                    <div class="form-group">
                                        <label class="col-md-12">Weight (kg)</label>
                                        <div class="col-md-12">
                                            <input type="number" name="player_weight" placeholder="" class="form-control form-control-line" step="1" required="required" value="<?php echo $value->player_weight ;?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Height (centimeter)</label>
                                        <div class="col-md-12">
                                            <input type="number" name="player_height" placeholder="" class="form-control form-control-line" step="1" required="required" value="<?php echo $value->player_height; ?>">
                                        </div>
                                    </div>

                                    
                                    <!-- <div class="form-group">
                                        <label class="col-md-12">Note</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" name="player_note" class="form-control form-control-line" value="<?php echo $value->player_note; ?>"></textarea>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-md-12">Ganti Pas Foto Pemain</label>
                                        <div class="col-md-12">
                                            <input type="file" name="player_avatar" class="form-control form-control-line"  value="<?php echo $value->player_avatar; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Ganti Kartu Pelajar</label>
                                        <div class="col-md-12">
                                            <input type="file" name="player_card" class="form-control form-control-line"  value="<?php echo $value->player_card; ?> ">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Ganti Akte Kelahiran</label>
                                        <div class="col-md-12">
                                            <input type="file" name="birth_certificate" class="form-control form-control-line"  value="<?php echo $value->birth_certificate ;  ?>">
                                        </div>
                                    </div>

                                    

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Update</button>
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
