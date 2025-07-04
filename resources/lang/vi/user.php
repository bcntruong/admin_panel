<?php

return [
    // Panel
    'panel' => [
        'title_en' => 'Admin Panel',
        'title_vi' => 'Quản Trị Hệ Thống',
        'language_selector' => 'Ngôn Ngữ',
        'select_language' => 'Chọn ngôn ngữ',
    ],
    
    // Navigation
    'navigation_group' => 'Quản Lý Người Dùng',
    'navigation_label' => 'Người Dùng',
    
    // Form labels
    'form' => [
        'user_information' => 'Thông Tin Người Dùng',
        'user_information_description' => 'Thông tin cơ bản của người dùng',
        'name' => 'Họ Tên',
        'email' => 'Địa Chỉ Email',
        'email_verified_at' => 'Xác Thực Email Lúc',
        'not_verified' => 'Chưa xác thực',
        'authentication' => 'Xác Thực',
        'authentication_description' => 'Thông tin xác thực người dùng',
        'password' => 'Mật Khẩu',
        'password_confirmation' => 'Xác Nhận Mật Khẩu',
        'enter_password' => 'Nhập mật khẩu',
        'confirm_password' => 'Xác nhận mật khẩu',
    ],
    
    // Table columns
    'table' => [
        'id' => 'ID',
        'name' => 'Họ Tên',
        'email' => 'Email',
        'verified' => 'Đã Xác Thực',
        'created_date' => 'Ngày Tạo',
        'last_updated' => 'Cập Nhật Lần Cuối',
    ],
    
    // Filters
    'filters' => [
        'email_verification' => 'Xác Thực Email',
        'all_users' => 'Tất Cả Người Dùng',
        'verified_users' => 'Người Dùng Đã Xác Thực',
        'unverified_users' => 'Người Dùng Chưa Xác Thực',
    ],
    
    // Actions
    'actions' => [
        'add_new_user' => 'Thêm Người Dùng Mới',
        'export_users' => 'Xuất Danh Sách',
        'view_details' => 'Xem Chi Tiết',
        'edit_user' => 'Chỉnh Sửa',
        'delete_user' => 'Xóa Người Dùng',
        'reset_password' => 'Đặt Lại Mật Khẩu',
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
