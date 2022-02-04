<section class="content-header">
	<h1>
		category
		<small>Pengguna</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li class="active">categorys</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<?php $this->view('message') ?>
			<h3 class="box-title">All category barang</h3>
			<div class="pull-right">
				<a href="<?= site_url('category/create'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add category</a>
			</div>
		</div>
		<div class="box-body">
			<table id="datatable" class="table table-bordered table-hover table-responsive">
				<thead>
					<tr>
						<th style="width: 40px">#</th>
						<th>Name</th>
						<th>name</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php foreach ($categorys->result() as $category) : ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $category->name ?></td>
							<td>
								<a href="<?= site_url("category/edit/$category->category_id") ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>

								<form action="<?= site_url("category/delete/$category->category_id") ?>" method="POST" style="display: inline;">
									<input type="hidden" name="category_id" value="<?= $category->category_id ?>">
									<button class="btn btn-danger btn-xs" onclick="return confirm('Hapus category?')"><i class="fa fa-trash"></i> Delete</button>
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

</section>
