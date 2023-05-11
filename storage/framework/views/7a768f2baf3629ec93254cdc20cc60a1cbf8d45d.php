<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo e(asset('img/wmx_fav.png')); ?>"/>
    <title>Kanban</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/custom.css')); ?>" rel="stylesheet">
</head>
<body>
<div class="splash-box">
    <div class="splash-header">
        
    </div>
    <div class="splash-body">
        <h1>Welcome to KANBAN BOARD</h1>
        <h4>In the meantime, Sign up for staying up to date.</h4>
        <a href="<?php echo e(route('login')); ?>">Login</a> &nbsp; <a href="<?php echo e(route('register')); ?>">Registration</a>
    </div>
    <div class="splash-footer">

    </div>
</div>
</body>
</html>
<?php /**PATH /Volumes/Drive/Projects/ASDTOF/Kanban-G1/resources/views/welcome.blade.php ENDPATH**/ ?>