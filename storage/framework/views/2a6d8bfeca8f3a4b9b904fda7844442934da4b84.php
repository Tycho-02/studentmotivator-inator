<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <link rel="stylesheet" href="/css/main.css">
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>
<body>
    <button class="menu--button__action" onclick="window.location='/'" ><i class="fas fa-long-arrow-alt-left fa-2x"></i></button>
    <?php echo $__env->yieldContent('content'); ?>
</body>
</html>
<?php /**PATH /home/pi/studentmotivator-inator-1/resources/views/taken/taakDefault.blade.php ENDPATH**/ ?>