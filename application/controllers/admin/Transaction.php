<?php

/**
*
*/
class Transaction extends Backend_Controller
{

	public function index()
	{
		redirect(site_url('admin/transaction/order'));
	}

	public function order()
	{
		$this->data['content'] = 'admin/pages/transaction/view';
		$this->data['transaction'] = $this->transaction_model->get_transaction_member(
			array(
				'{PRE}transaction.trans_status_id' => '1'
				)
			);

		$this->load->view('admin/media', $this->data);
	}

	public function confirm()
	{
		$this->data['content'] = 'admin/pages/transaction/view';
		$this->data['transaction'] = $this->transaction_model->get_transaction_member(
			array(
				'{PRE}transaction.transaction_cancel' => '88',
				'{PRE}transaction.trans_status_id' => '2'
				)
			);

		$this->load->view('admin/media', $this->data);
	}

	public function delivery()
	{
		$this->data['content'] = 'admin/pages/transaction/view';
		$this->data['transaction'] = $this->transaction_model->get_transaction_member(
			array(
				'{PRE}transaction.transaction_cancel' => '88',
				'{PRE}transaction.trans_status_id' => '3'
				)
			);

		$this->load->view('admin/media', $this->data);
	}

	public function close()
	{
		$this->data['content'] = 'admin/pages/transaction/view';
		$this->data['transaction'] = $this->transaction_model->get_transaction_member(
			array(
				'{PRE}transaction.transaction_cancel' => '88',
				'{PRE}transaction.trans_status_id' => '4'
				)
			);

		$this->load->view('admin/media', $this->data);
	}

	public function canceled()
	{
		$this->data['content'] = 'admin/pages/transaction/view';
		$this->data['transaction'] = $this->transaction_model->get_transaction_member(
			array(
				'{PRE}transaction.transaction_cancel' => '99'
				)
			);

		$this->load->view('admin/media', $this->data);
	}

	public function report()
	{
		$this->data['from'] = '';
		$this->data['to'] = '';

		if (isset($_GET['from'])) {
			$where_payment['{PRE}transaction.transaction_date >='] = $_GET['from'];
			$this->data['from'] = '/'.$_GET['from'].'/';

			if (!empty($_GET['to'])) {
				$where_payment['{PRE}transaction.transaction_date <='] = $_GET['to'];
				$this->data['to'] = $_GET['to'];
			}
		}
		$where_payment['{PRE}payment.payment_status'] = '99';

		/*Konfigurasi pagination*/
		/*URL, digunakan untuk base url pagination*/
		/*num_rows, banyak nya jumlah record yang akan ditampilkan*/
		/*per_page, jumlah records yang ditampilkan per halaman*/
		/*num_link, banyaknya link yang ditampilkan sebelum dan sesudah link aktif*/
		$url 				='admin/transaction/'.$this->uri->segment(3);
		$num_rows		=	$this->payment_model->count_payment($where_payment);
		$per_page 	= 10;
		$num_links	= 2;

		$this->lawave_paging->pagination($url, $num_rows, $per_page, $num_links);
		/*pagination($url = NULL, $num_rows = NULL, $per_page = NULL, $num_links = NULL)*/

		/*konfigurasi nilai offset dan informasi halaman*/
		$on_page 	= ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
		$offset 	= ($on_page - 1) * $per_page;
		$num_page	= ceil($num_rows/$per_page);

		/*data[num_rows, on_page, num_page], digunakan untuk kebutuhan informasi halaman*/
		$this->data['content'] = 'admin/pages/transaction/report/view';
		$this->data['num_rows']		= $num_rows;
		$this->data['on_page']		= $on_page;
		$this->data['num_page']		= $num_page;
		$this->data['pagination'] = $this->pagination->create_links();
		$this->data['transaction'] = $this->payment_model->get_payment(
			$where_payment,
			$per_page,
			$offset,
			FALSE,
			NULL
			);

		$this->load->view('admin/media', $this->data);
	}

	public function printpdf($from = NULL, $to = NULL)
	{
		/*MPDF*/
		// ini_set('memory_limit', '256M');
		// $pdf = $this->pdf->load_view();
		/*----*/

		$this->data['from'] = $from;
		$this->data['to'] = $to;

		$where_payment['{PRE}payment.payment_status'] = '99';

		if ($from) {
			$where_payment['{PRE}transaction.transaction_date >='] = $from;
			if ($to) {
				$where_payment['{PRE}transaction.transaction_date <='] = $to;
			}
		}

		$content = 'admin/pages/transaction/report/pdf';
		$this->data['transaction'] = $this->payment_model->get_payment($where_payment);

		// $html = $this->load->view('admin/pages/transaction/report/pdf', $this->data, TRUE);

		/*DOMPDF*/
		$pdf_name = 'Sales_Report_'.date('Y_m_d_H_i_s');
		$this->pdf->set_paper('A4');
		$this->pdf->load_view($content, $this->data);
		$this->pdf->render();
		$this->pdf->stream($pdf_name);
		/*------*/

		/*MPDF*/
		// $pdf->WriteHTML($html);
		// $output = 'report_sales_' . date('Y_m_d_H_i_s') . '_.pdf';
		// $pdf->Output("$output", 'I');
		/*----*/
	}

	public function detail($order_no, $status)
	{
		$status_id = $this->encrypt->decode(hash_link_decode($status));
		$count_trans = $this->transaction_model->count(
			array(
				'order_no' => $order_no,
				'trans_status_id' => $status_id
				)
			);

		/*jika tersedia*/
		if ($count_trans > 0) {
			$this->data['content'] = 'admin/pages/transaction/detail';
			$this->data['transaction'] = $this->transaction_model->get_transaction(
				array(
					'{PRE}transaction.order_no' => $order_no,
					'{PRE}transaction.transaction_cancel' => '88',
					'{PRE}transaction.trans_status_id' => $status_id
					),
				1,
				NULL,
				TRUE
				);

			/*jika telah dekonfirmasi*/
			if ($this->data['transaction']->trans_status_id > 1) {
				$this->data['payment'] = $this->payment_model->get_payment(
					array('{PRE}payment.transaction_id' => $this->data['transaction']->transaction_id),
					1,
					NULL,
					TRUE
					);
			}

			$this->data['item'] = $this->transaction_item_model->get_transaction_item(
				array(
					'{PRE}transaction_item.order_no' => $order_no,
					'{PRE}image.image_seq' => 0
					)
				);

			$subdistrict = $this->lawave_shipment->subdistrict($this->data['transaction']->city_id);
			$this->data['district'] = $this->lawave_shipment->district($subdistrict, $this->data['transaction']->district_id);

			$this->load->view('admin/media', $this->data);
		}

		else {
			redirect(site_url('admin/transaction'));
		}
	}

	public function approve($order_no, $status)
	{
		$status_id = $this->encrypt->decode(hash_link_decode($status));
		$count_trans = $this->transaction_model->count(
			array(
				'order_no' => $order_no,
				'trans_status_id' => $status_id
				)
			);

		/*jika tersedia*/
		if ($count_trans > 0) {
			$transaction = $this->transaction_model->get_transaction(
				array(
					'{PRE}transaction.order_no' => $order_no,
					'{PRE}transaction.transaction_cancel' => '88',
					'{PRE}transaction.trans_status_id' => $status_id
					),
				1,
				NULL,
				TRUE
				);

			$array_data['trans_status_id'] = 3;

			$this->transaction_model->update($array_data, array('transaction_id' => $transaction->transaction_id));

			redirect(site_url('admin/transaction/transaction-detail/'.$transaction->order_no.'/'.hash_link_encode($this->encrypt->encode($transaction->trans_status_id))));
		}
	}

	public function update()
	{
		if (isset($_POST['update-shipping-number'])) {
			$post = $this->input->post(NULL, TRUE);

			$array_data['transaction_shipping_date'] = $post['date'];
			$array_data['transaction_shipping_no'] = $post['shipping_no'];

			$array_where['transaction_id'] = $post['id'];

			$this->transaction_model->update($array_data, $array_where);

			$this->data['transaction'] = $this->transaction_model->get($post['id']);

			/*KIRIM EMAIL*/
			/*kirim email ke customer*/
			if ($this->to_customer) {
				$this->data['content'] = 'pages/email/customer_delivery';
				/*mengganti object ke string dengan parameter ke 3 bernilai TRUE*/
				$email = $this->load->view('email', $this->data, TRUE);

				lwd_send_email($this->data['transaction']->transaction_email, $this->customer_order, $email);
			}
			/**/

			$this->session->set_flashdata('success','Order no '.$post['order_no'].'. '.$this->edit_text);

			redirect(site_url('admin/transaction/delivery'));
		}
	}

	public function invoice($order_no, $status)
	{
		$status_id = $this->encrypt->decode(hash_link_decode($status));
		$count_trans = $this->transaction_model->count(
			array(
				'order_no' => $order_no,
				'trans_status_id' => $status_id
				)
			);

		/*jika tersedia*/
		if ($count_trans > 0) {
			$content = 'admin/pages/transaction/invoice_pdf';
			$this->data['transaction'] = $this->transaction_model->get_transaction(
				array(
					'{PRE}transaction.order_no' => $order_no,
					'{PRE}transaction.transaction_cancel' => '88',
					'{PRE}transaction.trans_status_id' => $status_id
					),
				1,
				NULL,
				TRUE
				);

			/*jika telah dekonfirmasi*/
			if ($this->data['transaction']->trans_status_id > 1) {
				$this->data['payment'] = $this->payment_model->get_payment(
					array('{PRE}payment.transaction_id' => $this->data['transaction']->transaction_id),
					1,
					NULL,
					TRUE
					);
			}

			$this->data['item'] = $this->transaction_item_model->get_transaction_item(
				array(
					'{PRE}transaction_item.order_no' => $order_no,
					'{PRE}image.image_seq' => 0
					)
				);

			$subdistrict = $this->lawave_shipment->subdistrict($this->data['transaction']->city_id);
			$this->data['district'] = $this->lawave_shipment->district($subdistrict, $this->data['transaction']->district_id);


			/*DOMPDF*/
			$pdf_name = 'Invoice_'.$order_no;
			$this->pdf->set_paper('A5','landscape');
			$this->pdf->load_view($content, $this->data);
			$this->pdf->render();
			$this->pdf->stream($pdf_name);
			/*------*/
			// $this->load->view($content, $this->data);
		}

		else {
			redirect(site_url('admin/transaction'));
		}
	}

	public function update_load()
	{
		$id 			= $this->input->post('dataID');
		$get_data = $this->transaction_model->get($id);

		$this->data['id'] 			= $get_data->transaction_id;
		$this->data['order_no']	= $get_data->order_no;

		echo json_encode($this->data);
	}
}
