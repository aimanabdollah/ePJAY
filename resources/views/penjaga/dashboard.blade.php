@extends('backend.layouts.app', ['title' => 'Utama'])

@section('content-header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1>Halaman Utama</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $countAllApplicationForUser }}</h3>

                        <p>Jumlah Permohonan Dibuat</p>
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
                        <h3>{{ $countPendingApplicationForUser }}<sup style="font-size: 20px"></sup></h3>

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
                        <h3>{{ $countSuccessApplicationForUser }}</h3>

                        <p>Jumlah Permohonan Diluluskan</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-check"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row">

            <section class="col-lg-7 connectedSortable ui-sortable">

                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Senarai Anak Jagaan Yang Berdaftar</b></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body table-responsive px-3 py-3">
                        <div class="table-wrapper">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jantina</th>
                                        <th>Umur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orphan as $orphan)
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="align-middle">{{ $orphan->nama_penuh }}</td>
                                            <td class="align-middle">{{ $orphan->jantina }}</td>
                                            @php
                                                // Assuming you have the following variables
                                                $currentYear = date('Y'); // Get the current year
                                                $tarikh_lahir = $orphan->tarikh_lahir; // Replace this with the birth date in 'YYYY-MM-DD' format
                                                
                                                // Calculate the age
                                                $yearOfBirth = (int) substr($tarikh_lahir, 0, 4);
                                                $age = $currentYear - $yearOfBirth;
                                            @endphp
                                            <td class="align-middle">{{ $age }} Tahun</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tiada rekod anak jagaan</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>


            <section class="col-lg-5 connectedSortable ui-sortable">

                <div class="card card-outline card-danger">
                    <div class="card-header">
                        <h3 class="card-title"><b>Kalendar</b>
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div id="calendar" class="embed-responsive embed-responsive-16by9">
                            <iframe
                                src="https://calendar.google.com/calendar/embed?height=359&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FKuala_Lumpur&showPrint=1&showTitle=0&src=YWltYW5hYmRvbGxhaEBnbWFpbC5jb20&color=%23039BE5"
                                class="embed-responsive-item" frameborder="0" scrolling="no"></iframe>
                        </div>
                    </div>
                </div>
            </section>

        </div>

    </div>
@endsection

@push('css')
    <style>

    </style>
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                pageLength: 5,
                lengthMenu: [
                    [5, 10, 20, -1],
                    [5, 10, 20, 50]
                ]
            })
        });
    </script>
@endpush
