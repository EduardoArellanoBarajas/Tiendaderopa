<li <?php if(isset($item['id'])): ?> id="<?php echo e($item['id']); ?>" <?php endif; ?> class="nav-header <?php echo e($item['class'] ?? ''); ?>">

    <?php echo e(is_string($item) ? $item : $item['header']); ?>


</li>
<?php /**PATH C:\xampp2\htdocs\Tiendad de ropa\Tiendaropa\vendor\jeroennoten\laravel-adminlte\resources\views\partials\sidebar\menu-item-header.blade.php ENDPATH**/ ?>