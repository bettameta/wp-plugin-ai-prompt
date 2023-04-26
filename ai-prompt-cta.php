<?php
/*
Plugin Name: AI Prompt CTA
Description: Adds an AI prompt CTA to the bottom of posts
Version: 1.2
Author: Reese St Amant
Author URI: https://bettameta.com
License: GPL2
*/

// Enqueue the necessary stylesheets and scripts
function ai_prompt_cta_enqueue_scripts() {
    wp_enqueue_style( 'ai-prompt-cta-style', plugin_dir_url( __FILE__ ) . 'ai-prompt-cta.css' );
    wp_enqueue_script( 'ai-prompt-cta-script', plugin_dir_url( __FILE__ ) . 'ai-prompt-cta.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'ai_prompt_cta_enqueue_scripts' );

// Add the AI prompt CTA HTML to the bottom of posts
function ai_prompt_cta_add_html( $content ) {
    if ( is_single() ) {
        $html = '<div class="ai-prompt-cta">';
        $html .= '<p>Get personalized recommendations for your next read with our AI-powered book suggestion tool.</p>';
        $html .= '<a href="#" class="ai-prompt-cta-button">Get Recommendations</a>';
        $html .= '</div>';
        $content .= $html;
    }
    return $content;
}
add_filter( 'the_content', 'ai_prompt_cta_add_html' );
?>
