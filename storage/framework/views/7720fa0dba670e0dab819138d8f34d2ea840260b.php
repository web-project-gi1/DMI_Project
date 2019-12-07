<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>filieres list of Mathematics and Computer Science Department:</h1>
    <ul>
    <?php $__currentLoopData = $filieres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filiere): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><a href="#"><?php echo e($filiere->name); ?></a></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home_Admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\echch\OneDrive\Bureau\working\DMIProject\resources\views/manage/view_filieres.blade.php ENDPATH**/ ?>