@extends('pages.layouts.dashboard')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
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
                                    <th scope="row">
                                        @if($item->service_id == 1)
                                            Konsultasi Hukum
                                        @elseif($item->service_id == 2)
                                            Pengurusan Visa
                                        @elseif($item->service_id == 3)
                                            Ekspor
                                        @elseif($item->service_id == 4)
                                            Katering
                                        @else
                                            -
                                        @endif
                                    </th>
                                    <th scope="row">
                                        @if($item->status_id == 1)
                                            Pengajuan
                                        @elseif($item->status_id == 2)
                                            Proses
                                        @elseif($item->status_id == 3)
                                            Selesai
                                        @elseif($item->status_id == 4)
                                            Batal
                                        @else
                                            -
                                        @endif
                                    </th>
                                    <th>
                                        <form action="{{ route('process.destroy', $item->id) }}" method="post">
                                            
                                            <button class="btn btn-dark edit" type="button" data-id="{{ $item->id }}">
                                                <i class="material-icons opacity-10">edit</i>
                                            </button>
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-dark delete-btn"
                                                data-id="{{ $item->id }}">
                                                <i class="material-icons opacity-10">delete</i>
                                            </button>
    
                                            <a href="{{ route('process.show', $item->id) }}" class="btn btn-dark btn-detail">
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
    </div>
@endsection
