<?php
global $exclude_categories;
$categories = get_categories(array('exclude'=>$exclude_categories,'parent'=>0,'orderby'=>'ID'));
?>
<header id="#top" class="amp-wp-header">
	<div>
		<a href="<?php echo esc_url( $this->get( 'home_url' ) ); ?>" title="<?php echo esc_html( $this->get( 'blog_name' ) ); ?>" class="logo_button">
            <amp-img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" width="130" height="25" class="amp-wp-site-icon"></amp-img>
		</a>
        
        <button on="tap:sidebar.toggle" class="ampstart-btn caps m2 menu_button">
            <span></span>
            <span></span>
            <span></span>
        </button>
	</div>
    
    <amp-sidebar id="sidebar" layout="nodisplay" side="left">
        <div id="mobile-menu">
          <div class="menu-header-menu-container">
            <form method="get" class="mobile-search-form" action="<?php echo esc_url(home_url('/')); ?>">
              <input type="search" name="s" id="search-box" placeholder="Search" value="<?php echo get_search_query(); ?>"/>
            </form>

            <?php 
              if( !empty($categories) ){
                foreach ($categories as $category) {
                  if($category->cat_ID >= $style){
                      $args = array('child_of' => $category->cat_ID,'hide_empty' => FALSE,'orderby'=>'id','order'=>'ASC','exclude'=>$exclude_categories);
                      $sub_categories = get_categories($args);
                      $classes  = 'menu-item menu-item-type-taxonomy menu-item-object-category';
                      if(count($sub_categories) > 0){
                        $classes .= ' menu-item-has-children ';
                      }
                  ?>
                    <ul id="menu-header-menu" class="nav navbar-nav">
                        <?php if(count($sub_categories) > 0){ ?>
                            <li class="<?php echo $classes;?> dropdown <?php echo ($paths[1]==$category->slug || $paths[2]==$category->slug)?'active-menu':'' ;?>">
                                <amp-accordion class="dropdown_menu_wrapper">
                                    <section>
                                        <h4>
                                            <?php echo $category->name;?> <?php echo $category->name;?> <span class="caret"></span>
                                        </h4>
                                        <ul class="sub-menu dropdown-menu">
                                            <li><a href="<?php echo get_term_link($category); ?>"> VIEW ALL </a></li>
                                            <?php 
                                            if( !empty($sub_categories) ){
                                                foreach ($sub_categories as $key => $subcategory) {
                                            ?>
                                                <li>
                                                    <a href="<?php echo get_term_link($subcategory); ?>">
                                                        <?php echo $subcategory->name; ?>
                                                    </a>
                                                </li>
                                            <?php 
                                                }
                                            }    
                                            ?>
                                        </ul>     
                                    </section>
                                </amp-accordion>
                            </li>
                        <?php } ?>
                    </ul>
                  <?php 
                    }
                }
            }
            ?>
          </div>
        </div>
    </amp-sidebar>
    
    
</header>
