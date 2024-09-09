<?php 

function title_filter($where, &$wp_query){
	    global $wpdb;
		if($keyword = $wp_query->get( 'search_prod_title' )){
	        /*using the esc_like() in here instead of other esc_sql()*/
	        $keyword = $wpdb->esc_like($keyword);
	        $keyword = ' \'%' . $keyword . '%\'';
	        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE '.$keyword;
	    }
	    return $where;
	}
?>
<?php
function Course_display_search_form() {
	ob_start();
?>
<section class="sec_search_advanced">
	<div class="container">
	  <div class="row">
	   <div class="col-md-12">
		   
				<!--form class="frm_toggle" action="<?php the_permalink(); ?>" method="get"-->
				<form class="search_bar frm_toggle" action="<?php echo esc_url(''); ?>/tim-kiem-khoa-hoc/" method="get" autocomplete="off">
				<!-- <form action="<?php echo esc_url(''); ?>/advanced-search-demo/" method="get" autocomplete="off"> -->	
					<div class="home-search-control">
						<div class="search-box-wrapper">

						<svg width="20" height="20" fill="#333" stroke="unset" class="icon-input-search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50"><path d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z"></path></svg>

							<input type="text" name="keyword" placeholder="Nhập khóa học cần tìm..." id="keyword" class="input_search" onkeyup="fetch_search()">

							<button class="btn btn_sp__search text-white" style="background-color: transparent;">

								<svg width="18" height="18" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.41072 4H21.4107" stroke="#232e84"></path><path d="M1.41072 12H21.4107" stroke="#232e84"></path><path d="M1.41072 19H21.4107" stroke="#232e84"></path><circle cx="17" cy="3.5" r="2.75" fill="#232e84" stroke="white"></circle><circle cx="6" cy="11.5" r="2.75" fill="#232e84" stroke="white"></circle><circle cx="13" cy="19.5" r="2.75" fill="#232e84" stroke="white"></circle></svg>

							</button>
							<button class="btn_search ">Tìm kiếm </button>

						</div>	

						<div class="second_area searchBar__expand-wrapper ">

							<div class="columns justify-between">

								<div class="column is-4">

									<div class="recent-search-wrapper">

										<div class="searchBar__expand-heading">
											<strong class="block-title">Tìm kiếm gần đây</strong>
										</div>
										<div class="searchBar__expand-no-recents">
											<!-- Tìm kiếm gần đây -->
											<!-- <?php echo do_shortcode( '[cookie_demo]' ); ?> -->
										</div>
										<div class="title-suggestion-wrapper">
											<div class="search_result" id="datafetch">
												<ul>
													<li>Please wait..</li>
												</ul>
											</div>
										</div>
									</div>
								</div>

								<div class="column is-8">
									<div class="hot-keyword-wrapper">
										<div class="searchBar__expand-heading"><strong class="block-title">	</strong></div>
										<a class="searchBar__tag" href="https://sylvanlearning.edu.vn/chuong-trinh/chuong-trinh-tieng-anh/tieng-anh-mau-giao/" target="_blank" title="Tieng anh mau giao"><span class="tag searchBar__tag is-large searchBar__hot-keyword-tag"><span class="tag-keyword">Tiếng anh mẫu giáo</span></span></a>
										<a class="searchBar__tag" href="https://sylvanlearning.edu.vn/chuong-trinh/chuong-trinh-tieng-anh/tieng-anh-thieu-nien/" target="_blank" title=""><span class="tag searchBar__tag is-large searchBar__hot-keyword-tag"><span class="tag-keyword">Tiếng anh thiếu niên</span></span></a>
										<a class="searchBar__tag" href="https://sylvanlearning.edu.vn/chuong-trinh/chuong-trinh-tieng-anh/tieng-anh-thieu-nhi/" target="_blank" title="Tiếng anh thiếu niên"><span class="tag searchBar__tag is-large searchBar__hot-keyword-tag"><span class="tag-keyword">Tiếng anh thiếu nhi</span></span></a>
										<a class="searchBar__tag" href="https://sylvanlearning.edu.vn/chuong-trinh/chuong-trinh-luyen-thi/luyen-thi-ielts/" target="_blank" title=""><span class="tag searchBar__tag is-large searchBar__hot-keyword-tag"><span class="tag-keyword">luyện thi IELTS</span></span></a>
										<a class="searchBar__tag" href="https://sylvanlearning.edu.vn/chuong-trinh/chuong-trinh-toan-tu-duy/" target="_blank" title=""><span class="tag searchBar__tag is-large searchBar__hot-keyword-tag"><span class="tag-keyword">Toán Tư Duy</span></span></a>
										<a class="searchBar__tag" href="https://sylvanlearning.edu.vn/chuong-trinh/khoa-hoc-ngan-han/luyen-thi-cambridge/" target="_blank" title=""><span class="tag searchBar__tag is-large searchBar__hot-keyword-tag"><span class="tag-keyword">Luyện Thị Cambridge</span></span></a>
										<a class="searchBar__tag" href="https://sylvanlearning.edu.vn/chuong-trinh/chuong-trinh-stem/chinh-phuc-robot-robotics/" target="_blank" title=""><span class="tag searchBar__tag is-large searchBar__hot-keyword-tag"><span class="tag-keyword">học robotics</span></span></a>
										<a class="searchBar__tag" href="https://sylvanlearning.edu.vn/chuong-trinh/khoa-hoc-ngan-han/sylvan-phonics/" target="_blank" title=""><span class="tag searchBar__tag is-large searchBar__hot-keyword-tag"><span class="tag-keyword">Sylvan phonics</span></span></a>
										<a class="searchBar__tag" href="https://sylvanlearning.edu.vn/chuong-trinh/chuong-trinh-stem/ky-su-xay-dung-engineering/" target="_blank" title=""><span class="tag searchBar__tag is-large searchBar__hot-keyword-tag"><span class="tag-keyword">Kỹ sư xây dựng</span></span></a>
										<a class="searchBar__tag" href="https://sylvanlearning.edu.vn/chuong-trinh/chuong-trinh-stem/sieu-nhi-lap-trinh-coding/" target="_blank" title=""><span class="tag searchBar__tag is-large searchBar__hot-keyword-tag"><span class="tag-keyword">Siêu nhí lập trình </span></span></a>
									</div>
								</div> 

							</div>   
						</div>
						<a href="#0" class="close cd-text-replace">Thoát</a>
					</div>
					<div class="home-filte">
						<div class="search-filter form-group ">
							<select class="form-control custom-select" id="mainCourse" name="chuongtrinh">
								<option value="">Chọn nội dung học</option>
								<option value="Tiếng Anh">Tiếng Anh</option>
								<option value="Tranh Biện Tiếng Anh">Tranh Biện Tiếng Anh</option>
								<option value="Toán tư duy">Toán tư duy</option>
								<option value="STEM">STEM</option>
								<option value="Luyện thi">Luyện thi</option>
								<option value="Sylvan 1-on-1 program">Sylvan 1-ON-1</option>
								<option value="Hợp tác doanh nghiệp">Hợp tác Doanh nghiệp</option>
								<option value="Hợp tác Trường học">Hợp tác Trường học</option>
							</select>
						</div>
						<div class="search-filter form-group ">
							<select class="form-control custom-select" name="tuoibe">
								<option value="">Chọn độ tuổi</option>
								<option value="3 tuổi, 4 tuổi, 5 tuổi,6 tuổi">3 - 6 tuổi</option>
								<option value="7 tuổi, 8 tuổi, 9 tuổi,10 tuổi, 11 tuổi">7 - 11 tuổi</option>
								<option value="12 tuổi, 13 tuổi, 14 tuổi, 15 tuổi">12 - 15 tuổi</option>
								<option value="trên 15 tuổi"> trên 15 tuổi </option>			
							</select>
						</div>
						<div class="search-filter form-group ">
							<select id="mainLearningneeds" class="form-control custom-select" name="nhu_cau_hoc">
								<option value="">Chọn nhu cầu</option>
								<option value="Phát âm" data-tag="Tiếng Anh">Phát âm</option>
								<option value="Ngữ pháp" data-tag="Tiếng Anh">Ngữ pháp</option>
								<option value="Giao tiếp" data-tag="Tiếng Anh">Giao tiếp</option>
								<option value="Tổng quát 4 kỹ năng" data-tag="Tiếng Anh">Tổng quát 4 kỹ năng</option>
								
								<option value="Ôn luyện Cambridge" data-tag="Luyện thi">Ôn luyện Cambridge</option>
								<option value="Ôn luyện IELTS" data-tag="Luyện thi">Ôn luyện IELTS</option>
						
								<option value="Chinh phục Robot" data-tag="STEM">Chinh phục Robot</option>
								<option value="Siêu lập trình viên" data-tag="STEM">Siêu lập trình viên</option>
								<option value="Kỹ sư xây dựng" data-tag="STEM">Kỹ sư xây dựng</option>

								<option value="Toán tiền tiểu học" data-tag="Toán tư duy">Toán tiền tiểu học</option>
								<option value="Toán tiểu học" data-tag="Toán tư duy">Toán tiểu học</option>

								<option value="Ngữ pháp" data-tag="Sylvan 1on1 program">Ngữ pháp</option>

								<option value="Phát âm" data-tag="Sylvan 1on1 program">Phát âm</option>

								<option value="Học thử" data-tag="Sylvan 1on1 program">Học thử</option>

								<option value="Ôn luyện Cambridge" data-tag="Sylvan 1on1 program">Ôn luyện Cambridge</option>

								<option value="Ôn luyện IELTS" data-tag="Sylvan 1on1 program">Ôn luyện IELTS</option>

								<option value="Tiếng anh thuyết trình" data-tag="Sylvan 1on1 program">Tiếng anh thuyết trình</option>

								<option value="Tiếng anh tranh biện" data-tag="Sylvan 1on1 program">Tiếng anh tranh biện</option>

								<option value="Tiếng anh giao tiếp" data-tag="Sylvan 1on1 program">Tiếng anh giao tiếp</option>

								<option value="Tiếng anh viết" data-tag="Sylvan 1on1 program">Tiếng anh viết</option>

								<option value="Ôn luyện toán tiểu học" data-tag="Sylvan 1on1 program">Ôn luyện toán tiểu học</option>

								<option value="Tiếng anh tổng quát 4 kỹ năng " data-tag="Sylvan 1on1 program">Tiếng anh tổng quát 4 kỹ năng</option>			

							</select>

						</div>

						<div class="search-filter form-group ">
							<select class="form-control custom-select" name="hinh_thuc_hoc">
								<option value="">Chọn hình thức học</option>
								<option value="Trung tâm">Tại trung tâm</option>
								<option value="Online">Online</option>
							</select>
						</div>
					</div>
				</form>
			<!--?php return ob_get_clean(); ?-->
		   </div>
		</div> <!--- ./row -->
	</div><!--- ./container -->
 </section>
 <div class="cd-cover-layer"></div> <!-- cover main content when search form is open -->
<?php
	return ob_get_clean();
	}
add_shortcode('display_search_form', 'Course_display_search_form');	
?>
<?php 
// start basic_display_search_course
function basic_display_search_course() { 
?>

<?php
	}

add_shortcode('display_search_course', 'basic_display_search_course');
?>
<?php

/*

 ==================

 Ajax Search

======================	 

*/

// add the ajax fetch js

add_action( 'wp_footer', 'ajax_fetch' );

function ajax_fetch() {

?>

<script type="text/javascript">

function fetch_search(){



    jQuery.ajax({

        url: '<?php echo admin_url('admin-ajax.php'); ?>',

        type: 'post',

        data: { action: 'data_fetch', keyword: jQuery('#keyword').val() },

        success: function(data) {

            jQuery('#datafetch').html( data );

        }

    });

    return false;



}

</script>



<?php

}



// the ajax function

add_action('wp_ajax_data_fetch' , 'data_fetch');

add_action('wp_ajax_nopriv_data_fetch','data_fetch');

function data_fetch(){

 //do bên js để dạng json nên giá trị trả về dùng phải encode

    //$search_keyword = esc_attr( $_POST['keyword'] );



    $the_query = new WP_Query( 

        array( 'posts_per_page' => -1, 

        's' => esc_attr( $_POST['keyword'] ), 

        'post_type' => array('page') ,

        'post__in' => array(

						434,

						436,

						438,

						407,

						446,

						450,

						448,

						452,

						455,

						457,

						78141,

						71893,

						71912,

						75924,

						71925,

						71931,

						75942,

						61978,

						83486,

		) ,

		'post_status' => 'publish',

		'orderby'=> 'post_date', 

    	'order' => 'DESC'

        //'post__not_in' => array(3, 21,29,32 ) ,

        //'post_parent' => 163,

        ) 

    );

    if( $the_query->have_posts() ) :

        echo '<ul class="lst_search">';

        while( $the_query->have_posts() ): $the_query->the_post(); ?>

        

            <li><a target="_bank" href="<?php echo esc_url( post_permalink() ); ?>"><?php the_title();?></a></li>



        <?php endwhile;

       echo '</ul>';

        wp_reset_postdata();  

    endif;



    die();

}

add_action('init', 'cas_autocomplete_init');



function cas_autocomplete_init()

{

 wp_enqueue_style( 'cas_custom_css', get_template_directory_uri() . '/assets/css/mysearch.css', array(), '1.1', 'all');



  wp_enqueue_script( 'cas_custom_js', get_template_directory_uri() . '/assets/js/Custom.js', array ( 'jquery' ), '', true);

  // check submit sending

  wp_enqueue_script( 'cas_custom_frmct7', get_template_directory_uri() . '/assets/js/utm_frmcontact7.js', array ( 'jquery' ), '', true);

  

  wp_enqueue_style('cas_custom_css');

  wp_enqueue_script('cas_custom_js');

  wp_enqueue_script('cas_custom_frmct7');

}


function custom_excerpt_more( $more ) {

    return '';//you can change this to whatever you want

}

add_filter( 'excerpt_more', 'custom_excerpt_more' );



function wpdocs_custom_excerpt_length( $length ) {

    return 25;

}

add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );



// Image size for single posts

add_image_size( 'single-post-thumbnail', 748, 500 );