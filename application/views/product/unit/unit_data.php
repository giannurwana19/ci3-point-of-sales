<section class="content-header">
	<h1>
		Unit
		<small>Satuan Barang</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li class="active">units</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<?php $this->view('message') ?>
			<h3 class="box-title">All satuan barang</h3>
			<div class="pull-right">
				<a href="<?= site_url('unit/create'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add unit</a>
			</div>
		</div>
		<div class="box-body">
			<table class="table table-bordered table-hover table-responsive">
				<thead>
					<tr>
						<th style="width: 40px">#</th>
						<th>Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php foreach ($units->result() as $unit) : ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $unit->name ?></td>
							<td>
								<a href="<?= site_url("unit/edit/$unit->unit_id") ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>

								<form action="<?= site_url("unit/delete/$unit->unit_id") ?>" method="POST" style="display: inline;">
									<input type="hidden" name="unit_id" value="<?= $unit->unit_id ?>">
									<button class="btn btn-danger btn-xs" onclick="return confirm('Hapus unit?')"><i class="fa fa-trash"></i> Delete</button>
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

</section>
