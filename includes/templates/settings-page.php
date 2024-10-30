<?php
/**
 * @author Kai Krannich
 * 
 * @since 1.0.0
 */
?>

<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <form method="post" action="options.php"><?php
        settings_fields('kk_uc_settings');
        do_settings_sections('kk_uc_settings');
        submit_button();
        ?></form>
</div>