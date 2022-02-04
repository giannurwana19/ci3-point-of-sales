<section class="content-header">
	<h1>
		supplier
		<small>Pengguna</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li class="active">suppliers</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">All Supplier</h3>
			<div class="pull-right">
				<a href="<?= site_url('supplier/create'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Supplier</a>
			</div>
		</div>
		<div class="box-body">
			<table class="table table-bordered table-hover table-responsive">
				<thead>
					<tr>
						<th style="width: 40px">#</th>
						<th>Name</th>
						<th>suppliername</th>
						<th>Address</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php foreach ($suppliers->result() as $supplier) : ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $supplier->name ?></td>
							<td><?= $supplier->phone ?></td>
							<td><?= $supplier->address ?></td>
							<td><?= $supplier->description ?></td>
							<td>
								<a href="<?= site_url("supplier/edit/$supplier->supplier_id") ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>

								<form action="<?= site_url("supplier/delete/$supplier->supplier_id") ?>" method="POST" style="display: inline;">
									<input type="hidden" name="supplier_id" value="<?= $supplier->supplier_id ?>">
									<button class="btn btn-danger btn-xs" onclick="return confirm('Hapus supplier?')"><i class="fa fa-trash"></i> Delete</button>
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

</section>
