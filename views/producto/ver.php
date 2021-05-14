<?php if(isset($pro)): ?>
<h1><?=$pro->nombre?> </h1>


<!--AQUI MAQUETAMOS TODO EL PRODUCTO INDIVIDUAL-->

<h2> Descipción: <?=$pro->descripcion?></h2>
<h3> Stock: disponible <?=$pro->stock?></h3>

<?php else: ?>
<h1> El producto no existe </h1>
<?php endif; ?>