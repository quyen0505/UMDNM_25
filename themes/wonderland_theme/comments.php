<?php
/**
 * The template for displaying comments
 * Theme: Wonderland
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area container my-5">

    <?php if (have_comments()) : ?>
        <h3 class="comments-title">
            <?php
            $count = get_comments_number();
            printf(_n('%s Comment', '%s Comments', $count, 'textdomain'), number_format_i18n($count));
            ?>
        </h3>

        <ul class="comment-list">
            <?php wp_list_comments(array('style' => 'ul', 'short_ping' => true)); ?>
        </ul>

        <?php the_comments_navigation(); ?>

    <?php endif; ?>

    <?php
    // Nếu comment đang mở
    if (comments_open()) :
       $fields = array(
        'author' => '<input id="author" name="author" type="text" placeholder="Your Name" required>',
        'email'  => '<input id="email" name="email" type="email" placeholder="Your Email" required>',
        'url'    => '<input id="url" name="url" type="url" placeholder="Website">',
        );

        $args = array(
        'title_reply'          => 'Post a Comment',
        'fields'               => $fields,
        'comment_field'        => '<textarea id="comment" name="comment" placeholder="Your comment" required></textarea>',
        'class_submit'         => 'submit-btn',
        'label_submit'         => 'Submit',
        'comment_notes_before' => '',
        'comment_notes_after'  => ''
        );

        comment_form($args);;
    endif;
    ?>

</div>