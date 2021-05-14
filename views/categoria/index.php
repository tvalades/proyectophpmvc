<h1> Gestionar Categorías </h1>
<a href="<?=SITE_URL?>categoria/crear"> Crear nueva categoría </a>

<table class="table-striped table-bordered">
	<thead class="thead-dark">
		<tr>
			<th scope="col"> Id </th>
			<th scope="col"> Categoria </th>
		</tr>
	</thead>
	<tbody>
	<?php while($cat = $categorias->fetch_object()): ?>
		<tr>
			<td scrope="row"> <?=$cat->id;?> </td>
			<td> <?=$cat->nombre;?> </td>
		</tr>

	<?php endwhile; ?>
	</tbody>
</table>
