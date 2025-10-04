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
                        <h5>{{$header}}</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <!-- Table for Languages -->
                        <table id="basic-1" class="table table-striped" >
                            <thead>
                                <tr>
                                    @foreach($attributes as $attribute)
                                        <th>{{ ucfirst($attribute) }}</th>
                                    @endforeach
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inscriptions as $inscription)
                                    <tr>
                                        @foreach($attributes as $attribute)
                                            <td>{{ $inscription->$attribute }}</td>
                                        @endforeach
                                        @if($pre)
                                        <td>
                                            <!-- Add your action buttons here -->
                                            <a href="{{ route('inscriptions.complete', $inscription->id) }}" class="btn btn-primary"><i class="fa fa-envelope"></i></a>
                                           
                                        </td>
                                        @else
                                        <td>
                                            <!-- Add your action buttons here -->
                                            <a href="{{ route('inscriptions.show', $inscription->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                           
                                        </td>
                                        @endif
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
