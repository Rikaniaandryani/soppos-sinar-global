<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Article
			<small>add new data</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li><a href="<?php echo site_url('admin/article');?>">Article</a></li>
			<li class="active">Add New</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="box">
			<div class="box-body">
				<?php echo form_open_multipart('admin/article/action/insert');?>
				<div class="row">
					<div class="col-md-3 col-lg-3">
						<div class="form-group">
							<label for="article">Image Index</label>
							<input id="image-index" type="file" name="image" class="form-control" required>
							<img id="preview-image" src="<?php echo base_url('dist/img/assets/no-image-1.jpg');?>" class="preview-image img img-responsive" alt="image index">
						</div>
					</div>
					<div class="col-md-9 col-lg-9">
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="article">Title</label>
									<input type="text" name="title" class="form-control" value="" placeholder="article title" required>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<!-- <div class="col-md-4 col-lg-4">
								<div class="form-group">
									<label for="article">Category</label>
									<select id="category" name="category" class="form-control" required>
										<option disabled selected>Select Category</option>
										<?php foreach ($category as $category): ?>
											<option value="<?php echo $category->article_cat_id;?>">
												<?php echo ucwords($category->article_cat_name);?>
											</option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-md-8 col-lg-8">
								<div class="form-group">
									<label for="article">Tags</label>
									<select name="tag[]" class="form-control select2" multiple="multiple" data-placeholder="select tags">
										<?php foreach ($tag as $tag): ?>
											<option value="<?php echo $tag->tag_name;?>">
												<?php echo ucwords($tag->tag_name);?>
											</option>
										<?php endforeach ?>
									</select>
								</div>
							</div> -->
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="form-group">
							<label for="article">Description</label>
							<textarea name="desc" class="ckeditor"></textarea>
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group">
					<button type="reset" class="btn btn-default btn-flat"><i class="fa fa-refresh"></i> Reset</button>
					<button type="submit" name="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
				</div>
				<?php echo form_close();?>
			</div><!-- /.box-body -->
		</div><!-- /.box -->

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
