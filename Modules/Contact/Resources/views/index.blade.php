@extends('layouts.admin.master')
@section('title')Basic Init {{ $title }} @endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">

@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration Starts -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Contacts</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <!-- Table for Languages -->
                        <table id="basic-1" class="table table-striped" >
                            <thead>
                                <tr>
                                    @foreach($attributes as $attribute)
                                        <th>{{ ucfirst($attribute) }}</th>
                                    @endforeach

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $inscription)
                                    <tr>
                                        @foreach($attributes as $attribute)
                                            <td>{{ $inscription->$attribute }}</td>
                                        @endforeach
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
	<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
	@endpush
