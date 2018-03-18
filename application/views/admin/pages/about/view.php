<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
			<h1>
					About
					<small></small>
			</h1>
			<ol class="breadcrumb">
					<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
					<li class="active">About</li>
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
			<?php echo form_open_multipart('admin/about/action/update');?>
				<div class="box-body">
					<div class="form-group">
						<label for="about">Small Desc</label>
						<textarea name="name" class="form-control" rows="3" placeholder="name / title"><?php echo $about->info_name;?></textarea>
					</div>
					<div class="form-group">
						<label for="about">Description</label>
						<textarea name="desc" class="ckeditor"><?php echo $about->info_desc;?></textarea>
					</div>
					<!-- <div class="row">
						<div class="col-md-6 col-lg-6">
							<div class="form-group">
								<label for="about">Image</label>
								<input type="file" name="image" class="form-control" value="" placeholder="">
							</div>
							<div class="form-group">
								<div class="callout callout-warning">
									<h4><i class="fa fa-warning"></i> <strong></strong></h4>
									Use an image with dimensions of <strong>... x ... pixels.</strong>
									<p>Use an image with a maximum size of <strong> 2 MB.</strong></p>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-6">
							<img id="preview-image" src="<?php echo base_url($path_file.'/'.$about->image_name);?>" class="img img-responsive" alt="about image">
						</div>
					</div> -->
				</div><!-- /.box-body -->
				<div class="box-footer">
						<button type="submit" name="save" class="btn btn-flat btn-primary"><i class="fa fa-save"></i> Save</button>
						<button type="reset" name="reset" class="btn btn-flat btn-default"><i class="fa fa-refresh"></i> Reset</button>
				</div><!-- /.box-footer-->
			<?php echo form_close();?>
		</div><!-- /.box -->

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
