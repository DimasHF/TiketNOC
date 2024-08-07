<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <title>DBN</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/plant.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets/table/DataTables-1.13.1/css/jquery.dataTables.min.css') }}" />
</head>

<body>
    <div id="preloader">
        <div id="loader"></div>
    </div>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="/"><img src="{{ asset('assets/images/plant.png') }}"
                        class="mr-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="/"><img src="{{ asset('assets/images/plant.png') }}"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <i class="icon-head mx-0"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="ti-arrow-circle-down text-primary"></i>
                                Log Out
                            </a>
                        </div>
                    </li>
                    <li class="nav-item nav-settings d-none d-lg-flex">
                        <a class="nav-link" href="#">
                            <i class="icon-ellipsis"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-header">Tiket</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tiket') }}">
                            <i class="ti-home menu-icon"></i>
                            <span class="menu-title">Tiket</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="main-panel">
                <div class="content-wrapper">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="col-md-12 d-grid gap-2 d-md-flex justify-content-md-end">
                            <div id="success" class="alert alert-success">
                                {{ session('success') }} &nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span> </button>
                            </div>
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="col-md-12 d-grid gap-2 d-md-flex justify-content-md-end">
                            <div id="error" class="alert alert-danger">
                                {{ session('error') }} &nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span> </button>
                            </div>
                        </div>
                    @endif
                    <div class="content">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Edit tiket</h4>
                                    <p class="card-description">
                                        Form Edit tiket
                                    </p>
                                    <form class="forms-sample" method="post"
                                        action="{{ route('tiket.update', $tiket->id) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nama">Nama tiket</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Nama tiket" value="{{ $tiket->username }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Keterangan</label>
                                            <input type="text" class="form-control" id="keterangan"
                                                name="keterangan" placeholder="Nama tiket"
                                                value="{{ $tiket->keterangan }}" required>
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <input type="reset" class="btn btn-outline-secondary"
                                                value="Reset">&nbsp;&nbsp;
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="logoutModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Attention</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @if (Auth::check())
                    <div class="modal-body">Are You Sure To Logout?</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="{{ route('admin.logout') }}">Logout</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>

    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var preloader = document.querySelector("#preloader");
            preloader.style.display = "none";

            document.body.classList.remove("preloader-active");
        });
    </script>

    <script>
        setTimeout(function() {
            var successAlert = document.getElementById('success');
            successAlert.style.display = 'none';
        }, 5000);
        setTimeout(function() {
            var errorAlert = document.getElementById('error');
            errorAlert.style.display = 'none';
        }, 5000);
    </script>
    <script src="{{ asset('assets/table/DataTables-1.13.1/js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
</body>

</html>
