<?php
/**
 * Template Name: 求人情報一覧
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

    <h2>求人情報一覧</h2>
    <!-- 検索結果Ｓ -->
<?php
	global $wp_query;
	$total_results = $wp_query->found_posts;
	$search_query = get_search_query();
?>
    <h3>　<?php echo $wp_query->found_posts; ?>件の求人情報があります。</h3>
<?php
	if( $total_results >0 ):
	if(have_posts()):
	while(have_posts()): the_post();
?>
<?php
	$attachment_id = get_field('photo01');
	$size = "thumbnail"; // (thumbnail, medium, large, full or custom size)
	$image = wp_get_attachment_image_src( $attachment_id, $size );
	$attachment = get_post( get_field('photo01') );
	$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
	$image_title = $attachment->post_title;
?>

    <article <?php post_class( 'kiji-list' ); ?>>
      <a href="<?php the_permalink(); ?>">
        <img src="<?php echo $image[0]; ?>" alt="<?php echo $alt; ?>" title="<?php echo $image_title; ?>" />
        <div class="text">
          <h2><?php the_title(); ?></h2>
          <span class="kiji-date">
            <i class="fas fa-pencil-alt"></i>掲載終了日／ 
            <?php
	$ninteidata = get_field('posting_end');
	if($ninteidata){
		echo $ninteidata;
	} ?>
          </span><br>
          <span class="kiji-date">

        <b>勤務地</b>　<?php
	$ninteidata = get_field('location');
	if($ninteidata){
		echo $ninteidata;
	} ?>
          </span><br>
<?php the_excerpt(); ?>
                  </div>
</a>
    </article>

<?php endwhile; endif; else: ?>
  <h2 class="entry-title">一致する情報は見つかりませんでした。</h2>
<?php endif; ?>
  <p class="button_saikensaku"><a href="<?php echo home_url('/info_job/'); ?>"><i class="fa fa-search" aria-hidden="true"></i> 再検索する</a></p>
  <!-- 検索結果Ｅ -->



  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
