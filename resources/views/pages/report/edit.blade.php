@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Laporan keuangan {{ date('l, j \\ F Y', strtotime($kas->date)) }}</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('report.update', $kas->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Uraian</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea class="form-control ckeditor @error('description') is-invalid @enderror" name="description" value="{{ old('description') ? old('description') : $kas->description }}" cols="120" rows="10">{{ $kas->description }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                @if ($kas->debet)
                    <div class="row form-group" id="showdebit" class="kasdiv">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Debit</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" 
                                    id="text-input" 
                                    name="debet" 
                                    placeholder="Kas masuk" 
                                    min="0.00"
                                    value="{{ old('debet') ? old('debet') : $kas->debet }}"
                                    class="form-control @error('debet') is-invalid @enderror">
                            @error('debet') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                @else
                    <div class="row form-group" id="showkredit" class="kasdiv">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label">Kredit</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" 
                                    id="text-input" 
                                    name="kredit" 
                                    placeholder="Kas keluar"
                                    min="0.00"
                                    value="{{ old('kredit') ? old('kredit') : $kas->credit }}"
                                    class="form-control @error('kredit') is-invalid @enderror">
                            @error('kredit') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                @endif
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Tanggal</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="datetime-local" 
                                id="text-input" 
                                name="date" 
                                placeholder="Tanggal" 
                                value="{{ old('date') ? old('date') : $kas->date }}"
                                class="form-control @error('date') is-invalid @enderror">
                        @error('date') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
