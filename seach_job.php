<?php
/**
 * Template Name: 仕事検索
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
  <article>
    <h1 class="head_office">求人情報検索</h1>
    <div class="point">
      <ul>
        <li>和歌山県内林業事業体（林業関係の企業）の求人情報を検索できます。</li>
        <li>求人情報は、職種、勤務地の市町村、雇用形態の条件で絞り込み検索ができます。</li>
        <li>条件を選択（複数選択可）し、［検索］ボタンを押すと検索結果が表示されます。</li>
      </ul>
    </div>
    <div itemprop="mainEntityOfPage" id="mainEntity" <?php post_class('post'); ?>>
      <!--<h2><?php the_title(); ?></h2>-->
      <div class="clearfix">
        <form role="search" method="get" id="formck" class="search-form" action="<?php echo home_url( '/' ); ?>">
          <input type="hidden" name="post_type" value="info_job"><!--投稿タイプ名-->
          <!--<input type="hidden" class="search-field" name="s">-->
          <h2>職種</h2>
		<?php
			$taxonomy_name = 'jobtype';	//カスタムタクソノミー名
			$args = array( 'orderby' => 'description', 'hide_empty' => false );
			$taxonomys = get_terms($taxonomy_name,$args);
			if(!is_wp_error($taxonomys) && count($taxonomys)):
				foreach($taxonomys as $taxonomy):
				$tax_posts = get_posts(array('post_type' => 'info_job', 'taxonomy' => $taxonomy_name, 'term' => $taxonomy->slug ) );
			if($tax_posts):
		?>

          <label class="search-label-<?php echo $taxonomy->slug; ?> r-20">
            <input type="checkbox" name="jobtype[]" value="<?php echo $taxonomy->slug; ?>" class="checkBoxes"><?php echo $taxonomy->name; ?>
          </label>
		<?php
			endif;
			endforeach;
			endif;
		?>
          <br>
          <br>
          <h2>勤務地の市町村</h2>
		<?php
			$taxonomy_name = 'jobcity';
			$args = array( 'orderby' => 'description', 'hide_empty' => false );
			$taxonomys = get_terms($taxonomy_name,$args);
			if(!is_wp_error($taxonomys) && count($taxonomys)):
				foreach($taxonomys as $taxonomy):
				$tax_posts = get_posts(array('post_type' => 'info_job', 'taxonomy' => $taxonomy_name, 'term' => $taxonomy->slug ) );
			if($tax_posts):
		?>
          <label class="search-label-<?php echo $taxonomy->slug; ?> r-20">
            <input type="checkbox" name="jobcity[]" value="<?php echo $taxonomy->slug; ?>" class="checkBoxes"><?php echo $taxonomy->name; ?>
          </label>
		<?php
			endif;
			endforeach;
			endif;
		?>
          <br>
          <br>
          <h2>雇用形態</h2>
		<?php
			$taxonomy_name = 'employment';
			$args = array( 'orderby' => 'description', 'hide_empty' => false );
			$taxonomys = get_terms($taxonomy_name,$args);
			if(!is_wp_error($taxonomys) && count($taxonomys)):
				foreach($taxonomys as $taxonomy):
				$tax_posts = get_posts(array('post_type' => 'info_job', 'taxonomy' => $taxonomy_name, 'term' => $taxonomy->slug ) );
			if($tax_posts):
		?>
          <label class="search-label-<?php echo $taxonomy->slug; ?> r-20">
            <input type="checkbox" name="employment[]" value="<?php echo $taxonomy->slug; ?>" class="checkBoxes"><?php echo $taxonomy->name; ?>
          </label>
		<?php
			endif;
			endforeach;
			endif;
		?>
          <!--
          <h3>寮・社宅 </h3>
		<?php
			$taxonomy_name = 'dormitory';
			$args = array( 'orderby' => 'description', 'hide_empty' => false );
			$taxonomys = get_terms($taxonomy_name,$args);
			if(!is_wp_error($taxonomys) && count($taxonomys)):
				foreach($taxonomys as $taxonomy):
				$tax_posts = get_posts(array('post_type' => 'info_job', 'taxonomy' => $taxonomy_name, 'term' => $taxonomy->slug ) );
			if($tax_posts):
		?>
          <label class="search-label-<?php echo $taxonomy->slug; ?> r-20">
            <input type="checkbox" name="dormitory[]" value="<?php echo $taxonomy->slug; ?>" class="checkBoxes"><?php echo $taxonomy->name; ?>
          </label>
		<?php
			endif;
			endforeach;
			endif;
		?>
            -->
          <br>
          <br>
          <p><input id="submit_button" class="fas" type="submit" value="&#xf002; 検索"  onClick="return isCheck()" ></p>
        </form>
      </div>
    </div>
  </article>
  <p class="btn_bak"><a href="javascript:history.back()"><i class="fa fa-arrow-circle-left"></i> 戻る</a></p>
</div>
<!--
<script>
function isCheck() {
	var arr_checkBoxes = document.getElementsByClassName("checkBoxes");
	var count = 0;
	for (var i = 0; i < arr_checkBoxes.length; i++) {
		if (arr_checkBoxes[i].checked) {
			count++;
		}
	}
	if (count > 0) {
		return true;
	} else {
		window.alert("条件を1つ以上選択してください。");
		return false;
	}
}
</script>
-->
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
