<?php

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

function true_include_myuploadscript() {

    if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }
    // само собой - меняем admin.js на название своего файла
    wp_enqueue_script( 'myuploadscript', get_stylesheet_directory_uri() . './js/main.js', array('jquery'), null, false );
    wp_enqueue_style( 'main-stylesheet', get_stylesheet_directory_uri());
}

add_action( 'admin_enqueue_scripts', 'true_include_myuploadscript' );

// стили и скрипты для метабоксов админ панели
add_action( 'admin_enqueue_scripts', 'theme_name_scripts' );
// add_action('wp_print_styles', 'theme_name_scripts'); // можно использовать этот хук он более поздний
function theme_name_scripts() {
    wp_enqueue_style( 'admin-style', get_template_directory_uri().'/css/admin_custom_fields.css' );
}

function true_image_uploader_field( $name, $value = '', $w = 115, $h = 90) {
    $default = get_stylesheet_directory_uri() . '/img/no-image.jpg';
    if( $value ) {
        $image_attributes = wp_get_attachment_image_src( $value, array($w, $h) );
        $src = $image_attributes[0];
    } else {
        $src = $default;
    }
    echo '
    <div>
        <img id="_custom_imgg" data-src="' . $default . '" src="' . $src . '" width="' . $w . 'px" height="' . $h . 'px" />
        <div>
            <input type="hidden" name="' . $name . '" id="' . $name . '" value="' . $value . '" />
            <button type="submit" class="upload_image_button button">Add</button>
            <button type="submit" class="remove_image_button button">Remove</button>
        </div>
    </div>
    ';
}


add_action( 'add_meta_boxes', 'true_add_metabox' );

function true_add_metabox() {

    add_meta_box(
        'test_metabox', // ID нашего метабокса
        'Тест настройки продукта', // заголовок
        'test_metabox_callback', // функция, которая будет выводить поля в мета боксе
        'product', // типы постов, для которых его подключим
        'normal', // расположение (normal, side, advanced)
        'default' // приоритет (default, low, high, core)
    );

}

function test_metabox_callback() {

    global $post;
    echo '<div class="options_group">';// Группировка полей

    if( function_exists( 'true_image_uploader_field' ) ) {
        true_image_uploader_field( '_custom_img', get_post_meta($post->ID, '_custom_img',true) );
    }

    woocommerce_wp_text_input(
        array(
            'type' => 'date',
            'label' => 'Дата добавления товара ',
            'id' => '_custom_date'
        ));

    woocommerce_wp_select(
        array(
            'id' => '_custom_type',
            'label' => 'Тип товара',
            'options' => array(
                '' => 'тип продукта',
                'rare' => 'rare',
                'frequent' => 'frequent',
                'unusual' => 'unusual'
            )
        ));
    echo "<button id='publish_btn'>Добавить / Обновить</button><span class='spinner'></span>";
    echo "<button id='reset_test'>Сброс</button>";
    echo '</div>';




}


function art_woo_custom_fields_save( $post_id ) {

    // Сохранение картинки.
    $woocommerce_custom_img = $_POST['_custom_img'];
    if ( ! empty( $woocommerce_custom_img ) ) {
        update_post_meta( $post_id, '_custom_img', esc_attr( $woocommerce_custom_img ) );
        $thumb_id = get_post_meta($post_id)['_custom_img'][0];
        set_post_thumbnail( $post_id, $thumb_id );
    } else {
        delete_post_meta($post_id, '_custom_img');
        delete_post_thumbnail($post_id);
    }

    // Сохранение даты создания.
    $woocommerce_custom_date = $_POST['_custom_date'];
    if ( ! empty( $woocommerce_custom_date ) ) {
        update_post_meta( $post_id, '_custom_date', esc_attr( $woocommerce_custom_date ) );
    } else {
       delete_post_meta($post_id, '_custom_date');
    }


    // Сохранение типа продукта.
    $woocommerce_custom_type = $_POST['_custom_type'];
    if ( ! empty( $woocommerce_custom_type ) ) {
        update_post_meta( $post_id, '_custom_type', esc_attr( $woocommerce_custom_type ) );
    } else {
        delete_post_meta($post_id, '_custom_type');
    }
}

add_action( 'woocommerce_process_product_meta', 'art_woo_custom_fields_save' );

/*
 * Сохраняем данные произвольного поля
 */



/*Скрытие блока изображения продукта по умолчанию*/
add_action( 'add_meta_boxes' , 'true_remove_meta_boxes' );

function true_remove_meta_boxes() {
    // метабокс рубрик
    remove_meta_box( 'postimagediv', 'product', 'side' );
}


