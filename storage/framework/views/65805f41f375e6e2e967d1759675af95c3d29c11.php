<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Kanban</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">

    <!-- Custom Styles -->
    <link href="<?php echo e(asset('assets/css/custom.css')); ?>" rel="stylesheet">

    <?php echo $__env->yieldContent('style'); ?>
    <?php echo \Livewire\Livewire::styles(); ?>


</head>

<body class="hold-transition">

    <?php echo $__env->yieldContent('content'); ?>

    <!-- jQuery -->
    <script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('js/adminlte.min.js')); ?>"></script>

    <?php echo \Livewire\Livewire::scripts(); ?>

    <?php echo $__env->yieldPushContent('livewire-scripts'); ?>
</body>
</html>
<?php /**PATH /Volumes/Drive/Projects/ASDTOF/Kanban-G1/resources/views/layout/auth.blade.php ENDPATH**/ ?>