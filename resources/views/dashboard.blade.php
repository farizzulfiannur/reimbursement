<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>ReimSmart</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('login/images/reim.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Bootstrap core CSS-->
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Main styles -->
    <link href="{{ asset('admin/css/admin.css') }}" rel="stylesheet">
    <!-- Icon fonts-->
    <link href="{{ asset('admin/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Plugin styles -->
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- Your custom styles -->
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/customResponsive.css') }}" rel="stylesheet">

</head>

<body class="fixed-nav sticky-footer" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('login/images/reim.png') }}" alt="" width="40"
                height="37"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <div class="mt-2 mb-2 profiless">
                        <img src="{{ asset('admin/img/users.jpeg') }}" alt="Profile"
                            class="profile d-block m-auto">
                    </div>
                    <h3 class="namaprofile"> {{ $user->nama }} </h3>
                    <p class="titleRole">( {{ ucwords($user->roles->jabatan) }} )</p>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pegawai">
                    <a class="nav-link" href="{{ route('pegawai') }}">
                        <i class="fa fa-fw fa-user"></i>
                        <span class="nav-link-text"> Pegawai </span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pegawai">
                    <a class="nav-link" href="{{ route('reimData') }}">
                        <i class="fa fa-fw fa-file-text"></i>
                        <span class="nav-link-text"> Reimbursement </span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /Navigation-->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">My Dashboard</li>
            </ol>
            <!-- Icon Cards-->
            <div class="row">
                    <div class="col-xl-6 col-sm-6 mb-3">
                        <div class="card dashboard text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-user"></i>
                                </div>
                                <div class="mr-5">
                                    <h5> {{ $total_user }} Pegawai </h5>
                                </div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="{{ route('pegawai') }}">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fa fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-6 col-sm-6 mb-3">
                        <div class="card dashboard text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-file-text"></i>
                                </div>
                                <div class="mr-5">
                                    <h5> {{ $total_reim }} Reimbursement </h5>
                                </div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="{{ route('reimData') }}">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fa fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                <div class="box_general" style="pointer-events: none;">
                    <div class="list_general">
                        <ul>
                            <li>
                                <h3> Hello {{ $user->nama }} </h3>
                                <p style="color: black; text-align: justify; font-size: 16px; margin-bottom: 6px !important">Selamat datang di website ReimSmart! </p>
                                  <p style="color: black; text-align: justify; font-size: 16px;"> Kami hadir untuk memudahkan proses pengajuan dan pengelolaan pengembalian Anda. Dengan antarmuka yang intuitif dan fitur yang lengkap, kami memastikan bahwa setiap klaim Anda dapat diproses dengan cepat dan efisien.</p>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.container-fluid-->
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" i d="exampleModalLabel">Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure wanna <strong>Logout</strong>?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Tangkap klik pada tombol fa-angle-left
            $('#sidenavToggler').on('click', function() {
                // Periksa apakah gambar dan nama sedang disembunyikan
                if ($('.profiless, .namaprofile, .editprofile, .titleRole').css('display') === 'none') {
                    // Jika sedang disembunyikan, tampilkan kembali
                    $('.profiless, .namaprofile, .titleRole').css('display', 'block');
                    $('.editprofile').css('display', 'flex');
                } else {
                    // Jika sedang ditampilkan, sembunyikan
                    $('.profiless, .namaprofile, .editprofile, .titleRole').css('display', 'none');
                }
            });
        });
    </script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{{ asset('admin/vendor/chart.js/Chart.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery.magnific-popup.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/admin.js') }}"></script>
    <!-- Custom scripts for this page-->
    <script src="{{ asset('admin/js/admin-charts.js') }}"></script>

</body>

</html>
