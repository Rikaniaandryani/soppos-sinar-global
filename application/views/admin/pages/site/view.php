<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
			<h1>
					General Site
					<small></small>
			</h1>
			<ol class="breadcrumb">
					<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
					<li class="active">Site</li>
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
			<?php echo form_open_multipart('admin/site/action/update');?>
				<div class="box-body">
					<div class="row">
						<div class="col-md-4 col-lg-4">
							<div class="form-group">
								<label for="site">Name</label>
								<input tupe="text" name="name" class="form-control" rows="3" value="<?php echo $site->site_name;?>" placeholder="general site name">
							</div>
						</div>
						<div class="col-md-4 col-lg-4">
							<div class="form-group">
								<label for="site">Email</label>
								<input tupe="email" name="email" class="form-control" rows="3" value="<?php echo $site->site_email;?>" placeholder="general site email">
							</div>
						</div>
						<div class="col-md-4 col-lg-4">
							<div class="form-group">
								<label for="site">Title</label>
								<input tupe="title" name="title" class="form-control" rows="3" value="<?php echo $site->site_title;?>" placeholder="general site title">
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-6 col-md-6 col-lg-6">
							<div class="form-group">
								<label for="site">Keywords</label>
								<textarea name="keyword" class="form-control" placeholder="general keywords" rows="4"><?php echo $site->site_keyword;?></textarea>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6">
							<div class="form-group">
								<label for="site">Description</label>
								<textarea name="desc" class="form-control" placeholder="general description" rows="4"><?php echo $site->site_desc;?></textarea>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-6 col-md-6 col-lg-6">
							<div class="form-group">
								<label for="site">Logo</label>
								<input type="file" name="logo" class="form-control">
							</div>
							<div class="row">
								<div class="col-sm-6 col-md-6 col-lg-6">
									<?php if ($logo->image_name != NULL): ?>
										<img src="<?php echo base_url($file_path.'/'.$logo->image_name);?>" class="img img-responsive" alt="logo">
									<?php else: ?>
										<img src="<?php echo base_url('dist/img/assets/no-image-2.jpg');?>" class="img img-responsive" alt="logo">
									<?php endif ?>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6">
							<div class="form-group">
								<label for="site">Favicon</label>
								<input type="file" name="favicon" class="form-control">
							</div>
							<div class="row">
								<div class="col-sm-6 col-md-6 col-lg-6">
									<?php if ($fav->image_name != NULL): ?>
										<img src="<?php echo base_url($file_path.'/'.$fav->image_name);?>" class="img img-responsive" alt="logo">
									<?php else: ?>
										<img src="<?php echo base_url('dist/img/assets/no-image-2.jpg');?>" class="img img-responsive" alt="logo">
									<?php endif ?>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.box-body -->
				<div class="box-footer">
						<button type="submit" name="save" class="btn btn-flat btn-primary"><i class="fa fa-save"></i> Save</button>
						<button type="reset" name="reset" class="btn btn-flat btn-default"><i class="fa fa-refresh"></i> Reset</button>
				</div><!-- /.box-footer-->
			<?php echo form_close();?>
		</div><!-- /.box -->

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->

