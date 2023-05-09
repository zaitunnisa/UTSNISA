

<?php $__env->startSection('title'); ?> Detail user <?php $__env->stopSection(); ?> 

<?php $__env->startSection('content'); ?>

<?php $__env->stopSection(); ?>
<div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <b>Name:</b> <br/>
        <?php echo e($user->name); ?>

        <br><br>

        <?php if($user->avatar): ?>
          <img src="<?php echo e(asset('storage/'. $user->avatar)); ?>" width="128px"/>
        <?php else: ?> 
          No avatar
        <?php endif; ?> 

        <br>
        <br>
        <b>Username:</b><br>
        <?php echo e($user->email); ?>


        <br>
        <br>
        <b>Phone number</b> <br>
        <?php echo e($user->phone); ?>


        <br><br>
        <b>Address</b> <br>
        <?php echo e($user->address); ?>


        <br>
        <br>
        <b>Roles:</b> <br>
        <?php $__currentLoopData = json_decode($user->roles); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            &middot; <?php echo e($role); ?> <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
<?php echo $__env->make('layouts.global', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\larashop_ztnns\resources\views/users/show.blade.php ENDPATH**/ ?>