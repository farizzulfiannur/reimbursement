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
    <link href="{{ asset('admin/css/table.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/paginate.css') }}" rel="stylesheet">
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
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('reimData') }}">Reimbursement</a>
                </li>
                <li class="breadcrumb-item active"> Reimbursement Detail </li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="card mb-3" style="position: relative;">
                <div class="card-header">
                    <h2> <i class="fa fa-file-text"></i> {{ $reim->nama_reim }} </h2>
                </div>
                <div class="card-body" style="position: relative; padding-bottom: 40px">
                    <div class="box_general" style="padding-bottom: 1px">
                        <h6> Tanggal Pembuatan : {{ $reim->tanggal }} </h6>
                    </div>
                    <div class="box_general" style="padding-bottom: 1px">
                        <h5> Deskripsi </h5>
                        <p style="color: black; text-align: justify; font-size: 14px; margin-bottom: 6px !important">
                            {{ $reim->deskripsi }} </p>
                    </div>
                    <div class="box_general" style="padding-bottom: 1px">
                        <h6> File Pendukung :
                            <a style="text-decoration: underline;" href="{{ $fileUrl }}" target="_blank"> Lihat
                                File </a>
                        </h6>
                    </div>
                    <div class="box_general" style="padding-bottom: 1px">
                        <h6> Status :
                            @if ($reim->reimstatuses->status == 'Belum Dinilai')
                                <span style="color: blue;"> {{ $reim->reimstatuses->status }} </span>
                            @elseif($reim->reimstatuses->status == 'Disetujui')
                                <span style="color: green;"> {{ $reim->reimstatuses->status }} </span>
                            @elseif($reim->reimstatuses->status == 'Ditolak')
                                <span style="color: red;"> {{ $reim->reimstatuses->status }} </span>
                            @endif
                        </h6>
                        <h6> Nama Penilai : {{ $reim->reimstatuses->nama_penilai }} </h6>
                        <h6> Jabatan Penilai : {{ $reim->reimstatuses->jabatan_penilai }} </h6>
                    </div>

                    <div style="position: absolute; bottom: 10px; right: 10px;">
                        @if ($user->roles->jabatan == 'STAFF')
                            <a class="btn btn-success" href="#" data-toggle="modal"
                                data-target="#editreim{{ $reim->id }}">
                                Edit
                            </a>
                            <div class="modal fade" id="editreim{{ $reim->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="editreim{{ $reim->id }}Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editreim{{ $reim->id }}Label">Edit
                                                Reimbursement
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form action="{{ route('updateReim', [$reim->id]) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="nama_reimbursement">Nama Reimbursement</label>
                                                    <input type="text" class="form-control" name="nama_reim"
                                                        id="reimbursement" value="{{ $reim->nama_reim }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal</label>
                                                    <input type="date" class="form-control" name="tanggal"
                                                        id="tanggal" value="{{ $reim->tanggal }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="deskripsi">Deskripsi</label>
                                                    <textarea type="text" class="form-control" rows="3" name="deskripsi"> {{ $reim->deskripsi }} </textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="file">File Pendukung (PDF / Image)</label>
                                                    @if ($reim->file)
                                                        <p>File yang sudah diunggah: <a
                                                                href="{{ asset('fileReim/' . $reim->file) }}"
                                                                target="_blank">Lihat File</a></p>
                                                        <p>Ganti file:</p>
                                                    @endif
                                                    <input type="file" name="file" id="file"
                                                        accept=".jpg,.jpeg,.png,.pdf">
                                                    <input type="hidden" name="old_file"
                                                        value="{{ $reim->file }}">
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <a class="btn btn-danger" href="#" data-toggle="modal"
                                data-target="#deletereim{{ $reim->id }}">
                                Delete
                            </a>
                            <div class="modal fade" id="deletereim{{ $reim->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus
                                                Reimbursement</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p> Apakah Kamu Yakin Akan Menghapus
                                            <p>
                                            <p class="font-weight-bold">( {{ $reim->nama_reim }} )</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                            <a href="{{ route('deleteReim', [$reim->id]) }}">
                                                <button type="button" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <a class="btn btn-success" href="{{ route('disetujuiReim', [$reim->id]) }}"> Disetujui </a>
                            <a class="btn btn-danger" href="{{ route('ditolakReim', [$reim->id]) }}"> Ditolak </a>
                        @endif
                    </div>
                </div>
            </div>

        </div>

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
        <script src="{{ asset('admin/js/admin-datatables.js') }}"></script>
</body>

</html>
