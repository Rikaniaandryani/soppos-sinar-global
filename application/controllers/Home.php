<?

  class Home extends Frontend_Controller
  {
    public function index(){
      $data['content'] = 'pages/home';
      $data['contact'] = $this->contact_model->get();
      $data['img_path'] = 'uploads/img/';
      $data['category'] = $this->category_model->get();
      $data['brand'] = $this->brand_model->get_brand(array('brand_pub' => '99', 'image_seq' => '0', 'image_parent_name' => 'brand'), '6');
      $data['slide'] = $this->slide_model->get_slide(array('banner_type' => 'slide', 'banner_pub' => '99', 'image_parent_name' => 'slide'));
      $data['banner'] = $this->banner_model->get_banner(array('banner_type' => 'banner', 'banner_pub' => '99'), '4');

      $data['product'] = $this->product_model->get_product(array('product_pub' => '99', 'image_seq' => '0', 'image_parent_name' => 'product'));
      $data['article'] = $this->article_model->get_article(array('article_pub' => '99', 'image_parent_name' => 'article'), '3', NULL, FALSE, NULL, array('article_title', 'desc'));
      $data['about'] = $this->about_model->get_about(array('catinfo_id' => '1', 'info_id' => '1'));
      

      $this->load->view('index', $data);
    }
  }
?>
