<h1> Carrito </h1>
<table class="table-striped">
	<tr>
		<th> Imagen </th>
		<th> Nombre del producto </th>
		<th> Precio </th>
		<th> Unidades </th>
	</tr>

	<?php 
		foreach($_SESSION['carrito'] as $indice => $elemento):
			$producto = $elemento['producto'];
	?>	
	<tr>
		<td>
			<?php if($producto->imagen != null): ?>
				<img src="<?=SITE_URL?>uploads/images/<?=$producto->imagen?>"/>
			<?php else: ?>
				<img src="<?=SITE_URL?>assets/img/nophoto.png"/>
			<?php endif; ?>
		</td>
		<td><?=$producto->nombre?></td>
		<td><?=$producto->precio?></td>
		<td><?=$elemento['unidades']?></td>
	</tr>
	<?php endforeach; ?>
</table>
<?php $stats = Utils::showTotalCart(); ?>
<strong> TOTAL</strong> <?=$stats['total']?>
<a href=""> Continuar pedido </a>