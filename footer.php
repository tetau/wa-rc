<p id="pageTop"><a href="#">▲</a></p>
<footer>
  <div class="footer-inner">
    <div class="footer-nav-area">
      <div class="row">
        <div class="sm-12 md-6 sm-mt-20">
          <b>お問い合わせ先</b><br>
          <hr>
           <p> <b>わかやま林業労働力確保支援センター</b><br>
             〒６４９－２１０３<br>
             和歌山県西牟婁郡上富田町生馬１５０４－１　<a class="cat-data" href="https://goo.gl/maps/zyT3C5sgk2sSoUS48" target="_blank"><i class="fas fa-map-marker-alt"></i> 地図</a><br>
             電話　０７３９－８３－２０２２<br>FAX　０７３９－８３－２５６５</p>
           <hr>
           <b>無料職業紹介事業　許可番号　３０－ム－３０００１６</b>
        </div>
        <div class="sm-12 md-6 sm-mt-20">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d484.0728812599231!2d135.43481838806355!3d33.68958524133932!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6007a60a1acd9893%3A0x8201386a800fe099!2z44KP44GL44KE44G-5p6X5qWt5Yq05YON5Yqb56K65L-d5pSv5o-044K744Oz44K_44O8!5e0!3m2!1sja!2sjp!4v1562026183461!5m2!1sja!2sjp" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div><!-- /.row -->
    </div>
    <hr>
    <div class="footer-nav-area">
      <?php wp_nav_menu( array(
            'theme_location' => 'footer-nav',
            'container' => 'nav',
            'container_class' => 'footer-nav',
            'container_id' => 'footer-nav',
            'fallback_cb' => ''
            ) ); ?>
    </div>
    <hr>
    <div class="copyright">
      <p>copyright <?php bloginfo( 'name' ); ?> All Rights Reserved.</p>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri() ?>/js/jquery-2.1.3.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/common.js"></script>
</body>
</html>
