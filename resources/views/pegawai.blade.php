<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>TomatPro</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('faviconLogo.ico') }}" type="image/x-icon">
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
        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('login/images/reim.png') }}"
                alt="" width="40" height="37"></a>
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
                    <a class="nav-link" href="">
                        <i class="fa fa-fw fa-user"></i>
                        <span class="nav-link-text"> Pegawai </span>
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
                <li class="breadcrumb-item active"> Pegawai </li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="card mb-3">
                <div class="card-header">
                    <h2> <i class="fa fa-table"></i> Data Pegawai </h2>
                </div>
                <div class="card-body">
                    @if ($user->roles->jabatan == 'DIREKTUR')
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-tomato text-center add-pegawai" href="#" data-toggle="modal"
                                data-target="#tambahpegawai">
                                Tambah Pegawai
                            </a>
                            <!-- Modal Tambah Pegawai -->
                            <div class="modal fade" id="tambahpegawai" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai Baru</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form action="{{ route('addPegawai') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="NIP">NIP Pegawai Baru</label>
                                                    <input type="text" class="form-control" name="NIP"
                                                        id="pegawai" value="{{ $new_NIP }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_pegawai">Nama Pegawai</label>
                                                    <input type="text" class="form-control" name="nama"
                                                        id="pegawai" placeholder="Masukkan Nama Pegawai" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_pegawai">Password</label>
                                                    <input type="password" class="form-control" name="password"
                                                        id="pegawai" placeholder="Masukkan Password Pegawai Baru"
                                                        required>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label style="color: black">Jabatan Pegawai</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="styled-select">
                                                                <select class="form-select" id="jabatan" name="jabatan"
                                                                    aria-label="Pilih Jabatan">
                                                                    <option selected disabled>Pilih Jabatan</option>
                                                                    <option value="DIREKTUR">
                                                                        DIREKTUR </option>
                                                                    <option value="FINANCE">
                                                                        FINANCE </option>
                                                                    <option value="STAFF">
                                                                        STAFF </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary"> Tambah </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (session('berhasil'))
                        <div class="alert alert-success mt-2" role="alert">
                            <strong>Hooray!</strong> {{ session('berhasil') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session('gagal'))
                        <div class="alert alert-success mt-2" role="alert">
                            <strong>Yah!</strong> {{ session('gagal') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="table-container">
                        <table id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama Karyawan</th>
                                    <th>Jabatan</th>
                                    @if ($user->roles->jabatan == "DIREKTUR")
                                        <th></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($pegawai as $pg)
                                    <tr>
                                        <td class="text-center p-2">{{ $no++ }} </td>
                                        <td class="text-center p-2">{{ $pg->NIP }} </td>
                                        <td class="text-center p-2">{{ $pg->nama }}</td>
                                        <td class="text-center p-2">{{ $pg->roles->jabatan }}</td>
                                        @if ($user->roles->jabatan == "DIREKTUR")
                                            <td class="p-2">
                                                <div class="d-flex justify-content-center">
                                                    <a class="btn btn-success text-center mr-2 edit-pegawai"
                                                        href="#" data-toggle="modal"
                                                        data-target="#editpegawai{{ $pg->id }}">
                                                        Edit
                                                    </a>
                                                    <div class="modal fade" id="editpegawai{{ $pg->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="editpegawai{{ $pg->id }}Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="editpegawai{{ $pg->id }}Label">Edit
                                                                        Pegawai
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <form action="{{ route('updatePegawai', [$pg->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="NIP">NIP Pegawai</label>
                                                                            <input type="text" class="form-control"
                                                                                id="NIP" name="NIP"
                                                                                value="{{ $pg->NIP }}" required
                                                                                readonly>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="nama_pegawai">Nama
                                                                                Pegawai</label>
                                                                            <input type="text" class="form-control"
                                                                                id="nama" name="nama"
                                                                                value="{{ $pg->nama }}" required>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <label style="color: black">Jabatan Pegawai</label>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <div class="styled-select">
                                                                                        <select class="form-select"
                                                                                            name="jabatan" id="jabatan"
                                                                                            aria-label="Pilih Jabatan">
                                                                                            <option
                                                                                                value="DIREKTUR"
                                                                                                {{ "DIREKTUR" == $pg->roles->jabatan ? 'selected' : '' }}>
                                                                                                DIREKTUR
                                                                                            </option>
                                                                                            <option
                                                                                                value="FINANCE"
                                                                                                {{ "FINANCE" == $pg->roles->jabatan ? 'selected' : '' }}>
                                                                                                FINANCE
                                                                                            </option>
                                                                                            <option
                                                                                                value="STAFF"
                                                                                                {{ "STAFF" == $pg->roles->jabatan ? 'selected' : '' }}>
                                                                                                STAFF
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Edit</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <a class="btn btn-danger text-center delete-pegawai" href="#"
                                                        data-toggle="modal"
                                                        data-target="#deletepegawai{{ $pg->id }}">
                                                        Delete
                                                    </a>
                                                    <div class="modal fade" id="deletepegawai{{ $pg->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus
                                                                        Pegawai</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p> Apakah Kamu Yakin Akan Menghapus
                                                                    <p>
                                                                    <p class="font-weight-bold">(
                                                                        {{ $pg->NIP }} -
                                                                        {{ $pg->nama }} )</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Tutup</button>
                                                                    <a href="{{ route('deletePegawai', [$pg->id]) }}">
                                                                        <button type="button" class="btn btn-danger">
                                                                            Delete
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $pegawai->links('pagination.default') }}
                </div>
                <!-- /tables-->
            </div>
            <!-- /container-fluid-->
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
