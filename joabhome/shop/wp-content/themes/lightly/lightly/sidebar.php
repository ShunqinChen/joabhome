				<div id="sidebar1" class="sidebar col300 right clearfix" role="complementary">
				
					<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar1' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->
						
						<div class="help">
						
							<p><?php _e('Please activate some Widgets.', 'plus62'); ?></p>
						
						</div>

					<?php endif; ?>

				</div>