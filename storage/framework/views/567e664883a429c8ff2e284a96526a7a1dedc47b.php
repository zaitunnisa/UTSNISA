

<?php $__env->startSection("title"); ?> Users list <?php $__env->stopSection(); ?> 

<?php $__env->startSection("content"); ?>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-stripped">
        <thead>
            <tr>
            <th><b>Name</b></th>
            <th><b>Slug</b></th>
            <th><b>Image</b></th>
            <th><b>Actions</b></th>
            </tr>
        </thead>

        <tbody>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($category->name); ?></td>
                <td><?php echo e($category->slug); ?></td>
                <td>
                <?php if($category->image): ?>
                    <img 
                     src="<?php echo e(asset('storage/' . $category->image)); ?>" 
                     width="48px"/>
                <?php else: ?> 
                No image
                <?php endif; ?>
                </td>
                <td>
                [TODO: actions]
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
          <tr>
            <td colSpan="10">
              <?php echo e($categories->appends(Request::all())->links()); ?>

            </td>
          </tr>
        </tfoot>
        </table>
    </div>
</div>

<th><b>USERS LIST</b></th>

<form action="<?php echo e(route('users.index')); ?>">
    <div class="row">
    <div class="col-md-6">
        <input 
          value="<?php echo e(Request::get('keyword')); ?>" 
          name="keyword" 
          class="form-control" 
          type="text" 
          placeholder="Masukan email untuk filter..."/>
    </div>
    <div class="col-md-6">
        <input <?php echo e(Request::get('status') == 'ACTIVE' ? 'checked' : ''); ?> 
          value="ACTIVE" 
          name="status" 
          type="radio" 
          class="form-control" 
          id="active">
          <label for="active">Active</label>

        <input <?php echo e(Request::get('status') == 'INACTIVE' ? 'checked' : ''); ?> 
          value="INACTIVE" 
          name="status" 
          type="radio" 
          class="form-control" 
          id="inactive">
          <label for="inactive">Inactive</label>

        <input 
          type="submit" 
          value="Filter" 
          class="btn btn-primary">
    </div>
    </div>
</form>

    <br>

    <?php if(session('status')): ?>
    <div class="alert alert-success">
      <?php echo e(session('status')); ?>

    </div>
    <?php endif; ?> 

    <div class="row">
      <div class="col-md-12 text-right">
      <a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary">Create user</a>
      </div>
    </div>
    <br>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th><b>Name</b></th>
          <th><b>Username</b></th>
          <th><b>Email</b></th>
          <th><b>Avatar</b></th>
          <th><b>Status</b></th>
          <th><b>Action</b></th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($user->name); ?></td>
            <td><?php echo e($user->username); ?></td>
            <td><?php echo e($user->email); ?></td>
            <td>
              <?php if($user->avatar): ?>
              <img src="<?php echo e(asset('storage/'.$user->avatar)); ?>" width="70px"/> 
              <?php else: ?> 
              N/A
              <?php endif; ?>

            </td>
            <td>
              <?php if($user->status == "ACTIVE"): ?>
                <span class="badge badge-success">
                  <?php echo e($user->status); ?>

                  </span>
              <?php else: ?> 
                <span class="badge badge-danger">
                  <?php echo e($user->status); ?>

                </span>
              <?php endif; ?>
            </td>
            <td>
              <a 
                class="btn btn-info text-white btn-sm" 
                href="<?php echo e(route('users.edit', [$user->id])); ?>">Edit</a>

              <a 
                href="<?php echo e(route('users.show', [$user->id])); ?>" 
                class="btn btn-primary btn-sm">Detail</a>

              <form 
                onsubmit="return confirm('Delete this user permanently?')" 
                class="d-inline" 
                action="<?php echo e(route('users.destroy', [$user->id ])); ?>" 
                method="POST">

                <?php echo csrf_field(); ?>

                <input 
                  type="hidden" 
                  name="_method" 
                  value="DELETE">

                <input 
                  type="submit" 
                  value="Delete" 
                  class="btn btn-danger btn-sm">
              </form>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        <tfoot>
          <tr>
          <td colspan=10>
              <?php echo e($users->links()); ?>

            </td>
          </tr>
        </tfoot>
      </tbody>
      <tfoot>
    <tr>
        <td colspan=10>
            <?php echo e($users->links()); ?>

        </td>
    </tr>
</tfoot>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.global", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\larashop_ztnns\resources\views/users/index.blade.php ENDPATH**/ ?>