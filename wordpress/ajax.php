<?php

function load_scripts() {
    global $post;
    if ( 'post-name' == $post->post_name ):
        ?>
        <script type="text/javascript">
            jQuery(function ($) {
                
                $('#submit').on('click', function (e) {
                
                    e.preventDefault();

                    const title = $('#title').val(),
                        image = $('#image')[0].files[0],
                        product_id = $('#product_id').val(),
                        formData = new FormData;

                    formData.append('title', title);
                    formData.append('image', image);
                    formData.append('product_id', product_id);
                    formData.append('action', 'insert_recent_installation');

                    $.ajax({
                        url: "<?php echo admin_url( 'admin-ajax.php' );?>",
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        data: formData,
                        beforeSend: function() {
                            console.log('Request Departed');
                            insertInstallationBtn.attr('disabled', true);
                            insertInstallationBtn.after("<span id='ajx-loader'><i class='fa fa-spin fa-spinner'></i> Processing ...</span>");
                        },
                        complete: function() {
                            console.log('Request Completed');
                            insertInstallationBtn.siblings('span#ajx-loader').remove();
                        }
                    }).done(function (data) {
                        if (data.status !== undefined && data.status === true) {
                            console.log('I\'m here successfully !');
                        } else {
                            const errMsg = (data.response_text !== undefined)
                                ? data.response_text : 'Sorry, Something Went Wrong !';
                            console.error(errMsg);
                            toastr.error(errMsg);
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        toastr.error('Sorry, Something Went Wrong !');
                        console.error('Sorry, Something Went Wrong !');
                        console.warn(jqXHR);
                        console.warn(textStatus);
                        console.warn(errorThrown);
                    });
                });
            });
        </script>
        <?php
    endif;
}

add_action( 'wp_footer', 'load_scripts' );
