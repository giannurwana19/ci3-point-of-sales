<section class="content-header">
	<h1>
		Items
		<small>Data Barang</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li class="active">Items</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<?php $this->view('message') ?>
			<h3 class="box-title">All item barang</h3>
			<div class="pull-right">
				<a href="<?= site_url('item/create'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add item</a>
			</div>
		</div>
		<div class="box-body">
			<table id="datatable" class="table table-bordered table-hover table-responsive">
				<thead>
					<tr>
						<th style="width: 40px">#</th>
						<th>Barcode</th>
						<th>Name</th>
						<th>Category</th>
						<th>Unit</th>
						<th>Stock</th>
						<th>Price</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php foreach ($items->result() as $item) : ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $item->barcode ?></td>
							<td><?= $item->name ?></td>
							<td><?= $item->category_name ?></td>
							<td><?= $item->unit_name ?></td>
							<td><?= $item->stock ?></td>
							<td><?= $item->price ?></td>
							<td>
								<a href="<?= site_url("item/edit/$item->item_id") ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>

								<form action="<?= site_url("item/delete/$item->item_id") ?>" method="POST" style="display: inline;">
									<input type="hidden" name="item_id" value="<?= $item->item_id ?>">
									<button class="btn btn-danger btn-xs" onclick="return confirm('Hapus item?')"><i class="fa fa-trash"></i> Delete</button>
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

</section>
