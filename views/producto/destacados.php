<?php while($pro = $productos->fetch_object()): ?>
<div class="producto"> 
	<a href="<?=SITE_URL?>producto/ver&id=<?=$pro->id?>">
		<?php if($pro->imagen != null): ?>
			<img src="<?=SITE_URL?>uploads/images/<?=$pro->imagen?>" alt="producto"/>
		<?php else: ?>
			<img src="<?=SITE_URL?>assets/img/nophoto.png" alt="producto"/>
		<?php endif;?>
		<h2> <?=$pro->nombre?></h2>
		<p> <?=$pro->precio?> </p>
	</a>
	<a href="<?=SITE_URL?>carrito/addCart&id=<?=$pro->id?>"> Comprar</a>

</div>
<?php endwhile; ?>



</div>


        