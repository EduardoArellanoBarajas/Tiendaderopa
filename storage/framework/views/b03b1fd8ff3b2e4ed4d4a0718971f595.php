
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <h2>Editar Tienda</h2>
    </div>
    <div class="row">
        <form action="<?php echo e(route('categories.update', $categories->id)); ?>" method="post" enctype="multipart/form-data" class="col-lg-7">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($categories->name); ?>" />
            </div>
           
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\Tiendad de ropa\Tiendaropa\resources\views/categories/edit.blade.php ENDPATH**/ ?>