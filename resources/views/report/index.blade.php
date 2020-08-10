@extends('layouts.admin')

@section('title')
    Report
@endsection

@section('content')
    @breadcrumb
        @slot('header')
            LAPORAN NILAI DAN PENEMPATAN DANA FLOAT
        @endslot

    @endbreadcrumb

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                @card
                    {{ Form::inputSelectRow('Tipe Laporan', 'type', ['1' => 'MEGACASH', '2' => 'MMONEY']) }}
                    {{ Form::inputTextRow('Date', 'date', null, 'datepicker', ['autocomplete'=>'off']) }}

                    <button class="btn btn-warning">Download</button>
                @endcard
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>

    </script>
@endsection
