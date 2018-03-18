<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>S E O Page
			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active">S E O Page</li>
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
		<!-- Default box -->
		<div class="box">
			<div class="box-body">
				<table id="datatable1" class="table table-striped">
					<thead>
						<tr>
							<th width="5%">#</th>
							<th width="10%">Page</th>
							<th width="20%">Title Page</th>
							<th width="20%">Keywords</th>
							<th width="25%">Description</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($seo as $seo): ?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $seo->seo_page;?></td>
								<td><?php echo $seo->seo_title;?></td>
								<td>
									<div class="text-scroll">
										<?php echo $seo->seo_keyword;?>
									</div>
								</td>
								<td>
									<div class="text-scroll">
										<?php echo $seo->seo_desc;?>
									</div>
								</td>
								<td>

									<!-- Action -->
									<a class="btn btn-flat btn-default btn-edit-seo" data-id="<?php echo hash_link_encode($seo->seo_id);?>" title="Update">
										<i class="fa fa-edit"></i>
									</a>
								</td>
							</tr>
						<?php $no++; endforeach ?>
					</tbody>
					<thead>
						<tr>
							<th>#</th>
							<th>Page</th>
							<th>Title Page</th>
							<th>Keywords</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<div id="update" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Update S E O</h4>
			</div>
			<?php echo form_open_multipart('admin/seo/action/update');?>
			<div class="modal-body">
				<div class="form-group">
					<label for="seo">Title</label>
					<input id="id" type="hidden" name="id">
					<input id="title" type="text" name="title" class="form-control" placeholder="title page" required>
				</div>
				<div class="form-group">
					<label for="seo">Keywords</label>
					<textarea id="keyword" name="keyword" class="form-control" placeholder="keywords page" rows="5" maxlength="300" required></textarea>
				</div>
				<div class="form-group">
					<label for="seo">Description</label>
					<textarea id="desc" name="desc" class="form-control" placeholder="description page" rows="5" maxlength="300" required></textarea>
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
