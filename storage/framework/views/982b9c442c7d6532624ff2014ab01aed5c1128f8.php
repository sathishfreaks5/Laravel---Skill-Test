<?php $__env->startSection('content'); ?>
    <h1>Products</h1>
    <h2><span class="label label-<?php echo e($actionClass); ?>"><?php echo e($actionText); ?></span></h2>
    <form id="form-products" method="<?php echo e($method); ?>" action="<?php echo e($url); ?>">
        <?php echo e(csrf_field()); ?>

        <?php echo $__env->make('products.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>