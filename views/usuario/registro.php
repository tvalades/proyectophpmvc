<h2> Registro de Usuario </h2>

<?php
//MOSTRAR LA SESION REGISTER
if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
	<strong class="alert-ok"> Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
	<strong class="alert-wrong"> Ha ocurrido un error en el registro </strong>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>


<form action="<?=SITE_URL?>usuario/save" method="POST">
	<div class="form-group">
		<label for="nombre"> Nombre </label>
		<input type="text" name="nombre" required/>
	</div>
	<div class="form-group">
		<label for="apellidos"> Apellidos </label>
		<input type="text" name="apellidos" required/>
	</div>
	<div class="form-group">
		<label for="email"> Email </label>
		<input type="email" name="email" required/>
	</div>
	<div class="form-group">
		<label for="password"> Contraseña </label>
		<input type="password" name="password" required/>
	</div>

	<input type="submit" value="Registrar">
</form>


<!--Todos estos datos se reciben en el controlador correspondiente: usuarioController-->