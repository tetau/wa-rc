<?php get_header(); ?>
<!-- home.php -->
<div class="container">
  <div class="contents">
    <!-- パンくず -->
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
    <!-- Breadcrumb NavXT 6.3.0 -->
<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href="https://wa-rc.jp" class="home" ><span property="name"><i class="fas fa-home"></i>トップページ</span></a><meta property="position" content="1"></span>&nbsp;&nbsp;<i class="fas fa-caret-right"></i>&nbsp;&nbsp;<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href="https://wa-rc.jp/job_offer/" class="post post-page" ><span property="name">求人情報</span></a><meta property="position" content="2"></span>&nbsp;&nbsp;<i class="fas fa-caret-right"></i>&nbsp;&nbsp;<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href="https://wa-rc.jp/job_offer/info_job/" class="info_job-root post post-info_job" ><span property="name">求人情報の検索</span></a><meta property="position" content="3"></span>&nbsp;&nbsp;<i class="fas fa-caret-right"></i>&nbsp;&nbsp;<span property="itemListElement" typeof="ListItem"><span property="name">全ての求人情報</span><meta property="position" content="4"></span>    </div>
    <h2>求人情報一覧</h2>
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
    <article <?php post_class( 'kiji-list' ); ?>>
      <a href="<?php the_permalink(); ?>">
        <!--画像を追加-->
        <?php if( has_post_thumbnail() ): ?>
          <?php the_post_thumbnail('medium'); ?>
        <?php else: ?>
          <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.gif" alt="no-img"/>
        <?php endif; ?>
        <div class="text">
          <!--タイトル-->
          <h2><?php the_title(); ?></h2>
          <!--投稿日を表示
          <span class="kiji-date">
            <i class="fas fa-pencil-alt"></i>
            <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
              <?php echo get_the_date(); ?>
            </time>
          </span>-->
          <!--カテゴリ-->
          <?php if (!is_category()): ?>
            <?php if( has_category() ): ?>
              <span class="cat-data">
              <?php $postcat=get_the_category(); echo $postcat[0]->name; ?>
              </span>
            <?php endif; ?>
          <?php endif; ?>
          <span class="kiji-date">
            <b><i class="fas fa-calendar-alt"></i>　掲載終了日</b>　 
            <?php
	$ninteidata = get_field('posting_end');
	if($ninteidata){
		echo $ninteidata; }
	else{
		echo '雇用が決まるまで';
	} ?>
          </span><br>
          <span class="kiji-date">
            <b><i class="fas fa-map-marker-alt"></i>　勤務地</b></span>　　　　<span class="tag-data"><?php if(get_field('jobcity')): ?>
		<?php $term = get_field('jobcity'); ?>
		<?php foreach((array)$term as $value) { ?>
		<?php echo $value->name; ?>
		<?php if(next($term)!==FALSE){ echo '</span>　<span class="tag-data">';} ?>
		<?php } ?>
		<?php endif; ?></span><br>
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
          <!--抜粋-->
          <?php the_excerpt(); ?>
        </div><!-- /.text -->
      </a>
    </article>
    <?php endwhile; endif; ?><!--ループ終了-->
    <div class="pagination">
    <?php echo paginate_links( array(
	'type' => 'list',
	'mid_size' => '1',
	'prev_text' => '&laquo;',
	'next_text' => '&raquo;'
) ); ?>
    </div>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
