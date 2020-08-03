
<h1>Création d'un utilisateur</h1>

<?php 
$params =array('method' => 'POST');
echo form_open('/users/create',$params);
?>
	<div class="form-group">
		<label for="pseudo">Prénom : </label>
		<input class="" type="text" name="firstname" value="<?php echo set_value('firstname')?>" />
		<?php echo form_error('firstname', '<small id="" class="form-text text-muted">', '</small>') ?>
	</div>
	<div class="form-group">
		<label for="pseudo">Nom : </label>
		<input class="" type="text" name="lastname" value="<?php echo set_value('lastname')?>" />
		<?php echo form_error('lastname', '<small id="" class="form-text text-muted">', '</small>') ?>
	</div>
	<div class="form-group">
		<label for="pseudo">Mail : </label>
		<input class="" type="mail" name="email" value="<?php echo set_value('email')?>" />
		<?php echo form_error('email', '<small id="" class="form-text text-muted">', '</small>') ?>
	</div>
	<div class="form-group">
		<label for="pseudo">Tél : </label>
		<input class="" type="text" name="phone" value="<?php echo set_value('phone')?>" />
		<?php echo form_error('phone', '<small id="" class="form-text text-muted">', '</small>') ?>
	</div>

	<input type="submit" value="Envoyer" />
<?php
 echo form_close()
?>
