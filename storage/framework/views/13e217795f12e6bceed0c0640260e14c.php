
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <h2>Editar Tienda</h2>
    </div>
    <div class="row">
        <form action="<?php echo e(route('TiendaRopa.update', $Products->id)); ?>" method="post" enctype="multipart/form-data" class="col-lg-7">
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
                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($Products->name); ?>" />
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control" id="description" name="description"><?php echo e($Products->description); ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo e($Products->price); ?>" />
            </div>
           
        <div class="form-group">
            <label for="category_id">Categoría</label>
            <select class="form-control" id="category_id" name="category_id">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>" <?php echo e($Products->category_id == $category->id ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" value="<?php echo e($Products->stock); ?>" />
            </div>
            <div class="form-group">
                <label for="images">Imágenes</label>
                <input type="file" class="form-control" id="images" name="images[]" multiple />
                <div class="mt-2">
                    <?php $__currentLoopData = json_decode($Products->images, true) ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-inline-block">
                            <img src="<?php echo e(asset('storage/' . $image)); ?>" alt="Imagen del Producto" width="100">
                            <input type="checkbox" name="removed_images[]" value="<?php echo e($image); ?>"> Eliminar
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\Tiendad de ropa\Tiendaropa\resources\views/TiendaRopa/edit.blade.php ENDPATH**/ ?>