<?php 

return [
    [
        "name"=>"Sản phẩm", 
        "type"=>"product", 
        "icon"=>'<i class="metismenu-icon fa fa-product-hunt" aria-hidden="true"></i>', 
        "key"=>"product", 
        "url"=>"javascript:void(0)",
        "status"=>1,
        "parent_id"=>null
    ],
    [
        "name"=>"Danh sách sản phẩm", 
        "type"=>"list_product", 
        "icon"=>'', 
        "key"=>"list_product", 
        "url"=>"admin/product",
        "status"=>1,
        "parent_id"=>1
    ],
    [
        "name"=>"Thêm sản phẩm", 
        "type"=>"add_product", 
        "icon"=>'', 
        "key"=>"add_product", 
        "url"=>"admin/product/add",
        "status"=>1,
        "parent_id"=>1
    ],
    [
        "name"=>"Danh mục sản phẩm", 
        "type"=>"category", 
        "icon"=>'', 
        "key"=>"category", 
        "url"=>"admin/category",
        "status"=>1,
        "parent_id"=>1
    ],
    [
        "name"=>"Thành viên", 
        "type"=>"user", 
        "icon"=>'<i class="fa fa-users metismenu-icon" aria-hidden="true"></i>', 
        "key"=>"user", 
        "url"=>"javascript:void(0)",
        "status"=>1,
        "parent_id"=>null
    ],
    [
        "name"=>"Danh sách thành viên", 
        "type"=>"list_user", 
        "icon"=>'', 
        "key"=>"list_user", 
        "url"=>"admin/users",
        "status"=>1,
        "parent_id"=>5
    ],
    [
        "name"=>"Thêm thành viên", 
        "type"=>"add_user", 
        "icon"=>'', 
        "key"=>"add_user", 
        "url"=>"admin/user/add",
        "status"=>1,
        "parent_id"=>5
    ],
    [
        "name"=>"Đặt hàng", 
        "type"=>"order", 
        "icon"=>'<i class="fa fa-cart-arrow-down metismenu-icon" aria-hidden="true"></i>', 
        "key"=>"order", 
        "url"=>"javascript:void(0)",
        "status"=>1,
        "parent_id"=>null
    ],
    [
        "name"=>"Danh sách đặt hàng", 
        "type"=>"list_order", 
        "icon"=>'', 
        "key"=>"list_order", 
        "url"=>"admin/order",
        "status"=>1,
        "parent_id"=>8
    ],
    [
        "name"=>"Cài đặt", 
        "type"=>"setting", 
        "icon"=>'<i class="fa fa-cog metismenu-icon" aria-hidden="true"></i>', 
        "key"=>"setting", 
        "url"=>"javascript:void(0)",
        "status"=>1,
        "parent_id"=>null
    ],
    [
        "name"=>"Thông tin website", 
        "type"=>"site_info", 
        "icon"=>'', 
        "key"=>"site_info", 
        "url"=>"admin/config",
        "status"=>1,
        "parent_id"=>10
    ],
    [
        "name"=>"Menu", 
        "type"=>"menu", 
        "icon"=>'', 
        "key"=>"menu", 
        "url"=>"admin/menu",
        "status"=>1,
        "parent_id"=>10
    ],
    [
        "name"=>"Tin tức", 
        "type"=>"news", 
        "icon"=>'<i class="fa fa-newspaper-o metismenu-icon" aria-hidden="true"></i>', 
        "key"=>"news", 
        "url"=>"javascript:void(0)",
        "status"=>1,
        "parent_id"=>null
    ],
    [
        "name"=>"Danh sách tin tức", 
        "type"=>"list_news", 
        "icon"=>'', 
        "key"=>"list_news", 
        "url"=>"admin/news",
        "status"=>1,
        "parent_id"=>13
    ],
    [
        "name"=>"Thêm tin tức", 
        "type"=>"add_news", 
        "icon"=>'', 
        "key"=>"add_news", 
        "url"=>"admin/news/add",
        "status"=>1,
        "parent_id"=>13
    ],
];

?>