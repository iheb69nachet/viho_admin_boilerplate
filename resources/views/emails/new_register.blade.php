<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Registration Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        ul li {
            background: #f9f9f9;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #999;
        }
        .section-title {
            margin-top: 20px;
            color: #555;
            font-size: 1.2em;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>New Registration Received</h1>
        <p>A new flight registration has been submitted with the following details:</p>

        <!-- Participant Data -->
        <div class="section-title">Données Participant</div>
        <ul>
            <li><strong>Prénom:</strong> {{ $flightDetail->firstName ?? 'N/A' }}</li>
            <li><strong>Nom:</strong> {{ $flightDetail->lastName ?? 'N/A' }}</li>
            <li><strong>Téléphone:</strong> {{ $flightDetail->phone ?? 'N/A' }}</li>
            <li><strong>Email:</strong> {{ $flightDetail->email ?? 'N/A' }}</li>
        </ul>

        <!-- Passport and License Data -->
        <div class="section-title">Coordonnées Passeport & Licence</div>
        <ul>
            <li><strong>N° Passeport:</strong> {{ $flightDetail->passportNumber ?? 'N/A' }}</li>
            <li><strong>Nationalité:</strong> {{ $flightDetail->nationality ?? 'N/A' }}</li>
            <li><strong>Date de Validité:</strong> {{ $flightDetail->passportValidity ?? 'N/A' }}</li>
        </ul>

        <!-- Pilot Information -->
        <div class="section-title">Coordonnées du Pilote</div>
        <ul>
            <li><strong>Prénom Pilote:</strong> {{ $flightDetail->pilotFirstName ?? 'N/A' }}</li>
            <li><strong>Nom Pilote:</strong> {{ $flightDetail->pilotLastName ?? 'N/A' }}</li>
            <li><strong>Numéro de Licence:</strong> {{ $flightDetail->licenseNumber ?? 'N/A' }}</li>
            <li><strong>Date Validité:</strong> {{ $flightDetail->licenseValidity ?? 'N/A' }}</li>
            <li><strong>Heure de Vol:</strong> {{ $flightDetail->flightHours ?? 'N/A' }}</li>
        </ul>

        <!-- Aircraft Details -->
        <div class="section-title">Détails de l'Avion</div>
        <ul>
            <li><strong>Propriétaire de l’Avion:</strong> {{ $flightDetail->aircraftOwner ?? 'N/A' }}</li>
            <li><strong>Enregistrement:</strong> {{ $flightDetail->registration ?? 'N/A' }}</li>
            <li><strong>Type d’Avion:</strong> {{ $flightDetail->aircraftType ?? 'N/A' }}</li>
            <li><strong>Autonomie:</strong> {{ $flightDetail->range ?? 'N/A' }} km</li>
            <li><strong>Vitesse Croisière:</strong> {{ $flightDetail->cruiseSpeed ?? 'N/A' }} km/h</li>
            <li><strong>Type de Carburant:</strong> {{ $flightDetail->fuelType ?? 'N/A' }}</li>
            <li><strong>Consommation Horaire:</strong> {{ $flightDetail->hourlyConsumption ?? 'N/A' }} liters</li>
        </ul>

        <!-- Hotel Booking Details -->
        <div class="section-title">Réservation Hôtelière</div>
        @php
            $hotelRoomData = json_decode($flightDetail->hotelRoomType);
        @endphp
        @if($hotelRoomData)
            @foreach($hotelRoomData as $index => $room)
                <ul>
                    <li><strong>Chambre {{ $index + 1 }}:</strong></li>
                    <li><strong>Type de Chambre:</strong> {{ $room->hotelRoomType ?? 'N/A' }}</li>
                    <li><strong>Nom des Participants:</strong>
                        <ul>
                            @foreach($room->participants as $participant)
                                <li>{{ $participant }}</li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            @endforeach
        @endif

        <p>Merci de bien vouloir prendre les mesures nécessaires.</p>

        <p>Best regards,</p>
        <p>Your Flight Registration Team</p>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
