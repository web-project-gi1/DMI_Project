<?php $__env->startSection('content1'); ?>
<div class="container">
    <form method="post" action="/markAbsence/<?php echo e($id); ?>">
        <?php echo e(csrf_field()); ?>

        <table class="table">
            <thead class="table table-striped table-dark">
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">massar</th>
                    <th scope="col">name</th>
                    <th scope="col">absence</th>
                </tr>
            </thead>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><?php echo e($student->id); ?></th>
                <td><?php echo e($student->massar); ?></td>
                <td><?php echo e($student->name); ?></td>
                <td><input type="checkbox" id="row-1-age" name="absence[]" value="<?php echo e($student->id); ?>"></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <input type="submit" name="submit" value="submit">
    </form>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home_'.ucfirst(\Auth::user()->role), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\echch\OneDrive\Bureau\working\DMIProject\resources\views/markAbsence.blade.php ENDPATH**/ ?>