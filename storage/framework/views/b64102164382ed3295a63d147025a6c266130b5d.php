<?php $__env->startSection('content'); ?>
<div class="container">
    <form action="/AddStudent" method="POST">
        <?php echo e(csrf_field()); ?>


        <div class="form-group">
            <label for="usr">name:</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="usr">Massar:</label>
            <input type="text" name="massar" class="form-control">
        </div>
        <div class="form-group">
            <label for="usr">Level:</label>
            <select name="level" class="form-control">
                <option value="">--Please choose a level--</option>
                <?php $__currentLoopData = $filiere; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php for($i=2;$i<=$val->nb_semestre;$i+=2): ?>
                        <option value="<?php echo e($val->code); ?> <?php echo e($i/2); ?>"><?php echo e($val->code); ?><?php echo e($i/2); ?></option>
                    <?php endfor; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <br>
        <input type="submit" value="Add Student" class="btn btn-primary">
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home_Admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\echch\OneDrive\Bureau\working\DMIProject\resources\views/manage/AddStudent.blade.php ENDPATH**/ ?>