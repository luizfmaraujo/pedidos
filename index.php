<!DOCTYPE HTML>
<html>
<head>
	<title>Pedidos</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<script src="js/jquery.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-layers.min.js"></script>
	<script src="js/init.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-layers.min.js"></script>
	<script src="js/init.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<body>
		<div id="header-wrapper">
			<div class="container">
				<div class="row">
					<div class="12u">
						<header id="header">
							<h1><a href="#" id="logo">Pedidos</a></h1>
							<nav id="nav">
								<a href="index.html" class="current-page-item">Home</a>
								<a href="pedidos.php">Pedidos</a>
								<a href="clientes.html">Clientes</a>
							</nav>
						</header>

					</div>
				</div>
			</div>
		</div>
		<div id="main">
			<div class="container">
				<div class="row main-row">
					<div class="4u">
						<section>
							<h2>Pedidos</h2>
							<form class="form-horizontal" id="form" method="Post"  action = "cadastra_pedido.php">
								<fieldset>
									<legend>Cadastro de pedidos</legend>
									<div class="form-group">
										<label for="usr">Data</label>
										<input id="data" name="data" class="form-control" value="<?php echo $data=date("d/m/Y");?>" placeholder="placeholder" type="text" readonly>
									</div>
									<div class="form-group">
										<label for="usr">Produtos</label>
										<input type="text" class="form-control" id="produtos" name="produtos">
									</div>
									<div class="form-group">
										<label for="usr">Cliente</label>
										<input type="text" class="form-control" id="cliente" name="cliente">
									</div>
									<!-- Select Tipo-->
									<div class="form-group">
										<label class="control-label" for="selectbasic">Tipo</label>
										<div class="controls">
											<select id="idtipo" name="idtipo" class="input-medium" onChange="Calcula_lucro()">
												<?php
												while($row = mysqli_fetch_array($consulta_tipo)){
													$tipo= $row["tipo"];
													$cod_tipo = $row["cod_tipo"];
													echo "<option value='$cod_tipo'>$tipo</option>" ;
												}
												?>  
											</select>
										</div>
									</div>
									<!-- Select Tipo/-->
									<div class="control-group">
										<label class="control-label" for="selectbasic">Forma</label>
										<div class="controls">
											<select id="forma" name="forma" class="input-medium">
												<option value="Dinheiro">Dinheiro</option> 
												<option value="Cartão">Cartão</option>
												<option value="Parcelado">Parcelado</option>
											</select>
											Status
											<select id="status" name="status" class="input-medium">
												<option value="Não enviado">Não enviado</option> 
												<option value="Enviado">Enviado</option>
											</select>
											Situação
											<select id="situacao" name="situacao" class="input-medium">
												<option value="Pago">Pago</option> 
												<option value="Não pago">Não pago</option>
											</select>
										</div>
									</div>
									<!-- Text Valor-->
									<div class="control-group">
										<label class="control-label" for="textinput">Total :</label>
										<div class="controls">
											<input id="total" name="total" type="text" onChange="Calcula_lucro()" onBlur="Calcula_lucro()" class="input-mini">
											Lucro :<input id="lucro" name="lucro" type="text" class="input-mini" readonly>
										</div>
									</div>
									<!-- Botões -->
									<div class="control-group">
										<div class="controls">
											<button id="button1id" name="button1id" class="btn btn-success">Limpar</button>
											<button id="button2id" name="button2id" class="btn btn-danger" type="submit">Salvar</button>
										</div>
									</div>
								</fieldset>
							</form>
						</section>
					</div>
					<div class="4u">
						<section>
							<h2>Who are you guys?</h2>
							<ul class="small-image-list">
								<li>
									<a href="#"><img src="images/pic2.jpg" alt="" class="left" /></a>
									<h4>Jane Anderson</h4>
									<p>Varius nibh. Suspendisse vitae magna eget et amet mollis justo facilisis amet quis.</p>
								</li>
								<li>
									<a href="#"><img src="images/pic1.jpg" alt="" class="left" /></a>
									<h4>James Doe</h4>
									<p>Vitae magna eget odio amet mollis justo facilisis amet quis. Sed sagittis consequat.</p>
								</li>
							</ul>
						</section>
					</div>
					<div class="4u">
						<section>
							<h2>How about some links?</h2>
							<div>
								<div class="row">
									<div class="6u">
										<ul class="link-list">
											<li><a href="#">Sed neque nisi consequat</a></li>
											<li><a href="#">Dapibus sed mattis blandit</a></li>
											<li><a href="#">Quis accumsan lorem</a></li>
											<li><a href="#">Suspendisse varius ipsum</a></li>
											<li><a href="#">Eget et amet consequat</a></li>
										</ul>
									</div>
									<div class="6u">
										<ul class="link-list">
											<li><a href="#">Quis accumsan lorem</a></li>
											<li><a href="#">Sed neque nisi consequat</a></li>
											<li><a href="#">Eget et amet consequat</a></li>
											<li><a href="#">Dapibus sed mattis blandit</a></li>
											<li><a href="#">Vitae magna sed dolore</a></li>
										</ul>
									</div>
								</div>
							</div>
						</section>

					</div>
				</div>
				<div class="row main-row">
					<div class="6u">

						<section>
							<h2>An assortment of pictures and text</h2>
							<p>Duis neque nisi, dapibus sed mattis quis, rutrum et accumsan. 
								Suspendisse nibh. Suspendisse vitae magna eget odio amet mollis 
								justo facilisis quis. Sed sagittis mauris amet tellus gravida 
								lorem ipsum dolor sit amet consequat blandit lorem ipsum dolor 
							sit amet consequat sed dolore.</p>
							<ul class="big-image-list">
								<li>
									<a href="#"><img src="images/pic3.jpg" alt="" class="left" /></a>
									<h3>Magna Gravida Dolore</h3>
									<p>Varius nibh. Suspendisse vitae magna eget et amet mollis justo 
										facilisis amet quis consectetur in, sollicitudin vitae justo. Cras 
									Maecenas eu arcu purus, phasellus fermentum elit.</p>
								</li>
								<li>
									<a href="#"><img src="images/pic4.jpg" alt="" class="left" /></a>
									<h3>Magna Gravida Dolore</h3>
									<p>Varius nibh. Suspendisse vitae magna eget et amet mollis justo 
										facilisis amet quis consectetur in, sollicitudin vitae justo. Cras 
									Maecenas eu arcu purus, phasellus fermentum elit.</p>
								</li>
								<li>
									<a href="#"><img src="images/pic5.jpg" alt="" class="left" /></a>
									<h3>Magna Gravida Dolore</h3>
									<p>Varius nibh. Suspendisse vitae magna eget et amet mollis justo 
										facilisis amet quis consectetur in, sollicitudin vitae justo. Cras 
									Maecenas eu arcu purus, phasellus fermentum elit.</p>
								</li>
							</ul>
						</section>

					</div>
					<div class="6u">

						<article class="blog-post">
							<h2>Just another blog post</h2>
							<a class="comments" href="#">33 comments</a>
							<a href="#"><img src="images/pic6.jpg" alt="" class="top blog-post-image" /></a>
							<h3>Magna Gravida Dolore</h3>
							<p>Aenean non massa sapien. In hac habitasse platea dictumst. 
								Maecenas sodales purus et nulla sodales aliquam. Aenean ac 
								porttitor metus. In hac habitasse platea dictumst. Phasellus 
								blandit turpis in leo scelerisque mollis. Nulla venenatis 
								ipsum nec est porta rhoncus. Mauris sodales sed pharetra 
								nisi nec consectetur. Cras elit magna, hendrerit nec 
								consectetur in, sollicitudin vitae justo. Cras amet aliquet 
								Aliquam ligula turpis, feugiat id fermentum malesuada, 
								rutrum eget turpis. Mauris sodales sed pharetra nisi nec 
								consectetur. Cras elit magna, hendrerit nec consectetur 
							in sollicitudin vitae.</p>
							<footer class="controls">
								<a href="#" class="button">Continue Reading</a>
							</footer>
						</article>

					</div>
				</div>
			</div>
		</div>
		<div id="footer-wrapper">
			<div class="container">
				<div class="row">
					<div class="8u">

						<section>
							<h2>How about a truckload of links?</h2>
							<div>
								<div class="row">
									<div class="3u">
										<ul class="link-list">
											<li><a href="#">Sed neque nisi consequat</a></li>
											<li><a href="#">Dapibus sed mattis blandit</a></li>
											<li><a href="#">Quis accumsan lorem</a></li>
											<li><a href="#">Suspendisse varius ipsum</a></li>
											<li><a href="#">Eget et amet consequat</a></li>
										</ul>
									</div>
									<div class="3u">
										<ul class="link-list">
											<li><a href="#">Quis accumsan lorem</a></li>
											<li><a href="#">Sed neque nisi consequat</a></li>
											<li><a href="#">Eget et amet consequat</a></li>
											<li><a href="#">Dapibus sed mattis blandit</a></li>
											<li><a href="#">Vitae magna sed dolore</a></li>
										</ul>
									</div>
									<div class="3u">
										<ul class="link-list">
											<li><a href="#">Sed neque nisi consequat</a></li>
											<li><a href="#">Dapibus sed mattis blandit</a></li>
											<li><a href="#">Quis accumsan lorem</a></li>
											<li><a href="#">Suspendisse varius ipsum</a></li>
											<li><a href="#">Eget et amet consequat</a></li>
										</ul>
									</div>
									<div class="3u">
										<ul class="link-list">
											<li><a href="#">Quis accumsan lorem</a></li>
											<li><a href="#">Sed neque nisi consequat</a></li>
											<li><a href="#">Eget et amet consequat</a></li>
											<li><a href="#">Dapibus sed mattis blandit</a></li>
											<li><a href="#">Vitae magna sed dolore</a></li>
										</ul>
									</div>
								</div>
							</div>
						</section>

					</div>
					<div class="4u">

						<section>
							<h2>Something of interest</h2>
							<p>Duis neque nisi, dapibus sed mattis quis, rutrum accumsan sed. 
								Suspendisse eu varius nibh. Suspendisse vitae magna eget odio amet 
								mollis justo facilisis quis. Sed sagittis mauris amet tellus gravida
							lorem ipsum dolor sit amet consequat blandit.</p>
							<footer class="controls">
								<a href="#" class="button">Oh, please continue ....</a>
							</footer>
						</section>

					</div>
				</div>
				<div class="row">
					<div class="12u">

						<div id="copyright">
							&copy; Untitled. All rights reserved. | Design: <a href="http://html5up.net">HTML5 UP</a>
						</div>

					</div>
				</div>
			</div>
		</div>
	</body>
	</html>