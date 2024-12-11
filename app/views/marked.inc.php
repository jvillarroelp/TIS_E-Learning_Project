<div class="card-group justify-content-center">

<div class="table-responsive container-fluid p-0" >
	<table class="table table-striped table-hover">
		<tr><th></th><th>Nombre prueba</th><th>Estudiante</th><th>Fecha de envio</th><th>Revisado por</th><th>Fecha de revision</th>
			<th>Respondido</th>
			<th>Puntaje</th>
			<th></th>
		</tr>
		<?php if(isset($test_rows) && $test_rows):?>
			 
			<?php foreach ($test_rows as $test_row):?>
			 
			 <tr>
			 	<td>
			 	
			 	</td>
			 	<td><?=$test_row->test_details->test?></td>
			 	<td><?=$test_row->user->firstname?> <?=$test_row->user->lastname?></td>
			 	<td><?=get_date($test_row->submitted_date)?></td>

			 	<td>

			 		<?php
			 			$user = new User();
			 			$my_marker = $user->first('user_id',$test_row->marked_by);
			 			if($my_marker){
			 				echo $my_marker->firstname . ' ' . $my_marker->lastname;
			 			}
			 		?>
			 		
			 	</td>
			 	<td><?=get_date($test_row->marked_date)?></td>

			 	<td>
			 		<?php
			 			$percentage = get_answer_percentage($test_row->test_id,$test_row->user_id);
			 		?>
 					<?=$percentage?>%
			 	</td>
			 	<td>
			 		<?= get_score_percentage($test_row->test_details->test_id,$test_row->user->user_id)?>%
			 	</td>
				<td>
			  
			 		<a href="<?=ROOT?>/marked_single/<?=$test_row->test_id?>/<?=$test_row->user->user_id?>">
			 			<button class="btn btn-sm btn-primary">Ver <i class="fa fa-chevron-right"></i></button>
			 		</a>

			 	</td>

			 </tr>

 			<?php endforeach;?>
			<?php else:?>
				<tr><td colspan="10"><center>No hay pruebas encontradas por el momento</center></td></tr>
			<?php endif;?>

	</table>
</div>
</div>