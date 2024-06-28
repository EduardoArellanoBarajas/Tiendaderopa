<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .product-img {
            height: 500px;
            object-fit: cover;
        }
        .product-thumbnails img {
            height: 100px;
            cursor: pointer;
        }
        .btn-buy-now {
            background-color: #ff00ff; /* Color del botón "Comprar ahora" */
            border-color: #ff00ff;
            color: white;
        }
        .btn-add-to-cart {
            border-color: #ff00ff; /* Borde del botón "Agregar a mi bolsa" */
            color: #ff00ff;
        }
        .btn-add-to-cart:hover {
            background-color: #ff00ff; /* Fondo del botón "Agregar a mi bolsa" al pasar el cursor */
            color: white;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <!-- Galería de imágenes -->
        <div class="col-md-6">
            <div class="mb-3">
                <img id="mainImage" src="https://via.placeholder.com/500" alt="Producto" class="img-fluid product-img">
            </div>
            <div class="d-flex justify-content-between product-thumbnails">
                <img src="https://via.placeholder.com/100" alt="Producto" class="img-thumbnail" onclick="document.getElementById('mainImage').src=this.src;">
                <img src="https://via.placeholder.com/100" alt="Producto" class="img-thumbnail" onclick="document.getElementById('mainImage').src=this.src;">
                <img src="https://via.placeholder.com/100" alt="Producto" class="img-thumbnail" onclick="document.getElementById('mainImage').src=this.src;">
                <img src="https://via.placeholder.com/100" alt="Producto" class="img-thumbnail" onclick="document.getElementById('mainImage').src=this.src;">
            </div>
        </div>
        
        <!-- Detalles del producto -->
        <div class="col-md-6">
            <h3>Playera manga corta Aeropostale cuello redondo para mujer</h3>
            <p>Código de Producto: 1132980814</p>
            <div class="mb-3">
                <span class="text-warning">
                    ★★★★☆ 182 opiniones
                </span>
            </div>
            <div class="mb-3">
                <span class="text-muted"><s>$299.00</s></span>
                <span class="h4 text-danger">$209.30</span>
            </div>
            <p><a href="#">Ver disponibilidad en tienda</a></p>
            <p><a href="#">Ver más promociones</a></p>
            <p>Envío gratis a todo el país</p>
            <div class="d-flex mb-3">
                <button class="btn btn-outline-secondary mr-2">-</button>
                <input type="text" value="1" class="form-control text-center" style="width: 50px;">
                <button class="btn btn-outline-secondary ml-2">+</button>
            </div>
            <div class="mb-3">
                <span>Color: Negro</span>
                <div class="d-flex">
                    <div class="bg-dark rounded-circle mr-2" style="width: 25px; height: 25px;"></div>
                    <div class="bg-white border rounded-circle mr-2" style="width: 25px; height: 25px;"></div>
                    <div class="bg-danger rounded-circle mr-2" style="width: 25px; height: 25px;"></div>
                    <div class="bg-gray rounded-circle mr-2" style="width: 25px; height: 25px;"></div>
                    <div class="bg-pink rounded-circle mr-2" style="width: 25px; height: 25px;"></div>
                    <div class="bg-navy rounded-circle mr-2" style="width: 25px; height: 25px;"></div>
                </div>
            </div>
            <button class="btn btn-buy-now btn-lg btn-block mb-2">Comprar ahora</button>
            <button class="btn btn-add-to-cart btn-lg btn-block">Agregar a mi bolsa</button>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
