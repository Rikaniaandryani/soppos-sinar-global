<?php

$this->load->view('admin/component/top');
$this->load->view('admin/component/header');
$this->load->view('admin/component/left');
$this->load->view($content);
$this->load->view('admin/component/footer');
$this->load->view('admin/component/bottom');