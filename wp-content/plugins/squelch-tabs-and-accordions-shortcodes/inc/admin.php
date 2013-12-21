<?php

// Security
if (!$squelch_taas_admin) exit;
if (!current_user_can( 'manage_options' )) exit;

$theme = get_option( 'squelch_taas_jquery_ui_theme' );


/* "Option is Selected": Echoes selected="selected" if $t is the active theme
 */
function ois( $t ) {
    $theme = get_option( 'squelch_taas_jquery_ui_theme' );

    if ($t == $theme) {
        echo 'selected="selected"';
    }
}


/* "Option Is Checked": Echoes checked="checked" if $t is true
 */
function oic( $t ) {
    if ($t) {
        echo 'checked="checked"';
    }
}


/* Save changes
 */
if ($_POST['submit'] == "Save Changes") {
    $valid = true;

    $new_theme      = $_POST['jquery_ui_theme'];
    ////$custom_css     = $_POST['custom_css_url'];
    $jquery_ver     = $_POST['jquery_ver'];
    $load_jquery    =($_POST['load_jquery']     == 'yes') ? true : false;
    $load_jquery_ui =($_POST['load_jquery_ui']  == 'yes') ? true : false;
    $jquery_ui_ver  = $_POST['jquery_ui_ver'];

    ////if (('custom' == $new_theme) && (empty($custom_css))) {
    ////    $GLOBALS['squelch_taas_admin_msg'] .= '<div class="error"><p>Custom CSS URL cannot be empty, please enter a URL or upload a stylesheet.</p></div>';
    ////    $valid = false;
    ////}

    if ($valid) {
        update_option( 'squelch_taas_jquery_ui_theme',  $new_theme      );
        ////update_option( 'squelch_taas_custom_css_url',   $custom_css );

        update_option( 'squelch_taas_load_jquery',      $load_jquery    );
        update_option( 'squelch_taas_jquery_ver',       $jquery_ver     );
        update_option( 'squelch_taas_load_jquery_ui',   $load_jquery_ui );
        update_option( 'squelch_taas_jquery_ui_ver',    $jquery_ui_ver  );
        update_option( 'squelch_taas_upgrade_warning',  0               );

        $GLOBALS['squelch_taas_admin_msg'] .= '<div class="updated"><p>Changes saved.</p></div>';
    }
}

global $squelch_taas_admin_msg;
$jquery_ver             = get_option('squelch_taas_jquery_ver'              );
$load_jquery            = get_option('squelch_taas_load_jquery'             );
$jquery_ui_ver          = get_option('squelch_taas_jquery_ui_ver'           );
$load_jquery_ui         = get_option('squelch_taas_load_jquery_ui'          );
$jquery_ver_default     = get_option('squelch_taas_jquery_ver_default'      );
$jquery_ui_ver_default  = get_option('squelch_taas_jquery_ui_ver_default'   );
$custom_css             = get_option('squelch_taas_custom_css_url'          );

?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br /></div>

    <?php echo $squelch_taas_admin_msg; ?>

    <h2>Squelch Tabs And Accordions Shortcodes</h2>
    <p>
        Squelch Tabs and Accordions Shortcodes provides shortcodes for adding stylish Web 2.0 style accordions and tabs to your WordPress website: Horizontal accordions, vertical accordions and tabs.
    </p>
    <form method="post" action="">
        <div>
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row">
                            <label for="jquery_ui_theme">
                                jQuery UI theme
                            </label>
                        </th>
                        <td valign="top">
                            <select id="jquery_ui_theme" name="jquery_ui_theme">
                                <option <?php ois('none'); ?>value="none">No jQuery UI theme</option>
                                <!-- option <?php /*ois('custom');*/ ?>value="custom">Use your own custom CSS</option -->
                                <option <?php ois('base'); ?>value="base">jQuery Base Styles Only</option>
                                <option <?php ois('ui-lightness'); ?>value="ui-lightness">Lightness</option>
                                <option <?php ois('ui-darkness'); ?>value="ui-darkness">Darkness</option>
                                <option <?php ois('smoothness'); ?>value="smoothness">Smoothness</option>
                                <option <?php ois('start'); ?>value="start">Start</option>
                                <option <?php ois('redmond'); ?>value="redmond">Redmond</option>
                                <option <?php ois('sunny'); ?>value="sunny">Sunny</option>
                                <option <?php ois('overcast'); ?>value="overcast">Overcast</option>
                                <option <?php ois('le-frog'); ?>value="le-frog">Le Frog</option>
                                <option <?php ois('flick'); ?>value="flick">Flick</option>
                                <option <?php ois('pepper-grinder'); ?>value="pepper-grinder">Pepper Grinder</option>
                                <option <?php ois('eggplant'); ?>value="eggplant">Eggplant</option>
                                <option <?php ois('dark-hive'); ?>value="dark-hive">Dark Hive</option>
                                <option <?php ois('cupertino'); ?>value="cupertino">Cupertino</option>
                                <option <?php ois('south-street'); ?>value="south-street">South Street</option>
                                <option <?php ois('blitzer'); ?>value="blitzer">Blitzer</option>
                                <option <?php ois('humanity'); ?>value="humanity">Humanity</option>
                                <option <?php ois('hot-sneaks'); ?>value="hot-sneaks">Hot Sneaks</option>
                                <option <?php ois('excite-bike'); ?>value="excite-bike">Excite Bike</option>
                                <option <?php ois('vader'); ?>value="vader">Vader</option>
                                <option <?php ois('dot-luv'); ?>value="dot-luv">Dot Luv</option>
                                <option <?php ois('mint-choc'); ?>value="mint-choc">Mint Choc</option>
                                <option <?php ois('black-tie'); ?>value="black-tie">Black Tie</option>
                                <option <?php ois('trontastic'); ?>value="trontastic">Trontastic</option>
                                <option <?php ois('swanky-purse'); ?>value="swanky-purse">Swanky Purse</option>
                            </select>
                        </td>
                    </tr>
                    <!--tr valign="top" style="display: none;" id="custom-css-row">
                        <th scope="row">
                            <label for="upload_css">
                                Use your own custom CSS
                            </label>
                        </th>
                        <td>
                            <label for="upload_css">
                                <input id="upload_css" type="text" size="36" name="custom_css_url" value="<?php /*echo $custom_css;*/ ?>" />
                                <input id="upload_css_button" type="button" value="Upload CSS" />
                                <br />Upload your own custom CSS as built by the <a href="http://jqueryui.com/themeroller/" target="_blank">jQuery UI Theme Roller</a>, or enter the URL of your custom CSS in the box above.
                        </label></td>
                    </tr -->
                    <tr valign="top">
                        <th scope="row">
                            <label for="load_jquery">
                                Load jQuery
                            </label>
                        </th>
                        <td>
                            <label for="load_jquery">
                                <input id="load_jquery" type="checkbox" name="load_jquery" value="yes" <?php oic($load_jquery); ?>/>
                                &nbsp; &nbsp; &nbsp; Note: Not loading jQuery will break the plugin unless you have made provisions elsewhere (e.g. in your theme) to load an appropriate version of jQuery.
                        </label></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <label for="jquery_ver">
                                jQuery version to load
                            </label>
                        </th>
                        <td>
                            <label for="jquery_ver">
                                <input id="jquery_ver" type="text" size="6" name="jquery_ver" value="<?php echo $jquery_ver; ?>" />
                                Recommended: <?php echo $jquery_ver_default; ?>
                                <br />
                                If your site requires a specific version of jQuery you can set the version here, but you do so at your own risk.
                        </label></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <label for="load_jquery_ui">
                                Load jQuery UI
                            </label>
                        </th>
                        <td>
                            <label for="load_jquery_ui">
                                <input id="load_jquery_ui" type="checkbox" name="load_jquery_ui" value="yes" <?php oic($load_jquery_ui); ?>/>
                                &nbsp; &nbsp; &nbsp; Note: Loading jQuery UI will tell WordPress to also load jQuery, if you've not ticked "Load jQuery" above then the jQuery version loaded might not be compatible. Use with caution.
                        </label></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <label for="jquery_ui_ver">
                                jQuery UI version to load
                            </label>
                        </th>
                        <td>
                            <label for="jquery_ui_ver">
                                <input id="jquery_ui_ver" type="text" size="6" name="jquery_ui_ver" value="<?php echo $jquery_ui_ver; ?>" />
                                Recommended: <?php echo $jquery_ui_ver_default; ?>
                                <br />
                                If your site requires a specific version of jQuery UI you can set the version here, but you do so at your own risk.
                        </label></td>
                    </tr>
                </tbody>
            </table>
            <p class="submit">
                <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes" />
            </p>
        </div>
    </form>
</div>
