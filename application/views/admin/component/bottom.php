	
		<!-- jQuery 2.1.4 -->
		<script src="<?php echo base_url('plugins/jQuery/jQuery-2.1.4.min.js');?>"></script>
		<!-- jQueryUI -->
		<script src="<?php echo base_url('plugins/jQueryUI/jquery-ui.min.js');?>"></script>
		<!-- Bootstrap 3.3.5 -->
		<script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.min.js');?>"></script>
		<!-- SlimScroll -->
		<script src="<?php echo base_url('plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
		<!-- SlimScroll -->
		<script src="<?php echo base_url('plugins/ckeditor/ckeditor.js');?>"></script>
		<!-- FastClick -->
		<script src="<?php echo base_url('plugins/fastclick/fastclick.min.js');?>"></script>
		<!-- iCheck 1.0.1 -->
		<script src="<?php echo base_url('plugins/iCheck/icheck.min.js');?>"></script>
		<!-- Select2 -->
		<script src="<?php echo base_url('plugins/select2/select2.full.min.js');?>"></script>
		<!-- DataTables -->
		<script src="<?php echo base_url('plugins/datatables/jquery.dataTables.min.js');?>"></script>
		<script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap.min.js');?>"></script>
		<!-- WOW -->
		<script src="<?php echo base_url('plugins/wow/dist/wow.js')?>"></script>
		<!-- AdminLTE App -->
		<script src="<?php echo base_url('dist/js/app.min.js');?>"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?php echo base_url('dist/js/demo.js');?>"></script>
		<script>
		// WOW
		wow = new WOW();
		wow.init();

		// Close alert smooth
		window.setTimeout(function() {	
				$(".alert-success").slideUp(500, function() {
					$(this).remove();
				});
			},
			4000
		);

		$(function () {
			// DATE PICKER JQUERY UI
			$( function() {
				$( "#datepicker" ).datepicker({
					dateFormat: "yy-mm-dd"
				});
			});
			$( function() {
				$( ".datepicker" ).datepicker({
					dateFormat: "yy-mm-dd"
				});
			});

			// SELECT2
			$(".select2").select2();
			
			// DATA TABLE
			$("#datatable1").DataTable();
			$('#datatable2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
			
			// AJAX
			// get user (edit)
			$('.btn-edit-user').click(function() {
				var id = $(this).attr('data-id');
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/user/update_load');?>",
					data: { dataID: id},
					timeout : 3000,
					dataType: "JSON",
					error: function() {
						alert("ERROR!");	 
					},	 
					success: function(data) {
						$("#id").val(data.id);
						$("#name").val(data.name);
						$("#username").val(data.username);
						$("#email").val(data.email);
						$("#level").val(data.level).prop('selected','selected');
						$("#status").val(data.status).prop('selected','selected');
						$("#editUser").modal('show');
					}	 
				});
			});
			// get service (edit)
			$('.btn-edit-service').click(function() {
				var id = $(this).attr('data-id');
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/service/update_load');?>",
					data: { dataID: id},
					timeout : 3000,
					dataType: "JSON",
					error: function() {
						alert("ERROR!");	 
					},	 
					success: function(data) {
						$("#id").val(data.id);
						$("#title").val(data.title);
						$("#text").val(data.text);
						$("#update").modal('show');
					}	 
				});
			});
			// get term (edit)
			$('.btn-edit-term').click(function() {
				var id = $(this).attr('data-id');
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/term/update_load');?>",
					data: { dataID: id},
					timeout : 3000,
					dataType: "JSON",
					error: function() {
						alert("ERROR!");	 
					},	 
					success: function(data) {
						$("#id").val(data.id);
						$("#title").val(data.title);
						CKEDITOR.instances.desc.setData(data.desc);
						$("#update").modal('show');
					}	 
				});
			});
			// get faq (edit)
			$('.btn-edit-faq').click(function() {
				var id = $(this).attr('data-id');
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/faq/update_load');?>",
					data: { dataID: id},
					timeout : 3000,
					dataType: "JSON",
					error: function() {
						alert("ERROR!");	 
					},	 
					success: function(data) {
						$("#id").val(data.id);
						$("#question").val(data.question);
						$("#answer").val(data.answer);
						$("#update").modal('show');
					}	 
				});
			});
			// get bank (edit)
			$('.btn-edit-bank').click(function() {
				var id = $(this).attr('data-id');
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/bank/update_load');?>",
					data: { dataID: id},
					timeout : 3000,
					dataType: "JSON",
					error: function() {
						alert("ERROR!");	 
					},	 
					success: function(data) {
						$("#id").val(data.id);
						$("#name").val(data.name);
						$("#no").val(data.no);
						$("#account").val(data.account);
						$("#update").modal('show');
					}	 
				});
			});
			// get shipment (edit)
			$('.btn-edit-shipment').click(function() {
				var id = $(this).attr('data-id');
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/shipment/update_load');?>",
					data: { dataID: id},
					timeout : 3000,
					dataType: "JSON",
					error: function() {
						alert("ERROR!");	 
					},	 
					success: function(data) {
						$("#id").val(data.id);
						$("#name").val(data.name);
						$("#web").val(data.web);
						$("#update").modal('show');
					}	 
				});
			});
			// get category (edit)
			$('.btn-edit-category').click(function() {
				var id = $(this).attr('data-id');
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/category/update_load');?>",
					data: { dataID: id},
					timeout : 3000,
					dataType: "JSON",
					error: function() {
						alert("ERROR!");	 
					},	 
					success: function(data) {
						$("#id").val(data.id);
						$("#name").val(data.name);
						$("#desc").val(data.desc);
						$("#alt").val(data.alt);
						$("#update").modal('show');
					}	 
				});
			});
			// get brand (edit)
			$('.btn-edit-brand').click(function() {
				var id = $(this).attr('data-id');
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/brand/update_load');?>",
					data: { dataID: id},
					timeout : 3000,
					dataType: "JSON",
					error: function() {
						alert("ERROR!");	 
					},	 
					success: function(data) {
						$("#id").val(data.id);
						$("#name").val(data.name);
						$("#update").modal('show');
					}	 
				});
			});
			// get sub-category / subcat(edit)
			$('.btn-edit-subcat').click(function() {
				var id = $(this).attr('data-id');
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/subcat/update_load');?>",
					data: { dataID: id},
					timeout : 3000,
					dataType: "JSON",
					error: function() {
						alert("ERROR!");	 
					},	 
					success: function(data) {
						$("#id").val(data.id);
						$("#category").val(data.category).prop('selected','selected');
						$("#name").val(data.name);
						$("#alt").val(data.alt);
						$("#desc").val(data.desc);
						$("#update").modal('show');
					}	 
				});
			});
			// get statusprd / status-product(edit)
			$('.btn-edit-statusprd').click(function() {
				var id = $(this).attr('data-id');
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/statusprd/update_load');?>",
					data: { dataID: id},
					timeout : 3000,
					dataType: "JSON",
					error: function() {
						alert("ERROR!");	 
					},	 
					success: function(data) {
						$("#id").val(data.id);
						$("#name").val(data.name);
						$("#update").modal('show');
					}	 
				});
			});
			// get howto / how-to-buy(edit)
			$('.btn-edit-howto').click(function() {
				var id = $(this).attr('data-id');
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/howto/update_load');?>",
					data: { dataID: id},
					timeout : 3000,
					dataType: "JSON",
					error: function() {
						alert("ERROR!");	 
					},	 
					success: function(data) {
						$("#id").val(data.id);
						$("#name").val(data.name);
						CKEDITOR.instances.desc.setData(data.desc);
						$("#update").modal('show');
					}	 
				});
			});
			// get slide (edit)
			$('.btn-edit-slide').click(function() {
				var id = $(this).attr('data-id');
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/slide/update_load');?>",
					data: { dataID: id},
					timeout : 3000,
					dataType: "JSON",
					error: function() {
						alert("ERROR!");	 
					},	 
					success: function(data) {
						$("#id").val(data.id);
						$("#link").val(data.link);
						$("#alt").val(data.alt);
						$("#update").modal('show');
					}	 
				});
			});
			// get banner (edit)
			$('.btn-edit-banner').click(function() {
				var id = $(this).attr('data-id');
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/banner/update_load');?>",
					data: { dataID: id},
					timeout : 3000,
					dataType: "JSON",
					error: function() {
						alert("ERROR!");	 
					},	 
					success: function(data) {
						$("#id").val(data.id);
						$("#link").val(data.link);
						$("#alt").val(data.alt);
						$("#update").modal('show');
					}	 
				});
			});
			// get seo (edit)
			$('.btn-edit-seo').click(function() {
				var id = $(this).attr('data-id');
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/seo/update_load');?>",
					data: { dataID: id},
					timeout : 3000,
					dataType: "JSON",
					error: function() {
						alert("ERROR!");	 
					},	 
					success: function(data) {
						$("#id").val(data.id);
						$("#title").val(data.title);
						$("#keyword").val(data.keyword);
						$("#desc").val(data.desc);
						$("#update").modal('show');
					}	 
				});
			});
			// get tag (edit)
			$('.btn-edit-tag').click(function() {
				var id = $(this).attr('data-id');
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/tag/update_load');?>",
					data: { dataID: id},
					timeout : 3000,
					dataType: "JSON",
					error: function() {
						alert("ERROR!");	 
					},	 
					success: function(data) {
						$("#id").val(data.id);
						$("#name").val(data.name);
						$("#update").modal('show');
					}	 
				});
			});
			// get tag (edit)
			$('.btn-edit-articlecat').click(function() {
				var id = $(this).attr('data-id');
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/articlecat/update_load');?>",
					data: { dataID: id},
					timeout : 3000,
					dataType: "JSON",
					error: function() {
						alert("ERROR!");	 
					},	 
					success: function(data) {
						$("#id").val(data.id);
						$("#name").val(data.name);
						$("#update").modal('show');
					}	 
				});
			});
			$('.btn-edit-shipment-number').click(function() {
				var id = $(this).attr('data-id');
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/transaction/update_load');?>",
					data: { dataID: id},
					timeout : 3000,
					dataType: "JSON",
					error: function() {
						alert("ERROR!");	 
					},	 
					success: function(data) {
						$("#id").val(data.id);
						$("#order_no").val(data.order_no);
						$("#update").modal('show');
					}	 
				});
			});
			// get member (block)
			$('.btn-block-member').click(function() {
				var id = $(this).attr('data-id');
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/member/update_load');?>",
					data: { dataID: id},
					timeout : 3000,
					dataType: "JSON",
					error: function() {
						alert("ERROR!");	 
					},	 
					success: function(data) {
						$("#id").val(data.id);
						$("#name").val(data.name);
						$("#block").modal('show');
					}	 
				});
			});
			// select sub-category
			$(document).ready(function() {
				$('#category').change(function() {
					var id = $(this).val();
					// alert(id_category);
					$.ajax({
						type: 'POST',
						url: '<?=site_url('admin/product/ajax_subcat')?>',
						data: { dataID: id},
						success: function(response) {
							$('#subcat').html(response);
						}
					});
				});
			});
		});

		// Review Image
		function previewImage(input) {
				 
			if (input.files && input.files[0]) {
				var fileReader = new FileReader();
				var imageFile = input.files[0];

				if(imageFile.type == "image/png" || imageFile.type == "image/jpeg") {
					fileReader.readAsDataURL(imageFile);

					fileReader.onload = function (e) {
						$('#preview-image').attr('src', e.target.result);
					}
				}

				else {
					alert("your file is not image");
				}
			}
		}

		$("[name='image']").change(function(){
				previewImage(this);
		});

		$("[id='image-index']").change(function(){
				previewImage(this);
		});

		//iCheck for checkbox and radio inputs
		$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
			checkboxClass: 'icheckbox_minimal-blue',
			radioClass: 'iradio_minimal-blue'
		});

		</script>
	</body>
</html>
