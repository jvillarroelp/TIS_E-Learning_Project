<?php if(is_object($question)):?>

<center><h5>Borrar pregunta</h5></center>

<form method="post" enctype="multipart/form-data">
	
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

	<label>Pregunta:</label>
	<textarea readonly class="form-control" name="question" placeholder="Escribe tu pregunta"><?=get_var('question',$question->question)?></textarea>
	<div class="input-group mb-3 pt-3">
	  <label class="input-group-text" for="inputGroupFile01">Comentario(opcional)</label>
	  <input readonly type="text" name="comment" value="<?=get_var('comment',$question->comment)?>" class="form-control" placeholder="Comentario">
	</div>
 
	<div>
		<?php if(file_exists($question->image)):?>
		<img src="<?=ROOT.'/'.$question->image?>" class="d-block mx-auto w-50">
		<?php endif;?>
	</div>
 
	<a href="<?=ROOT?>/single_test/<?=$row->test_id?>">
		<button type="button" class="btn btn-primary"><i class="fa fa-chevron-left"></i>Regresar</button>
	</a>

	<button class="btn btn-danger float-end">Borrar</button>
	<div></div>
</form>

<?php else:?>
	La pregunta no ha sido encontrada
	<br>
	<a href="<?=ROOT?>/single_test/<?=$row->test_id?>">
		<button type="button" class="btn btn-primary"><i class="fa fa-chevron-left"></i>Regresar</button>
	</a>
<?php endif;?>