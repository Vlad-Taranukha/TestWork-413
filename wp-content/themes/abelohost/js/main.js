
jQuery(function($){
    /*
     * действие при нажатии на кнопку загрузки изображения
     */
    $('.upload_image_button').click(function(){
        let send_attachment_bkp = wp.media.editor.send.attachment;
        let button = $(this);
        wp.media.editor.send.attachment = function(props, attachment) {
            $(button).parent().prev().attr('src', attachment.url);
            $(button).prev().val(attachment.id);
            wp.media.editor.send.attachment = send_attachment_bkp;
        };
        wp.media.editor.open(button);
        return false;
    });

    /*Функция очистки картинки (кнопка remove)*/
    function clearCustomPosts() {
        let src = $('#_custom_imgg').attr('data-src');
        $('#_custom_imgg').attr('src', src);
        $('#_custom_img').val('');
    }

    $('.remove_image_button').click(function(){
        clearCustomPosts();
        return false;
    });

    /*Кнопка reset*/
    $('#reset_test').click(function (e) {
        e.preventDefault();
        clearCustomPosts();
        $('#_custom_date').removeAttr('value');
        $("#_custom_type option").removeAttr('selected');
    });

    /*Кнопка добавить / обновить*/
    $('#publish_btn').click(function (e) {
        e.preventDefault();
        $('#publish').trigger(e.type);
    });

});