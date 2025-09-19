<?php
/**
 * Plugin Name: Custom Login Logo
 * Description: Cho phép thay đổi logo trang đăng nhập WordPress.
 * Version: 1.0
 * Author: Quyền
 */

if ( !defined('ABSPATH') ) exit;

class Custom_Login_Logo {
    const OPT_NAME = 'cll_logo_url';

    public function __construct() {
        add_action('admin_menu', [$this, 'add_settings_page']);
        add_action('admin_init', [$this, 'register_settings']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_media']);
        add_action('login_enqueue_scripts', [$this, 'login_logo_css']);
    }

    public function add_settings_page() {
        add_options_page(
            'Custom Login Logo',
            'Custom Login Logo',
            'manage_options',
            'custom-login-logo',
            [$this, 'render_settings_page']
        );
    }

    public function register_settings() {
        register_setting('cll_options', self::OPT_NAME, [
            'type' => 'string',
            'sanitize_callback' => 'esc_url_raw',
            'default' => ''
        ]);
    }

    public function enqueue_media($hook) {
        if ($hook !== 'settings_page_custom-login-logo') return;
        wp_enqueue_media();
        wp_enqueue_script('cll-admin-js', '', ['jquery'], '1.0', true);
        $js = <<<JS
jQuery(function($){
  $('#cll_upload_btn').on('click', function(e){
    e.preventDefault();
    var frame = wp.media({
      title: 'Chọn logo',
      button: { text: 'Dùng logo này' },
      multiple: false
    });
    frame.on('select', function(){
      var attachment = frame.state().get('selection').first().toJSON();
      $('#cll_logo_url').val(attachment.url);
      $('#cll_logo_preview').attr('src', attachment.url).show();
    });
    frame.open();
  });
});
JS;
        wp_add_inline_script('cll-admin-js', $js);
    }

    public function render_settings_page() {
        $logo = get_option(self::OPT_NAME, '');
        ?>
        <div class="wrap">
            <h1>Custom Login Logo</h1>
            <form method="post" action="options.php">
                <?php settings_fields('cll_options'); ?>
                <table class="form-table">
                    <tr>
                        <th scope="row">Logo</th>
                        <td>
                            <input type="text" id="cll_logo_url" name="<?php echo self::OPT_NAME; ?>" value="<?php echo esc_attr($logo); ?>" class="regular-text" placeholder="https://example.com/logo.png" />
                            <br>
                            <button type="button" class="button" id="cll_upload_btn">Chọn ảnh</button>
                            <br>
                            <img id="cll_logo_preview" src="<?php echo esc_attr($logo); ?>" style="max-height:100px; margin-top:10px; <?php echo $logo ? '' : 'display:none;'; ?>" />
                        </td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }

    public function login_logo_css() {
        $logo = get_option(self::OPT_NAME, '');
        if (!$logo) return;
        ?>
        <style>
            body.login div#login h1 a {
                background-image: url('<?php echo esc_url($logo); ?>');
                background-size: contain;
                background-position: center;
                width: 320px;
                height: 120px;
            }
        </style>
        <?php
    }
}

new Custom_Login_Logo();