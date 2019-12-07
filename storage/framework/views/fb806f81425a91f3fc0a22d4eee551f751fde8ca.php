<?php $__env->startSection('content'); ?>
<div class="container">
    <form action="/AddElement" method="POST">
        <?php echo e(csrf_field()); ?>


        <div class="form-group">
            <label for="usr">Module name:</label>
            <input type="text" name="module" class="form-control">
        </div>
        <div class="form-group">
            <label for="usr">Element name:</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="usr">Element code:</label>
            <input type="text" name="code" class="form-control">
        </div>
        <div class="form-group">
            <label for="usr">teacher of Element:</label>
            <input type="text" name="teacher" class="form-control">
        </div>
        <br>
        <input type="submit" value="Add Element" class="btn btn-primary">
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\echch\OneDrive\Bureau\working\DMIProject\resources\views/manage/AddElement.blade.php ENDPATH**/ ?>