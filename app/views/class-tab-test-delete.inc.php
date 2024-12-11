
		<div class="card-group justify-content-center">
 		<?php if(isset($test_row) && is_object($test_row)):?>


			 <form method="post">
			 	<h3>¿Estas seguro de querer borrar?</h3>

			 	<?php if(count($errors) > 0):?>
				<div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
				  <strong>Errors:</strong>
				   <?php foreach($errors as $error):?>
				  	<br><?=$error?>
				  <?php endforeach;?>
				  <span  type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </span>
				</div>
				<?php endif;?>
			
				<label>Nombre prueba:</label>
			 	<input readonly class="form-control" value="<?=get_var('test',$test_row->test)?>" type="text" name="test" placeholder="Titulo"><br>
			 	
			 	<label>Descripcion prueba:</label>
			 	<textarea readonly name="description" class="form-control" placeholder="Agrega una descripcion para la prueba"><?=get_var('description',$test_row->description)?></textarea>
			 	
			 	<br>
			  
			 	<input class="btn btn-danger float-end" type="submit" value="Borrar">

			 	<a href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=tests">
			 		<input class="btn btn-success" type="button" value="Regresar">
			 	</a>
			 </form>

			<?php else:?>
				La prueba no ha sido encontrada<br><br><br>

				<a href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=tests">
			 		<input class="btn btn-success" type="button" value="Regresar">
			 	</a>
			<?php endif;?>
		</div>