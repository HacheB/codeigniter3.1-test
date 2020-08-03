
<h1><?php echo $titreDefaut; ?></h1>

<?php if($this->session->tempdata('users_new')): ?>
	<div class="alert alert-info" role="alert">
	 	<?php
	 		echo $this->session->tempdata('users_new');
	 		$this->session->unset_tempdata('users_new');
	 	?>
	</div>
<?php endif; ?>


<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus cumque natus ratione et. Atque cumque non vero voluptatem dolores soluta nesciunt vel minus explicabo illo similique nobis itaque, dolorem ullam excepturi. Aliquam, quam repellendus tenetur! Atque natus velit molestias modi autem ducimus voluptatum, explicabo cum ipsam doloribus harum, ex id.</p>
