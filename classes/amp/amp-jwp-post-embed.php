<?php
/**
 * Class XYZ_AMP_JWP_Sanitizer
 *
 * Una clase para agregar un JWPlayer sanitizado para AMP
 */

class XYZ_AMP_JWP_Sanitizer extends AMP_Base_Sanitizer {

    public function sanitize() {
        $body = $this->dom->body;

        $script_nodes = $body->getElementsByTagName( 'script' );

        $index = 0;
        foreach ( $script_nodes as $script ) {

            $src = esc_url( $script->getAttribute('src') );

            if( preg_match( '/https:\/\/cdn.jwplayer.com\/players\/\S+.js/', $src, $output ) ) :

                preg_match('/(\w)+(-{1})(\w)+/', $output[0], $player);

                $jwp_data = explode( '-', $player[0] );

                if( is_array( $jwp_data ) && ! empty( $jwp_data[0] ) && ! empty( $jwp_data[1] ) ) :

                    $jwp_node = AMP_DOM_Utils::create_node( $this->dom, 'amp-jwplayer', [
                        'data-player-id'    => $jwp_data[1],
                        'data-media-id'     => $jwp_data[0],
                        'layout'            => 'responsive',
                        'width'             => '16',
                        'height'            => '9'
                    ]);

                    $script_nodes->item( $index )->parentNode->insertBefore( $jwp_node, $script_nodes->item( $index ) );

                endif;

            endif;
            $index++;
        }

    }

}