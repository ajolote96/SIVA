<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'SIPSUTERMCFE')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/locales-all.js"></script>


    <script type="text/javascript">
        var baseURL = <?php echo json_encode(url('/')); ?>

    </script>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
    
                

                    <!-- Right Side Of Navbar -->
 
                    
        <script src="<?php echo e(asset('js/agenda.js')); ?>" defer></script>
        
        <script src="<?php echo e(asset('js/agendaEmpleado.js')); ?>" defer></script>

        <script src="<?php echo e(asset('js/agendaCursos.js')); ?>" defer></script>
        <script src="<?php echo e(asset('js/agendaPermisos.js')); ?>" defer></script>
        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\siva\siva\resources\views/layouts/app.blade.php ENDPATH**/ ?>