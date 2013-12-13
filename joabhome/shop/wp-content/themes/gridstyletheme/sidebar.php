        <div id="sidebar">
        
            <div class="search_side_box">
                <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                <INPUT TYPE="image" src="<?php bloginfo('stylesheet_directory'); ?>/images/search-icon.png" class="search_icon" BORDER="0" ALT="Submit Form">
                <input type="text" value="" name="s" id="s" /> 
                </form>
            </div><!--//search_side_box-->
        
            <div class="side_box">
                <ul class="latest_posts_big">

                <?php
                $get_blog_id = get_category_id('blog');
                
                $args = array(
                             'post_type' => 'post',
                             'cat' => $get_blog_id,
                             'posts_per_page' => 3,
							 'orderby' => 'rand'
                             );
                query_posts($args);
                $x = 0;
                while (have_posts()) : the_post(); ?>
                
                  <?php if($x == 2) { ?>
                  <li class="last">
                  <?php } else { ?>
                  <li>
                  <?php } ?>
                  
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('side-big-image'); ?></a>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                   <p><?php $temp_arr_content = explode(" ",substr(strip_tags(get_the_content()),0,180)); $temp_arr_content[count($temp_arr_content)-1] = ""; $display_arr_content = implode(" ",$temp_arr_content); echo $display_arr_content; ?><?php if(strlen(strip_tags(get_the_content())) > 180) echo "..."; ?></p></li>
                    
                <?php $x++; ?>
                <?php endwhile; ?>                    
                <?php wp_reset_query(); ?>                                                            
                    
                </ul>
            </div><!--//side_box-->
            
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?>       
            
            <?php endif; ?>
        
        </div><!--//sidebar-->