

<?php $__env->startSection('title'); ?> Edit User <?php $__env->stopSection(); ?> 

<?php $__env->startSection('content'); ?>
  user yang akan diedit adalah <?php echo e($user->email); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.global', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\larashop_ztnns\resources\views/users/edit.blade.php ENDPATH**/ ?>