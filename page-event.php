<?php
/**
 * Template Name: イベント情報一覧
 */
?>
<?php get_header(); ?>
<div class="container">
  <div class="contents">
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php if(function_exists('bcn_display')){
	bcn_display();
	}?>
    </div>
    <h1>イベント情報一覧</h1>
<?php
	$args = array(
		'numberposts' => 50,	//表示（取得）する記事の数
		'post_type' => 'event'	//投稿タイプの指定
	);
	$posts = get_posts( $args );
	if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post ); ?>
    <article <?php post_class( 'kiji-list' ); ?>>
      <a href="<?php the_permalink(); ?>">
        <div class="card_ev">
          <h2><?php the_title(); ?></h2>
          <span class="kiji-date">
            <b>　<i class="fas fa-calendar-alt"></i>　開催期間：</b><?php the_field('event_st'); ?>から<?php the_field('event_end'); ?>　まで<br>
            <b>　<i class="fas fa-map-marker-alt"></i>　開催場所：</b><?php the_field('event_venue'); ?></p>
          </span><br>
          <!--<p><?php the_content(); ?></p>-->
          <p></p>
        </div>
      </a>
    </article>
<?php endforeach; ?>
<?php else : //記事が無い場合 ?>
    <article <?php post_class( 'kiji-list' ); ?>>
      <p>イベント情報はまだありません。</p>
    </article>
<?php endif;
	wp_reset_postdata(); //クエリのリセット ?>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
