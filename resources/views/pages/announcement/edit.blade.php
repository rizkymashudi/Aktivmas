@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Pengumuman masjid {{ $announcement->title }}</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('announcements.update', $announcement->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Judul pengumuman</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" 
                                id="text-input" 
                                name="title"" 
                                placeholder="Nama Kegiatan" 
                                value="{{ old('title') ? old('title') : $announcement->title }}"
                                class="form-control @error('title') is-invalid @enderror">
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Detail pengumuman</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea class="form-control ckeditor @error('detail_announcements') is-invalid @enderror" name="detail_announcements" value="{{ old('detail_announcements') ? old('detail_announcements') : $announcement->detail_announcements }}" cols="120" rows="10"></textarea>
                        @error('detail_announcements') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection