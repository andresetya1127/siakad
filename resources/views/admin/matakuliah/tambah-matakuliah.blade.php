@extends('template.template')
@section('content')
@php
$input = [
['title'=>'Kode Matakuliah','type'=>'text','name'=>'kode_mk','placeholder'=>'Kode Matakuliah...'],
['title'=>'Nama Matakuliah','type'=>'text','name'=>'nama_mk','placeholder'=>'Nama Matakuliah...'],
['title'=>'Jenis Matakuliah','type'=>'text','name'=>'jenis_mk','placeholder'=>'Jenis Matakuliah...'],
['title'=>'SKS Tatap Muka','type'=>'number','name'=>'sks_tatap_muka','placeholder'=>'SKS Tatap Muka...'],
['title'=>'SKS Praktek','type'=>'number','name'=>'sks_praktek','placeholder'=>'SKS Praktek...'],
['title'=>'SKS Praktek Lapangan','type'=>'number','name'=>'sks_praktek_lapangan','placeholder'=>'SKS Praktek...'],
['title'=>'SKS Simulasi','type'=>'number','name'=>'sks_simulasi','placeholder'=>'SKS Simulasi...'],
];
@endphp

<div class="card">
    <div class="card-body">
        <form action="{{ route('save.matakuliah') }}" method="POST">
            @csrf
            <div class="row mt-3">
                @foreach ($input as $key => $val)
                <div class="col-xxl-4 col-xl-6 col-md-6 mb-3">
                    <label class="form-label pt-0"> {{ $val['title'] }}</label>
                    <div class="">
                        <input class="form-control @error($val['name']) is-invalid @enderror" name="{{ $val['name'] }}" type="{{ $val['type'] }}" value="{{ old($val['name']) }}" placeholder="{{ $val['placeholder'] }}">
                        @error($val['name'])
                        <span class="invalid-feedback">*{{$message}}</span>
                        @enderror
                    </div>
                </div>
                @endforeach
                <div class="col-12 text-end">
                    <button class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
