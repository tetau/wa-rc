<?php
/**
 * Template Name: 求職情報詳細
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
    <article <?php post_class( 'kiji' ); ?>>
      <div itemprop="mainEntityOfPage" id="mainEntity" <?php post_class('post'); ?>>
<?php $post_field = get_field('office'); ?>
        <h1><?php echo $post_field->post_title; ?></h1>
        <a class="button" href="<?php echo get_the_permalink($post_field->ID); ?>"><i class="fas fa-building"></i>　事業所詳細を見る</a>　　
        <span style="float: right;">掲載開始日 <?php $ninteidata = get_field('posting'); if($ninteidata){ echo $ninteidata; } ?><br>
          掲載終了日  <?php 
	$ninteidata = get_field('posting_end');
	if($ninteidata){
		echo $ninteidata; }
	else{
		echo '雇用が決まるまで';
	} ?></span>
        <h3>求人の詳細</h3>
        <table class="col-head-type1" summary="会社案内表">
          <tr>
            <th class="t_top">事業所名</th>
            <td class="t_top"><?php echo $post_field->post_title; ?></td>
          </tr>
          <tr>
            <th>事業所がある市町村名</th>
            <td><?php
	$ninteidata = get_field('location');
	if($ninteidata){
		echo $ninteidata;
	} ?></td>
          </tr>
          <tr>
            <th class="t_top">お仕事内容</th>
            <td class="t_top"><?php
	$ninteidata = get_field('contents');
	if($ninteidata){
		echo $ninteidata;
	} ?></td>
          </tr>
          <tr>
            <th>雇用形態 </th>
            <td><?php if(get_field('employment')): ?>
		<?php $term = get_field('employment'); ?>
		<?php foreach((array)$term as $value) { ?>
		<?php echo $value->name; ?>
		<?php if(next($term)!==FALSE){ echo " /  ";} ?>
		<?php } ?>
		<?php endif; ?></td>
          </tr>
          <tr>
            <th>求人している職種</th>
            <td><?php if(get_field('jobtype')): ?>
		<?php $term = get_field('jobtype'); ?>
		<?php foreach((array)$term as $value) { ?>
		<?php echo $value->name; ?>
		<?php if(next($term)!==FALSE){ echo " /  ";} ?>
		<?php } ?>
		<?php endif; ?></td>
          </tr>
          <tr>
            <th>求人人数</th>
            <td><?php
		$ninteidata = get_field('number_hired');
		if($ninteidata){
			echo $ninteidata;
		} ?></td>
          </tr>
          <tr>
            <th>勤務地</th>
            <td><?php if(get_field('jobcity')): ?>
		<?php $term = get_field('jobcity'); ?>
		<?php foreach((array)$term as $value) { ?>
		<?php echo $value->name; ?>
		<?php if(next($term)!==FALSE){ echo " /  ";} ?>
		<?php } ?>
		<?php endif; ?></td>
          </tr>
          <tr>
            <th>給与</th>
            <td><?php
		$ninteidata = get_field('salary');
		if($ninteidata){
		echo $ninteidata;
		} ?></td>
          </tr>
          <tr>
            <th>待遇</th>
            <td><?php
		$ninteidata = get_field('treatment');
		if($ninteidata){
			echo $ninteidata;
		} ?></td>
          </tr>
          <tr>
            <th>研修制度</th>
            <td><?php
		$ninteidata = get_field('training');
		if($ninteidata){
			echo $ninteidata;
		} ?></td>
          </tr>
          <tr>
            <th>就業時間 </th>
            <td><?php 
		$ninteidata = get_field('working_hours');
		if($ninteidata){
			echo $ninteidata;
		} ?></td>
          </tr>
          <tr>
            <th>休日・休暇 </th>
            <td><?php 
		$check = get_field('vacation');
		if($check){
			foreach((array)$check as $value) {
				echo "".$value;
			}
		} ?></td>
          </tr>
          <tr>
            <th>資格・経験 </th>
            <td><?php
		$ninteidata = get_field('experience');
		if($ninteidata){
			echo $ninteidata;
		} ?></td>
          </tr>
          <tr>
            <th>寮・社宅 </th>
            <td><?php if(get_field('dormitory')): ?>
		<?php $term = get_field('dormitory'); ?>
		<?php foreach((array)$term as $value) { ?>
		<?php echo $value->name; ?>
		<?php if(next($term)!==FALSE){ echo " /  ";} ?>
		<?php } ?>
		<?php endif; ?></td>
          </tr>
          <tr>
            <th>その他条件等 </th>
            <td><?php
		$ninteidata = get_field('etc');
		if($ninteidata){
			echo $ninteidata;
		} ?></td>
          </tr>
          <tr>
            <th>この求人の担当者</th>
            <td><?php
		$ninteidata = get_field('person');
		if($ninteidata){
			echo $ninteidata;
		} ?></td>
          </tr>
          <tr>
            <th>この求人に関する問合せ先</th>
            <td><?php
		$ninteidata = get_field('reference');
		if($ninteidata){
			echo $ninteidata;
		} ?></td>
          </tr>
          <tr>
            <th>応募方法</th>
            <td><?php
		$ninteidata = get_field('method');
		if($ninteidata){
			echo $ninteidata;
		} ?></td>
          </tr>
        </table>
      </div>
    <br>
    <p class="button_saikensaku center"><a href="<?php echo home_url('/info_job/'); ?>"><i class="fa fa-search" aria-hidden="true"></i> 再検索する</a></p>
    </article>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
