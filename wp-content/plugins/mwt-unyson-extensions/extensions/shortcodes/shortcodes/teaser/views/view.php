<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */

$teaser_type   = isset( $atts['teaser_types']['teaser_type'] ) ? $atts['teaser_types']['teaser_type'] : false;
$teaser_image  = isset( $atts['teaser_types'][ $teaser_type ]['teaser_image'] ) ? $atts['teaser_types'][ $teaser_type ]['teaser_image'] : false;
$icon          = isset( $atts['teaser_types'][ $teaser_type ]['icon'] ) ? $atts['teaser_types'][ $teaser_type ]['icon'] : false;
$icon_size     = isset( $atts['teaser_types'][ $teaser_type ]['icon_size'] ) ? $atts['teaser_types'][ $teaser_type ]['icon_size'] : 'size_small';
$icon_style    = isset( $atts['teaser_types'][ $teaser_type ]['icon_style'] ) ? $atts['teaser_types'][ $teaser_type ]['icon_style'] : false;
$icon_color    = isset( $atts['teaser_types'][ $teaser_type ]['icon_color'] ) ? $atts['teaser_types'][ $teaser_type ]['icon_color'] : false;
$teaser_center = isset( $atts['teaser_types'][ $teaser_type ]['teaser_center'] ) ? $atts['teaser_types'][ $teaser_type ]['teaser_center'] : false;

//common teaser properties for all teaser types
$title        = $atts['title'];
$teaser_style = $atts['teaser_style'];
$title_tag    = $atts['title_tag'];
$content      = $atts['content'];

//available teaser layouts:
//icon_left
//icon_right
//image_top
//image_left
//image_right
//icon_top - default

switch ( $teaser_type ) :

	case 'image_top': ?>
	<div class="teaser <?php echo esc_attr( $teaser_center . ' ' . $teaser_style ); ?>">
		<?php if ( $teaser_image ) : ?>
		<div class="teaser_image">
			<img src="<?php echo esc_url( $teaser_image['url'] ); ?>" alt="<?php echo esc_attr( $title ); ?>">
		</div>
	<?php endif; //teaser_image 
		?>
		<?php if ( $title ): ?>
		<<?php echo esc_attr( $title_tag ); //h3 ?> class="media-heading">
		    <?php echo wp_kses_post( $title ); ?>
		</<?php echo esc_attr( $title_tag ); //h3 ?>>
	<?php endif; //$title 
		?>
		<?php if ( $content ) : ?>
		<div>
			<?php echo wp_kses_post( $content ); ?>
		</div>
	<?php endif; //$content 
		?>
		</div>

		<?php
		break; //image_top


	//left image layout
	case 'image_left':
		?>
		<div class="teaser media <?php echo esc_attr( $teaser_style ); ?>">
			<?php if ( $teaser_image ) : ?>
				<div class="media-left">
					<div class="teaser_image">
						<img src="<?php echo esc_url( $teaser_image['url'] ); ?>"
						     alt="<?php echo esc_attr( $title ); ?>">
					</div>
				</div>
			<?php endif; //teaser_image 
			?>
			<div class="media-body">
				<?php if ( $title ): ?>
				<<?php echo esc_attr( $title_tag ); //h3 ?> class="media-heading">
					<?php echo wp_kses_post( $title ); ?>
		    	</<?php echo esc_attr( $title_tag ); //h3 ?>>
		<?php endif; //$title 
		?>
			<?php if ( $content ) : ?>
				<div>
					<?php echo wp_kses_post( $content ); ?>
				</div>
			<?php endif; //$content ?>
		</div><!-- eof .media-body -->
		</div><!-- eof .teaser -->
		<?php
		break; //image_left

	//right image layout
	case 'image_right':
		?>
		<div class="teaser media text-right <?php echo esc_attr( $teaser_style ); ?>">

			<div class="media-body">
				<?php if ( $title ): ?>
				<<?php echo esc_attr( $title_tag ); //h3 ?> class="media-heading">
					<?php echo wp_kses_post( $title ); ?>
			    </<?php echo esc_attr( $title_tag ); //h3 ?>>
			<?php endif; //$title 
			?>
			<?php if ( $content ) : ?>
				<div>
					<?php echo wp_kses_post( $content ); ?>
				</div>
			<?php endif; //$content ?>
		</div><!-- eof .media-body -->
		<?php if ( $teaser_image ) : ?>
		<div class="media-right">
			<div class="teaser_image">
				<img src="<?php echo esc_url( $teaser_image['url'] ); ?>" alt="<?php echo esc_attr( $title ); ?>">
			</div>
		</div>
	<?php endif; //teaser_image 
		?>
		</div><!-- eof .teaser -->

		<?php
		break; //image_right


	//left icon layout
	case 'icon_left':
		?>
		<div class="teaser media <?php echo esc_attr( $teaser_style. ' ' .$icon_color ); ?>">
			<?php if ( $icon_style && $icon ) : ?>
				<div class="media-left media-top">
					<div class="teaser_icon <?php echo esc_attr( $icon_size . ' ' . $icon_style . ' ' . $icon_color ); ?>">
                        <div class="teaser_icon_wrap">
                          <i class="<?php echo esc_attr( $icon ); ?>"></i>
					    </div>
					</div>
				</div>
			<?php endif; //$icon_style check 
			?>
			<div class="media-body">
				<?php if ( $title ): ?>
                <<?php echo esc_attr( $title_tag ); //h3 ?> class="media-heading">
				    <?php echo wp_kses_post( $title ); ?>
                </<?php echo esc_attr( $title_tag ); //h3 ?>>
                <?php endif; //$title  ?>
			<?php if ( $content ) : ?>
				<div>
					<?php echo wp_kses_post( $content ); ?>
				</div>
			<?php endif; //$content ?>
		</div><!-- eof .media-body -->
		</div><!-- eof .teaser -->
		<?php
		break; //icon_left

	//right icon layout
	case 'icon_right':
		?>
		<div class="teaser media text-right <?php echo esc_attr( $teaser_style. ' ' .$icon_color ); ?>">

			<div class="media-body">
				<?php if ( $title ): ?>
				<<?php echo esc_attr( $title_tag ); //h3 ?> class="media-heading">
					<?php echo wp_kses_post( $title ); ?>
			    </<?php echo esc_attr( $title_tag ); //h3 ?>>
			<?php endif; //$title 
			?>
			<?php if ( $content ) : ?>
				<div>
					<?php echo wp_kses_post( $content ); ?>
				</div>
			<?php endif; //$content ?>
		</div><!-- eof .media-body -->
		<?php if ( $icon_style && $icon ) : ?>
		<div class="media-right media-top">
			<div class="teaser_icon <?php echo esc_attr( $icon_size . ' ' . $icon_style . ' ' . $icon_color ); ?>">
                <div class="teaser_icon_wrap">
                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
			    </div>
			</div>
		</div>
	<?php endif; //icon_style ?>
		</div><!-- eof .teaser -->

		<?php
		break; //icon_right

	//default layout - icon_top
	default:
		?>
	<div class="teaser icon_top <?php echo esc_attr( $teaser_center . ' ' . $teaser_style. ' ' .$icon_color ); ?>">
		<?php if ( $icon_style && $icon ) : ?>
		<div class="teaser_icon <?php echo esc_attr( $icon_size . ' ' . $icon_style . ' ' . $icon_color ); ?>">
            <div class="teaser_icon_wrap">
                <i class="<?php echo esc_attr( $icon ); ?>"></i>
		    </div>
		</div>
	<?php endif; //icon_style
		?>
		<?php if ( $title ): ?>
		<<?php echo esc_attr( $title_tag ); //h3 ?> class="media-heading">
	    	<?php echo wp_kses_post( $title ); ?>
		</<?php echo esc_attr( $title_tag ); //h3 ?>>
	<?php endif; //$title 
		?>
		<?php if ( $content ) : ?>
		<p>
			<?php echo wp_kses_post( $content ); ?>
		</p>
	<?php endif; //$content ?>
		</div>
	<?php endswitch; ?>