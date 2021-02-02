<?php
    include_once "../koneksi.php";
    include_once "../include/kontrol/cek_user.php";
    $username=$data_user['user_name'];
    $hak_akses=$data_user['hak_akses'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>:: Sistem Aplikasi Penilaian Kinerja Dengan Metode TOPSIS ::</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="../assets/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../assets/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Mohon Tunggu...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html"> SPK - TOPSIS </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                 
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
           
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">Menu Utama  </li>
                    <br>
                    <div align="center">
                    <button type="button" id="logout" class="btn btn-lg btn-danger"> Logout </button>
                    </div>
                     
                    <li a href="javascript::void(0);"></li>
                    <?php
                        if($hak_akses==0 || $hak_akses==1 || $hak_akses==2 || $hak_akses==3 || $hak_akses==4){
                            echo '
                            <li>
                            <a href="index.php?navigasi=dashboard">
                                <i class="material-icons">home</i>
                                <span>Dashboard</span>
                            </a>
                           </li>';

                        }
                         if($hak_akses==0 || $hak_akses==1 || $hak_akses==2 || $hak_akses==3 || $hak_akses==4){
                            echo '
                            <li>
                            <a href="index.php?navigasi=bagian&crud=view">
                                <i class="material-icons">home</i>
                                <span>Bagian</span>
                            </a>
                           </li>';
 

                        }
                        if($hak_akses==0 || $hak_akses==1 || $hak_akses==2 || $hak_akses==3 || $hak_akses==4){
                            echo '
                            <li>
                            <a href="index.php?navigasi=toko&crud=view">
                                <i class="material-icons">home</i>
                                <span>Toko</span>
                            </a>
                           </li>'; 
                        }
                      
                         if($hak_akses==0 || $hak_akses==1 || $hak_akses==2 || $hak_akses==3 || $hak_akses==4){
                            echo '
                            <li>
                            <a href="index.php?navigasi=kriteria&crud=view">
                                <i class="material-icons">home</i>
                                <span>Kriteria</span>
                            </a>
                           </li>'; 
                           
                        }
                         if($hak_akses==0 || $hak_akses==1 || $hak_akses==2 || $hak_akses==3 || $hak_akses==4){
                            echo '
                            <li>
                            <a href="index.php?navigasi=pegawai&crud=view">
                                <i class="material-icons">home</i>
                                <span>Pegawai</span>
                            </a>
                           </li>';  

                        }
                         if($hak_akses==0 || $hak_akses==1 || $hak_akses==2 || $hak_akses==3 || $hak_akses==4){
                            echo '
                            <li>
                            <a href="index.php?navigasi=jabatan_pegawai&crud=view">
                                <i class="material-icons">home</i>
                                <span> Jabatan Pegawai</span>
                            </a>
                           </li>';  

                        }
                         if($hak_akses==0 || $hak_akses==1 || $hak_akses==2 || $hak_akses==3 || $hak_akses==4){
                            echo '
                            <li>
                            <a href="index.php?navigasi=bobot_penilaian&crud=view">
                                <i class="material-icons">home</i>
                                <span> Bobot Penilaian</span>
                            </a>
                           </li>';  
                          
                        }
                         if($hak_akses==0 || $hak_akses==1 || $hak_akses==2 || $hak_akses==3 || $hak_akses==4){
                            echo '
                            <li>
                            <a href="index.php?navigasi=penilaian&crud=view">
                                <i class="material-icons">home</i>
                                <span> Penilaian</span>
                            </a>
                           </li>';  
                        }
                         if($hak_akses==0 || $hak_akses==1 || $hak_akses==2 || $hak_akses==3 || $hak_akses==4){
                            echo '
                            <li>
                            <a href="index.php?navigasi=usulan_pegawai_terbaik&crud=view">
                                <i class="material-icons">home</i>
                                <span> Usulan Pegawai Terbaik </span>
                            </a>
                           </li>';   
                        }
                        if($hak_akses==0 || $hak_akses==2){
                            
                            echo '
                                    <li>
                                    <a href="index.php?navigasi=user&crud=view">
                                        <i class="material-icons">home</i>
                                        <span> User </span>
                                    </a>
                                   </li>';   

                        }
                         if($hak_akses==0 || $hak_akses==1 || $hak_akses==2 || $hak_akses==3 || $hak_akses==4){
                            echo '
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Laporan Penilaian<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">';
                                if($hak_akses==0 || $hak_akses==1 || $hak_akses==2 || $hak_akses==3 || $hak_akses==4){
                                    echo '
                                    <li>
                                    <a href="index.php?navigasi=laporan_penilaian_pegawai&crud=view">
                                        <i class="material-icons">home</i>
                                        <span> Penilaian Pegawai </span>
                                    </a>
                                   </li>';   
                                }
                                if ($hak_akses==0 || $hak_akses==1 || $hak_akses==2 || $hak_akses==3 || $hak_akses==4){
                                    echo '
                                    <li>
                                    <a href="index.php?navigasi=history_usulan_pegawai_terbaik&crud=view">
                                        <i class="material-icons">home</i>
                                        <span> History Usulan Pegawai Terbaik </span>
                                    </a>
                                   </li>';   
                                }
                            echo '    </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            ';

                        }
                        
                    ?> 
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
             
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" >
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink"  >
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue" class="active">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2> </h2>
            </div>
  <!-- Body Copy -->
  <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Dashboard
                            </h2>
                           
                        </div>
                        <div class="body">
                            <p class="lead">
                                Selamat Datang 
                            </p>
                          
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Body Copy -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../assets/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="../assets/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="../assets/plugins/raphael/raphael.min.js"></script>
    <script src="../assets/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="../assets/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="../assets/plugins/flot-charts/jquery.flot.js"></script>
    <script src="../assets/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="../assets/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="../assets/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="../assets/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="../assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="../assets/js/admin.js"></script>
    <script src="../assets/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="../assets/js/demo.js"></script>
</body>

</html>

 
<script>
    $("#logout").on("click",function(){
        $.ajax({
                        type: "POST",
                        url: "../include/kontrol/login.php",
                        data: "type=logout",
                        success: function (respons) {
                            console.log(respons);
                            if (respons == 'true') {
                                    alert('Anda telah logout!');
	                      
                                window.location = "login.php";
                            }
                            else {
                                $("#konfirmasi_login").html(respons);
                            }
                        }
                    })
    });
        // $(document).ready(function () {
        //     $("#logout").click(function () {
        //             $.ajax({
        //                 type: "POST",
        //                 url: "../include/kontrol/login.php",
        //                 data: "type=logout",
        //                 success: function (respons) {
        //                     console.log(respons);
        //                     if (respons == 'true') {
                            
        //                         window.location = "login.php";
        //                     }
        //                     else {
        //                         $("#konfirmasi_login").html(respons);
        //                     }
        //                 }
        //             })
        //         });
        // });
    </script>