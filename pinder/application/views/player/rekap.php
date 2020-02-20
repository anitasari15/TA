<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    
    // foreach($player_male as $p){
    //     echo $p->player_id;
    // }

    // die();

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
                            
                                <a href="<?php echo base_url(); ?>index.php/dashboard/Player/tampilRekap" class="btn pull-right hidden-sm-down btn-success"> Rekap Assessment</a>

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
                                            
                                            <?php if($this->session->userdata('user_role') == '1') { ?>
                                            <?php if(checkAssessment()){ ?>
                                            <?php if(count($players) < 5){ ?>

                                            <a href="<?php echo base_url(); ?>index.php/dashboard/player/createbio_male" class="btn pull-right hidden-sm-down btn-success"> Add Bio Player</a>
                                            
                                            <?php } ?>
                                            <?php } ?>
                                            
                                            <?php } ?>
                                            <h4 class="card-title">Player List</h4>
                                            <div class="table-responsive m-t-40">
                                                <table class="table stylish-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Player</th>
                                                            <th>School</th>
                                                            <th>Gender</th>
                                                            <th>Born</th>
                                                            <th>Player Origin</th>
                                                            <th>Weight</th>
                                                            <th>Height</th>
                                                            <th colspan="2">Status</th>
                                                            <!-- <th>Possible Positions</th> -->
                                                            <!-- <th>Confirmation Player</th> -->
                                                            <?php if($this->session->userdata('user_role') == '2') { ?>
                                                            <th>Action</th>
                                                            <?php } ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if(count($player_male) > 0) { ?>
                                                        <?php $i=0; ?>
                                                        <?php foreach($player_male as $player) { ?>
                                                        <?php $assessment=$this->db->get_where('tb_assessment', array('player_id'=>$player->player_id))->result();
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $player->player_fullname; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $player->player_origin; ?>
                                                            </td>
                                                            

                                                            <td><?php echo $player->player_gender; ?></td>
                                                            <td><?php echo $player->born; ?></td>
                                                            <td><?php echo $player->player_origin; ?></td>
                                                            <td><?php echo $player->player_weight; ?> kg</td>
                                                            <td><?php echo $player->player_height; ?> cm</td>
                                                            <!-- <td><?php echo $player->player_note; ?> cm</td> -->
                                                            <?php if($this->session->userdata('user_role') == '2' && $player->player_status=="Belum Dikonfirmasi") { ?>
                                                            <td>
                                                                <a href="<?php echo base_url(); ?>index.php/dashboard/player/proses_ditolak/<?php echo $player->player_id; ?>"><button class="btn btn-danger btn-sm">Ditolak</button></a>
                                                                
                                                                
                                                                <a href="<?php echo base_url(); ?>index.php/dashboard/player/proses_diterima/<?php echo $player->player_id; ?>"><button class="btn btn-success btn-sm">Terima</button></a>
                                                            </td>
                                                            
                                                            <?php } else { ?>
                                                            <td><?php echo $player->player_status; ?></td>
                                                            <?php } ?>
                                                            
                                                            <?php if($this->session->userdata('user_role') == '1' ) { ?>
                                                            
                                                                <?php if($player->player_status=="Belum Dikonfirmasi") { ?>
                                                                    <td>

                                                                    <a href="<?php echo base_url(); ?>index.php/dashboard/player/update/<?php echo $player->player_id; ?>"><button class="btn btn-success btn-sm">Update</button></a>
                                                                    <a href="<?php echo base_url(); ?>index.php/dashboard/player/process_delete/<?php echo $player->player_id; ?>"><button class="btn btn-danger btn-sm">Delete</button></a>
                                                                    </td>
                                                                <?php } else if ($player->player_status=="ditolak") { ?>
                                                                    <td><a href="<?php echo base_url(); ?>index.php/dashboard/player/process_delete/<?php echo $player->player_id; ?>"><button class="btn btn-danger btn-sm">Delete</button></a>
                                                                    </td></td>
                                                                <?php } else { ?>
                                                                    </td></td>
                                                                <?php } ?>
                                                            <?php } else { ?>
                                                            <!-- <td>
                                                            <a href="<?php echo base_url(); ?>index.php/dashboard/player/validasi/<?php echo $player->player_id; ?>"><button class="btn btn-success btn-sm">Validasi</button></a>
                                                            </td> -->
                                                            <?php } ?>
                                                            
                                                            <?php if($this->session->userdata('user_role') == '1' && $player->player_status=="diterima") { ?>
                                                            <td>
                                                                <?php if(count($assessment)>0){ ?>
                                                                
                                                                sudah dinilai
                                                                
                                                                <?php } else { ?>

                                                                
                                                                <?php if(checkAssessment()){ ?>

                                                                <a href="<?php echo base_url(); ?>index.php/dashboard/player/create/<?php echo $player->player_id; ?>" class="btn pull-right hidden-sm-down btn-success"> Add Assessment</a></a>
                                                                
                                                                <?php } ?>

                                                                <?php } ?>
                                                                    
                                                            </td>
                                                            <?php } else { ?>
                                                            <td></td>
                                                            <?php } ?>
                                                            <td>
                                                                 <button style="float: right;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $i; ?>">Berkas</button>

                                                                 <div class="modal fade" id="modal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="modal<?php echo $i; ?>" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="modal<?php echo $i; ?>">Berkas Persyaratan</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                
                                                                                <img src="<?php echo base_url('uploads/avatar/' . $player->player_avatar); ?>" alt="" width="200px">
        
                                                                                <img src="<?php echo base_url('uploads/card/'. $player->player_card); ?>" alt="" width="300px">

                                                                                <img src="<?php echo base_url('uploads/card/'. $player->birth_certificate); ?>" alt="" width="300px">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        
                                                        <?php $i++; ?>
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
                                            
                                            <?php if($this->session->userdata('user_role') == '1') { ?>
                                            <?php if(checkAssessment()){ ?>
                                            <?php if(count($players2) < 5){ ?>

                                            <a href="<?php echo base_url(); ?>index.php/dashboard/player/createbio_female" class="btn pull-right hidden-sm-down btn-success"> Add Bio Player</a>
                                            
                                            <?php } ?>
                                            <?php } ?>
                                            
                                            <?php } ?>
                                            <h4 class="card-title">Player List</h4>
                                            <div class="table-responsive m-t-40">
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
                                                <table class="table stylish-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Player</th>
                                                            <th>School</th>
                                                            <th>Gender</th>
                                                            <th>Born</th>
                                                            <th>Player Origin</th>
                                                            <th>Weight</th>
                                                            <th>Height</th>
                                                            <th>Status</th>
                                                            <!-- <th>Possible Positions</th> -->
                                                            <!-- <th>Confirmation Player</th> -->
                                                            <?php if($this->session->userdata('user_role') == '2') { ?>
                                                            <th>Action</th>
                                                            <?php } ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if(count($player_female) > 0) { ?>
                                                        <?php foreach($player_female as $player) { ?>
                                                        <?php $assessment=$this->db->get_where('tb_assessment', array('player_id'=>$player->player_id))->result();
                                                        ?>
                                                        <tr>

                                                            <td>
                                                                <?php echo $player->player_fullname; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $player->player_origin; ?>
                                                            </td>
                                                            

                                                            <td><?php echo $player->player_gender; ?></td>
                                                            <td><?php echo $player->born; ?></td>
                                                            <td><?php echo $player->player_origin; ?></td>
                                                            <td><?php echo $player->player_weight; ?> kg</td>
                                                            <td><?php echo $player->player_height; ?> cm</td>
                                                            <?php if($this->session->userdata('user_role') == '2' && $player->player_status=="Belum Dikonfirmasi") { ?>
                                                            <td>
                                                                <a href="<?php echo base_url(); ?>index.php/dashboard/player/proses_ditolak/<?php echo $player->player_id; ?>"><button class="btn btn-danger btn-sm">Ditolak</button></a>
                                                                
                                                                
                                                                <a href="<?php echo base_url(); ?>index.php/dashboard/player/proses_diterima/<?php echo $player->player_id; ?>"><button class="btn btn-success btn-sm">Terima</button></a>
                                                            </td>
                                                            
                                                            <?php } else { ?>
                                                            <!-- <td><?php echo $player->player_status; ?></td> -->
                                                            <?php } ?>
                                                            <?php if($this->session->userdata('user_role') == '1' && $player->player_status=="diterima") { ?>
                                                            <td>
                                                                <?php if(count($assessment)>0){ ?>
                                                                
                                                                sudah dinilai
                                                                
                                                                <?php } else { ?>

                                                                
                                                                <?php if(checkAssessment()){ ?>

                                                                <a href="<?php echo base_url(); ?>index.php/dashboard/player/create/<?php echo $player->player_id; ?>" class="btn pull-right hidden-sm-down btn-success"> Add Assessment</a></a>
                                                                
                                                                <?php } ?>

                                                                <?php } ?>
                                                                    
                                                            </td>
                                                            <?php } ?>
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