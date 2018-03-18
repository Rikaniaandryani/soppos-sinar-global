<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Member
			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active">Member</li>
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
							<th width="15%">Photo</th>
							<th width="20%">Name</th>
							<th>Email</th>
							<th>Status</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($member as $member): ?>
							<?php if ($member->member_id != 0): ?>
								<tr>
									<td><?php echo $no;?></td>
									<td>
										<!-- IMAGE -->
									</td>
									<td>
										<?php echo ucwords($member->member_name);?>
									</td>
									<td>
										<?php echo $member->member_email;?>
									</td>
									<td>
										<div>
											<?php if ($member->member_block == 'active'): ?>
												<span class="label label-success">Active</span>
											<?php else: ?>
												<span class="label label-danger">Block</span>
												<?php if (!empty($member->reason_id) || $member->reason_id != '0'): ?>
													<span class="label label-warning"><?php echo ucwords($member->reason_name); ?></span>
												<?php endif ?>
											<?php endif ?>
										</div>
										<div>
											<?php if ($member->member_status == 'verified'): ?>
												<span class="label label-success">Verified</span>
											<?php else: ?>
												<span class="label label-danger">Unverified</span>
											<?php endif ?>
										</div>
									</td>
									<td>
										<!-- Action -->
										<?php if ($member->member_block == 'active'): ?>
											<a class="btn btn-flat btn-danger btn-block-member" data-id="<?php echo $member->member_id;?>" title="Blacklist">
												<i class="fa fa-ban"></i>
											</a>
										<?php else: ?>
											<a href="<?php echo site_url('admin/member/enable/'.$member->member_id.'/'.$this->uri->segment(3));?>" class="btn btn-flat btn-success" title="Enable Member">
												<i class="fa fa-ban"></i>
											</a>
										<?php endif ?>
										<a href="<?php echo site_url('admin/member/detail/'.$member->member_id);?>" class="btn btn-flat btn-default" title="Detail Member">
											<i class="fa fa-eye"></i>
										</a>
										<a onclick="return confirm('Are you sure ?')"  href="<?php echo site_url('admin/member/delete/'.$member->member_id);?>" class="btn btn-warning btn-flat" title="Delete">
										<i class="fa fa-trash"></i>
										</a>
									</td>
								</tr>
							<?php endif ?>
						<?php $no++; endforeach ?>
					</tbody>
					<thead>
						<tr>
							<th>#</th>
							<th>Photo</th>
							<th>Name</th>
							<th>Email</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->


<div id="block" class="modal fade" role="dialog">
	<div class="modal-dialog modal-sm">

		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Blacklist Member</h4>
			</div>
			<?php echo form_open('admin/member/update/'.$this->uri->segment(3));?>
			<div class="modal-body">
				<div class="form-group">
					<label for="member">Name</label>
					<input id="id" type="hidden" name="id" value="">
					<input id="name" type="text" name="name" class="form-control" value="" placeholder="" disabled>
				</div>
				<div class="form-group">
					<label for="member">Reason</label>
					<select id="reason" name="reason" class="form-control" required>
						<option disabled selected>Select Reason</option>
						<?php foreach ($reason as $reason): ?>
							<?php if ($reason->reason_id != 0): ?>
								<option value="<?php echo $reason->reason_id?>">
									<?php echo ucwords($reason->reason_name)?>
								</option>		
							<?php endif ?>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-remove"></i> Cancel</button>
				<button type="submit" name="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
			</div>
			<?php echo form_close();?>
		</div>

	</div>
</div>
