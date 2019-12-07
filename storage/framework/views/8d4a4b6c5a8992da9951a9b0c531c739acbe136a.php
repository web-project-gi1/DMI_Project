<?php $__env->startSection('content1'); ?>
<div class="container">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#id</th>
                <th scope="col">massar</th>
                <th scope="col">name</th>
                <th scope="col">level</th>
            </tr>
        </thead>
        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($student->id); ?></th>
            <td><?php echo e($student->massar); ?></td>
            <td><?php echo e($student->name); ?></td>
            <td><?php echo e($student->level); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <a class="btn btn-warning" href="<?php echo e(route('export')); ?>"> Export students liste</a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home_'.ucfirst(\Auth::user()->role), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\echch\OneDrive\Bureau\working\DMIProject\resources\views/manage/afficheStudents.blade.php ENDPATH**/ ?>