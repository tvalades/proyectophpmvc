<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Tienda de Ropa</title>
        <link rel="stylesheet" href="<?=SITE_URL?>assets/css/style.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header id="header">
        	<div id="logo">
        		<a href="<?=SITE_URL?>"><img src="<?=SITE_URL?>assets/img/logo-abcd.svg" alt="logotipo"></a>
        	</div>
        </header>
        <nav role="navigation">
            <?php $categorias = Utils::showCategorias(); ?>
        	<div class="menu">
	        	<input type="checkbox"/>
	        	<span></span>
	        	<span></span>
	        	<span></span>
	        	
	        	<ul class="menu-list">
                    <?php while($cat = $categorias->fetch_object()): ?>
	        		<li>
	        			<a href="<?=SITE_URL?>categoria/ver&id=<?=$cat->id?>"> <?= $cat->nombre?> </a>
	        		</li>
                    <?php endwhile; ?>
	        	</ul>
        	</div>
        </nav>

        
        <div id="container">