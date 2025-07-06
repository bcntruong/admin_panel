<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Table Columns
    |--------------------------------------------------------------------------
    */

    'column.name' => 'Tên',
    'column.guard_name' => 'Guard',
    'column.roles' => 'Vai trò',
    'column.permissions' => 'Quyền hạn',
    'column.updated_at' => 'Cập nhật lúc',

    /*
    |--------------------------------------------------------------------------
    | Form Fields
    |--------------------------------------------------------------------------
    */

    'field.name' => 'Tên',
    'field.guard_name' => 'Guard Name',
    'field.permissions' => 'Quyền hạn',
    'field.select_all.name' => 'Chọn tất cả',
    'field.select_all.message' => 'Bật tất cả các quyền cho vai trò này',

    /*
    |--------------------------------------------------------------------------
    | Navigation & Resource
    |--------------------------------------------------------------------------
    */

    'nav.group' => 'Filament Shield',
    'nav.role.label' => 'Vai trò',
    'nav.role.icon' => 'heroicon-o-shield-check',
    'resource.label.role' => 'Vai trò',
    'resource.label.roles' => 'Vai trò',

    /*
    |--------------------------------------------------------------------------
    | Section & Tabs
    |--------------------------------------------------------------------------
    */
    
    'section' => 'Thực thể',
    'resources' => 'Tài nguyên',
    'widgets' => 'Widget',
    'pages' => 'Trang',
    'custom' => 'Quyền tùy chỉnh',

    /*
    |--------------------------------------------------------------------------
    | Messages
    |--------------------------------------------------------------------------
    */

    'forbidden' => 'Bạn không có quyền truy cập',

    /*
    |--------------------------------------------------------------------------
    | Resource Permissions' Labels
    |--------------------------------------------------------------------------
    */

    'resource_permission_prefixes_labels' => [
        'view' => 'Xem',
        'view_any' => 'Xem tất cả',
        'create' => 'Tạo',
        'update' => 'Cập nhật',
        'delete' => 'Xóa',
        'delete_any' => 'Xóa tất cả',
        'force_delete' => 'Xóa vĩnh viễn',
        'force_delete_any' => 'Xóa vĩnh viễn tất cả',
        'restore' => 'Khôi phục',
        'restore_any' => 'Khôi phục tất cả',
        'replicate' => 'Nhân bản',
        'reorder' => 'Sắp xếp lại',
        'publish' => 'Xuất bản',
        'unpublish' => 'Hủy xuất bản',
    ],
]; 