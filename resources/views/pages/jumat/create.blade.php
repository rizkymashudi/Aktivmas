@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Jadwal khotbah jumat</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('jumat.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Photo khotib</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" 
                                id="file-input" 
                                name="photo"
                                class="form-control @error('photo') is-invalid @enderror">
                        @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        <p class="text-danger mt-2">*ukuran gambar tidak bisa lebih dari 1 mb</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">khotib</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" 
                                id="text-input" 
                                name="name" 
                                placeholder="nama khotib" 
                                value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Tanggal Kegiatan</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="date" 
                                id="text-input" 
                                name="date" 
                                placeholder="Tanggal khotbah jumat" 
                                value="{{ old('date') }}"
                                class="form-control @error('date') is-invalid @enderror">
                        @error('date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Khotbah dimulai pukul</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="time" 
                                id="text-input" 
                                name="time_khotbah" 
                                placeholder="Waktu khotbah" 
                                value="{{ old('time_khotbah') }}"
                                class="form-control @error('time_khotbah') is-invalid @enderror">
                        @error('time_khotbah') <div class="invalid-feedback">{{ $message }}</div> @enderror
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