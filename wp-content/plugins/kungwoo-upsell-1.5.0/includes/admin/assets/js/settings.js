!function(t){"use strict";t(function(){function a(a){t(".nav-tab-wrapper .nav-tab").removeClass("nav-tab-active"),t('.nav-tab-wrapper .nav-tab[href="'+a+'"]').addClass("nav-tab-active"),t("#post-body-content .table").addClass("ui-tabs-hide"),t("#post-body-content "+a).removeClass("ui-tabs-hide"),t("#post-body-content #plugin-settings-form").attr("action","options.php"+a)}if(t(".nav-tab-wrapper").length>0){var e=window.location.hash;""==e&&(e=t(".nav-tab").first().attr("href"),history.pushState?history.pushState(null,null,e):window.location.hash=e),a(e),t(".nav-tab-wrapper > .nav-tab").on("click",function(e){e.preventDefault();var o=t(".nav-tab").closest(".nav-tab-active").attr("href"),i=t(this).attr("href");return o!==i&&(a(i),history.pushState?history.pushState(null,null,i):window.location.hash=i),!1})}t(".field-colorpicker").length>0&&(t(".field-colorpicker").wpColorPicker(),t(".wp-picker-holder").click(function(t){t.preventDefault()})),t(".upload-image-button").length>0&&t(document).on("click",".upload-image-button",function(){var a=t(this).closest(".field-upload-image-wrapper").children(".field-upload-image"),e=t(this).closest(".field-upload-image-wrapper").children(".field-upload-image-preview");return window.send_to_editor=function(o){var i=t("img",o).attr("src");t(a).val(i),t("img",e).attr("src",i),window.send_to_editor=window.original_send_to_editor,tb_remove()},tb_show("Image Upload","media-upload.php?type=image&amp;TB_iframe=true&amp;post_id=0",!1),!1})})}(jQuery);