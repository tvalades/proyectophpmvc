	        <aside id="lateral">
	        	<div id="carrito" class="block_aside">
	        		<h3> Mi pedido </h3>
	        		<ul>
	        			<?php $totales = Utils::showTotalCart();?>
	        			<li> <a href="<?=SITE_URL?>carrito/index"> <i class="fas fa-shopping-cart"></i>(<?=$totales['count']?>) <?=$totales['total']?>€</a></li>
	        			<li> <a href="<?=SITE_URL?>carrito/index"> Ver pedido </a></li>
	        		</ul>
	        	</div>

	        	<div id="login" class="block_aside">

	        		<?php if(!isset($_SESSION['identity'])): ?>
	        		<h3> Entrar a la web </h3>
	        		<form action="<?=SITE_URL?>usuario/login" method="POST">
	        			<label for="email">Email: </label>
	        			<input type="email" name="email"/>

	        			<label for="password">Contraseña: </label>
	        			<input type="password" name="password"/>
	        			<input type="submit" value="Entrar">
	        		</form>

	        		<?php else: ?>
	        			<h3> Bienvenido <?= $_SESSION['identity']->nombre?></h3>
	        		<?php endif; ?>
					
					<?php if(isset($_SESSION['admin'])):?>
	        		<a href="<?=SITE_URL?>categoria/index"> Gestionar Categorías </a>
	        		<a href="<?=SITE_URL?>producto/gestion"> Gestionar Productos </a>
	        		<a href=""> Gestionar Pedidos </a>
	        		
	        		<?php endif;?>
	        		<?php if(isset($_SESSION['identity'])): ?>
	        			<a href=""> Mis pedidos </a>
	        		<a href="<?=SITE_URL?>usuario/logout"> Cerrar Sesión </a>
	        		<?php else: ?>
	        		<a href="<?=SITE_URL?>usuario/registro"> Regístrate </a>
	        		<?php endif;?>
	        	</div>	
	        </aside>
	        <div id="central">