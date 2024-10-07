<?php // Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
    <p class="nocomments">You must enter the password to view the comments.</p>
    <?php
    return;
}
?>

<!-- You can start editing here. -->
<?php // Begin Comments & Trackbacks ?>
<?php if ( have_comments() ) : ?>

    <ol class="commentlist">
        <?php wp_list_comments(); ?>
    </ol>

    <div class="comments-navigation">
        <div class="alignleft"><?php previous_comments_link() ?></div>
        <div class="alignright"><?php next_comments_link() ?></div>
    </div>

    <?php // End Comments ?>

<?php else : // this is displayed if there are no comments so far ?>

    <?php if ('open' == $post->comment_status) : ?>
        <!-- If comments are open, but there are no comments. -->

    <?php else : // comments are closed ?>
        <!-- If comments are closed. -->
        <p>It is temporarily not possible to post comments</p>

    <?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

    <div id="respond">

        <h3 class="postcomment"><?php comment_form_title( 'Your Comment', 'Your Comment on %s' ); ?></h3>

        <div class="cancel-comment-reply">
            <small><?php cancel_comment_reply_link(); ?></small>
        </div>
        <?php global $user_ID; ?>
        <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
            <p>ابتدا <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">Sign in</a> To be able to post a comment</p>

        <?php else : ?>

            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

                <?php if ( $user_ID ) : ?>

                    <p>User: <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Logout from account user">Logout &raquo;</a></p>

                <?php else : ?>
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <label class="mb-2" for="author"><?php if ($req) echo " * "; ?>Name :&nbsp;&nbsp;&nbsp;</label>
                            <input type="text" name="author" id="author" class="form-control rounded-5" value="<?php echo $comment_author; ?>" size="28" tabindex="1" />
                        </div>
                        <div class="col">
                            <label class="mb-2" for="email"><?php if ($req) echo " * "; ?>Email :</label>
                            <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="28" tabindex="2" class="form-control rounded-5" />
                        </div>
                    </div>
                <?php endif; ?>

                <p>
                    <textarea name="comment" id="comment" cols="60" rows="10" tabindex="3" class="form-control rounded-4"></textarea>
                </p>

                <p>
					<button type="submit" name="submit" id="submit" class="btn btn-primary rounded-5"><i class="fa-duotone fa-send"></i> Send Comment </button>
                    <?php comment_id_fields(); ?>
                </p>
                <?php do_action('comment_form', $post->ID); ?>
            </form>
        <?php endif; ?>
    </div>
<?php else : // Comments are closed ?>
    <p>It is temporarily not possible to post comments</p>
<?php endif; ?>