<?php 
	get_header(); 
	
	while( have_posts() ){ the_post();
?>
<div class="gdlr-content">

	<?php 
		global $gdlr_sidebar, $theme_option, $gdlr_post_option, $gdlr_is_ajax;
		
		if( empty($gdlr_post_option['sidebar']) || $gdlr_post_option['sidebar'] == 'default-sidebar' ){
			$gdlr_sidebar = array(
				'type'=>$theme_option['post-sidebar-template'],
				'left-sidebar'=>$theme_option['post-sidebar-left'], 
				'right-sidebar'=>$theme_option['post-sidebar-right']
			); 
		}else{
			$gdlr_sidebar = array(
				'type'=>$gdlr_post_option['sidebar'],
				'left-sidebar'=>$gdlr_post_option['left-sidebar'], 
				'right-sidebar'=>$gdlr_post_option['right-sidebar']
			); 				
		}
		$gdlr_sidebar = gdlr_get_sidebar_class($gdlr_sidebar);
	?>
	<div class="with-sidebar-wrapper">
		<div class="with-sidebar-container container gdlr-class-<?php echo $gdlr_sidebar['type']; ?>">
			<div class="with-sidebar-left twelve columns>
				<div class="with-sidebar-content <?php echo $gdlr_sidebar['center']; ?> columns">
					<div class="gdlr-item gdlr-portfolio-<?php echo $theme_option['portfolio-page-style']; ?> gdlr-item-start-content">
						<div id="portfolio-<?php the_ID(); ?>" <?php post_class(); ?>>
							<!--<?php 
								$thumbnail = gdlr_get_portfolio_thumbnail($gdlr_post_option, $theme_option['portfolio-thumbnail-size']);
								if(!empty($thumbnail)){
									echo '<div class="gdlr-portfolio-thumbnail ' . gdlr_get_portfolio_thumbnail_class($gdlr_post_option) . '">';
									echo $thumbnail;
									echo '</div>';
								}
							?>-->

							<div class="gdlr-portfolio-content">

								<div class="gdlr-portfolio-details twelve columns">
									<div class="four columns">
										<?php 
											$thumbnail = gdlr_get_portfolio_thumbnail($gdlr_post_option, $theme_option['portfolio-thumbnail-size']);
											if(!empty($thumbnail)){
												echo '<div class="gdlr-portfolio-thumbnail ' . gdlr_get_portfolio_thumbnail_class($gdlr_post_option) . '">';
												echo $thumbnail;
												echo '</div>';
											}
										?>
									</div>
									<div class="eight columns">
										<div class="twelve columns">
											<?php 
												echo gdlr_get_portfolio_info(array('type'), $gdlr_post_option, false); 
											?>
										</div>
										<div class="six columns">
											<?php 
												echo gdlr_get_portfolio_info(array('date'), $gdlr_post_option, false); 
											?>		
										</div>
										<div class="six columns">
											<?php 
												echo gdlr_get_portfolio_info(array('location'), $gdlr_post_option, false); 
											?>		
										</div>
									</div>
								</div>
							
								<div class="gdlr-portfolio-description twelve columns">
									<div class="content">
										<?php 
											the_content(); 
											wp_link_pages( array( 
												'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'gdlr-portfolio' ) . '</span>', 
												'after' => '</div>', 
												'link_before' => '<span>', 
												'link_after' => '</span>' ));
										?>
									</div>
								</div>	
									
								<div class="gdlr-portfolio-info twelve columns">
									<div class="six columns">
										<?php 
											echo gdlr_get_portfolio_info(array('info'), $gdlr_post_option, false); 
										?>
									</div>
									<div class="six columns">
										<?php 
											echo gdlr_get_portfolio_info(array('contact'), $gdlr_post_option, false); 
										?>
									</div>
								</div>

								<!--<div class="gdlr-portfolio-register twelve columns">
									<div class="twelve columns">
										<a class="gdlr-button medium" href="http://www.goodlayers.com" target="_self" style="color:#ffffff; background-color:#4fbed6;">Inscription</a>
									</div>
								</div>	-->

								<div class="clear"></div>
							</div>	
						</div><!-- #portfolio -->
						<?php //  ?>
						
						<div class="clear"></div>
						<?php 
							// print portfolio comment
							if( $theme_option['portfolio-comment'] == 'enable' ){
								comments_template( '', true ); 
							} 							
						?>		
					</div>
					
					<?php
						// print related portfolio
						if( false ){	
						// if( !$gdlr_is_ajax && is_single() && $theme_option['portfolio-related'] == 'enable' ){	
							global $gdlr_related_section; $gdlr_related_section = true;
						
							$args = array('post_type' => 'portfolio', 'suppress_filters' => false);
							$args['posts_per_page'] = (empty($theme_option['related-portfolio-num-fetch']))? '3': $theme_option['related-portfolio-num-fetch'];
							$args['post__not_in'] = array(get_the_ID());
							
							$portfolio_term = get_the_terms(get_the_ID(), 'portfolio_tag');
							$portfolio_tags = array();
							if( !empty($portfolio_term) ){
								foreach( $portfolio_term as $term ){
									$portfolio_tags[] = $term->term_id;
								}
								$args['tax_query'] = array(array('terms'=>$portfolio_tags, 'taxonomy'=>'portfolio_tag', 'field'=>'id'));
							} 
							$query = new WP_Query( $args );

							if( !empty($query) ){
								echo '<div class="gdlr-related-portfolio portfolio-item-holder">';
								echo '<h4 class="head">' . __('Related Projects', 'gdlr-portfolio') . '</h4>';
								if( $theme_option['related-portfolio-style'] == 'classic-portfolio' ){
									global $gdlr_excerpt_length; $gdlr_excerpt_length = $theme_option['related-portfolio-num-excerpt'];
									add_filter('excerpt_length', 'gdlr_set_excerpt_length');

									echo gdlr_get_classic_portfolio($query, $theme_option['related-portfolio-size'], 
										$theme_option['related-portfolio-thumbnail-size'], 'fitRows' );
									
									remove_filter('excerpt_length', 'gdlr_set_excerpt_length');	
								}else{
									echo gdlr_get_modern_portfolio($query, $theme_option['related-portfolio-size'], 
										$theme_option['related-portfolio-thumbnail-size'], 'fitRows' );								
								}
								echo '<div class="clear"></div>';
								echo '</div>'; 
							}
							$gdlr_related_section = false;
						}					
					?>
				</div>
				<!--<?php get_sidebar('left'); ?>-->
				<div class="clear"></div>
			</div>
		
		</div>				
	</div>		

	<div class="below-sidebar-wrapper">
		<section id="content-section-2">
			<div class="gdlr-color-wrapper gdlr-show-all no-skin" style="background-color: #dbdbdb; ">
				<div class="container">
					<div class="gdlr-stunning-text-ux gdlr-ux">
						<div class="gdlr-item gdlr-stunning-text-item gdlr-button-on type-center">
							<a class="stunning-text-button gdlr-button with-border" href="http://localhost/mission_loc2/inscription/" target="_blank">Inscription</a>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
		</section>
	</div>

</div><!-- gdlr-content -->
<?php
	}
	
	get_footer(); 
?>