<?php

if ( ! function_exists( 'child_theme_enqueue_styles' ) ) {
    /**
     * 子テーマ用のCSSを読み込み。
     * 親CSSファイル > 子CSSファイルの順で読み込む。
     */
    function child_theme_enqueue_styles() {
        // 親テーマのCSSファイルの登録
        wp_enqueue_style(
            'parent-style',
            get_template_directory_uri() . '/style.css'
        );
    }
    add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles' );
}
