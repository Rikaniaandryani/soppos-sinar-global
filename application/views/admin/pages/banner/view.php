<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Banner
			<small>data</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active">Banner</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
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

			<!-- Menampilkan hasil kesalahan validasi dalam proses input dan update data -->
			<?php if (validation_errors()):?>
				<div class="col-md-12 wow fadeInDown"> 
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-close"></i> Alert!</h4>
						<ul>
							<?php echo validation_errors('<li>','</li>'); ?>
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
				<div class="col-md-12 wow fadeIn"> 
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-close"></i> Failed!</h4>
						<?php echo $this->session->flashdata('failed')?>
					</div><!-- /alert -->
				</div><!-- /col-12 -->
			<?php endif; ?>
		</div><!-- /row -->
		<!-- Default box -->
		<div class="box">
			<div class="box-body">
				<div class="form-group text-right">
					<button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#add" title="Add New"><i class="fa fa-plus"></i> Add New</button>
				</div>
				<table id="datatable1" class="table table-striped">
					<thead>
						<tr>
							<th width="5%">#</th>
							<th width="15%">Image</th>
							<th>Link</th>
							<th>Alt</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($banner as $banner): ?>
							<tr>
								<td><?php echo $no;?></td>
								<td>
									<img src="<?php echo base_url($path_file.'/'.$thumb_pre.$banner->image_name);?>" class="img img-responsive" alt="<?php echo $banner->banner_alt;?>">
								</td>
								<td><?php echo $banner->banner_link;?></td>
								<td><?php echo $banner->banner_alt;?></td>
								<td>
									<!-- Action -->
									<?php if ($banner->banner_pub == '88'): ?>
										<a href="<?php echo site_url('admin/banner/action/publish?id='.hash_link_encode($banner->banner_id));?>" class="btn btn-flat btn-danger" title="Publish">
											<i class="fa fa-bullhorn"></i>
										</a>
									<?php else: ?>
										<a href="<?php echo site_url('admin/banner/action/publish?id='.hash_link_encode($banner->banner_id));?>" class="btn btn-flat btn-success" title="Publish">
											<i class="fa fa-bullhorn"></i>
										</a>
									<?php endif ?>
									<a class="btn btn-flat btn-default btn-edit-banner" data-id="<?php echo hash_link_encode($banner->banner_id);?>" title="Update">
										<i class="fa fa-edit"></i>
									</a>
									<!-- BANNER STATIS TIDAK DIHAPUS -->
									<!-- <a onclick="return confirm('Are you sure ?')"  href="<?php echo site_url('admin/banner/action/delete?id='.hash_link_encode($banner->banner_id));?>" class="btn btn-warning btn-flat" title="Delete">
									<i class="fa fa-trash"></i>
									</a> -->
								</td>
							</tr>
						<?php $no++; endforeach ?>
					</tbody>
					<thead>
						<tr>
							<th>#</th>
							<th>Image</th>
							<th>Link</th>
							<th>Alt</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<div id="add" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add New Banner</h4>
			</div>
			<?php echo form_open_multipart('admin/banner/action/insert');?>
			<div class="modal-body">
				<div class="form-group">
					<label for="banner">Link</label>
					<input type="text" name="link" class="form-control" placeholder="banner link">
				</div>
				<div class="form-group">
					<label for="banner">Image Alt</label>
					<input type="text" name="alt" class="form-control" placeholder="banner alt">
				</div>
				<div class="form-group">
					<label for="banner">Image</label>
					<input type="file" name="image" class="form-control" required>
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

<div id="update" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Update Banner</h4>
			</div>
			<?php echo form_open_multipart('admin/banner/action/update');?>
			<div class="modal-body">
				<div class="form-group">
					<label for="banner">Link</label>
					<input id="id" type="hidden" name="id">
					<input id="link" type="text" name="link" class="form-control" placeholder="banner link">
				</div>
				<div class="form-group">
					<label for="banner">Image Alt</label>
					<input id="alt" type="text" name="alt" class="form-control" placeholder="banner alt">
				</div>
				<div class="form-group">
					<label for="banner">Image</label>
					<input type="file" name="image" class="form-control">
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
