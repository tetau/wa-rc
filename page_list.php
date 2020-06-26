<?php
/**
 * Template Name: 目次（親ページ＞子ページの一覧）
 */
?>
<?php get_header(); ?>
<div class="container">
  <div class="contents">
    <!-- パンくず -->
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
<?php if(function_exists('bcn_display')){
	bcn_display();
}?>
    </div>
    <!--記事本文-->
<?php if(have_posts()): the_post(); ?>
    <article <?php post_class( 'kiji' ); ?>>
      <!--タイトル-->
      <h1><?php the_title(); ?></h1>
      <!-- 目次 -->
<?php 
	$page_list = new WP_Query(
		[
			'post_type' =>'page',
			'nopaging' => -1,
			'post_parent' => get_the_ID(),
			'order' => 'ASC'
		]
	);
?>
      <div class="mokuzi">
        <ul>
<?php
	// ループスタート
	if ( $page_list->have_posts() ):
	while ( $page_list->have_posts() ) : $page_list->the_post(); ?>
          <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php
	endwhile;
	endif;
	wp_reset_query();
?>
        </ul>
      </div><!-- /.mokuzi -->
      <!--本文取得-->
<?php the_content(); ?>
    </article>
    <?php endif; ?>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
