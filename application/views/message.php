<?php if ($this->session->has_userdata('success')) : ?>
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h5><i class="icon fa fa-check"></i>
			<?= $this->session->flashdata('success'); ?>
		</h5>
	</div>
<?php endif; ?>

<?php if ($this->session->has_userdata('error')) : ?>
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h5><i class="icon fa fa-ban"></i>
			<?= $this->session->flashdata('error'); ?>
		</h5>
	</div>
<?php endif; ?>
