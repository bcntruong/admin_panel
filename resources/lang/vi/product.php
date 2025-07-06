<?php

return [
    // Resource labels
    'resource' => [
        'label' => 'Sản phẩm',
        'plural_label' => 'Sản phẩm',
    ],
    
    // Navigation
    'navigation' => [
        'label' => 'Sản phẩm',
        'group' => 'Quản lý cửa hàng',
    ],
    
    // Breadcrumbs
    'breadcrumbs' => [
        'list' => 'Danh sách',
        'create' => 'Thêm mới',
        'edit' => 'Chỉnh sửa',
        'view' => 'Xem chi tiết',
    ],
    
    // Form fields
    'form' => [
        'basic_info' => 'Thông tin cơ bản',
        'name' => 'Tên sản phẩm',
        'slug' => 'Đường dẫn',
        'description' => 'Mô tả chi tiết',
        'short_description' => 'Mô tả ngắn',
        
        'pricing' => 'Giá & Kho hàng',
        'price' => 'Giá bán',
        'original_price' => 'Giá gốc',
        'stock_quantity' => 'Số lượng tồn kho',
        
        'images_section' => 'Hình ảnh',
        'images' => 'Hình ảnh sản phẩm',
        
        'status_section' => 'Trạng thái',
        'is_featured' => 'Sản phẩm nổi bật',
        'is_featured_help' => 'Sản phẩm nổi bật sẽ được hiển thị ở vị trí đặc biệt',
        'status' => 'Trạng thái',
        'status_active' => 'Đang kinh doanh',
        'status_inactive' => 'Ngừng kinh doanh',
        
        'timestamps' => 'Thời gian',
        'created_at' => 'Tạo lúc',
        'updated_at' => 'Cập nhật lúc',
        'never' => 'Chưa có',
    ],
    
    // Table columns
    'table' => [
        'image' => 'Hình ảnh',
        'name' => 'Tên sản phẩm',
        'price' => 'Giá bán',
        'stock' => 'Tồn kho',
        'featured' => 'Nổi bật',
        'status' => 'Trạng thái',
        'created_at' => 'Tạo lúc',
        'updated_at' => 'Cập nhật lúc',
    ],
    
    // Filters
    'filters' => [
        'status' => 'Trạng thái',
        'featured' => 'Sản phẩm nổi bật',
        'low_stock' => 'Tồn kho thấp',
    ],
    
    // Actions - only keeping product-specific actions
    'actions' => [
        'toggle_featured' => 'Đổi trạng thái nổi bật',
        'change_status' => 'Đổi trạng thái kinh doanh',
    ],
]; 