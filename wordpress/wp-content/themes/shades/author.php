<?php
/**
 * Archive Template
 *
 * @package     Shades
 * @since       1.0
 *
 * @link        http://buynowshop.com/themes/shades/
 * @link        https://github.com/Cais/shades/
 * @link        http://wordpress.org/extend/themes/shades/
 *
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2012, Edward Caissie
 *
 * Last revised April 18, 2012
 * @version     1.8
 * Addressed deprecated function call to `get_userdatabylogin`
 * Replace navigation with call to `get_template_part( 'shades-navigation' )`
 * Replaced output if no posts are returned by the_Loop with a call to get_template_part( 'shades-no-posts' )
 * Added conditionals to only show website URL (with email) if the address is found in the user profile; and only show biography if it exists.
 */

get_header();

/** This sets the $curauth variable */
$curauth = ( get_query_var( 'author_name ' ) ) ? get_user_by( 'id', get_query_var( 'author_name' ) ) : get_userdata( get_query_var( 'author' ) ); ?>
<div id="maintop"></div><!--end maintop-->
<div id="wrapper">
    <div id="content">
        <div id="the-loop">
            <div id="author" class="<?php
                    /** Add class as related to the user role (see 'Role:' drop-down in User options) */
                    if ( user_can( $curauth->ID, 'administrator' ) ) {
                        echo 'administrator';
                    } elseif ( user_can( $curauth->ID, 'editor' ) ) {
                        echo 'editor';
                    } elseif ( user_can( $curauth->ID, 'contributor' ) ) {
                        echo 'contributor';
                    } elseif ( user_can( $curauth->ID, 'subscriber' ) ) {
                        echo 'subscriber';
                    } else {
                        echo 'guest';
                    }
                    if ( ( $curauth->ID ) == '1' ) echo ' administrator-prime'; /** sample */
                        /** elseif ( ( $curauth->ID ) == '2' ) echo ' jellybeen'; */
                        /** add user classes by ID following the above samples */ ?>">
                <h2><?php _e( 'About ', 'shades' ); ?><?php echo $curauth->display_name; ?></h2>
                <ul>
                    <?php if ( ! empty( $curauth->user_url ) ) { ?>
                        <li><?php _e( 'Website', 'shades' ); ?>: <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a> <?php _e( 'or', 'shades' ); ?> <a href="mailto:<?php echo $curauth->user_email; ?>"><?php _e( 'email', 'shades' ); ?></a></li>
                    <?php }
                    if ( ! empty( $curauth->user_description ) ) { ?>
                        <li><?php _e( 'Biography', 'shades' ); ?>: <?php echo $curauth->user_description; ?></li>
                    <?php } ?>
                </ul>
            </div><!-- #author -->
            <h2><?php _e( 'Posts by ', 'shades' ); ?><?php echo $curauth->display_name; ?>:</h2>
            <!-- start the_Loop -->
            <?php
            if ( have_posts() ) :
                $count = 0;
                while ( have_posts() ) : the_post();
                    $count++;
                    if ( $count == 1 ) {
                        get_template_part( 'shades', get_post_format() );
                    } else { ?>
                        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                            <h1>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array('before' => 'Permalink to: ', 'after' => '')); ?>"><?php the_title(); ?></a>
                            </h1>
                            <div class="postdata">
                                <?php
                                printf( __( '%1$s on %2$s', 'shades' ), shades_use_posted(), get_the_time( get_option( 'date_format' ) ) );
                                _e( ' in ', 'shades' ); the_category( ', ' ); the_shortlink( __( 'Short Link', 'shades' ), '', ' &#124; ', '' ); ?>
                                <br /><?php comments_popup_link( __( ' with No Comments', 'shades' ), __( ' with 1 Comment', 'shades' ), __( ' with % Comments', 'shades' ), '', __( ' with Comments closed', 'shades' ) );
                                edit_post_link( __( 'Edit', 'shades' ), __( ' &#124; ', 'shades' ), __( '', 'shades' ) ); ?>
                            </div><!-- .postdata -->
                            <?php
                            if ( is_home() || is_front_page() && has_post_thumbnail() ) {
                                the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) );
                            }
                            the_excerpt(); ?>
                            <div class="clear"></div><!-- For inserted media at the end of the post -->
                            <p class="tags"><?php the_tags(); ?></p>
                        </div><!-- .post #post-ID -->
                    <?php
                    }
                endwhile;
                    get_template_part( 'shades-navigation' );
            else :
                get_template_part( 'shades-no-posts' );
            endif; ?>
        </div><!-- #the-loop -->
        <?php get_sidebar(); ?>
        <div class="clear"></div>
    </div><!--end content-->
</div><!--end wrapper-->
<?php get_footer();