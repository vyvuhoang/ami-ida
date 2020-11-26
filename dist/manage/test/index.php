<?php
include_once('../../app_config.php');
include_once(APP_PATH.'wp/wp-load.php');
wp_head();
wp_enqueue_media();
?>
<form method="post">
    <input type="text" class="process_custom_images" id="process_custom_images" name="selected_logo" value="" placeholder="http://">
    <button class="set_custom_logo button" style="vertical-align: middle;">Select Logo</button>
</form>
<?php wp_footer();?>
<script>
jQuery(document).ready(function() {
    var $ = jQuery;
    if ($('.set_custom_logo').length > 0) {
        if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
            $(document).on('click', '.set_custom_logo', function(e) {
                e.preventDefault();
                var button = $(this);
                var id = button.prev();
                wp.media.editor.send.attachment = function(props, attachment) {
                    id.val(attachment.url);
                };
                wp.media.editor.open(button);
                return false;
            });
        }
    }
});
</script>
