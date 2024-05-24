<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @notifyCss
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Core theme CSS (includes Bootstrap)-->
    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/sidebar.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>PUSDALOPS-PB</title>
</head>
<body class="background-menu">
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5 ">
                <div class="sidebar-logo">
                    <img src="{{ ('/img/logo.png') }}" 
                            style="width: 185px;" alt="logo">
                </div>
                <h2 class="sidebar-title">PUSDALOPS-PB</h2>
                <ul class="list-unstyled components mb-5">
                @if ($users->role == 'admin')
                    <li class="{{ request()->is('dashboardpage') ? 'nav-item active' : '' }}">
                        <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                            <i class="fa-solid fa-xl fa-home"></i>
                            <a href="{{ url('dashboardpage') }}">Dashboard</a>
                        </div>
                    </li>

                    <li class="{{ request()->is('suratmasuk','carisuratmasuk','createsuratmasuk','filter') ? 'nav-item active' : '' }}">
                        <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                            <i class="fa-solid fa-xl fa-envelope"></i>
                            <a href="{{ url('suratmasuk') }}">Surat Masuk</a>
                        </div>
                    </li>

                    <li class="{{ request()->is('suratkeluar','carisuratkeluar','createsuratkeluar','filtersuratkeluar') ? 'nav-item active' : '' }}">
                        <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                            <i class="fa-solid fa-xl fa-envelope-open-text"></i>
                            <a href="{{ url('suratkeluar') }}">Surat Keluar</a>
                        </div>
                    </li>

                    <li class="{{ request()->is('suratcuti','carisuratcuti', 'createsuratcuti') ? 'nav-item active' : '' }}">
                        <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                            <i class="fa-solid fa-xl fa-envelope-open"></i>
                            <a href="{{ url('suratcuti') }}">Surat Cuti</a>
                        </div>
                    </li>

                    <li class="{{ request()->is('spt','carispt','createspt','filterspt') ? 'nav-item active' : '' }}">
                        <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                            <i class="fa-solid fa-xl fa-circle-exclamation"></i>
                            <a href="{{ url('spt') }}">SPT</a>
                        </div>
                    </li>

                    <li class="{{ request()->is('disposisi','caridisposisi') ? 'nav-item active' : '' }}">
                        <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                            <i class="fa-solid fa-xl fa-envelopes-bulk"></i>
                            <a href="{{ url('disposisi') }}">Disposisi</a>
                        </div>
                    </li>

                    <li class="mt-5 {{ request()->is('datapegawai','caripegawai','createpegawai') ? 'nav-item active' : '' }}">
                        <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                            <i class="fa-solid fa-xl fa-users"></i>
                            <a href="{{ url('datapegawai') }}">Daftar Pegawai</a>
                        </div>
                    </li>
                    
                    <li class="{{ request()->is('daftaruser','cariuser','createuser') ? 'nav-item active' : '' }}">
                        <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                            <i class="fa-solid fa-xl fa-user"></i>
                            <a href="{{ url('daftaruser') }}">Daftar User</a>
                        </div>
                    </li>

                    
                    <li class="{{ request()->is('events') ? 'nav-item active' : '' }}">
                        <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                            <i class="fa-solid fa-xl fa-calendar"></i>
                            <a href="{{ url('events') }}">Agenda</a>
                        </div>
                    </li>


                    @else

                    <li class="{{ request()->is('dashboardpage') ? 'nav-item active' : '' }}">
                        <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                            <i class="fa-solid fa-xl fa-home"></i>
                            <a href="{{ url('dashboardpage') }}">Dashboard</a>
                        </div>
                    </li>

                    <li class="{{ request()->is('events') ? 'nav-item active' : '' }}">
                        <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                            <i class="fa-solid fa-xl fa-calendar"></i>
                            <a href="{{ url('events') }}">Agenda</a>
                        </div>
                    </li>

                    @endif
                </ul>
                    <a href="{{ url('logout') }}" class="btn-logout"> Logout </a>
            </div>              
        </nav>
        <div id="content" class="p-4 p-md-5">
                <div id='calendar'></div>
            </div>
        </div>
    </div>

    <div id="modal-action" class="modal" tabindex="-1"></div>

    @notifyJs
    <!-- <script src="{{asset('/js/jquery.min.js') }}"></script> -->
    <script src="{{asset('/js/popper.js') }}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/main.js')}}"></script>
    @include('sweetalert::alert')
    @notifyJs
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.7/index.global.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
    <script>
    const modal = $('#modal-action')
    const csrfToken = $('meta[name=csrf_token]').attr('content')

    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        themeSystem: 'bootstrap5',
        events: `{{ route('events.list') }}`,
        editable: true,
        dateClick: function (info) {
            $.ajax({
                url: `{{ route('events.create') }}`,
                data: {
                    start_date: info.dateStr,
                    end_date: info.dateStr
                },
                success: function (res) {
                    modal.html(res).modal('show')
                    $('.datepicker').datepicker({
                        todayHighlight: true,
                        format: 'yyyy-mm-dd'
                    });

                    $('#form-action').on('submit', function(e) {
                        e.preventDefault()
                        const form = this
                        const formData = new FormData(form)
                        $.ajax({
                            url: form.action,
                            method: form.method,
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (res) {
                                modal.modal('hide')
                                calendar.refetchEvents()
                            },
                            error: function (res) {

                            }
                        })
                    })
                }
            })
        },
        eventClick: function ({event}) {
            $.ajax({
                url: `{{ url('events') }}/${event.id}/edit`,
                success: function (res) {
                    modal.html(res).modal('show')

                    $('#form-action').on('submit', function(e) {
                        e.preventDefault()
                        const form = this
                        const formData = new FormData(form)
                        $.ajax({
                            url: form.action,
                            method: form.method,
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (res) {
                                modal.modal('hide')
                                calendar.refetchEvents()
                            }
                        })
                    })
                }
            })
        },
        eventDrop: function (info) {
            const event = info.event
            $.ajax({
                url: `{{ url('events') }}/${event.id}`,
                method: 'put',
                data: {
                    id: event.id,
                    start_date: event.startStr,
                    end_date: event.end.toISOString().substring(0, 10),
                    title: event.title,
                    category: event.extendedProps.category
                },
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    accept: 'application/json'
                },
                success: function (res) {
                    iziToast.success({
                        title: 'Success',
                        message: res.message,
                        position: 'topRight'
                    });
                },
                error: function (res) {
                    const message = res.responseJSON.message
                    info.revert()
                    iziToast.error({
                        title: 'Error',
                        message: message ?? 'Something wrong',
                        position: 'topRight'
                    });
                }
            })
        },
        eventResize: function (info) {
            const {event} = info
            $.ajax({
                url: `{{ url('events') }}/${event.id}`,
                method: 'put',
                data: {
                    id: event.id,
                    start_date: event.startStr,
                    end_date: event.end.toISOString().substring(0, 10),
                    title: event.title,
                    category: event.extendedProps.category
                },
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    accept: 'application/json'
                },
                success: function (res) {
                    iziToast.success({
                        title: 'Success',
                        message: res.message,
                        position: 'topRight'
                    });
                },
                error: function (res) {
                    const message = res.responseJSON.message
                    info.revert()
                    iziToast.error({
                        title: 'Error',
                        message: message ?? 'Something wrong',
                        position: 'topRight'
                    });
                }
            })
        },
        eventDidMount: function(info) {
            info.el.setAttribute('title', info.event.title);
        }
    });
    calendar.render();
});
</script>
</body>
</html>