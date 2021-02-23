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
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
 
    <!-- Waves Effect Css -->
    <link href="../assets/plugins/node-waves/waves.css" rel="stylesheet" />
     
    <!-- Animation Css -->
    <link href="../assets/plugins/animate-css/animate.css" rel="stylesheet" />
    
    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="../assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.dataTables.min.css"></script>
    <!-- Custom Css -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../assets/css/themes/all-themes.css" rel="stylesheet" />
    
    <link href="../assets/css/card_custom.css" rel="stylesheet" /> 

    <link href="../assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    
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
  
    <!-- Jquery DataTable Plugin Js -->
    <script src="../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
     
    <script src="../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.colVis.min.js"></script>

    <!-- Custom Js -->
    <script src="../assets/js/admin.js"></script>
    <script src="../assets/plugins/bootstrap-notify/bootstrap-notify.js"></script> 
    
    <script src="../assets/plugins/autosize/autosize.js"></script>
    <script src="../assets/js/pages/ui/notifications.js"></script>
    <script src="../assets/plugins/momentjs/moment.js"></script>
    
    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="../assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <script src="../assets/js/pages/forms/basic-form-elements.js"></script>
    <script src="../assets/js/demo.js"></script>

    <!-- <link href="../assets/css/themes/all-themes.css" rel="stylesheet" /> -->
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
                        //  if($hak_akses==0 || $hak_akses==1 || $hak_akses==2 || $hak_akses==3 || $hak_akses==4){
                        //     echo '
                        //     <li>
                        //     <a href="index.php?navigasi=bagian&crud=view">
                        //         <i class="material-icons">home</i>
                        //         <span>Bagian</span>
                        //     </a>
                        //    </li>';
 

                        // }
                        // if($hak_akses==0 || $hak_akses==1 || $hak_akses==2 || $hak_akses==3 || $hak_akses==4){
                        //     echo '
                        //     <li>
                        //     <a href="index.php?navigasi=unit_kerja&crud=view">
                        //         <i class="material-icons">home</i>
                        //         <span>Unit Kerja</span>
                        //     </a>
                        //    </li>'; 
                        // }
                      
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
                                <?php 
                                    echo "<p style='text-align:center;text-transform:uppercase;font-weight:bold;'>".str_replace("_"," ",$_GET['navigasi'])."<p>";
                                ?>
                            </h2>
                           
                        </div>
                        <div class="body"> 
                        <?php
                			
                            include_once "../include/navigasi/navigasi.php";
                                        
                        ?>
                        </div>
                            
                          
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Body Copy -->
        </div>
    </section>
 
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
       
    </script>