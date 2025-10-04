{{-- resources/views/languages.blade.php --}}
@extends('layouts.admin.master')
@section('title')Basic Init {{ $title }} @endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Basic DataTables</h3>
        @endslot
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item">Data Tables</li>
        <li class="breadcrumb-item active">Basic Init</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration Starts -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Languages</h5>
                    </div>
                    <div class="card-body">
                        <!-- Table for Languages -->
                        <table id="languagesTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($languages as $language)
                                    <tr data-id="{{ $language->id }}">
                                        <td>{{ $language->id }}</td>
                                        <td>{{ $language->name }}</td>
                                        <td>
                                            <a href="{{ route('translations.index', ['language' => $language->id]) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#languagesTable').DataTable();
    });
</script>
@endpush
