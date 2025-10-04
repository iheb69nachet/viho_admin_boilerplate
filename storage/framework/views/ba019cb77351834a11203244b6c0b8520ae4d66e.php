

<?php $__env->startSection('title'); ?>Translations for Language <?php echo e($language->name); ?> <?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3>Translations</h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item"><a href="">Languages</a></li>
        <li class="breadcrumb-item active">Translations</li>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid">
        <div class="row">
            <!-- Translations Table Starts -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Translations for <?php echo e($language->name); ?></h5>
                    </div>
                    <div class="card-body">
                        <!-- Button to Add New Row -->
                        <button id="addRowBtn" class="btn btn-primary mb-3">Add New Translation</button>

                        <!-- Table for Translation Keys -->
                        <table id="translationsTable" class="table">
                            <thead>
                                <tr>
                                    <th>Parent Key</th>
                                    <th>Key</th>
                                    <th>Value</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="translationsTableBody">
                                <!-- Translation rows will be inserted here -->
                                <?php $__currentLoopData = $translations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $translation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-key="<?php echo e($translation->key); ?>">
                                        <td><input type="text" class="form-control" name="parent_key" value="<?php echo e($translation->parent_key); ?>" disabled></td>
                                        <td><input type="text" class="form-control" name="key" value="<?php echo e($translation->key); ?>" disabled></td>
                                        <td><input type="text" class="form-control" name="value" value="<?php echo e($translation->value); ?>"></td>
                                        <td>
                                            <button class="btn btn-primary btn-save" data-key="<?php echo e($translation->key); ?>" data-language="<?php echo e($language->id); ?>">Save</button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <a href="<?php echo e(route('translations.create', ['language' => $language->id])); ?>" class="btn btn-success">Add Translation</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Adding New Translation -->
    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-labelledby="addRowModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRowModalLabel">Add New Translation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addRowForm">
                        <div class="form-group">
                            <label for="parent_key">Parent Key</label>
                            <input type="text" class="form-control" id="parent_key" name="parent_key" required>
                        </div>
                        <div class="form-group">
                            <label for="key">Key</label>
                            <input type="text" class="form-control" id="key" name="key" required>
                        </div>
                        <div class="form-group">
                            <label for="value">Value</label>
                            <input type="text" class="form-control" id="value" name="value" required>
                        </div>
                        <input type="hidden" id="language_id" name="language_id" value="<?php echo e($language->id); ?>">
                        <button type="submit" class="btn btn-primary">Add Translation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#translationsTable').DataTable();

        // Show modal for adding new row
        $('#addRowBtn').click(function() {
            $('#addRowModal').modal('show');
        });

        // Save button click handler
        $(document).on('click', '.btn-save', function() {
            var row = $(this).closest('tr');
            var key = $(this).data('key');
            var languageId = $(this).data('language');
            var parentKey = row.find('input[name="parent_key"]').val();
            var translationKey = row.find('input[name="key"]').val();
            var value = row.find('input[name="value"]').val();
            axios.put(`/api/languages/${languageId}/translations/${key}`, {
                parent_key: parentKey,
                key: translationKey,
                value: value
            })
            .then(response => {
                alert('Translation updated successfully');
            })
            .catch(error => {
                alert('Failed to update translation');
            });
        });

        // Handle form submission for adding new row
        $('#addRowForm').submit(function(e) {
            e.preventDefault();
            var parentKey = $('#parent_key').val();
            var key = $('#key').val();
            var value = $('#value').val();
            var languageId = $('#language_id').val();

            // Perform the Axios call to add the new translation
            axios.post(`/api/translations/${languageId}/${key}`, {
                parent_key: parentKey,
                key: key,
                value: value
            })
            .then(response => {
                // Optionally add the new row to the table or refresh the table
              //  $('#translationsTable').DataTable().ajax.reload();
                $('#addRowModal').modal('hide');
                alert('Translation added successfully');
            })
            .catch(error => {
                console.log(error.message);
                
                alert('Failed to add translation');
            });
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aeroralltt/admin/Modules/Translation/Resources/views/translations.blade.php ENDPATH**/ ?>