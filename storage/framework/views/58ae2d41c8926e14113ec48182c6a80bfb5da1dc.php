<?php $__env->startSection('title'); ?> Basic Init <?php echo e($title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <!-- Add any custom CSS here -->
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
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
                            <p><?php echo e($id->id); ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Email:</strong>
                            <p><?php echo e($id->email); ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>First Name:</strong>
                            <p><?php echo e($id->firstName); ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Last Name:</strong>
                            <p><?php echo e($id->lastName); ?></p>
                        </div>
                       
                        <div class="col-md-6 mb-3">
                            <strong>Phone:</strong>
                            <p><?php echo e($id->phone); ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Address:</strong>
                            <p><?php echo e($id->address); ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Aircraft Owner:</strong>
                            <p><?php echo e($id->aircraftOwner); ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Aircraft Type:</strong>
                            <p><?php echo e($id->aircraftType); ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Cruise Speed:</strong>
                            <p><?php echo e($id->cruiseSpeed); ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Flight Hours:</strong>
                            <p><?php echo e($id->flightHours); ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Fuel Type:</strong>
                            <p><?php echo e($id->fuelType); ?></p>
                        </div>
                                                <?php
                            $hotelRoomData = json_decode($id->hotelRoomType);
                        ?>

                        <?php $__currentLoopData = $hotelRoomData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 mb-3">
                                <strong>Hotel Room Type:</strong>
                                <p><?php echo e($room->hotelRoomType); ?></p>
                                <strong>Participants:</strong>
                                <ul>
                                    <?php $__currentLoopData = $room->participants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($participant); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 mb-3">
                            <strong>Hourly Consumption:</strong>
                            <p><?php echo e($id->hourlyConsumption); ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>License Number:</strong>
                            <p><?php echo e($id->licenseNumber); ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>License Validity:</strong>
                            <p><?php echo e($id->licenseValidity); ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Nationality:</strong>
                            <p><?php echo e($id->nationality); ?></p>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <strong>Passport Number:</strong>
                            <p><?php echo e($id->passportNumber); ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Passport Validity:</strong>
                            <p><?php echo e($id->passportValidity); ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Pilot First Name:</strong>
                            <p><?php echo e($id->pilotFirstName); ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Pilot Last Name:</strong>
                            <p><?php echo e($id->pilotLastName); ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Range:</strong>
                            <p><?php echo e($id->range); ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Registration:</strong>
                            <p><?php echo e($id->registration); ?></p>
                        </div>
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aeroralltt/admin/Modules/Inscription/Resources/views/details.blade.php ENDPATH**/ ?>