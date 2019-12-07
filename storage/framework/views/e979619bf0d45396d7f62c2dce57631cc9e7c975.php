<?php $__env->startSection('content'); ?>
<section class="col-lg-10">
    <div class="container">
        <form action="/AddFiliere" method="POST">
        <?php echo e(csrf_field()); ?>


            <div class="form-group">
                <label for="usr">Filiere name:</label>
                <input type="text" name="filiere_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="usr">Filiere code:</label>
                <input type="text" name="filiere_code" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="usr">Number of semestres:</label>
                <input type="text" name="nb_semestre" class="form-control" required>
            </div>
            <br>
            <input type="submit" value="Create Filiere" class="btn btn-primary">
        </form>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home_Admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\echch\OneDrive\Bureau\working\DMIProject\resources\views/manage/AddFiliere.blade.php ENDPATH**/ ?>