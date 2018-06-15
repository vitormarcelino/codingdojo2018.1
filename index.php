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

	 <section class="row" id="second-section">
	    <article>
	        <header>
	            <h2>O título do artigo é aqui</h2>
	        </header>
	        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut arcu sed velit aliquam blandit. Suspendisse tempor vestibulum elit, id imperdiet lacus molestie vel. Vivamus dapibus diam non diam dapibus, ut aliquam ipsum viverra. In pretium posuere sodales. Suspendisse eu pretium justo. Cras vitae turpis sit amet dolor dignissim laoreet sed eu purus. Mauris quis neque nec ligula tempor dapibus non eget nibh. Fusce sodales est nec neque malesuada dignissim. Cras id fringilla leo. Etiam id imperdiet lacus, sed facilisis sem. Mauris egestas gravida lorem, in aliquet risus aliquam sit amet. Cras varius hendrerit leo vitae porta. Aliquam venenatis, augue at molestie sodales, leo mi efficitur ex, quis semper sem lacus sed justo.</p>
	    </article>
	</section>
	
	<div class="hr">
		<hr>
	</div>
    
    <?php 
        $stmt = $db->prepare("SELECT * FROM animal");
        $stmt->execute();
        $animais = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    ?>
	
	<section class="row" id="myCarousel">
	    
			<!-- Wrapper for slides -->
			<div class="row">
                <?php foreach ($animais as $animal) { ?>
                    <div class="four-columns item hidden">
                        <a href="detalhes.php?id=<?php echo $animal['id'] ?>">
                            <img src="images/<?php echo $animal['foto'] ?>" alt="<?php echo $animal['nome'] ?>">
                        </a>
                        <div class="carousel-caption">
                            <h3><?php echo $animal['nome'] ?></h3>
                        </div>
                    </div>
                <?php } ?>
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control">
				<img src="images/Icon-left-arrow.png" alt="Next"></span>
			</a>
			<a class="right carousel-control">
				<img src="images/Icon-left-arrow.png" alt="Next"></span>
			</a>

			<div class="carousel-indicators">
			<!-- Indicators -->
				<ol>
				</ol>
			</div>
		
	</section>

	<footer>
        <p>Adote um Pet</p>
        <p>Rua Chile, 286 | Salvador - BA</p>
        <p>(71) 9999-6633</p>
	</footer>
    <script src="js/script.js"></script>
</body>
</html>