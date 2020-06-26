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
      <?php if(function_exists('bcn_display')) {
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
<?php $post_field = get_field('office'); ?>
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
            <b><i class="fas fa-calendar-alt"></i>　掲載終了日　</b>
            <?php
	$ninteidata = get_field('posting_end');
	if($ninteidata){
		echo $ninteidata; }
	else{
		echo '雇用が決まるまで';
	} ?>
          </span><br>
          <span class="kiji-date">
            <b><i class="fas fa-map-marker-alt"></i>　勤務地</b></span>　　　　<span class="tag-data">
<?php if(get_field('jobcity')): ?>
		<?php $term = get_field('jobcity'); ?>
		<?php foreach((array)$term as $value) { ?>
		<?php echo $value->name; ?>
		<?php if(next($term)!==FALSE){ echo '</span>　<span class="tag-data">';} ?>
		<?php } ?>
		<?php endif; ?></span>
          <br>
          <span class="kiji-date">
            <b><i class="fas fa-clipboard"></i>　職種</b></span>　　　　<span class="tag-data"><?php if(get_field('jobtype')): ?>
		<?php $term = get_field('jobtype'); ?>
		<?php foreach((array)$term as $value) { ?>
		<?php echo $value->name; ?>
		<?php if(next($term)!==FALSE){ echo '</span>　<span class="tag-data">';} ?>
		<?php } ?>
		<?php endif; ?></span><br>
          <span class="kiji-date">
            <b><i class="fas fa-clipboard"></i>　お仕事内容</b>　<?php
	$ninteidata = get_field('contents');
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
    <div class="pagination">
    <?php echo paginate_links( array(
	'type' => 'list',
	'mid_size' => '1',
	'prev_text' => '&laquo;',
	'next_text' => '&raquo;'
) ); ?>
    </div>
    <p class="button_saikensaku center"><a href="<?php echo home_url('/info_job/'); ?>"><i class="fa fa-search" aria-hidden="true"></i> 再検索する</a></p>
    <!-- 検索結果Ｅ -->
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
