
let main = function () {
    let stopPropagation = function () {
        $(".wrap,.search-button,.search-results,.show-user-menu").on("click", function (e) {
            e.stopPropagation();
        });
    };

    let on_click_body = function (){
        $('body').on('click',function () {
            $('header .content-header .links').removeClass('active-links');
            $(this).find('.hamburger--squeeze').removeClass("is-active");
            $('.search-results').removeClass('active');
            $('.user-menu').removeClass('active');
        });
    }

    let show_links_header = function () {
        $('#show-links-header').on('click',function () {
           $('header .content-header .links').toggleClass('active-links');
            $(this).find('.hamburger--squeeze').toggleClass("is-active");
            $('.user-menu').removeClass('active');
        });
    }

    let show_search_box = function () {
        $('.search-button').on('click', function () {
            setTimeout(function() { $('#input-search').focus(); }, 200);
            $(this).parent().find('.search-results').toggleClass('active');
            $('.user-menu').removeClass('active');
        });
    }
    let show_user_menu = function () {
        $('.show-user-menu').on('click', function () {
            $(this).parent().find('.user-menu').toggleClass('active');
            $('.search-results').removeClass('active');
        });
    }

    var shop_by_categories_swiper = function () {
        new Swiper('#shop_by_categories_swiper', {
            slidesPerView: 'auto',
            speed: 1420,
            spaceBetween: 40,
            breakpoints: {
                320: {
                    spaceBetween: 20
                },
                640: {
                    spaceBetween: 40
                }
            }
        });
    }
    var featured_products_swiper = function () {
        new Swiper('#featured_products_swiper', {
            slidesPerView: 'auto',
            speed: 1420,
            spaceBetween: 40,
            breakpoints: {
                320: {
                    spaceBetween: 20
                },
                640: {
                    spaceBetween: 40
                }
            }
        });
    }

    var bestseller_this_week_swiper = function () {
        new Swiper('#bestseller_this_week_swiper', {
            slidesPerView: 'auto',
            speed: 1420,
            spaceBetween: 40,
            breakpoints: {
                320: {
                    spaceBetween: 20
                },
                640: {
                    spaceBetween: 40
                }
            }
        });
    }

    var what_visitors_see_swiper = function () {
        new Swiper('#what_visitors_see_swiper', {
            slidesPerView: 'auto',
            speed: 1420,
            spaceBetween: 40,
            breakpoints: {
                320: {
                    spaceBetween: 20
                },
                640: {
                    spaceBetween: 40
                }
            }
        });
    }

    var best_seller_swiper = function () {
        new Swiper('#best_seller_swiper', {
            slidesPerView: 'auto',
            speed: 1420,
            spaceBetween: 40,
            breakpoints: {
                320: {
                    spaceBetween: 20
                },
                640: {
                    spaceBetween: 40
                }
            }
        });
    }
    var large_swiper = function () {
        new Swiper('#large_swiper', {
            // slidesPerView: 'auto',
            speed: 1420,
            spaceBetween: 0,
            pagination: {
                el: ".large-swiper .swiper-pagination",
                clickable:true
            },
        });
    }

    var like_button = function () {
        $(".like-button").on('click', function () {
            $(this).toggleClass('active');

            var product_id =  $(this).attr('productid');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/fav_product",
                type: 'GET',
                data: {
                    product_id :product_id

                },
                success: function(resp) {
                    console.log(resp);
                    display_error_messages('success', resp.message)
                    // $("#user_image_div").load(location.href + " #user_image_div");
                },
                error: function(resp) {

                    $.each(resp.responseJSON.errors, function(i, error) {
                        display_error_messages("error", error[0]);

                    });


                },
                'complete': function() {}
            });

        })
    }

    var go_top_function = function (){
        $('.go-top-button').on('click',function (){
            $("html, body").animate({ scrollTop: 0 }, 1600);
            return false;
        });
    }

    var open_main_list = function () {
        $('#main-list-btn').on('click', function () {
            $(this).parent().find('.main-list').toggleClass('active-main-list');
        });
        $('.open-list-wrap').on('click', function () {
            $('.list-wrap').removeClass('active-list-wrap');
            $(this).parent().find('.list-wrap').toggleClass('active-list-wrap');
        });
    }

    var change_profile_image = function () {
        $('#input_file_img').on('change', function (e) {
            const file = e.target.files[0];
            let reader = new FileReader();
            let src = null;
            reader.readAsDataURL(file);
            src = URL.createObjectURL(file);
            $('#user_image').attr('src',src)
        });
    }

    var delete_order = function () {
        $('.remove-order-btn').on('click',function () {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#872CFF',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        })
    }

    var increase_count = function () {
        let count = 0;
        $('.increase-order .plus').on('click',function () {
            count += 1;
            $(this).parents('.increase-order').find('input').val(count);
        });
        $('.increase-order .min').on('click',function () {
            if(count <= 0) {
                count = 0;
            }else{
                count -= 1;
            }
            $(this).parents('.increase-order').find('input').val(count);
        })
    }

    return {
        init: function () {
            increase_count();
            delete_order();
            change_profile_image();
            stopPropagation();
            show_links_header();
            on_click_body();
            show_search_box();
            show_user_menu();
            like_button();
            go_top_function();
            open_main_list();
            // SWIPER
            shop_by_categories_swiper();
            featured_products_swiper();
            bestseller_this_week_swiper();
            what_visitors_see_swiper();
            best_seller_swiper();
            large_swiper();

        }
    }
}();

$(document).ready(function () {
    main.init();

});
