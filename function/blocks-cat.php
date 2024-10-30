<?php
    class KITICON_Cat {
        public function __construct() {
            add_filter('block_categories', array( $this, 'kiticon_block_categories' ), 10, 2);
        }
        public function kiticon_block_categories( $categories, $post ) {
            return array_merge(
                $categories,
                array(
                    array(
                        'slug' => 'kiticon',
                        'title' => __( 'KitIcon Blocks', 'kit-icon' ),
                        'icon'  => 'admin-customizer',
                    ),
                )
            );
        }
    }
$kiticon_categories = new KITICON_Cat();