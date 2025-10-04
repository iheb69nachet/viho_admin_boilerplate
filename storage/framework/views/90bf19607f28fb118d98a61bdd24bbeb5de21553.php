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
            <li><strong>Prénom:</strong> <?php echo e($flightDetail->firstName ?? 'N/A'); ?></li>
            <li><strong>Nom:</strong> <?php echo e($flightDetail->lastName ?? 'N/A'); ?></li>
            <li><strong>Téléphone:</strong> <?php echo e($flightDetail->phone ?? 'N/A'); ?></li>
            <li><strong>Email:</strong> <?php echo e($flightDetail->email ?? 'N/A'); ?></li>
        </ul>

        <!-- Passport and License Data -->
        <div class="section-title">Coordonnées Passeport & Licence</div>
        <ul>
            <li><strong>N° Passeport:</strong> <?php echo e($flightDetail->passportNumber ?? 'N/A'); ?></li>
            <li><strong>Nationalité:</strong> <?php echo e($flightDetail->nationality ?? 'N/A'); ?></li>
            <li><strong>Date de Validité:</strong> <?php echo e($flightDetail->passportValidity ?? 'N/A'); ?></li>
        </ul>

        <!-- Pilot Information -->
        <div class="section-title">Coordonnées du Pilote</div>
        <ul>
            <li><strong>Prénom Pilote:</strong> <?php echo e($flightDetail->pilotFirstName ?? 'N/A'); ?></li>
            <li><strong>Nom Pilote:</strong> <?php echo e($flightDetail->pilotLastName ?? 'N/A'); ?></li>
            <li><strong>Numéro de Licence:</strong> <?php echo e($flightDetail->licenseNumber ?? 'N/A'); ?></li>
            <li><strong>Date Validité:</strong> <?php echo e($flightDetail->licenseValidity ?? 'N/A'); ?></li>
            <li><strong>Heure de Vol:</strong> <?php echo e($flightDetail->flightHours ?? 'N/A'); ?></li>
        </ul>

        <!-- Aircraft Details -->
        <div class="section-title">Détails de l'Avion</div>
        <ul>
            <li><strong>Propriétaire de l’Avion:</strong> <?php echo e($flightDetail->aircraftOwner ?? 'N/A'); ?></li>
            <li><strong>Enregistrement:</strong> <?php echo e($flightDetail->registration ?? 'N/A'); ?></li>
            <li><strong>Type d’Avion:</strong> <?php echo e($flightDetail->aircraftType ?? 'N/A'); ?></li>
            <li><strong>Autonomie:</strong> <?php echo e($flightDetail->range ?? 'N/A'); ?> km</li>
            <li><strong>Vitesse Croisière:</strong> <?php echo e($flightDetail->cruiseSpeed ?? 'N/A'); ?> km/h</li>
            <li><strong>Type de Carburant:</strong> <?php echo e($flightDetail->fuelType ?? 'N/A'); ?></li>
            <li><strong>Consommation Horaire:</strong> <?php echo e($flightDetail->hourlyConsumption ?? 'N/A'); ?> liters</li>
        </ul>

        <!-- Hotel Booking Details -->
        <div class="section-title">Réservation Hôtelière</div>
        <?php
            $hotelRoomData = json_decode($flightDetail->hotelRoomType);
        ?>
        <?php if($hotelRoomData): ?>
            <?php $__currentLoopData = $hotelRoomData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <ul>
                    <li><strong>Chambre <?php echo e($index + 1); ?>:</strong></li>
                    <li><strong>Type de Chambre:</strong> <?php echo e($room->hotelRoomType ?? 'N/A'); ?></li>
                    <li><strong>Nom des Participants:</strong>
                        <ul>
                            <?php $__currentLoopData = $room->participants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($participant); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                </ul>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <p>Merci de bien vouloir prendre les mesures nécessaires.</p>

        <p>Best regards,</p>
        <p>Your Flight Registration Team</p>

        <div class="footer">
            <p>&copy; <?php echo e(date('Y')); ?> Your Company Name. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
<?php /**PATH /home/aeroralltt/admin/resources/views/emails/new_register.blade.php ENDPATH**/ ?>