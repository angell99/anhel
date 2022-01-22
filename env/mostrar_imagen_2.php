<?php
if(isset($_GET['file']) && isset($_GET['name'])) {
    $file = $_GET['file'];
    $name = $_GET['name'];
} else {
    header('Location: https://informatica.ieszaidinvergeles.org:10055/pia/env');
    exit;
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Detector de caras</title>
        <link rel="stylesheet" href="https://unpkg.com/jcrop/dist/jcrop.css">
        <script src="https://unpkg.com/jcrop"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="stylesheets/reset.css" />
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css" />
    </head>
    <body>
        <div id="header">  
            <div class="container">
        			<div id="main_menu">
        				<ul>
        					<li class="first_list"><a href="upload.html" class="main_menu_first main_current">HOME</a></li>
        					<li class="first_list"><a href="upload.html" class="main_menu_first main_current">AWS</a></li>
        					<li class="first_list"><a href="upload.html" class="main_menu_first main_current">CLOUD9</a></li>
        					<li class="first_list"><a href="upload.html" class="main_menu_first main_current">MOODLE CENTRO</a></li>
        					<li class="first_list"><a href="upload.html" class="main_menu_first main_current">GITHUB</a></li> 
        				</ul>
        			</div>
                </div>
            </div>
        <div id="main_content">
			<div class="container">
				<div id="slideshow_container">
                    <img src="<?= $file ?>" alt="imagen subida" id="imagen">
                    <form action ="https://informatica.ieszaidinvergeles.org:10055/pia/env/censula_3.php" id='fblur' method="post">
                        <input type="hidden" name="name" value = "<?=$name ?>"/>
                        <input type="hidden" name="file" value = "<?=$file ?>"/>
                        <input type="submit" value="Procesar"/>
                    </form>
                    <script src="https://informatica.ieszaidinvergeles.org:10055/pia/env/service.js"></script>
				</div>
			</div>
        </div>
    </body>
</html>