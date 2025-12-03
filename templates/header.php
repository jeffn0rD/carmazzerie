
<style>
	.main-menu-item-outer-wrap {
		
		height:				20px;
		padding:			4px;
		border-radius: 		8px;
		background-color:	rgba(96, 96, 96, 0.7);
	}
	.main-menu-item-wrap {
		font-size:			18px;
		font-weight:		bold;
		opacity:			1;
	}	
	.main-menu-item-outer-wrap:hover {
		background-color:	rgba(48, 48, 48, 0.9);
	}
	.header-color-overlay {
		background-color:	rgba(0,0,0, 0.4);
		opacity:			1;
	}
	.trans-header #kad-banner {
		/*background-color:	rgba(255,255,255, 0.5);*/
		border:	none;
	}
	.trans-header #pageheader {
		padding-top: 40px;
	}
	.kad-call-title {
		font-size: 20px;
		line-height: 32px;
	}
	.kad-lg  {
		height: 120px;
		width: 93px;
		border: 2px solid #000;
		background-color: #FFF;

		background-size: contain!important;
		background-position: center center!important;
    }
    .kad-standard-logo-tranbg {
    
    }
    table td>h3 {
		font-size:	14px;
		padding:	2px;
    }
    table td>h4 {
		font-size:	14px;
		padding:	2px;
    }
    .page-header {
		padding: 	110px 0px 0px 0px;
    }
    .footer-icons {
		display:			inline-block;
		padding-right:		30px;
		height:				62px;
    }
    .kad-call-title-case h1.kad-call-title {
		font-weight: bold;
    }
    .home-icon-item:hover {
		color:	#00F;
    }
	.titleclass  {
		/*background-position: -230px;*/
		background-size: cover !important;
		background-position: 21% center !important;
	}
	
	#rentalproperty_settings_wrapper {
		width:		100%;
	}
	.rentalproperty-settings-table {
		width:				100%;
		border-collapse: 	collapse;
		border-spacing: 	0;
	}
	.rentalproperty-settings-table td {
		border:				1px solid #666;
		font-size: 			14px;
		padding: 			10px;
		font-family: 		Raleway;
		line-height: 		40px;
		font-weight: 		normal;
	}
	.rentalproperty-settings-table td:nth-of-type(1) {
		font-weight:		bold;
	}
	.flex-control-nav {
		display:			none;
	}
	<?php if (!wp_is_mobile()): ?>
	.rentalproperty-settings-table td:nth-of-type(3) {
		font-weight:		bold;
	}
	<?php endif; ?>
	
    @media (max-width: 480px) {
		.titleclass  {
			/*background-position: -230px;*/
			background-size: cover !important;
			background-position: center center !important;
		}
		.footer-icons {
			padding-right:		8px;
		}
		.trans-header #pageheader {
			padding-top: 0px;
		}
    }
    @media (max-width: 390px) {
		.footer-icons {
			padding-right:		0px;
		}
    
    }
</style>

<?php global $pinnacle, $post; 
  
    if(isset($pinnacle['header_height'])) {
      $header_height = $pinnacle['header_height'];
    } else {
      $header_height = 90;
    }
    
    if(!pinnacle_pagetitle_behind_header()) {
      $pageheaderbg = '0';
    } else {
      $pageheaderbg = '1';
    } 
        if(isset($pinnacle['logo_container_width'])) {
          if($pinnacle['logo_container_width'] == '50') {
            $logocclass = 'col-md-6 col-sm-9 col-ss-10'; 
            $menulclass = 'col-md-6 col-sm-3 col-ss-2';
          } elseif($pinnacle['logo_container_width'] == '41') {
            $logocclass = 'col-md-5 col-sm-9 col-ss-10'; 
            $menulclass = 'col-md-7 col-sm-3 col-ss-2';
          } elseif($pinnacle['logo_container_width'] == '33') {
            $logocclass = 'col-md-4 col-sm-8 col-ss-10';
            $menulclass = 'col-md-8 col-sm-4 col-ss-2';
          } elseif($pinnacle['logo_container_width'] == '25') {
            $logocclass = 'col-md-3 col-sm-8 col-ss-9';
            $menulclass = 'col-md-9 col-sm-4 col-ss-3';
          } else {
            $logocclass = 'col-md-2 col-sm-8 col-ss-9'; 
            $menulclass = 'col-md-10 col-sm-4 col-ss-3';
          }
        } else {
          $logocclass = 'col-md-4 col-sm-8 col-ss-9'; 
          $menulclass = 'col-md-8 col-sm-4 col-ss-3';
        } ?>
<header id="kad-banner" class="banner headerclass kad-header-style-basic" data-pageheaderbg="<?php echo esc_attr($pageheaderbg);?>" data-header-base-height="<?php echo esc_attr($header_height);?>">
<?php if (pinnacle_display_topbar()) : 
    get_template_part('templates/header', 'topbar');
  endif; ?>
  <div id="kad-shrinkheader" class="container" style="height:<?php echo esc_attr($header_height);?>px; line-height:<?php echo esc_attr($header_height);?>px;">
    <div class="row">
      <div class="<?php echo esc_attr($logocclass); ?> clearfix kad-header-left">
        <div id="logo" class="logocase">
          <a class="brand logofont" style="height:<?php echo esc_attr($header_height);?>px; line-height:<?php echo esc_attr($header_height);?>px; display:block;" href="<?php echo esc_url(home_url()); ?>/">
            <?php if (!empty($pinnacle['x1_logo_upload']['url'])) { ?> 
            <div id="thelogo" style="height:<?php echo esc_attr($header_height);?>px; line-height:<?php echo esc_attr($header_height);?>px;">
                <div style="background-image: url('<?php echo esc_attr($pinnacle['x1_logo_upload']['url']); ?>'); max-height:<?php echo esc_attr($header_height);?>px; height:<?php echo esc_attr($pinnacle['x1_logo_upload']['height']); ?>px; width:<?php echo esc_attr($pinnacle['x1_logo_upload']['width']); ?>px;" class="kad-standard-logo kad-lg"></div>
                    <?php if (!empty($pinnacle['th_x1_logo_upload']['url'])) { ?> 
                        <div style="background-image: url('<?php echo esc_attr($pinnacle['th_x1_logo_upload']['url']); ?>'); max-height:<?php echo esc_attr($header_height);?>px; height:<?php echo esc_attr($pinnacle['th_x1_logo_upload']['height']); ?>px; width:<?php echo esc_attr($pinnacle['th_x1_logo_upload']['width']); ?>px;" class="kad-lg kad-standard-logo-tranbg"></div> 
                    <?php }?>
            </div> 
            <?php } else { 
              bloginfo('name'); 
            } ?>
          </a>
        </div> <!-- Close #logo -->
      </div><!-- close col -->
      <div class="<?php echo esc_attr($menulclass); ?> kad-header-right">
        <?php if (has_nav_menu('primary_navigation')) : ?>
            <nav id="nav-main" class="clearfix kad-primary-nav">
                <?php wp_nav_menu(array(
					'theme_location' => 'primary_navigation'
					,'menu_class' 	=> 'sf-menu'
					,'link_before'		=> '<span class="main-menu-item-outer-wrap"><span class="main-menu-item-wrap">'
					,'link_after'		=> '</span></span>'
				));
				?>
            </nav> 
            <div id="mobile-nav-trigger" class="nav-trigger">
              <a class="nav-trigger-case collapsed" data-toggle="collapse" rel="nofollow" data-target=".mobile_menu_collapse">
                <div class="kad-navbtn mobileclass clearfix"><i class="icon-reorder"></i></div>
              </a>
            </div>
        <?php  else : ?>
            <nav id="nav-main" class="clearfix kad-primary-nav kt-nomenu-assigned" role="navigation">
              <ul class="sf-menu">
                <li>
                  <a href="#">
                    <?php _e('No menu assigned', 'pinnacle');?>
                  </a>
                </li>
              </ul>
            </nav>
        <?php endif; ?>
      </div> <!-- Close col -->       
    </div> <!-- Close Row -->
  </div> <!-- Close Container -->
  <?php if (has_nav_menu('primary_navigation')) : ?>
  <div class="container">
      <div id="kad-mobile-nav" class="kad-mobile-nav">
          <div class="kad-nav-inner mobileclass">
              <div id="mobile_menu_collapse" class="kad-nav-collapse collapse mobile_menu_collapse">
                  <?php if(isset($pinnacle['menu_search']) && $pinnacle['menu_search'] == '1') { 
                      get_search_form(); 
                  }
                  
                  if(isset($pinnacle['mobile_submenu_collapse']) && $pinnacle['mobile_submenu_collapse'] == '1') {
                    wp_nav_menu( array(
						'theme_location' => 'primary_navigation'
						,'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
						,'menu_class' => 'kad-mnav'
						,'walker' => new kadence_mobile_walker()
					));
                  } else {
                    wp_nav_menu( array(
						'theme_location' 	=> 'primary_navigation'
						,'items_wrap' 		=> '<ul id="%1$s" class="%2$s">%3$s</ul>'
						,'menu_class' 		=> 'kad-mnav'
					)); 
                  }
                  
                  ?>
              </div>
          </div>
      </div>
  </div> <!-- Close Container -->
  <?php endif; ?> 
</header>