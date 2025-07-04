<?php

return [
    
    // Resource titles
    'resource' => [
        'label' => 'User',
        'plural_label' => 'Users',
    ],
    
    // Breadcrumbs - only keep module-specific keys
    'breadcrumbs' => [
        'user' => 'User',
        'users' => 'Users',
    ],
    
    // Navigation
    'navigation_group' => 'User management',
    'navigation_label' => 'Users',
    
    // Form labels - only keep module-specific keys
    'form' => [
        'user_information' => 'User information',
        'user_information_description' => 'Basic user information',
        'email_verified_at' => 'Email verified at',
        'not_verified' => 'Not verified',
        'authentication' => 'Authentication',
        'authentication_description' => 'User authentication details',
    ],
    
    // Table columns - only keep module-specific keys
    'table' => [
        'verified' => 'Verified',
    ],
    
    // Filters
    'filters' => [
        'email_verification' => 'Email verification',
        'all_users' => 'All users',
        'verified_users' => 'Verified users',
        'unverified_users' => 'Unverified users',
    ],
    
    // Actions - only keep module-specific keys
    'actions' => [
        'reset_password' => 'Reset password',
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
