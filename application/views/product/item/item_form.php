<section class="content-header">
	<h1>
		Item
		<small>Data Barang</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li class="active">Item</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?= ucfirst($page) ?> item</h3>
			<div class="pull-right">
				<a href="<?= site_url('item'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> Back</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<!-- <?php echo validation_errors(); ?> -->
					<form action="<?= site_url('item/proccess') ?>" method="POST">
						<input type="hidden" name="item_id" value="<?= $item->item_id ?>">

						<div class="form-group <?= form_error('barcode') ? 'has-error' : null ?>">
							<label for="barcode">Barcode *</label>
							<input type="text" name="barcode" value="<?= $item->barcode ?>" class="form-control" id="barcode" autofocus required>
							<?= form_error('barcode') ?>
						</div>


						<div class="form-group <?= form_error('name') ? 'has-error' : null ?>">
							<label for="name">Product Name *</label>
							<input type="text" name="name" value="<?= $item->name ?>" class="form-control" id="name" autofocus>
							<?= form_error('name') ?>
						</div>

						<div class="form-group">
							<label for="category_id">Category</label>
							<select name="category_id" class="form-control" id="category_id">
								<?php foreach ($categories as $category) : ?>
									<option value="<?= $category->category_id ?>"><?= $category->name ?></option>
								<?php endforeach ?>
							</select>
						</div>

						<div class="form-group">
							<label for="unit_id">Unit</label>
							<?= form_dropdown('unit_id', $units, $selected_unit, 'class="form-control" id="unit_id"') ?>
						</div>

						<div class="form-group <?= form_error('price') ? 'has-error' : null ?>">
							<label for="price">price *</label>
							<input type="number" name="price" value="<?= $item->price ?>" class="form-control" id="price" required>
							<?= form_error('price') ?>
						</div>

						<button type="submit" name="<?= $page ?>" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Save</button>
						<button type="reset" class="btn btn-warning">Reset</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	</div>
</section>
