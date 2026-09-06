<?php
/* Do not delete these lines */
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' === basename($_SERVER['SCRIPT_FILENAME']))
	wp_die( esc_html__( 'Please do not load this page directly. Thanks!', 'scapegoat' ) );
if ( post_password_required() ) {
	?><p class="nocomments"><?php _e('This is not the content you are looking for.','scapegoat'); ?></p><?php
	return;
}
?>

<?php if (have_comments()) : ?>
	<div id="comments-wrapper">
		<h3 id="comments"><?php printf( _n( 'One comment', '%1$s comments', get_comments_number(),'scapegoat' ), number_format_i18n( get_comments_number() )); ?></h3>
		<?php if ((int) get_option('page_comments') === 1): ?>
			<nav class="post-nav">
				<span class="post-nav-prev"><?php previous_comments_link( esc_html__( 'Older comments', 'scapegoat' ) ); ?></span>
				<span class="post-nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'scapegoat' ) ); ?></span>
			</nav>
		<?php endif; ?>
		<ol class="commentlist">
			<?php
			$comments_by_type = get_comments(array('post_id' => get_the_ID(), 'type' => 'all', 'order' => 'asc', 'orderby' => 'comment_date_gmt'));
			wp_list_comments(array('callback' => 'custom_comment', 'format' => 'html5'));
			?>
		</ol>
		<?php if ((int) get_option('page_comments') === 1): ?>
			<nav class="post-nav">
				<span class="post-nav-prev"><?php previous_comments_link( esc_html__( 'Older comments', 'scapegoat' ) ); ?></span>
				<span class="post-nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'scapegoat' ) ); ?></span>
			</nav>
		<?php endif; ?>
	</div>
<?php else : // this is displayed if there are no comments so far ?>
	<div id="comments-wrapper">
		<?php if (comments_open()) : ?>
			<!-- If comments are open, but there are no comments. -->
		 <?php else : // comments are closed ?>
			<!-- If comments are closed. -->
			<p class="nocomments"><?php _e('Comments closed.','scapegoat'); ?></p>
		<?php endif; ?>
	</div>
<?php endif; ?>


<?php if(comments_open()) : ?>
	<?php
	comment_form(array(
		'title_reply'         => __('What do you think?', 'scapegoat'),
		'title_reply_to'      => __('Leave a reply to %s', 'scapegoat'),
		'cancel_reply_link'   => __('Cancel reply', 'scapegoat'),
		'label_submit'        => __('Abschicken', 'scapegoat'),
	));
	?>
<?php endif; ?>