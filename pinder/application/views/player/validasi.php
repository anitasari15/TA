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
                <?php foreach($player as $value) { ?>
                <form class="form-horizontal form-material">
                    <input type="hidden" name="player_id" value="<?php echo $value->player_id; ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header" style="background-color: #fafafa;">
                                    <h4 class="header-title">validasi</h4>
                                </div> 
                                <div class="card-block">
                                    <div class="form-group">
                                        <label class="col-md-12">Player Full Name</label>
                                        <div class="col-md-12">
                                            <?php echo $value->player_fullname; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Gender</label>
                                        <div class="col-md-12">
                                            <?php echo $value->player_gender; ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Tanggal Lahir</label>
                                        <div class="col-md-12">
                                            <?php echo $value->born; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">School</label>
                                        <div class="col-md-12">
                                           <?php echo $value->player_origin; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Periode</label>
                                        <div class="col-md-12">
                                            <?php echo date('Y', time()) ?>
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
                                            <?php echo $value->player_weight ;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Height (centimeter)</label>
                                        <div class="col-md-12">
                                            <?php echo $value->player_height; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Pas Foto Pemain</label>
                                        <div class="col-md-12">
                                            <a href="<?php echo base_url('uploads/avatar/' . $value->player_avatar); ?>" target="_blank"><img src="<?php echo base_url('uploads/avatar/' . $value->player_avatar); ?>" width="100" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Kartu Pelajar</label>
                                        <div class="col-md-12">
                                            <a href="<?php echo base_url('uploads/card/' . $value->player_card); ?>" target="_blank"><img src="<?php echo base_url('uploads/card/' . $value->player_card); ?>" width="100" alt=""></a>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Akte Kelahiran</label>
                                        <div class="col-md-12">
                                            <a href="<?php echo base_url('uploads/card/' . $value->birth_certificate); ?>" target="_blank"><img src="<?php echo base_url('uploads/card/' . $value->birth_certificate); ?>" width="100" alt=""></a>
                                        </div>
                                    </div>

                                     <!-- <div class="form-group">
                                        <label class="col-md-12">Note</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" name="player_note" class="form-control form-control-line" value="<?php echo $value->player_note; ?>" readonly="readonly"></textarea>
                                        </div>
                                    </div> -->
                                    <label class="col-md-12">Note</label>
                                        <div class="col-md-12">
                                            <textarea id="player_note" rows="5" name="player_note" class="form-control form-control-line"></textarea>
                                        </div>

                                    

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="ditolak('<?php echo $value->player_id; ?>')">Ditolak</button>
                                            
                                            <button type="button" class="btn btn-success btn-sm" onclick="diterima('<?php echo $value->player_id; ?>')">Terima</button>
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

    <script>
        $(document).ready(function() {
            ditolak = function(player_id) {
                var note = $('#player_note').val();

                $.ajax({
                    method: "POST",
                    url: "<?php echo site_url('dashboard/player/validasi_player'); ?>",
                    data: "player_id=" + player_id + "&status=ditolak&note=" + note,
                    dataType: 'html',
                    success: function(res) {
                        document.location.href = "<?php echo site_url('dashboard/player'); ?>";
                    }
                })
            }

            diterima = function(player_id) {
                var note = $('#player_note').val();

                $.ajax({
                    method: "POST",
                    url: "<?php echo site_url('dashboard/player/validasi_player'); ?>",
                    data: "player_id=" + player_id + "&status=diterima&note=" + note,
                    dataType: 'html',
                    success: function(res) {
                        document.location.href = "<?php echo site_url('dashboard/player'); ?>";
                    }
                })
            }
        })
    </script>
    
</body>

</html>
