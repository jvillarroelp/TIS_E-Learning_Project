<?php  

	$quest_type = 'Abierta';
	if(isset($_GET['type']) && $_GET['type'] == "objective"){
		$quest_type = 'Cerrada';
	}else
	if(isset($_GET['type']) && $_GET['type'] == "multiple"){
		$quest_type = 'Seleccion multiple';
	}
?>
<center><h5>Agregar Pregunta <?=$quest_type?></h5></center>

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
	<textarea autofocus class="form-control" name="question" placeholder="Escribe tu pregunta"><?=get_var('question')?></textarea>
	<div class="input-group mb-3 pt-3">
	  <label class="input-group-text" for="inputGroupFile01">Comentario(opcional)</label>
	  <input type="text" name="comment" value="<?=get_var('comment')?>" class="form-control" placeholder="Comentario">
	</div>
	
	<div class="input-group mb-3 ">
	  <label class="input-group-text" for="inputGroupFile01"><i class="fa fa-image"></i>Imagen(opcional)</label>
	  <input type="file" name="image" class="form-control" id="inputGroupFile01">
	</div>
	
	<?php if(isset($_GET['type']) && $_GET['type'] == "objective"):?>
		<div class="input-group mb-3 ">
		  <label class="input-group-text" for="inputGroupFile01">Respuesta</label>
		  <input type="text" value="<?=get_var('correct_answer')?>" name="correct_answer" class="form-control" id="inputGroupFile011" placeholder="Ingresar la respuesta correcta">
		</div>
	<?php endif;?>

	<?php if(isset($_GET['type']) && $_GET['type'] == "multiple"):?>
		<div class="card" style="">
		  <div class="card-header bg-secondary text-white">
		    Respuestas seleccion multiple <button onclick="add_choice()" type="button" class="btn btn-warning btn-sm float-end"><i class="fa fa-plus"></i>Agregar seleccion</button>
		  </div>
		  <ul class="list-group list-group-flush choice-list">
		    
		    <?php if(isset($_POST['choice0'])):?>
				
				<?php 
				//check for multiple choice answers
		        $num = 0;
		        $letters = ['A','B','C','D','F','G','H','I','J'];
		        foreach ($_POST as $key => $value) {
		            // code...
		            if(strstr($key, 'choice')){
 		                ?>
		                    <li class="list-group-item">
						    	<?=$letters[$num]?> : <input type="text" class="form-control" value="<?=$value?>" name="<?=$key?>" placeholder="Escribe tu respuesta">
						    	<label style="cursor: pointer;"><input type="radio" <?= $letters[$num] == $_POST['correct_answer'] ? 'checked' : '';?> value="<?=$letters[$num]?>" name="correct_answer"> Respuesta correcta</label>
						    </li>
						<?php 
 		                $num++;
		            }
		        }
		        ?>
			<?php else:?>
			    <li class="list-group-item">
			    	A : <input type="text" class="form-control" name="choice0" placeholder="Escribe tu respuesta">
			    	<label style="cursor: pointer;"><input type="radio" value="A" name="correct_answer"> Respuesta correcta</label>
			    </li>

			    <li class="list-group-item">
			    	B : <input type="text" class="form-control" name="choice1" placeholder="Escribe tu respuesta">
			    	<label style="cursor: pointer;"><input type="radio" value="B" name="correct_answer"> Respuesta correcta</label>
			    </li>
			<?php endif;?>
 
		  </ul>
		</div><br>
	<?php endif;?>

	

	<a href="<?=ROOT?>/single_test/<?=$row->test_id?>">
		<button type="button" class="btn btn-primary"><i class="fa fa-chevron-left"></i>Regresar</button>
	</a>

	<button class="btn btn-danger float-end">Guardar pregunta</button>
	<div></div>
</form>

<script>
	
	var letters = ['A','B','C','D','F','G','H','I','J'];

	function add_choice()
	{
		var choices = document.querySelector(".choice-list");

		if(choices.children.length < letters.length){

			choices.innerHTML += `
			<li class="list-group-item">
		    	${letters[choices.children.length]} : <input type="text" class="form-control" name="choice${choices.children.length}" placeholder="Escribe tu respuesta">
		    	<label style="cursor: pointer;"><input type="radio" value="${letters[choices.children.length]}" name="correct_answer"> Respuesta correcta</label>
		    </li>
		   `;
		}

	}
</script>