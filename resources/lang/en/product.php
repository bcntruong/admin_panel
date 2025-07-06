<?php

return [
    // Resource labels
    'resource' => [
        'label' => 'Product',
        'plural_label' => 'Products',
    ],
    
    // Navigation
    'navigation' => [
        'label' => 'Products',
        'group' => 'Shop Management',
    ],
    
    // Breadcrumbs
    'breadcrumbs' => [
        'list' => 'List',
        'create' => 'Create',
        'edit' => 'Edit',
        'view' => 'View',
    ],
    
    // Form fields
    'form' => [
        'basic_info' => 'Basic Information',
        'name' => 'Product Name',
        'slug' => 'Slug',
        'description' => 'Description',
        'short_description' => 'Short Description',
        
        'pricing' => 'Pricing & Inventory',
        'price' => 'Price',
        'original_price' => 'Original Price',
        'stock_quantity' => 'Stock Quantity',
        
        'images_section' => 'Images',
        'images' => 'Product Images',
        
        'status_section' => 'Status',
        'is_featured' => 'Featured Product',
        'is_featured_help' => 'Featured products are displayed prominently',
        'status' => 'Status',
        'status_active' => 'Active',
        'status_inactive' => 'Inactive',
        
        'timestamps' => 'Timestamps',
        'created_at' => 'Created at',
        'updated_at' => 'Updated at',
        'never' => 'Never',
    ],
    
    // Table columns
    'table' => [
        'image' => 'Image',
        'name' => 'Product Name',
        'price' => 'Price',
        'stock' => 'Stock',
        'featured' => 'Featured',
        'status' => 'Status',
        'created_at' => 'Created at',
        'updated_at' => 'Updated at',
    ],
    
    // Filters
    'filters' => [
        'status' => 'Status',
        'featured' => 'Featured Products',
        'low_stock' => 'Low Stock',
    ],
    
    // Actions - only keeping product-specific actions
    'actions' => [
        'toggle_featured' => 'Toggle Featured',
        'change_status' => 'Change Status',
    ],
]; 