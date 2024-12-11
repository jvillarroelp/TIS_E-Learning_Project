<?php $this->view('includes/header')?>
 
	<div class="container-fluid">

		<form method="post">
		<div class="p-4 mx-auto mr-4 shadow rounded" style="margin-top: 50px;width:100%;max-width: 340px;">
			<h2 class="text-center">E-learning</h2>
			<img src="<?=ROOT?>/assets/logo.png" class="border border-primary d-block mx-auto rounded-circle" style="width:100px;">
			<h3>Agregar usuario</h3>

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

			<input class="my-2 form-control" value="<?=get_var('firstname')?>" type="firstname" name="firstname" placeholder="Nombre" >
			<input class="my-2 form-control" value="<?=get_var('lastname')?>" type="lastname" name="lastname" placeholder="Apellido" >
			<input class="my-2 form-control" value="<?=get_var('email')?>" type="email" name="email" placeholder="Correo electronico" >

			<select class="my-2 form-control" name="gender">
				<option <?=get_select('gender','')?> value="">--Seleccionar genero--</option>
				<option <?=get_select('gender','male')?> value="male">Hombre</option>
				<option <?=get_select('gender','female')?> value="female">Mujer</option>
			</select>

			<?php if($mode == 'students'):?>
				<input type="hidden" value="student" name="rank">
			<?php else:?>
				<select class="my-2 form-control" name="rank">
					<option <?=get_select('rank','')?> value="">--Seleccionar rol--</option>
					<option <?=get_select('rank','student')?> value="student">Estudiante</option>
					<option <?=get_select('rank','reception')?> value="reception">Recepcion</option>
					<option <?=get_select('rank','lecturer')?> value="lecturer">Profesor</option>
					<option <?=get_select('rank','admin')?> value="admin">Admin</option>

					<?php if(Auth::getRank() == 'super_admin'):?>
					<option <?=get_select('rank','super_admin')?> value="super_admin">Super Admin</option>
					<?php endif;?>

				</select>
			<?php endif;?>

			<input class="my-2 form-control" value="<?=get_var('password')?>" type="text" name="password" placeholder="Contraseña">
			<input class="my-2 form-control" value="<?=get_var('password2')?>" type="text" name="password2" placeholder="Confirmar contraseña">
			<br>
			<button class="btn btn-primary float-end">Agregar</button>

			<?php if($mode == 'students'):?>
				<a href="<?=ROOT?>/students">
					<button type="button" class="btn btn-danger">Cancelar</button>
				</a>
			<?php else:?>
				<a href="<?=ROOT?>/users">
					<button type="button" class="btn btn-danger">Cancelar</button>
				</a>
			<?php endif;?>
			
		</div>
		</form>
	</div>

<?php $this->view('includes/footer')?>