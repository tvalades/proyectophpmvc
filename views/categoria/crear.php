<h1> Crear nueva categoria </h1>

<?php if(isset($_SESSION['category']) && $_SESSION['register'] == 'complete'): ?>
<strong class="alert-ok"> Categoría registrada correctamente </strong>
<?php elseif(isset($_SESSION['category']) && $_SESSION['category'] == 'failed'): ?>
<strons class="alert-wrong"> Categoría no registrada </strons>
<?php endif; ?>
<?php Utils::deleteSession('category'); ?>

<form action="<?=SITE_URL?>categoria/save" method="POST">
	<label for="nombre"> Nombre </label>
	<input type="text" name="nombre" required/>

	<input type="submit" value="crear"/>
</form>