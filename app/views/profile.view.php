<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
	
	<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
		<?php $this->view('includes/crumbs',['crumbs'=>$crumbs])?>

		<?php if($row):?>

		<?php
 			$image = get_image($row->image,$row->gender);
 		?>

		<div class="row">
			<div class="col-sm-4 col-md-3">
				<img src="<?=$image?>" class="border border-primary d-block mx-auto rounded-circle " style="width:150px;">
				<h3 class="text-center"><?=esc($row->firstname)?> <?=esc($row->lastname)?></h3>
				<br>
				<?php if(Auth::access('admin') || (Auth::access('reception') && $row->rank == 'student')):?>
				<div class="text-center">
					<a href="<?=ROOT?>/profile/edit/<?=$row->user_id?>">
						<button class="btn-sm btn btn-success">Editar</button>
					</a>
					<a href="<?=ROOT?>/profile/delete/<?=$row->user_id?>">
						<button class="btn-sm btn btn-danger">Borrar</button>
					</a>
				</div>
				<?php endif;?>
			</div>
			<div class="col-sm-8 col-md-9 bg-light p-2">
				<table class="table table-hover table-striped table-bordered">
					<tr><th>Nombre:</th><td><?=esc($row->firstname)?></td></tr>
					<tr><th>Apellido:</th><td><?=esc($row->lastname)?></td></tr>
					<tr><th>Correo electronico:</th><td><?=esc($row->email)?></td></tr>
					<tr><th>Genero:</th><td><?=esc($row->gender)?></td></tr>
					<tr><th>Rol:</th><td><?=ucwords(str_replace("_"," ",$row->rank))?></td></tr>
					<tr><th>Fecha de creacion:</th><td><?=get_date($row->date)?></td></tr>

				</table>
			</div>
		</div>
		<br>
		<div class="container-fluid">
			<ul class="nav nav-tabs">
			  <li class="nav-item">
			    <a class="nav-link <?=$page_tab=='info' ? 'active':'';?>" href="<?=ROOT?>/profile/<?=$row->user_id?>">Informacion basica</a>
			  </li>
			  <?php if(Auth::access('lecturer') || Auth::i_own_content($row)):?>
				  <li class="nav-item">
				    <a class="nav-link <?=$page_tab=='classes' ? 'active':'';?>" href="<?=ROOT?>/profile/<?=$row->user_id?>?tab=classes">Mis cursos</a>
				  </li>

				  <li class="nav-item">
				    <a class="nav-link <?=$page_tab=='tests' ? 'active':'';?>" href="<?=ROOT?>/profile/<?=$row->user_id?>?tab=tests">Pruebas</a>
				  </li>
		 	<?php endif;?>
			</ul>

			<?php

				switch ($page_tab) {
					
					case 'info':
						// code...
						include(views_path('profile-tab-info'));
						break;
					
					case 'classes':
						// code...
						if(Auth::access('lecturer') || Auth::i_own_content($row)){
							include(views_path('profile-tab-classes'));
						}else{
							include(views_path('access-denied'));
						}
						break;
					
					case 'tests':
						// code...
						include(views_path('profile-tab-tests'));
						break;
					
					default:
						// code...
						break;
				}

			?>

		</div>
		<?php else:?>
			<center><h4>El perfil no ha sido encontrado</h4></center>
		<?php endif;?>

	</div>

<?php $this->view('includes/footer')?>
