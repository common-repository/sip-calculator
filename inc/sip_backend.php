<?php 
add_action( 'admin_menu', 'sip_calculator_generator_admin_menu' );

function sip_calculator_generator_admin_menu(  ) { 
    add_menu_page(
        'Sip Calculator', // page <title>Title</title>
        'Sip Calculator', // menu link text
        'manage_options', // capability to access the page
        'sip_calculator_generator', // page URL slug
        'sip_calculator_generator_page', // callback function /w content
        'dashicons-calculator', // menu icon
        14
    );
}

function sip_calculator_generator_page(  ) { 
    if(isset($_REQUEST['succes']))
    {
        echo '<div class="notice notice-success is-dismissible">
                    <p>setting saved successfully.</p>
                </div>';
    }
?>

<div class="sip_main_container">
    <div class="inner_div">
        <ul class="nav-tab-wrapper woo-nav-tab-wrapper">
            <li class="nav-tab nav-tab-active" data-tab="sip-tab-general"><?php echo __('General','sip-calculator');?></li>
            <li class="nav-tab" data-tab="sip-tab-text-settings"><?php echo __('Texts','sip-calculator');?></li>
        </ul>
<?php
settings_fields( 'sip_calculator_generator' );
do_settings_sections( 'sip_calculator_generator' );
?>
    <form action='<?php echo get_permalink(); ?>' method='post'>
        <div id="sip-tab-general" class="tab-content current">
            <table class="form-table" role="presentation">
                <tbody>
                    <h1><?php echo esc_html('Calculator Style Generator','sip-calculator'); ?></h1>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Title Text','sip-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="sip_title" name="sip_title" class="width" value="<?php echo get_option('sip_title','SIP CALCULATOR',true); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Title Font Size','sip-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="number" id="sip_title_font" name="sip_title_font" class="width" value="<?php echo esc_attr(get_option('sip_title_font','60',true)); ?>"><label><?php echo esc_html('  value in px.','sip-calculator');?></label>
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Title Color','sip-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="sip_title_color" name="sip_title_color" data-alpha-enabled="true" data-default-color="#000000" class="color-picker" value="<?php echo get_option('sip_title_color','#000000',true); ?>">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="sip_inner_div">
                <table class="form-table">
                    <h1><?php echo esc_html('Chart Style','sip-calculator'); ?></h1>
                    <tr>
                        <th scope="row"><?php echo esc_html('Select Chart Type','sip-calculator'); ?></th>
                        <td>
                            <input type="radio" name="sip_chart_type" value="doughnut_chart" <?php checked('doughnut_chart',get_option('sip_chart_type')); ?> checked><label for="label-1"><?php echo esc_html('Doughnut Chart','sip-calculator');?></label>
                            <input type="radio" name="sip_chart_type" value="bar_chart" <?php checked('bar_chart',get_option('sip_chart_type')); ?>><label for="label-1"><?php echo esc_html('Bar Chart','sip-calculator');?></label>
                            <input type="radio" name="sip_chart_type" value="pie_chart" <?php checked('pie_chart',get_option('sip_chart_type')); ?>><label for="label-1"><?php echo esc_html('Pie Chart','sip-calculator');?></label>
                            <input type="radio" name="sip_chart_type" value="polar_area_chart" <?php checked('polar_area_chart',get_option('sip_chart_type')); ?>><label for="label-1"><?php echo esc_html('Polar Area Chart','sip-calculator');?></label>


                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Invested Amount color','sip-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="sip_investamount_color" name="sip_investamount_color" data-alpha-enabled="true" data-default-color="rgba(188, 220, 255, 0.8)" class="color-picker" value="<?php echo get_option('sip_investamount_color','rgba(188, 220, 255, 0.8)',true); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Profit Amount color','sip-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="sip_profitamount_color" name="sip_profitamount_color" data-alpha-enabled="true" data-default-color="rgba(21, 58, 91, 0.44)" class="color-picker" value="<?php echo get_option('sip_profitamount_color','rgba(21, 58, 91, 0.44)',true); ?>">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="sip_inner_div">
                <table class="form-table">
                    <h1><?php echo esc_html('Slider Style','sip-calculator'); ?></h1>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Slider Activ color','sip-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="sip_slider_activ_color" name="sip_slider_activ_color" data-alpha-enabled="true" data-default-color="#9bb5d2" class="color-picker" value="<?php echo get_option('sip_slider_activ_color','#9bb5d2',true); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Slider Progress color','sip-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="sip_slider_progress_color" name="sip_slider_progress_color" data-alpha-enabled="true" data-default-color="#e6e6e6" class="color-picker" value="<?php echo get_option('sip_slider_progress_color','#e6e6e6',true); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Slider Thumb color','sip-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="sip_slider_thumb_back_color" name="sip_slider_thumb_back_color" data-alpha-enabled="true" data-default-color="#fdf8f8" class="color-picker" value="<?php echo get_option('sip_slider_thumb_back_color','#fdf8f8',true); ?>">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="sip_result_setting">
                <table class="form-table">
                    <h1><?php echo esc_html('Table Result Setting','sip-calculator'); ?></h1>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('SIP Returns Time Background Color','sip-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="sip_time_back_color" name="sip_time_back_color" data-alpha-enabled="true" data-default-color="#eaf6ff" class="color-picker" value="<?php echo get_option('sip_time_back_color','#eaf6ff',true); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('SIP Returns Time Background Color','sip-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="sip_time_text_color" name="sip_time_text_color" data-alpha-enabled="true" data-default-color="#000000" class="color-picker" value="<?php echo get_option('sip_time_text_color','#000000',true); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Result Table Heading Background Color','sip-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="sip_result_head_back_color" name="sip_result_head_back_color" data-alpha-enabled="true" data-default-color="#f7f7f7" class="color-picker" value="<?php echo get_option('sip_result_head_back_color','#f7f7f7',true); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Result Table Heading Text Color','sip-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="sip_result_head_text_color" name="sip_result_head_text_color" data-alpha-enabled="true" data-default-color="#000000" class="color-picker" value="<?php echo get_option('sip_result_head_text_color','#000000',true); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Result Table Body Background Color','sip-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="sip_result_body_bg_color" name="sip_result_body_bg_color" data-alpha-enabled="true" data-default-color="#f7f7f7" class="color-picker" value="<?php echo get_option('sip_result_body_bg_color','#f7f7f7',true); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Result Table Body Text Color','sip-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="sip_result_body_text_color" name="sip_result_body_text_color" data-alpha-enabled="true" data-default-color="#000000" class="color-picker" value="<?php echo get_option('sip_result_body_text_color','#000000',true); ?>">
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Result Table Body Hover Background Color','sip-calculator'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="sip_result_body_hover_bg_color" name="sip_result_body_hover_bg_color" data-alpha-enabled="true" data-default-color="#ebebeb" class="color-picker" value="<?php echo get_option('sip_result_body_hover_bg_color','#ebebeb',true); ?>">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="sip_result_setting">
                <table class="form-table">
                    <h1><?php echo esc_html('General Option','sip-calculator'); ?></h1>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Display Result With Chart','sip-calculator');?></label>
                        </th>
                        <td>
                            <input type="checkbox" name="sip_enable_chart" value="true" <?php checked('true', get_option("sip_enable_chart",'true')); ?>><label><?php echo esc_html('Display result with chart.','sip-calculator');?></label>
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Display Result With Table','sip-calculator');?></label>
                        </th>
                        <td>
                            <input type="checkbox" name="sip_enable_table" value="true" <?php checked('true', get_option("sip_enable_table",'true')); ?>><label><?php echo esc_html('Display result with table.','sip-calculator');?></label>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="sip-tab-text-settings" class="tab-content">
            <div class="sip_result_text_setting">
                <table class="form-table">
                    <h1><?php echo esc_html('Result setting','sip-calculator'); ?></h1>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Expected Amount Text','sip-calculator');?></label>
                        </th>
                        <td>
                            <input type="text" id="expected_amount_text" name="expected_amount_text" disabled value="<?php echo get_option('expected_amount_text','Expected Amount'); ?>">
                            <label class="ttfcf7_common_link"><?php echo __('Some Options Are Only available in ','tool-tips-for-contact-form-7');?><a href="https://appcalculate.com/product/sip-calculator/" target="_blank"><?php echo __('pro version','tool-tips-for-contact-form-7');?></a></label>
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Amount Invested Text','sip-calculator');?></label>
                        </th>
                        <td>
                            <input type="text" id="amount_invested_text" name="amount_invested_text" disabled value="<?php echo get_option('amount_invested_text','Amount Invested'); ?>">
                            <label class="ttfcf7_common_link"><?php echo __('Some Options Are Only available in ','tool-tips-for-contact-form-7');?><a href="https://appcalculate.com/product/sip-calculator/" target="_blank"><?php echo __('pro version','tool-tips-for-contact-form-7');?></a></label>
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Profit Earned Text','sip-calculator');?></label>
                        </th>
                        <td>
                            <input type="text" id="profit_earned_text" name="profit_earned_text" disabled value="<?php echo get_option('profit_earned_text','Profit Earned'); ?>">
                            <label class="ttfcf7_common_link"><?php echo __('Some Options Are Only available in ','tool-tips-for-contact-form-7');?><a href="https://appcalculate.com/product/sip-calculator/" target="_blank"><?php echo __('pro version','tool-tips-for-contact-form-7');?></a></label>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="sip_result_chart_text_setting">
                <table class="form-table">
                    <h1><?php echo esc_html('Chart setting','sip-calculator'); ?></h1>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Invested Amount Text','sip-calculator');?></label>
                        </th>
                        <td>
                            <input type="text" id="chart_invested_amount_text" name="chart_invested_amount_text" disabled value="<?php echo get_option('chart_invested_amount_text','Invested Amount'); ?>">
                            <label class="ttfcf7_common_link"><?php echo __('Some Options Are Only available in ','tool-tips-for-contact-form-7');?><a href="https://appcalculate.com/product/sip-calculator/" target="_blank"><?php echo __('pro version','tool-tips-for-contact-form-7');?></a></label>
                        </td>
                    </tr>
                    <tr class="font-size">
                        <th scope="row">
                            <label for="blogname"><?php echo esc_html('Profit Earned Text','sip-calculator');?></label>
                        </th>
                        <td>
                            <input type="text" id="chart_profit_earned_text" name="chart_profit_earned_text" disabled value="<?php echo get_option('chart_profit_earned_text','Profit Earned'); ?>">
                            <label class="ttfcf7_common_link"><?php echo __('Some Options Are Only available in ','tool-tips-for-contact-form-7');?><a href="https://appcalculate.com/product/sip-calculator/" target="_blank"><?php echo __('pro version','tool-tips-for-contact-form-7');?></a></label>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="sip_result_chart_text_setting">
                <table class="form-table">
                    <h1><?php echo esc_html('Form setting','sip-calculator'); ?></h1>
                    <tr>
                        <th scope="row"><?php echo esc_html('Invested Amount','sip-calculator'); ?></th>
                        <td>
                            <label class="sip_form_body">
                                <input type="number" id="default_invested_amount" name="default_invested_amount" value="<?php echo get_option('default_invested_amount','10000'); ?>"><label class="sip_back_desc"><?php echo esc_html('Default  Invested Amount','sip-calculator'); ?></label>
                            </label>
                            <label class="sip_form_body">
                                <input type="number" id="min_invested_amount" name="min_invested_amount" value="<?php echo get_option('min_invested_amount','100'); ?>"><label class="sip_back_desc"><?php echo esc_html('Minimum Invested Amount','sip-calculator'); ?></label>
                            </label>
                            <label class="sip_form_body">
                                <input type="number" id="max_invested_amount" name="max_invested_amount" value="<?php echo get_option('max_invested_amount','100000'); ?>"><label class="sip_back_desc"><?php echo esc_html('Maximum Invested Amount','sip-calculator'); ?></label>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Investment Period (YEARS)','sip-calculator'); ?></th>
                        <td>
                            <label class="sip_form_body">
                                <input type="number" id="default_investment_period" name="default_investment_period" value="<?php echo get_option('default_investment_period','10'); ?>"><label class="sip_back_desc"><?php echo esc_html('Default Investment Period','sip-calculator'); ?></label>
                            </label>
                            <label class="sip_form_body">
                                <input type="number" id="min_investment_period" name="min_investment_period" value="<?php echo get_option('min_investment_period','1'); ?>"><label class="sip_back_desc"><?php echo esc_html('Minimum Investment Period','sip-calculator'); ?></label>
                            </label>
                            <label class="sip_form_body">
                                <input type="number" id="max_investment_period" name="max_investment_period" value="<?php echo get_option('max_investment_period','30'); ?>"><label class="sip_back_desc"><?php echo esc_html('Maximum Investment Period','sip-calculator'); ?></label>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Expected Annual Returns (%)','sip-calculator'); ?></th>
                        <td>
                            <label class="sip_form_body">
                                <input type="number" id="default_expected_annual" name="default_expected_annual" value="<?php echo get_option('default_expected_annual','12'); ?>"><label class="sip_back_desc"><?php echo esc_html('Default Expected Returns','sip-calculator'); ?></label>
                            </label>
                            <label class="sip_form_body">
                                <input type="number" id="min_expected_annual" name="min_expected_annual" value="<?php echo get_option('min_expected_annual','1'); ?>"><label class="sip_back_desc"><?php echo esc_html('Minimum Expected Returns','sip-calculator'); ?></label>
                            </label>
                            <label class="sip_form_body">
                                <input type="number" id="max_expected_annual" name="max_expected_annual" value="<?php echo get_option('max_expected_annual','30'); ?>"><label class="sip_back_desc"><?php echo esc_html('Maximum Expected Returns','sip-calculator'); ?></label>
                            </label>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <p class="submit">
            <input type="hidden" name="action" value="sip_save_option">
            <input type="submit" value="Save Changes" name="submit" class="button-primary">
        </p>
    </form>
    </div>
</div>

    <?php
}

add_action('init','sip_add_option_type');

function sip_add_option_type(){
    if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'sip_save_option') {

        update_option('sip_title',sanitize_text_field($_REQUEST['sip_title']));
        update_option('sip_title_font',sanitize_text_field($_REQUEST['sip_title_font']));
        update_option('sip_title_color',sanitize_text_field($_REQUEST['sip_title_color']));
        update_option('sip_investamount_color',sanitize_text_field($_REQUEST['sip_investamount_color']));
        update_option('sip_profitamount_color',sanitize_text_field($_REQUEST['sip_profitamount_color']));
        update_option('sip_slider_activ_color',sanitize_text_field($_REQUEST['sip_slider_activ_color']));
        update_option('sip_slider_progress_color',sanitize_text_field($_REQUEST['sip_slider_progress_color']));
        update_option('sip_slider_thumb_back_color',sanitize_text_field($_REQUEST['sip_slider_thumb_back_color']));
        update_option('sip_time_back_color',sanitize_text_field($_REQUEST['sip_time_back_color']));
        update_option('sip_time_text_color',sanitize_text_field($_REQUEST['sip_time_text_color']));
        update_option('sip_result_head_back_color',sanitize_text_field($_REQUEST['sip_result_head_back_color']));
        update_option('sip_result_head_text_color',sanitize_text_field($_REQUEST['sip_result_head_text_color']));
        update_option('sip_result_body_bg_color',sanitize_text_field($_REQUEST['sip_result_body_bg_color']));
        update_option('sip_result_body_text_color',sanitize_text_field($_REQUEST['sip_result_body_text_color']));
        update_option('sip_result_body_hover_bg_color',sanitize_text_field($_REQUEST['sip_result_body_hover_bg_color']));

        if(!empty($_REQUEST['sip_enable_chart'])) {
            update_option('sip_enable_chart',sanitize_text_field($_REQUEST['sip_enable_chart']));
        }else{
            update_option('sip_enable_chart','');
        }

        if(!empty($_REQUEST['sip_enable_table'])) {
            update_option('sip_enable_table',sanitize_text_field($_REQUEST['sip_enable_table']));
        }else{
            update_option('sip_enable_table','');
        }
        update_option('sip_chart_type',sanitize_text_field($_REQUEST['sip_chart_type']));

        update_option('expected_amount_text',sanitize_text_field($_REQUEST['expected_amount_text']));
        update_option('amount_invested_text',sanitize_text_field($_REQUEST['amount_invested_text']));
        update_option('profit_earned_text',sanitize_text_field($_REQUEST['profit_earned_text']));
        update_option('chart_invested_amount_text',sanitize_text_field($_REQUEST['chart_invested_amount_text']));
        update_option('chart_profit_earned_text',sanitize_text_field($_REQUEST['chart_profit_earned_text']));
        update_option('default_invested_amount',sanitize_text_field($_REQUEST['default_invested_amount']));
        update_option('min_invested_amount',sanitize_text_field($_REQUEST['min_invested_amount']));
        update_option('max_invested_amount',sanitize_text_field($_REQUEST['max_invested_amount']));
        update_option('default_investment_period',sanitize_text_field($_REQUEST['default_investment_period']));
        update_option('min_investment_period',sanitize_text_field($_REQUEST['min_investment_period']));
        update_option('default_expected_annual',sanitize_text_field($_REQUEST['default_expected_annual']));
        update_option('min_expected_annual',sanitize_text_field($_REQUEST['min_expected_annual']));
        update_option('max_expected_annual',sanitize_text_field($_REQUEST['max_expected_annual']));

        wp_redirect( admin_url( '/admin.php?page=sip_calculator_generator&succes=sucee' ));
    }
}

?>