<?php
add_theme_support( 'title-tag' );
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );

//カスタムメニュー
register_nav_menu( 'header-nav',  ' ヘッダーナビゲーション ' );
register_nav_menu( 'footer-nav',  ' フッターナビゲーション ' );

//メニューボタンjs呼び出し
function navbutton_scripts(){
	wp_enqueue_script( 'navbutton_script', get_template_directory_uri() .'/js/navbutton.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts' , 'navbutton_scripts' );

//サイドバーにウィジェット追加
function widgetarea_init() {
	register_sidebar(array(
		'name'=>'サイドバー',
		'id' => 'side-widget',
		'before_widget'=>'<div id="%1$s" class="%2$s sidebar-wrapper">',
		'after_widget'=>'</div>',
		'before_title' => '<h4 class="sidebar-title">',
		'after_title' => '</h4>'
	));
}
add_action( 'widgets_init', 'widgetarea_init' );
add_filter('acf/settings/remove_wp_meta_box', '__return_false');

/* 固定ページにカテゴリ表示 */
add_action('init','add_categories_for_pages'); 
function add_categories_for_pages(){ 
	register_taxonomy_for_object_type('category', 'page'); 
} 
add_action( 'pre_get_posts', 'nobita_merge_page_categories_at_category_archive' ); 
function nobita_merge_page_categories_at_category_archive( $query ) { 
	if ( $query->is_category== true && $query->is_main_query() ) { 
		$query->set('post_type', array( 'post', 'page', 'nav_menu_item')); 
	} 
}

/******************************
* wp_headの不要なコードを削除
******************************/
// WordPressのバージョン情報を非表示
remove_action('wp_head','wp_generator');
function remove_cssjs_ver2( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver2', 9999 );
add_filter( 'script_loader_src', 'remove_cssjs_ver2', 9999 );

// コメントのフィードなどを非表示
remove_action('wp_head', 'feed_links_extra', 3);
// 絵文字を非表示
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
// ブログ投稿ツールを非表示
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
// rel=”prev”とrel=”next”を非表示
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');



/******************************
カスタムフィールドの内容も検索結果に含める
******************************/
function cf_search_join( $join ) {
	global $wpdb;
	if ( is_search() ) {
		$join .= ' LEFT JOIN ' . $wpdb->postmeta . ' ON ' . $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
	}
	return $join;
}
add_filter( 'posts_join', 'cf_search_join' );


/******************************
 * 検索にカスタムフィールドを含める
******************************/
function posts_search_custom_fields( $orig_search, $query ) {
	if ( $query->is_search() && $query->is_main_query() && ! is_admin() ) {
		// 4.4のWP_Query::parse_search()の処理を流用。(検索語の分割処理などはすでにquery_vars上にセット済のため省く)
		global $wpdb;
		$q = $query->query_vars;
		$n = ! empty( $q['exact'] ) ? '' : '%';
		$searchand = '';
		if($q['search_terms']) {
		    foreach ( $q['search_terms'] as $term ) {
			    $like_op  = 'LIKE';
			    $andor_op = 'OR';
			    $like = $n . $wpdb->esc_like( $term ) . $n;
			    // カスタムフィールド用の検索条件を追加
			    // COLLATE utf8_unicode_ciでカスタムフィールドを「ひらがな」と「カタカナ」、「全角英数」と「半角英数」を区別しないでマッチさせる
			    $search .= $wpdb->prepare( "{$searchand}(($wpdb->posts.post_title $like_op %s) $andor_op ($wpdb->posts.post_content $like_op %s) $andor_op (custom.meta_value COLLATE utf8_unicode_ci $like_op %s))", $like, $like, $like );
			    $searchand = ' AND ';
		    }
		}
		if ( ! empty( $search ) ) {
			$search = " AND ({$search}) ";
			if ( ! is_user_logged_in() )
				$search .= " AND ($wpdb->posts.post_password = '') ";
		}
		return $search;
	}
	else {
		return $orig_search;
	}
}
add_filter( 'posts_search', 'posts_search_custom_fields', 10, 2 );

/******************************
 * カスタムフィールド検索用のJOIN
******************************/
function posts_join_custom_fields( $join, $query ) {
	if ( $query->is_search() && $query->is_main_query() && ! is_admin() ) {
		// group_concat()したmeta_valueをJOINすることでレコードの重複を除きつつ検索しやすくする
		global $wpdb;
		$join .= " INNER JOIN ( ";
		$join .= " SELECT post_id, group_concat( meta_value separator ' ') AS meta_value FROM $wpdb->postmeta ";
		// $join .= " WHERE meta_key IN ( 'test' ) ";
		$join .= " GROUP BY post_id ";
		$join .= " ) AS custom ON ($wpdb->posts.ID = custom.post_id) ";
	}
	return $join;
}
add_filter( 'posts_join', 'posts_join_custom_fields', 10, 2 );

// search-投稿タイプ名.php” というテンプレートが使えるように
// テンプレート読み込みフィルターをカスタマイズ
add_filter('template_include','custom_search_template');
function custom_search_template($template){
	// 検索結果の時
	if ( is_search() ) {
		// 表示する投稿タイプを取得
		$post_types = get_query_var('post_type');
		// search_{$post_type}.php の読み込みルールを追加
		foreach ( (array) $post_types as $post_type )
		$templates[] = "archive-{$post_type}.php";
		$templates[] = 'search.php';
		$template = get_query_template('search',$templates);
	}
	return $template;
}

function search_template_redirect() {
	global $wp_query;
	$wp_query->is_search = true;
	$wp_query->is_home = false;
	if (file_exists(TEMPLATEPATH . '/seach_job.php')) { 
		include(TEMPLATEPATH . '/seach_job.php');
	}
	exit;
}
if (isset($_GET['s']) && $_GET['s'] == false) {
	add_action('template_redirect', 'search_template_redirect');
}


/******************************
 * 最新の固定ページや投稿のタイトルをリスト表示するショートコードです。
******************************/
function recent_posts_shortcode( $atts ) {
	global $post;
	$atts = shortcode_atts( array(
		// クラス
		'class' => 'recent-posts',
		// 件数
		'count' => '10',
		// 投稿タイプ 投稿のみの場合は “post”、固定ページのみの場合は “page” 等を指定します
		'post_type' => 'any',
		// カテゴリー名（スラッグ名）
		'category' => '',
		// 除外する投稿の ID。複数指定する場合はカンマ (,) で区切りで指定
		'exclude' => '',
		// 投稿をソートする項目 ”date” または “modified” 
		'orderby' => 'modified',
		// 日付フォーマット
		'date_format' => '',
		// 「NEW!」マーク（recent-posts-new クラス）を付加する期間
		'new_days' => '10'
	), $atts, 'recent_posts' );

	$args = array(
		'showposts' => $atts['count'],
		'post_type' => $atts['post_type'],
		'orderby' => $atts['orderby'],
		// order=ASC - 昇順。小さい値から大きい値の順。 * order=DESC - 降順。大きい値から小さい値の順
		'order' => 'DESC',
		'category_name' => $atts['category'],
		'exclude' => $atts['exclude'],
	);
	$myposts = get_posts( $args );

	$new_days = $atts['new_days'];
	$retour = '<dl' . ( $atts['class'] != '' ? ' class="' . $atts['class'] . '"' : '' ) . '>';
	foreach ( $myposts as $post ) {
		setup_postdata( $post );
		$today = date( 'U' );
		$entry = $atts['orderby'] == 'modified' ? get_the_date( 'U' ) : get_the_date( 'U' );
		//$entry = $atts['orderby'] == 'modified' ? get_the_modified_date( 'U' ) : get_the_date( 'U' );
		$diff = date( 'U', ( $today - $entry ) ) / 86400;
		$retour .= '<dt>' . ( $atts['orderby'] == 'modified' ? get_the_date( $atts['date_format'] ) : get_the_date( $atts['date_format'] ) ) . '</dt>';
		//$retour .= '<dt>' . ( $atts['orderby'] == 'modified' ? get_the_modified_date( $atts['date_format'] ) : get_the_date( $atts['date_format'] ) ) . '</dt>';
		$retour .= '<dd>' . ( $new_days > $diff ? '<span class="recent-posts-new">NEW!</span>' : '' ) . '<a href="' . get_permalink() . '">' . the_title( '', '', false ) . '</a></dd><hr>';
	}
	wp_reset_postdata();
	$retour .= '</dl>' . "\n";

	return $retour;
}

add_shortcode( 'recent_posts', 'recent_posts_shortcode' );

function acf_set_featured_image( $value, $post_id, $field ) {
	if($value != '') {
		add_post_meta($post_id, '_thumbnail_id', $value);
	}
    return $value;
}
add_filter('acf/update_value/name=photo01', 'acf_set_featured_image', 10, 3);
// スペースが自動で取り除かれる機能をオフ
add_filter('tiny_mce_before_init', 'my_tiny_mce_before_init_filter',10,3);
function my_tiny_mce_before_init_filter( $init_array ) {
	$init_array['remove_linebreaks'] = false;
	return $init_array;
}


/******************************
 * 管理画面にCSSを追加
******************************/
function load_custom_wp_admin_style() {
	// 'custom' はCSSにつける名前、
	// get_stylesheet_directory_uri() . '/admin.css' はCSSファイルの場所です。
	// ( get_stylesheet_directory_uri() はテンプレートのディレクトリのURL )
	wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/admin.css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

