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
    <!--記事本文-->
    <?php if(have_posts()): the_post(); ?>
    <article <?php post_class( 'kiji' ); ?>>
      <!--タイトル-->
      <h1><?php the_title(); ?></h1>
      <!--本文取得-->
      <?php the_content(); ?>
    </article>
    <?php endif; ?>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
