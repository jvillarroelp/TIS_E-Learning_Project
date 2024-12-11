
		<div class="card-group justify-content-center">
 
			 <form method="post">
			 	<h3>Agregar prueba</h3>

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
			
			 	<input autofocus class="form-control" value="<?=get_var('test')?>" type="text" name="test" placeholder="Titulo"><br>
			 	<textarea name="description" class="form-control" placeholder="Agregar descripcion a la prueba"><?=get_var('description')?></textarea><br>
			 	<input class="btn btn-primary float-end" type="submit" value="Crear">

			 	<a href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=tests">
			 		<input class="btn btn-danger" type="button" value="Cancelar">
			 	</a>
			 </form>
		</div>