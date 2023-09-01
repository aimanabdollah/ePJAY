@extends('backend.layouts.app', ['title' => 'Utama'])

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Halaman Utama</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <section class="content">
                    <!-- Small boxes (stat boxes) -->
                    <div class="row">
                        <!-- Box 1 -->
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box">
                                <span class="info-box-icon bg-success elevation-1"><i
                                        class="nav-icon fas fa-inbox"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Jumlah Permohonan</span>
                                    <span class="info-box-number">
                                        <h3>{{ $countAllApplication }}</h3>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Box 2 -->
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box">
                                <span class="info-box-icon bg-secondary elevation-1"><i
                                        class="nav-icon fas fa-child"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Jumlah Anak Jagaan</span>
                                    <span class="info-box-number">
                                        <h3>{{ $countAllOrphan }}</h3>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Box 3 -->
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box">
                                <span class="info-box-icon bg-primary elevation-1"><i
                                        class="nav-icon fas fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Jumlah Pengguna Sistem</span>
                                    <span class="info-box-number">
                                        <h3>{{ $countAllUser }}</h3>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i
                                        class="nav-icon fas fa-money-bill-wave"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Jumlah Pendapatan Bulan Ini</span>
                                    <span class="info-box-number">
                                        <h3>RM {{ $sumJumlahTpnCurrentMonth }}</h3>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-danger elevation-1"><i
                                        class="nav-icon fas fa-money-bill-wave"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Jumlah Perbelanjaan Bulan Ini</span>
                                    <span class="info-box-number">
                                        <h3>RM {{ $sumJumlahTbjCurrentMonth }}</h3>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Box 4 -->
                        <div class="col-md-6">
                            <div class="card income">
                                <div class="card-header ui-sortable-handle" style="cursor: move;">
                                    <h3 class="card-title">
                                        <i class="fas fa-th mr-1"></i>
                                        Analisis Pendapatan & Perbelanjaan
                                    </h3>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#currentYear"
                                                    data-toggle="tab">{{ $currentYear }}</a>
                                            </li>
                                            @if (!empty($sumJumlahTpnByMonthPreviousYear) || !empty($sumJumlahTbjByMonthPreviousYear))
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#previousYear"
                                                        data-toggle="tab">{{ $previousYear }}</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content p-0">
                                        <div class="chart tab-pane active" id="currentYear">
                                            <!-- Use "chart-responsive" class for responsive chart -->
                                            <canvas id="currentYearLineChart"
                                                class="chartjs-render-monitor chart-responsive"></canvas>
                                        </div>
                                        <div class="chart tab-pane" id="previousYear">
                                            <!-- Use "chart-responsive" class for responsive chart -->
                                            <canvas id="previousYearLineChart"
                                                class="chartjs-render-monitor chart-responsive"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Box 5 -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header ui-sortable-handle" style="cursor: move;">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-pie mr-1"></i>
                                        Analisis Anak Jagaan mengikut Umur
                                    </h3>
                                    <div class="card-tools" style="margin:12px">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#" data-toggle="tab"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content p-0">
                                        <div class="chart tab-pane active">
                                            <!-- Use "chart-responsive" class for responsive chart -->
                                            <canvas id="orphansPieChart"
                                                class="chartjs-render-monitor chart-responsive"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Box 6 -->
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Jumlah Anak Jagaan Mengikut Jantina</h3>
                                    <div class="card-tools">
                                        <a href="#" class="btn btn-sm btn-tool">
                                            <i class="fas fa-bars"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body" style="max-height: 250px;">
                                    <canvas id="orphanByGenderChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Box 7 -->
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Jumlah Permohonan Mengikut Status</h3>
                                    <div class="card-tools">
                                        <a href="#" class="btn btn-sm btn-tool">
                                            <i class="fas fa-bars"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body" style="max-height: 250px;">
                                    <canvas id="applicationByStatusChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Box 8 -->
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Jenis Pengguna Sistem</h3>
                                    <div class="card-tools">
                                        <a href="#" class="btn btn-sm btn-tool">
                                            <i class="fas fa-bars"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body" style="max-height: 250px;">
                                    <canvas id="userByTypeChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        div.income {
            height: 100px;
        }
    </style>
@endpush



@push('js')
    <script>
        // Data

        var currentYearData = prepareLineData(@json($sumJumlahTbjByMonthCurrentYear), findIncomeTotal);
        var previousYearData = prepareLineData(@json($sumJumlahTbjByMonthPreviousYear), findIncomeTotalPreviousYear);

        var orphanByGender = @json($orphanByGender);
        var applicationByStatus = @json($applicationByStatus);
        var userByType = @json($userByType);


        // Get canvas contexts
        var orphanByGenderCtx = document.getElementById('orphanByGenderChart').getContext('2d');
        var applicationByStatusChartCtx = document.getElementById('applicationByStatusChart').getContext('2d');
        var userByTypeCtx = document.getElementById('userByTypeChart').getContext('2d');

        var currentYearCtx = document.getElementById('currentYearLineChart').getContext('2d');
        var previousYearCtx = document.getElementById('previousYearLineChart').getContext('2d');
        var orphansPieChartCtx = document.getElementById('orphansPieChart').getContext('2d');

        // Function to prepare line chart data
        function prepareLineData(data, findIncomeFunction) {
            return data.map(item => ({
                month: item.month,
                expense_total: item.total,
                income_total: findIncomeFunction(item.month) // Find the corresponding income total
            }));
        }

        // Function to find the income total for the current year
        function findIncomeTotal(month) {
            var incomeData = @json($sumJumlahTpnByMonthCurrentYear).find(item => item.month === month);
            return incomeData ? incomeData.total : 0;
        }

        // Function to find the income total for the previous year
        function findIncomeTotalPreviousYear(month) {
            var incomeData = @json($sumJumlahTpnByMonthPreviousYear).find(item => item.month === month);
            return incomeData ? incomeData.total : 0;
        }



        function createLineChart(ctx, data) {
            var allMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep',
                'Oct', 'Nov', 'Dec'
            ];

            // Prepare the data with zero values for missing months
            var preparedData = allMonths.map(month => {
                var item = data.find(d => d.month === month);
                return {
                    month: month,
                    expense_total: 0, // Initialize to 0
                    income_total: 0, // Initialize to 0
                    ...item // Overwrite with actual data if available
                };
            });

            return new Chart(ctx, {
                type: 'line',
                data: {
                    labels: preparedData.map(item => item.month),
                    datasets: [{
                            label: 'Pendapatan',
                            data: preparedData.map(item => item.income_total),
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2,
                            fill: false,
                            tension: 0.3,
                            backgroundColor: 'rgba(75, 192, 192, 1)',
                        },
                        {
                            label: 'Perbelanjaan',
                            data: preparedData.map(item => item.expense_total),
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 2,
                            fill: false,
                            tension: 0.3,
                            backgroundColor: 'rgba(255, 99, 132, 1)',
                        }
                    ]
                },
                options: {
                    //responsive: true,
                    //  maintainAspectRatio: false,
                    // Add any custom options for the line chart
                }
            });
        }

        // Create the pie chart
        var applicationByStatusChart = new Chart(applicationByStatusChartCtx, {
            type: 'doughnut',
            data: {
                labels: applicationByStatus.map(item => item.status_permohonan),
                datasets: [{
                    data: applicationByStatus.map(item => item.count),
                    backgroundColor: [
                        '#28a745', // Berjaya
                        '#ffc107', // Dalam Proses
                        '#dc3545', // Tidak Berjaya
                        // Add more colors as needed
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }

        });

        // Create the pie chart
        var pieChart = new Chart(orphanByGenderCtx, {
            type: 'doughnut',
            data: {
                labels: orphanByGender.map(item => item.Jantina),
                datasets: [{
                    data: orphanByGender.map(item => item.count),
                    backgroundColor: [
                        '#2986cc', // male
                        '#e83e8c', // female
                        // Add more colors as needed
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });

        // Create the userChart
        var userChart = new Chart(userByTypeCtx, {
            type: 'doughnut',
            data: {
                labels: userByType.map(item => item.RoleName),
                datasets: [{
                    data: userByType.map(item => item.count),
                    backgroundColor: [
                        '#FF6384', // Admin
                        '#36A2EB', // Staf
                        '#FFCE56', // Penjaga / Waris
                        // Add more colors as needed
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });

        // Create the line charts
        var currentYearLineChart = createLineChart(currentYearCtx, currentYearData);
        var previousYearLineChart = createLineChart(previousYearCtx, previousYearData);

        // Access the orphanByAge from the PHP variable
        var orphanByAge = @json($orphanByAge);

        // Extract the count of orphans in each age group
        var data = Object.values(orphanByAge).map(group => group.length);

        // Define the labels for the age groups
        var labels = Object.keys(orphanByAge);

        var orphanByAge = new Chart(orphansPieChartCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)', // Red
                        'rgba(54, 162, 235, 0.8)', // Blue
                        'rgba(255, 206, 86, 0.8)', // Yellow
                        'rgba(75, 192, 192, 0.8)', // Green
                        // Add more colors as needed
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                // maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0, // Avoid showing decimals on the y-axis
                            stepSize: 1 // Show whole numbers on the y-axis
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false // Hide the legend
                    },
                    datalabels: { // Correct placement of the datalabels configuration
                        color: 'black',
                        font: {
                            weight: 'bold'
                        },
                        anchor: 'end', // Align data labels to the end of the bars
                        align: 'top', // Position data labels at the top of the bars
                        formatter: function(value) {
                            return value; // Show the data value as the label
                        }
                    }

                }
            }
        });
    </script>
@endpush
