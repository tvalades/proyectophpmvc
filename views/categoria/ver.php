<?php if(isset($categoria)): ?>
<h1><?=$categoria->nombre?> </h1>

<?php while($pro = $productos->fetch_object()): ?>
<div class="producto"> 
	<?php if($pro->imagen != null): ?>
		<img src="<?=SITE_URL?>uploads/images/<?=$pro->imagen?>" alt="producto"/>
	<?php else: ?>
		<img src="<?=SITE_URL?>assets/img/nophoto.png" alt="producto"/>
	<?php endif;?>
	<!-- Cuando un campo es común para dos tablas se debe de poner en la consulta un alias al campo  -->
	<h2> <?=$pro->nombre?></h2>
	<p> <?=$pro->precio?> </p>
	<a href="<?=SITE_URL?>carrito/addCart&id=<?=$pro->id?>"> Comprar</a>
</div>
<?php endwhile; ?>

<?php else: ?>
<h1> La categoría no existe </h1>
<?php endif; ?>