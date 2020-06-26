<?php
/**
 * Template Name: イベント情報詳細
 */
?>
<?php get_header(); ?>
<div class="container">
  <div class="contents">
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php if(function_exists('bcn_display'))
	{
		bcn_display();
	}?>
    </div>
    <article>
      <a class="button" href="<?php echo home_url(); ?>/event/"><< イベント情報一覧に戻る</a>
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
      <h2>イベント情報詳細</h2>
      <table class="col-head-type1" summary="イベント詳細">
        <tr>
          <th class="t_top">イベント名</th>
          <td class="t_top"><?php
	$ninteidata = get_field('event_ttl');
	if($ninteidata){
		echo $ninteidata;
	} ?></td>
         </tr>
         <tr>
           <th><i class="fas fa-calendar-alt"></i>　開催期間</th>
           <td><?php 
	$check = get_field('event_st');
	if($check){
		foreach((array)$check as $value) {
			echo "".$value;
		}
	} ?>
	<?php if( get_field('event_end') ) { ?>
		　から<?php the_field('event_end'); ?>　まで
	<?php } ?>
           </td>
         </tr>
<?php if( get_field('event_venue') ) { ?>
         <tr>
           <th><i class="fas fa-map-marker-alt"></i>　開催場所</th>
           <td><?php the_field('event_venue'); ?></td>
         </tr>
<?php } ?>
<?php if( get_field('booking') ) { ?>
         <tr>
           <th><i class="fas fa-clock"></i>　予約</th>
           <td><?php the_field('booking'); ?></td>
         </tr>
<?php } ?>
<?php if( get_field('event_tel') ) { ?>
         <tr>
           <th><i class="fas fa-phone"></i>　電話番号</th>
           <td><?php the_field('event_tel'); ?></td>
         </tr>
<?php } ?>
<?php if( get_field('event_add') ) { ?>
         <tr>
           <th><i class="fas fa-map-marked"></i>　住所</th>
           <td><?php the_field('event_add'); ?></td>
         </tr>
<?php } ?>
<?php if( get_field('event_acc') ) { ?>
         <tr>
           <th><i class="fas fa-map-marked-alt"></i>　交通アクセス</th>
           <td><?php the_field('event_acc'); ?></td>
         </tr>
<?php } ?>
<?php if( get_field('event_parking') ) { ?>
         <tr>
           <th><i class="fas fa-car"></i>　駐車場</th>
           <td><?php the_field('event_parking'); ?></td>
         </tr>
<?php } ?>
<?php if( get_field('event_hp') ) { ?>
         <tr>
           <th>ホームページ</th>
           <td><a href="<?php the_field('event_hp'); ?>"><?php the_field('event_hp'); ?></a></td>
         </tr>
<?php } ?>
<?php if( get_field('mapurl') ) { ?>
         <tr>
           <th>〔地図〕</th>
           <td><a href="<?php the_field('mapurl'); ?>"><?php the_field('mapurl'); ?></a></td>
         </tr>
<?php } ?>
<?php if( get_field('event_fee') ) { ?>
         <tr>
           <th><i class="fas fa-coins"></i>　料金</th>
           <td><?php the_field('event_fee'); ?></td>
         </tr>
<?php } ?>
        </table>
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
    </article>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
