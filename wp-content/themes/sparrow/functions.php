<?php 

require_once 'inc/custom_walker.php';
//add_filter('show_admin_bar', '__return_false');

add_theme_support('post-thumbnails');
add_theme_support('title-tag');

add_action('wp_enqueue_scripts', 'sparrow_styles');
add_action('wp_enqueue_scripts', 'sparrow_scripts');
add_action('after_setup_theme', 'sparrow_register_nav_menu');
add_action('widgets_init', 'sparrow_register_widgets');
add_action( 'init', 'register_post_types' );

if ( function_exists('add_image_size')) {
	add_image_size('thumb_gallery', 54, 54);
	add_image_size('thumb_work', 400, 9999);
	add_image_size('thumb_slider', 9999, 700);
	add_image_size('thumb_post', 1300, 500, true);
}

add_filter( 'image_size_names_choose', 'my_custom_sizes' );
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
add_filter('excerpt_more', 'new_excerpt_more');


function register_post_types(){
	register_post_type('portfolio', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Portfolio', // основное название для типа записи
			'singular_name'      => 'Portfolio', // название для одной записи этого типа
			'add_new'            => 'Add work', // для добавления новой записи
			'add_new_item'       => 'Add new work', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit work', // для редактирования типа записи
			'new_item'           => 'New work', // текст новой записи
			'view_item'          => 'View work', // для просмотра записи этого типа.
			'search_items'       => 'Search work', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Portfolio menu', // название меню
		),
		'description'         => 'Works in portfolio',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => false, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => null, // зависит от public
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => null, 
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title','editor', 'author', 'thumbnail', 'excerpt'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array('skills'),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );

	register_post_type('extra_parts', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Extra part', // основное название для типа записи
			'singular_name'      => 'Extra part', // название для одной записи этого типа
			'add_new'            => 'Add extra part', // для добавления новой записи
			'add_new_item'       => 'Add new extra part', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit extra part', // для редактирования типа записи
			'new_item'           => 'New extra part', // текст новой записи
			'view_item'          => 'View extra part', // для просмотра записи этого типа.
			'search_items'       => 'Search extra part', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Extra parts', // название меню
		),
		'description'         => 'Extra infomation blocks',
		'public'              => false,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => null, // зависит от public
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => null, 
		'hierarchical'        => false,
		'supports'            => array('title','editor'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );


	register_post_type('advantages', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Advantages', // основное название для типа записи
			'singular_name'      => 'Advantage', // название для одной записи этого типа
			'add_new'            => 'Add advantage', // для добавления новой записи
			'add_new_item'       => 'Add new advantage', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit advantage', // для редактирования типа записи
			'new_item'           => 'New advantage', // текст новой записи
			'view_item'          => 'View advantage', // для просмотра записи этого типа.
			'search_items'       => 'Search advantage', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Advantages', // название меню
		),
		'description'         => 'Advantages section',
		'public'              => false,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => null, // зависит от public
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => null, 
		'hierarchical'        => false,
		'supports'            => array('title','editor'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );

	register_post_type('front_slider', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Front slider', // основное название для типа записи
			'singular_name'      => 'Slider', // название для одной записи этого типа
			'add_new'            => 'Add slide', // для добавления новой записи
			'add_new_item'       => 'Add new slide', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit slide', // для редактирования типа записи
			'new_item'           => 'New slide', // текст новой записи
			'view_item'          => 'View slide', // для просмотра записи этого типа.
			'search_items'       => 'Search slide', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Front slider', // название меню
		),
		'description'         => 'Front slider section',
		'public'              => false,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => null, // зависит от public
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => null, 
		'hierarchical'        => false,
		'supports'            => array('title','editor', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );

	register_taxonomy('skills', array('portfolio'), array(
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Skill',
			'singular_name'     => 'Skill',
			'search_items'      => 'Search Skills',
			'all_items'         => 'All Skill',
			'view_item '        => 'View Skill',
			'parent_item'       => 'Parent Skill',
			'parent_item_colon' => 'Parent Skill:',
			'edit_item'         => 'Edit Skill',
			'update_item'       => 'Update Skill',
			'add_new_item'      => 'Add New Skill',
			'new_item_name'     => 'New Skill Name',
			'menu_name'         => 'Skills',
		),
		'description'           => 'Creating skills', // описание таксономии
		'public'                => true,
		'public_queryable'      => null,
		'hierarchical'          => false,
		'rewrite'               => true,
	) );
}

function new_excerpt_more($more){
	global $post;
    return '<br><a class="more-link" href="'. get_permalink($post) . '">Read More<i class="fa fa-arrow-circle-o-right"></i></a>';
}

function my_navigation_template($template, $class){
	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

function my_custom_sizes( $sizes ) {
	return array_merge( $sizes, [
	    'thumb_gallery' => 'Thumb gallery',
    ]);
}



function sparrow_register_widgets(){
	register_sidebar([
		'name'          => 'Right Sidebar',
		'id'            => "right_sidebar",
		'description'   => 'Какое-то описание',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h5 class="widgettitle">',
		'after_title'   => "</h5>\n",
    ]);
}

function sparrow_register_nav_menu()
{
    register_nav_menu('top_menu', 'Top menu');
    register_nav_menu('footer_menu', 'Bottom menu');
    register_nav_menu('social_menu', 'Social menu');
}

function sparrow_styles()
{
    wp_enqueue_style('default', get_template_directory_uri() . '/assets/css/default.css');
    wp_enqueue_style('layout', get_template_directory_uri() . '/assets/css/layout.css');
    wp_enqueue_style('fonts', get_template_directory_uri() . '/assets/css/fonts.css');
    
	wp_enqueue_style('styles', get_stylesheet_uri());
	wp_enqueue_style('media-queries', get_template_directory_uri() . '/assets/css/media-queries.css');
}

function sparrow_scripts()
{
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js');
    }
    wp_enqueue_script('flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js', ['jquery']);
    wp_enqueue_script('doubletaptogo', get_template_directory_uri() . '/assets/js/doubletaptogo.js', ['jquery']);
    wp_enqueue_script('init', get_template_directory_uri() . '/assets/js/init.js', ['jquery']);
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/modernizr.js', ['jquery']);
}

function dd($data){
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}


function mytheme_comment( $comment, $args, $depth ) {

	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}

	$classes = ' ' . comment_class( empty( $args['has_children'] ) ? '' : 'parent', null, null, false );
	?>

	<<?php echo $tag, $classes; ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) { ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
	} ?>

	<div class="comment-author vcard">
		<?php
		if ( $args['avatar_size'] != 0 ) {
			echo get_avatar( $comment, $args['avatar_size'] );
		}
		printf(
			__( '<cite class="fn">%s</cite> <span class="says"></span>' ),
			get_comment_author_link()
		);
		?>
	</div>

	<?php if ( $comment->comment_approved == '0' ) { ?>
		<em class="comment-awaiting-moderation">
			<?php _e( 'Your comment is awaiting moderation.' ); ?>
		</em><br/>
	<?php } ?>

	<div class="comment-meta commentmetadata">
		<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
			printf(
				__( '%1$s at %2$s' ),
				get_comment_date("M n, Y"),
				get_comment_time('H:i')
            ); ?>
        </a>
        <span> / </span>
        <?php
		    comment_reply_link(
                array_merge(
                    $args,
                    array(
                        'add_below' => $add_below,
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth']
                    )
                )
		    ); ?>
        <div class="comment-text">
            <?php edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
        </div>
	</div>

	<?php comment_text(); ?>

	<div class="reply">
		
	</div>

	<?php if ( 'div' != $args['style'] ) { ?>
		</div>
	<?php }
}


function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
