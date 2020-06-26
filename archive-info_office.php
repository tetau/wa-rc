<?php
/**
 * Template Name: 林業事業体（県内企業）の紹介
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
    <h1>林業事業体（県内企業）の紹介</h1>
<div class="h_10px">
<?php
//$taxonomyName = "タクソノミー名";
$taxonomyName = "officecity";
$args = array(
	'parent' => 0
);
$terms = get_terms($taxonomyName,$args);
foreach ($terms as $term) { ?>
  <h2 id="<?php echo $term->slug; ?>"><?php echo $term->name; ?></h2>
  <?php $children = get_terms($taxonomyName,'hierarchical=0&parent='.$term->term_id); if(!$children): //子タームが設定されていない場合 ?>
<div class="row">
    <div class="md-12">
      <ul>
<?php
$postargs_parent = array(
	'post_type' => 'info_office',
//	'post_type' => '投稿タイプ名',
	'posts_per_page' => -1,
	'tax_query' => array(
		array(
			'taxonomy' => $taxonomyName,
			'field' => 'slug',
			'terms' => $term->slug
		)
	)
);
$postslist_parent = get_posts( $postargs_parent );
foreach ( $postslist_parent as $post ) : setup_postdata( $post ); ?>
        <li>
          <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
          <!-- 住所を表示 -->
          （<?php
		if ($terms = get_the_terms($post->ID, 'officecity')) {
			foreach ( $terms as $term ) {
				echo esc_html($term->name)  ;
			 }
		}
	?><?php 
		$ninteidata = get_field('zip3');
		if($ninteidata){
			echo $ninteidata;
	} ?>）
          <!-- 詳細を表示 -->
          <a class="syousai-data" href="<?php the_permalink(); ?>"><i class="fas fa-file-medical-alt"></i> 詳細</a> 
          <!-- GoogleMapへのリンクを表示 -->
          <a class="cat-data" href="<?php
	$ninteidata = get_field('map_link');
	if($ninteidata){
		echo $ninteidata;
	} ?>" target="_blank" rel="noopener noreferrer"><i class="fas fa-map-marker-alt"></i> 地図</a></li>
<?php
endforeach;
echo "</ul></div></div>";
wp_reset_postdata();
endif; //子タームが設定されていない場合終わり

//親タームのIDから子タームの情報を出力
$parentId = $term->term_id;
$childargs = array(
	'parent' => $parentId,
	'hide_empty' => true
);
$childterms = get_terms($taxonomyName,$childargs);
foreach ($childterms as $childterm) {
	$targetSlug = $childterm->slug; ?>
      <h3 id="<?php echo $targetSlug; ?>"><?php echo $childterm->name; ?></h3>
      <ul>
<?php
$postargs = array(
	'post_type' => 'info_office',
//	'post_type' => '投稿タイプ名',
	'posts_per_page' => -1,
	'tax_query' => array(
		array(
			'taxonomy' => $taxonomyName,
			'field' => 'slug',
			'terms' => $targetSlug
		)
	)
);
$postslist = get_posts( $postargs );
foreach ( $postslist as $post ) : setup_postdata( $post ); ?>
        <li>
          <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
        </li>
<?php
endforeach;
echo "</ul>";
			wp_reset_postdata();
		}
	}
?>
    </div>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
