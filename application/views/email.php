<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Title</title>
		<style type="text/css">
			body {
				font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
				font-size: 14px;
				line-height: 1.42857143;
				color: #333333;
				background-color: #ffffff;
			}
		</style>	
	</head>
	<body style="background-color: #eeeeee; padding: 0px 50px;">
		<table style="background-color: transparent; width: 95%; margin: 0 auto;">

			<!-- HEADER -->
			<thead>
				<tr style="width: 100%;">
				<!-- LOGO -->
					<th style="width: 100%;border-top: 3px solid #5d9ec3;padding: 15px 0; background-color: #ffffff">
						<img src="<?php echo $base_url."uploads/img/site/".$site->site_logo ?>" alt="<?php echo $site->site_name ?> | Logo">
					</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td>

						<?php $this->load->view($content) ?>

					</td>
				</tr>
				<!-- FOOTER -->
				<tr style="border: 1px solid #75b9df;padding: 15px; background-color: #75b9df; color: #ffffff">
					<td>

						<table style="width: 100%">
							<tr>
								<!-- COMPANY DATA -->
								<td valign="top" style="border: 1px solid #75b9df;width: 50%;padding: 15px">
									<h3 style="margin-top: 0; padding-top: 0;">
										<?php echo $site->site_name ?>
									</h3>
									<?php echo nl2br($contact->contact_address) ?>
								</td>

								<!-- COMPANY LINK -->
								<td valign="top" style="border: 1px solid #75b9df;width: 50%; text-align: right;padding: 15px">
									Facebook <br>
									Twitter
								</td>
							</tr>
						</table>
					
					</td>					
				</tr>
				<tr style="background-color: #5d9ec3; color: #ffffff;">
					<!-- COPYRIGHT -->
					<td style="text-align: center;font-size: 10px">
						Copyright &copy; 2017 All Rights Reserved.
					</td>
				</tr>

			</tbody>
		</table>
	</body>
</html>