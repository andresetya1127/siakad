@extends('template.template')
@section('content')
@php
$input = [
['title'=>'Kode Matakuliah','type'=>'text','name'=>'kode_mk','placeholder'=>'Kode Matakuliah...','value'=>$matakuliah->kode_mk],
['title'=>'Nama Matakuliah','type'=>'text','name'=>'nama_mk','placeholder'=>'Nama Matakuliah...','value'=>$matakuliah->nama_mk],
['title'=>'Jenis Matakuliah','type'=>'text','name'=>'jenis_mk','placeholder'=>'Jenis Matakuliah...','value'=>$matakuliah->jenis_mk],
['title'=>'SKS Tatap Muka','type'=>'number','name'=>'sks_tatap_muka','placeholder'=>'SKS Tatap Muka...','value'=>$matakuliah->sks_tatap_muka],
['title'=>'SKS Praktek','type'=>'number','name'=>'sks_praktek','placeholder'=>'SKS Praktek...','value'=>$matakuliah->sks_praktek],
['title'=>'SKS Praktek Lapangan','type'=>'number','name'=>'sks_praktek_lapangan','placeholder'=>'SKS Praktek lapangan...','value'=>$matakuliah->sks_praktek_lapangan],
['title'=>'SKS Simulasi','type'=>'number','name'=>'sks_simulasi','placeholder'=>'SKS Simulasi...','value'=>$matakuliah->sks_simulasi],
];
@endphp

<div class="card">
    <div class="card-body">
        <form action="{{ route('update.matakuliah',$matakuliah->id_matkul) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row mt-3">
                @foreach ($input as $key => $val)
                <div class="col-xxl-4 col-xl-6 col-md-6 mb-3">
                    <label class="form-label pt-0"> {{ $val['title'] }}</label>
                    <div class="">
                        <input class="form-control @error($val['name']) is-invalid @enderror" name="{{ $val['name'] }}" type="{{ $val['type'] }}" value="{{ $val['value']  }}" placeholder="{{ $val['placeholder'] }}">
                        @error($val['name'])
                        <span class="invalid-feedback">*{{$message}}</span>
                        @enderror
                    </div>
                </div>
                @endforeach
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
