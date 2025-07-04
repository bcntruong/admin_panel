<?php

return [
    
    // Resource titles
    'resource' => [
        'label' => 'Người dùng',
        'plural_label' => 'Người dùng',
    ],
    
    // Breadcrumbs - chỉ giữ lại các khóa đặc thù cho module user
    'breadcrumbs' => [
        'user' => 'Người dùng',
        'users' => 'Người dùng',
    ],
    
    // Navigation
    'navigation_group' => 'Quản lý người dùng',
    'navigation_label' => 'Người dùng',
    
    // Form labels - chỉ giữ lại các khóa đặc thù cho module user
    'form' => [
        'user_information' => 'Thông tin người dùng',
        'user_information_description' => 'Thông tin cơ bản của người dùng',
        'email_verified_at' => 'Xác thực email lúc',
        'not_verified' => 'Chưa xác thực',
        'authentication' => 'Xác thực',
        'authentication_description' => 'Thông tin xác thực người dùng',
    ],
    
    // Table columns - chỉ giữ lại các khóa đặc thù cho module user
    'table' => [
        'verified' => 'Đã xác thực',
    ],
    
    // Filters
    'filters' => [
        'email_verification' => 'Xác thực email',
        'all_users' => 'Tất cả người dùng',
        'verified_users' => 'Người dùng đã xác thực',
        'unverified_users' => 'Người dùng chưa xác thực',
    ],
    
    // Actions - chỉ giữ lại các khóa đặc thù cho module user
    'actions' => [
        'reset_password' => 'Đặt lại mật khẩu',
        'reset_password_heading' => 'Đặt lại mật khẩu người dùng',
        'reset_password_description' => 'Bạn có chắc chắn muốn đặt lại mật khẩu của người dùng này? Một mật khẩu mới sẽ được tạo và người dùng sẽ được thông báo.',
        'reset_password_confirm' => 'Đồng ý, đặt lại mật khẩu',
        'password_reset_success' => 'Email đặt lại mật khẩu đã được gửi đến người dùng',
    ],
    
    // Notifications
    'notifications' => [
        'created' => 'Người dùng đã được tạo thành công',
        'updated' => 'Người dùng đã được cập nhật thành công',
    ],
];
