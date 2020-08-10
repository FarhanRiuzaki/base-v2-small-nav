@extends('layouts.admin')

@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Flag</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Flag</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Flag</h4>
                    <br>

                    <form action="{{ route('flag.store') }}" method="post">
                        @csrf
                        {{-- CARA LAMA --}}
                        {{-- <div class="form-group">
                            <label for="name">Parent</label>
                            <input type="number" name="parent" class="form-control {{ isValid($errors->has('parent')) }}" required>
                            <p class="invalid-feedback">{{ $errors->first('parent') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="name">Level</label>
                            <input type="number" name="level" class="form-control {{ isValid($errors->has('level')) }}" required>
                            <p class="invalid-feedback">{{ $errors->first('level') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="name">Deskripsi</label>
                            <textarea name="description" id="" class="form-control {{ isValid($errors->has('description')) }}" cols="30" rows="5" required></textarea>
                            <p class="invalid-feedback">{{ $errors->first('description') }}</p>
                        </div> --}}

                        {{-- CARA BARU --}}
                        {{ Form::inputNumber('Parent*','parent') }}
                        {{ Form::inputNumber('Level*','level') }}
                        {{ Form::inputText('Deskripsi*','description') }}

                        {!! Form::submit('Simpan', ['class' => 'btn btn-primary btn-sm']); !!}
                        {{-- <div class="form-group">
                            <button class="btn btn-primary btn-sm">Simpan</button>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="card-title">Data Flag</h4>
                    <br>

                    <table class="table table-bordered dataTable">
                        <thead>
                            <tr>
                                <td width='15px'>ID</td>
                                <td>Parent</td>
                                <td>Level</td>
                                <td>Description</td>
                                <td>Created at</td>
                                {{-- <td>Aksi</td> --}}
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
    $(document).ready(function(){

        option = {
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('flag.index') }}",
            columns: [
                {
                data: 'id',
                name: 'id',
                orderable: false,
                class: "text-center",
                },{
                data: 'parent',
                name: 'parent'
                },
                {
                data: 'level',
                name: 'level'
                },
                {
                data: 'description',
                name: 'description'
                },
                {
                data: 'created_at',
                name: 'created_at',
                class: "text-center",
                },
                // {
                // data: 'action',
                // name: 'action',
                // orderable: false,
                // searchable: false,
                // class: 'text-center'
                // }
            ]
        };
        // FUNCTION DATATABLE DISINI
        $('.dataTable').DataTable(option).on( 'draw', function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    });
    </script>
@endsection
