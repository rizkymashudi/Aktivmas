@extends('layouts.default')

@section('content')
    <div class="activity">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="box-title d-sm-flex align-items-center justify-content-between">
                            <h4>Daftar jadwal kegiatan</h4>
                            <a href="{{ route('activities.create') }}" class="btn btn-sm btn-primary shadow-sm">
                                <i class="fa fa-plus fa-sm text-white-50"></i> Tambah jadwal
                            </a>
                        </div>
                        <div class="card-body-- mt-4">
                            <div class="table-stats order-table ov-h">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal</th>
                                            <th>Pukul</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Pengisi acara</th>
                                            <th>Tipe audience</th>
                                            <th>Detail kegiatan</th>
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
                                            <td>{{ $kegiatan->activity_date }}</td>
                                            <td>{{ $kegiatan->activity_time }}</td>
                                            <td>{{ $kegiatan->activity_name }}</td>
                                            <td>{{ $kegiatan->performer }}</td>
                                            <td>{{ $kegiatan->audience_type }}</td>
                                            <td>{{ $kegiatan->activity_detail }}</td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('activities.edit', $kegiatan->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form action="{{ route('activities.destroy', $kegiatan->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
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
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection