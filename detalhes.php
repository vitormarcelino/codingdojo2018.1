<?php require_once 'bootstrap.php'; ?>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <title>Adote um Pet</title>
    <link href="css/style.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Dísponivel no GitHub: https://github.com/vitormarcelino/codingdojo2018.1 -->
</head>
<body>

	<header>
		<h1 id="logo">Adote um Pet</h1>
	    <nav class="topnav">
	        <ul>
                <li>
	            	<?php if(isset($_SESSION['login']['usuario'])) { ?>
                        <a href="sair.php">Sair</a>
                        <a href="login.php"><?php echo "Olá, " . $_SESSION['login']['usuario'] . "!"; ?></a>
                    <?php } else { ?>
                        <a href="login.php">Login</a>
                    <?php } ?>
	        	</li>
	        </ul>
	    </nav>
	</header>

	<section class="row" id="first-section">
	    <article class="two-columns">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
	    </article>
	    <figure class="two-columns">
				<img src="images/img-principal.jpg">
		</figure>
	</section>
    
    <?php 
        if(isset($_POST['adotar']) && $_POST['adotar'] == 'Adotar') {
            $stmt = $db->prepare("INSERT INTO adocao (id_usuario, id_animal, data_adocao) VALUES(:id_usuario, :id_animal, NOW())");
            $stmt->bindValue(":id_usuario", $_SESSION['login']['id'], \PDO::PARAM_STR);
            $stmt->bindValue(":id_animal", $_GET['id'], \PDO::PARAM_STR);
            $status = $stmt->execute();
            
            if($status) {
                echo "<script>alert('Adoção realizada com sucesso!')</script>";
            } else {
                echo "<script>alert('Falha a realizar adoção!')</script>";
            }
        }
    ?>
    
    <?php 
        $stmt = $db->prepare("SELECT * FROM animal WHERE id = :id");
        $stmt->bindValue(":id", $_GET['id'], \PDO::PARAM_STR);
        $stmt->execute();
        $animal = $stmt->fetch(\PDO::FETCH_ASSOC);
    ?>
    
    <section class="row">
        <a class="btn_voltar" href="index.php">
            <button type="button">Voltar</button>
        </a>
        <form method="post">
            <a class="btn_adotar" href="index.php">
                <input type="submit" name="adotar" value="Adotar">
            </a>
        </form>
	    <div class="two-columns center capitalize">
            <h1 id="nome"></h1>
            <p>Especie: <span id="especie"><?php echo $animal['especie'] ?></span></p>
            <p>Raça: <span id="raca"><?php echo $animal['raca'] ?></span></p>
            <p>Cor: <span id="cor"><?php echo $animal['cor'] ?></span></p>
            <p>Idade: <span id="idade"><?php echo $animal['idade'] ?></span></p>
            <p>Gênero: <span id="genero"><?php echo $animal['sexo'] ?></span></p>
            <p>Castrado: <span id="castrado"><?php echo $animal['castrado'] ?></span></p>
            
            </ul>
	    </div>
	    <figure class="two-columns">
            <img src="images/<?php echo $animal['foto'] ?>" id="img_cao" class="imagem_destaque">
		</figure>
	</section>
	
	<div class="hr">
		<hr>
	</div>

	<footer>
        <p>Adote um Pet</p>
        <p>Rua Chile, 286 | Salvador - BA</p>
        <p>(71) 9999-6633</p>
        <p></p>
	</footer>
    <!-- <script src="js/detalhe.js"></script> -->
</body>
</html>