@extends('layouts.admin.master')
@section('title') Basic Init {{ $title }} @endsection

@push('css')
    <!-- Add any custom CSS here -->
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>User Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>ID:</strong>
                            <p>{{ $id->id }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Email:</strong>
                            <p>{{ $id->email }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>First Name:</strong>
                            <p>{{ $id->firstName }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Last Name:</strong>
                            <p>{{ $id->lastName }}</p>
                        </div>
                       
                        <div class="col-md-6 mb-3">
                            <strong>Phone:</strong>
                            <p>{{ $id->phone }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Address:</strong>
                            <p>{{ $id->address }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Aircraft Owner:</strong>
                            <p>{{ $id->aircraftOwner }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Aircraft Type:</strong>
                            <p>{{ $id->aircraftType }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Cruise Speed:</strong>
                            <p>{{ $id->cruiseSpeed }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Flight Hours:</strong>
                            <p>{{ $id->flightHours }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Fuel Type:</strong>
                            <p>{{ $id->fuelType }}</p>
                        </div>
                                                @php
                            $hotelRoomData = json_decode($id);
                        @endphp

                        @foreach($hotelRoomData as $room)
                            <div class="col-md-6 mb-3">
                                <strong>Hotel Room Type:</strong>
                                <p>{{ $room->hotelRoomType }}</p>
                                <strong>Participants:</strong>
                                <ul>
                                    @foreach($room->participants as $participant)
                                        <li>{{ $participant }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                        <div class="col-md-6 mb-3">
                            <strong>Hourly Consumption:</strong>
                            <p>{{ $id->hourlyConsumption }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>License Number:</strong>
                            <p>{{ $id->licenseNumber }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>License Validity:</strong>
                            <p>{{ $id->licenseValidity }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Nationality:</strong>
                            <p>{{ $id->nationality }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Participants:</strong>
                            @foreach($id->participants as $part)

                            <p>{{ $part }}</p>

                            @endforeach
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Passport Number:</strong>
                            <p>{{ $id->passportNumber }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Passport Validity:</strong>
                            <p>{{ $id->passportValidity }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Pilot First Name:</strong>
                            <p>{{ $id->pilotFirstName }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Pilot Last Name:</strong>
                            <p>{{ $id->pilotLastName }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Range:</strong>
                            <p>{{ $id->range }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Registration:</strong>
                            <p>{{ $id->registration }}</p>
                        </div>
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
