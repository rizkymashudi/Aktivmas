@extends('layouts.default')

@section('content')
    <div class="card shadow">
        <div class="card-header">
            <strong>Edit jadwal kegiatan {{ $kegiatan->activity_name }} </strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('activities.update', $kegiatan->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @method('PUT')
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Nama Kegiatan</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" 
                                id="text-input" 
                                name="activity_name"" 
                                placeholder="Nama Kegiatan" 
                                value="{{ old('activity_name') ? old('activity_name') : $kegiatan->activity_name }}"
                                class="form-control @error('activity_name') is-invalid @enderror">
                        @error('activity_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Tanggal Kegiatan</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="date" 
                                id="text-input" 
                                name="activity_date" 
                                placeholder="Tanggal Kegiatan" 
                                value="{{ old('activity_date') ? old('activity_date') : $kegiatan->activity_date }}"
                                class="form-control @error('activity_date') is-invalid @enderror">
                        @error('activity_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Waktu Kegiatan</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="time" 
                                id="text-input" 
                                name="activity_time" 
                                placeholder="Waktu Kegiatan" 
                                value="{{ old('activity_time') ? old('activity_time') : $kegiatan->activity_time }}"
                                class="form-control @error('activity_time') is-invalid @enderror">
                        @error('activity_time') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Poster</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" 
                                id="file-input" 
                                name="poster" 
                                value="{{ old('poster') }}"
                                class="form-control @error('poster') is-invalid @enderror">
                        @error('poster') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        <p class="text-danger mt-2">*ukuran gambar tidak bisa lebih dari 1 mb</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Pengisi acara</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" 
                                id="text-input" 
                                name="performer" 
                                placeholder="pengisi acara" 
                                value="{{ old('performer') ? old('performer') : $kegiatan->performer }}"
                                class="form-control @error('performer') is-invalid @enderror">
                        @error('performer') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Tipe jamaah</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select class="form-control" name="audience_type">
                            <option value="{{ $kegiatan->audience_type }}" selected>Jamaah {{ $kegiatan->audience_type }}</option>
                            <option value="umum">Umum</option>
                            <option value="Laki-laki">Jamaah Laki-laki</option>
                            <option value="Perempuan">Jamaah Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Deskripsi kegiatan</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea class="form-control ckeditor @error('activity_detail') is-invalid @enderror" name="activity_detail" value="{{ old('activity_detail') ? old('activity_detail') : $kegiatan->activity_detail }}" cols="120" rows="10">
                            {{ $kegiatan->activity_detail }}
                        </textarea>
                        @error('activity_detail') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection