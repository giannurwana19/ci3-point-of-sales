<section class="content-header">
	<h1>
		User
		<small>Pengguna</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li class="active">Users</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">All User</h3>
			<div class="pull-right">
				<a href="<?= site_url('user/add'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-user-plus"></i> Add User</a>
			</div>
		</div>
		<div class="box-body">
			<table class="table table-bordered table-hover table-responsive">
				<thead>
					<tr>
						<th style="width: 40px">#</th>
						<th>Name</th>
						<th>Username</th>
						<th>Address</th>
						<th>Level</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php foreach ($users->result() as $user) : ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $user->name ?></td>
							<td><?= $user->username ?></td>
							<td><?= $user->address ?></td>
							<td><?= $user->level == 1 ? 'admin' : 'kasir'; ?></td>
							<td>
								<a href="<?= site_url("user/edit/$user->user_id") ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>

								<form action="<?= site_url("user/delete/$user->user_id") ?>" method="POST" style="display: inline;">
									<input type="hidden" name="user_id" value="<?= $user->user_id ?>">
									<button class="btn btn-danger btn-xs" onclick="return confirm('Hapus user?')"><i class="fa fa-trash"></i> Delete</button>
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

</section>
