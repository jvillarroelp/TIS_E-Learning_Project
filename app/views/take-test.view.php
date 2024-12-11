<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
	
	<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
		<?php $this->view('includes/crumbs',['crumbs'=>$crumbs])?>

		<?php if($row && !($row->disabled && Auth::access('student'))):?>

		<div class="row">
	 	<center><h4><?=esc(ucwords($row->test))?></h4></center>
	 	<center class="row">
	 		<h5 class="col">Curso: <?=$row->class->class?></h5>
	 		<h5 class="col">Estudiante: <?=$student_row->firstname?> <?=$student_row->lastname?></h5>
	 	</center>

			<table class="table table-hover table-striped table-bordered">
				<tr>
					<th>Creado por:</th><td><?=esc($row->user->firstname)?> <?=esc($row->user->lastname)?></td>
					<th>Fecha de creacion:</th><td><?=get_date($row->date)?></td>
				 
				</tr>

				<?php $active = $row->disabled ? "No":"Yes";?>
				<tr>
					<td><b>Curso:</b> <?=$row->class->class?></td>
					<td colspan="5"><b>Descripcion prueba:</b><br><?=esc($row->description)?></td></tr>
			</table>
 		</div>
 		 
		
		 		<?php

		 			switch ($page_tab) {
		 				case 'view':
		 					// code...
		 					include(views_path('take-test-tab-view'));
		 					break;
 		 	 
		 				
		 				default:
		 					// code...
		 					break;
		 			}


		 		?>
		 
		<?php else:?>
			<center><h4>La prueba no ha sido encontrada</h4></center>
		<?php endif;?>

	</div>

<?php $this->view('includes/footer')?>
