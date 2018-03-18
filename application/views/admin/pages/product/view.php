<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Products
			<small>data</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active">Products</li>
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
				<div class="form-group text-right">
					<button class="btn btn-primary btn-flat" onclick="window.location.href='<?php echo site_url('admin/product/page/add');?>'" title="Add New"><i class="fa fa-plus"></i> Add New</button>
				</div>
				<table id="datatable1" class="table table-striped">
					<thead>
						<tr>
							<th width="5%">#</th>
							<th width="20%">Image (221 X 161 px)</th>
							<th>Code</th>
							<th>Product Name</th>
							<th>Category</th>
							<th>Stock</th>
							<th>Status</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($product as $product): ?>
							<tr>
								<td><?php echo $no;?></td>
								<td>
									<img src="<?php echo base_url('uploads/img/product/'.$thumb_pre.$product->image_name);?>" class="img img-responsive" alt="<?php echo $product->product_alt;?>">
								</td>
								<td><?php echo $product->product_code;?></td>
								<td><?php echo ucwords($product->product_name);?></td>
								<td><?php echo $product->category_name;?></td>
								<td><?php echo $product->product_stock;?></td>
								<td>
									<?php if (status_product($product->statusprd_id, '3') == '3'): ?>
										<a class="btn btn-flat btn-default text-blue" href="<?php echo site_url('admin/product/action/status?newarrival=false&id='.hash_link_encode($product->product_id)) ?>" title="New Arrival">
											<i class="fa fa-bell"></i>
										</a>
									<?php else: ?>
										<a class="btn btn-flat btn-default" href="<?php echo site_url('admin/product/action/status?newarrival=true&id='.hash_link_encode($product->product_id)) ?>" title="New Arrival">
											<i class=" 	fa fa-bell"></i>
										</a>
									<?php endif ?>

									<?php if (status_product($product->statusprd_id, '2') == '2'): ?>
										<a class="btn btn-flat btn-default text-maroon" href="<?php echo site_url('admin/product/action/status?popular=false&id='.hash_link_encode($product->product_id)) ?>" title="Popular">
											<i class="fa fa-heart"></i>
										</a>

									<?php else: ?>
										<a class="btn btn-flat btn-default" href="<?php echo site_url('admin/product/action/status?popular=true&id='.hash_link_encode($product->product_id)) ?>" title="Popular">
											<i class="fa fa-heart"></i>
										</a>
									<?php endif ?>

									<?php if (status_product($product->statusprd_id, '1') == '1'): ?>
										<a class="btn btn-flat btn-default text-yellow" href="<?php echo site_url('admin/product/action/status?bestseller=false&id='.hash_link_encode($product->product_id)) ?>" title="Best Seller">
											<i class="fa fa-star"></i>
										</a>
									<?php else: ?>
										<a class="btn btn-flat btn-default" href="<?php echo site_url('admin/product/action/status?bestseller=true&id='.hash_link_encode($product->product_id)) ?>" title="Best Seller">
											<i class="fa fa-star"></i>
										</a>
									<?php endif ?>

									<!-- <?php if (status_product($product->statusprd_id, '4') == '4'): ?>
										<a class="btn btn-flat btn-default text-green" href="<?php echo site_url('admin/product/action/status?sale=false&id='.hash_link_encode($product->product_id)) ?>" title="Sale">
											<i class="fa fa-money"></i>
										</a>
									<?php else: ?>
										<a class="btn btn-flat btn-default" href="<?php echo site_url('admin/product/action/status?sale=true&id='.hash_link_encode($product->product_id)) ?>" title="Sale">
											<i class=" 	fa fa-money"></i>
										</a>
									<?php endif ?> -->

								</td>
								<td>
									<!-- Action -->
									<?php if ($product->product_pub == '88'): ?>
										<a href="<?php echo site_url('admin/product/action/publish?id='.hash_link_encode($product->product_id));?>" class="btn btn-flat btn-danger" title="Publish">
											<i class="fa fa-bullhorn"></i>
										</a>
									<?php else: ?>
										<a href="<?php echo site_url('admin/product/action/publish?id='.hash_link_encode($product->product_id));?>" class="btn btn-flat btn-success" title="Publish">
											<i class="fa fa-bullhorn"></i>
										</a>
									<?php endif ?>
									<a class="btn btn-flat btn-default" onclick="window.location.href='<?php echo site_url('admin/product/page/edit?id='.hash_link_encode($product->product_id));?>'" title="Update">
										<i class="fa fa-edit"></i>
									</a>
									<a onclick="return confirm('Are you sure ?')"  href="<?php echo site_url('admin/product/action/delete?id='.hash_link_encode($product->product_id));?>" class="btn btn-warning btn-flat" title="Delete">
									<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>
						<?php $no++; endforeach ?>
					</tbody>
					<thead>
						<tr>
							<th>#</th>
							<th>Image</th>
							<th>Code</th>
							<th>Product Name</th>
							<th>Category</th>
							<th>Stoct</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
