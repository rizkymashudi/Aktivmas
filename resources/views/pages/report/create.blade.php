@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Laporan keuangan</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('report.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Uraian</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea class="form-control ckeditor @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" cols="120" rows="10"></textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Tipe Kas</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select class="form-control" id="kas" name="tipe_kas">
                            <option>--pilih kas--</option>
                            <option value="debet">Debit</option>
                            <option value="kredit">Kredit</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group" id="showdebit" class="kasdiv" style="display: none">
                    <div class="col col-md-3">
                        <label for="text-input" class="form-control-label">Debit</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" 
                                id="text-input" 
                                name="debet" 
                                placeholder="Kas masuk" 
                                min="0.00"
                                value="{{ old('debet') }}"
                                class="form-control number-separator @error('debet') is-invalid @enderror">
                        @error('debet') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="row form-group" id="showkredit" class="kasdiv" style="display: none">
                    <div class="col col-md-3">
                        <label for="text-input" class="form-control-label">Kredit</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" 
                                id="text-input" 
                                name="kredit" 
                                placeholder="Kas keluar"
                                min="0.00"
                                value="{{ old('kredit') }}"
                                class="form-control number-separator @error('kredit') is-invalid @enderror">
                        @error('kredit') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Tanggal</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="datetime-local" 
                                id="text-input" 
                                name="date" 
                                placeholder="Tanggal" 
                                value="{{ old('date') }}"
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

@push('after-script')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#kas').on('change', function(){
                var demovalue = $(this).val();
                
                if(demovalue === "debet"){
                    $('#showdebit').show();
                    $('#showkredit').hide();
                }else{
                    $('#showdebit').hide();
                    $('#showkredit').show();
                }
            });
        });
    </script>
    <script>
        $('.number-separator').keyup(function(event) {
        
        // skip for arrow keys
        if(event.which >= 37 && event.which <= 40) return;
        
        // format number
        $(this).val(function(index, value){
          return value
          .replace(/\D/g, "")
            .replace(/([0-9])([0-9]{2})$/, '$1.$2')  
            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")
          ;
        });
        $(this).siblings('.field__value').val($(this).val().replace(/,/g, ''))
        });
        </script>
@endpush

