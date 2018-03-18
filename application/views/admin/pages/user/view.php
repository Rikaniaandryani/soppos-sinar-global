<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Administrator
			<small>data </small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active">Administrator</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Alert -->
		<div class="row form-group">
			<!-- Menampilkan hasil kesalahan validasi dalam proses input dan update data -->
			<?php if ($this->session->flashdata('error')):?>
				<div class="col-md-12 wow fadeInDown"> 
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-close"></i> Error!</h4>
						<ul>
							<?php echo $this->session->flashdata('error'); ?>
						</ul>
					</div><!-- /alert -->
				</div><!-- /col-12 -->
			<?php endif;?>

			<!-- Menampilkan hasil sukses dari proses input dan update data -->
			<?php if ($this->session->flashdata('success')): ?>
				<div class="col-md-12 wow fadeInDown"> 
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Success!</h4>
						<?php echo $this->session->flashdata('success')?>
					</div><!-- /alert -->
				</div><!-- /col-12 -->
			<?php endif; ?>

			<!-- Menampilkan hasil kesalahan dari proses input dan update data -->
			<?php if ($this->session->flashdata('failed')): ?>
				<div class="col-md-12 wow fadeInDown"> 
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-close"></i> Failed!</h4>
						<?php echo $this->session->flashdata('failed')?>
					</div><!-- /alert -->
				</div><!-- /col-12 -->
			<?php endif; ?>
		</div><!-- /row -->
		<div class="box">
			<div class="box-body">
				<div class="form-group text-right">
					<button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#addUser" title="Add New"><i class="fa fa-plus"></i> Add New</button>
				</div>
				<table id="datatable1" class="table table-striped">
					<thead>
						<tr>
							<th width="5%">#</th>
							<th>Name</th>
							<th>Username</th>
							<th>Email</th>
							<th>Level User</th>
							<th>Satus</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($users as $user): ?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo ucwords($user->user_name);?></td>
								<td><?php echo $user->user_username;?></td>
								<td><?php echo $user->user_email;?></td>
								<td>
									<?php
										echo ucwords($user->user_level);
									?>
								</td>
								<td>
									<?php if ($user->user_status == 'block'): ?>
										<span class="label label-danger">Not Active</span>
									<?php else: ?>
										<span class="label label-success">Active</span>
									<?php endif ?>
								</td>
								<td>

									<!-- Action -->
										<a id="editButton" class="btn btn-flat btn-default btn-edit-user" data-id="<?php echo hash_link_encode($user->user_session);?>" title="Update">
											<i class="fa fa-edit"></i>
										</a>
										<a onclick="return confirm('Are you sure ?')"  href="<?php echo site_url('admin/user/action/delete?id='.hash_link_encode($user->user_session));?>" class="btn btn-warning btn-flat" title="Hapus">
										<i class="fa fa-trash"></i>
										</a>
								</td>
							</tr>
						<?php $no++; endforeach ?>
					</tbody>
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Username</th>
							<th>Email</th>
							<th>Level User</th>
							<th>Satus</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- MODAL ADD -->
<div id="addUser" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add User</h4>
			</div>
			<?php echo form_open('admin/user/action/insert');?>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6 col-lg-6">
						<div class="form-group">
							<label for="user">Name</label>
							<input type="text" name="name" class="form-control" value="" placeholder="name" required>
						</div>
						<div class="form-group">
							<label for="user">Username *</label>
							<input type="text" name="username" class="form-control" value="" placeholder="username" required>
						</div>
						<div class="form-group">
							<label for="user">Email</label>
							<input type="email" name="email" class="form-control" value="" placeholder="email" required>
						</div>
						<div class="form-group">
							<label for="user">Level User</label>
							<select name="level" class="form-control">
								<option disabled selected>--Select Level--</option>
								<option value="owner">Owner</option>
								<option value="admin">Admin</option>
								<option value="user">User</option>
							</select>
						</div>
						<div class="form-group">
							<label for="user">Status</label>
							<select name="status" class="form-control">
								<option disabled selected>--Select Status--</option>
								<option value="active">Active</option>
								<option value="block">Block</option>
							</select>
						</div>
					</div>
					<div class="col-md-6 col-lg-6">
						<div class="form-group">
							<label for="user">Password *</label>
							<input type="password" name="pass1" class="form-control" value="" placeholder="password" required>
						</div>
						<div class="form-group">
							<label for="user">Konfirmasi Password</label>
							<input type="password" name="pass2" class="form-control" value="" placeholder="password confirm" required>
						</div>
						<div class="form-group">
							<div class="callout callout-warning">
							<sup><strong>*</strong></sup> Hanya menggunakan karakter a-z, A-Z, 0-9 dan _ (garis bawah).
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-default btn-flat"><i class="fa fa-refresh"></i> Reset</button>
				<button type="submit" name="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
			</div>
			<?php echo form_close();?>
		</div>

	</div>
</div>

<!-- MODAL EDIT -->

<div id="editUser" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Update User</h4>
			</div>
			<?php echo form_open('admin/user/action/update');?>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6 col-lg-6">						
						<div class="form-group">
							<label for="user">Full Name</label>
							<input id="id" type="hidden" name="id" value="">
							<input id="name" type="text" name="name" class="form-control" value="" placeholder="name" required>
						</div>
						<div class="form-group">
							<label for="user">Username *</label>
							<input id="username" type="text" name="username" class="form-control" value="" placeholder="username" required>
						</div>
						<div class="form-group">
							<label for="user">Email</label>
							<input id="email" type="email" name="email" class="form-control" value="" placeholder="email" required>
						</div>
						<div class="form-group">
							<label for="user">Level User</label>
							<select id="level" name="level" class="form-control">
								<option disabled selected>--Select Level--</option>
								<option value="owner">Owner</option>
								<option value="admin">Admin</option>
								<option value="user">User</option>
							</select>
						</div>
						<div class="form-group">
							<label for="user">Status</label>
							<select id="status" name="status" class="form-control">
								<option disabled selected>--Select Status--</option>
								<option value="active">Active</option>
								<option value="block">Block</option>
							</select>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">						
						<div class="form-group">
							<label for="user">Old Password</label>
							<input type="password" name="oldpass" class="form-control" value="" placeholder="old password">
						</div>
						<div class="form-group">
							<label for="user">New Password *</label>
							<input type="password" name="pass1" class="form-control" value="" placeholder="password">
						</div>
						<div class="form-group">
							<label for="user">Password Confirm</label>
							<input type="password" name="pass2" class="form-control" value="" placeholder="password confirm">
						</div>
						<div class="form-group">
							<div class="callout callout-warning">
							<sup><strong>*</strong></sup> Hanya menggunakan karakter a-z, A-Z, 0-9 dan _ (garis bawah).
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-default btn-flat"><i class="fa fa-refresh"></i> Reset</button>
				<button type="submit" name="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
			</div>
			<?php echo form_close();?>
		</div>

	</div>
</div>
