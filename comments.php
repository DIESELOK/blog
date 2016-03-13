<?php
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
$fields =  array(
    'author' => '<p class="comment-form-author"><label for="author">' . __( 'Name *' ) . '</label> ' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"/></p>',
    'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email *' ) . '</label> ' . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"/></p>',
);
$comments_args = array(
    'fields'                =>  apply_filters( 'comment_form_default_fields', $fields),
    'comment_field'         => '<p class="comment-form-comment">' . '<label for="comment">' . __( 'Your Comment *' ) . '</label>' . '<textarea id="comment" name="comment" aria-required="true"></textarea>' . '</p>',
    'title_reply'           => '<h3 class="section-header">Leave a Comment</h3>',
    'comment_notes_before'  => '',
    'label_submit' => 'Send',
);
comment_form($comments_args);