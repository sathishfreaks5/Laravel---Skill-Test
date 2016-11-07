<?php if(session()->has('flash_message')): ?>
    <script type="text/javascript">
        swal({
            title: "<?php echo e(session('flash_message.title')); ?>",
            text: "<?php echo e(session('flash_message.message')); ?>",
            type: "<?php echo e(session('flash_message.level')); ?>",
            timer: 1700,
            showConfirmButton: false
        });
    </script>
    <?php echo e(session()->forget('flash_message')); ?>

<?php endif; ?>

<?php if(session()->has('flash_message_overlay')): ?>
    <script type="text/javascript">
        swal({
            title: "<?php echo e(session('flash_message_overlay.title')); ?>",
            text: "<?php echo e(session('flash_message_overlay.message')); ?>",
            type: "<?php echo e(session('flash_message_overlay.level')); ?>",
            confirmButtonText: 'Okay'
        });
    </script>
    <?php echo e(session()->forget('flash_message_overlay')); ?>

<?php endif; ?>

