<h1> Gestión de Productos </h1>

<a href="<?=SITE_URL?>producto/crear"> Crear nuevo producto </a>

<?php if(isset($_SESSION['product']) && $_SESSION['product'] == 'complete'): ?>
<h2><strong class="alert-ok"> Producto registrado correctamente </strong></h2>
<?php elseif(isset($_SESSION['product']) && $_SESSION['product'] == 'failed'): ?>
<strons class="alert-wrong"> Producto no registrado </strons>
<?php endif; ?>
<?php Utils::deleteSession('product'); ?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
<h2><strong class="alert-ok"> El producto se ha eliminado correctamente </strong></h2>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'): ?>
<strons class="alert-wrong"> Producto no eliminado </strons>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<table class="table-striped table-bordered">
	<thead class="thead-dark">
		<tr>
			<th scope="col"> Id </th>
			<th scope="col"> Nombre </th>
			<th scope="col"> Categoría </th>
			<th scope="col"> Descripción </th>
			<th scope="col"> Precio </th>
			<th scope="col"> Stock </th>
			<th scope="col"> Oferta </th>
			<th scope="col"> Fecha </th>
			<th scope="col"> Acciones </th>
		</tr>
	</thead>
	<tbody>
	<?php while($prod = $productos->fetch_object()): ?>
		<tr>
			<td scrope="row"> <?=$prod->id;?> </td>
			<td> <?=$prod->nombre;?> </td>
			<td> <?=$prod->categoria_id;?> </td>
			<td> <?=$prod->descripcion;?> </td>
			<td> <?=$prod->precio;?> </td>
			<td> <?=$prod->stock;?> </td>
			<td> <?=$prod->oferta;?> </td>
			<td> <?=$prod->fecha;?> </td>
			<td> <a href="<?=SITE_URL?>producto/editar&id=<?=$prod->id?>"><i class="far fa-edit"></i></a> <a href="<?=SITE_URL?>producto/borrar&id=<?=$prod->id?>"><i class="far fa-trash-alt"></i></a></td>
		</tr>

	<?php endwhile; ?>
	</tbody>
</table>