<?php

return [
    // Panel
    'panel' => [
        'title_en' => 'Admin Panel',
        'title_vi' => 'Quản Trị Hệ Thống',
        'language_selector' => 'Language',
        'select_language' => 'Select language',
    ],
    
    // Navigation
    'navigation_group' => 'User Management',
    'navigation_label' => 'Users',
    
    // Form labels
    'form' => [
        'user_information' => 'User Information',
        'user_information_description' => 'Basic user information',
        'name' => 'Full Name',
        'email' => 'Email Address',
        'email_verified_at' => 'Email Verified At',
        'not_verified' => 'Not verified',
        'authentication' => 'Authentication',
        'authentication_description' => 'User authentication details',
        'password' => 'Password',
        'password_confirmation' => 'Confirm Password',
        'enter_password' => 'Enter password',
        'confirm_password' => 'Confirm password',
    ],
    
    // Table columns
    'table' => [
        'id' => 'ID',
        'name' => 'Name',
        'email' => 'Email',
        'verified' => 'Verified',
        'created_date' => 'Created Date',
        'last_updated' => 'Last Updated',
    ],
    
    // Filters
    'filters' => [
        'email_verification' => 'Email Verification',
        'all_users' => 'All Users',
        'verified_users' => 'Verified Users',
        'unverified_users' => 'Unverified Users',
    ],
    
    // Actions
    'actions' => [
        'add_new_user' => 'Add New User',
        'export_users' => 'Export Users',
        'view_details' => 'View Details',
        'edit_user' => 'Edit User',
        'delete_user' => 'Delete User',
        'reset_password' => 'Reset Password',
        'reset_password_heading' => 'Reset user password',
        'reset_password_description' => 'Are you sure you want to reset this user\'s password? A new password will be generated and the user will be notified.',
        'reset_password_confirm' => 'Yes, reset password',
        'password_reset_success' => 'Password reset email sent to user',
    ],
    
    // Notifications
    'notifications' => [
        'created' => 'User created successfully',
        'updated' => 'User updated successfully',
    ],
];
