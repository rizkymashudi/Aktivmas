@extends('layouts.default')

@section('content')
    <div class="card shadow">
        <div class="card-header">
            <strong>Detail jadwal kegiatan {{ $detail->activity_name }}</strong>
        </div>
        <div class="card-body card-block">
            <table class="table table-bordered">
                <tr>
                    <th>Nama Kegiatan</th>
                    <td>{{ $detail->activity_name }}</td>
                    <tr>
                        <th>Detail kegiatan</th>
                        <td>{!! $detail->activity_detail !!}</td>
                    </tr>
                    <tr>
                        <th>Poster</th>
                        <td>
                            <img src="{{ Storage::url($detail->poster) }}" alt="poster" style="width: 350px" class="img-thumbnail">
                        </td>
                    </tr>
                    <tr>
                        <th>Pengisi Acara</th>
                        <td>{{ $detail->performer }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Kegiatan</th>
                        <td>{{ date('j \\ F Y', strtotime($detail->activity_date)) }}</td>
                    </tr>
                    <tr>
                        <th>Waktu kegiatan</th>
                        <td>{{ $detail->activity_time }} WIB</td>
                    </tr>
                    <tr>
                        <th>Jamaah</th>
                        <td>{{ $detail->audience_type }}</td>
                    </tr>
                </tr>
            </table>
        </div>
    </div>
@endsection