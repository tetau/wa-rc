<?php
/**
 * Template Name: topページ
*/
?>

<?php get_header(); ?>
<div class="container">
  <div class="contents">
    <!--記事本文-->
    <?php if(have_posts()): the_post(); ?>
    <article <?php post_class( 'kiji' ); ?>>
<div class="container">
      <!--本文取得-->
      <?php the_content(); ?>
<br />
<div class="row">
  <h2>“林業”に就きたい！または、林業に興味のあるみなさまへ</h2>
  <div class="sm-12 md-4 sm-mt-20">
    <div class="card4">
      <h4 class="title4 orange"><i class="fa fa-search" aria-hidden="true"></i> 求人情報の検索</h4>
      <p class="content4">和歌山県内の林業事業体（林業関係の企業）の求人情報を掲載しています。<br />
        求人情報は、勤務地や職種などの条件で絞込み検索ができます。&#8221;あなた&#8221;の条件にあった求人をお探しください。</p>
      <div class="box4"><a class="btn-square" href="https://wa-rc.jp/job_offer/info_job/">詳細はこちら</a></div>
    </div>
  </div>

  <div class="sm-12 md-4 sm-mt-20">
    <div class="card4">
      <h4 class="title4 blue"><i class="far fa-envelope"></i> 求職者の登録</h4>
      <p class="content4">林業に就きたい！または就職まではを考えていなが林業に興味がある方！あなたの情報をご登録ください。ご登録頂いた方には、労確センターから林業体験やイベント、求人等の情報を個別にご連絡させていただきます。</p>
      <div class="box4"><a class="btn-square" href="https://wa-rc.jp/touroku/job_seeker/">詳細はこちら</a></div>
    </div>
  </div>

  <div class="sm-12 md-4 sm-mt-20">
    <div class="card4">
      <h4 class="title4 green"><i class="fa fa-tree" aria-hidden="true"></i> 林業事業体（県内企業）の紹介</h4>
      <p class="content4">和歌山県内の林業事業体（林業関係の企業）情報を紹介しています。<br />
        各企業からのアピールポイントや特徴を掲載していますので、どんな企業があるかご覧ください。<br />
        　　
      </p>
      <div class="box4"><a class="btn-square" href="https://wa-rc.jp/job_offer/info_office/">詳細はこちら</a></div>
    </div>
  </div>


<!--
  <div class="flexbox_card2">
    <div class="box-item_card2">
      <section class="card2">
        <img class="card2-img" src="/wp-content/themes/wa-rc/images/kari.jpg" alt="">
        <div class="card2-content">
          <p class="card2-title">なぜ、山を守らねばいけないか？ </p>
        </div>
        <div class="card2-link">
          <a href="https://wa-rc.jp/kizi_topix/kiji01/">詳細はこちら</a>
        </div>
      </section>
    </div>

    <div class="box-item_card2">
      <section class="card2">
        <img class="card2-img" src="/wp-content/themes/wa-rc/images/kari.jpg" alt="">
        <div class="card2-content">
          <p class="card2-title">林業の仕事とは？</p>
        </div>
        <div class="card2-link">
          <a href="https://wa-rc.jp/kizi_topix/kiji02/">詳細はこちら</a>
        </div>
      </section>
    </div>



    <div class="box-item_card2">
      <section class="card2">
        <img class="card2-img" src="/wp-content/themes/wa-rc/images/kari.jpg" alt="">
        <div class="card2-content">
          <p class="card2-title">フォレストワーカーとは、林業大学校とは？</p>
        </div>
        <div class="card2-link">
          <a href="https://wa-rc.jp/kizi_topix/kiji03/">詳細はこちら</a>
        </div>
      </section>
    </div>

    <div class="box-item_card2">
      <section class="card2">
        <img class="card2-img" src="/wp-content/themes/wa-rc/images/kari.jpg" alt="">
        <div class="card2-content">
          <p class="card2-title">林業に従事している人のインタビュー</p>
        </div>
        <div class="card2-link">
          <a href="https://wa-rc.jp/kizi_topix/kiji04/">詳細はこちら</a>
        </div>
      </section>
    </div>

    <div class="box-item_card2">
      <section class="card2">
        <img class="card2-img" src="/wp-content/themes/wa-rc/images/kari.jpg" alt="">
        <div class="card2-content">
          <p class="card2-title">林業に就職する方法・森で働くためのアプローチ</p>
        </div>
        <div class="card2-link">
          <a href="https://wa-rc.jp/kizi_topix/kiji05/">詳細はこちら</a>
        </div>
      </section>
    </div>

    <div class="box-item_card2">
      <section class="card2">
        <img class="card2-img" src="/wp-content/themes/wa-rc/images/kari.jpg" alt="">
        <div class="card2-content">
          <p class="card2-title">記事6</p>
        </div>
        <div class="card2-link">
          <a href="https://wa-rc.jp/kizi_topix/kiji06/">詳細はこちら</a>
        </div>
      </section>
    </div>

    <div class="box-item_card2">
      <section class="card2">
        <img class="card2-img" src="/wp-content/themes/wa-rc/images/kari.jpg" alt="">
        <div class="card2-content">
          <p class="card2-title">記事7</p>
        </div>
        <div class="card2-link">
          <a href="https://wa-rc.jp/kizi_topix/kiji07/">詳細はこちら</a>
        </div>
      </section>
    </div>

    <div class="box-item_card2">
      <section class="card2">
        <img class="card2-img" src="/wp-content/themes/wa-rc/images/kari.jpg" alt="">
        <div class="card2-content">
          <p class="card2-title">記事8</p>
        </div>
        <div class="card2-link">
          <a href="https://wa-rc.jp/kizi_topix/kiji08/">詳細はこちら</a>
        </div>
      </section>
    </div>

    <div class="box-item_card2">
      <section class="card2">
        <img class="card2-img" src="/wp-content/themes/wa-rc/images/kari.jpg" alt="">
        <div class="card2-content">
          <p class="card2-title">記事9</p>
        </div>
        <div class="card2-link">
          <a href="https://wa-rc.jp/kizi_topix/kiji09/">詳細はこちら</a>
        </div>
      </section>
    </div>

    <div class="box-item_card2">
      <section class="card2">
        <img class="card2-img" src="/wp-content/themes/wa-rc/images/kari.jpg" alt="">
        <div class="card2-content">
          <p class="card2-title">記事10</p>
        </div>
        <div class="card2-link">
          <a href="https://wa-rc.jp/kizi_topix/kiji10/">詳細はこちら</a>
        </div>
      </section>
    </div>
  </div>
-->

</div>


<div class="row">
<h2><i class="fas fa-link"></i> 関連リンク</h2>
<div class="sm-12 md-4 sm-mt-20"><a href="http://www.zenmori.org/" target="_blank" rel="noopener noreferrer"><img class="alignnone size-full wp-image-778" src="https://wa-rc.jp/wp-content/uploads/2019/06/全国森林組合連合会.png" alt="" width="300" height="50" /></a></div>
<div class="sm-12 md-4 sm-mt-20"><a href="https://www.pref.wakayama.lg.jp/" target="_blank" rel="noopener noreferrer"><img class="alignnone size-medium wp-image-319" src="https://wa-rc.jp/wp-content/uploads/2019/05/和歌山県-300x50.png" alt="" width="300" height="50" /></a></div>
<div class="sm-12 md-4 sm-mt-20"><a href="http://www.rinya.maff.go.jp/index.html" target="_blank" rel="noopener noreferrer"><img class="alignnone size-medium wp-image-320" src="https://wa-rc.jp/wp-content/uploads/2019/05/林野庁-300x50.png" alt="" width="300" height="50" /></a></div>
</div>
</div>




    </article>
    <?php endif; ?>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
