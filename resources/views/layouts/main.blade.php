<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Admin Templates - Dashboard Templates">
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="canonical" href="https://www.bootstrap.gallery/">
    <meta property="og:url" content="https://www.bootstrap.gallery">
    <meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <meta property="og:site_name" content="Bootstrap Gallery">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo_sulbar.png') }}" />

    <!-- Title -->
    <title>App | E-Formulir Permohonan Penerbitan SE</title>


    <!-- *************
			************ Common Css Files *************
		************ -->
    @notifyCss
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/style.css') }}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}">


    <!-- *************
			************ Vendor Css Files *************
		************ -->
    <!-- DateRange css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/daterange/daterange.css') }}" />

    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/dataTables.bs4.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/dataTables.bs4-custom.css') }}" />
    <link href="{{ asset('assets/vendor/datatables/buttons.bs.css') }}" rel="stylesheet" />


    <!-- Summernote CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/summernote/summernote-bs4.css') }}" />



</head>


<body>

    <!-- Loading starts -->
    {{-- @include('layouts.loading') --}}
    <!-- Loading ends -->

    <!-- Page wrapper start -->
    <div class="page-wrapper">

        <!-- Sidebar wrapper start -->
        <nav id="sidebar" class="sidebar-wrapper">

            <!-- Sidebar brand start  -->
            <div class="sidebar-brand"
                style="display: flex; align-items: flex-end; justify-content: center; padding: 5px;">
                <a href="index.html" class="logo">
                    <img src="{{ asset('assets/img/logo_sulbar.png') }}" alt="Bootstrap Gallery" />
                    <h4 class="text-white"> E-Formulir</h4>
                </a>
            </div>
            <!-- Sidebar brand end  -->

            <!-- Sidebar content start -->
            <div class=" sidebar-content">

                <!-- sidebar menu start -->
                @include('layouts.menu')
                <!-- sidebar menu end -->

            </div>
            <!-- Sidebar content end -->
            <x-notify::notify />
            @notifyJs
        </nav>
        <!-- Sidebar wrapper end -->

        <!-- Page content start  -->
        <div class="page-content">

            <!-- Header start -->
            @include('layouts.header')
            <!-- Header end -->

            <!-- Page header start -->
            @include('layouts.pageheader')
            <!-- Page header end -->

            <!-- Main container start -->
            <div class="main-container">

                @yield('content')

            </div>
            <!-- Main container end -->

        </div>
        <!-- Page content end -->

    </div>
    <!-- Page wrapper end -->

    <!--**************************
			**************************
				**************************
							Required JavaScript Files
				**************************
			**************************
		**************************-->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.js') }}"></script>


    <!-- *************
			************ Vendor Js Files *************
		************* -->
    <!-- Slimscroll JS -->
    <script src="{{ asset('assets/vendor/slimscroll/slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/slimscroll/custom-scrollbar.js') }}"></script>

    <!-- Daterange -->
    <script src="{{ asset('assets/vendor/daterange/daterange.js') }}"></script>
    <script src="{{ asset('assets/vendor/daterange/custom-daterange.js') }}"></script>

    <!-- Data Tables -->
    <script src="{{ asset('assets/vendor/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>

    <!-- Custom Data tables -->
    <script src="{{ asset('assets/vendor/datatables/custom/custom-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/custom/fixedHeader.js') }}"></script>

    <!-- Download / CSV / Copy / Print -->
    <script src="{{ asset('assets/vendor/datatables/buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/html5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/buttons.print.min.js') }}"></script>


    <!-- Summernote JS -->
    <script src="{{ asset('assets/vendor/summernote/summernote-bs4.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>



    <script>
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 170,
                tabsize: 2
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function konfirmasiHapus(dataId) {
        Swal.fire({
            title: 'Konfirmasi Hapus',
            text: 'Apakah kamu yakin ingin menghapus?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                var formId = 'hapusForm_' + dataId;
            document.getElementById(formId).submit();
            }
        });
    }
    </script>

</body>

</html>