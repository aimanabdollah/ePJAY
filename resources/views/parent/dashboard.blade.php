@extends('layouts.parent-main', ['title'=>'Dashboard'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Halaman Utama</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection


@section('content')
    <!-- Small box (stat box) -->
    <div class="row">
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $application }}</h3>

                    <p>Jumlah Permohonan Dihantar</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-inbox"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $pendingApp }}<sup style="font-size: 20px"></sup></h3>

                    <p>Jumlah Permohonan Dalam Proses</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-archive"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $successApp }}</h3>

                    <p>Jumlah Permohonan Diluluskan</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-check"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        {{-- <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $failApp }}</h3>

                    <p>Jumlah Permohonan Tidak Diluluskan</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-times"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div> --}}
        <!-- ./col -->
    </div>

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
                <div class="col-6" id="chartApplication" style="height: 200pt"></div>
                <div class="col-6" id="piechart4"></div>
            </div>

        </div>
    </div>


    {{-- <div class="card">
        <div class="card-header ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Sales
            </h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#sales-chart" data-toggle="tab">Donut</a>
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

        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(statusCategory);

        function statusCategory() {

            var data = google.visualization.arrayToDataTable([
                ['Status', 'Jumlah'],
                <?php echo $statusCate1; ?>
            ]);

            var options = {
                title: 'Peratusan Jumlah Permohonan Mengikut Status',
                pieHole: 0.3
            };

            if (data.getNumberOfRows() == 0) {
                $("#piechart4").append("Maaf, tiada rekod untuk dipaparkan")
            } else {
                var chart = new google.visualization.PieChart(document.getElementById('piechart4'));
                chart.draw(data, options);
            }

            // var chart = new google.visualization.PieChart(document.getElementById('piechart4'));

            // chart.draw(data, options);
        }


        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(chartApplication);

        function chartApplication() {
            var data = google.visualization.arrayToDataTable([
                ['Bulan', 'Jumlah'],
                <?php echo $chartApplication; ?>
            ]);
            var options = {
                title: 'Jumlah Permohonan Dihantar Mengikut Bulan',
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
            if (data.getNumberOfRows() == 0) { // if you have no data, add a data point and make the series transparent
                data.addRow([new Date(), 0])
                options.series = {
                    0: {
                        color: 'transparent'
                    }
                }
            }
            var chart = new google.visualization.ColumnChart(document.getElementById('chartApplication'));
            chart.draw(data, options);
        }
    </script>
@endpush
