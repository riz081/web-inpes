<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('dashboard') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/favicon.png">
    <title>
        Dashboard Admin - INPES
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('dashboard') }}/css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('dashboard') }}/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('dashboard') }}/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.7/datatables.min.css" rel="stylesheet">
</head>

<body class="g-sidenav-show  bg-gray-200">

    @yield('dashboard')


    <!--   Core JS Files   -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('dashboard') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('dashboard') }}/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('dashboard') }}/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('dashboard') }}/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="{{ asset('dashboard') }}/js/plugins/chartjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

    <script>
        $('.edit').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: "{{ url('/booking/edit') }}" + '/' + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#edit').modal('show');
                    $('#editLabel').html(data.name);
                    $('#updateStatus').attr('action', "{{ url('/booking/update') }}" + '/' + data.id);

                    $('#status').find('option:selected').prop('selected', false);
                    console.log(data.status.id);
                    $('#status option').each(function() {
                        if ($(this).val() == data.status.id) {
                            $(this).prop('selected', true);
                        }
                    });
                }
            });
        });
    </script>

    {{-- cetak pdf dan word --}}
    {{-- <script>
        $("#exportPDF").click(function() {
            $('#alldata').tableHTMLExport({
                type: 'pdf',
                filename: 'laporan-data.pdf'
            });
        });

        $("#exportExcel").click(function() {
            $('#alldata').tableHTMLExport({
                type: 'xls',
                filename: 'laporan-data.xls'
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/table-to-excel@1.0.3/dist/tableToExcel.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    {{-- konfirmasi hapus --}}
    <script>
        $(document).ready(function() {
            $('.delete-btn').click(function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '/admin/' + id,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire(
                                        'Terhapus!',
                                        'Data telah berhasil dihapus.',
                                        'success'
                                    );
                                    location.reload();
                                } else {
                                    Swal.fire(
                                        'Gagal!',
                                        response.message,
                                        'error'
                                    );
                                }
                            },
                            error: function(response) {
                                Swal.fire(
                                    'Error!',
                                    response.responseJSON.message,
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
        var token = $('meta[name="csrf-token"]').attr('content')
    </script>

    <script>
        $(document).ready(function() {
            // ... your other script code ...

            // Logout button click event
            $('#logout-btn').click(function() {
                showLogoutConfirmation();
            });

            function showLogoutConfirmation() {
                Swal.fire({
                    title: 'Apakah Anda yakin ingin logout?',
                    text: 'Anda akan keluar dari sesi ini',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, logout!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.value) {
                        // Create a form dynamically and submit it
                        var form = $('<form>', {
                            'method': 'POST',
                            'action': '/logout'
                        });

                        // Add CSRF token field
                        form.append('{{ csrf_field() }}');

                        // Append the form to the body and submit it
                        $('body').append(form);
                        form.submit();
                    }
                });
            }

            // ... your other script code ...
        });
    </script>



    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('dashboard') }}/js/material-dashboard.min.js?v=3.1.0"></script>

    <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.7/datatables.min.js"></script>

    <script>
        $('#alldata').DataTable({
            responsive: true
        });
    </script>

    <script>
        // Periksa apakah pengguna telah logout
        const loggedOut = sessionStorage.getItem('logged_out');

        if (loggedOut) {
            // Hapus informasi logout dari session storage
            sessionStorage.removeItem('logged_out');

            // Redirect ke halaman login
            window.location.href = '/login';
        }
    </script>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/fullcalendar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>

    @stack('dashboard')
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>
