<?php
session_start();


include "koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$id = $_SESSION['id'];
$sql = mysqli_query($conn, "SELECT * from mahasiswa where id_mahasiswa='$id';");
$sql2 = mysqli_query($conn, "SELECT * from beasiswa where id_beasiswa='$id'");

$q = $sql2->fetch_assoc();
$d = $sql->fetch_assoc();


$page = $_GET['page'];
$action = $_GET['action'];
$nama = $_GET['name'];      
$sub = $_GET['sub'];

$cross = "verify";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-90680653-2');
    </script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <!-- <meta name="twitter:site" content="@bootstrapdash">
    <meta name="twitter:creator" content="@bootstrapdash">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Azia">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="https://www.bootstrapdash.com/azia/img/azia-social.png"> -->

    <!-- Facebook -->
    <!-- <meta property="og:url" content="https://www.bootstrapdash.com/azia">
    <meta property="og:title" content="Azia">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="https://www.bootstrapdash.com/azia/img/azia-social.png">
    <meta property="og:image:secure_url" content="https://www.bootstrapdash.com/azia/img/azia-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600"> -->

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <title>Azia Responsive Bootstrap 4 Dashboard Template</title>

    <!-- vendor css -->
    <link href="template/lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="template/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="template/lib/typicons.font/typicons.css" rel="stylesheet">
    <link rel="shortcut icon" href="template/img/favicon.png" />

    <!-- azia CSS -->
    <link rel="stylesheet" href="template/css/azia.css">

</head>

<body id="printed">

    <div class="az-header">
        <div class="container">
            <div class="az-header-left">
                <a href="index2.php" class="az-logo"><span></span> Beasiswa </a>
                <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
            </div><!-- az-header-left -->
            <div class="az-header-menu">
                <div class="az-header-menu-header">
                    <a href="index.html" class="az-logo"><span></span> azia</a>
                    <a href="" class="close">&times;</a>
                </div><!-- az-header-menu-header -->
                <ul class="nav">
                    <li class="nav-item active show">
                        <a href="index.html" class="nav-link"><i class="typcn typcn-chart-area-outline"></i>
                            Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i> Pages</a>
                        <nav class="az-menu-sub">
                            <a href="template/template/page-signin.php" class="nav-link">Sign In</a>
                            <a href="page-signup.html" class="nav-link">Sign Up</a>
                        </nav>
                    </li>
                    <li class="nav-item">
                        <a href="chart-chartjs.html" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i>
                            Charts</a>
                    </li>
                    <li class="nav-item">
                        <a href="form-elements.html" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i>
                            Forms</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link with-sub"><i class="typcn typcn-book"></i> Components</a>
                        <div class="az-menu-sub">
                            <div class="container">
                                <div>
                                    <nav class="nav">
                                        <a href="elem-buttons.html" class="nav-link">Buttons</a>
                                        <a href="elem-dropdown.html" class="nav-link">Dropdown</a>
                                        <a href="elem-icons.html" class="nav-link">Icons</a>
                                        <a href="table-basic.html" class="nav-link">Table</a>
                                    </nav>
                                </div>
                            </div><!-- container -->
                        </div>
                    </li>
                </ul>
            </div><!-- az-header-menu -->
            <div class="az-header-right">
                <a href="https://www.bootstrapdash.com/demo/azia-free/docs/documentation.html" target="_blank"
                    class="az-header-search-link"><i class="far fa-file-alt"></i></a>
                <a href="" class="az-header-search-link"><i class="fas fa-search"></i></a>
                <div class="az-header-message">
                    <a href="#" class=""><i class="typcn typcn-messages"></i></a>
                </div><!-- az-header-message -->
                <div class=" dropdown az-header-notification">
                    <a href="" class="
                    <?php
                    if($_SESSION['name'] == "admin"){

                        $sql4 = mysqli_query($conn, "SELECT * from mahasiswa INNER JOIN beasiswa ON mahasiswa.id_mahasiswa = beasiswa.id_beasiswa where status=0");
                        $r = mysqli_num_rows($sql4);
                        if($r > 0){
                         echo "new";
                        }
                    }
                    ?>"><i class="typcn typcn-bell"></i></a>
                    <div class="dropdown-menu">
                        <div class="az-dropdown-header mg-b-20 d-sm-none">
                            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                        </div>
                        <h6 class="az-notification-title">Notifications</h6>
                        <!-- <p class="az-notification-text">You have 2 unread notification</p> -->
                        <div class="az-notification-list">
                            <?php
                            if($_SESSION['name'] == "admin"){
                                
                                $sql3 = mysqli_query($conn, "SELECT * from mahasiswa INNER JOIN beasiswa ON mahasiswa.id_mahasiswa = beasiswa.id_beasiswa");
                                 while ($n = $sql3->fetch_assoc()){
                                    if($n['status'] == 0 ){
                            ?>
                            <div class="media">
                                <div class="media-body">
                                    <p><strong> <?= $n['nama']?></strong> Requested <?= $n['beasiswa']?></p>
                                    <span><?= $n['date']?></span>
                                </div><!-- media-body -->
                            </div><!-- media -->
                            <?php
                                    }
                                }
                            } 
                        ?>
                        </div><!-- az-notification-list -->
                        <div class="dropdown-footer"><a href="">View All Notifications</a></div>
                    </div><!-- dropdown-menu -->
                </div><!-- az-header-notification -->
                <div class="dropdown az-profile-menu">
                    <a href="" class="az-img-user"><img src="template/img/faces/face1.jpg" alt=""></a>
                    <div class="dropdown-menu">
                        <div class="az-dropdown-header d-sm-none">
                            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                        </div>
                        <div class="az-header-profile">
                            <div class="az-img-user">
                                <img src="template/img/faces/face1.jpg" alt="">
                            </div><!-- az-img-user -->
                            <h6><?= $_SESSION['email']?></h6>
                            <span>Premium Member</span>
                        </div><!-- az-header-profile -->

                        <a href="" class="dropdown-item"><i class="typcn typcn-user-outline"></i> My Profile</a>
                        <a href="" class="dropdown-item"><i class="typcn typcn-edit"></i> Edit Profile</a>
                        <a href="" class="dropdown-item"><i class="typcn typcn-time"></i> Activity Logs</a>
                        <a href="" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Account
                            Settings</a>
                        <a href="logout.php" class="dropdown-item"><i class="typcn typcn-power-outline"></i>
                            Sign
                            Out</a>
                    </div><!-- dropdown-menu -->
                </div>
            </div><!-- az-header-right -->
        </div><!-- container -->
    </div><!-- az-header -->

    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-dashboard-title">Hi, welcome back! <?php echo $_SESSION['name']?></h2>
                        <p class="az-dashboard-text">Your web analytics dashboard template.</p>
                    </div>
                    <div class="az-content-header-right">
                        <div class="media">
                            <div class="media-body">
                                <label>Start Date</label>
                                <h6>Oct 10, 2018</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->
                        <div class="media">
                            <div class="media-body">
                                <label>End Date</label>
                                <h6>Oct 23, 2018</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->
                        <div class="media">
                            <div class="media-body">
                                <label>Event Category</label>
                                <h6>All Categories</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->
                        <a href="" class="btn btn-purple">Export</a>
                    </div>
                </div><!-- az-dashboard-one-title -->
                <!-- //* card background background-color: rgb(187, 208, 255); -->
                <?php 
                if ($_SESSION['name'] == "admin"){
                  ?>
                <div class="row ">
                    <div class="col" style="">
                        <div class="card border-purple" style="border-radius: 12px; ">
                            <div class="card-body">
                                <div class="row align-items-center ">
                                    <div class="col-2 "><i class="fa fa-user fa-4x"></i></div>
                                    <div class="col-1"></div>
                                    <div class="col-8 fs-2">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="m-0 font-weight-bold active show " style="font-size: 22px">
                                                    Data
                                                    Mahasiswa
                                                </p>
                                            </div>
                                            <div class="col">
                                                <span class="text-start ">
                                                    <?php
                            $sql = mysqli_query($conn, "SELECT COUNT(*) as count FROM mahasiswa;");
                            $c = $sql->fetch_assoc();
                            echo $c["count"]." "."mahasiswa";
                        ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col" style="">
                        <div class="card border-purple" style="border-radius: 12px; ">
                            <div class="card-body">
                                <div class="row align-items-center ">
                                    <div class="col-2 "><i class="fa fa-graduation-cap fa-4x"></i></div>
                                    <div class="col-1"></div>
                                    <div class="col-8 fs-2">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="m-0 font-weight-bold" style="font-size: 22px">Data
                                                    Beasiswa
                                                </p>
                                            </div>
                                            <div class="col">
                                                <span class="text-start ">
                                                    <?php
                            $sql = mysqli_query($conn, "SELECT COUNT(*) as count FROM beasiswa;");
                            $c = $sql->fetch_assoc();
                            echo $c["count"]." "."beasiswa";
                        ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col" style="">
                        <div class="card border-purple" style="border-radius: 12px; ">
                            <div class="card-body">
                                <div class="row align-items-center ">
                                    <div class="col-2 "><i class="fa fa-business-time fa-4x"></i></div>
                                    <div class="col-1"></div>
                                    <div class="col-8 fs-2">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="m-0 font-weight-bold" style="font-size: 22px">Quota
                                                    Beasiswa
                                                </p>
                                            </div>
                                            <div class="col">
                                                <span class="text-start ">
                                                    <?php
                            $sql = mysqli_query($conn, "SELECT COUNT(*) as count FROM beasiswa;");
                            $c = $sql->fetch_assoc();
                            echo $c["count"]." "."/ 10 Beasiswa";
                        ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>

                <div class="az-dashboard-nav mt-4">
                    <nav class="nav">
                        <a class="nav-link 
                <?php
                if ($page == "" || $page == "mahasiswa" || $page == "session" && $sub == mahasiswa){
                    echo "font-weight-bold active";
                }
                ?>" href="
			  <?php 
			  if($_SESSION['name'] == "admin"){
				echo "?page=mahasiswa";
				}else{
					echo "?page=session&sub=mahasiswa";
				} ?>">Data Mahasiswa</a>
                        <?php 
			  if($_SESSION['name'] == "admin"){
                ?>
                        <a class="nav-link <?php
                if ($page == "daftar"){
                    echo "font-weight-bold active";
                }
                ?>" href="?page=daftar">Daftar Beasiswa</a>
                        <?php
				}?>

                        <a class="nav-link     <?php
                if ($page == "beasiswa" || $page == "session" && $sub == beasiswa){
                    echo "font-weight-bold active";
                }
                ?>" href="
			  <?php
			 	if($_SESSION['id'] == $q['id_beasiswa']){
					if($_SESSION['name'] == "admin"){
						echo "?page=beasiswa";
          }
					else{
						echo "?page=session&sub=beasiswa";
					} 
				}elseif($_SESSION['name'] == "admin"){
          echo "?page=beasiswa";
        }else{
					echo "?page=mahasiswa&action=beasiswa&id=".$_SESSION['id'];
				} 
			  ?>">
                            <?php
			  		if($_SESSION['id'] == $q['id_beasiswa']){
						echo "Data Beasiswa";
					} elseif($_SESSION['name'] == 'admin'){
            echo "Data Beasiswa";
          }else{
						echo "Daftar Beasiswa";
					}
			  ?>
                        </a>
                        <a class="nav-link" href="#">More</a>
                    </nav>
                    <textarea id="printing-css" style="display:none;">
    .no-print
        {
            display:none
        }
    @media print 
        {
            @page { 
                size:  210mm 297mm; 
                margin-left:75px; 
                margin-right:75px;
                margin-top:80px; 
                margin-bottom:40px;
            }
        }
        <?php
        include "template/css/azia.css";
        ?>
</textarea>
                    <iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
                    <script type="text/javascript">
                    function printDiv(elementId) {
                        var a = document.getElementById('printing-css').value;
                        var b = document.getElementById(elementId).innerHTML;
                        window.frames["print_frame"].document.title = document.title;
                        window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
                        window.frames["print_frame"].window.focus();
                        window.frames["print_frame"].window.print();
                    }
                    </script>

                    <nav class="nav">
                        <a class="nav-link" href="#"><i class="far fa-save"></i> Save Report</a>
                        <a class="nav-link" href="javascript:printDiv('printed');"><i class="far fa-file-pdf"></i>
                            Export
                            to PDF</a>
                        <a class="nav-link" href="#"><i class="far fa-envelope"></i>Send to Email</a>
                        <a class="nav-link" href="#"><i class="fas fa-ellipsis-h"></i></a>
                    </nav>
                </div>

                <div style="display:none" id="">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa
                    eaque
                    vel
                    eos dicta dolorem cum voluptatum quam pariatur facilis praesentium?</div>


                <!-- //TODO menu here -->

                <?php


    if($page == 'mahasiswa'){
        if ($action == ""){
            include "mahasiswa/mahasiswa.php";
        } elseif($action == "add"){
            include "mahasiswa/tambah.php";
        } elseif($action == "edit"){
            include "mahasiswa/ubah.php";
        }elseif($action == "delete"){
            include "mahasiswa/hapus.php";
        }elseif($action == "verify"){
          include "mahasiswa/verify.php";
        }elseif($action == "beasiswa"){
            include "beasiswa.php";
        }
    } elseif($page == 'beasiswaid'){
        include "beasiswa/beasiswaid.php";
    } elseif($page == 'beasiswa'){
        if($action == ""){
            include "beasiswa/beasiswa.php";
        } elseif($action == "edit"){
            include "beasiswa/ubah.php";
        }elseif($action == "delete"){
            include "beasiswa/hapus.php";
        }
    } elseif($page == 'daftar'){
        include "daftar/daftar.php";
    }elseif($page == "session"){
      if($sub == "mahasiswa"){
        include "session/mahasiswanama.php";
      } elseif($sub == "beasiswa"){
        include "session/beasiswanama.php";
      }
    }elseif($nama == "admin"){
      include "mahasiswa/mahasiswa.php";
    }else{
      include "mahasiswa/mahasiswa.php";
    } 
    ?>

            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->

    <div class="az-footer ht-40">
        <div class="container ht-100p pd-t-0-f">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                bootstrapdash.com
                2020</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                    href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap
                    admin
                    templates</a> from Bootstrapdash.com</span>
        </div><!-- container -->
    </div><!-- az-footer -->


    <script src="template/lib/jquery/jquery.min.js"></script>
    <script src="template/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="template/lib/ionicons/ionicons.js"></script>
    <script src="template/lib/jquery.flot/jquery.flot.js"></script>
    <script src="template/lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="template/lib/chart.js/Chart.bundle.min.js"></script>
    <script src="template/lib/peity/jquery.peity.min.js"></script>

    <script src="template/js/azia.js"></script>
    <script src="template/js/chart.flot.sampledata.js"></script>
    <script src="template/js/dashboard.sampledata.js"></script>
    <script src="template/js/jquery.cookie.js" type="text/javascript"></script>
    <script>
    $(function() {
        'use strict'

        var plot = $.plot('#flotChart', [{
            data: flotSampleData3,
            color: '#007bff',
            lines: {
                fillColor: {
                    colors: [{
                        opacity: 0
                    }, {
                        opacity: 0.2
                    }]
                }
            }
        }, {
            data: flotSampleData4,
            color: '#560bd0',
            lines: {
                fillColor: {
                    colors: [{
                        opacity: 0
                    }, {
                        opacity: 0.2
                    }]
                }
            }
        }], {
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 2,
                    fill: true
                }
            },
            grid: {
                borderWidth: 0,
                labelMargin: 8
            },
            yaxis: {
                show: true,
                min: 0,
                max: 100,
                ticks: [
                    [0, ''],
                    [20, '20K'],
                    [40, '40K'],
                    [60, '60K'],
                    [80, '80K']
                ],
                tickColor: '#eee'
            },
            xaxis: {
                show: true,
                color: '#fff',
                ticks: [
                    [25, 'OCT 21'],
                    [75, 'OCT 22'],
                    [100, 'OCT 23'],
                    [125, 'OCT 24']
                ],
            }
        });

        $.plot('#flotChart1', [{
            data: dashData2,
            color: '#00cccc'
        }], {
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 2,
                    fill: true,
                    fillColor: {
                        colors: [{
                            opacity: 0.2
                        }, {
                            opacity: 0.2
                        }]
                    }
                }
            },
            grid: {
                borderWidth: 0,
                labelMargin: 0
            },
            yaxis: {
                show: false,
                min: 0,
                max: 35
            },
            xaxis: {
                show: false,
                max: 50
            }
        });

        $.plot('#flotChart2', [{
            data: dashData2,
            color: '#007bff'
        }], {
            series: {
                shadowSize: 0,
                bars: {
                    show: true,
                    lineWidth: 0,
                    fill: 1,
                    barWidth: .5
                }
            },
            grid: {
                borderWidth: 0,
                labelMargin: 0
            },
            yaxis: {
                show: false,
                min: 0,
                max: 35
            },
            xaxis: {
                show: false,
                max: 20
            }
        });


        //-------------------------------------------------------------//


        // Line chart
        $('.peity-line').peity('line');

        // Bar charts
        $('.peity-bar').peity('bar');

        // Bar charts
        $('.peity-donut').peity('donut');

        var ctx5 = document.getElementById('chartBar5').getContext('2d');
        new Chart(ctx5, {
            type: 'bar',
            data: {
                labels: [0, 1, 2, 3, 4, 5, 6, 7],
                datasets: [{
                    data: [2, 4, 10, 20, 45, 40, 35, 18],
                    backgroundColor: '#560bd0'
                }, {
                    data: [3, 6, 15, 35, 50, 45, 35, 25],
                    backgroundColor: '#cad0e8'
                }]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    enabled: false
                },
                legend: {
                    display: false,
                    labels: {
                        display: false
                    }
                },
                scales: {
                    yAxes: [{
                        display: false,
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11,
                            max: 80
                        }
                    }],
                    xAxes: [{
                        barPercentage: 0.6,
                        gridLines: {
                            color: 'rgba(0,0,0,0.08)'
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11,
                            display: false
                        }
                    }]
                }
            }
        });

        // Donut Chart
        var datapie = {
            labels: ['Search', 'Email', 'Referral', 'Social', 'Other'],
            datasets: [{
                data: [25, 20, 30, 15, 10],
                backgroundColor: ['#6f42c1', '#007bff', '#17a2b8', '#00cccc', '#adb2bd']
            }]
        };

        var optionpie = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false,
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        };

        // For a doughnut chart
        var ctxpie = document.getElementById('chartDonut');
        var myPieChart6 = new Chart(ctxpie, {
            type: 'doughnut',
            data: datapie,
            options: optionpie
        });

    });
    </script>
</body>

</html>