<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
	<h1> Editar producto <?=$pro->nombre?></h1>
	<?php
	 	$url_action = SITE_URL."producto/save&id=".$pro->id;
	?>
<?php else: ?>
	<h1> Crear nuevo producto </h1>
	<?php
	 	$url_action = SITE_URL."producto/save";
	?>
<?php endif; ?>

<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="nombre"> Nombre: </label>
		<input type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : '';?>"/>
	</div>

	<div class="form-group">
		<label for="categoria"> Categoria: </label>
		<?php $categorias = Utils::showCategorias();?>
		<select name="categoria">
			<?php while($cat = $categorias->fetch_object()): ?>
				<option value="<?=$cat->id?>"<?=isset($pro) && is_object($pro) && $cat->id==$pro->categoria_id ? 'selected' : '';?>>
					<?=$cat->nombre?>
				</option>
			<?php endwhile; ?>
		</select>
	</div>

	<div class="form-group">
		<label for="descripcion"> Descripción: </label>
		<textarea name="descripcion"> <?=isset($pro) && is_object($pro) ? $pro->descripcion : '';?></textarea>
	</div>
	<div class="form-group">
		<label for="precio"> Precio: </label>
		<input type="text" name="precio" value="<?=isset($pro) && is_object($pro) ? $pro->precio : '';?>"/>
	</div>

	<div class="form-group">
		<label for="stock"> Stock: </label>
		<input type="text" name="stock"  value="<?=isset($pro) && is_object($pro) ? $pro->stock : '';?>"/>
	</div>

	<div class="form-group">
		<label for="oferta"> Oferta: </label>
		<input type="text" name="oferta" value="<?=isset($pro) && is_object($pro) ? $pro->oferta : '';?>"/>
	</div>

	<div class="form-group">
		<label for="fecha"> Fecha: </label>
		<input type="date" name="fecha" value="<?=isset($pro) && is_object($pro) ? $pro->fecha : '';?>"/>
	</div>

	<div class="form-group">
		<?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)):?>
			<img src="<?=SITE_URL?>uploads/images/<?=$pro->imagen?>">
		<?php endif; ?>
		<label for="imagen"> Imagen: </label>
		<input type="file" name="imagen" />
	</div>

	<input type="submit" value="Registrar producto"/>
</form>