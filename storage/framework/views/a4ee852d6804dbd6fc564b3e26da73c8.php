<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda de Ropa</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .carousel-item {
            height: 100vh;
            min-height: 300px;
            background: no-repeat center center scroll;
            background-size: cover;
        }
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
        }
        .producto-img {
            height: 300px; /* Altura fija para todas las imágenes de productos */
            object-fit: cover; /* Ajustar la imagen dentro del contenedor */
        }
        .btn-buy {
            background-color: #ff0000; /* Cambia el color del botón */
            border-color: #ff0000; /* Cambia el borde del botón */
        }
        .btn-buy.disabled {
            background-color: #ccc; /* Color del botón deshabilitado */
            border-color: #ccc; /* Borde del botón deshabilitado */
            cursor: not-allowed; /* Cursor no permitido */
        }
    </style>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="<?php echo e(asset('images/carousel/logo.png')); ?>" width="30" height="30" class="d-inline-block align-top" alt="">
        AltaFacha
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#playeras">Playeras</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#pantalones">Pantalones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#sudaderas">Sudaderas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#mochilas">Mochilas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('login')); ?>">Iniciar sesión</a>
            </li>
            <?php if(Route::has('register')): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('register')); ?>">Registrarse</a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('/cart')); ?>">
                    <i class="fas fa-shopping-cart"></i> Carrito
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- Carrusel de Bootstrap -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="max-width: 1280px; margin: auto;">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" style="max-height: 600px;">
        <div class="carousel-item active">
            <img src="<?php echo e(asset('images/carousel/imagen4.jpg')); ?>" class="d-block w-100" alt="Imagen 1">
            <div class="carousel-caption d-none d-md-block">
                <!-- Aquí puedes agregar texto descriptivo si lo deseas -->
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?php echo e(asset('images/carousel/imagen2.jpg')); ?>" class="d-block w-100" alt="Imagen 2">
            <div class="carousel-caption d-none d-md-block">
                <!-- Aquí puedes agregar texto descriptivo si lo deseas -->
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?php echo e(asset('images/carousel/imagen3.jpg')); ?>" class="d-block w-100" alt="Imagen 3">
            <div class="carousel-caption d-none d-md-block">
                <!-- Aquí puedes agregar texto descriptivo si lo deseas -->
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?php echo e(asset('images/carousel/imagen5.jpg')); ?>" class="d-block w-100" alt="Imagen 4">
            <div class="carousel-caption d-none d-md-block">
                <!-- Aquí puedes agregar texto descriptivo si lo deseas -->
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
    </a>
</div>

<div class="container mt-5">

    <?php $__currentLoopData = $groupedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryId => $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $categoryName = $products->first()->category ? $products->first()->category->name : 'Sin categoría';
        ?>
        <div class="mb-4" id="<?php echo e(strtolower(str_replace(' ', '-', $categoryName))); ?>">
            <h2 class="text-center mb-4"><?php echo e($categoryName); ?></h2>
            <div class="row">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo e($product->imagen); ?>" class="card-img-top producto-img" alt="Imagen del Producto">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($product->name); ?></h5>
                            <p class="card-text">$<?php echo e($product->price); ?></p>
                            <?php if(auth()->check()): ?>
                                <button type="submit" class="btn btn-success btn-buy">Comprar</button>
                            <?php else: ?>
                                <button type="submit" class="btn btn-primary">Comprar</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

<!-- Footer -->
<footer class="bg-light text-center text-lg-start">
    <div class="container p-4">
        <div class="row">
            <!-- Contacto -->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Contacto</h5>
                <p>
                    Email: contacto@tiendaderopa.com<br>
                    Teléfono: +123 456 7890
                </p>
            </div>
            <!-- Dirección -->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Dirección</h5>
                <p>
                    Calle Falsa 123<br>
                    Ciudad, País
                </p>
            </div>
        </div>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2024 Derechos Reservados:
        <a class="text-dark" href="#">Tienda de Ropa</a>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php $__env->startSection('js'); ?>
<!-- Tu código JavaScript personalizado si tienes alguno -->
<script src="<?php echo e(asset('js/index.js')); ?>"></script>
<?php echo $__env->yieldSection(); ?>

</body>
</html>
<?php /**PATH C:\xampp2\htdocs\Tiendad de ropa\Tiendaropa\resources\views/welcome.blade.php ENDPATH**/ ?>