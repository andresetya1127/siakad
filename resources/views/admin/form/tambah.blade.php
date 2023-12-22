@extends('template.template')
@section('content')
    <!-- | Aseet | -->
@section('custom_style')
    {{ css_(['select2', 'select-bootstrap']) }}
@endsection

@section('custom_script')
    {{ js_(['sweatalert', 'select2']) }}
@endsection
<!-- || -->

<div class="card">
    <div class="card-body">
        <form action="{{ $link }}" method="POST">
            @csrf
            <div class="row mt-3">
                @forelse ($input as $key => $val)

                    <div class="mb-3 {{ $val['length'] }}">

                        @if ($val['type'] == 'select')
                            <label class="form-label pt-0"> {{ $val['title'] }}</label>
                            <select name="{{ $val['name'] }}"
                                class="select2 form-control @error($val['name']) is-invalid @enderror" style="width: 100%"
                                required>
                                <option selected disabled>-- Pilih {{ $val['title'] }} --</option>

                                @if (empty($val['value']) && empty($val['sub']))
                                    @foreach ($val['data'] as $dt => $d)
                                        <option value="{{ $dt }}"
                                            {{ $d == old($val['name']) ? 'Selected' : '' }}>
                                            {{ $d }}
                                        </option>
                                    @endforeach
                                @else
                                    @foreach ($val['data'] as $dt)
                                        <option value="{{ $dt[$val['value']] }}"
                                            {{ $dt[$val['value']] == old($val['name']) ? 'Selected' : '' }}>
                                            {{ $dt[$val['sub']] }}
                                        </option>
                                    @endforeach
                                @endif

                            </select>

                            @error($val['name'])
                                <span class="invalid-feedback">*{{ $message }}</span>
                            @enderror
                        @else
                            <label class="form-label pt-0"> {{ $val['title'] }}</label>
                            <div class="">
                                <input class="form-control @error($val['name']) is-invalid @enderror"
                                    name="{{ $val['name'] }}" type="{{ $val['type'] }}"
                                    value="{{ old($val['name']) }}" placeholder="{{ $val['placeholder'] ?? '' }}"
                                    required>
                                @error($val['name'])
                                    <span class="invalid-feedback">*{{ $message }}</span>
                                @enderror
                            </div>
                        @endif
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
