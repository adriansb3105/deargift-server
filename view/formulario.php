<?php
	include_once 'header.php';
?>

		<section id="content">
			<section id="main">
				<article id="contact">
					<form action="?formulario=registrar" method="post">
						<legend>Comments</legend>
						<div>
							<label for="name">Name</label>
							<input type="text" id="name" name="nombre" required>
						</div>

						<div>
							<label for="email">Email</label>
							<input type="email" id="email" name="email" required>
						</div>

						<div>
							<label for="subject">Subject</label>
							<input type="text" id="subject" name="asunto" required>
						</div>

						<div>
							<label for="comment">Comments</label>
							<textarea id="comment" name="comentarios" cols="31" rows="5" required></textarea>
						</div>

						<div>
							<input type="submit" id="submit" name="submit" value="Send">
						</div>

						<div>
							<?php
								if(isset($respuesta)){
									echo $respuesta;
								}
							?>
						</div>
					</form>
				</article>

				<article>
					<form action="?formulario=obtener" method="post">
						<div>
							<label for="valor_buscar">Valor a Buscar</label>
							<input type="text" id="valor_buscar" name="valor_buscar" value="">
						</div>
						<input type="submit" id="buscar" name="buscar" value="Buscar">
					</form>

					<div>
						<?php
							if(isset($comentarios)){
								//print_r($comentarios);

								foreach ($comentarios as $com => $val) {
									echo $val[0];
									echo '<br/>';
								}
							}
						?>
					</div>

				</article>
			</section>

			<aside>
				<a href="http://fontawesome.io/examples/" target="_blank">
					<img src="img/mediacionvirtual.png" alt="Font awesome">
				</a>
			</aside>
		</section>


		<?php
		include_once 'footer.php';
		?>
