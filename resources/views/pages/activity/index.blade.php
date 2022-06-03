@extends('layouts.default')

@section('content')
    <div class="activity">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="box-title d-sm-flex align-items-center justify-content-between">
                            <h4>Daftar jadwal kegiatan</h4>
                            <a href="{{ route('activities.create') }}" class="btn btn-sm btn-primary shadow-sm">
                                <i class="fa fa-plus fa-sm text-white-50"></i> Tambah jadwal
                            </a>
                        </div>
                        <div class="card-body-- mt-4">
                            <div class="table-stats order-table ov-h">
                                <table class="table table-bordered stripe order-column hover" id="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal</th>
                                            <th>Pukul</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Pengisi acara</th>
                                            <th>Tipe audience</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @forelse ($jadwal as $kegiatan)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ date('l, j \\ F Y', strtotime($kegiatan->activity_date)) }}</td>
                                            <td>{{ date('H:i', strtotime($kegiatan->activity_time)) }} WIB</td>
                                            <td>{{ $kegiatan->activity_name }}</td>
                                            <td>{{ $kegiatan->performer }}</td>
                                            <td>{{ $kegiatan->audience_type }}</td>
                                            <td>
                                                <a href="{{ route('activities.show', $kegiatan->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('activities.edit', $kegiatan->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $kegiatan->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @php
                                            $no++;
                                        @endphp
                                        @empty
                                            <tr>
                                                <td class="text-center p-5" colspan="8">
                                                    Data tidak tersedia
                                                </td>
                                            </tr>
                                        @endforelse
                                        
                                    </tbody>


                                    @foreach ($jadwal as $kegiatan)
                                        {{-- Modal delete --}}
                                        <div class="modal fade" tabindex="-1" role="dialog" id="delete{{ $kegiatan->id }}">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="box-title d-sm-flex align-items-center justify-content-between">
                                                        <h5 class="modal-title">Hapus {{ $kegiatan->activity_name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal-body">
                                                <p>Anda yakin ingin menghapus jadwal kegiatan ini?</p>
                                                <input type="hidden" name="" id="" value="{{ $kegiatan->id }}">
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('activities.destroy', $kegiatan->id) }}" method="post" class="d-inline">
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

@push('after-script')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush