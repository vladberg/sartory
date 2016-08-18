<?php

include_once("lib/template.php");

$link=conectarse();

cabezal();

$categoria=$_POST['categoria'];

			$query="select * from categorias where id_categoria=$categoria;";

			$resultado=mysql_query($query, $link);

			while($row=mysql_fetch_array($resultado)){ 

      $categorias=$row['categoria'];

  }



?>

<div class="container">

<section id="content">

			<div class="container">

				<div id="mainbody">

					<div class="row">

						<div class="span12">

							<div class="row">

							<?php

							$buscar=$_POST['buscar'];

			?>			

					<div id="boligrafos-plastico" class="span12"><h2 style="border-bottom: 1px solid #111111;"><a href="index.php">CATEGORIAS </a> > ><a href="articulos.php?id=<?php echo $categoria;?>"><?php echo $categorias;?></a> > > Resultados de la Busqueda <?php echo $buscar;?></h2><div style="color: #999;">Un promocional útil e idóneo para cualquier campaña promocional.<p></p></div></div>	

					<?php

					 

					$busca=$_POST['buscar'];


					$categoria=$_POST['categoria'];
					$busca=$_POST['buscar'];
					$cadena_de_texto = $busca;
                    $cadena_buscada   = '#';
                    $posicion_coincidencia = strpos($cadena_de_texto, $cadena_buscada);
                    if ($posicion_coincidencia === false) {
                    	//$query="select * from articulos where  (codigo like '%$busca%' or nombre like '%$busca%') and estatus =1  order by ROUND(precio_venta,2) asc;";
                    	$query="select * from articulos where (nombre like '%$busca%'or codigo like '%$busca%') and categoria = $categoria and estatus=1 order by ROUND(precio_venta,2) asc;";
   
    } else {
            
                       $resultado = substr($busca, 1);
                     
                      $query="select * from articulos where  id_proveedor=$resultado and categoria = $categoria and estatus=1 order by ROUND(precio_venta,2) asc;";
            }
            $busca=$_POST['buscar'];
					$cadena_de_texto = $busca;
                    $cadena_buscada   = '*';
                    $posicion_coincidencia = strpos($cadena_de_texto, $cadena_buscada);
                    if ($posicion_coincidencia === false) {
                    	$query="select * from articulos where (nombre like '%$busca%'or codigo like '%$busca%') and categoria = $categoria and estatus=1 order by ROUND(precio_venta,2) asc;";
   
    } else {
            
                       $resultado = substr($busca, 1);
                       $query3="select * from tags where tag like '%$resultado%';";

			$resultado3=mysql_query($query3, $link);

			while($row3=mysql_fetch_array($resultado3)){ 
				$idtag=$row3['idtag'];
			}
                     
                     $query="select * from articulos where  tags like '%$idtag%' and categoria = $categoria and estatus =1  order by ROUND(precio_venta,2) asc;";
                  
            }

		

			$resultado=mysql_query($query, $link);

			while($row=mysql_fetch_array($resultado)){ 

      $id_articulo=$row['id_articulo'];

      $codigo=html_entity_decode($row['codigo'], ENT_QUOTES);

      $categoria=$row['categoria'];

      $nombre=$row['nombre'];

      $imagen=$row['imagen'];



			?>							<div class="span3">

									<div class="product-list-item" id="bol-01-16-jeringa" style="height: 397px;">

										<span class="hover"></span>

										<div class="image">

											<span class="hidden">5</span><a href="detalle.php?id=<?php echo $id_articulo;?>" data-id="5">

												<img src="articulos/<?php echo $imagen; ?>" alt="">

											</a>

										</div>

										<div class="details fixclear">

											<h3 style="height:30px; text-align:left;">

											<a href="detalle.php?id=<?php echo $id_articulo;?>"><?php echo $codigo;?> - <?php echo $nombre;?></a>

											</h3>

											<p class="desc"><?php echo $nombre;?><br><br></p>

											<div class="actions">

												<!--<a href="http://impressline.com.mx/registro">AGREGAR A COTIZACION</a>-->

												<!--<a href="http://impressline.com.mx/detalle.php?id_categoria=1&id=5">DETALLE PRODUCTO</a>-->

												<a href="detalle.php?id=<?php echo $id_articulo;?>">DETALLE PRODUCTO</a>

											</div>

											<div class="price">

												<span>&nbsp;</span>

												<!--<small>$199</small>-->

											</div>

										</div>

									</div>

								</div>

                    								<?php }

                    							



                    								?>

                    							</div>

						</div>

					</div>

				</div>

			</div>

		</section>

		

				<div class="content-about-us">

			<div class="container">

				<div class="row-fluid">

					<div class="span12">

						<h1 class="t-title light text-left">Los mejores Productos Promocionales</h1>

						

						<p>

							Son artículos promocionales que Sartory ofrece en una gran variedad

							de estilos y funciones para cualquier campaña publicitaria. Además pueden funcionar como

							una herramienta de marketing con increíbles resultados. El regalar productos promocionales

							útiles, como los bolígrafos, con la marca de su empresa, negocio o información lo ayudará

							a promover su marca en el mercado.

						</p>

				</div>
				</div>

			</div>

		</div>
</div>
</div>
<?php

footer();

?>