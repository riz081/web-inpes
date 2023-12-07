@extends('pages.layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-info shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">file_open</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total Pengajuan</p>
                        <h4 class="mb-0">{{ $pengajuan }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>dari minggu lalu</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-warning shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">file_open</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total Proses</p>
                        <h4 class="mb-0">{{ $proses }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>dari minggu lalu</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total Selesai</p>
                        <h4 class="mb-0">{{ $selesai }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> dari minggu lalu</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-danger shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">sentiment_dissatisfied</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total Batal</p>
                        <h4 class="mb-0">{{ $batal }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>dari minggu lalu</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-body">
            <div class="text-center mt-4">
                <a href="{{ route('generate-pdf') }}" class="btn btn-dark">Generate PDF</a>
            </div>
            <div class="table-responsive">
                <table class="table" id="alldata">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Layanan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th scope="row">{{ $item->name }}</th>
                                <th scope="row">{{ $item->email }}</th>
                                <th scope="row">{{ $item->service->service }}</th>
                                <th scope="row">{{ $item->status->status }}</th>
                                <th>
                                    <form action="{{ route('admin.destroy', $item->id) }}" method="post">
                                        <button class="btn btn-dark edit" type="button" data-id="{{ $item->id }}">
                                            <i class="material-icons opacity-10">edit</i>
                                        </button>
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-dark delete-btn"
                                            data-id="{{ $item->id }}">
                                            <i class="material-icons opacity-10">delete</i>
                                        </button>

                                        <a href="{{ route('admin.show', $item->id) }}" class="btn btn-dark btn-detail">
                                            <i class="material-icons opacity-10">info</i>
                                        </a>
                                    </form>
                                </th>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
