<?php

if ( ! function_exists( 'child_theme_enqueue_styles' ) ) {
	/**
	 * 子テーマ用のCSSを読み込み。
     * 親CSSファイル > 子CSSファイルの順で読み込むよう制御
	 */
	function child_theme_enqueue_styles() {
	    // デフォルトの子テーマ用CSSファイル登録を解除
		wp_deregister_style( 'style' );

		// 親テーマのCSSファイルの登録
		wp_register_style(
			'parent-style',
			get_template_directory_uri() . '/style.css',
            array(),
			filemtime( get_template_directory() . '/style.css' )
		);

		// 親テーマと子テーマのCSSファイルを読み込み
		wp_enqueue_style(
		    'child-style',
			get_theme_file_uri() . '/style.css',
            array( 'parent-style' ),
			filemtime( get_theme_file_path( '/style.css' ) )
        );
	}
	add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles' );
}
