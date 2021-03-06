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
			<?php $this->view('message') ?>
			<h3 class="box-title">Barcode Generator</h3>
			<div class="pull-right">
				<a href="<?= site_url('item'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> Back</a>
			</div>
		</div>
		<div class="box-body">
			<img src="data:image/png;base64,<?= base64_encode($generator->getBarcode($item->barcode, $generator::TYPE_CODE_128)) ?>">
			<br>
			<div><?= $item->barcode ?></div>
			<a href="<?= site_url("item/barcode_print/$item->item_id") ?>" target="_blank" class="btn btn-xs btn-success">Print <i class="fa fa-print"></i></a>
		</div>
	</div>

	<div class="box no-border">
		<div class="box-header">
			<h3 class="box-title">QR-Code Generator <i class="fa fa-qrcode"></i></h3>
		</div>
		<div class="box-body">
			<img src="<?= base_url("uploads/qrcode/$item->barcode.png") ?>" alt="oke">
			<div><?= $item->barcode ?></div>
			<a href="<?= site_url("item/qrcode_print/$item->item_id") ?>" target="_blank" class="btn btn-xs btn-success">Print <i class="fa fa-print"></i></a>
		</div>
	</div>
</section>
