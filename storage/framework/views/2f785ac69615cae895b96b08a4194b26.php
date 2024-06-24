
<?php $__env->startSection('content'); ?>
<div class="container">
   <div class="row">
       <h2>Editar un nueva Tienda</h2>
   </div>
<div class="row">
       <form action="<?php echo e(route('TiendaRopa.update', $Products->id)); ?>" method="post" enctype="multipart/form-data" class="col-lg-7">
           <?php echo csrf_field(); ?> <!-- Protección contra ataques ya implementado en laravel  https://www.welivesecurity.com/la-es/2015/04/21/vulnerabilidad-cross-site-request-forgery-csrf/-->
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
               <label for="name">nombre</label>
               <input type="text" class="form-control" id="name" name="name" value="<?php echo e($Products->name); ?>" />
           </div>
           <div class="form-group">
               <label for="description">Descripción</label>
               <textarea class="form-control" id="description" name="description"><?php echo e($Products->description); ?></textarea>
           </div>
           
           <div class="form-group">
               <label for="price">precio</label>
               <input type="number" class="form-control" id="price" name="price" value="<?php echo e($Products->price); ?>" />
           </div>

           <div class="form-group">
               <label for="category_id">Categoria</label>
               <input type="number" class="form-control" id="category_id" name="category_id" value="<?php echo e($Products->category_id); ?>" />
           </div>

           <div class="form-group">
               <label for="stock">stock</label>
               <input type="number" class="form-control" id="stock" name="stock" value="<?php echo e($Products->stock); ?>" />
           </div>

           <button type="submit" class="btn btn-success">Guardar </button>
       </form>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\Tiendad de ropa\Tiendaropa\resources\views\TiendaRopa\edit.blade.php ENDPATH**/ ?>