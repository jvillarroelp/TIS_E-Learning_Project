<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
	
	<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
		<?php $this->view('includes/crumbs',['crumbs'=>$crumbs])?>

		<?php if($row):?>
		<div class="card-group justify-content-center">
 

			 <form method="post">
			 	<h3>¿Esta seguro de querer borrar?</h3>
 
			 	<input disabled autofocus class="form-control" value="<?=get_var('school',$row[0]->school)?>" type="text" name="school" placeholder="Nombre de escuela"><br><br>
			 	<input type="hidden" name="id">
			 	<input class="btn btn-danger float-end" type="submit" value="Borrar">

			 	<a href="<?=ROOT?>/schools">
			 		<input class="btn btn-success" type="button" value="Cancelar">
			 	</a>
			 </form>
			
		</div>
		<?php else: ?>

			<div style="text-align: center;">
				<h3>La escuela no ha sido encontrada</h3>
				<div class="clearfix"></div>
				<br><br>
				<a href="<?=ROOT?>/schools">
			 		<input class="btn btn-danger" type="button" value="Cancelar">
			 	</a>
		 	</div>
		<?php endif; ?>

		
	 
	</div>
 
<?php $this->view('includes/footer')?>