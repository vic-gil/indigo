<?php
/**
 * Reporte_Indigo_Post_Types Class
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 *
 */

/**
 * Una clase que crea un metabox que adjunta entradas en otra entrada
**/
class Reporte_Indigo_Busqueda {
	
	static function ri_add(){
		$post_types 	= array(
			'post',
			'ri-especial'
		);

		add_meta_box(
			'ri-search-posts-id',
			'Notas del tema',
			array('Reporte_Indigo_Busqueda', 'ri_html'),
			$post_types,
			'normal',
			'default'
		);
	}

	static function ri_html($post){
		wp_nonce_field( '_serach_posts_nonce', 'search_posts_nonce' );

		self::styles();
		self::scripts();

		$posts_especial = self::ri_get('array_posts_especial'); ?>

		<style type="text/css">
			.autocomplete-items {
			    position: absolute;
			    border: 1px solid #d4d4d4;
			    border-bottom: none;
			    border-top: none;
			    z-index: 99;
			    top: 100%;
			    left: 0;
			    right: 0;
			    height: 400px;
			    overflow-y: scroll;
			    border-bottom: 1px solid #d4d4d4;
			   	top: 31px;
    			width: 98%;
    			left: 15px;
			}

			.autocomplete-items div {
			    padding: 10px;
			    cursor: pointer;
			    background-color: #fff;
			    border-bottom: 1px solid #d4d4d4;
			}

			.autocomplete-items div:hover {
			    background-color: #e9e9e9;
			}
			.autocomplete-active {
			    background-color: DodgerBlue !important;
			    color: #ffffff;
			}

			.dd{
			  width: 100% !important;
			  max-width: 100% !important;
			}

			.dd-item{
			  position: relative;
			  padding: 5px 0px !important;
			  box-sizing: border-box;
			}

			.dd-handle{
			  float: left !important;
			  margin: 0px !important;
			}

			.dd-content{
			  height: 30px;
			  padding: 5px 10px;
			  box-sizing: border-box;
			}

			.dd-content span:first-child{
			  margin-left: 15px;
			}

			.dd-handle-rv{
			  float: left;
			  display: inline-block;
			  margin: 0px;
			  height: 30px;
			  padding: 5px 10px;
			  text-decoration: none;
			  box-sizing: border-box;
			  margin-left: 10px;
			  cursor: pointer;
			  border: 1px solid #ccc;
			  background: #fafafa;
			  border-radius: 3px;
			}

			.chk-hide{
				display: none !important;
			}
		</style>
		<div class="autocomplete position-relative">
		    <input 	type="text" 
					name="_post_title_" 
					id="_post_title_" 
					value=""
					placeholder="título..."
					aria-label="título..." 
					autocomplete="off"
					style="width: 100%;"
					aria-describedby="title_help">
		</div>
		<div style="width: 100%; text-align: right;">
			<small id="title_help">* Escribe mínimo 5 caracteres</small>
		</div>

		<div>
			<div id="nestable-top" class="dd">
			    <ol class="dd-list dd-list-handle-btn">
			    	<?php if(is_array($posts_especial)){
			    		foreach ($posts_especial as $kp => $p) {
			    			$ID 		= $p->ID;
			    			$post_title = $p->post_title;
			    			$total 		= $kp + 1; ?>
			    		
			    		<li class="dd-item" data-id="<?=$ID;?>" id="dd-item-<?=$ID;?>">
							<input type="checkbox" class="chk-hide" id="array_posts_especial" name="array_posts_especial[]" value="<?=$ID;?>" checked>
						    <div class="dd-handle dd-handle-btn"><i class="fas fa-sort"></i></div>
						    <div class="dd-handle-rv"><i class="fas fa-times text-danger"></i></div> 
						    <div class="dd-content bord-all">
						    	<span class="label label-primary li-position"><?=$total;?></span>
						    	<span id="txt-title"> - <?=$post_title;?></span>
						   	</div>
						</li>

			    	<?php }
			    	} ?>
			    </ol>
			</div>	
		</div>

		<script type="text/javascript">
			var MyAjax 		= '<?=admin_url( "admin-ajax.php" );?>';
			var search_plg 	= {
				init : function () {
					try{
						search_plg.events();
					}catch(err){
						console.log("Error js search_plg.init:");
						console.log(err);
					}
				},
				events : function () {
					try{
						jQuery("#_post_title_").keyup(function(){
							try{
								var str = jQuery(this).val().trim();

								if(str.length <= 5)
									throw "";

								search_plg.search();
							}catch(err){
								console.log("Error js search_plg.events:");
								console.log(err);
							}
						});

						if(jQuery(".dd-item").length > 0){
							jQuery("#nestable-top").nestable({}).on('change', function() {
	    						try{
	    							search_plg.reorder();
	    						}catch(err){
									console.log("Error JS search_plg.append:");
									console.log(err);
								}
							});

							jQuery(".dd-handle-rv").off();
							jQuery(".dd-handle-rv").click(function () {
								try{
									jQuery(this).parents(".dd-item").remove();
									search_plg.reorder();
								}catch(err){
									console.log("Error JS search_plg.append:");
									console.log(err);
								}
							});
						}
					}catch(err){
						console.log("Error js search_plg.events:");
						console.log(err);
					}
				},
				search : function () {
					try{
						var form = [
							{
								"name" 	: "action",
								"value" : "search_posts_mb"
							},
							{
								"name" 	: "title",
								"value" : jQuery("#_post_title_").val().trim()
							}
						];


						jQuery.ajax({
							type 			: "POST",
						    url 			: MyAjax,
						    data 			: form, 
					   		beforeSend 		: function(){ },
						    success 		: function (response) {
						    	try{
						    		response 				= JSON.parse(response);
									if(response.success == 2)
									 	throw response.message;

									search_plg.create(response.posts);
						    	}catch(err){
									console.log("Error JS search_plg.search:");
									console.log(err);
						    	} 
						    },
						    error(xhr,status,error){
						    	console.log("Error JS search_plg.search:");
						    	console.log(xhr.responseText);
						    },
						    complete : function(xhr, status) {

						    }
						});
					}catch(err){
						console.log("Error js search_plg.search:");
						console.log(err);
					}
				},
				create : function (data) {
					try{
						if(!jQuery.isArray(data))
							throw "";

						if(data.length == 0)
							throw "";

						var posts 				= data;

						search_plg.close();

						var a 					= document.createElement("div");
						a.setAttribute("id", "title-autocomplete-list");
						a.setAttribute("class", "autocomplete-items");

						jQuery(".autocomplete").append(a);

						for(var i = 0 in posts){
							var b 				= document.createElement("div");
					      	b.innerHTML 		= "<strong>"+posts[i].post_title+"</strong>";
					      	b.innerHTML 		+= "<input type='hidden' value='" + encodeURIComponent(JSON.stringify(posts[i])) + "'>";

					      	b.addEventListener("click", function(e) {
					      		try{
					      			var json 	= this.getElementsByTagName("input")[0].value.trim();

					      			if(!json.trim())
					      				throw "";

					      			json 		= JSON.parse(decodeURIComponent(json));

					      			jQuery("#_post_title_").val("");
					      			search_plg.close();
					      			search_plg.append(json);
					      		}catch(err){
									console.log("Error JS search_plg.create:");
									console.log(err);
								}
					      	});
					      	a.appendChild(b);
						}
					}catch(err){
						console.log("Error js search_plg.create:");
						console.log(err);
					}
				},
				close : function () {
					try{
						jQuery(".autocomplete-items").remove();
					}catch(err){
						console.log("Error JS search_plg.close:");
						console.log(err);
					}
				},
				append : function (data) {
					try{
						var li 		= jQuery(".dd-list").find("li");
						var total 	= li.length;

						if(total >= 4)
							throw "";

						var ID 		= data.ID;

						if(jQuery(".dd-list").find(("#dd-item-"+ID)).length > 0)
							throw "";

						var li 		= 	'<li class="dd-item" data-id="'+ID+'" id="dd-item-'+ID+'">'+
											'<input type="checkbox" class="chk-hide" id="array_posts_especial" name="array_posts_especial[]" value="'+ID+'" checked>'+
								            '<div class="dd-handle dd-handle-btn"><i class="fas fa-sort"></i></div>'+
								            '<div class="dd-handle-rv"><i class="fas fa-times text-danger"></i></div> '+
								            '<div class="dd-content bord-all">'+
								            	'<span class="label label-primary li-position">'+(total+1)+'</span>'+
								            	'<span id="txt-title"> - '+data.post_title+'</span>'+
								           	'</div>'+
								        '</li>';

						jQuery(".dd-list").append(li);
						jQuery('#nestable-top').nestable('destroy');
						jQuery("#nestable-top").nestable({}).on('change', function() {
	    					try{
	    						search_plg.reorder();
	    					}catch(err){
								console.log("Error JS search_plg.append:");
								console.log(err);
							}
						});

						jQuery(".dd-handle-rv").off();
						jQuery(".dd-handle-rv").click(function () {
							try{
								jQuery(this).parents(".dd-item").remove();
								search_plg.reorder();
							}catch(err){
								console.log("Error JS search_plg.append:");
								console.log(err);
							}
						});
					}catch(err){
						console.log("Error JS search_plg.append:");
						console.log(err);
					}
				},
				reorder : function () {
					try{
						var li 		= jQuery(".dd-list").find("li");
						var total 	= li.length; 

						for(var i = 0; i < total; i++)
							jQuery(li[i]).find(".li-position").html((i+1));
					}catch(err){
						console.log("Error JS search_plg.reorder:");
						console.log(err);
					}
				}
			}

			window.addEventListener('load', (event) => {
				search_plg.init();
			});
		</script>
<?php
	}

	static function ri_get($value){
		global $post;

		$field 				= get_post_meta($post->ID, $value, true);

		if(! empty( $field )){
			$field 			= unserialize($field);
			$field 			= is_array($field) ? stripslashes_deep($field) : stripslashes(wp_kses_decode_entities($field));

			$_posts 		= array();

			foreach ($field as $kf => $f)
				$_posts[] 	= get_post(intval($f));

			$_posts 		= !empty($_posts) ? $_posts : null;

			return $_posts;
		} else {
			return false;
		}
	}

	static function ri_save($post_id){
		if (defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) 
			return;

		if (!isset( $_POST['search_posts_nonce'] ) || ! wp_verify_nonce( $_POST['search_posts_nonce'], '_serach_posts_nonce' )) 
			return;

		if (!current_user_can( 'edit_post', $post_id )) 
			return;

		if (isset( $_POST['array_posts_especial'] )){
			$post_especial = $_POST['array_posts_especial'];
			$post_especial = is_array($post_especial) ? serialize($post_especial) : "";
			update_post_meta($post_id, 'array_posts_especial', $post_especial);
		}
	}

	static function search(){
		$return 			= array();
		try{
			if(!isset($_POST["title"]))
				throw new Exception("Faltan parametros", 1);

			$title 			= $_POST["title"];

			$_date 			= date("Y-m-d H:i:s", strtotime("-3 months"));
			$current 		= date('Y-m-d H:i:s');

			$args 			= array(
				's' 				=> $title,
				'post_type' 		=> 'any',
				'posts_per_page' 	=> 100,
				'post_status'      	=> 'publish',
				'orderby' 			=> 'date',
				'order' 			=> 'DESC', 
				'date_query' => array(
			        array(
			            'after'     => $_date,
			            // 'before'    => $current,
			            // 'inclusive' => true,
			        ),
			    )
			);

			$posts 			= null;
			$posts 			= new WP_Query($args);
			
			if(!$posts->have_posts())
				throw new Exception("No se encontraron notas", 1);

			if(!property_exists($posts, "posts"))
				throw new Exception("No se encontraron notas", 1);
			
			$return 		= array("success" 	=> 1,
									"posts" 	=> $posts->posts);
		}catch(Exception $e){
			$return 		= array("success" 	=> 2,
									"code" 		=> $e->getCode(),
									"message" 	=> $e->getMessage());
		}
		echo json_encode($return); 
		die();
	}

	static function styles(){ 
		try{
			// wp_enqueue_style('bootstrap-min-css', 				'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), '4.3.1', 'all' );
			wp_enqueue_style('fontawesome-min-css', 			'https://use.fontawesome.com/releases/v5.8.2/css/all.css?&display=swap', array(), '5.8.2', 'all' );
			wp_enqueue_style('nestable-list-min-css', 			'//cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.css', array(), '1.6.0', 'all' );

		}catch(Exception $e){
			print_r("<!--".$e->getMessage()."-->");
		}
	}

	static function scripts(){
		try{
			wp_enqueue_script('popper-min-js', 					'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true);
			wp_enqueue_script('bootstrap-min-js', 				'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), '4.3.1', true);
			wp_enqueue_script('nestable-list-min-js', 			'//cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js', array(), '1.6.0', true);
		}catch(Exception $e){
			print_r("<!--".$e->getMessage()."-->");
		}
	}
}

add_action('wp_ajax_search_posts_mb', array('Reporte_Indigo_Busqueda', 'search'));
add_action('add_meta_boxes', array('Reporte_Indigo_Busqueda', 'ri_add'));
add_action('save_post', array('Reporte_Indigo_Busqueda', 'ri_save')); ?>