<section>
  <div class="bxslider">
    <?php foreach ($slide as $sl): ?>
      <div><img src="<?=base_url($img_path.'slide/'.$sl->image_name)?>" alt="<?=$sl->image_name?>" class="img-responsive img-owl"></div>
    <?php endforeach; ?>
  </div>
  <div class="container">
      <?php foreach ($brand as $brand): ?>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 img-brand">
          <img src="<?=base_url($img_path.'brand/'.$brand->image_name)?>" alt="<?=$brand->image_name?>" class="img-responsive">
        </div>
      <?php endforeach; ?>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 garis" style="width:100%; border: none !important">
        <hr style="border: 1px solid #848383;width:100%;margin-top:0px !important;">
      </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="row1">
        <?php $i=1; foreach ($banner as $banner): ?>
          <div class="banner<?=$i?>">
          <a href="<?=site_url($banner->banner_link)?>"><img src="<?=base_url($img_path.'banner/'.$banner->image_name)?>" alt="<?=$banner->image_name?>" class="img-responsive img-banner"></a>
        </div>
        <?php $i++; endforeach; ?>
      </div>
      <div class="new-arrival">
        <div class="text-center">
          <div class="title-new">New Arrival</div>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
            <div class="desc-new">
              Jelajahi koleksi kasur terbaru kami dengan harga terjangkau dan dapatkan kasur impian anda
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div id="exTab2" class="container">

          <ul class="nav nav-tabs navs-1">
            <?php $a=1; foreach ($category as $cat): ?>
              <li <?if($a==1) echo "class='active'";?>>
                <a  href="#<?=$a?>" data-toggle="tab"><?=$cat->category_name?></a>
                <? $id[] = $cat->category_id;?>
              </li>
            <?php $a++; endforeach; ?>
          		</ul>
          			<div class="tab-content ">
                  <? for($b=1;$b<=count($category);$b++){?>
                  <div class="tab-pane <?if($b==1) echo "active";?>" id="<?=$b?>">
                    <div class="owl-carousel owl-theme owl-new<?=$b?>" id="owl<?=$b?>">

                      <?php $uniques = "";foreach ($product as $prod):
                        $new = 0;
                        $exp = explode(',',$prod->statusprd_id);

                        for($v=0;$v<count($exp);$v++){
                          if($exp[$v] == 3){
                            $new = 1;
                          }
                        }

                        ?>
                          <?if($prod->category_id === $id[$b-1] && $uniques !== $prod->product_id && $new == 1){
                            $uniques = $prod->product_id;

                            ?>
                            <div class="items items-pro thumb">
                                <div class="caption">
                                  <div class="btn-group btn-cart">
                                     <button type="button" class="btn" id="cart2" onclick="window.location.href='#'"><span class="fa fa-info"></span></button>
                                     <button type="button" class="btn btn-primary" id="cart1" onclick="window.location.href='#'">Add to Cart</button>
                                    </div>
                                </div>
                            <img src="<?=base_url('uploads/img/product/'.$prod->image_name)?>" alt="<?=$prod->image_name?>" class="img-responsive" >
                            <div class="nama-produk" align="center">
                              <?=$prod->product_name?>
                            </div>
                            <div class="harga-produk" align="center">
                              <b>Rp.&nbsp;<?=number_format($prod->product_price, 0, ".", ".")?></b>
                            </div>

                              </div>
                            <?
                          }?>
                      <?php endforeach; ?>
                    </div>
                    <?if($b == 1){
                      echo "<div class='nextprev'>
                              <div class='owl-prev'><img src='".base_url('dist/img/prev.jpg')."' alt='prev' class='img-responsive'></div>
                              <div class='owl-next'><img src='".base_url('dist/img/next.jpg')."' alt='next' class='img-responsive'></div>
                      </div>";
                      } elseif($b == 2 ){
                        echo "<div class='nextprev2'>
                                <div class='owl-prev2'><img src='".base_url('dist/img/prev.jpg')."' alt='prev' class='img-responsive'></div>
                                <div class='owl-next2'><img src='".base_url('dist/img/next.jpg')."' alt='next' class='img-responsive'></div>
                        </div>";
                    } elseif($b == 3){
                      echo "<div class='nextprev3'>
                              <div class='owl-prev3'><img src='".base_url('dist/img/prev.jpg')."' alt='prev' class='img-responsive'></div>
                              <div class='owl-next3'><img src='".base_url('dist/img/next.jpg')."' alt='next' class='img-responsive'></div>
                      </div>";
                    }?>
                  </div>
                  <? } ?>

          			</div>
            </div>
         </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="our-prod">
        <div class="title-our" align="center">
          <b>Our Product</b>
        </div>
        <div class="container">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <?php $f=1;foreach ($product as $pr):
                if($f<=8){
              ?>
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 colm">
                <div class="item-our thumb2">
                  <div class="caption2">
                    <div class="btn-group btn-cart">
                       <button type="button" class="btn" id="cart2" onclick="window.location.href='#'"><span class="fa fa-info"></span></button>
                       <button type="button" class="btn btn-primary" id="cart1" onclick="window.location.href='#'">Add to Cart</button>
                      </div>
                  </div>
                  <div class="item-target">

                  <?
                  $sale = 0;

                  if(!empty($pr->product_price_strip)){
                    $sale = 1;
                  }
                  $sale = 0;
                  $ex = explode(',',$pr->statusprd_id);

                  for($v=0;$v<count($ex);$v++){
                    if($ex[$v] == '4'){
                      $sale = 1;
                    }
                  }

                  ?>
                  <?
                    if($sale == 1){
                      ?>
                      <div class="sale">
                        <div class="tul-sale">
                          Sale
                        </div>
                      </div>
                      <?
                    }
                  ?>

                  <img src="<?=base_url($img_path.'product/'.$pr->image_name)?>"  class="img-responsive items-img">
                  <div class="nama-item text-center">
                    <?=$pr->product_name?>
                  </div>
                  <div class="harga-item text-center">
                    <b><?="Rp. ".number_format($pr->product_price, 0, ".", ".")?></b>
                  </div>
                  <div class="harga-strip text-center">
                    <?if(!empty($pr->product_price_strip)){
                      ?> <strike><?="Rp. ".number_format($pr->product_price_strip, 0, ".", ".");?></strike>
                      <?
                    }?>
                  </div>
                  <?if(empty($pr->product_price_strip)){
                    ?>
                    <div class="spasi">

                    </div>
                    <?
                  }?>
                </div>
                </div>

              </div>
            <?php } else{ break; } $f++; endforeach; ?>
          </div>
        </div>
        <div class="button-our" align="center">
          <a href="#"><button class="btn browser">Browse All</button></a>
        </div>
      </div>

  </div>
</div>
<div class="container">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="best-seller">
    <div class="title-best text-center">
      <b>Best Seller</b>
    </div>
  </div>
  <?php $z=1;foreach ($product as $product):
    $best = 0;
    $expl = explode(',',$product->statusprd_id);

    for($v=0;$v<count($expl);$v++){
      if($expl[$v] == 1){
        $best = 1;
      }
    }
    if($best == 1){
      if($z<=9){
        $class = '';
        if($z==1){
          $class = 'border'.$z;
        } elseif($z==2){
          $class = 'border'.$z;
        } elseif($z==3){
          $class = 'border'.$z;
        } elseif($z==4){
          $class = 'border'.$z;
        } elseif($z==5){
          $class = 'border'.$z;
        } elseif($z==6){
          $class = 'border'.$z;
        } elseif($z==7){
          $class = 'border'.$z;
        } elseif($z==8){
          $class = 'border'.$z;
        } elseif($z==9){
          $class = 'border'.$z;
        }
         ?>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 thumb3 <?=$class?>">

      <div class="best-item">

          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <img src="<?=base_url($img_path.'product/'.$product->image_name)?>" alt="<?=$product->product_name?>" class="img-responsive" >
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 content-best">
            <span class="nama-best"><?=$product->product_name?></span><br>
            <span class="price-best"><?="Rp. ".number_format($product->product_price, 0, ".", ".");?></span><br>
            <?if(!empty($product->product_price_strip)){
              ?>
              <strike class="strip"><?="Rp. ".number_format($product->product_price_strip, 0, ".", ".");?></strike>
              <?} ?>
            <div class="caption3">
              <div class="btn-group btn-cart">
                 <button type="button" class="btn" id="cart2" onclick="window.location.href='#'"><span class="fa fa-info"></span></button>
                 <button type="button" class="btn btn-primary" id="cart1" onclick="window.location.href='#'">Add to Cart</button>
                </div>
            </div>
            <? if (empty($product->product_price_strip)){
              ?>
              <div class="spasi">

              </div>
              <?
          }?>
          </div>
      </div>
    </div>
  <?php
} else{
  break;
}
  $z++;
}
endforeach; ?>

  </div>

  <div class="garis2 col-lg-12 col-sm-12 col-md-12 col-xs-12" style="width:100%; margin-top: 50px;">
    <hr style="border: 5px solid #eaeaea">
  </div>
  <div class="article col-lg-12">
    <span>New Article</span>
  </div>
  <div class="col-lg-12">
    <div class="owl-article">
    <?php foreach ($article as $article):
      ?>
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="icon-article">
          <div class="gbr-art">
            <img src="<?=base_url($img_path.'article/'.$article->image_name)?>" alt="<?=$article->article_title?>" class="img-responsive" style="width:100%">
          </div>
          <div class="bag-art">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
              <div class="kotak-tgl text-center">
                <div class="tgl2"><?=date('d',strtotime($article->article_date))?></div>
                <div class="bln">
                  <?=date('F',strtotime($article->article_date))?>
                </div>
              </div>

            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
              <div class="konten-art">
                <? $limit= 100;
                  $desc = $article->article_desc;
                  $text = substr($desc, 0, $limit);
                ?>
                <b><?=$article->article_title?></b>
                <p class="pr-art"><?=$text."..."?></p>
                <a href="#">Read more</a>
              </div>

            </div>
          </div>
        </div>
      </div>


    <?php endforeach; ?>
    </div>
  </div>

</div>
<div class="container-fluid">
  <div class="row">
    <div class="bawah-about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-lg-md-6 col-sm-6 col-xs-12">
            <div class="garis-hor">

            </div>
            <div class="ket-kiri-about">
              <div class="title-ket-kiri">

                <?php foreach ($about as $about): ?>
                  <?=$about->info_name;
                    $limit = 300;
                    $text1 = $about->info_desc;
                    $print = substr($text1, 0, $limit);
                  ?>
                  <p><?=$print?></p>
                <?php endforeach; ?>
                <a href="#"><button class="btn tbl-read">Read More</button></a></a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-lg-md-6 col-sm-6 col-xs-12">
            <div class="kanan-about">
              <div class="gbr-kasur">
                <img src="<?=base_url()?>dist/img/kasur.png" alt="Soppos" class="img-responsive kasur">
              </div>
              <div class="bg-kasur pull-right">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

</section>
