@extends('layouts.default')

@section('content')
    <div class="activity">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="box-title d-sm-flex align-items-center justify-content-between">
                            <h4>Jadwal Khotbah</h4>
                            <a href="{{ route('jumat.create') }}" class="btn btn-sm btn-primary shadow-sm">
                                <i class="fa fa-plus fa-sm text-white-50"></i> Tambah jadwal
                            </a>
                        </div>
                        <div class="card-body-- mt-4">
                            <div class="table-stats order-table ov-h">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Photo</th>
                                            <th>Nama Khatib</th>
                                            <th>Tanggal</th>
                                            <th>Khotbah dimulai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @forelse ($khotbahJumat as $kj)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#showimage{{ $kj->id }}">
                                                    <img src="{{ $kj->photo ? Storage::url($kj->photo) : '/Front-end/images/profile.png' }}" alt="photo" style="width: 50px; height: 45px " class="img-fluid img-thumbnail rounded-circle">
                                                </a>
                                            </td>
                                            <td>{{ $kj->name }}</td>
                                            <td>{{ date('l, j \\ F Y', strtotime($kj->date)) }}</td>
                                            <td>{{ date('H:i', strtotime($kj->time_khotbah)) }} WIB</td>
                                            <td>
                                                <a href="{{ route('jumat.edit', $kj->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $kj->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @php
                                            $no++;
                                        @endphp
                                        @empty
                                            <tr>
                                                <td class="text-center p-5" colspan="6">
                                                    Data tidak tersedia
                                                </td>
                                            </tr>
                                        @endforelse
                                        
                                    </tbody>

                                    @foreach ($khotbahJumat as $kj)
                                        <!-- Modal image-->
                                        <div class="modal fade" id="showimage{{ $kj->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="box-title d-sm-flex align-items-center justify-content-between">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{ $kj->name }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="{{ $kj->photo ? Storage::url($kj->photo) : '/Front-end/images/profile.png' }}" alt="photo" style="width: 350px">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        {{-- Modal delete --}}
                                        <div class="modal fade" tabindex="-1" role="dialog" id="delete{{ $kj->id }}">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="box-title d-sm-flex align-items-center justify-content-between">
                                                        <h5 class="modal-title">Hapus {{ $kj->name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal-body">
                                                <p>Anda yakin ingin menghapus jadwal khotbah?</p>
                                                <input type="hidden" value="{{ $kj->name }}">
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('jumat.destroy', $kj->id) }}" method="post" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i>
                                                            Hapus
                                                        </button>
                                                    </form>
                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection