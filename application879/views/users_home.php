
<h1 class="h2"><?php echo $titreDefaut; ?></h1>

<?php if($this->session->tempdata('users_new')): ?>
	<div class="alert alert-info" role="alert">
	 	<?php
	 		echo $this->session->tempdata('users_new');
	 		$this->session->unset_tempdata('users_new');
	 	?>
	</div>
<?php endif; ?>

<div class="wrapper_users mt-4">
	<?php if (!empty($users) && count($users) > 0): ?>
	<table class="table table-striped table-sm ">
		<thead class="thead-light">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Prénom</th>
				<th scope="col">Nom</th>
				<th scope="col">Mail</th>
				<th scope="col">Phone</th>
				<th scope="col">Edition</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($users as $key => $user): ?>
			<tr class="">
				<td class=""><?php echo $user->id; ?></td>
				<td class=""><?php echo $user->firstname; ?></td>
				<td class=""><?php echo $user->lastname; ?></td>
				<td class=""><?php echo $user->email; ?></td>
				<td class=""><?php echo $user->phone; ?></td>
				<td class=""><?php echo $user->date_updated; ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	<?php else: ?>
		<h2 class="h3 text-info">Aucun utilisateur est enregistré.</h2>
	<?php endif; ?>
</div>
