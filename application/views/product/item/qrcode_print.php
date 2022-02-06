<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>QR Code Product <?= $item->barcode ?></title>
	<link rel="stylesheet" href="<?= base_url('assets/css/normalize.css') ?>">
</head>

<body>
	<br><br>
	<img src="<?= base_url("uploads/qrcode/$item->barcode.png") ?>" alt="oke">
	<div><?= $item->barcode ?></div>
</body>

</html>
