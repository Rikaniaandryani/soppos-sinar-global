<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Product
			<small>add new data</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li><a href="<?php echo site_url('admin/product');?>">Products</a></li>
			<li class="active">Add New</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="box">
			<div class="box-body">
				<?php echo form_open_multipart('admin/product/action/insert');?>
				<div class="row">
					<div class="col-md-3 col-lg-3">
						<div class="form-group">
							<label for="product">Image Index</label>
							<input id="image-index" type="file" name="image[]" class="form-control" required>
							<img id="preview-image" src="<?php echo base_url('dist/img/assets/no-image-1.jpg');?>" class="preview-image img img-responsive" alt="image index">
						</div>
					</div>
					<div class="col-md-9 col-lg-9">
						<div class="row">
							<div class="col-md-4 col-lg-4">
								<div class="form-group">
									<label for="product">Code</label>
									<input type="text" name="code" class="form-control" value="" placeholder="product code" required>
								</div>
							</div>
							<div class="col-md-4 col-lg-4">
								<div class="form-group">
									<label for="product">Category</label>
									<select id="category" name="category" class="form-control" required>
										<option disabled selected>Select Category</option>
										<?php foreach ($category as $category): ?>
											<option value="<?php echo $category->category_id;?>">
												<?php echo ucwords($category->category_name);?>
											</option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-md-4 col-lg-4">
								<div class="form-group">
									<label for="product">Brand</label>
									<select id="brand" name="brand" class="form-control" required>
										<option disabled selected>Select Brand</option>
										<?php foreach ($brand as $brand): ?>
											<option value="<?php echo $brand->brand_id;?>">
												<?php echo ucwords($brand->brand_name);?>
											</option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="product">Name</label>
									<input type="text" name="name" class="form-control" value="" placeholder="product name" required>
								</div>
							</div>
							<!-- <div class="col-md-4 col-lg-4">
								<div class="form-group">
									<label for="product">Sub Category</label>
									<select id="subcat" name="subcat" class="form-control" required>
											<option disabled selected>Select Sub Category</option>
									</select>
								</div>
							</div> -->
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-4 col-lg-4">
						<div class="form-group">
							<label for="product">Price</label>
							<input type="number" name="price" class="form-control" value="" placeholder="product price" required>
						</div>
					</div>
					<div class="col-md-4 col-lg-4">
						<div class="form-group">
							<label for="product">Price Strip</label>
							<input type="number" name="strip" class="form-control" value="" placeholder="product price strip">
						</div>
					</div>
					<div class="col-md-4 col-lg-4">
						<div class="form-group">
							<label for="product">Stock</label>
							<input type="number" name="stock" class="form-control" value="" placeholder="product stock" required>
						</div>
					</div>
					<div class="col-md-6 col-lg-6">
						<div class="form-group">
							<label for="product">Weight (kg)</label>
							<input type="number" name="weight" class="form-control" value="" placeholder="product weight" required>
						</div>
					</div>
					<div class="col-md-6 col-lg-6">
						<label for="product">Dimension (Length x Width x Height) (cm)</label>
						<div class="row">
							<div class="col-md-4 col-lg-4">
								<div class="form-group">
									<input type="number" name="length" class="form-control" value="" placeholder="lenght" required>
								</div>
							</div>
							<div class="col-md-4 col-lg-4">
								<div class="form-group">
									<input type="number" name="width" class="form-control" value="" placeholder="width" required>
								</div>
							</div>
							<div class="col-md-4 col-lg-4">
								<div class="form-group">
									<input type="number" name="height" class="form-control" value="" placeholder="height" required>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="form-group">
							<label for="product">Description</label>
							<textarea name="desc" class="ckeditor"></textarea>
						</div>
					</div>
				</div>
				<hr>
				<!-- <div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="form-group">
							<label for="product">Image Alt</label>
							<input type="text" name="alt" class="form-control" value="" placeholder="image alt" required>
						</div>
					</div>
				</div> -->
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="form-group">
							<div class="callout callout-warning">
								<h4><i class="fa fa-warning"></i></h4>
								<p>lorem ipsum </p>
							</div>
						</div>
					</div>
					<?php for ($i=1; $i < 6; $i++):?>
						<div class="col-md-5ths col-lg-5ths col-sm-6 col-xs-10">
							<div class="form-group">
								<label for="product">Image </label>
								<input type="file" name="image[]" class="form-control">
								<!-- <div style="border: 1px solid #ddd; margin-top: 5px; padding: 5px;">
									<img id="preview-image<?php echo $i;?>" src="" class="img img-responsive" alt="product image">
								</div> -->
							</div>
						</div>
					<?php endfor ?>
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
