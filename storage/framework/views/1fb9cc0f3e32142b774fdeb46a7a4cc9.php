
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('css'); ?>

   <link rel="stylesheet" href="<?php echo e(asset('build/assets/app.css')); ?>">
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="<?php echo e(asset('build/assets/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<div class="container">
   <div class="row">
       <?php if(session('message')): ?>
           <div class="alert alert-success">
               <?php echo e(session('message')); ?>

           </div>
       <?php endif; ?>
   </div>


   <div class="row">
       <h2>Lista de productos</h2>
       <hr>
       <br>
       <p align="right">
           <a href="<?php echo e(route('TiendaRopa.create')); ?>" class="btn btn-success">Crear producto</a>
           <a href="<?php echo e(route('home')); ?>" class="btn btn-primary">Regresar</a>
       </p>
       <table id="example" class="table table-striped table-bordered" style="width:100%">
           <thead>
               <tr>
                   <th>Acciones</th>
                   <th>Id</th>
                   <th>Nombre</th>
                   <th>Descripción</th>
                   <th>Precio</th>
                   <th>Categoría</th>
                   <th>Stock</th>
                   <th>Imágenes</th>
               </tr>
           </thead>
           <tbody>
               <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <tr>
                   <td><?php echo $item[0]; ?></td>
                   <td><?php echo e($item[1]); ?></td>
                   <td><?php echo e($item[2]); ?></td>
                   <td><?php echo e($item[3]); ?></td>
                   <td><?php echo e($item[4]); ?></td>
                   <td><?php echo e($item[5]); ?></td>
                   <td><?php echo e($item[6]); ?></td>
                   <td>
                    <?php $__currentLoopData = $item[7]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img src="<?php echo e(asset('' . $image)); ?>" alt="Imagen del Producto" width="100">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                   </td>
               </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </tbody>
       </table>
   </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="nombre"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="" id="borrar" class="btn btn-danger">borrar</a>
            </div>
        </div>
    </div>
</div>

<?php $__env->startSection('js'); ?>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
<script type="text/javascript">
    var data = <?php echo json_encode($product, 15, 512) ?>;

    $(document).ready(function() {
        $('#example').DataTable({
            "data": data,
            "pageLength": 100,
            "order": [[0, "desc"]],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
            responsive: true,
            dom: '<"col-xs-3"l><"col-xs-5"B><"col-xs-4"f>rtip',
            buttons: [
                'copy', 'excel',
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LETTER',
                }
            ]
        });
    });

    function modal(parametro) {
        console.log(parametro);
        $('#nombre').html(parametro);
        let url = "<?php echo e(route('deleteProducto', ':id')); ?>";
        url = url.replace(':id', parametro);
        document.getElementById('borrar').href = url;
    }

    jQuery.extend(jQuery.fn.dataTableExt.oSort, {
        "portugues-pre": function(data) {
            var a = 'a';
            var e = 'e';
            var i = 'i';
            var o = 'o';
            var u = 'u';
            var c = 'c';
            var special_letters = {
                "Á": a,
                "á": a,
                "Ã": a,
                "ã": a,
                "À": a,
                "à": a,
                "É": e,
                "é": e,
                "Ê": e,
                "ê": e,
                "Í": i,
                "í": i,
                "Î": i,
                "î": i,
                "Ó": o,
                "ó": o,
                "Õ": o,
                "õ": o,
                "Ô": o,
                "ô": o,
                "Ú": u,
                "ú": u,
                "Ü": u,
                "ü": u,
                "ç": c,
                "Ç": c
            };
            for (var val in special_letters)
                data = data.split(val).join(special_letters[val]).toLowerCase();
            return data;
        },
        "portugues-asc": function(a, b) {
            return ((a < b) ? -1 : ((a > b) ? 1 : 0));
        },
        "portugues-desc": function(a, b) {
            return ((a < b) ? 1 : ((a > b) ? -1 : 0));
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\Tiendad de ropa\Tiendaropa\resources\views\TiendaRopa\index.blade.php ENDPATH**/ ?>