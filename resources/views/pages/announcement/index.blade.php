@extends('layouts.default')

@section('content')
    <div class="activity">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="box-title d-sm-flex align-items-center justify-content-between">
                            <h4>Pengumuman masjid</h4>
                            <a href="{{ route('announcements.create') }}" class="btn btn-sm btn-primary shadow-sm">
                                <i class="fa fa-plus fa-sm text-white-50"></i> Tambah pengumuman
                            </a>
                        </div>
                        <div class="card-body-- mt-4">
                            <div class="table-stats order-table ov-h">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Judul pengumuman</th>
                                            <th>Detail pengumuman</th>
                                            <th>Poster</th>
                                            <th>Dibuat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @forelse ($announcements as $announce)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $announce->title }}</td>
                                            <td>{!! $announce->detail_announcements !!}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#showimage{{ $announce->id }}">
                                                    <img src="{{ $announce->poster ? Storage::url($announce->poster) : 'https://via.placeholder.com/1280x720' }}" alt="poster" style="width: 350px" class="img-thumbnail">
                                                </a>
                                            </td>
                                            <td>{{ date('l, j \\ F Y', strtotime($announce->created_at)) }}</td>
                                            <td>
                                                <a href="{{ route('announcements.edit', $announce->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $announce->id }}">
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

                                    @foreach ($announcements as $announce)
                                        <!-- Modal image-->
                                        <div class="modal fade" id="showimage{{ $announce->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="box-title d-sm-flex align-items-center justify-content-between">
                                                            <h5 class="modal-title" id="exampleModalLabel">Poster {{ $announce->title }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="{{ $announce->poster ? Storage::url($announce->poster) : 'https://via.placeholder.com/1280x720' }}" alt="poster" style="width: 350px">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        {{-- Modal delete --}}
                                        <div class="modal fade" tabindex="-1" role="dialog" id="delete{{ $announce->id }}">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="box-title d-sm-flex align-items-center justify-content-between">
                                                        <h5 class="modal-title">Hapus {{ $announce->title }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal-body">
                                                <p>Anda yakin ingin menghapus pengumuman?</p>
                                                <input type="hidden" value="{{ $announce->title }}">
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('announcements.destroy', $announce->id) }}" method="post" class="d-inline">
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