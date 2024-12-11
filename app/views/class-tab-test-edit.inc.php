
		<div class="card-group justify-content-center">
 		<?php if(isset($test_row) && is_object($test_row)):?>


			 <form method="post">
			 	<h3>Editar prueba</h3>

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
			
			 	<input autofocus class="form-control" value="<?=get_var('test',$test_row->test)?>" type="text" name="test" placeholder="Titulo"><br>
			 	<textarea name="description" class="form-control" placeholder="Agregar descripcion para la prueba"><?=get_var('description',$test_row->description)?></textarea>
			 	
			 	<?php  

			 		$disabled = get_var('disabled',$test_row->disabled);
			 		$active_checked = $disabled ? "":"checked";
			 		$disabled_checked = $disabled ? "checked":"";
			 	?>

			 	<input type="radio" name="disabled" value="0"  <?=$active_checked?> > Activo | 
			 	<input type="radio" name="disabled" value="1"  <?=$disabled_checked?> > Deshabilitado <br><br>

			 	<input class="btn btn-primary float-end" type="submit" value="Guardar">

			 	<a href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=tests">
			 		<input class="btn btn-danger" type="button" value="Regresar">
			 	</a>
			 </form>

			<?php else:?>
				La prueba no ha sido encontrada<br><br><br>

				<a href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=tests">
			 		<input class="btn btn-danger" type="button" value="Regresar">
			 	</a>
			<?php endif;?>
		</div>