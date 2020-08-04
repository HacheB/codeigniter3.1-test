<h1 class="h2">Mise à jour de l'utilisateur</h1>

<?php 
$params =array('method' => 'POST');
echo form_open(uri_string(),$params);
?>
	<div class="form-group">
		<label for="fFirstname">Prénom* : </label>
		<input class="form-control" id="fFirstname" type="text" name="firstname" value="<?php echo set_value('firstname', $firstname)?>" />
		<?php echo form_error('firstname', '<small class="form-text text-danger">', '</small>') ?>
	</div>
	<div class="form-group">
		<label for="fLastname">Nom* : </label>
		<input class="form-control" id="fLastname" type="text" name="lastname" value="<?php echo set_value('lastname', $lastname)?>" />
		<?php echo form_error('lastname', '<small class="form-text text-danger">', '</small>') ?>
	</div>
	<div class="form-group">
		<label for="fEmail">Mail* : </label>
		<input class="form-control" id="fEmail" type="email" name="email" value="<?php echo set_value('email', $email)?>" />
		<?php echo form_error('email', '<small class="form-text text-danger">', '</small>') ?>
	</div>
	<div class="form-group">
		<label for="fPhone">Tél : </label>
		<input class="form-control" id="fPhone" type="text" name="phone" value="<?php echo set_value('phone', $phone)?>" />
		<?php echo form_error('phone', '<small class="form-text text-danger">', '</small>') ?>
	</div>

	<input type="submit" value="Envoyer" class="btn btn-primary btn-lg" />
	<a href="<?php echo site_url('users'); ?>" class="btn btn-lg">Annuler</a>
<?php
 echo form_close()
?>
