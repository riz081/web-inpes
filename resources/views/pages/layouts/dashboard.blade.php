@extends('pages.layouts.app')

    @section('dashboard')
        @include('pages.navigation.sidebar')        
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            @include('pages.navigation.nav')            
            <div class="container-fluid py-4">
              @yield('content')  
              
              {{-- modal --}}
                <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" id="updateStatus">
                                <div class="modal-body">
                                    @csrf
                                    <div class="form-floating">
                                        <select class="form-select" id="status" name="status"
                                            aria-label="Floating label select example">
                                            @foreach ($status as $item)
                                                <option value="{{ $item->id }}">{{ $item->status }}</option>
                                            @endforeach
                                        </select>
                                        <label for="status">Ubah Status Layanan</label>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- modal --}}
            </div>
        </main>

        
    @endsection    


