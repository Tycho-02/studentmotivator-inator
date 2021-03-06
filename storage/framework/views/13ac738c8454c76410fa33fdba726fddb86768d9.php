<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">

    <title>Document</title>
</head>
<body class="grid">
   <aside class="menu">
       <figure class="menu__figure">
           <img class="menu__img" src="" alt="">
       </figure>
       <ul class="menu__list">
            <li class="menu__list__item"><a href="#">user</a></li>
            <li class="menu__list__item"><a href="#">Afspeellijsten</a></li>
            <li class="menu__list__item"><a href="#">Afspeellijst toevoegen</a></li>
            <li class="menu__list__item"><a href="#">Nummers</a></li>
            <li class="menu__list__item"><a href="#">Voeg nummer toe</a></li>
        </ul>
   </aside>
   <section class="content">
        <?php echo $__env->yieldContent('content'); ?>
   </section>
   <section class="muziekSpeler">
        <?php echo e($nummers); ?>

   </section>
</body>
</html><?php /**PATH /home/pi/ipmedt5/studentmotivator-inator/resources/views/app.blade.php ENDPATH**/ ?>