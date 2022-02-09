<?php
header("Content-type: text/css; charset: UTF-8");
echo cs_get_option( 'custom-css' );


$mobile = cs_get_option('mobile_menu');

$min_mobile = isset($mobile) && $mobile ? '1025px' : '992px';
$max_mobile = isset($mobile) && $mobile ? '1024px' : '991px'; ?>


.menu-item-label-hot{
    background-color: #222;
    color: #fff;
    font-size: 10px;
    letter-spacing: .2px;
    line-height: 1.3;
    padding: 2px 3px;
    display: inline-block;
    position: relative;
    z-index: 9999;
    margin-left: 3px;
    bottom: 6px;
    vertical-align: super;
}

.aside-menu.static #topmenu .menu li a .menu-item-label-hot{
    border: 1px solid #fff;
}
.aside-menu.static #topmenu .menu li a:hover .menu-item-label-hot{
    background: -webkit-gradient(linear,left top,right top,color-stop(0,#ccc), color-stop(.5,#eee), color-stop(1,#ccc));
    background-color: #222;
    -webkit-background-clip: text;
     -webkit-text-fill-color: transparent;
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-duration: 3s;
    animation-duration: 3s;
    -webkit-animation-timing-function: linear;
    animation-timing-function: linear;
    -webkit-animation-name: slidetounlock;
    animation-name: slidetounlock;
}

.header_top_bg {
    position: relative;
    z-index: 999;
    background-color: #ffffff;
}

.header_top_bg.fixed-header {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 100;
}

header {
    position: relative;
    width: 100%;
    z-index: 999;
    text-align: center;
}

header.absolute {
    position: absolute;
    margin-bottom: 0;
}

header a.logo {
    text-decoration: none;
    display: block;
}

header.zindex,
footer.zindex {
    z-index: 1 !important;
}

.header_top_bg.enable_fixed.fixed {
    position: fixed;
    z-index: 1000;
    width: 100%;
    top: 0;
}

.header_trans-fixed.header_top_bg {
    background-color: transparent;
    position: fixed;
    z-index: 1000;
    top: 0;
    width: 100%;
}

.header_trans-fixed.header_top_bg.open header .logo span,
.header_trans-fixed.header_top_bg.open header .mob-nav i {
    color: #222222;
}

.single-post .header_trans-fixed.bg-fixed-color {
    margin-left: 0;
    width: 100%;
}

.top-menu {
    padding-bottom: 10px;
}

.top-menu .logo {
    display: inline-block;
}


.right-menu .logo span,
.only_logo .logo span {
    vertical-align: middle;
    text-align: left;
    font-family: "Playfair Display", sans-serif;
    font-size: 28px;
    line-height: 1.8;
    font-weight: 900;
    letter-spacing: 2px;
    color: #222222;
    white-space: nowrap;
    text-transform: uppercase;
}
.menu_light_text .right-menu .logo span {
    color: #ffffff;
}
.right-menu #topmenu {
    text-align: right;
}

.no-menu {
    display: inline-block;
    margin-top: 12px;
}

.header_top_bg.bg-fixed-color .top-menu .logo span,
.header_top_bg.bg-fixed-color .right-menu #topmenu ul li ul li a,
.menu_light_text .right-menu #topmenu ul li ul li a,
.socials-mob-but i,
.header_top_bg.bg-fixed-color .right-menu #topmenu ul li a,
.header_top_bg.bg-fixed-color.menu_light_text .right-menu #topmenu ul li a,
.header_top_bg.bg-fixed-color .right-menu #topmenu .search-icon-wrapper i,
.header_top_bg.bg-fixed-color.menu_light_text .right-menu #topmenu .search-icon-wrapper i,
.header_top_bg.bg-fixed-color .right-menu #topmenu .wiso-shop-icon::before,
.header_top_bg.bg-fixed-color.menu_light_text .right-menu #topmenu .wiso-shop-icon::before {
    color: #222222;
}
.header_top_bg.bg-fixed-dark .top-menu .logo span,
.header_top_bg.bg-fixed-dark .right-menu #topmenu ul li a,
.header_top_bg.bg-fixed-dark.menu_light_text .right-menu #topmenu ul  li a,
.header_top_bg.bg-fixed-dark .right-menu #topmenu .search-icon-wrapper i,
.header_top_bg.bg-fixed-dark.menu_light_text .right-menu #topmenu .search-icon-wrapper i,
.header_top_bg.bg-fixed-dark .right-menu #topmenu .wiso-shop-icon::before,
.header_top_bg.bg-fixed-dark.menu_light_text .right-menu #topmenu .wiso-shop-icon::before {
    color: #ffffff;
}
.header_top_bg.bg-fixed-dark .right-menu #topmenu ul.sub-menu li a,
.header_top_bg.bg-fixed-dark.menu_light_text .right-menu #topmenu ul.sub-menu  li a {
    color: #222222;
}


#topmenu {
    width: 100%;
    text-align: center;
    background: #ffffff;
}

#topmenu ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: inline-block;
}

#topmenu ul li {
    display: inline-block;
    position: relative;
}

#topmenu ul li a {
    font-size: 12px;
    font-weight: 600;
    line-height: 2;
    letter-spacing: 2px;
    color: #222222;
    display: block;
    text-align: left;
    text-decoration: none;
    padding: 0 20px;
    transition: all .3s ease;
    -webkit-font-smoothing: antialiased;
    text-transform: uppercase;
}

.header_trans-fixed.header_top_bg.open #topmenu ul li a {
    color: #222222;
}

.top-menu #topmenu > ul > li > a,
.top-menu #topmenu ul.social > li > a {
    padding: 0;
}

#topmenu .social .fa {
    font-size: 18px;
}

.top-menu .logo img {
    max-height: 100px;
}

#topmenu ul ul {
    position: absolute;
    z-index: 999;
    left: 0;
    top: 50px;
    min-width: 250px;
    display: none;
    box-sizing: border-box;
}

#topmenu ul ul li::before {
    content: '';
    display: table;
    clear: both;
}

#topmenu ul ul li a {
    padding: 3px 30px;
    display: block;
    width: 100%;
    position: relative;
    -webkit-font-smoothing: antialiased;
}

#topmenu > ul > li > ul > li:hover ul {
    display: block;
}

#topmenu > ul > li > ul > li > ul {
    left: 101%;
    top: -15px;
}

.mob-nav {
    display: none;
    width: 20px;
    height: 20px;
    margin: 0 auto 12px;
    font-size: 14px;
    color: #222222;
    opacity: 1;
}

.mob-nav:hover {
    opacity: 0.7;
}

.header_trans-fixed .mob-nav i {
    color: #fff;
}

.header_trans-fixed.header_top_bg {
    transition: background-color 300ms ease;
}

.header_trans-fixed.header_top_bg.bg-fixed-color {
    background-color: #fff;
}
.header_trans-fixed.header_top_bg.bg-fixed-dark {
    background-color: #222;
}
.header_trans-fixed.header_top_bg.bg-fixed-color .mob-nav .line {
    background-color: #222;
}
.header_trans-fixed.header_top_bg.bg-fixed-dark .mob-nav .line {
    background-color: #fff;
}
.menu_light_text.header_trans-fixed.header_top_bg.bg-fixed-color .logo span,
.header_trans-fixed.header_top_bg.bg-fixed-color .logo span {
    color: #222;
}
.menu_light_text.header_trans-fixed.header_top_bg.bg-fixed-dark .logo span,
.header_trans-fixed.header_top_bg.bg-fixed-dark .logo span {
    color: #ffffff;
}
.menu_light_text .right-menu .mob-nav .line {
    background-color: #ffffff;
}
.right-menu .topmenu.open .mob-nav .line {
    background-color: #222222;
}
.wiso-top-social {
    display: inline-block;
    margin-left: 0px;
    position: relative;
    vertical-align: middle;
}

.wiso-top-social .social-icon {
    display: none;
    font-size: 14px;
    color: #222222;
    opacity: 1;
    padding: 0 20px;
    cursor: pointer;
    transition: opacity 0.3s ease;
    position: relative;
    z-index: 30;
}

.header_trans-fixed .wiso-top-social .social-icon {
    color: #fff;
}

.wiso-top-social .social-icon:hover {
    opacity: 0.7;
}

#topmenu .wiso-top-social .social {
    margin-left: 0;
}

#topmenu .social li {
    display: inline-block;
    margin-left: 12px;
}

#topmenu .wiso-top-social .social li a {
    margin-left: 0;
    color: #222222;
    opacity: 1;
    transition: opacity 0.3s ease;
}

.header_trans-fixed .right-menu #topmenu .wiso-top-social .social li a {
    color: #fff;
}

#topmenu .wiso-top-social .social li a:hover {
    opacity: 1;
}

.header_trans-fixed .right-menu #topmenu .wiso-top-social .social {
    background-color: transparent;
}

#topmenu .wiso-top-social .social li {
    margin: 5px;
}

#topmenu .wiso-top-social .social.active {
    visibility: visible;
    opacity: 1;
}

#topmenu .wiso-top-social .social li a {
    line-height: 1.2;
}

#topmenu ul > li > ul > li > ul {
    display: none;
}

#topmenu .wiso_mini_cart .product_list_widget .mini_cart_item .mini-cart-data .mini_cart_item_price {
    font-family: "Open Sans", sans-serif;
    color: #222;
    font-size: 15px;
    font-weight: 600;
}

.mini-cart-wrapper {
    display: inline-block;
    position: relative;
    vertical-align: middle;
}


.mini-cart-wrapper .wiso-shop-icon:hover::before {
    color: #999;
}

.mini-cart-wrapper .wiso-shop-icon:before {
    position: relative;
    display: inline-block;
    line-height: 1;
    -webkit-transition: all 350ms ease;
    -moz-transition: all 350ms ease;
    -ms-transition: all 350ms ease;
    -o-transition: all 350ms ease;
    transition: all 350ms ease;
    color: #222222;
    font-size: 18px;
}

.mini-cart-wrapper .wiso-shop-icon .cart-contents {
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    position: absolute;
    top: -15px;
    right: -15px;
    width: 20px;
    height: 20px;
}

.mini-cart-wrapper .wiso-shop-icon .cart-contents-count {
    font-size: 12px;
    font-weight: 600;
    color: #222;
}

.wiso_mini_cart {
    position: absolute;
    right: -20px;
    top: 50px;
    display: block;
    background-color: #fff;
    opacity: 0;
    visibility: hidden;
    min-width: 360px;
    padding: 23px 30px;
    text-align: center;
    transition: opacity 0.5s ease, visibility 0.5s ease;
    box-shadow: 3px 1px 20px 0 rgba(0, 0, 0, 0.07);
}
.header_trans-fixed #topmenu .wiso_mini_cart .cart_list .mini_cart_item .remove_from_cart_button {
    color: #d8d8d8;
}
#topmenu .wiso_mini_cart .cart_list .mini_cart_item .remove_from_cart_button {
    padding: 0;
    color: #d8d8d8;
    font-size: 30px;
    font-weight: 400;
}
#topmenu .wiso_mini_cart .wiso-buttons {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    margin-bottom: 30px;
}
#topmenu .wiso_mini_cart .wiso-buttons a {
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    color: #222222;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 2px;
    line-height: 2;
    text-transform: uppercase;
    text-decoration: none;
}
#topmenu .wiso_mini_cart .wiso-buttons a:hover i {
    margin-left: 10px;
}
#topmenu .wiso_mini_cart .wiso-buttons a i {
    margin-left: 5px;
    color: #222;
    font-size: 10px;
    -webkit-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
}
.woocommerce-mini-cart__total {
    margin: 0;
    text-transform: none;
    font-size: 15px;
    color: #999999;
}
.woocommerce-mini-cart__total span {
    margin-left: 10px;
    color: #222;
    font-size: 18px;
    font-weight: 600;
}
.mini-cart-wrapper:hover .wiso_mini_cart {
    opacity: 1;
    visibility: visible;
}

#topmenu .wiso_mini_cart .product_list_widget {
    display: block;
}

#topmenu .wiso_mini_cart .product_list_widget .empty {
    font-size: 18px;
    line-height: 28px;
    letter-spacing: 1.4px;
    font-weight: 400;
    color: #fff;
}

#topmenu .wiso_mini_cart .product_list_widget .mini_cart_item {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex-wrap: nowrap;
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: 0;
    padding-bottom: 23px;
    margin-bottom: 23px;
    border-bottom: 1px solid #ddd;
}

#topmenu .wiso_mini_cart .product_list_widget .mini_cart_item .mini_cart_item_thumbnail {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    width: 40%;
    max-width: 70px;
    margin-top: 7px;
}

#topmenu .wiso_mini_cart .product_list_widget .mini_cart_item .mini_cart_item_thumbnail a {
    padding: 0;
    display: block;
}

#topmenu .wiso_mini_cart .product_list_widget .mini_cart_item .mini_cart_item_thumbnail img {
    float: none;
    max-width: 70px;
    width: 100%;
    margin-left: 0;
}

#topmenu .wiso_mini_cart .product_list_widget .mini_cart_item .mini-cart-data {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-align-items: flex-start;
    -ms-flex-align: start;
    align-items: flex-start;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    width: 60%;
    padding-left: 20px;
}

#topmenu .wiso_mini_cart .product_list_widget .mini_cart_item .mini-cart-data .mini_cart_item_name {
    font-family: "Playfair Display", sans-serif;
    font-size: 15px;
    line-height: 1.6;
    letter-spacing: 1.2px;
    font-weight: 600;
    color: #222;
    text-align: left;
    padding: 0;
}

#topmenu .wiso_mini_cart .product_list_widget .mini_cart_item .mini-cart-data .mini_cart_item_quantity {
    font-family: "Open Sans", sans-serif;
    font-size: 12px;
    line-height: 20px;
    letter-spacing: 2.88px;
    font-weight: 400;
    color: #b2b2b2;
    margin-bottom: 3px;
}

#topmenu .wiso_mini_cart a.button {
    margin-bottom: 0;
    letter-spacing: 1.2px;
    line-height: 20px;
    position: relative;
    display: inline-block;
    font-family: "Open Sans", sans-serif;
    font-weight: bold;
    box-sizing: border-box;
    padding: 18px;
    font-size: 15px;
    text-decoration: none;
    -webkit-font-smoothing: antialiased;
    background-color: #222;
    color: #ffffff;
    width: 100%;
    border-radius: 0;
    -webkit-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
}
#topmenu .wiso_mini_cart a.button:hover {
    background-color: #222;
    color: #ffffff;
    background-image: none;
    border-color: #222;
}

#topmenu .wiso_mini_cart a.button:hover::after {
    right: 20px;
}

.header_trans-fixed.none {
    display: none;
}

.header_trans-fixed.header_top_bg .mini-cart-wrapper .wiso-shop-icon .cart-contents-count {
    color: #fff;
}

.wiso_mini_cart .product_list_widget .mini_cart_item .mini_cart_item_thumbnail img {
    height: auto;
}

.socials-mob-but {
    display: none;
}

.socials-mob-but:active,
.socials-mob-but:visited {
    opacity: 1;
}

#topmenu .wiso_mini_cart .product_list_widget .mini_cart_item .mini-cart-data .mini_cart_item_price {
    font-size: 12px;
}

.unit .mini-cart-wrapper .wiso-shop-icon {
    font-size: 25px;
}

header .logo img {
    max-width: none;
    max-height: 75px;
}

header .logo img.logo-hover {
    display: none;
}
header .logo:hover {
    opacity: 1;
}

.header_trans-fixed .f-right > div:first-child::before {
    background: #fff !important;
}

@media only screen and (max-width: 1199px) {
    .wiso-top-social {
        margin-left: 5px;
    }
}

@media (min-width: <?php echo esc_attr($min_mobile); ?>) {
    header .logo img.logo-mobile{
        display: none!important;
    }
    .menu_light_text.header_top_bg  .logo span,
    .menu_light_text.header_top_bg .right-menu .logo span,
    .menu_light_text.header_top_bg .right-menu #topmenu ul li a,
    .menu_light_text.header_top_bg .right-menu #topmenu .wiso-shop-icon::before,
    .menu_light_text.header_top_bg .right-menu #topmenu .search-icon-wrapper i,
    .menu_light_text.header_top_bg .right-menu .socials-mob-but i {
        color: #ffffff;
    }
    .menu_light_text.header_top_bg .right-menu #topmenu .sub-menu li a {
        color: #222222;
    }
    .mob-nav-close {
        display: none;
    }
    .aside-menu .mini-cart-wrapper:hover .wiso_mini_cart {
        opacity: 0;
        visibility: hidden;
    }

    .header_trans-fixed #topmenu {
        background-color: transparent;
    }

    #topmenu ul ul {
        padding: 10px 0;
    }

    .right-menu .logo{
        text-align: left;
    }

    .right-menu .logo,
    .right-menu #top-menu {
        display: table-cell;
        vertical-align: middle;
    }

    .top-menu #topmenu ul ul {
        left: -20px;
    }

    .top-menu .wiso-top-social {
        margin-left: 10px;
    }

    #topmenu ul ul li {
        display: block;
        margin-bottom: 5px;
    }

    #topmenu ul ul li:last-child {
        margin-bottom: 0;
    }

    .top-menu #topmenu > ul:not(.social) > li {
        margin: 0 10px 5px 10px;
        padding: 0;
    }

    #topmenu ul li:hover > ul {
        display: block;
    }

    header:not(.full) #topmenu {
        /*display: block !important;*/
    }

    #topmenu .f-right > div {
        position: relative;
    }

    #topmenu .f-right > div:last-child::before {
        content: none;
    }

    #topmenu > ul > li > ul > li > ul {
        left: -100%;
        top: -15px;
    }

    .sub-menu li a {
        z-index: 1999;
    }

    .pr30md {
        padding-right: 30px !important;
        padding-left: 0 !important;
    }

    .right-menu {
        width: 100%;
        margin: auto;
        display: table;
        padding: 0;
    }

    .right-menu .f-right {
        float: right;
    }

    .right-menu .f-right > div {
        position: relative;
    }

    .right-menu .f-right > div:last-child::before {
        content: none;
    }

    header:not(.full) .right-menu #topmenu {
        text-align: center;
        display: table-cell !important;
        margin-top: 0;
        vertical-align: middle;
    }

    .header_trans-fixed.header_top_bg .right-menu:not(.static) #topmenu > ul > li > a {
        /*padding: 13px 0 13px;*/
        transform: translateZ(0);
    }

    .header_trans-fixed.header_top_bg .right-menu #topmenu > ul ul {
        top: 60px;
    }

    .header_trans-fixed.header_top_bg .right-menu #topmenu > ul ul ul {
        top: -10px;
    }

    .right-menu #topmenu ul ul {
        left: 10px;
        top: 44px;
    }

    .top-menu #topmenu ul ul {
        left: -20px;
        top: 100%;
    }

    .right-menu #topmenu > ul > li > ul > li > ul {
        left: 100%;
        top: -10px;
    }

    .top-menu #topmenu > ul > li > ul > li > ul {
        left: 100%;
        top: -10px;
    }

    .right-menu #topmenu .social {
        text-align: right;
        vertical-align: top;
    }

    .right-menu #topmenu .social li a {
        padding: 0;
        margin-left: 0;
        -webkit-transition: color 350ms ease;
        -moz-transition: color 350ms ease;
        -ms-transition: color 350ms ease;
        -o-transition: color 350ms ease;
        transition: color 350ms ease;
    }

    .right-menu #topmenu .social li a:hover {
        color: #999;
    }

    .right-menu #topmenu .social li a::after,
    .right-menu #topmenu .social li a::before {
        content: none;
    }

    .right-menu #topmenu > ul > li > a {
        position: relative;
        padding: 0;
        margin: 0 23px;
    }

    .right-menu #topmenu > ul > li.current-menu-item > a,
    .top-menu #topmenu > ul > li.current-menu-item > a,
    .right-menu #topmenu > ul > li.current-menu-parent > a,
    .top-menu #topmenu > ul > li.current-menu-parent > a {
        transition: all 0.5s ease;
    }

    .right-menu .logo img {
        max-height: 75px;
        margin: 5px auto;
    }
    .full-width-menu .right-menu .logo img {
        margin: 0;
        max-height: 77px;
    }

    .top-menu #topmenu > ul > li:last-child > ul > li > ul {
        left: calc(-100% - 30px);
    }

    #topmenu .wiso-top-social .social {
        z-index: 25;
        text-align: left;
        transition: opacity 0.3s ease;
    }

    .aside-nav {
        display: none;
    }

    .aside-menu {
        position: fixed;
        top: 0;
        left: 0;
    }

    .aside-menu .topmenu {
        position: fixed;
        top: 0;
        left: -100%;
        height: 100%;
        width: 256px !important;
        padding: 50px 0;
        margin-left: 58px;
        text-align: center;
        background-color: #fff;
        box-sizing: border-box;
        outline: 0;
        z-index: 101;
        backface-visibility: hidden;
        transition: left 0.5s cubic-bezier(0.77, 0, 0.175, 1);
    }

    .aside-menu .topmenu.active-menu {
        left: 0;
    }

    .aside-menu.active-menu {
        left: 0;
    }

    .aside-menu.active-menu .aside-nav .aside-nav-line.line-1 {
        display: none;
    }

    .aside-menu.active-menu .aside-nav .aside-nav-line.line-2 {
        transform: rotate(45deg);
    }

    .aside-menu.active-menu .aside-nav .aside-nav-line.line-3 {
        transform: rotate(-45deg);
    }

    .aside-menu .logo {
        position: absolute;
        z-index: 9999;
        top: 20px;
        left: 31px;
        padding: 20px 0;
    }

    .aside-menu .aside-nav {
        position: fixed;
        display: block;
        left: 0;
        top: 0;
        width: 58px;
        background-color: #030e28;
        height: 100%;
        z-index: 1000;
    }

    .aside-menu .aside-nav .aside-nav-line {
        position: absolute;
        top: 50%;
        left: 18px;
        display: block;
        width: 22px;
        height: 1px;
        background-color: #fff;
        transition: transform .3s ease;
    }

    .aside-menu .aside-nav .aside-nav-line.line-1 {
        transform: translateY(-6px);
    }

    .aside-menu .aside-nav .aside-nav-line.line-3 {
        transform: translateY(6px);
    }

    .aside-menu .aside-nav:hover {
        opacity: 1;
    }

    .aside-menu .aside-nav:focus {
        opacity: 1;
    }

    .aside-menu .aside-nav:hover .aside-nav-line {
        transform: rotate(45deg);
    }

    .aside-menu #topmenu {
        display: table !important;
        border-right: 1px solid #f2f2f2;
    }

    .aside-menu #topmenu ul.menu {
        display: inline-block;
        vertical-align: middle;
        overflow-y: auto;
        width: 100%;
        max-height: 100%;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        z-index: 100;
    }

    .aside-menu #topmenu ul.menu li {
        padding: 7px 20px 7px 45px;
        position: static;
        text-align: left;
        display: block;
    }
    .aside-menu #topmenu ul.menu a {
        display: block;
        text-align: center;
        z-index: 9999;
    }

    .aside-menu #topmenu .f-right {
        float: none;
        position: absolute;
        left: 50%;
        width: calc(100% - 35px);
        transform: translateX(-50%);
        bottom: 40px;
        z-index: 2;
    }

    .aside-menu #topmenu .f-right .wiso-top-social {
        margin-left: 0;
    }

    .aside-menu #topmenu .f-right .wiso-top-social li {
        margin-right: 5px;
        margin-left: 5px;
    }

    .aside-menu #topmenu .f-right .wiso-top-social li {
        margin-left: 0;
        margin-right: 10px;
    }



    .aside-menu #topmenu > ul > li:hover ul,
    .aside-menu #topmenu > ul > li > ul > li:hover ul {
        display: none;
    }


    header:not(.aside-menu):not(.full) #topmenu ul li.mega-menu {
        position: static;
    }

    header:not(.aside-menu):not(.full).right-menu #topmenu ul .mega-menu > ul {
        width: 100%;
        max-width: 1140px;
        left: 50%;
        top: 60px;
        padding: 45px 0 30px;
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
        transform: translateX(-50%);
    }


    header:not(.aside-menu):not(.full) #topmenu ul li.mega-menu:hover > ul::before {
        content: "";
        position: absolute;
        width: 5000px;
        top: 0;
        bottom: 0;
        left: -100%;
        background-color: #fff;
        box-shadow: 3px 1px 20px 0 rgba(0, 0, 0, 0.07);
        z-index: 1;
    }

    header:not(.aside-menu):not(.full) #topmenu ul li.mega-menu > ul > li {
        float: left;
        width: 25%;

    }

    header:not(.aside-menu):not(.full) #topmenu ul li.mega-menu:hover > ul > li > a {
        font-size: 18px;
        font-weight: 800;
        letter-spacing: .2px;
    }

    header:not(.aside-menu):not(.full) #topmenu ul li.mega-menu > ul > li:nth-child(1)::before {
        left: 25%;
    }

    header:not(.aside-menu):not(.full) #topmenu ul li.mega-menu > ul > li:nth-child(2)::before {
        left: 50%;
    }

    header:not(.aside-menu):not(.full) #topmenu ul li.mega-menu > ul > li:nth-child(3)::before {
        left: 75%;
    }

    header:not(.aside-menu):not(.full) #topmenu ul > li.mega-menu > ul.sub-menu > li > ul.sub-menu {
        display: block;
        position: static;
        text-align: left;
        min-width: 100%;
        box-shadow: none;
        padding: 25px 0;
        transition: all .2s ease;
    }

    header:not(.aside-menu):not(.full) #topmenu ul > li.mega-menu > ul > li > ul.sub-menu > li {
        display: block;
        padding: 8px 0;
    }
    header:not(.aside-menu):not(.full) #topmenu ul > li.mega-menu > ul > li > ul.sub-menu > li a {
        opacity: 0;
        -webkit-transform: matrix(1, 0, 0, 1, 0, 20);
        -ms-transform: matrix(1, 0, 0, 1, 0, 20);
        transform: matrix(1, 0, 0, 1, 0, 20);
        -webkit-transition: opacity .75s ease, -webkit-transform .75s ease;
        transition: opacity .75s ease, -webkit-transform .75s ease;
        -o-transition: opacity .75s ease, transform .75s ease;
        transition: opacity .75s ease, transform .75s ease;
        transition: opacity .75s ease, transform .75s ease, -webkit-transform .75s ease;
    }
    header:not(.aside-menu):not(.full).right-menu #topmenu ul .mega-menu ul li {
        position: static;
        display: block;
    }

    header.top-menu #topmenu ul li.mega-menu > ul {
        top: calc(100% - 25px);
    }

    header.top-menu #topmenu ul li.mega-menu > ul > li::before {
        display: none;
    }

    header.top-menu #topmenu ul ul {
        left: 0;
    }

    header.top-menu #topmenu ul li.mega-menu > ul > li:nth-child(1)::before,
    header.top-menu #topmenu ul li.mega-menu > ul > li:nth-child(2)::before,
    header.top-menu #topmenu ul li.mega-menu > ul > li:nth-child(3)::before {
        left: 100%;
        display: block;
        top: 0;
    }

    .top-menu .logo span {
        padding: 24px 10px;
    }

    header.top-menu .logo span {
        padding: 15px 10px;
    }

    .right-menu .logo span {
        float: left;
    }

    .top-menu #topmenu > ul:not(.social) > li {
        margin: 0 0 5px;
        padding: 0 23px;
    }

    .top-menu #topmenu > ul > li:last-child > ul > li > ul {
        left: calc(-100%);
    }

    .top-menu #topmenu > ul > li > ul > li > ul {
        left: calc(100% + 23px);
    }
}

@media (min-width: <?php echo esc_attr($min_mobile); ?>) and (max-width: 1199px) {
    .right-menu #topmenu > ul > li > a {
        margin: 0 18px;
    }
}

@media (min-width: <?php echo esc_attr($max_mobile); ?>) {

    .main-wrapper.unit .right-menu #topmenu > ul > li > a {
        margin: 0 15px;
    }
}
@media only screen and (min-width: <?php echo esc_attr($max_mobile); ?>) and (max-width: 1100px) {
    .main-wrapper.unit .right-menu #topmenu > ul > li > a {
        margin: 0 10px;
    }
}


/*------------------------------------------------------*/
/*---------------------- MOBILE MENU ----------------------*/
@media (max-width: <?php echo esc_attr($max_mobile); ?>) {

    .header_top_bg{
        position: fixed;
        top: 0;
		left: 0;
        width: 100%;
        z-index: 100;

    }

    header .logo img.main-logo:not(.logo-mobile){
        display: none!important;
    }
    header .logo img.logo-mobile{
        display: inline;
        padding: 10px 0;
    }
    .aside-menu.static #topmenu .f-right .copy {
        display: none;
    }

    .header_top_bg > .container {
        width: 100%;
    }

    #topmenu {
        overflow-x: hidden;
    }

    .header_trans-fixed.header_top_bg .mini-cart-wrapper .wiso-shop-icon .cart-contents-count {
        color: #222222;
    }

    .main-wrapper {
        width: 100%;
    }

    .main-wrapper header .logo img {
        max-height: 75px;
    }

    header {
        padding: 10px 45px;
    }

    #topmenu ul li ul {
        box-shadow: none;
        font-style: normal;
    }

    #topmenu ul {
        box-shadow: none;
        font-style: normal;
    }

    .header_top_bg > .container > .row > .col-xs-12 {
        padding: 0;
    }

    .top-menu .logo {
        margin-bottom: 0;
        margin-top: 0;
    }

    .no-padd-mob {
        padding: 0 !important;
    }
    .right-menu #topmenu .menu li.menu-item-has-children,
    #topmenu .menu li.menu-item-has-children {
        position: relative;
        text-align: left;
    }
    .right-menu #topmenu .menu li.menu-item-has-children i,
    #topmenu .menu li.menu-item-has-children i {
        position: absolute;
        top: 16px;
        right: 35px;
    }

    .right-menu #topmenu .menu li.menu-item-has-children > a,
    #topmenu .menu li.menu-item-has-children > a {
        position: relative;
        display: inline-block;
        width: auto!important;
    }
    .unit .mob-nav {
        left: 0;
    }
    .mob-nav {
        display: block;
        margin: 0;
        position: absolute;
        top: 50%;
        left: 20px;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .mob-nav i::before {
        font-size: 24px;
    }
    .sidebar-open {
        height: 100vh;
    }
    .sidebar-open .canvas-wrap {
        left: 320px;
    }
    .sidebar-open .header_top_bg {
        position: fixed;
    }
    .main-wrapper {
        left: 0;
        transition: all .5s ease-in-out;
    }
    .main-wrapper::before {
        content: '';
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.75);
        z-index: 400;
        opacity: 0;
        visibility: hidden;
        -webkit-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }
    .sidebar-open .main-wrapper {
        left: 320px;
        overflow: visible;
    }
    .sidebar-open .main-wrapper::before {
        opacity: 1;
        visibility: visible;
    }
    .mob-nav-close {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: end;
        -ms-flex-pack: end;
        justify-content: flex-end;
        text-decoration: none;
        border-bottom: 1px solid #f1f2f3;
        padding: 30px 0;
    }
    .mob-nav-close span {
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
    }
    .mob-nav-close .hamburger {
        padding: 0 35px;
        padding-left: 15px;
    }
    .mob-nav-close .line {
        display: block;
        width: 24px;
        height: 2px;
        background-color: #222222;
    }

    .mob-nav-close .line:first-of-type {
        -webkit-transform: rotate(45deg) translateY(2px);
        -moz-transform: rotate(45deg) translateY(2px);
        -ms-transform: rotate(45deg) translateY(2px);
        -o-transform: rotate(45deg) translateY(2px);
        transform: rotate(45deg) translateY(2px);
    }

    .mob-nav-close .line:last-of-type {
        -webkit-transform: rotate(-45deg) translateY(-1px);
        -moz-transform: rotate(-45deg) translateY(-1px);
        -ms-transform: rotate(-45deg) translateY(-1px);
        -o-transform: rotate(-45deg) translateY(-1px);
        transform: rotate(-45deg) translateY(-1px);
    }


    #topmenu {
        display: inline-block;
        overflow-y: auto;
        position: fixed;
        text-align: left;
        padding-top: 0;
        padding-bottom: 100px;
        top: 0;
        bottom: 0;
        width: 320px;
        left: -320px;
        background-color: #fff;
        height: 100vh;
        z-index: 100;
        transition: all .5s ease-in-out;
    }
    .sidebar-open #topmenu {
        position: fixed;
        left: 0;
    }
    #topmenu ul ul {
        display: none;
        position: static;
    }

    #topmenu ul.menu > li > ul > li > ul {
        display: none;
    }

    #topmenu ul.menu {
        width: 100%;
        display: inline-block;
        padding-bottom: 30px;
        background-color: #fff;
    }

    #topmenu ul.menu li {
        display: block !important;
        float: none;
        text-align: left;
        margin-bottom: 0;
    }

    #topmenu ul.menu li a::before{
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 320px;
        height: 1px;
        display: block;
        background-color: #f1f2f3;
    }
    #topmenu ul.menu li a {
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #222222;
        padding: 10px 35px;
        line-height: 25px;
        display: inline-block;
        width: auto!important;
        float: none;
        transition: all 0.5s ease;
    }




    /*2 level menu*/
    #topmenu > ul.menu > li > ul > li,
    #topmenu > ul.menu > li > ul > li > ul > li {
        padding-left: 10px;

    }

    #topmenu > ul.menu > li > ul > li > ul > li:last-child {
        margin-bottom: 20px;
    }

    #topmenu .social li a {
        line-height: 25px !important;
    }

    #topmenu .menu li a:hover,
    #topmenu .menu .current-menu-parent > a,
    #topmenu .menu .current-menu-item > a,
    #topmenu .menu .current-menu-ancestor > a {
        color: #999;
    }

    .right-menu #topmenu .social {
        display: block;
    }

    .right-menu #topmenu .social li {
        display: inline-block;
    }

    .right-menu #topmenu .social li a {
        padding: 5px;
    }

    .wiso-top-social .social-icon {
        display: none;
    }

    .right-menu #topmenu .wiso-top-social .social {
        position: static;
        visibility: visible;
        opacity: 1;
    }

    .header_trans-fixed.open .right-menu #topmenu .wiso-top-social .social li a {
        color: #222222;
    }

    .mini-cart-wrapper {
        display: block;
        margin: 20px 10px 30px 10px;
    }

    .wiso_mini_cart {
        opacity: 1;
        visibility: visible;
        position: relative;
        right: auto;
        left: 0;
        top: 10px;
        width: 100%;
        min-width: 0;
    }

    #topmenu ul li.mega-menu:hover > ul > li {
        width: 100%;
    }

    header a.logo {
        display: inline-block;
    }

    #topmenu ul li.mega-menu:hover > ul > li {
        width: auto;
    }

    #topmenu.active-socials {
        left: 0;
        right: 0;
        overflow: visible;
        opacity: 1;
        width: 100%;
    }

    #topmenu .f-right {
        display: block;
        background: #fff;
        padding: 15px;
        text-align: center;
        z-index: 9999;
        width: 100%;
        transition: all 350ms ease;
    }

    #topmenu .f-right.active-socials {
        opacity: 1;
        visibility: visible;
    }

    #topmenu .f-right.active-socials a {
        visibility: visible;
    }

    #topmenu .f-right .header_trans-fixed.open .right-menu #topmenu .wiso-top-social .social li a {
        transition: none;
    }

    .socials-mob-but {
        display: block;
        margin: 0;
        position: absolute;
        top: calc(50% + -3px);
        right: 20px;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .socials-mob-but i::before {
        font-size: 24px;
    }

    #topmenu .social .fa,
    .mini-cart-wrapper .wiso-shop-icon {
        font-size: 28px;
        transition: none;
    }

    .mini-cart-wrapper .wiso-shop-icon {
        margin: 5px;
    }

    .mini-cart-wrapper {
        margin: 0;
        margin-top: -3px;
    }

    .header_trans-fixed.header_top_bg.open header .socials-mob-but i,
    .header_trans-fixed #topmenu .wiso-top-social .social li a,
    .header_trans-fixed .mini-cart-wrapper .wiso-shop-icon::before {
        color: #222222 !important;
    }

    .header_trans-fixed.header_top_bg {
        transition: none;
    }

    .mini-cart-wrapper {
        display: inline-block;
        vertical-align: middle;
    }

    .wiso_mini_cart {
        display: none;
    }

    .wiso-top-social {
        vertical-align: middle;
        margin-left: 0;
    }

    .mini-cart-wrapper .wiso-shop-icon:before {
        margin-top: -3px;
        font-size: 28px;
    }

    .header_trans-fixed.header_top_bg.open {
        background-color: #fff;
        position: fixed;
        z-index: 1000;
        top: 0;
        width: 100%;
    }
    .right-menu .mob-nav .line {
        width: 18px;
        height: 2px;
        background-color: #222222;
        display: block;
        float: left;
        margin: 3px auto;
        -webkit-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .right-menu .mob-nav .hamburger {
        display: inline-block;
        /*width: 20px;*/
    }
    .right-menu .mob-nav .hamburger i {
        font-family: "Open Sans", sans-serif;
        font-style: normal;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
    }
    .header_trans-fixed.menu_light_text .right-menu .mob-nav .hamburger i {
        color: #ffffff;
    }
    .header_trans-fixed .right-menu .mob-nav .hamburger i,
    .header_trans-fixed.bg-fixed-color .right-menu .mob-nav .hamburger i {
        color: #222222;
    }
    .header_trans-fixed.bg-fixed-dark .right-menu .mob-nav .hamburger i {
        color: #fff;
    }
    .right-menu .mob-nav.active .line {
        margin: 0;
        background-color: #222222;
    }
    .right-menu .mob-nav.active .line:nth-of-type(2) {
        opacity: 0;
    }
    .right-menu .mob-nav.active .line:nth-of-type(1) {
        width: 24px;
        -webkit-transform: translateY(2px) rotate(45deg);
        -ms-transform: translateY(2px) rotate(45deg);
        -o-transform: translateY(2px) rotate(45deg);
        transform: translateY(2px) rotate(45deg);
    }
    .right-menu .mob-nav.active .line:nth-of-type(3) {
        width: 24px;
        -webkit-transform: translateY(-4px) rotate(-45deg);
        -ms-transform: translateY(-4px) rotate(-45deg);
        -o-transform: translateY(-4px) rotate(-45deg);
        transform: translateY(-4px) rotate(-45deg);
    }
    .right-menu .mob-nav .line:nth-of-type(2) {
        width: 24px;
    }
    .search-form input {
        width: 100%;
        border: 0;
        border-bottom: 1px solid #222;
        background-color: transparent;
        color: #999999;
        font-size: 15px;
        padding: 14px 0;
    }
    .search-icon-wrapper {
        display: block;
        position: relative;
        margin-top: 30px;
    }
    .search-icon-wrapper i {
        position: absolute;
        top: 50%;
        right: 20px;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
    }
    .search-icon-wrapper .input-group {
        width: 100%;
    }
}

/*------------------------------------------------------*/
/*---------------------- ABOUT SECTION ----------------------*/
@media only screen and (min-width: <?php echo esc_attr($min_mobile); ?>) {
    .about-mob-section-wrap .about-hamburger {
        padding-left: 30px;
        cursor: pointer;
        position: relative;
        z-index: 100;
    }
    .menu_light_text.bg-fixed-color .about-mob-section-wrap .about-hamburger .line {
        background-color: #222222;
    }
    .bg-fixed-dark .about-mob-section-wrap .about-hamburger .line {
        background-color: #fff;
    }
    .menu_light_text.bg-fixed-dark .about-mob-section-wrap .about-hamburger .line {
        background-color: #fff;
    }
    .menu_light_text .about-mob-section-wrap .about-hamburger .line {
        background-color: #ffffff;
    }

    .about-mob-section-wrap .about-hamburger .line {
        display: block;
        background-color: #222222;
        height: 1px;
        width: 21px;
        margin: 5px auto;
        transition: transform .3s ease, background-color .3s ease;
    }
    .about-mob-section-wrap .mobile-about-section {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        width: 500px;
        height: 100%;
        background-color: #000;
        transition: opacity .75s ease, visibility .75s ease, transform .75s ease;
        -webkit-transform:translateX(100%);
        -moz-transform: translateX(100%);
        -ms-transform: translateX(100%);
        -o-transform: translateX(100%);
        transform:translateX(100%);
        visibility: hidden;
    }
    /* style for open about section */
    .about-mob-section-wrap.open .about-hamburger .line {
        background-color: #ffffff;
    }
    .about-mob-section-wrap.open .about-hamburger .line:first-of-type {
        -webkit-transform: rotate(45deg) translateY(4px);
        -moz-transform: rotate(45deg) translateY(4px);
        -ms-transform: rotate(45deg) translateY(4px);
        -o-transform: rotate(45deg) translateY(4px);
        transform: rotate(45deg) translateY(4px);
    }
    .about-mob-section-wrap.open .about-hamburger .line:nth-of-type(2) {
        display: none;
    }

    .menu_light_text.bg-fixed-color .about-mob-section-wrap.open .about-hamburger .line{
        background-color: #fff;
    }

    .about-mob-section-wrap.open .about-hamburger .line:nth-of-type(3) {
        -webkit-transform: rotate(-45deg) translateY(-4px);
        -moz-transform: rotate(-45deg) translateY(-4px);
        -ms-transform: rotate(-45deg) translateY(-4px);
        -o-transform: rotate(-45deg) translateY(-4px);
        transform: rotate(-45deg) translateY(-4px);
    }

    .about-mob-section-wrap.open .mobile-about-section {
        opacity: 1;
        -webkit-transform:translateX(0);
        -moz-transform: translateX(0);
        -ms-transform: translateX(0);
        -o-transform: translateX(0);
         transform: translateX(0);
        visibility: visible;
        overflow-y: auto;
    }

    .about-mob-section-wrap .mobile-about-section .about-social-title{
        font-size: 19px;
        line-height: 1.3;
        font-family:"Open Sans", sans-serif;
        letter-spacing: .2px;
        color: #fff;
        display: block;
        font-weight: 600;
        margin-top: 50px;
        margin-bottom: 20px;
    }
    .about-mob-section-wrap .mobile-about-section .about-gallery-list{
        margin-left: -5px;
        width: -webkit-calc(100% + 10px);
        width: calc(100% + 10px);
    }

    .about-mob-section-wrap .mobile-about-section .about-gallery-list li a{
        background-size: cover;
        background-position: center;
        display: block;
        height: 100%;
        width: 100%;
    }
    .about-mob-section-wrap .mobile-about-section .about-gallery-list li{
        width: calc(33% - 10px);
        display: block;
        float: left;
        margin: 5px;
    }

    .about-mob-section-wrap .about-section-inner .about-gallery-wrap{
        margin-top: 40px;
    }
    .about-mob-section-wrap .about-section-inner .social{
        display: block;
        text-align: left;
        margin-left: 0;
    }

    .about-mob-section-wrap .about-section-inner .social li{
        display: inline-block;
    }

    .about-mob-section-wrap .about-section-inner .social li a{
        color: #fff;
        font-size: 16px;
        margin-right: 30px;
        -webkit-transition: all 350ms ease;
        -moz-transition: all 350ms ease;
        -ms-transition: all 350ms ease;
        -o-transition: all 350ms ease;
        transition: all 350ms ease;
    }
    .about-mob-section-wrap .about-section-inner .social li a:hover{
        opacity: .8;
    }

    .about-mob-section-wrap .about-section-inner {
        text-align: left;
        padding: 120px 100px 65px;
    }
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h1,
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h2,
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h3,
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h4,
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h5,
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h6,
    .about-mob-section-wrap .mobile-about-section .about-text-wrap p {
        color: #ffffff;
    }
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h1,
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h2,
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h3,
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h4,
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h5,
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h6 {
        font-family: "Playfair Display", sans-serif;
        font-weight: 600;
        letter-spacing: 1px;
    }
    .about-mob-section-wrap .mobile-about-section .about-text-wrap p {
        margin-top: 15px;
        max-width: 580px;
        text-align: left;
        line-height: 1.6;
        font-size: 15px;
    }
    .about-mob-section-wrap .mobile-about-section .about-gallery-wrap .mob-about-title {
        margin-bottom: 20px;
        color: #ffffff;
        font-family: "Playfair Display", sans-serif;
        font-size: 30px;
        font-weight: 600;
        letter-spacing: 1px;
        line-height: 1.1;
        width: 100%;
        text-align: left;
    }
    .about-mob-section-wrap .mobile-about-section .about-gallery-wrap .s-back-switch {
        -webkit-background-size: cover;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        position: relative;
    }
    .about-mob-section-wrap .mobile-about-section .about-gallery-wrap .s-back-switch::before {
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0,  .4);
        transition: opacity .3s ease, visibility .3s ease;
        visibility: hidden;
        opacity: 0;
        content: "";
    }
    .about-mob-section-wrap .mobile-about-section .about-gallery-wrap .s-back-switch:hover::before {
        opacity: 1;
        visibility: visible;
    }
}


@media only screen and (max-width: <?php echo esc_attr($max_mobile); ?>) {
    .about-mob-section-wrap .about-hamburger {
        width: 20px;
        cursor: pointer;
        position: absolute;
        top: 50%;
        right: 20px;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        z-index: 100;
    }
    .menu_light_text.bg-fixed-color .about-mob-section-wrap .about-hamburger .line {
        background-color: #222222;
    }
    .menu_light_text.bg-fixed-dark .about-mob-section-wrap .about-hamburger .line {
        background-color: #fff;
    }
    .menu_light_text .about-mob-section-wrap .about-hamburger .line {
        background-color: #ffffff;
    }
    .about-mob-section-wrap .about-hamburger .line {
        display: block;
        width: 18px;
        height: 2px;
        background-color: #222222;
        float: right;
        margin: 3px auto;
        -webkit-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .menu_light_text.bg-fixed-color .about-mob-section-wrap.open .about-hamburger .line{
        background-color: #fff;
    }

    .about-mob-section-wrap .about-hamburger .line:nth-of-type(2) {
        width: 24px;
    }
    .about-mob-section-wrap .mobile-about-section {
        position: fixed;
        top: 0;
        bottom: 0;
        right: 0;
        width: 320px;
        height: 100%;
        background-color: #000;
        transition: opacity .75s ease, visibility .75s ease, transform .75s ease;
        -webkit-transform:translateX(100%);
        -moz-transform: translateX(100%);
        -ms-transform: translateX(100%);
        -o-transform: translateX(100%);
        transform:translateX(100%);
        visibility: hidden;
    }
    /* style for open menu */
    .about-mob-section-wrap.open .mobile-about-section {
        visibility: visible;
        opacity: 1;
        -webkit-transform:translateX(0);
        -moz-transform: translateX(0);
        -ms-transform: translateX(0);
        -o-transform: translateX(0);
        transform: translateX(0);
        overflow-y: auto;
    }
    .about-mob-section-wrap.open .about-hamburger .line {
        background-color: #ffffff;
    }
    .about-mob-section-wrap.open .about-hamburger .line:nth-of-type(2) {
        opacity: 0;
    }
    .about-mob-section-wrap.open .about-hamburger .line:nth-of-type(1) {
        width: 24px;
        -webkit-transform: translateY(7px) rotate(45deg);
        -ms-transform: translateY(7px) rotate(45deg);
        -o-transform: translateY(7px) rotate(45deg);
        transform: translateY(7px) rotate(45deg);
    }
    .about-mob-section-wrap.open .about-hamburger .line:nth-of-type(3) {
        width: 24px;
        -webkit-transform: translateY(-9px) rotate(-45deg);
        -ms-transform: translateY(-9px) rotate(-45deg);
        -o-transform: translateY(-9px) rotate(-45deg);
        transform: translateY(-9px) rotate(-45deg);
    }
    /*end of*/

    .about-mob-section-wrap .about-section-inner {
        padding: 65px 40px 40px;
    }
    .about-mob-section-wrap .mobile-about-section .about-social-title{
        font-size: 19px;
        line-height: 1.3;
        font-family:"Open Sans", sans-serif;
        letter-spacing: .2px;
        color: #fff;
        display: block;
        font-weight: 600;
        margin-top: 50px;
        margin-bottom: 20px;
    }
    .about-mob-section-wrap .mobile-about-section .about-gallery-list{
        margin-left: -5px;
        width: -webkit-calc(100% + 10px);
        width: calc(100% + 10px);
    }

    .about-mob-section-wrap .mobile-about-section .about-gallery-list li a{
        background-size: cover;
        background-position: center;
        display: block;
        height: 100%;
        width: 100%;
    }
    .about-mob-section-wrap .mobile-about-section .about-gallery-list li{
        width: calc(50% - 10px);
        display: block;
        float: left;
        margin: 5px;
    }
    .about-mob-section-wrap .about-section-inner .about-gallery-wrap{
        margin-top: 40px;
    }
    .about-mob-section-wrap .about-section-inner .social{
        display: block;
        text-align: center;
        margin-left: 0;
    }

    .about-mob-section-wrap .about-section-inner .social li{
        display: inline-block;
    }

    .about-mob-section-wrap .about-section-inner .social li a{
        color: #fff;
        font-size: 16px;
        margin-right: 30px;
        -webkit-transition: all 350ms ease;
        -moz-transition: all 350ms ease;
        -ms-transition: all 350ms ease;
        -o-transition: all 350ms ease;
        transition: all 350ms ease;
    }
    .about-mob-section-wrap .about-section-inner .social li a:hover{
        opacity: .8;
    }
    .about-mob-section-wrap .mobile-about-section .about-text-wrap p {
        margin-top: 15px;
        max-width: 580px;
        text-align: center;
        line-height: 1.6;
        font-size: 15px;
    }
    .about-mob-section-wrap .mobile-about-section .about-gallery-wrap .mob-about-title {
        margin-bottom: 20px;
        color: #ffffff;
        font-family: "Playfair Display", sans-serif;
        font-size: 30px;
        font-weight: 600;
        letter-spacing: 1px;
        line-height: 1.1;
        width: 100%;
        text-align: left;
    }
    .about-mob-section-wrap .mobile-about-section .about-gallery-wrap .s-back-switch {
        -webkit-background-size: cover;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        position: relative;
    }
    .about-mob-section-wrap .mobile-about-section .about-gallery-wrap .s-back-switch::before {
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0,  .4);
        transition: opacity .3s ease, visibility .3s ease;
        visibility: hidden;
        opacity: 0;
        content: "";
    }
    .about-mob-section-wrap .mobile-about-section .about-gallery-wrap .s-back-switch:hover::before {
        opacity: 1;
        visibility: visible;
    }


    .about-mob-section-wrap .mobile-about-section .about-text-wrap,
    .about-mob-section-wrap .mobile-about-section .about-gallery-wrap {
        width: 100%;

    }
    .about-mob-section-wrap .mobile-about-section .about-text-wrap {
        text-align: center;
    }
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h1,
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h2,
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h3,
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h4,
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h5,
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h6,
    .about-mob-section-wrap .mobile-about-section .about-text-wrap p {
        color: #ffffff;
    }
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h1,
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h2,
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h3,
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h4,
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h5,
    .about-mob-section-wrap .mobile-about-section .about-text-wrap h6 {
        font-family: "Playfair Display", sans-serif;
        font-weight: 600;
        letter-spacing: 1px;
    }
}

/*------------------------------------------------------*/
/*---------------------- STATIC ASIDE MENU ----------------------*/
.mCSB_container.mCS_no_scrollbar_y.mCS_y_hidden,
.mCSB_inside > .mCSB_container {
    margin-right: 0;
}

@media only screen and (min-width: <?php echo esc_attr($min_mobile); ?>) {
    .static-menu {
        padding-left: 256px;
        position: relative;
    }

    .static-menu .right-menu .logo span {
        float: none;
    }

    .static-menu.woocommerce > .main-wrapper > .container {
        padding: 0 15px !important;
    }

    .static-menu.woocommerce.woocommerce-page ul.products {
        margin-top: 20px;
    }

    .static-menu.woocommerce div.product {
        margin-top: 20px;
    }

    .static-menu .wiso-woocommerce-pagination .nav-links {
        padding: 30px 30px 70px;
    }

    .static-menu .main-header-testimonial {
        margin-left: auto;
        margin-right: auto;
    }

    .static-menu .single-pagination {
        padding: 15px;
    }

    .static-menu .top-banner {
        height: 500px;
    }

    .static-menu .row.single-share {
        margin-right: 0;
        margin-left: 0;
    }

    .static-menu .portfolio-single-content .izotope-container {
        margin-top: 20px;
    }

    .static-menu .pixproof-data,
    .static-menu .pixproof-data .grid__item:last-child {
        margin-top: 20px;
    }

    .static-menu .portfolio-single-content .single-pagination {
        padding: 50px 15px;
    }

    .static-menu .banner-slider .page-view {
        max-width: 100%;
    }

    .static-menu .portfolio-single-content p,
    .static-menu .portfolio-single-content h1,
    .static-menu .portfolio-single-content h2,
    .static-menu .portfolio-single-content h3,
    .static-menu .portfolio-single-content h4,
    .static-menu .portfolio-single-content h5,
    .static-menu .portfolio-single-content h6 {
        padding: 0 15px;
    }

    .static-menu .portfolio-single-content .row.gallery-single {
        margin-right: 0;
        margin-left: 0;
    }

    .static-menu .swiper-container-split .swiper-slide .slide-item.slide-text-left .wrap-slide-text {
        padding-left: 190px;
    }

    .static-menu .vc_row:not([data-vc-stretch-content="true"]) {
        padding-left: 0 !important;
        padding-right: 0 !important;
    }

    .static-menu .vc_row[data-vc-full-width] {
        max-width: calc(100% + 30px) !important;
        left: 0 !important;
    }

    .static-menu .top-banner .content {
        padding: 0 15px;
    }

    .static-menu .flow-slider .swiper-container {
        width: 120vw;
    }

    .static-menu .exhibition-wrap .container-wrap {
        max-width: 100%;
    }

    .static-menu .exhibition-wrap .slide {
        max-width: calc(70vw - 90px);
    }

    .static-menu #footer {
        max-width: calc(100% - 254px);
        left: 254px;
    }

    .static-menu .header_top_bg {
        padding-bottom: 0;
    }

    .aside-menu.static {
        max-width: 290px;
        left: 0;
    }

    .aside-menu.static .aside-nav {
        display: none;
    }

    .aside-menu.static #topmenu ul.menu {
        overflow-y: visible;
        transform: translate(-50%, -50%);
    }

    .aside-menu.static #topmenu {
        box-shadow: 3px 1px 20px 0 rgba(0, 0, 0, 0.12);
        left: 0 !important;
        margin-left: 0;
        vertical-align: top;
        border-right: none;
        background-color: #222222;
    }

    .aside-menu.static #topmenu .sub-menu {
        margin-left: 0;
        left: 100%;
        top: 50%;
        background-color: #222;
        width: 100% !important;
        transform: translateY(-50%);
        box-shadow: 3px 1px 20px 0 rgba(0, 0, 0, 0.12);
    }
    .aside-menu.static #topmenu .sub-menu .sub-menu {
        left: 99%;
    }

    .aside-menu.static #topmenu li:hover > .sub-menu {
        display: none;
    }

    .aside-menu.static #topmenu .menu li a {
        text-align: left;
        color: #ffffff;
        font-family: "Open Sans", sans-serif;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
        letter-spacing: 2px;
        margin: 0;
        width: auto;
        line-height: 2;
        padding: 0 2px 0 0;
        text-transform: uppercase;
    }

    @-webkit-keyframes slidetounlock {
        0% {
            background-position: -150px 0
        }

        100% {
            background-position: 150px 0
        }
    }

    .aside-menu.static #topmenu .current-menu-parent > a,
    .aside-menu.static #topmenu .current-menu-item > a,
    .aside-menu.static #topmenu .menu li a:hover {
        opacity: 1;
        visibility: visible;
        display: inline-block;
        background: -webkit-gradient(linear,left top,right top,color-stop(0,#ccc), color-stop(.5,#eee), color-stop(1,#ccc));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        -webkit-animation-iteration-count: infinite;
        -webkit-animation-duration: 3s;
        animation-duration: 3s;
        -webkit-animation-timing-function: linear;
        animation-timing-function: linear;
        -webkit-animation-name: slidetounlock;
        animation-name: slidetounlock
    }
    .aside-menu.static #topmenu .social li a {
        color: #ffffff;
    }
    .aside-menu.static #topmenu .social li a:hover {
        color: #999999;
    }
    .aside-menu.static #topmenu .f-right {
        text-align: left;
        left: 0;
        -webkit-transform: none;
        -moz-transform: none;
        -ms-transform: none;
        -o-transform: none;
        transform: none;
        width: 100%;
        padding-left: 45px;
        padding-right: 20px;
    }

    .aside-menu.static #topmenu .f-right .copy {
        text-transform: none;
        font-size: 14px;
        line-height: 1.57;
        color: #fff;
        margin-top: 35px;
    }

    .aside-menu.static #topmenu .f-right .copy a {
        text-decoration: none;
        color: #ffffff;
    }
    .aside-menu.static #topmenu .f-right .copy a:hover {
        color: #999999;
    }

    .aside-menu.static .logo {
        left: 0;
        width: 100%;
        top: 0;
        padding-top: 40px;
        text-align: left;
        padding-left: 45px;
    }

    .aside-menu.static .logo span {
        color: #ffffff;
        font-size: 30px;
        line-height: 1;
    }

    .aside-menu.static .logo img {
        max-width: 100%;
    }
}

@media only screen and (min-width: 1650px) {
    .static-menu .vc_row:not([data-vc-stretch-content="true"]) {
        padding-left: 7% !important;
        padding-right: 7% !important;
    }
}

@media only screen and (min-width: 1199px) and (max-width: 1375px) {
    .static-menu .pricing-item {
        padding: 60px 40px;
    }

    .static-menu .pricing-item .mask-image {
        min-width: 150px;
        width: 150px;
    }
}

@media only screen and (min-width: 1200px) and (max-width: 1275px) {
    .static-menu .pricing-item .mask-image {
        min-width: 130px;
        width: 130px;
    }
}
@media only screen and (min-width: <?php echo esc_attr($min_mobile); ?>) and (max-width: 1460px) {
    .static-menu .about-section {
        padding: 0 30px;
        overflow: hidden;
    }
    .static-menu .headings-wrap,
    .static-menu .wiso-post-list-1,
    .static-menu .wiso-post-list-2,
    .static-menu .wiso-portfolio-2,
    .static-menu .wiso-portfolio-3,
    .static-menu .wiso-portfolio-urban {
        padding: 0 15px;
    }
    .static-menu .contacts-info-wrap {
        padding: 0 15px 15px;
    }
    .static-menu .vc_row.pad-fix {
        padding-right: 15px!important;
        padding-left: 15px!important;
    }
}
@media only screen and (min-width: <?php echo esc_attr($min_mobile); ?>) and (max-width: 1375px) {
    .static-menu .outer-album-swiper .album-text-block,
    .static-menu .outer-album-swiper .right-content {
        max-width: 260px;
    }
}

@media only screen and (min-width: <?php echo esc_attr($min_mobile); ?>) and (max-width: 1350px) {
    .static-menu .contacts-info-wrap.style3 .content {
        padding: 100px 20px;
    }

    .static-menu .swiper-container.carousel-albums .swiper-button-prev {
        left: 30px;
    }

    .static-menu .swiper-container.carousel-albums .swiper-button-prev:hover {
        left: 20px;
    }

    .static-menu .swiper-container.carousel-albums .swiper-button-next {
        right: 30px;
    }

    .static-menu .swiper-container.carousel-albums .swiper-button-next:hover {
        right: 20px;
    }
}

@media only screen and (min-width: <?php echo esc_attr($min_mobile); ?>) and (max-width: 1200px) {
    .static-menu.single-product .product .woocommerce-Reviews #comments, .static-menu.wiso_product_detail .product .woocommerce-Reviews #comments {
        width: 60%;
    }

    .static-menu.single-product .product .woocommerce-Reviews #review_form_wrapper, .static-menu.wiso_product_detail .product .woocommerce-Reviews #review_form_wrapper {
        width: 40%;
    }

    .static-menu .coming-soon .svg .count {
        font-size: 115px;
    }

    .static-menu .client-wrap {
        width: 50%;
    }

    .static-menu .info-block-parallax-wrap .content-wrap {
        padding: 70px 20px 70px;
    }
}

@media only screen and (min-width: <?php echo esc_attr($min_mobile); ?>) and (max-width: 1100px) {
    .static-menu .top-banner {
        height: 300px;
    }

    .static-menu .top-banner.center_content {
        min-height: 300px;
    }

    .static-menu .fragment-wrapper .fragment-block .fragment-text .wrap-frag-text .title {
        font-size: 50px;
        line-height: 55px;
    }

    .static-menu .swiper-container-vert-slider .swiper-slide .container .wrap-text {
        max-width: calc(100% - 40px);
    }

    .static-menu .swiper-container-vert-slider .swiper-slide .container .wrap-text .title {
        font-size: 60px;
        letter-spacing: 8px;
    }

    .static-menu .portfolio-slider-wrapper.slider_classic .content-wrap .portfolio-title {
        font-size: 50px;
        letter-spacing: 7px;
    }

    .static-menu .portfolio-single-content .gallery-single.infinite_full_gallery .item-single {
        width: 33.33%;
    }

    .static-menu .portfolio.grid .item {
        width: 50% !important;
    }

    .static-menu .flow-slider .flow-title {
        font-size: 60px;
    }
}


/*------------------------------------------------------*/
/*---------------------- ASIDE FIX MENU ----------------------*/
@media only screen and (min-width: <?php echo esc_attr($min_mobile); ?>) {
    .body-aside-menu {
        padding-left: 58px;
    }

    .aside-fix .logo {
        position: fixed;
        top: auto;
        left: 0;
        transform-origin: left top 0;
        transform: rotate(-90deg);
        padding: 0;
        height: 58px;
    }
    .aside-fix .logo span,
    .aside-fix .logo img {
        max-height: 58px;
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #ffffff;
    }
    .aside-fix .aside-nav {
        background-color: #222;
    }
    .aside-fix .aside-nav .aside-nav-line {
        top: auto;
        bottom: 40px;
        background-color: #fff;
    }
    .aside-fix #topmenu .sub-menu {
        min-width: auto;
        position: static;
    }
    .aside-fix #topmenu .sub-menu a {
        font-weight: 400;
    }

    .aside-fix #topmenu::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 80px;
        background: #fff;
        z-index: 1;
    }

    .aside-fix #topmenu .f-right {
        text-align: center;
    }
    .aside-fix #topmenu ul.menu li a:hover,
    .aside-fix #topmenu ul.menu .current-menu-parent > a,
    .aside-fix #topmenu ul.menu .current-menu-item > a {
        color: #999999;
    }
    .aside-fix #topmenu ul ul li a {
        width: auto;
        padding: 0;
    }

    .aside-fix #topmenu ul.menu li {
        padding: 10px 15px;
        text-align: center;
    }
    .aside-fix #topmenu ul.menu a {
        display: inline-block;
        position: relative;
        line-height: 1.2;
    }
    .aside-fix .logo img {
        margin: 0;
    }
    .aside-fix #topmenu ul.menu {
        padding-bottom: 100px;
    }
}


/*------------------------------------------------------*/
/*---------------------- CLASSIC MENU ----------------------*/
@media only screen and (min-width: <?php echo esc_attr($min_mobile); ?>) {
    .container-fluid header.classic {
        padding: 0 85px;
    }
    header.classic {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .unit header.classic {
        padding: 0 15px;
    }

    .classic #topmenu {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        padding-left: 23px;
    }

    .classic #topmenu .menu {
        width: 100%;
        text-align: center;
    }

    .unit .classic #topmenu .menu {
        text-align: right;
    }

    .classic .f-right {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .header_trans-fixed.header_top_bg .classic #topmenu ul li a {
        padding: 0;
    }

    .classic #topmenu .menu li a {
        color: #222222;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 2px;
        line-height: 2;
        text-transform: uppercase;
    }

    .classic #topmenu .menu li a:hover,
    .classic #topmenu .current-menu-parent > a,
    .classic #topmenu .current-menu-item > a,
    .classic #topmenu .current-menu-ancestor > a {
        color: #999999;
    }

    .classic #topmenu .menu > li {
        padding: 30px 0;
    }

    .classic #topmenu .sub-menu {
        top: 75px;
        left: -35px;
        min-width: 270px;
        padding: 30px 0;
        background-color: #ffffff;
        -webkit-box-shadow: 3px 1px 20px 0 rgba(0, 0, 0, 0.07);
        box-shadow: 3px 1px 20px 0 rgba(0, 0, 0, 0.07);
        opacity: 0;
        visibility: hidden;
        -webkit-transition: opacity .5s ease, visibility .5s ease;
        -o-transition: opacity .5s ease, visibility .5s ease;
        transition: opacity .5s ease, visibility .5s ease;
        display: block;
    }

    .classic #topmenu .menu li:hover > ul {
        opacity: 1;
        visibility: visible;
    }

    .classic #topmenu .menu > li ul a {
        opacity: 0;
        -webkit-transform: matrix(1, 0, 0, 1, 0, 20);
        -ms-transform: matrix(1, 0, 0, 1, 0, 20);
        transform: matrix(1, 0, 0, 1, 0, 20);
        -webkit-transition: opacity .75s ease, color .5s ease, -webkit-transform .75s ease;
        transition: opacity .75s ease, color .5s ease, -webkit-transform .75s ease;
        -o-transition: opacity .75s ease, transform .75s ease, color .5s ease;
        transition: opacity .75s ease, transform .75s ease, color .5s ease;
        transition: opacity .75s ease, transform .75s ease, color .5s ease, -webkit-transform .75s ease;
    }

    .classic #topmenu .menu > li:hover ul a,
    .classic #topmenu .menu > li.mega-menu:hover ul > li > ul.sub-menu > li a {
        opacity: 1;
        -webkit-transform: matrix(1, 0, 0, 1, 0, 0);
        -ms-transform: matrix(1, 0, 0, 1, 0, 0);
        transform: matrix(1, 0, 0, 1, 0, 0);
    }

    .classic #topmenu .sub-menu .sub-menu {
        top: 0;
        left: 100%;
        padding: 40px 15px;
    }

    .classic #topmenu .menu li:last-of-type .sub-menu .sub-menu,
    .classic #topmenu .menu li:nth-last-of-type(2) .sub-menu .sub-menu,
    .classic #topmenu .menu li:nth-last-of-type(3) .sub-menu .sub-menu {
        left: -100%;
    }

    .classic #topmenu .sub-menu li {
        padding: 8px 35px;
        text-align: left;
    }

    .classic #topmenu .sub-menu li a {
        width: auto;
        display: inline-block;
        padding: 0;
        font-weight: 600;
    }

    .classic #topmenu .current-menu-parent > a,
    .classic #topmenu .current-menu-item > a {
        position: relative;
    }

    .classic #topmenu > ul > li > a {
        margin: 0 18px 0 0;
    }

    .classic #topmenu .mini-cart-wrapper {
        margin-left: 30px;
    }

    /* mega menu classic*/
    .classic #topmenu .menu .mega-menu:hover > ul > li > ul {
        opacity: 1;
        visibility: visible;
    }

    /* end of mega menu classic*/
    /* search popup */
    .classic .site-search {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 100;
        background-color: rgba(255, 255, 255, .9);
        overflow-x: hidden;
        overflow-y: auto;
        opacity: 0;
        visibility: hidden;
        -webkit-transition: opacity .7s ease, visibility .7s ease;
        -o-transition: opacity .7s ease, visibility .7s ease;
        transition: opacity .7s ease, visibility .7s ease;
    }

    .classic .site-search.open {
        opacity: 1;
        visibility: visible;
    }

    .classic .site-search .form-container {
        position: relative;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .classic .site-search .form-container .input-group {
        width: 100%;
    }

    .classic .site-search .form-container .input-group input {
        font-size: 18px;
    }

    .classic .site-search .close-search {
        position: absolute;
        top: 80px;
        right: 80px;
        width: 30px;
        height: 30px;
    }

    .classic .site-search .line {
        width: 18px;
        height: 1px;
        background-color: #222222;
        display: block;
        margin: 4px auto;
        -webkit-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .classic .site-search .line:nth-of-type(1) {
        -webkit-transform: translateY(1px) rotate(45deg);
        -ms-transform: translateY(1px) rotate(45deg);
        -o-transform: translateY(1px) rotate(45deg);
        transform: translateY(1px) rotate(45deg);
    }

    .classic .site-search .line:nth-of-type(2) {
        -webkit-transform: translateY(-4px) rotate(-45deg);
        -ms-transform: translateY(-4px) rotate(-45deg);
        -o-transform: translateY(-4px) rotate(-45deg);
        transform: translateY(-4px) rotate(-45deg);
    }

    .search-form input {
        width: 100%;
        border: 0;
        border-bottom: 1px solid #222;
        background-color: transparent;
        color: #999999;
        font-size: 15px;
        padding: 14px 0;
    }

    .classic #topmenu .search-icon-wrapper {
        margin-left: 30px;
        cursor: pointer;
        font-size: 18px;
    }

    /* end of search popup */

}

/*------------------------------------------------------*/
/*---------------------- MODERN MENU ----------------------*/
@media only screen and (min-width: 1200px) {
    .modern #topmenu {
        padding-right: 75px;
        padding-left: 60px;
    }
}
@media only screen and (min-width: <?php echo esc_attr($min_mobile); ?>) {
    .modern .site-search .container {
        width: auto;
        padding: 0;
    }
    .modern .site-search .container .row {
        margin: 0;
    }
    .modern .site-search .container .row .col-lg-12 {
        padding: 0;
    }
    .modern #topmenu,
    .modern .menu-wrapper {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -ms-flex-preferred-size: 80%;
        flex-basis: 80%;
    }

    .modern #topmenu .menu li a:hover,
    .modern #topmenu .current-menu-parent > a,
    .modern #topmenu .current-menu-item > a,
    .modern #topmenu .current-menu-ancestor > a {
        color: #999999;
    }
    .modern .logo {
        display: block;
        margin: 0 30px;
    }
    .modern .logo-mobile {
        display: none;
    }
    .modern .logo span {
        line-height: 2;
    }

    .modern #topmenu .menu li a {
        padding: 0 10px;
        color: #222222;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 2px;
        line-height: 2;
        text-transform: uppercase;
    }

    .modern #topmenu .menu li a:hover,
    .modern #topmenu .current-menu-parent > a,
    .modern #topmenu .current-menu-item > a,
    .modern #topmenu .current-menu-ancestor > a {
        color: #999999;
    }

    .modern #topmenu .menu > li {
        padding: 30px 0;
    }

    .modern #topmenu .sub-menu {
        top: 75px;
        left: -35px;
        min-width: 270px;
        padding: 30px 0;
        background-color: #ffffff;
        -webkit-box-shadow: 3px 1px 20px 0 rgba(0, 0, 0, 0.07);
        box-shadow: 3px 1px 20px 0 rgba(0, 0, 0, 0.07);
        opacity: 0;
        visibility: hidden;
        -webkit-transition: opacity .5s ease, visibility .5s ease, color .3s ease;
        -o-transition: opacity .5s ease, visibility .5s ease, color .3s ease;
        transition: opacity .5s ease, visibility .5s ease, color .3s ease;
        display: block;
    }

    .modern #topmenu .menu li:hover > ul {
        opacity: 1;
        visibility: visible;
    }

    .modern #topmenu .menu > li ul a {
        opacity: 0;
        -webkit-transform: matrix(1, 0, 0, 1, 0, 20);
        -ms-transform: matrix(1, 0, 0, 1, 0, 20);
        transform: matrix(1, 0, 0, 1, 0, 20);
        -webkit-transition: opacity .75s ease, color .3s ease, -webkit-transform .75s ease;
        transition: opacity .75s ease, color .3s ease, -webkit-transform .75s ease;
        -o-transition: opacity .75s ease, transform .75s ease, color .3s ease;
        transition: opacity .75s ease, transform .75s ease, color .3s ease;
        transition: opacity .75s ease, transform .75s ease, color .3s ease, -webkit-transform .75s ease;
    }

    .modern #topmenu .menu > li:hover ul a,
    .modern #topmenu .menu > li.mega-menu:hover ul > li > ul.sub-menu > li a {
        opacity: 1;
        -webkit-transform: matrix(1, 0, 0, 1, 0, 0);
        -ms-transform: matrix(1, 0, 0, 1, 0, 0);
        transform: matrix(1, 0, 0, 1, 0, 0);
    }

    .modern #topmenu .sub-menu .sub-menu {
        top: 0;
        left: 100%;
        padding: 40px 15px;
    }

    .modern #topmenu .menu li:last-of-type .sub-menu .sub-menu,
    .modern #topmenu .menu li:nth-last-of-type(2) .sub-menu .sub-menu,
    .modern #topmenu .menu li:nth-last-of-type(3) .sub-menu .sub-menu {
        left: -100%;
    }

    .modern #topmenu .sub-menu li {
        padding: 8px 35px;
        text-align: left;
    }

    .modern #topmenu .sub-menu li a {
        width: auto;
        display: inline-block;
        padding: 0;
        font-weight: 600;
    }

    .modern #topmenu .current-menu-parent > a,
    .modern #topmenu .current-menu-item > a {
        position: relative;
    }

    .modern #topmenu > ul > li > a {
        margin: 0 28px 0 0;
    }

    .modern #topmenu .mini-cart-wrapper {
        margin-left: 30px;
    }

    /* mega menu modern*/
    .modern #topmenu .menu .mega-menu:hover > ul > li > ul {
        opacity: 1;
        visibility: visible;
    }

    /* end of mega menu classic*/

    .modern .search-icon-wrapper {
        position: relative;
        -ms-flex-preferred-size: 10%;
        flex-basis: 10%;
    }

    .modern .open-search {
        position: absolute;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
        right: 0;
    }

    .modern .search-form input {
        padding: 8px 0;
        border-bottom: 1px solid #ddd;
        color: #222222;
        font-family: "Playfair Display", sans-serif;
        font-style: italic;
        letter-spacing: 1.3px;
    }
    .modern .f-right {
        -ms-flex-preferred-size: 10%;
        flex-basis: 10%;
    }
}

@media (max-width: <?php echo esc_attr($max_mobile); ?>) {
    .modern #topmenu {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
    }
    .modern .mob-nav-close {
        -webkit-box-ordinal-group: 2;
        -ms-flex-order: 1;
        order: 1;
    }
    .modern .menu-wrapper {
        -webkit-box-ordinal-group: 3;
        -ms-flex-order: 2;
        order: 2;
    }
    .modern .f-right {
        -webkit-box-ordinal-group: 4;
        -ms-flex-order: 3;
        order: 3;
    }
    .modern .search-icon-wrapper {
        -webkit-box-ordinal-group: 5;
        -ms-flex-order: 4;
        order: 4;
    }
    .modern #topmenu .logo {
        display: none;
    }
    .modern #topmenu .menu {
        padding-bottom: 0;
    }
    .modern #topmenu .f-right {
        margin-top: 30px;
    }
}


<?php
$style = '';
///HEADER LOGO//
if ( cs_get_option('site_logo') == 'txtlogo' ) {
    //Header logo text
    if ( cs_get_option('text_logo_style') == 'custom' ) {

        $style .= 'a.logo span{';
        $style .=  cs_get_option('text_logo_color') && cs_get_option('text_logo_color') !== '#fff' ? 'color:' . cs_get_option('text_logo_color') . ' !important;' : '';
        $style .=  cs_get_option('text_logo_width') ? 'width:' . cs_get_option('text_logo_width') . ' !important;' : '';
        $style .=  cs_get_option('text_logo_font_size') ? 'font-size:' . cs_get_option('text_logo_font_size') . ' !important;' : '';
        $style .= '}';
    }

} else {
    //Header logo image
    if ( cs_get_option('img_logo_style') == 'custom' ) {
        $style .= '.logo img {';
        if (cs_get_option('img_logo_width')) {
            $logo_width = is_integer(cs_get_option('img_logo_width')) ? cs_get_option('img_logo_width') . 'px' : cs_get_option('img_logo_width');
             $style .=  cs_get_option('img_logo_width') ? 'width:' . esc_attr($logo_width) . ' !important;' : '';
        }
        if (cs_get_option('img_logo_height')) {
            $logo_height = is_integer(cs_get_option('img_logo_height')) ? cs_get_option('img_logo_height') . 'px' : cs_get_option('img_logo_height');
             $style .=  cs_get_option('img_logo_height') ? 'height:' . esc_attr( $logo_height ) . ' !important;' : '';
             $style .=  cs_get_option('img_logo_height') ? 'max-height:' . cs_get_option('img_logo_height') . ' !important;' : '';
        }
        $style .= '}';
    }
}
echo esc_html($style);

$post_id = isset($_GET['post']) && is_numeric($_GET['post']) ? $_GET['post'] : '' ;

if(!empty($post_id)){
 $meta_data = get_post_meta( $post_id, '_custom_page_options', true );
 $meta_data_portfolio = get_post_meta( $post_id, 'wiso_portfolio_options', true );
 $meta_data_events    = get_post_meta( $post_id, 'wiso_events_options', true );

 if (isset($meta_data['footer_color']) && !empty($meta_data['footer_color'])) {
     $footer_color = $meta_data['footer_color'];
 } elseif (isset($meta_data_portfolio['footer_color']) && !empty($meta_data_portfolio['footer_color'])) {
     $footer_color = $meta_data_portfolio['footer_color'];
 } elseif (isset($meta_data_events['footer_color']) && !empty($meta_data_events['footer_color'])) {
     $footer_color = $meta_data_events['footer_color'];
 }

if (isset($footer_color) && !empty($footer_color)) { ?>
.page-id-<?php echo esc_attr($post_id); ?> #footer,
.postid-<?php echo esc_attr($post_id); ?> #footer {
    background-color: <?php echo esc_html($footer_color) ?>;
}
<?php }

 if (isset($meta_data['header_scroll_bg']) && !empty($meta_data['header_scroll_bg'])) {
     $header_scroll_bg = $meta_data['header_scroll_bg'];
 } elseif (isset($meta_data_portfolio['header_scroll_bg']) && !empty($meta_data_portfolio['header_scroll_bg'])) {
     $header_scroll_bg = $meta_data_portfolio['header_scroll_bg'];
 } elseif (isset($meta_data_events['header_scroll_bg']) && !empty($meta_data_events['header_scroll_bg'])) {
     $header_scroll_bg = $meta_data_events['header_scroll_bg'];
 }

if (isset($header_scroll_bg) && !empty($header_scroll_bg)) { ?>
.page-id-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color,
.postid-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color {
    background-color: <?php echo esc_html($header_scroll_bg) ?>;
}
<?php }

 if (isset($meta_data['header_scroll_text']) && !empty($meta_data['header_scroll_text'])) {
     $header_scroll_text = $meta_data['header_scroll_text'];
 } elseif (isset($meta_data_portfolio['header_scroll_text']) && !empty($meta_data_portfolio['header_scroll_text'])) {
     $header_scroll_text = $meta_data_portfolio['header_scroll_text'];
 } elseif (isset($meta_data_events['header_scroll_text']) && !empty($meta_data_events['header_scroll_text'])) {
     $header_scroll_text = $meta_data_events['header_scroll_text'];
 }

if (isset($header_scroll_text) && !empty($header_scroll_text)) { ?>

.page-id-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color #topmenu:not(.open) ul li a,
.page-id-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color #topmenu .search-icon-wrapper i,
.page-id-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color #topmenu .mini-cart-wrapper .wiso-shop-icon::before,
.page-id-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color #topmenu .wiso-top-social .social li a,
.page-id-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color .header_top_bg .right-menu.full #topmenu ul li a,
.page-id-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color .right-menu .logo span,
.page-id-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color .top-menu .logo span,
.page-id-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color .aside-menu.static #topmenu .f-right .copy,
.postid-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color #topmenu:not(.open) ul li a,
.postid-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color #topmenu .search-icon-wrapper i,
.postid-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color #topmenu .mini-cart-wrapper .wiso-shop-icon::before,
.postid-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color #topmenu .wiso-top-social .social li a,
.postid-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color .header_top_bg .right-menu.full #topmenu ul li a,
.postid-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color .right-menu .logo span,
.postid-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color .top-menu .logo span,
.postid-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color .aside-menu.static #topmenu .f-right .copy {
    color: <?php echo esc_html($header_scroll_text) ?>;
}

.page-id-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color .right-menu.full .mob-nav:not(.active) .line,
.postid-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color .right-menu.full .mob-nav:not(.active) .line {
    background-color: <?php echo esc_html($header_scroll_text) ?>;
}

@media only screen and (max-width: <?php echo esc_attr($max_mobile); ?>) {
    .page-id-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color .mob-nav-close,
    .page-id-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color #topmenu ul.menu li a,
    .postid-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color .mob-nav-close,
    .postid-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color #topmenu ul.menu li a {
        color: <?php echo esc_html($header_scroll_text) ?>;
    }

    .page-id-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color .mob-nav-close .line,
    .page-id-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color .right-menu .mob-nav .line,
    .postid-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color .mob-nav-close .line,
    .postid-<?php echo esc_attr($post_id); ?> .header_trans-fixed.header_top_bg.bg-fixed-color .right-menu .mob-nav .line {
        background-color: <?php echo esc_html($header_scroll_text) ?>;
    }
}
<?php }

 if(!empty($meta_data['padding_desktop'])){ ?>
.page-id-<?php echo esc_attr($post_id); ?> .padding-desc,
.page-id-<?php echo esc_attr($post_id); ?> .padding-desc .vc_row,
.page-id-<?php echo esc_attr($post_id); ?> .padding-desc + #footer > div {
    padding-right: <?php echo esc_attr($meta_data['padding_desktop']); ?>;
    padding-left: <?php echo esc_attr($meta_data['padding_desktop']); ?>;
}

<?php }

 if(!empty($meta_data['padding_mobile'])){ ?>

@media only screen and (max-width: 767px) {
    .page-id-<?php echo esc_attr($post_id); ?> .padding-mob,
    .page-id-<?php echo esc_attr($post_id); ?> .padding-mob .vc_row,
    .page-id-<?php echo esc_attr($post_id); ?> .padding-mob + #footer > div {
        padding-right: <?php echo esc_attr($meta_data['padding_mobile']); ?>;
        padding-left: <?php echo esc_attr($meta_data['padding_mobile']); ?>;
    }
}

@media (min-width: 768px) {
    .right-menu {
        width: 100%;
        margin: 0;
        max-width: 100%;
    }

    .header_top_bg .col-xs-12 {
        padding: 0;
    }
}

<?php }
} ?>

/**** WHITE VERSION  ****/

<?php

if(cs_get_option('change_colors')){
if (cs_get_option( 'menu_bg_color') && cs_get_option('menu_bg_color') !== '#ffffff') { ?>
.header_top_bg,
#topmenu,
.aside-menu.aside-fix #topmenu::after {
    background-color: <?php echo esc_html(cs_get_option( 'menu_bg_color')) ?>;
}

@media only screen and (max-width: <?php echo esc_attr($max_mobile); ?>) {
    #topmenu ul.menu,
    #topmenu .f-right {
        background-color: <?php echo esc_html(cs_get_option( 'menu_bg_color')) ?>;
    }
}

<?php }
if (cs_get_option( 'menu_font_color') && cs_get_option('menu_font_color') !== '#222222' ) { ?>
#topmenu ul li a,
#topmenu .search-icon-wrapper i,
.mini-cart-wrapper .wiso-shop-icon:before,
#topmenu .wiso-top-social .social li a,
.header_top_bg .right-menu.full #topmenu ul li a,
.right-menu .logo span,
.top-menu .logo span,
.classic #topmenu .menu li a,
.mini-cart-wrapper .wiso-shop-icon .cart-contents-count,
.modern #topmenu .menu li a,
.modern .search-form input,
.modern .search-form input::placeholder {
    color: <?php echo esc_html(cs_get_option( 'menu_font_color')) ?>;
}

.aside-menu .aside-nav .aside-nav-line,
.about-mob-section-wrap .about-hamburger .line {
    background-color: <?php echo esc_html(cs_get_option( 'menu_font_color')) ?>;
}

.modern .search-form input {
    border-bottom-color: <?php echo esc_html(cs_get_option( 'menu_font_color')) ?>;
}

@media only screen and (max-width: <?php echo esc_attr($max_mobile); ?>) {
    .mob-nav-close,
    #topmenu ul.menu li a,
    .right-menu .mob-nav .hamburger i,
    .right-menu #topmenu .menu li.menu-item-has-children i,
    #topmenu .menu li.menu-item-has-children i,
    .search-form input {
        color: <?php echo esc_html(cs_get_option( 'menu_font_color')) ?>;
    }

    .mob-nav-close .line,
    .right-menu .mob-nav .line {
        background-color: <?php echo esc_html(cs_get_option( 'menu_font_color')) ?>;
    }

    .search-form input {
        border-bottom-color: <?php echo esc_html(cs_get_option( 'menu_font_color')) ?>;
    }
}

<?php }
if (cs_get_option( 'menu_font_color_t') && cs_get_option('menu_font_color_t') !== '#222222' ) { ?>
.header_trans-fixed #topmenu ul li a,
.header_trans-fixed #topmenu .search-icon-wrapper i,
.header_trans-fixed .mini-cart-wrapper .wiso-shop-icon:before,
.header_trans-fixed #topmenu .wiso-top-social .social li a,
.header_trans-fixed .right-menu .logo span,
.header_trans-fixed .top-menu .logo span,
.header_trans-fixed .aside-menu.static #topmenu .f-right .copy,
.header_trans-fixed .classic #topmenu .menu li a,
.header_trans-fixed .mini-cart-wrapper .wiso-shop-icon .cart-contents-count,
.header_trans-fixed .modern #topmenu .menu li a,
.header_trans-fixed .modern .search-form input,
.header_trans-fixed .modern .search-form input::placeholder,
.header_trans-fixed .aside-menu.static #topmenu .social li a,
.header_trans-fixed .aside-menu.static #topmenu .f-right .copy a,
.header_trans-fixed .aside-menu.static #topmenu .menu li a,
.header_trans-fixed .aside-menu.static .logo span,
.header_trans-fixed.header_top_bg .mini-cart-wrapper .wiso-shop-icon .cart-contents-count {
    color: <?php echo esc_html(cs_get_option( 'menu_font_color_t')) ?>;
}

.header_trans-fixed .aside-menu .aside-nav .aside-nav-line,
.header_trans-fixed .about-mob-section-wrap .about-hamburger .line {
    background-color: <?php echo esc_html(cs_get_option( 'menu_font_color_t')) ?>;
}

.header_trans-fixed .modern .search-form input {
    border-bottom-color: <?php echo esc_html(cs_get_option( 'menu_font_color_t')) ?>;
}

@media only screen and (max-width: <?php echo esc_attr($max_mobile); ?>) {
    .header_trans-fixed .mob-nav-close,
    .header_trans-fixed #topmenu ul.menu li a,
    .header_trans-fixed .right-menu .mob-nav .hamburger i,
    .header_trans-fixed .right-menu #topmenu .menu li.menu-item-has-children i,
    .header_trans-fixed #topmenu .menu li.menu-item-has-children i,
    .header_trans-fixed .search-form input {
        color: <?php echo esc_html(cs_get_option( 'menu_font_color_t')) ?>;
    }

    .header_trans-fixed .mob-nav-close .line,
    .header_trans-fixed .right-menu .mob-nav .line {
        background-color: <?php echo esc_html(cs_get_option( 'menu_font_color_t')) ?>;
    }

    .header_trans-fixed .search-form input {
        border-bottom-color: <?php echo esc_html(cs_get_option( 'menu_font_color_t')) ?>;
    }
}

<?php }
if (cs_get_option( 'submenu_bg_color') && cs_get_option('submenu_bg_color') !== '#ffffff' ) { ?>
@media only screen and (min-width: <?php echo esc_attr($min_mobile); ?>) {
    header:not(.aside-menu):not(.full) #topmenu ul li.mega-menu:hover > ul::before,
    .classic #topmenu .sub-menu,
    .modern #topmenu .sub-menu,
    .aside-fix #topmenu .sub-menu,
    .aside-menu.static #topmenu .sub-menu {
        background-color: <?php echo esc_html(cs_get_option( 'submenu_bg_color')) ?>;
    }
}

@media only screen and (max-width: <?php echo esc_attr($max_mobile); ?>) {
    #topmenu ul li ul {
        background-color: <?php echo esc_html(cs_get_option( 'submenu_bg_color')) ?>;
    }
}

<?php }
if (cs_get_option( 'menu_bg_color_scroll') && cs_get_option('menu_bg_color_scroll') !== '#ffffff' ) { ?>
.header_trans-fixed.header_top_bg.bg-fixed-color {
    background-color: <?php echo esc_html(cs_get_option( 'menu_bg_color_scroll')) ?> !important;
}

<?php }
if (cs_get_option( 'menu_text_color_scroll') && cs_get_option('menu_text_color_scroll') !== '#222222' ) { ?>
.header_trans-fixed.header_top_bg.bg-fixed-color #topmenu ul li a,
.header_trans-fixed.header_top_bg.bg-fixed-color #topmenu .search-icon-wrapper i,
.header_trans-fixed.header_top_bg.bg-fixed-color #topmenu .mini-cart-wrapper .wiso-shop-icon::before,
.header_trans-fixed.header_top_bg.bg-fixed-color #topmenu .wiso-top-social .social li a,
.header_trans-fixed.header_top_bg.bg-fixed-color .header_top_bg .right-menu.full #topmenu ul li a,
.header_trans-fixed.header_top_bg.bg-fixed-color .right-menu.full .mob-nav > span,
.header_trans-fixed.header_top_bg.bg-fixed-color .right-menu .logo span,
.header_trans-fixed.header_top_bg.bg-fixed-color .full-menu-wrap .info-wrap,
.header_trans-fixed.header_top_bg.bg-fixed-color .right-menu.full .copy,
.header_trans-fixed.header_top_bg.bg-fixed-color .top-menu .logo span,
.header_trans-fixed.header_top_bg.bg-fixed-color .aside-menu.static #topmenu .f-right .copy,
.header_trans-fixed.header_top_bg.bg-fixed-color .mini-cart-wrapper .wiso-shop-icon .cart-contents-count,
.header_trans-fixed.header_top_bg.bg-fixed-color .modern .search-form input,
.header_trans-fixed.header_top_bg.bg-fixed-color .modern .search-form input::placeholder {
    color: <?php echo esc_html(cs_get_option( 'menu_text_color_scroll')) ?>;
}

.header_trans-fixed.header_top_bg.bg-fixed-color .about-mob-section-wrap .about-hamburger .line {
    background-color: <?php echo esc_html(cs_get_option( 'menu_text_color_scroll')) ?>;
}

.header_trans-fixed.header_top_bg.bg-fixed-color .modern .search-form input {
    border-bottom-color: <?php echo esc_html(cs_get_option( 'menu_text_color_scroll')) ?>;
}

@media only screen and (max-width: <?php echo esc_attr($max_mobile); ?>) {
    .header_trans-fixed.header_top_bg.bg-fixed-color .mob-nav-close,
    .header_trans-fixed.header_top_bg.bg-fixed-color #topmenu ul.menu li a,
    .header_trans-fixed.header_top_bg.bg-fixed-color .right-menu .mob-nav .hamburger i {
        color: <?php echo esc_html(cs_get_option( 'menu_text_color_scroll')) ?>;
    }

    .header_trans-fixed.header_top_bg.bg-fixed-color .mob-nav-close .line,
    .header_trans-fixed.header_top_bg.bg-fixed-color .right-menu .mob-nav .line {
        background-color: <?php echo esc_html(cs_get_option( 'menu_text_color_scroll')) ?>;
    }
}

<?php }

if (cs_get_option( 'border_menu_bg_color') && cs_get_option('border_menu_bg_color') !== '#030e28' ) { ?>
@media only screen and (min-width: <?php echo esc_attr($min_mobile); ?>) {
    .aside-menu .aside-nav {
        background-color: <?php echo esc_html(cs_get_option( 'border_menu_bg_color')) ?>;
    }
}

<?php }

if (cs_get_option( 'aside_static_bg') && cs_get_option('aside_static_bg') !== '#222' ) { ?>
.aside-menu.static #topmenu {
    background-color: <?php echo esc_html(cs_get_option( 'aside_static_bg')) ?>;
}

<?php }

if (cs_get_option( 'aside_static_bg') && cs_get_option('aside_static_color') !== '#fff' ) { ?>
.aside-menu.static #topmenu .social li a,
.aside-menu.static #topmenu .f-right .copy a,
.aside-menu.static #topmenu .menu li a,
.aside-menu.static .logo span,
.aside-menu.static .mini-cart-wrapper .wiso-shop-icon .cart-contents-count,
.aside-menu.static #topmenu .f-right .copy,
.aside-menu.static .mini-cart-wrapper a::before {
    color: <?php echo esc_html(cs_get_option( 'aside_static_color')) ?>;
}

<?php } ?>

/* ======= FRONT COLOR 1 ======= */

<?php if (cs_get_option( 'front_color_1') && cs_get_option( 'front_color_1') !== '#222222') : ?>
.post-little-banner .page-title-blog,
.post-little-banner.empty-post-list h3,
.post-little-banner.empty-post-list input[type="submit"]:hover,
.post-media .video-content .play:hover,
.post-media .video-content .play::before,
.post.center-style .category a:hover,
.post.center-style .date a:hover,
.post.center-style .title,
.post.center-style.format-quote .info-wrap blockquote, .post.center-style.format-post-text .info-wrap blockquote,
.post.center-style.format-gallery .flex-prev, .post.center-style.format-gallery .flex-next, .post.center-style.format-post-slider .flex-prev, .post.center-style.format-post-slider .flex-next,
.post.center-style.format-gallery .flex-prev:hover i, .post.center-style.format-gallery .flex-next:hover i, .post.center-style.format-post-slider .flex-prev:hover i, .post.center-style.format-post-slider .flex-next:hover i,
.post.metro-style .info-wrap .title,
.post.metro-style .info-wrap .counters i,
.post.metro-style .info-wrap .counters span,
.post.metro-style .info-wrap .counters .count,
.post.metro-style.format-quote i.fa, .post.metro-style.format-post-text i.fa,
.post.metro-style.format-video .video-content .play::before, .post.metro-style.format-post-video .video-content .play::before,
.post.metro-style.format-quote .info-wrap blockquote, .post.metro-style.format-post-text .info-wrap blockquote,
.post.metro-style.format-gallery .flex-prev, .post.metro-style.format-gallery .flex-next, .post.metro-style.format-post-slider .flex-prev, .post.metro-style.format-post-slider .flex-next,
.blog.masonry .format-quote i.fa-quote-right,
.single-post .title,
.single-post .single-content blockquote p,
.single-post .single-content .swiper-container .description,
.single-post .single-content .swiper-arrow-right, .single-post .single-content .swiper-arrow-left,
.single-post .single-content .img-slider .flex-prev, .single-post .single-content .img-slider .flex-next,
.single-post .single-content .img-slider .flex-prev:hover i, .single-post .single-content .img-slider .flex-next:hover i,
.post-little-banner .main-top-content > *,
.main-wrapper .col-md-4 .sidebar-item li, .main-wrapper .col-md-4 .sidebar-item p, .main-wrapper .col-md-3 .sidebar-item li, .main-wrapper .col-md-3 .sidebar-item p,
.main-wrapper .col-md-4 .sidebar-item h1, .main-wrapper .col-md-4 .sidebar-item h2, .main-wrapper .col-md-4 .sidebar-item h3, .main-wrapper .col-md-4 .sidebar-item h4, .main-wrapper .col-md-4 .sidebar-item h5, .main-wrapper .col-md-4 .sidebar-item h6, .main-wrapper .col-md-4 .sidebar-item strong, .main-wrapper .col-md-3 .sidebar-item h1, .main-wrapper .col-md-3 .sidebar-item h2, .main-wrapper .col-md-3 .sidebar-item h3, .main-wrapper .col-md-3 .sidebar-item h4, .main-wrapper .col-md-3 .sidebar-item h5, .main-wrapper .col-md-3 .sidebar-item h6, .main-wrapper .col-md-3 .sidebar-item strong,
.main-wrapper .col-md-4 .sidebar-item table, .main-wrapper .col-md-3 .sidebar-item table,
.main-wrapper .col-md-4 .sidebar-item table th, .main-wrapper .col-md-4 .sidebar-item table a,
.main-wrapper .col-md-3 .sidebar-item table th, .main-wrapper .col-md-3 .sidebar-item table a,
.main-wrapper .col-md-4 .sidebar-item table caption, .main-wrapper .col-md-3 .sidebar-item table caption,
.main-wrapper .col-md-4 .sidebar-item .wiso-recent-post-widget .recent-text a, .main-wrapper .col-md-3 .sidebar-item .wiso-recent-post-widget .recent-text a,
.recent-post-single .recent-title,
.sm-wrap-post .content .title,
    /*.pagination.cs-pager .page-numbers.next:after,*/
    /*.pagination.cs-pager .page-numbers.prev:after,*/
    /*.page-numbers:hover,.page-numbers:focus,*/
.post-nav .pages, .post-nav .current, .pager-pagination .pages, .pager-pagination .current,
    /*.single-pagination>div.pag-prev:hover::before,*/
    /*.single-pagination>div.pag-next:hover::after,*/
.single-pagination > div a.content,
.post-details .date-post span, .post-details .author span,
.post-details .link-wrap a,
.post-info .likes-wrap .post__likes::before,
.post-info .social-list a,
.user-info-wrap .post-author__title,
.user-info-wrap .post-author__nicename,
.user-info-wrap .post-author__social a,
.single-content.no-thumb .main-top-content .title,
.post-info span.author,
.post-info span.author a,
.comments .content .comment-reply-link,
.comments .comment-reply-title,
.comments .content .text h1, .comments .content .text h2, .comments .content .text h3, .comments .content .text h4, .comments .content .text h5, .comments .content .text h6,
.comments .person .author,
.comments .comments-title, .comments .comments-title span,
#contactform h3, .comments-form h3,
    /*#contactform textarea,#contactform input:not([type="submit"]),.comments-form textarea,.comments-form input:not([type="submit"]),*/
    /*#contactform #submit:hover,*/
    /*.comments-form #submit:hover,*/
.comment-form label,
.comments.main label,
.events-single-content .info-event-wrap .info-item .info a:hover,
.events-single-content .info-event-wrap .info-item-cost .info,
.events-single-content .top-content-event h2,
.events-single-content.protected-page .protected-title, .single-portfolio .protected-page .protected-title,
.events-single-content.protected-page form, .single-portfolio .protected-page form,
.event-post-box .flex-prev, .event-post-box .flex-next,
body,
a, a:hover, a:focus,
.text-dark,
.a-btn:hover,
.a-btn-3,
.a-btn-4:hover,
code,
kbd,
caption,
.wpb_text_column h1, .wpb_text_column h2, .wpb_text_column h3, .wpb_text_column h4, .wpb_text_column h5, .wpb_text_column h6,
    /*.error404 .hero-inner .search input[type="submit"]:hover,*/
    /*.error404 .hero-inner .search input:not([type="submit"]):focus,*/
.error404 .main-wrapper.unit .vertical-align a, .error404 .main-wrapper.unit .vertical-align .a-btn,
.sidebar-item ul li a,
.sidebar-item input,
.col-md-4 .sidebar-item .recentcomments a, .col-md-3 .sidebar-item .recentcomments a,
.col-md-4 .sidebar-item li, .col-md-3 .sidebar-item li,
.col-md-4 .sidebar-item.widget_rss h5 a, .col-md-3 .sidebar-item.widget_rss h5 a,
.col-md-4 .sidebar-item.widget_rss a.rsswidget, .col-md-3 .sidebar-item.widget_rss a.rsswidget,
.col-md-4 .sidebar-item.widget_rss cite, .col-md-3 .sidebar-item.widget_rss cite,
.col-md-3 .ContactWidget .contact_url, .col-md-3 .ContactWidget div.contact_content, .col-md-3 .ContactWidget a.fa, .col-md-3 .wisoInstagramWidget, .col-md-4 .ContactWidget .contact_url, .col-md-4 .ContactWidget div.contact_content, .col-md-4 .ContactWidget a.fa, .col-md-4 .wisoInstagramWidget,
    /*.widget_product_search form::after,.widget_search form div::after,*/
.sidebar-item span.product-title,
dt,
    /*.protected-page form input:not([type="submit"]),*/
    /*.protected-page form input[type="submit"]:hover,*/
.unit strong, .unit b,
.no-menu > a,
.wiso-shop-main-banner ul li a,
.single-product div.product .up-sells h2, .wiso_product_detail div.product .up-sells h2, .single-product .product .related.products h2, .wiso_product_detail .product .related.products h2,
.woocommerce div.product form.cart .button:hover,
.woocommerce .single-product div.product p.price ins, .woocommerce .wiso_product_detail div.product span.price ins, .woocommerce .single-product div.product span.price ins, .woocommerce ul.products.default li.product .price ins, .wiso_cart.shop_table ul .cart_item ul .product-price ins, .wiso_cart.shop_table ul .cart_item ul .product-subtotal ins, #topmenu .wiso_mini_cart .product_list_widget .mini_cart_item .mini-cart-data .mini_cart_item_price ins, .woocommerce table.shop_table .cart_item .product-total ins, .woocommerce .wiso_product_detail div.product p.price ins,
.woocommerce .single-product .star-rating, .woocommerce .wiso_product_detail .star-rating,
.woocommerce .single-product .star-rating:before, .woocommerce .wiso_product_detail .star-rating:before,
.woocommerce .wiso_images span.onsale, .woocommerce ul.products li.product .wiso-prod-list-image .onsale,
.woocommerce-page.woocommerce-cart .woocommerce input.button:hover, .woocommerce-page.woocommerce-checkout .woocommerce input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce a.button.alt:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,
.woocommerce-account .single-post p, .woocommerce-account .single-post strong,
.woocommerce ul.products li.product .wiso-prod-list-image .wiso-add-to-cart a,
.woocommerce .woocommerce-thankyou-order-received,
.woocommerce table.shop_table tfoot td,
.woocommerce .product-name a,
.product-gallery-wrap .on-new,
.wiso_product_detail .social-list a,
.single-product .product .summary .product_title, .wiso_product_detail .product .summary .product_title,
.single-product .product .summary .cart .group_table td.label, .wiso_product_detail .product .summary .cart .group_table td.label,
.single-product .product .summary .cart .variations .value ul li label, .wiso_product_detail .product .summary .cart .variations .value ul li label,
.single-product .product .summary .product_meta .posted_in a:hover, .wiso_product_detail .product .summary .product_meta .posted_in a:hover,
.single-product .product .summary .product_meta .tagged_as a:hover, .wiso_product_detail .product .summary .product_meta .tagged_as a:hover,
.single-product div.product .woocommerce-tabs ul.tabs.wc-tabs li.active a, .wiso_product_detail div.product .woocommerce-tabs ul.tabs.wc-tabs li.active a,
.single-product div.product .woocommerce-tabs .woocommerce-Tabs-panel h2, .wiso_product_detail div.product .woocommerce-tabs .woocommerce-Tabs-panel h2,
.single-product .product #reviews #comments .commentlist .comment .comment-text .meta, .wiso_product_detail .product #reviews #comments .commentlist .comment .comment-text .meta,
.single-product .product #reviews #comments .commentlist .comment .comment-text .description, .wiso_product_detail .product #reviews #comments .commentlist .comment .comment-text .description,
.single-product .product .woocommerce-Reviews #review_form_wrapper .comment-reply-title, .wiso_product_detail .product .woocommerce-Reviews #review_form_wrapper .comment-reply-title,
.single-product .product .woocommerce-Reviews #review_form_wrapper .comment-form-rating label, .wiso_product_detail .product .woocommerce-Reviews #review_form_wrapper .comment-form-rating label,
.single-product .product .woocommerce-Reviews #review_form_wrapper input, .wiso_product_detail .product .woocommerce-Reviews #review_form_wrapper input, .single-product .product .woocommerce-Reviews #review_form_wrapper textarea, .wiso_product_detail .product .woocommerce-Reviews #review_form_wrapper textarea,
.single-product .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit:hover, .wiso_product_detail .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit:hover,
.single-product .product div.related.products .related-subtitle, .wiso_product_detail .product div.related.products .related-subtitle,
.woocommerce ul.products li.product .category-product a:hover,
.woocommerce ul.products li.product .wiso-prod-list-image .wiso-link,
.woocommerce ul.products li.product h3,
.wiso-woocommerce-pagination .nav-links > div.nav-previous a,
.wiso-woocommerce-pagination .nav-links > div.nav-previous:hover:before,
.wiso-woocommerce-pagination .nav-links > div.nav-next a,
.wiso-woocommerce-pagination .nav-links > div.nav-next:hover:after,
.wiso_cart.shop_table .heading li,
.wiso_cart.shop_table ul .cart_item ul .product-name a,
.wiso_cart.shop_table ul .cart_item ul .product-name .variation dt,
#ship-to-different-address label,
.woocommerce form .form-row select,
.wiso-cart-collaterals .cart_totals h2,
.wiso-cart-collaterals .cart_totals .shop_table ul li,
.wiso-cart-collaterals .cart_totals .shop_table ul li span,
.wiso_cart.shop_table .complement-cart .coupon .input-text, .woocommerce form .form-row select, .woocommerce form .form-row input,
.wiso_cart.shop_table .complement-cart .coupon .input-text.button:hover, .woocommerce form .form-row select.button:hover, .woocommerce form .form-row input.button:hover,
.woocommerce form.checkout_coupon .form-row input.input-text,
.woocommerce form.checkout h3,
.woocommerce form.login .form-row label, .woocommerce form.checkout .form-row label, .woocommerce form.edit-account .form-row label, .woocommerce form.lost_reset_password .form-row label,
.select2-container--default .select2-selection--single .select2-selection__rendered,
.woocommerce form.login .form-row input[type="submit"]:focus:hover, .woocommerce form.login .form-row input[type="submit"]:visited:hover, .woocommerce form.login .form-row input[type="submit"]:active:hover, .woocommerce form.login .form-row input[type="submit"]:hover,
.woocommerce form.login .lost_password a,
.select2-container,
.select2-drop-active,
.select2-search:after,
.woocommerce table.shop_table .order-total th,
.woocommerce table.shop_table .order-total .woocommerce-Price-amount,
.woocommerce-checkout-review-order #payment .payment_methods.methods li label,
.woocommerce-checkout-review-order #payment div.payment_box,
.select2-results li.select2-highlighted,
.woocommerce table.shop_table thead .product-name, .woocommerce table.shop_table thead .product-total,
.woocommerce table.shop_table .cart_item .product-name,
.woocommerce table.shop_table .cart_item .product-name .variation dt,
.woocommerce table.shop_table tfoot .cart-subtotal th, .woocommerce table.shop_table tfoot .shipping th,
.woocommerce ul.products li.product a h2,
.woocommerce ul.products li.product span.on-new,
.sidebar-item .star-rating span,
.wiso-best-seller-widget .swiper-button-prev:hover, .wiso-best-seller-widget .swiper-button-next:hover,
.wiso-best-seller-widget .seller-text a,
.woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link a:hover,
.woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link.is-active a,
.woocommerce-MyAccount-content a:hover,
.woocommerce-MyAccount-content legend,
.wiso-shop-banner .wiso-shop-title,
.woocommerce form.login .form-row input[type="submit"]:focus:hover, .woocommerce form.login .form-row input[type="submit"]:visited:hover, .woocommerce form.login .form-row input[type="submit"]:active:hover, .woocommerce form.login .form-row input[type="submit"]:hover,
.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a:hover,
.woocommerce .woocommerce-message a.button:hover, .woocommerce .woocommerce-info a.button:hover, .woocommerce .woocommerce-error a.button:hover,
.SocialLinkWidget .wiso-widget-social-title,
.SocialLinkWidget .wiso-widget-social-link a,
.simple_gallery h1, .simple_gallery h2, .simple_gallery h3, .simple_gallery h4, .simple_gallery h5, .simple_gallery h6,
.simple_gallery .flex-prev, .simple_gallery .flex-next,
.simple_gallery .flex-prev:hover i, .simple_gallery .flex-next:hover i,
.simple_gallery .categories a:hover,
.simple_gallery .title,
.simple_gallery .info-item-wrap .name,
.simple_slider h1, .simple_slider h2, .simple_slider h3, .simple_slider h4, .simple_slider h5, .simple_slider h6,
.simple_slider .info-wrap a:hover,
.simple_slider .info-wrap .social-list a,
.urban h1, .urban h2, .urban h3, .urban h4, .urban h5, .urban h6,
.urban .social-list a,
.urban .info-item-wrap a:hover,
.tile_info h1, .tile_info h2, .tile_info h3, .tile_info h4, .tile_info h5, .tile_info h6,
.tile_info .text-gallery-wrap .info-item-wrap a:hover,
.tile_info .social-list a,
.alia h1, .alia h2, .alia h3, .alia h4, .alia h5, .alia h6,
.alia .text-gallery-wrap .info-item-wrap a:hover,
.alia .social-list a,
.menio .banner-wrap .social-list li a:hover,
.menio .social-list a,
.tg-item .tg-item-inner .main-color,
.portfolio-single-content.parallax h1, .portfolio-single-content.parallax h2, .portfolio-single-content.parallax h3, .portfolio-single-content.parallax h4, .portfolio-single-content.parallax h5, .portfolio-single-content.parallax h6,
.parallax-window .content-parallax .title,
.parallax-window .content-parallax .category-parallax a,
.parallax-window .content-parallax .info-item-wrap .item .name,
.parallax-window .content-parallax .info-item-wrap .item .text-item a:hover,
.portfolio-single-content.left_gallery h1, .portfolio-single-content.left_gallery h2, .portfolio-single-content.left_gallery h3, .portfolio-single-content.left_gallery h4, .portfolio-single-content.left_gallery h5, .portfolio-single-content.left_gallery h6,
.portfolio-single-content.left_gallery .info-item-wrap .text-item a:hover,
#grid-4101 .tg-nav-color:not(.dots):not(.tg-dropdown-value):not(.tg-dropdown-title):hover,
#grid-4101 .tg-nav-color:hover .tg-nav-color, #grid-4101 .tg-page-number.tg-page-current,
#grid-4101 .tg-filter.tg-filter-active span,
.main-header-testimonial.classic .content-slide .description,
.headings.text_link .link-wrap a:hover,
.headings.text_button .subtitle,
.headings.simple .title,
.insta-wrapper.style2 a:not(.insta-item),
.insta-wrapper .info-hover,
.team-members-wrap.inline .team-member .member-name,
.team-members-wrap.slider_modern .member-name,
.team-members-wrap.slider_modern .swiper-button-next, .team-members-wrap.slider_modern .swiper-button-prev,
.about-section-simple .title,
.about-section-simple .description blockquote p,
.about-section.slider .about-section__title,
.banner-slider-wrap.andra .swiper-pagination span,
.coming-page-wrapper .form input:not([type="submit"]):focus, .coming-page-wrapper .form textarea:focus,
.form.btn-style-1 input[type=submit]:hover,
.form.btn-style-3 input[type=submit],
.form.btn-style-4 input[type=submit]:hover,
.contacts-info-wrap .title,
.contacts-info-wrap .content-item div, .contacts-info-wrap .content-item a,
.contacts-info-wrap .content-item a:hover,
.contacts-info-wrap .form input[type="submit"]:hover,
.contacts-info-wrap.parallax_info .text,
.contacts-info-wrap.parallax_content .text h1, .contacts-info-wrap.parallax_content .text h2, .contacts-info-wrap.parallax_content .text h3, .contacts-info-wrap.parallax_content .text h4, .contacts-info-wrap.parallax_content .text h5, .contacts-info-wrap.parallax_content .text h6,
.contacts-info-wrap.parallax_content .text a:hover,
.contacts-info-wrap.parallax_content .text blockquote,
.contacts-info-wrap.parallax_content .text blockquote p,
.contacts-info-wrap.info_with_form .address a:hover,
.contacts-info-wrap.info_list .item-wrapper a:hover,
.contacts-info-wrap.style6 .item-wrapper a:hover,
.contacts-info-wrap.style7 .title,
.form.btn-style-2 .input_protected_wrapper input,
.form.btn-style-3 .input_protected_wrapper:hover input,
.form.btn-style-4 .input_protected_wrapper input,
.event-post-box .title a,
.headings.text_link .link-wrap a:hover,
.headings.text_button .subtitle,
.headings.simple .title,
.insta-wrapper.style2 a:not(.insta-item),
.insta-wrapper .info-hover,
.thumb-slider-wrapp .thumb-slider-wrapp-arrow .hide-images, .thumb-slider-wrapp .thumb-slider-wrapp-arrow .show-images,
.page-wrapper a span,
.fragment-wrapper .fragment-block .fragment-text .wrap-frag-text,
.glitch-wrapper .title,
.distortion__nav span,
.distortion__nav span:hover,
.urban_slider .slick-arrow,
.urban_slider .slick-current .pagination-title,
.split_slider .split-wrapper .author,
.split_slider .split-wrapper .title a,
.outer-album-swiper .album-text-title,
.post-slider-wrapper .title,
.pricing-info .title,
.services.center .content .title,
.services i,
.services.accordion .accordeon a i,
.services.accordion .accordeon .title,
.services.tile .item .text-wrap i,
.services.tile .item .text-wrap .title,
.service-list-wrapper .counter,
.skill-wrapper.linear .title,
.skill-wrapper.linear .skill-label,
.skill-wrapper.linear .skill-value,
.main-header-testimonial.classic .content-slide .description,
.main-header-testimonial.classic .content-slide .user-info .name,
.video.only-button .video-content .play:hover::before,
.exhibition-wrap .btn:hover,
.post.center-style.format-link .link-wrap i, .post.center-style.format-post-link .link-wrap i,
.post.metro-style.format-link .link-wrap i, .post.metro-style.format-post-link .link-wrap i {
    color: <?php echo esc_html(cs_get_option( 'front_color_1')) ?>;
}

#contactform textarea::-moz-placeholder, #contactform input::-moz-placeholder,
.comments-form textarea::-moz-placeholder, .comments-form input::-moz-placeholder,
.contacts-info-wrap .form input::-webkit-input-placeholder,
.contacts-info-wrap .form input::-moz-placeholder,
.contacts-info-wrap .form input:-ms-input-placeholder,
.contacts-info-wrap .form input:-moz-placeholder,
.contacts-info-wrap .form textarea::-webkit-input-placeholder,
.contacts-info-wrap .form textarea::-moz-placeholder,
.contacts-info-wrap .form textarea:-ms-input-placeholder,
.contacts-info-wrap .form textarea:-moz-placeholder,
.woocommerce form.login .form-row input, .woocommerce form.login .form-row textarea, .woocommerce form.checkout .form-row input, .woocommerce form.checkout .form-row textarea,
.woocommerce form.login .form-row input:-webkit-input-placeholder, .woocommerce form.login .form-row textarea:-webkit-input-placeholder, .woocommerce form.checkout .form-row input:-webkit-input-placeholder, .woocommerce form.checkout .form-row textarea:-webkit-input-placeholder,
.woocommerce form.login .form-row input:-moz-placeholder, .woocommerce form.login .form-row textarea:-moz-placeholder, .woocommerce form.checkout .form-row input:-moz-placeholder, .woocommerce form.checkout .form-row textarea:-moz-placeholder,
.woocommerce form.login .form-row input:-ms-input-placeholder, .woocommerce form.login .form-row textarea:-ms-input-placeholder, .woocommerce form.checkout .form-row input:-ms-input-placeholder, .woocommerce form.checkout .form-row textarea:-ms-input-placeholder,
.woocommerce form.login .form-row input:-moz-placeholder, .woocommerce form.login .form-row textarea:-moz-placeholder, .woocommerce form.checkout .form-row input:-moz-placeholder, .woocommerce form.checkout .form-row textarea:-moz-placeholder,
.text-dark p,
.woocommerce-account .woocommerce-MyAccount-navigation ul li a,
.woocommerce form.checkout_coupon .form-row input.input-text:-webkit-input-placeholder,
.woocommerce form.checkout_coupon .form-row input.input-text:-moz-placeholder,
.woocommerce form.checkout_coupon .form-row input.input-text:-ms-input-placeholder,
.woocommerce form.checkout_coupon .form-row input.input-text:-moz-placeholder,
.wiso_cart.shop_table .complement-cart .coupon .input-text:-webkit-input-placeholder, .woocommerce form .form-row select:-webkit-input-placeholder, .woocommerce form .form-row input:-webkit-input-placeholder,
.wiso_cart.shop_table .complement-cart .coupon .input-text:-moz-placeholder, .woocommerce form .form-row select:-moz-placeholder, .woocommerce form .form-row input:-moz-placeholder,
.wiso_cart.shop_table .complement-cart .coupon .input-text:-ms-input-placeholder, .woocommerce form .form-row select:-ms-input-placeholder, .woocommerce form .form-row input:-ms-input-placeholder,
.wiso_cart.shop_table .complement-cart .coupon .input-text:-moz-placeholder, .woocommerce form .form-row select:-moz-placeholder, .woocommerce form .form-row input:-moz-placeholder {
    color: <?php echo esc_html(cs_get_option( 'front_color_1')) ?>;
}

.post.center-style.format-gallery .flex-prev,
.post.center-style.format-gallery .flex-next,
.post.center-style.format-post-slider .flex-prev,
.post.center-style.format-post-slider .flex-next,
.post.center-style.format-link .info-wrap,
.post.center-style.format-post-link .info-wrap,
.post.metro-style .info-wrap .category a,
.post.metro-style.format-link .post-wrap-item,
.post.metro-style.format-post-link .post-wrap-item,
.post.metro-style.format-video .video-content .play:hover,
.post.metro-style.format-post-video .video-content .play:hover,
.post.metro-style.format-link .info-wrap,
.post.metro-style.format-post-link .info-wrap,
.post.metro-style.format-gallery .flex-prev:hover,
.post.metro-style.format-gallery .flex-next:hover,
.post.metro-style.format-post-slider .flex-prev:hover,
.post.metro-style.format-post-slider .flex-next:hover,
.single-post .single-content .img-slider .flex-prev,
.single-post .single-content .img-slider .flex-next,
.main-wrapper .col-md-4 .sidebar-item.widget_tag_cloud a,
.main-wrapper .col-md-3 .sidebar-item.widget_tag_cloud a,
.post-details .single-categories a,
.post-info .single-tags a:hover,
.bottom-infopwrap .single-tags a:hover,
.user-info-wrap .single-tags a:hover,
.main-top-content .single-tags a:hover,
.post-details .link-wrap .single-tags a:hover,
.post-info span a,
#contactform #submit,
.comments-form #submit,
.events-single-content .info-event-wrap .info-item .info .end-date::before,
.events-single-content .end-event,
.events-single-content.protected-page input[type="submit"], .single-portfolio .protected-page input[type="submit"],
.item .item-img .end-event,
.event-post-box .flex-prev:hover, .event-post-box .flex-next:hover,
.a-btn,
.error404 .hero-inner .search input[type="submit"],
.protected-page form input[type="submit"],
.archive-client .user-info-wrap .title:before,
.col-md-4 .widget_tag_cloud a, .col-md-3 .widget_tag_cloud a,
button,
html input[type=button],
input[type=reset],
input[type=submit],
.woocommerce div.product form.cart .button,
.woocommerce-page.woocommerce-cart .woocommerce input.button, .woocommerce-page.woocommerce-checkout .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce a.button.alt, .woocommerce button.button, .woocommerce input.button,
.single-product .product .summary .cart .variations .value ul li input:checked + label:before, .wiso_product_detail .product .summary .cart .variations .value ul li input:checked + label:before,
.woocommerce ul.products li.product .wiso_product_list_name .count,
.single-product .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit, .wiso_product_detail .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit,
.woocommerce form.login .form-row input[type="submit"]:focus, .woocommerce form.login .form-row input[type="submit"]:visited, .woocommerce form.login .form-row input[type="submit"]:active, .woocommerce form.login .form-row input[type="submit"],
.woocommerce form.login .form-row input[type="checkbox"]:checked + label.checkbox:before, .woocommerce form.checkout .form-row input[type="checkbox"]:checked + label.checkbox:before, .woocommerce .woocommerce-shipping-fields input[type="checkbox"]:checked + label.checkbox:before,
.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.woocommerce form.login .form-row input[type="submit"]:focus, .woocommerce form.login .form-row input[type="submit"]:visited, .woocommerce form.login .form-row input[type="submit"]:active, .woocommerce form.login .form-row input[type="submit"],
.woocommerce .woocommerce-message, .woocommerce .woocommerce-info, .woocommerce .woocommerce-error,
.simple_gallery .flex-prev, .simple_gallery .flex-next,
.simple_slider .post-media .swiper-pagination-bullet,
.simple_slider .post-media .swiper-pagination-bullet-active,
.form.btn-style-1 input[type=submit],
.contacts-info-wrap .form input[type="submit"],
.contacts-info-wrap.custom_info .additional-content-wrap,
.wpcf7 .input_protected_wrapper input,
.form.btn-style-2 .input_protected_wrapper:hover input,
.form.btn-style-3 .input_protected_wrapper input,
canvas,
.event-post-box .end-event,
.headings.text_link .link-wrap::before,
.insta-wrapper.style2 a:not(.insta-item):hover,
.insta-wrapper .info-hover i::before,
.insta-wrapper .info-hover i::after,
.glitch-wrapper .title mark,
.urban_slider .slick-arrow:hover,
.portfolio-slider-wrap.slider_classic .swiper-pagination .swiper-pagination-bullet,
.post-slider-wrapper .swiper-pagination-progressbar,
.skill-wrapper.linear .line .active-line,
.video.only-button .video-content .play,
.headings.text_link .link-wrap::before,
.insta-wrapper.style2 a:not(.insta-item):hover,
.insta-wrapper .info-hover i::before, .insta-wrapper .info-hover i::after,
.flex-control-paging li a.flex-active,
.post > .post-wrap-item,
.blog .mfp-fade.mfp-bg.mfp-ready,
.archive .mfp-fade.mfp-bg.mfp-ready,
.single-post .mfp-fade.mfp-bg.mfp-ready,
.pagination a.img,
.toggle-title:after,
.black,
.highlight,
.client-wrap .client-link:hover .client-overlay,
.distortion__content,
.video.only-button .video-container iframe,
.video.only-button .fluid-width-video-wrapper iframe,
.mfp-fade.mfp-bg.mfp-ready,
.thumb-glitch,
.thumb-glitch .swiper-button-next,
.thumb-glitch .swiper-button-prev,
.animsition-loading:before,
.ri-grid ul li a,
.ri-grid ul li {
    background-color: <?php echo esc_html(cs_get_option( 'front_color_1')) ?>;
}

.page-numbers:hover, .page-numbers:focus,
.post-nav .pages, .post-nav .current, .pager-pagination .pages, .pager-pagination .current,
#contactform #submit,
.comments-form #submit,
.post-info .single-tags a:hover,
.bottom-infopwrap .single-tags a:hover,
.user-info-wrap .single-tags a:hover,
.main-top-content .single-tags a:hover,
.post-details .link-wrap .single-tags a:hover,
#contactform textarea:focus,
#contactform input:not([type="submit"]):focus,
.comments-form textarea:focus,
.comments-form input:not([type="submit"]):focus,
.error404 .hero-inner .search input:not([type="submit"]),
.protected-page form input[type="submit"],
.a-btn,
.a-btn-2:hover,
.a-btn-3:hover,
button, html input[type=button], input[type=reset], input[type=submit],
.error404 .hero-inner .search input[type="submit"],
.sidebar-item input:focus,
.protected-page form input:not([type="submit"]):focus,
body table.booked-calendar td.today .date span,
.woocommerce div.product form.cart .button,
.woocommerce-page.woocommerce-cart .woocommerce input.button,
.woocommerce-page.woocommerce-checkout .woocommerce input.button,
.woocommerce #respond input#submit,
.woocommerce a.button, .woocommerce a.button.alt,
.woocommerce button.button, .woocommerce input.button,
.single-product .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit,
.wiso_product_detail .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit,
.woocommerce form.login .form-row input[type="submit"]:focus,
.woocommerce form.login .form-row input[type="submit"]:visited,
.woocommerce form.login .form-row input[type="submit"]:active,
.woocommerce form.login .form-row input[type="submit"],
.woocommerce form.login .form-row input[type="submit"]:focus,
.woocommerce form.login .form-row input[type="submit"]:visited,
.woocommerce form.login .form-row input[type="submit"]:active,
.woocommerce form.login .form-row input[type="submit"],
.woocommerce form .form-row.woocommerce-validated .select2-container,
.woocommerce form .form-row.woocommerce-validated input.input-text,
.woocommerce form .form-row.woocommerce-validated select,
.single-product .product .woocommerce-Reviews #review_form_wrapper input:focus,
.wiso_product_detail .product .woocommerce-Reviews #review_form_wrapper input:focus,
.single-product .product .woocommerce-Reviews #review_form_wrapper textarea:focus,
.wiso_product_detail .product .woocommerce-Reviews #review_form_wrapper textarea:focus,
.single-product div.product .woocommerce-tabs ul.tabs.wc-tabs li.active a,
.wiso_product_detail div.product .woocommerce-tabs ul.tabs.wc-tabs li.active a,
.woocommerce-account .woocommerce-MyAccount-navigation ul li a:hover,
.contacts-info-wrap .form input[type="submit"],
.video.only-button .video-content .play,
.form.btn-style-1 input[type=submit],
.form.btn-style-2 input[type=submit]:hover,
.form.btn-style-3 input[type=submit]:hover,
.contacts-info-wrap .form input:not([type="submit"]):focus, .contacts-info-wrap .form textarea:focus,
.flex-control-paging li,
.woocommerce-account .woocommerce-MyAccount-navigation ul li a {
    border-color: <?php echo esc_html(cs_get_option( 'front_color_1')) ?>;
}

.error404 .main-wrapper.unit .vertical-align .a-btn::after {
    border-left-color: <?php echo esc_html(cs_get_option( 'front_color_1')) ?>;
}

.error404 .main-wrapper.unit .vertical-align a,
.select2-drop-active,
.wiso-sorting-products-widget .woocommerce-ordering select,
.events-single-content.protected-page input[type="password"]:focus,
.single-portfolio .protected-page input[type="password"]:focus,
.spinner-preloader-wrap .cssload-container .cssload-moon {
    border-bottom-color: <?php echo esc_html(cs_get_option( 'front_color_1')) ?>;
}

.post-nav a span,
.wiso_cart.shop_table ul .cart_item ul .product-remove .remove:hover,
.woocommerce .sidebar-item a.remove,
.widget_product_categories .product-categories a:hover {
    color: <?php echo esc_html(cs_get_option( 'front_color_1')) ?> !important;
}

body table.booked-calendar td.today:hover .date span {
    background-color: <?php echo esc_html(cs_get_option( 'front_color_1')) ?> !important;
}

.woocommerce div.product form.cart .button,
.woocommerce-page.woocommerce-cart .woocommerce input.button, .woocommerce-page.woocommerce-checkout .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce a.button.alt, .woocommerce button.button, .woocommerce input.button,
.woocommerce-page.woocommerce-cart .woocommerce input.button:hover, .woocommerce-page.woocommerce-checkout .woocommerce input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce a.button.alt:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,
.single-product .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit, .wiso_product_detail .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit,
.woocommerce form.login .form-row input[type="submit"]:focus, .woocommerce form.login .form-row input[type="submit"]:visited, .woocommerce form.login .form-row input[type="submit"]:active, .woocommerce form.login .form-row input[type="submit"],
.woocommerce form.login .form-row input[type="submit"]:focus, .woocommerce form.login .form-row input[type="submit"]:visited, .woocommerce form.login .form-row input[type="submit"]:active, .woocommerce form.login .form-row input[type="submit"],
.woocommerce-account .woocommerce-MyAccount-navigation ul li a,
.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a,
.woocommerce .woocommerce-message a.button, .woocommerce .woocommerce-info a.button, .woocommerce .woocommerce-error a.button,
#contactform #submit,
.comments-form #submit,
.a-btn,
.error404 .hero-inner .search input[type="submit"],
.protected-page form input[type="submit"],
.form.btn-style-1 input[type=submit],
.contacts-info-wrap .form input[type="submit"],
.video.only-button .video-content .play {
    background-image: -webkit-gradient(linear, left top, right top, color-stop(50%, transparent), color-stop(50%, <?php echo esc_html(cs_get_option( 'front_color_1')) ?>));
    background-image: linear-gradient(to right, transparent 50%, <?php echo esc_html(cs_get_option( 'front_color_1')) ?> 50%);
}

.a-btn-2,
.a-btn-3,
.form.btn-style-3 input[type=submit],
.form.btn-style-2 input[type=submit] {
    background-image: -webkit-gradient(linear, left top, right top, color-stop(50%, <?php echo esc_html(cs_get_option( 'front_color_1')) ?>), color-stop(50%, transparent));
    background-image: linear-gradient(to right, <?php echo esc_html(cs_get_option( 'front_color_1')) ?> 50%, transparent 50%);
}

<?php endif;

/* ======= FRONT COLOR 2 ======= */

if (cs_get_option( 'front_color_2') && cs_get_option( 'front_color_2') !== '#999999') : ?>
.post-little-banner .page-title-blog span,
.post-little-banner .count-results,
.post-little-banner.empty-post-list input:not([type="submit"]),
.post.center-style .category a,
.post.center-style .date::before,
.post.center-style .date a,
.post.center-style.format-quote .info-wrap cite, .post.center-style.format-post-text .info-wrap cite,
.post.center-style.format-link .link-wrap a:hover, .post.center-style.format-post-link .link-wrap a:hover,
.post.metro-style.format-quote .info-wrap cite, .post.metro-style.format-post-text .info-wrap cite,
.post.metro-style.format-link .link-wrap a:hover, .post.metro-style.format-post-link .link-wrap a:hover,
.metro-load-more .metro-load-more__button,
.single-post p,
.single-post .single-content blockquote p::before,
.main-wrapper .col-md-4 .sidebar-item a:hover, .main-wrapper .col-md-3 .sidebar-item a:hover,
.single-pagination > div,
.post-details .date-post, .post-details .author,
.main-wrapper .col-md-4 .sidebar-item .wiso-widget-about .text, .main-wrapper .col-md-3 .sidebar-item .wiso-widget-about .text,
.main-wrapper .col-md-4 .sidebar-item .wiso-recent-post-widget .recent-date, .main-wrapper .col-md-3 .sidebar-item .wiso-recent-post-widget .recent-date,
.sm-wrap-post .content .title:hover,
.sm-wrap-post .content .excerpt,
.sm-wrap-post .content .post-date .date,
.post-details .link-wrap i,
.post-details ul li, .post-details ol li,
.post-info .single-tags a, .bottom-infopwrap .single-tags a, .user-info-wrap .single-tags a, .main-top-content .single-tags a, .post-details .link-wrap .single-tags a,
.post-info .likes-wrap span, .post-info .count, .post-info .post__likes,
.post-info .social-list a:hover,
.user-info-wrap .post-author__social a:hover,
.comments .content .comment-reply-link:hover,
.comments .content .text,
.comments .person .author:hover,
.comments .person .comment-date,
.unit .post-little-banner + .post-paper.padding-both ul li,
.unit .post-little-banner + .post-paper.padding-both ol li,
.events-single-content .info-event-wrap .info-item .info a,
.events-single-content .info-event-wrap .info-item .info,
.events-single-content .content-main p,
.event-content-wrap .additional-text,
.wpb_text_column p,
.error404 .hero-inner .search input:not([type="submit"]),
.col-md-4 .sidebar-item a, .col-md-4 .sidebar-item span, .col-md-4 .sidebar-item p, .col-md-4 .sidebar-item strong, .col-md-3 .sidebar-item a, .col-md-3 .sidebar-item span, .col-md-3 .sidebar-item p, .col-md-3 .sidebar-item strong,
.col-md-4 .sidebar-item select, .col-md-3 .sidebar-item select,
.col-md-4 .sidebar-item.widget_rss a.rsswidget:hover, .col-md-3 .sidebar-item.widget_rss a.rsswidget:hover,
.col-md-4 .sidebar-item.widget_rss span.rss-date, .col-md-3 .sidebar-item.widget_rss span.rss-date,
.sidebar-item span.product-title:hover,
div.wpcf7-mail-sent-ok, div.wpcf7-validation-errors, div.wpcf7-acceptance-missing,
.archive-client .user-info-wrap .descr,
.wiso-shop-main-banner ul li,
.wiso-shop-main-banner ul li a:hover,
.woocommerce del,
.single-product div.product .up-sells h2:hover, .wiso_product_detail div.product .up-sells h2:hover, .single-product .product .related.products h2:hover, .wiso_product_detail .product .related.products h2:hover,
p.cart-empty,
.woocommerce .single-product div.product p.price, .woocommerce .single-product div.product span.price, .woocommerce ul.products.default li.product .price, .wiso_cart.shop_table ul .cart_item ul .product-price, .wiso_cart.shop_table ul .cart_item ul .product-subtotal, #topmenu .wiso_mini_cart .product_list_widget .mini_cart_item .mini-cart-data .mini_cart_item_price, .woocommerce table.shop_table .cart_item .product-total,
.woocommerce .wiso_product_detail div.product .price,
.woocommerce .quantity .qty,
.woocommerce-account .addresses .title .edit,
.woocommerce .product-total, .woocommerce .shipped_via,
.wiso_product_detail .social-list a:hover,
.single-product .product .summary .woocommerce-product-rating .woocommerce-review-link, .wiso_product_detail .product .summary .woocommerce-product-rating .woocommerce-review-link,
.single-product .product .summary .product_desc p, .wiso_product_detail .product .summary .product_desc p,
.single-product .product .summary .variations_form.cart .variations_button span, .single-product .product .summary .variations_form.cart .variations tbody span, .wiso_product_detail .product .summary .variations_form.cart .variations_button span, .wiso_product_detail .product .summary .variations_form.cart .variations tbody span,
.single-product .product .summary .variations_form.cart .variations .value select, .wiso_product_detail .product .summary .variations_form.cart .variations .value select,
.single-product .product .summary .cart .variations .label label, .wiso_product_detail .product .summary .cart .variations .label label,
.single-product .product .summary .cart .variations .value ul li p, .wiso_product_detail .product .summary .cart .variations .value ul li p,
.single-product .product .summary .product_meta, .wiso_product_detail .product .summary .product_meta,
.single-product .product .summary .product_meta a, .wiso_product_detail .product .summary .product_meta a,
.single-product .product .summary .product_meta .sku_wrapper .sku, .wiso_product_detail .product .summary .product_meta .sku_wrapper .sku,
.single-product div.product .woocommerce-tabs ul.tabs.wc-tabs li a, .wiso_product_detail div.product .woocommerce-tabs ul.tabs.wc-tabs li a,
.single-product div.product .woocommerce-tabs .woocommerce-Tabs-panel p, .wiso_product_detail div.product .woocommerce-tabs .woocommerce-Tabs-panel p,
.single-product .product #reviews #comments .commentlist .comment .comment-text .date_publish, .wiso_product_detail .product #reviews #comments .commentlist .comment .comment-text .date_publish,
.woocommerce ul.products li.product .category-product,
.woocommerce ul.products li.product .category-product a,
.wiso-woocommerce-pagination .nav-links > div,
.wiso_cart.shop_table ul .cart_item ul .product-price, .wiso_cart.shop_table ul .cart_item ul .product-subtotal,
.wiso-cart-collaterals .cart_totals .shop_table ul li span.price-value,
.select2-search input,
.select2-results li,
.woocommerce table.shop_table .cart_item .product-name strong,
.woocommerce table.shop_table .cart_item .product-name .variation dd p,
.woocommerce table.shop_table tfoot .cart-subtotal td .woocommerce-Price-amount, .woocommerce table.shop_table tfoot .shipping td .woocommerce-Price-amount,
.woocommerce-checkout-review-order #payment .payment_methods.methods li,
.woocommerce-checkout-review-order #payment .payment_methods.methods li .about_paypal,
.widget_price_filter .price_slider_amount .button:hover,
.widget_price_filter .price_label,
.woocommerce div.product p.stock,
.woocommerce ul.products li.product span,
.wiso-best-seller-widget .swiper-button-prev, .wiso-best-seller-widget .swiper-button-next,
.wiso-best-seller-widget .seller-price,
.wiso-sorting-products-widget .woocommerce-ordering::after,
.wiso-sorting-products-widget .woocommerce-ordering select,
.woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link a,
.woocommerce-MyAccount-content a,
.woocommerce-MyAccount-content address,
.wiso-shop-banner .wiso-shop-menu ul li,
.wiso-shop-banner .wiso-shop-menu ul li a:hover,
.woocommerce ul, .woocommerce-MyAccount-content p,
.SocialLinkWidget .wiso-widget-social-link a:hover,
.widget_product_categories .product-categories a,
.simple_gallery .categories a,
.simple_gallery .text p,
.simple_gallery .info-item-wrap .text-item, .simple_gallery .info-item-wrap .text-item a,
.simple_slider .info-wrap .text-item a,
.simple_slider .info-wrap .social-list a:hover,
.simple_slider .text-wrap .text,
.simple_slider .blockquote::before,
.simple_slider .blockquote cite,
.urban .banner-wrap .excerpt,
.urban .info-item-wrap .text-item,
.urban .info-item-wrap .text-item a,
.urban .text-wrap .text,
.urban .blockquote::before,
.urban .blockquote cite,
.urban .social-list a:hover,
.tile_info .text-gallery-wrap .info-item-wrap .text-item,
.tile_info .text-gallery-wrap .info-item-wrap .text-item a,
.tile_info .text-gallery-wrap .text-wrap .text,
.tile_info .blockquote::before,
.tile_info .blockquote cite,
.tile_info .social-list a:hover,
.tile_info .recent-posts-wrapper .subtitle,
.alia .text-gallery-wrap .info-item-wrap .text-item, .alia .text-gallery-wrap .info-item-wrap a,
.alia .text-wrap .text p,
.alia .social-list a:hover,
.menio .blockquote cite,
.menio .additional-text,
.menio .text-wrap p,
.menio .social-list a:hover,
.menio .recent-posts-wrapper .subtitle,
.parallax-window .content-parallax .category-parallax a:hover,
.parallax-window .content-parallax .text,
.parallax-window .content-parallax .social-list > li a:hover,
.parallax-window .content-parallax .info-item-wrap .item .text-item a, .parallax-window .content-parallax .info-item-wrap .item .text-item,
.portfolio-single-content.left_gallery .info-wrap .text,
.portfolio-single-content.left_gallery .info-item-wrap .text-item,
.portfolio-single-content.left_gallery .info-item-wrap .text-item a,
.portfolio-single-content.left_gallery .social-list a:hover,
.headings.text_link .subtitle,
.headings.classic_text .subtitle,
.headings.text_button .title,
.headings.text_link .link-wrap a,
.headings.text_button_modern .subtitle,
.headings.text_center .subtitle,
.headings.simple .subtitle,
.team-members-wrap.inline .team-member .member-position,
.team-members-wrap.inline .team-member .social .fa:hover,
.team-members-wrap.slider_modern .member-position,
.team-members-wrap.slider_modern .team-member .social a:hover,
.team-members-wrap.chess_tile .member-text,
.team-members-wrap.chess_tile .social .soc-item:hover,
.about-section-simple .subtitle,
.about-section-simple .description,
.about-section-simple .description p,
.about-section.slider .swiper-button-prev, .about-section.slider .swiper-button-next,
.about-section.slider .about-section__description,
.about-section.slider .about-section__counter,
.banner-slider-wrap.andra .swiper-pagination .swiper-pagination-total,
.banner-slider-wrap.urban .pag-wrapper .swiper-button-next:hover,
.banner-slider-wrap.urban .pag-wrapper .swiper-button-prev:hover,
.coming-page-wrapper .form input:not([type="submit"]), .coming-page-wrapper .form textarea,
.contacts-info-wrap.parallax_info .title-main,
.contacts-info-wrap.parallax_content .title-main,
.contacts-info-wrap.parallax_content .text p,
.contacts-info-wrap.parallax_content .text blockquote::before,
.contacts-info-wrap.info_with_form .address, .contacts-info-wrap.info_with_form .address p, .contacts-info-wrap.info_with_form .address a,
.contacts-info-wrap.info_list .item-wrapper a, .contacts-info-wrap.info_list .item-wrapper .text,
.contacts-info-wrap.style6 .item-wrapper .title,
.contacts-info-wrap.style7 .text,
.headings.text_link .subtitle,
.headings.text_link .link-wrap a,
.headings.text_button .title,
.headings.classic_text .subtitle,
.headings.text_button_modern .subtitle,
.headings.text_center .subtitle,
.headings.simple .subtitle,
.thumb-glitch .swiper-button-next.swiper-button-disabled, .thumb-glitch .swiper-button-prev.swiper-button-disabled,
.fragment-wrapper .fragment-block .fragment-text .wrap-frag-text .desc,
.urban_slider .slick-current .pagination-category,
.split_slider .split-wrapper .descr,
.outer-album-swiper .album-text-desc,
.post-slider-wrapper.slider_progress .content-wrap p,
.post-slider-wrapper .category,
.post-slider-wrapper .date,
.pricing-info .subtitle,
.pricing-info .pricing-list li, .pricing-info .pricing-list p,
.services.accordion .accordeon a,
.services.accordion .accordeon a:hover, .services.accordion .accordeon a:hover .title,
.services.accordion .accordeon .text,
.services.classic .text,
.services.center .content .text,
.services.tile .item .text-wrap .subtitle,
.services.tile .item .text-wrap .text,
.service-list-wrapper .text,
.skill-wrapper.linear .subtitle,
.skill-wrapper.linear .text,
.skill-wrapper.linear-text .text,
.post.metro-style .info-wrap .date a,
.post.metro-style .info-wrap .text p,
.main-wrapper .col-md-4 .sidebar-item .cat-item.current-cat a,
.main-wrapper .col-md-3 .sidebar-item .cat-item.current-cat a,
.wiso_cart.shop_table ul .cart_item ul .product-name .variation dd p,
.woocommerce ul.products li.product,
.woocommerce ul.products li.product span del,
.woocommerce ul.products li.product span del span,
.event-post-box .events-desc p,
.event-post-box .events-date {
    color: <?php echo esc_html(cs_get_option( 'front_color_2')) ?>;
}

.wiso-shop-main-banner ul li:not(:last-of-type)::after,
.single-product .product .summary .cart .variations .value ul li label:before,
.wiso_product_detail .product .summary .cart .variations .value ul li label:before,
.woocommerce form.login .form-row label.checkbox:before,
.woocommerce form.checkout .form-row label.checkbox:before,
.woocommerce .woocommerce-shipping-fields label.checkbox:before,
.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content,
.wiso-shop-banner .wiso-shop-menu ul li:not(:last-of-type)::after,
.main-wrapper .col-md-4 .sidebar-item.widget_tag_cloud a:hover,
.main-wrapper .col-md-3 .sidebar-item.widget_tag_cloud a:hover,
.main-header-testimonial.classic .swiper-pagination span.swiper-pagination-bullet-active,
.about-section.slider .about-section__counter-divider,
.post-slider-wrapper .swiper-pagination,
.main-header-testimonial.classic .swiper-pagination span.swiper-pagination-bullet-active,
.video.only-button .video-content::before,
.video.only-button .video-content::after {
    background-color: <?php echo esc_html(cs_get_option( 'front_color_2')) ?>;
}

.pages,
.page-numbers,
.select2-search input,
.woocommerce-account table.my_account_orders td, .woocommerce-account table.my_account_orders th,
.woocommerce form.checkout_coupon .form-row input.input-text:focus,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
    border-color: <?php echo esc_html(cs_get_option( 'front_color_2')) ?>;
}

.lg-outer .lg-thumb-item.active,
.lg-outer .lg-thumb-item:hover {
    border-color: <?php echo esc_html(cs_get_option( 'front_color_2')) ?> !important
}

.select2-container.select2-dropdown-open.select2-drop-above .select2-choice,
.woocommerce .woocommerce-message, .woocommerce .woocommerce-info, .woocommerce .woocommerce-error,
.comment-title {
    border-bottom-color: <?php echo esc_html(cs_get_option( 'front_color_2')) ?>;
}

.wiso_cart.shop_table ul .cart_item ul .product-remove .remove,
.woocommerce a.remove:hover {
    color: <?php echo esc_html(cs_get_option( 'front_color_2')) ?> !important;
}

<?php endif;

/* ======= FRONT COLOR 3 ======= */

if (cs_get_option( 'front_color_3') && cs_get_option( 'front_color_3') !== '#eeeeee') : ?>

.service-list-wrapper.classic .counter,
.single-pagination > div.pag-prev::before,
.single-pagination > div.pag-next::after,
.single-pagination .icon-wrap i,
.single-post dl dd, .comments dl dd,
.post-info span a, .post-info span,
.wiso-woocommerce-pagination .nav-links > div.nav-previous:before,
.wiso-woocommerce-pagination .nav-links > div.nav-next:after,
.woocommerce .wiso_product_detail div.product p.price del,
.woocommerce .single-product div.product p.price del,
.woocommerce .wiso_product_detail div.product span.price del,
.woocommerce .single-product div.product span.price del,
.woocommerce ul.products.default li.product .price del,
.wiso_cart.shop_table ul .cart_item ul .product-price del,
.wiso_cart.shop_table ul .cart_item ul .product-subtotal del,
#topmenu .wiso_mini_cart .product_list_widget .mini_cart_item .mini-cart-data .mini_cart_item_price del,
.woocommerce table.shop_table .cart_item .product-total del,
.team-members-wrap.slider_modern .swiper-button-next:hover,
.team-members-wrap.slider_modern .swiper-button-prev:hover {
    color: <?php echo esc_html(cs_get_option( 'front_color_3')) ?>;
}

.exhibition-wrap .room__side--left, .exhibition-wrap .room__side--right,
.fragment-wrapper .fragment-block .fragment-img {
    background-color: <?php echo esc_html(cs_get_option( 'front_color_3')) ?>;
}

.post-info .single-tags a, .bottom-infopwrap .single-tags a,
.user-info-wrap .single-tags a, .main-top-content .single-tags a,
.post-details .link-wrap .single-tags a,
.col-md-4 .sidebar-item select, .col-md-3 .sidebar-item select,
.woocommerce .quantity .qty,
.single-product .product .summary .variations_form.cart .variations .value select,
.wiso_product_detail .product .summary .variations_form.cart .variations .value select,
.wiso_cart.shop_table .complement-cart .coupon .input-text, .woocommerce form .form-row select,
.woocommerce form .form-row input,
.woocommerce form.checkout_coupon .form-row input.input-text,
.woocommerce form.login .form-row input, .woocommerce form.login .form-row textarea,
.woocommerce form.checkout .form-row input, .woocommerce form.checkout .form-row textarea,
.select2-container,
.woocommerce form .form-row.woocommerce-validated .select2-container,
.woocommerce form .form-row.woocommerce-invalid .select2-container,
#contactform #submit:hover,
.comments-form #submit:hover,
.a-btn:hover,
.a-btn-3,
.error404 .hero-inner .search input[type="submit"]:hover,
.protected-page form input[type="submit"]:hover,
.woocommerce div.product form.cart .button:hover,
.woocommerce-page.woocommerce-cart .woocommerce input.button:hover,
.woocommerce-page.woocommerce-checkout .woocommerce input.button:hover,
.woocommerce #respond input#submit:hover, .woocommerce a.button:hover,
.woocommerce a.button.alt:hover, .woocommerce button.button:hover,
.woocommerce input.button:hover,
.single-product .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit:hover,
.wiso_product_detail .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit:hover,
.woocommerce form.login .form-row input[type="submit"]:focus:hover,
.woocommerce form.login .form-row input[type="submit"]:visited:hover,
.woocommerce form.login .form-row input[type="submit"]:active:hover,
.woocommerce form.login .form-row input[type="submit"]:hover,
.woocommerce form.login .form-row input[type="submit"]:focus:hover,
.woocommerce form.login .form-row input[type="submit"]:visited:hover,
.woocommerce form.login .form-row input[type="submit"]:active:hover,
.woocommerce form.login .form-row input[type="submit"]:hover,
.team-members-wrap.slider_modern .swiper-button-next,
.team-members-wrap.slider_modern .swiper-button-prev,
.post-slider-wrapper.slider_progress .swiper-slide,
.form.btn-style-1 input[type=submit]:hover,
.form.btn-style-3 input[type=submit],
.contacts-info-wrap .form input[type="submit"]:hover {
    border-color: <?php echo esc_html(cs_get_option( 'front_color_3')) ?>;
}

.main-wrapper .col-md-4 .sidebar-item h5,
.main-wrapper .col-md-3 .sidebar-item h5,
#contactform textarea, #contactform input:not([type="submit"]),
.comments-form textarea, .comments-form input:not([type="submit"]),
.events-single-content .info-event-wrap .info-item .title,
.sidebar-item input,
.protected-page form input:not([type="submit"]),
.single-product .product .summary .cart .variations .value fieldset,
.wiso_product_detail .product .summary .cart .variations .value fieldset,
.single-product .product .woocommerce-tabs .tabs.wc-tabs:before,
.wiso_product_detail .product .woocommerce-tabs .tabs.wc-tabs:before,
.single-product .product .woocommerce-Reviews #review_form_wrapper input,
.wiso_product_detail .product .woocommerce-Reviews #review_form_wrapper input,
.single-product .product .woocommerce-Reviews #review_form_wrapper textarea,
.wiso_product_detail .product .woocommerce-Reviews #review_form_wrapper textarea,
.wiso_cart.shop_table .heading,
.wiso_cart.shop_table ul .cart_item,
.woocommerce table.shop_table tfoot,
.woocommerce table.shop_table .cart-subtotal,
.woocommerce table.shop_table .shipping,
.SocialLinkWidget .wiso-widget-social-title,
.tile_info .banner-wrap .title,
.alia .text-gallery-wrap .info-item-wrap .name,
.headings.text_button_modern .title,
.coming-page-wrapper .form input:not([type="submit"]), .coming-page-wrapper .form textarea,
.headings.text_button_modern .title,
.services.accordion .accordeon a,
.services.tile .item .text-wrap .title,
.skill-wrapper.linear .title,
.contacts-info-wrap .form input:not([type="submit"]),
.contacts-info-wrap .form textarea {
    border-bottom-color: <?php echo esc_html(cs_get_option( 'front_color_3')) ?>;
}

.single-product .product .summary .cart .variations .value fieldset,
.wiso_product_detail .product .summary .cart .variations .value fieldset,
.single-product .product .wiso-shop-info-title,
.wiso_product_detail .product .wiso-shop-info-title,
.woocommerce table.shop_table tfoot {
    border-top-color: <?php echo esc_html(cs_get_option( 'front_color_3')) ?>;
}

<?php endif;

/* ======= LIGHT COLOR ======= */

if (cs_get_option( 'light_color') && cs_get_option( 'light_color') !== '#ffffff') : ?>
.post-little-banner.empty-post-list input[type="submit"],
.post-media .video-content .play:hover::before,
.post-media .close,
.post.center-style.format-gallery .flex-prev i,
.post.center-style.format-gallery .flex-next i,
.post.center-style.format-post-slider .flex-prev i,
.post.center-style.format-post-slider .flex-next i,
.post.center-style.format-link .category a:hover,
.post.center-style.format-link .date a:hover,
.post.center-style.format-post-link .category a:hover,
.post.center-style.format-post-link .date a:hover,
.post.center-style.format-link .link-wrap,
.post.center-style.format-post-link .link-wrap,
.post.center-style.format-link .link-wrap a,
.post.center-style.format-post-link .link-wrap a,
.post.metro-style .info-wrap .category a,
.post.metro-style.format-video .video-content .play:hover::before,
.post.metro-style.format-post-video .video-content .play:hover::before,
.post.metro-style.format-link .link-wrap a,
.post.metro-style.format-post-link .link-wrap a,
.post.metro-style.format-gallery .flex-prev:hover,
.post.metro-style.format-gallery .flex-next:hover,
.post.metro-style.format-post-slider .flex-prev:hover,
.post.metro-style.format-post-slider .flex-next:hover,
.post-content h5,
.post-content .date,
.post-wrap-item.text .post-content i,
.post-wrap-item.text .post-content blockquote,
.single-post .single-content .img-slider .flex-prev i, .single-post .single-content .img-slider .flex-next i,
.main-wrapper .col-md-4 .sidebar-item.widget_tag_cloud a, .main-wrapper .col-md-3 .sidebar-item.widget_tag_cloud a,
.post-details .single-categories a,
.post-info .single-tags a:hover, .bottom-infopwrap .single-tags a:hover, .user-info-wrap .single-tags a:hover, .main-top-content .single-tags a:hover, .post-details .link-wrap .single-tags a:hover,
#contactform #submit,
.comments-form #submit,
.events-single-content .end-event,
.events-single-content.protected-page .input_protected_wrapper::after, .single-portfolio .protected-page .input_protected_wrapper::after,
.events-single-content.protected-page input[type="submit"], .single-portfolio .protected-page input[type="submit"],
.item .item-img .end-event,
.iframe-video .video-close-button,
.events-single-content .iframe-video .video-content span, .events-single-content .iframe-video .video-content a,
.event-post-box .flex-prev:hover, .event-post-box .flex-next:hover,
.text-light a,
.text-light p,
.mb_YTPPlaypause:before,
.text-light,
.highlight,
.a-btn,
.a-btn:focus,
.a-btn-2,
.a-btn-2:hover,
.a-btn-3:hover,
.a-btn-4,
button, html input[type=button], input[type=reset], input[type=submit],
mark, ins,
.col-md-4 .widget_tag_cloud a, .col-md-3 .widget_tag_cloud a,
.error404 .hero-inner .bigtext,
.error404 .hero-inner .title,
.error404 .hero-inner .subtitle,
.error404 .hero-inner .search input[type="submit"],
.protected-page form input[type="submit"],
.portfolio .item-overlay > h5,
.woocommerce div.product form.cart .button,
.woocommerce ul.products li.product .wiso-prod-list-image .wiso-add-to-cart a,
.input_shop_wrapper:hover,
.woocommerce ul.products li.product .wiso_product_list_name .count,
.single-product .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit,
.wiso_product_detail .product .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input#submit,
.wiso_cart.shop_table .complement-cart .coupon .input-text.button,
.woocommerce form .form-row select.button, .woocommerce form .form-row input.button,
.woocommerce form.login .form-row input[type="submit"]:focus,
.woocommerce form.login .form-row input[type="submit"]:visited,
.woocommerce form.login .form-row input[type="submit"]:active,
.woocommerce form.login .form-row input[type="submit"],
.woocommerce .woocommerce-error li strong,
.woocommerce form.login .form-row input[type="submit"]:focus,
.woocommerce form.login .form-row input[type="submit"]:visited,
.woocommerce form.login .form-row input[type="submit"]:active,
.woocommerce form.login .form-row input[type="submit"],
.woocommerce-account .woocommerce-MyAccount-navigation ul li a:hover,
.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a,
.woocommerce .woocommerce-message, .woocommerce .woocommerce-info,
.woocommerce .woocommerce-error,
.woocommerce .woocommerce-message a:not(.button), .woocommerce .woocommerce-info a:not(.button),
.woocommerce .woocommerce-error a:not(.button),
.woocommerce .woocommerce-message:before, .woocommerce .woocommerce-info:before,
.woocommerce .woocommerce-error:before,
.woocommerce .woocommerce-message a.button,
.woocommerce .woocommerce-info a.button,
.woocommerce .woocommerce-error a.button,
.woocommerce-page.woocommerce-cart .woocommerce input.button,
.woocommerce-page.woocommerce-checkout .woocommerce input.button,
.woocommerce #respond input#submit, .woocommerce a.button,
.woocommerce a.button.alt, .woocommerce button.button,
.woocommerce input.button,
.shop-list-page .on-new,
.simple_gallery .flex-prev i, .simple_gallery .flex-next i,
.alia .banner-wrap .title,
.menio .banner-wrap .title,
.menio .banner-wrap .social-list li a,
.grid .caption, .masonry .caption,
.headings.text_left .title,
.top-banner .title,
.top-banner .sub-title,
.top-banner .descr,
.top-banner.classic .title,
.insta-wrapper.style2 a:not(.insta-item):hover,
.team-members-wrap.slider_modern .team-member .social a,
.iframe-video.banner-video .title,
.iframe-video.banner-video .video-content span,
.iframe-video .video-close-button,
.banner-slider-wrap .swiper-pagination span,
.banner-slider-wrap.vertical .title,
.banner-slider-wrap.myro .content-wrap .subtitle,
.banner-slider-wrap.myro .content-wrap .title,
.banner-slider-wrap.myro .swiper-pagination span,
.banner-slider-wrap.myro .swiper-pagination .swiper-pagination-total,
.banner-slider-wrap.urban .title,
.banner-slider-wrap.urban .subtitle,
.banner-slider-wrap.urban .text,
.banner-slider-wrap.urban .pag-wrapper .swiper-pagination,
.banner-slider-wrap.urban .pag-wrapper .swiper-pagination-current,
.banner-slider-wrap.urban .pag-wrapper .swiper-pagination-total,
.banner-slider-wrap.urban .pag-wrapper .swiper-button-next, .banner-slider-wrap.urban .pag-wrapper .swiper-button-prev,
.coming-page-wrapper .title,
.coming-page-wrapper .subtitle,
.coming-page-wrapper div.wpcf7-mail-sent-ok, .coming-page-wrapper div.wpcf7-validation-errors, .coming-page-wrapper div.wpcf7-acceptance-missing,
.coming-soon-descr,
.form.btn-style-1 input[type=submit],
.form.btn-style-2 input[type=submit],
.form.btn-style-2 input[type=submit]:hover,
.form.btn-style-3 input[type=submit]:hover,
.form.btn-style-4 input[type=submit],
.contacts-info-wrap .form input[type="submit"],
.contacts-info-wrap.custom_info .additional-content-wrap,
.contacts-info-wrap.custom_info .additional-content-wrap .content-item a, .contacts-info-wrap.custom_info .additional-content-wrap .content-item div,
.contacts-info-wrap.custom_info .additional-content-wrap .text,
.contacts-info-wrap.custom_info .additional-content-wrap .text p,
.contacts-info-wrap.custom_info .additional-content-wrap .title,
.wpcf7 .input_protected_wrapper input,
.form.btn-style-2 .input_protected_wrapper:hover input,
.form.btn-style-3 .input_protected_wrapper input,
.disortion-wrap .scene-nav,
.event-post-box .end-event,
.exhibition-wrap .btn::before,
.exhibition-wrap .btn--toggle.btn--active,
.exhibition-wrap .slide__name,
.exhibition-wrap .slide__title > div,
.exhibition-wrap .cat a,
.full_screen_slider .swiper-arrow-left, .full_screen_slider .swiper-arrow-right,
.full_screen_slider .slider-click,
.full_screen_slider .slider-click.left .arrow::before,
.full_screen_slider .slider-click.right .arrow::before,
.wiso-sound-btn:before,
.glitch-wrapper.style-1 .title,
.glitch-wrapper.style-1 .text,
.glitch-wrapper.style-2 .title,
.headings.text_left .title,
.insta-wrapper.style2 a:not(.insta-item):hover,
.trans-slider .page-view .project .text h1,
.trans-slider .page-view .project .text p,
.trans-slider .page-view .arrows .arrow,
.gallery-masonry .text-hover h1,
.slide-nav__text:hover, .slide-nav__text:focus,
.kenburns-wrap .but-eye-wrap i,
.kenburns-wrap .caption,
.kenburns-wrap .wiso-sound-btn:before,
.kenburns-play::before,
.page-wrapper a span:hover,
.physics-banner .title,
.physics-banner .subtitle,
.parallax-showcase-wrapper .title,
.parallax-showcase-wrapper .desc,
.distortion__title,
.distortion__text,
.urban_slider .slick-arrow:hover,
.interactive-slider.tabs li.active div,
.interactive-slider.tabs a,
.interactive-slider.tabs a:hover div,
.showcase_slider .slide-title,
.landing_split .content-wrap .portfolio-title,
.landing_split .content-wrap .excerpt,
.swiper-container-vert-slider .swiper-slide .container .wrap-text,
.swiper-container-vert-slider .swiper-slide .container .wrap-text .subtitle,
.swiper-container-vert-slider .swiper-button::before,
.portfolio-slider-wrap.slider_classic .content-wrap .categories,
.portfolio-slider-wrap.slider_classic .content-wrap .portfolio-title,
.portfolio-slider-wrap.slider_classic .content-wrap .excerpt p,
.swiper-album .swiper-slide .link-album-slide .title-wrap .title,
.service-list-wrapper .img-wrap a,
.video.only-button .video-content .play::before,
.video.only-button .close {
    color: <?php echo esc_html(cs_get_option( 'light_color')) ?>;
}

::-moz-selection,
::selection,
::-moz-selection {
    color: <?php echo esc_html(cs_get_option( 'light_color')) ?>;
}

.post-little-banner.empty-post-list input[type="submit"]:hover,
.post-media .video-content .play,
.post.center-style .info-wrap,
.post.center-style.format-gallery .flex-prev:hover, .post.center-style.format-gallery .flex-next:hover, .post.center-style.format-post-slider .flex-prev:hover, .post.center-style.format-post-slider .flex-next:hover,
.post.metro-style .post-wrap-item,
.post.metro-style .info-wrap,
.post.metro-style.format-video .video-content .play, .post.metro-style.format-post-video .video-content .play,
.post.metro-style.format-gallery .flex-prev, .post.metro-style.format-gallery .flex-next, .post.metro-style.format-post-slider .flex-prev, .post.metro-style.format-post-slider .flex-next,
.unit .blog.masonry + .sidebar .sidebar-item,
.single-post .single-content,
.single-post .single-content .swiper-container .description,
.single-post .single-content .swiper-arrow-right, .single-post .single-content .swiper-arrow-left,
.single-post .single-content .img-slider .flex-prev:hover, .single-post .single-content .img-slider .flex-next:hover,
.main-wrapper .col-md-4 .sidebar-item, .main-wrapper .col-md-3 .sidebar-item,
.pages, .page-numbers,
.post-banner,
.flex-control-paging li a,
.events-single-content .info-event-wrap .info-item,
.single-events .single-content,
.event-post-box .flex-prev, .event-post-box .flex-next,
body,
.spinner-preloader-wrap,
.white,
.animsition-loading,
.spinner-preloader-wrap .cssload-container .cssload-item,
.error404 .hero-inner .search input:not([type="submit"]),
.woocommerce .wiso_images span.onsale, .woocommerce ul.products li.product .wiso-prod-list-image .onsale,
.woocommerce ul.products li.product .wiso-prod-list-image .wiso-add-to-cart a,
.product-gallery-wrap .on-new,
.woocommerce ul.products li.product .wiso-prod-list-image:after,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.woocommerce ul.products li.product span.on-new,
.woocommerce ul.products li.product .wiso-prod-list-image .wiso-add-to-cart a:hover,
.simple_gallery .flex-prev:hover, .simple_gallery .flex-next:hover,
.parallax-window .content-parallax,
.main-header-testimonial.classic .swiper-pagination span,
.insta-wrapper.style2 a:not(.insta-item),
.banner-slider-wrap .swiper-pagination span:first-child::before,
.banner-slider-wrap.vertical .swiper-pagination .swiper-pagination-bullet-active i::before,
.coming-page-wrapper .form input:not([type="submit"]), .coming-page-wrapper .form textarea,
.contacts-info-wrap.style7,
.form.btn-style-2 .input_protected_wrapper input,
.form.btn-style-3 .input_protected_wrapper:hover input,
.event-post-box-wrap,
.full_screen_slider .swiper-arrow-left::before, .full_screen_slider .swiper-arrow-right::before,
.insta-wrapper.style2 a:not(.insta-item),
.thumb-slider-wrapp .sub-thumb-slider,
.thumb-slider-wrapp .thumb-slider-wrapp-arrow .hide-images, .thumb-slider-wrapp .thumb-slider-wrapp-arrow .show-images,
.page-wrapper a span,
.distortion__nav span,
.urban_slider .slick-arrow,
.split-wrapper .vertical::before, .split-wrapper .vertical::after,
.split-wrapper .horizontal::after, .split-wrapper .horizontal::before,
.swiper-album .swiper-wrapper,
.swiper-album .swiper-slide::before,
.post-slider-wrapper.slider_progress .content-wrap,
.pricing-item,
.services.accordion .accordeon-wrap,
.service-list-wrapper .content-wrap,
.main-header-testimonial.classic .swiper-pagination span {
    background-color: <?php echo esc_html(cs_get_option( 'light_color')) ?>;
}

.flex-control-paging li a,
.a-btn-2,
.a-btn-4,
.a-btn-4:hover,
.woocommerce .woocommerce-message a.button,
.woocommerce .woocommerce-info a.button,
.woocommerce .woocommerce-error a.button,
.woocommerce .woocommerce-message a.button:hover,
.woocommerce .woocommerce-info a.button:hover,
.woocommerce .woocommerce-error a.button:hover,
.form.btn-style-2 input[type=submit],
.form.btn-style-4 input[type=submit]:hover,
.form.btn-style-4 input[type=submit] {
    border-color: <?php echo esc_html(cs_get_option( 'light_color')) ?>;
}

.main-header-testimonial.left_align .swiper-pagination span.swiper-pagination-bullet-active::before {
    border-color: <?php echo esc_html(cs_get_option( 'light_color')) ?> !important;
}

.interactive-slider.tabs li.active div,
.interactive-slider.tabs li.active span {
    border-bottom-color: <?php echo esc_html(cs_get_option( 'light_color')) ?>;
}

.team-members-wrap.chess_tile .team-member:nth-of-type(4n) .image-wrap::after,
.team-members-wrap.chess_tile .team-member:nth-of-type(4n-1) .image-wrap::after {
    border-left-color: <?php echo esc_html(cs_get_option( 'light_color')) ?>;
}

.team-members-wrap.chess_tile .image-wrap::after {
    border-right-color: <?php echo esc_html(cs_get_option( 'light_color')) ?>;
}

.woocommerce-page.woocommerce .sidebar-item a.button {
    color: <?php echo esc_html(cs_get_option( 'light_color')) ?> !important;
}

.physics-banner .arrows path,
.top-banner .arrows path {
    stroke: <?php echo esc_html(cs_get_option( 'light_color')) ?>;
}

.form.btn-style-4 input[type=submit],
.a-btn-4 {
    background-image: -webkit-gradient(linear, left top, right top, color-stop(50%, <?php echo esc_html(cs_get_option( 'light_color')) ?>), color-stop(50%, transparent));
    background-image: linear-gradient(to right, <?php echo esc_html(cs_get_option( 'light_color')) ?> 50%, transparent 50%);
}

@media only screen and (max-width: 1024px) {
    .team-members-wrap.chess_tile .team-member:nth-of-type(4n) .image-wrap::after,
    .team-members-wrap.chess_tile .team-member:nth-of-type(4n-1) .image-wrap::after {
        border-right-color: <?php echo esc_html(cs_get_option( 'light_color')) ?>;
    }

    .team-members-wrap.chess_tile .team-member:nth-of-type(2n) .image-wrap::after {
        border-left-color: <?php echo esc_html(cs_get_option( 'light_color')) ?>;
    }
}

@media only screen and (max-width: 991px) {
    .fragment-wrapper .fragment-block .fragment-text .wrap-frag-text,
    .fragment-wrapper .fragment-block .fragment-text .wrap-frag-text .desc {
        color: <?php echo esc_html(cs_get_option( 'light_color')) ?>;
    }
}

@media only screen and (max-width: 768px) {

    .split_slider .split-wrapper .author, .split_slider .split-wrapper .title a, .split_slider .split-wrapper .descr,
    .post-slider-wrapper.slider_progress .title, .post-slider-wrapper.slider_progress .date {
        color: <?php echo esc_html(cs_get_option( 'light_color')) ?>;
    }

    .single-post .main-wrapper {
        background-color: <?php echo esc_html(cs_get_option( 'light_color')) ?>;
    }
}

@media only screen and (max-width: 600px) {
    .team-members-wrap.chess_tile .team-member:nth-of-type(2n) .image-wrap::after,
    .team-members-wrap.chess_tile .team-member:nth-of-type(4n) .image-wrap::after,
    .team-members-wrap.chess_tile .team-member:nth-of-type(4n-1) .image-wrap::after,
    .team-members-wrap.chess_tile .image-wrap::after {
        border-bottom-color: <?php echo esc_html(cs_get_option( 'light_color')) ?>;
    }
}

@media only screen and (min-width: 1200px) {
    .portfolio-single-content.left_gallery .single-pagination.left_gallery.change-color a.content {
        color: <?php echo esc_html(cs_get_option( 'light_color')) ?>;
    }
}

<?php endif;


/* ======= FIRST BASE COLOR ======= */

if (cs_get_option( 'base_color_1') && cs_get_option( 'base_color_1') !== '#fcf9f6') : ?>

.blog.metro,
.archive.metro,
.post-little-banner,
.post.center-style.format-quote .info-wrap, .post.center-style.format-post-text .info-wrap,
.post-paper.masonry,
.single-post .main-wrapper,
.metro-load-more,
.post-info span.author,
.single-events .main-wrapper,
.iframe-video.audio,
.scroll,
body.search,
.wiso-shop-banner,
.urban .banner-wrap,
.tile_info .recent-posts-wrapper,
.menio .recent-posts-wrapper,
.services.tile .item .text-wrap,
.skill-wrapper.linear .line,
.urban_slider .pagination-category,
.urban_slider .pagination-title,
.banner-slider-wrap.andra .swiper-pagination span:first-child::before,
.banner-slider-wrap.myro .swiper-pagination span:first-child::before {
    background-color: <?php echo esc_html(cs_get_option( 'base_color_1')) ?>;
}

.single-post .single-content .swiper-container,
.events-single-content.protected-page input[type="password"],
.single-portfolio .protected-page input[type="password"] {
    border-bottom-color: <?php echo esc_html(cs_get_option( 'base_color_1')) ?>;
}

<?php endif;



/* ======= FOOTER SIMPLE ======= */
/* ======= FOOTER BACKGROUND COLOR ======= */


if (cs_get_option( 'footer_simple_bg_color') && cs_get_option( 'footer_simple_bg_color') !== '#fcf9f6') : ?>
#footer.simple {
    background-color: <?php echo esc_html(cs_get_option( 'footer_simple_bg_color')) ?>;
}

<?php endif;

if (cs_get_option( 'footer_simple_bottom_bg_color') && cs_get_option( 'footer_simple_bottom_bg_color') !== '#ffffff') : ?>
#footer .footer-bottom-wrap {
    background-color: <?php echo esc_html(cs_get_option( 'footer_simple_bottom_bg_color')) ?>;
}

<?php endif;


/* ======= FOOTER TEXT COLOR ======= */


if (cs_get_option( 'footer_simple_dark_text_color') && cs_get_option( 'footer_simple_dark_text_color') !== '#222') :

 ?>
#footer.simple .sidebar-item[class*='widget_'] select,
#footer .wiso-widget-about .about_content,
#footer .sidebar-item.widget_nav_menu h5,
#footer .menu li a,
#footer .sidebar-item .item-wrap h3,
#footer .footer-menu-wrap ul li a,
#footer.simple .sidebar-item .item-wrap h5,
#footer.simple .menu li a,
#footer.simple .wiso-widget-subscribe input:not([type="submit"]),
#footer.simple .copyright a,
#footer.simple .sidebar-item #wp-calendar caption,
#footer.simple .widget_calendar th,
#footer.simple .widget_calendar tr,
#footer.simple .sidebar-item.widget_calendar table a,
#footer.simple .sidebar-item li,
#footer.simple .sidebar-item[class*='widget_'] a,
#footer.simple .sidebar-item[class*='widget_'] label,
#footer.simple .sidebar-item[class*='widget_'] p,
#footer.simple .sidebar-item[class*='widget_'] strong,
#footer.simple .sidebar-item[class*='widget_'] span,
#footer.simple .sidebar-item[class*='widget_'] caption,
#footer.simple .sidebar-item[class*='widget_'] a.rsswidget,
#footer.simple .sidebar-item[class*='widget_'].widget_rss cite
{
    color: <?php echo esc_html(cs_get_option( 'footer_simple_dark_text_color')) ?>;
}
#footer.simple .wiso-widget-subscribe input[type="submit"] {
    background-color: <?php echo esc_html(cs_get_option( 'footer_simple_dark_text_color')) ?>;
}
<?php endif;

if (cs_get_option( 'footer_simple_grey_text_color') && cs_get_option( 'footer_simple_grey_text_color') !== '#999') : ?>

#footer .wiso-widget-social-link a,
#footer.simple .wiso-widget-about .about_content.text,
#footer.simple .sidebar-item .wiso-widget-subscribe .wiso-widget-descr,
#footer.simple .copyright,
#footer.simple .widget_calendar td {
    color: <?php echo esc_html(cs_get_option( 'footer_simple_grey_text_color')) ?>;
}

<?php endif;


/* ======= FOOTER MODERN ======= */
/* ======= FOOTER BACKGROUND COLOR ======= */
if (cs_get_option( 'footer_modern_bg_color') && cs_get_option( 'footer_modern_bg_color') !== '#222222') : ?>
#footer.modern,
#footer.modern .footer-bottom-wrap {
    background-color: <?php echo esc_html(cs_get_option( 'footer_modern_bg_color')) ?>;
}
<?php endif;

/* ======= FOOTER TEXT COLOR ======= */

if (cs_get_option( 'footer_modern_light_text_color') && cs_get_option( 'footer_modern_light_text_color') !== '#ffffff') : ?>
#footer.modern .sidebar-item #wp-calendar caption,
#footer.modern .widget_calendar th,
#footer.modern .widget_calendar tr,
#footer.modern .sidebar-item.widget_calendar table a,
#footer.modern .sidebar-item[class*='widget_'] h5,
#footer.modern .sidebar-item[class*='widget_'] a,
#footer.modern .sidebar-item[class*='widget_'] label,
#footer.modern .sidebar-item[class*='widget_'] p,
#footer.modern .sidebar-item[class*='widget_'] strong,
#footer.modern .sidebar-item[class*='widget_'] span,
#footer.modern .sidebar-item[class*='widget_'] caption,
#footer.modetn .copy_content,
#footer.modern .sidebar-item .item-wrap h3:not(.wiso-widget-descr),
#footer.modern .wiso-widget-about .about_content,
#footer.modern .wiso-widget-social-link a,
#footer.modern .sidebar-item.widget_nav_menu h5,
#footer.modern .wiso-widget-copyright .socials a,
#footer.modern .wiso-widget-subscribe p::after,
#footer.modern .wiso-widget-subscribe input,
#footer.modern .WisoInstagramWidget .instagram-text a,
#footer.modern .footer-bottom-wrap .copyright a,#footer.modern .footer-bottom-wrap .copyright,
#footer.modern .footer-menu-wrap ul li a,
#footer .footer-socials a,
#footer .social-links a,
#footer .widget_text h5,
#footer .wiso-recent-post-widget a,
#footer .wiso-recent-post-widget .recent-date,
#footer.modern .sidebar-item[class*='widget_'] a.rsswidget,
#footer.modern .sidebar-item[class*='widget_'].widget_rss cite,
#footer .widget_product_search form::after,
#footer .widget_search form div::after,
#footer.modern .sidebar-item[class*='widget_'] li a:hover {
    color: <?php echo esc_html(cs_get_option( 'footer_modern_light_text_color')) ?>;
}

#footer.modern .sidebar-item[class*='widget_'] select {
    background-color: <?php echo esc_html(cs_get_option( 'footer_modern_light_text_color')) ?>;
}
<?php endif;


if (cs_get_option( 'footer_modern_grey_text_color') && cs_get_option( 'footer_modern_grey_text_color') !== '#999999') : ?>
#footer.modern .wiso-widget-copyright .copy_content,
#footer.modern .sidebar-item .wiso-widget-subscribe .wiso-widget-descr,
#footer.modern .sidebar-item li,
#footer.modern .widget_calendar td {
    color: <?php echo esc_html(cs_get_option( 'footer_modern_grey_text_color')) ?>;
}
<?php endif;


/* ======= FOOTER CLASSIC ======= */
/* ======= FOOTER BACKGROUND COLOR ======= */
if (cs_get_option( 'footer_classic_bg_color') && cs_get_option( 'footer_classic_bg_color') !== '#ffffff') : ?>
#footer.classic {
    background-color:<?php echo esc_html(cs_get_option( 'footer_classic_bg_color')) ?>;
}
<?php endif;

/* ======= FOOTER TEXT COLOR ======= */

if (cs_get_option( 'footer_classic_dark_text_color') && cs_get_option( 'footer_classic_dark_text_color') !== '#222222') : ?>
#footer.classic .logo span,
#footer.classic .copyright a,
#footer.classic #back-to-top {
    color:<?php echo esc_html(cs_get_option( 'footer_classic_dark_text_color')) ?>;
}
<?php endif;


if (cs_get_option( 'footer_classic_grey_text_color') && cs_get_option( 'footer_classic_grey_text_color') !== '#999999') : ?>
#footer.classic .copyright {
    color: <?php echo esc_html(cs_get_option( 'footer_classic_grey_text_color')) ?>;
}
<?php endif;

if (cs_get_option( 'label_bg_color') && cs_get_option( 'label_bg_color') !== '#222222') : ?>
    .menu-item-label-hot,
    .aside-menu.static #topmenu .menu li a:hover .menu-item-label-hot{
        background-color: <?php echo esc_html(cs_get_option( 'label_bg_color')) ?>;
    }
<?php endif;

if (cs_get_option( 'label_text_color') && cs_get_option( 'label_text_color') !== '#222222') : ?>
    .menu-item-label-hot{
        color: <?php echo esc_html(cs_get_option( 'label_text_color')) ?>;
    }
    .aside-menu.static #topmenu .menu li a .menu-item-label-hot{
        border: 1px solid <?php echo esc_html(cs_get_option( 'label_text_color')) ?>;
    }
<?php endif;


}




//TYPOGRAPHY

$options = apply_filters( 'cs_get_option', get_option( CS_OPTION ) );

function get_str_by_number($str){
    $number = preg_replace("/[0-9|\.]/", '', $str);
    return $number;
}

foreach ($options as $key => $item) {
    if (is_array($item)) {
        if (!empty($item['variant']) && $item['variant'] == 'regular') {
            $item['variant'] = 'normal';
        }
    }
    $options[$key] = $item;
}

function calculateFontWeight( $fontWeight ) {
    $fontWeightValue = '';
    $fontStyleValue = '';

    switch( $fontWeight ) {
        case '100':
            $fontWeightValue = '100';
            break;
        case '100italic':
            $fontWeightValue = '100';
            $fontStyleValue = 'italic';
            break;
        case '300':
            $fontWeightValue = '300';
            break;
        case '300italic':
            $fontWeightValue = '300';
            $fontStyleValue = 'italic';
            break;
        case '500':
            $fontWeightValue = '500';
            break;
        case '500italic':
            $fontWeightValue = '500';
            $fontStyleValue = 'italic';
            break;
        case '600italic':
            $fontWeightValue = '600';
            $fontStyleValue = 'italic';
            break;
         case '600':
            $fontWeightValue = '600';
            break;
        case '700':
            $fontWeightValue = '700';
            break;
        case '700italic':
            $fontWeightValue = '700';
            $fontStyleValue = 'italic';
            break;
        case '900':
            $fontWeightValue = '900';
            break;
        case '900italic':
            $fontWeightValue = '900';
            $fontStyleValue = 'italic';
            break;
        case 'italic':
            $fontStyleValue = 'italic';
            break;
    }

    return array('weight' => $fontWeightValue, 'style' => $fontStyleValue);
}

$all_button_font = $options['all_button_font_family']; ?>

.a-btn, .a-btn-2, .a-btn-3, .a-btn-4,
.btn-style-1 input[type="submit"],
.btn-style-2 input[type="submit"],
.btn-style-3 input[type="submit"],
.btn-style-4 input[type="submit"] {
<?php
if(!empty($all_button_font['family'])){
	echo "font-family: \"{$all_button_font['family']}\" !important;";
}

$variant = calculateFontWeight( $all_button_font['variant'] );
if(!empty($variant['style'])) : ?> font-style: <?php echo esc_html( $variant['style']); ?> !important;
<?php endif;
if(!empty($variant['weight'])) : ?> font-weight: <?php echo esc_html( $variant['weight']); ?> !important;
<?php endif;

$button_font_style = get_str_by_number($all_button_font['variant']);
if(!empty($button_font_style) && !empty($all_button_font['family'])){
	echo "font-style:{$button_font_style} !important;";
}

$all_button_font_size = get_number_str($options['all_button_font_size']);
if(!empty($all_button_font_size)){
	echo "font-size: {$all_button_font_size}px !important;";
}

$all_button_line_height = get_number_str($options['all_button_line_height']);
if(!empty($all_button_line_height)){
   echo "line-height:{$all_button_line_height}px !important;";
}
if(!empty($options['all_button_letter_spacing'])){
	echo "letter-spacing:{$options['all_button_letter_spacing']} !important;";
} ?>
}

<?php $all_links_font= $options['all_links_font_family']; ?>
a {
<?php if(!empty($all_links_font['family'])){
	echo "font-family: \"{$all_links_font['family']}\" !important;";
}
$variant = calculateFontWeight( $all_links_font['variant'] );
if(!empty($all_links_font['family']) && !empty($variant['style'])) : ?> font-style: <?php echo esc_html( $variant['style']); ?> !important;
<?php endif;
if(!empty($variant['weight'])) : ?> font-weight: <?php echo esc_html( $variant['weight']); ?> !important;
<?php endif;

$all_links_font_size = get_number_str($options['all_links_font_size']);
if(!empty($all_links_font_size)){
	echo "font-size: {$all_links_font_size}px !important;" ;
}

$all_links_line_height = get_number_str($options['all_links_line_height']);
if(!empty($all_links_line_height)){
	echo "line-height:{$all_links_line_height}px !important;";
}

$all_links_letter_spacing = get_number_str($options['all_links_letter_spacing']);
if(!empty($all_links_letter_spacing)){
	echo "letter-spacing:{$all_links_letter_spacing} !important;";
} ?>
}

/*FOOTER*/
<?php function get_number_str($str){
    $number = preg_replace("/[^0-9|\.]/", '', $str);
    return $number;
}


/* FOR TITLE H1 - H6 */
if ( cs_get_option('heading') ) {
    foreach (cs_get_option('heading') as $title) {
        $font_family = $title['heading_family'];
        echo esc_attr($title['heading_tag']); ?> ,
<?php echo esc_attr($title['heading_tag']); ?> a {
                                               <?php if($font_family['family']){
												   echo "font-family: {$font_family['family']} !important;";
											   }
											   $one_title_size = get_number_str($title['heading_size']);
											   if($one_title_size){
												   echo "font-size: {$one_title_size}px !important;\n line-height: normal;";
											   }
											   $variant = calculateFontWeight( $font_family['variant'] );
                                               if(!empty($variant['style'])) : ?> font-style: <?php echo esc_html( $variant['style']); ?> !important;
                                               <?php endif;
                                               if(!empty($variant['weight'])) : ?> font-weight: <?php echo esc_html( $variant['weight']); ?> !important;
                                               <?php endif; ?>
                                               }

<?php }
} ?>

#topmenu ul li a {
<?php if ( cs_get_option('menu_item_family') ) {

	$font_family = cs_get_option('menu_item_family');
	if(!empty($font_family['family'])){ ?> font-family: "<?php echo esc_html( $font_family['family'] ); ?>", sans-serif !important;
<?php }

$variant = calculateFontWeight( $font_family['variant'] );
if(!empty($variant['style'])) : ?> font-style: <?php echo esc_html( $variant['style']); ?> !important;
<?php endif;
if(!empty($variant['weight'])) : ?> font-weight: <?php echo esc_html( $variant['weight']); ?> !important;
<?php endif;
}
if ( cs_get_option('menu_item_size') ) {
$menu_item_size = get_number_str(cs_get_option('menu_item_size'));  ?> font-size: <?php echo esc_html( $menu_item_size ); ?>px !important;
<?php }
if ( cs_get_option('menu_line_height') ) {
	$menu_line_height = get_number_str(cs_get_option('menu_line_height'));  ?> line-height: <?php echo esc_html( $menu_line_height ); ?>px !important;
<?php } ?>
}

#topmenu ul ul li a {
<?php if ( cs_get_option('submenu_item_family') ) {
	$font_family = cs_get_option('submenu_item_family');
	if(!empty($font_family['family'])){ ?> font-family: "<?php echo esc_html( $font_family['family'] ); ?>", sans-serif !important;
<?php }
$variant = calculateFontWeight( $font_family['variant'] );
if(!empty($variant['style'])) : ?> font-style: <?php echo esc_html( $variant['style']); ?> !important;
<?php endif;
if(!empty($variant['weight'])) : ?> font-weight: <?php echo esc_html( $variant['weight']); ?> !important;
<?php endif;
}
if ( cs_get_option('submenu_item_size') ) {
$submenu_item_size = get_number_str(cs_get_option('submenu_item_size')); ?> font-size: <?php echo esc_html( $submenu_item_size ); ?>px !important;
<?php }

if ( cs_get_option('submenu_line_height') ) {
	$submenu_line_height = get_number_str(cs_get_option('submenu_line_height'));  ?> line-height: <?php echo esc_html( $submenu_line_height ); ?>px !important;
<?php } ?>
}

<?php if( cs_get_option( 'preloader_image' ) ) :
    $image_src = wp_get_attachment_image_url( cs_get_option( 'preloader_image' ), 'full', false );
?>

@-webkit-keyframes scaleout-image {
    0% {
        -webkit-transform: scale(0.5);
    }
    100% {
        -webkit-transform: scale(1);
        opacity: 0;
    }
}

@keyframes scaleout-image {
    0% {
        transform: scale(0.5);
        -webkit-transform: scale(0.5);
    }
    100% {
        transform: scale(1);
        -webkit-transform: scale(1);
        opacity: 0;
    }
}

.animsition-loading {
    background-color: white;
    z-index: 9999;
    background-image: url(<?php echo esc_url( $image_src ); ?>) !important;
    background-repeat: no-repeat !important;
    background-position: center center !important;
}

.animsition-loading:before {
    display: none;
}

<?php endif; ?>
