<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;



class KITICON_Block {
    function __construct(){
        add_action( 'carbon_fields_register_fields', [$this, 'kiticon_block_fun'] );       
    }
    function kiticon_block_fun(){
        wp_enqueue_style( 'kiticon-block-stylesheet', plugins_url("/kiticon-icons.css", __FILE__ ));
        Block::make( __( 'KitIcon Icon' ) )
        
        ->add_tab( __( 'Icon Style' ), array(

            Field::make( 'color', 'kiticon_icon_color', 'Icon Color' ),

            Field::make( 'text', 'kiticon_icon_font_size', __( 'Font Size like 20 no need like 20 px gere' ) ),

            Field::make( 'radio', 'kiticon_icon_align', __( 'Icon alignment' ) )
                ->add_options( array(
                    'left' => __( 'Left' ),
                    'center' => __( 'Center' ),
                    'right' => __( 'Right' ),
                ) ),
        ) )

        ->add_tab( __( 'Icon list' ), array(
            Field::make( 'radio_image', 'kiticon_icon', __( 'Choose Icon' ) )
                ->set_options( kiticon_icon_lib() ),
        ) )



        ->set_description( __( 'KitIcon An Advance Gutenberg Block For Icon' ) )
        ->set_category( 'kiticon' )
        ->set_icon( 'smiley' )
        ->set_keywords( [ __( 'icon' ), __( 'icons' ), __( 'icon block' ) ] )
        ->set_editor_style( 'kiticon-block-stylesheet' )
        ->set_preview_mode( true )
        ->set_render_callback( function ( $fields ) {

    ?>
    <?php
        $kiticon_icon_value = 'alarm-fill';
        $kiticon_icon_value = isset($fields['kiticon_icon']) ? $fields['kiticon_icon'] : '';
        $kiticon_icon_align = isset($fields['kiticon_icon_align']) ? $fields['kiticon_icon_align'] : '';
        $kiticon_icon_font_size = isset($fields['kiticon_icon_font_size']) ? $fields['kiticon_icon_font_size'] : '';
        $kiticon_icon_color = isset($fields['kiticon_icon_color']) ? $fields['kiticon_icon_color'] : '';
        
        if($kiticon_icon_align == '') :
            $kiticon_icon_align = 'center';
        endif;
        if($kiticon_icon_color == '') :
            $kiticon_icon_color = '#000000';
        endif;
        if($kiticon_icon_font_size == '') :
            $kiticon_icon_font_size = '100';
        endif;
        $kitIconStyle = "text-align: $kiticon_icon_align; color: $kiticon_icon_color; font-size: $kiticon_icon_font_size". '' ."px;";
    ?>
        <div class="kiticon-area">
            <div class="kiticon-icon" style="<?php echo esc_attr( $kitIconStyle ); ?>">
                <?php 
                    if($kiticon_icon_value == '') :
                        echo file_get_contents(plugins_url("./icons/" . 'alarm-fill' . ".svg", __FILE__ ));
                    else :
                        echo file_get_contents(plugins_url("./icons/" . $kiticon_icon_value . ".svg", __FILE__ ));
                    endif;
                ?>
            </div>
        </div>
    <?php
        } );
    }
}
new KITICON_Block();