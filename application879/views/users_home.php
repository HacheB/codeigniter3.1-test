<?php
	function formatDate ($date) {
		$d = new DateTime($date);
		return $d->format('Y/m/d H:i');
	}
?>
<div class="row mb-2">
	<div class="col">
		<h1 class="h2"><?php echo $titreDefaut; ?></h1>
	</div>
	<div class="col-auto">
		<a href="users/create" class="btn btn-info btn-lg">Ajouter utilisateur</a>
	</div>
</div>

<?php if($this->session->tempdata()): ?>
	<?php foreach ($this->session->tempdata() as $key => $tempdata): ?>
		<div class="alert alert-info" role="alert">
		 	<?php
		 		echo $tempdata;
		 		$this->session->unset_tempdata($key);
		 		// echo $this->session->tempdata('users_new');
		 		// $this->session->unset_tempdata('users_new');
		 	?>
		</div>
	<?php endforeach; ?>
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
				<th scope="col">Téléphone</th>
				<th scope="col">Edition</th>
				<th scope="col">Création</th>
				<th></th>
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
				<td class=""><?php echo formatDate($user->date_updated); ?></td>
				<td class=""><?php echo formatDate($user->date_created); ?></td>
				<td>
					<a href="<?php echo site_url('users/update/'. $user->id); ?>" class="btn btn-info btn-sm">Editer</a>
					<a href="<?php echo site_url('users/delete/'. $user->id); ?>" class="btn btn-danger btn-sm usersDeleteConfirm-js">Supprimer</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	<?php else: ?>
		<h2 class="h4">Aucun utilisateur est enregistré.</h2>
	<?php endif; ?>
</div>

<script>
	var suppLinkEls = document.getElementsByClassName('usersDeleteConfirm-js');
	var confirmIt = function (e) {
		if (!confirm('Etes-vous sûr de vouloir supprimer cette entrée ?')) e.preventDefault();
	};
	for (var i = 0, l = suppLinkEls.length; i < l; i++) {
		suppLinkEls[i].addEventListener('click', confirmIt, false);
	}
</script>
