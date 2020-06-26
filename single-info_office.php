<?php
/**
 * Template Name: 事業所情報詳細
 */
?>
<?php get_header(); ?>
<div class="container">
  <div class="contents">
    <!-- パンくず -->
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
    </div>

    <article <?php post_class( 'kiji' ); ?>>
      <div itemprop="mainEntityOfPage" id="mainEntity" <?php post_class('post'); ?>>
        <!--<h3><?php the_title(); ?></h3>-->
        <!-- 事業所名（フリガナ） * -->
        <div class="clearfix">
          <div class="head_office-wrap">
            <h1 class="head_office"><?php
	$ninteidata = get_field('office');
	if($ninteidata){
		echo $ninteidata;
	} ?><span class="head_office-point">（<?php
	$ninteidata = get_field('office_kana');
	if($ninteidata){
		echo $ninteidata;
} ?>）</span></h1>
          </div>
        <!-- キャッチコピー -->
<?php if( get_field('subheading') ) { ?>
<?php $relational = get_field('subheading');
	foreach( (array)$relational as $value) { ?>
          <h2><?php echo $value; ?></h2>
	<?php } ?>
<?php } ?>

<div class="pr">
        <p><?php the_field('sentence'); ?></p>
</div>

<table class="col-head-type1" summary="会社案内表">
  <tr>
    <th class="t_top">認定事業体</th>
    <td class="t_top"><?php
	$ninteidata = get_field('nintei');
	if($ninteidata){
		echo $ninteidata;
	} ?></td>
  </tr>
  <tr>
    <th>代表</th>
    <td><?php 
		$ninteidata = get_field('representative');
		if($ninteidata){
			echo $ninteidata;
	} ?>
	（<?php
	$ninteidata = get_field('representative_kana');
	if($ninteidata){
		echo $ninteidata;
	} ?>）</td>
  </tr>
<?php if( get_field('establishment') ) { ?>
<?php $relational = get_field('establishment');
	foreach( (array)$relational as $value) { ?>
  <tr>
    <th>創業設立</th>
    <td><?php echo $value; ?></td>
  </tr>
	<?php } ?>
<?php } ?>

<?php if( get_field('capital') ) { ?>
<?php $relational = get_field('capital');
	foreach( (array)$relational as $value) { ?>
  <tr>
    <th>資本金</th>
    <td><?php echo $value; ?>円</td>
  </tr>
	<?php } ?>
<?php } ?>
  <tr>
    <th>郵便番号</th>
    <td><?php
	$ninteidata = get_field('postalcode');
	if($ninteidata){
		echo $ninteidata;
	} ?></td>
  </tr>
  <tr>
    <th>事業所所在地</th>
    <td><?php
		if ($terms = get_the_terms($post->ID, 'officecity')) {
			foreach ( $terms as $term ) {
				echo esc_html($term->name)  ;
			 }
		}
	?>
	<?php 
		$ninteidata = get_field('zip3');
		if($ninteidata){
			echo $ninteidata;
	} ?>
        <a class="cat-data" href="<?php
	$ninteidata = get_field('map_link');
	if($ninteidata){
 		echo $ninteidata;
	} ?>" target="_blank"><i class="fas fa-map-marker-alt"></i> 地図</a>  
    </td>
  </tr>
<?php if( get_field('phone') ) { ?>
<?php $relational = get_field('phone');
	foreach( (array)$relational as $value) { ?>
  <tr>
    <th>電話番号</th>
    <td><?php echo $value; ?></td>
  </tr>
	<?php } ?>
<?php } ?>

<?php if( get_field('fax') ) { ?>
<?php $relational = get_field('fax');
	foreach( (array)$relational as $value) { ?>
  <tr>
    <th>FAX番号</th>
    <td><?php echo $value; ?></td>
  </tr>
	<?php } ?>
<?php } ?>

<?php if( get_field('mail') ) { ?>
<?php $relational = get_field('mail');
	foreach( (array)$relational as $value) { ?>
  <tr>
    <th>代表 メールアドレス</th>
    <td><?php echo $value; ?></td>
  </tr>
	<?php } ?>
<?php } ?>
  <tr>
    <th>事業内容</th>
    <td><?php
	$ninteidata = get_field('description');
	if($ninteidata){
		echo $ninteidata;
	} ?></td>
  </tr>
  <tr>
    <th>保険・退職金制度</th>
    <td><?php
	$ninteidata = get_field('retirement');
	if($ninteidata){
		echo $ninteidata;
	} ?></td>
  </tr>
  <tr>
    <th>従業員等</th>
    <td><?php
	$ninteidata = get_field('employee');
	if($ninteidata){
 		echo $ninteidata;
	} ?></td>
  </tr>
  <tr>
    <th>採用実績</th>
    <td><?php
	$ninteidata = get_field('adoptionresults');
	if($ninteidata){
		echo $ninteidata;
		}
	else{
		echo "なし";
	} ?></td>
  </tr>
  <tr>
    <th>研修制度</th>
    <td><?php
	$ninteidata = get_field('training');
	if($ninteidata){
		echo $ninteidata;
		}
	else{
		echo "なし";
	} ?></td>
  </tr>
<?php if( get_field('homepage') ) { ?>
<?php $relational = get_field('homepage');
	foreach( (array)$relational as $value) { ?>
  <tr>
    <th>ホームページ</th>
    <td><a href="<?php echo $value; ?>" target="_blank"><i class="fas fa-external-link-alt"></i> <?php echo $value; ?></a></td>
  </tr>
	<?php } ?>
<?php } ?>

<?php if( get_field('sns') ) { ?>
<?php $relational = get_field('sns');
	foreach( (array)$relational as $value) { ?>
  <tr>
    <th>SNS</th>
    <td><a href="<?php echo $value; ?>" target="_blank"><i class="fas fa-external-link-alt"></i> <?php echo $value; ?></a></td>
  </tr>
	<?php } ?>
<?php } ?>
</table>
    <p class="btn_orange"><a href="https://wa-rc.jp/job_offer/info_job/"><i class="fa fa-search" aria-hidden="true"></i> 求人情報の検索へ</a></p>
</article>
<article>
<!--<div class="cg3">-->
<div class="imagearea">
<p align="center">
<?php if( get_field('photo01') ) { ?>
<?php
	$attachment_id = get_field('photo01');
	$size = "full"; // (thumbnail, medium, large, full or custom size)
	$image = wp_get_attachment_image_src( $attachment_id, $size );
	$attachment = get_post( get_field('photo01') );
	$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
	$image_title = $attachment->post_title;
?>
<figure>
<img src="<?php echo $image[0]; ?>" alt="<?php echo $alt; ?>" title="<?php echo $image_title; ?>" />
  <figcaption><?php echo $image_title; ?></figcaption>
</figure>



<?php } ?>

<?php if( get_field('photo02') ) { ?>
<?php
	$attachment_id = get_field('photo02');
	$size = "full"; // (thumbnail, medium, large, full or custom size)
	$image = wp_get_attachment_image_src( $attachment_id, $size );
	$attachment = get_post( get_field('photo02') );
	$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
	$image_title = $attachment->post_title;
?>
<figure>
<img src="<?php echo $image[0]; ?>" alt="<?php echo $alt; ?>" title="<?php echo $image_title; ?>" />
  <figcaption><?php echo $image_title; ?></figcaption>
</figure>
<?php } ?>

<?php if( get_field('photo03') ) { ?>
<?php
	$attachment_id = get_field('photo03');
	$size = "full"; // (thumbnail, medium, large, full or custom size)
	$image = wp_get_attachment_image_src( $attachment_id, $size );
	$attachment = get_post( get_field('photo03') );
	$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
	$image_title = $attachment->post_title;
?>
<figure>
<img src="<?php echo $image[0]; ?>" alt="<?php echo $alt; ?>" title="<?php echo $image_title; ?>" />
  <figcaption><?php echo $image_title; ?></figcaption>
</figure>
<?php } ?>

<?php if( get_field('photo04') ) { ?>
<?php
	$attachment_id = get_field('photo04');
	$size = "full"; // (thumbnail, medium, large, full or custom size)
	$image = wp_get_attachment_image_src( $attachment_id, $size );
	$attachment = get_post( get_field('photo04') );
	$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
	$image_title = $attachment->post_title;
?>
<figure>
<img src="<?php echo $image[0]; ?>" alt="<?php echo $alt; ?>" title="<?php echo $image_title; ?>" />
  <figcaption><?php echo $image_title; ?></figcaption>
</figure>
<?php } ?>

<?php if( get_field('photo05') ) { ?>
<?php
	$attachment_id = get_field('photo05');
	$size = "full"; // (thumbnail, medium, large, full or custom size)
	$image = wp_get_attachment_image_src( $attachment_id, $size );
	$attachment = get_post( get_field('photo05') );
	$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
	$image_title = $attachment->post_title;
?>
<figure>
<img src="<?php echo $image[0]; ?>" alt="<?php echo $alt; ?>" title="<?php echo $image_title; ?>" />
  <figcaption><?php echo $image_title; ?></figcaption>
</figure>
<?php } ?>

<?php if( get_field('photo06') ) { ?>
<?php
	$attachment_id = get_field('photo06');
	$size = "full"; // (thumbnail, medium, large, full or custom size)
	$image = wp_get_attachment_image_src( $attachment_id, $size );
	$attachment = get_post( get_field('photo06') );
	$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
	$image_title = $attachment->post_title;
?>
<figure>
<img src="<?php echo $image[0]; ?>" alt="<?php echo $alt; ?>" title="<?php echo $image_title; ?>" />
  <figcaption><?php echo $image_title; ?></figcaption>
</figure>
<?php } ?>

</p>
</div>
<!--</div>-->

</article>
    <p class="btn_bak"><a href="javascript:history.back()"><i class="fa fa-arrow-circle-left"></i> 戻る</a></p>


  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
