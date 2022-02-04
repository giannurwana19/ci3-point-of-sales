<section class="content-header">
	<h1>
		customer
		<small>Pengguna</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li class="active">customers</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">All customer</h3>
			<div class="pull-right">
				<a href="<?= site_url('customer/create'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add customer</a>
			</div>
		</div>
		<div class="box-body">
			<table id="datatable" class="table table-bordered table-hover table-responsive">
				<thead>
					<tr>
						<th style="width: 40px">#</th>
						<th>Name</th>
						<th>customername</th>
						<th>Gender</th>
						<th>Address</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php foreach ($customers->result() as $customer) : ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $customer->name ?></td>
							<td><?= $customer->phone ?></td>
							<td><?= $customer->gender ?></td>
							<td><?= $customer->address ?></td>
							<td>
								<a href="<?= site_url("customer/edit/$customer->customer_id") ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>

								<form action="<?= site_url("customer/delete/$customer->customer_id") ?>" method="POST" style="display: inline;">
									<input type="hidden" name="customer_id" value="<?= $customer->customer_id ?>">
									<button class="btn btn-danger btn-xs" onclick="return confirm('Hapus customer?')"><i class="fa fa-trash"></i> Delete</button>
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

</section>
