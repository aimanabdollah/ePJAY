@extends('layouts.staff-main', ['title' => 'Dashboard'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin-home') }}">Halaman Utama</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection


@section('content')
    <!-- Small box (stat box) -->
    <div class="row">
        {{-- <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $application }}</h3>

                    <p>Jumlah Permohonan Diterima</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-inbox"></i>
                </div>
                <a href="{{ url('admin/application') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div> --}}
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="nav-icon fas fa-inbox"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Permohonan</span>
                    <span class="info-box-number">
                        <h3>{{ $application }}</h3>
                    </span>
                </div>

            </div>
        </div>
        <!-- ./col -->
        {{-- <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $orphan }}<sup style="font-size: 20px"></sup></h3>

                    <p>Jumlah Anak Jagaan</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-user-alt"></i>
                </div>
                <a href="{{ url('admin/orphan') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div> --}}
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-success elevation-1"><i class="nav-icon fas fa-user-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Anak Jagaan</span>
                    <span class="info-box-number">
                        <h3>{{ $orphan }}</h3>
                    </span>
                </div>

            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-secondary elevation-1"><i class="nav-icon fas fa-money-bill"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Pendapatan</span>
                    <span class="info-box-number">
                        <h3>RM {{ $income }}</h3>
                    </span>
                </div>

            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-danger elevation-1"><i class="nav-icon fas fa-money-bill"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Perbelanjaan</span>
                    <span class="info-box-number">
                        <h3>RM {{ $expense }}</h3>
                    </span>
                </div>

            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            {{-- <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>RM {{ $income }}</h3>

                    <p>Jumlah Pendapatan</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-money-bill"></i>
                </div>
                <a href="{{ url('admin/income') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div> --}}
        </div>
        <!-- ./col -->
        {{-- <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>RM {{ $expense }}</h3>

                    <p>Jumlah Perbelanjaan</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-money-bill"></i>
                </div>
                <a href="{{ url('admin/expense') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div> --}}
        <!-- ./col -->
    </div>


    {{-- <div class="card">
        <div class="card-header ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>

            </h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#revenue-chart" data-toggle="tab"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#sales-chart" data-toggle="tab"></a>
                    </li>
                </ul>
            </div>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane" id="revenue-chart" style="position: relative; height: 300px;">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="revenue-chart-canvas" height="600" style="height: 300px; display: block; width: 794px;"
                        width="1588" class="chartjs-render-monitor"></canvas>
                </div>
                <div class="chart tab-pane active" id="sales-chart" style="position: relative; height: 300px;">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="sales-chart-canvas" height="600" style="height: 300px; display: block; width: 794px;"
                        width="1588" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div><!-- /.card-body -->
    </div> --}}

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Analisis Maklumat Permohonan</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6" id="jumlahPermohonan" style="height: 200pt"></div>
                <div class="col-6" id="statusPermohonan"></div>
            </div>

        </div>
    </div>


    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Analisis Maklumat Anak Jagaan</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6" id="kategoriUmur" style="height: 200pt"></div>
                <div class="col-6" id="kategoriJantina"></div>
            </div>

        </div>

    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Analisis Maklumat Pendapatan dan Perbelanjaan</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-4" id="pendapatanDanPerbelanjaan" style="height: 200pt"></div>
                <div class="col-4" id="kategoriPendapatan"></div>
                <div class="col-4" id="kategoriPerbelanjaan"></div>
            </div>

        </div>
    </div>


    <!-- Default box -->
    {{-- <div class="card">
        <div class="card-header">
            <h3 class="card-title">Title</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            Welcome to Admin Page
            <br><br>
            <button class="btn btn-red">Click Me</button>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div> --}}

    <!-- /.card -->
@endsection


@push('css')
    <style>
        .btn-red {
            background-color: blue;
            color: white;
        }
    </style>
@endpush


@push('js')
    <script>
        $(function() {
            $('.btn-red').click(function() {
                alert("Hello World");

            });
        });


        // =============================================================================================
        // ================= [ LAPORAN ANALISIS MAKLUMAT PENDAPATAN DAN PERBELANJAAN ] =================
        // ============================================================================================= 

        // LINE CHART - JUMLAH PENDAPATAN DAN PERBELANJAAN MENGIKUT BULAN ==============================

        google.charts.load('current', {
            packages: ['corechart', 'line']
        });
        google.charts.setOnLoadCallback(drawChart_jumlahPerbelanjaanPendapatan);

        function drawChart_jumlahPerbelanjaanPendapatan() {
            var data = google.visualization.arrayToDataTable([
                ['Bulan', 'Pendapatan', 'Perbelanjaan'],
                <?php echo $jumlahPendapatanDanPerbelanjaan; ?>
            ]);
            var options = {
                title: 'Jumlah Pendapatan dan Perbelanjaan Mengikut Bulan',
                curveType: 'function',
                hAxis: {
                    title: 'Bulan'
                },
                vAxis: {
                    title: 'Jumlah (RM)'
                },
                animation: {
                    "startup": true,
                    duration: 1000,
                    easing: 'out'
                }
            };
            var chart = new google.visualization.LineChart(document.getElementById('pendapatanDanPerbelanjaan'));
            chart.draw(data, options);
        }

        // PIE CHART - JUMLAH PENDAPATAN MENGIKUT KATEGORI ==========================================

        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart_jumlahKategoriPendapatan);

        function drawChart_jumlahKategoriPendapatan() {
            var data = google.visualization.arrayToDataTable([
                ['Kategori', 'Jumlah'],
                <?php echo $kategoriPendapatan; ?>
            ]);

            var options = {
                title: 'Peratusan Jumlah Pendapatan Mengikut Kategori',
                pieHole: 0.3
            };

            var chart = new google.visualization.PieChart(document.getElementById('kategoriPendapatan'));

            chart.draw(data, options);
        }

        // PIE CHART - JUMLAH PERBELANJAAN MENGIKUT KATEGORI ==========================================

        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart_jumlahKategoriPerbelanjaan);

        function drawChart_jumlahKategoriPerbelanjaan() {

            var data = google.visualization.arrayToDataTable([
                ['Kategori', 'Jumlah'],
                <?php echo $kategoriPerbelanjaan; ?>
            ]);

            var options = {
                title: 'Peratusan Jumlah Perbelanjaan Mengikut Kategori',
                pieHole: 0.3
            };

            var chart = new google.visualization.PieChart(document.getElementById('kategoriPerbelanjaan'));

            chart.draw(data, options);
        }


        // =============================================================================================
        // ================= [ LAPORAN ANALISIS MAKLUMAT ANAK JAGAAN ] =================================
        // ============================================================================================= 

        // PIE CHART - JUMLAH ANAK JAGAAN MENGIKUT JANTINA =============================================

        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart_jumlahKategoriJantina);

        function drawChart_jumlahKategoriJantina() {

            var data = google.visualization.arrayToDataTable([
                ['Jantina', 'Jumlah'],
                <?php echo $kategoriJantina; ?>
            ]);

            var options = {
                title: 'Peratusan Jumlah Anak Jagaan Mengikut Jantina',
                pieHole: 0.3
            };

            var chart = new google.visualization.PieChart(document.getElementById('kategoriJantina'));
            chart.draw(data, options);
        }

        // BAR CHART - JUMLAH ANAK JAGAAN MENGIKUT UMUR ===============================================

        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawChart_jumlahKategoriUmur);

        function drawChart_jumlahKategoriUmur() {
            var data = google.visualization.arrayToDataTable([
                ['Umur', 'Jumlah'],
                <?php echo $kategoriUmur; ?>
            ]);

            var options = {
                title: 'Jumlah Anak Jagaan Mengikut Umur',
                animation: {
                    "startup": true,
                    duration: 3000,
                    easing: 'out'
                },
                colors: ['green'],
                // chartArea: {
                //     width: '50%'
                // },
                hAxis: {
                    title: '',
                    minValue: 0
                },
                vAxis: {
                    title: ''
                }
            };
            var chart = new google.visualization.BarChart(document.getElementById('kategoriUmur'));
            chart.draw(data, options);
        }


        // =============================================================================================
        // ================= [ LAPORAN ANALISIS MAKLUMAT PERMOHONAN ] ==================================
        // ============================================================================================= 

        // PIE CHART - JUMLAH PERMOHONAN MENGIKUT STATUS ===============================================

        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart_jumlahStatusPermohonan);

        function drawChart_jumlahStatusPermohonan() {

            var data = google.visualization.arrayToDataTable([
                ['Status', 'Jumlah'],
                <?php echo $statusPermohonan; ?>
            ]);

            var options = {
                title: 'Peratusan Jumlah Permohonan Mengikut Status',
                pieHole: 0.3
            };

            var chart = new google.visualization.PieChart(document.getElementById('statusPermohonan'));

            chart.draw(data, options);
        }

        // BAR CHART - JUMLAH PERMOHONAN MENGIKUT BULAN ===============================================

        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawChart_jumlahPermohonan);

        function drawChart_jumlahPermohonan() {
            var data = google.visualization.arrayToDataTable([
                ['Bulan', 'Jumlah'],
                <?php echo $jumlahPermohonan; ?>
            ]);
            var options = {
                title: 'Jumlah Permohonan Diterima Mengikut Bulan',
                animation: {
                    "startup": true,
                    duration: 3000,
                    easing: 'out'
                },
                colors: ['purple'],
                // chartArea: {
                //     width: '50%'
                // },
                hAxis: {
                    title: 'Bulan',
                    minValue: 0
                },
                vAxis: {
                    title: 'Jumlah'
                }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('jumlahPermohonan'));
            chart.draw(data, options);
        }
    </script>
@endpush
