<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use App\Filament\Resources\RoleResource\RelationManagers;
use Spatie\Permission\Models\Role;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin vai trò')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Tên vai trò')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->placeholder('Nhập tên vai trò'),
                            
                        Forms\Components\TextInput::make('guard_name')
                            ->label('Guard')
                            ->default('web')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(2),
                    
                Forms\Components\Section::make('Phân quyền')
                    ->description('Chọn các quyền hạn cho vai trò này')
                    ->schema(function () {
                        $permissions = \Spatie\Permission\Models\Permission::all();
                        $permissionsByResource = [];
                        
                        // Debug: Kiểm tra các permission trùng lặp
                        $debugInfo = [];
                        foreach ($permissions as $permission) {
                            $debugInfo[$permission->name] = isset($debugInfo[$permission->name]) ? $debugInfo[$permission->name] + 1 : 1;
                        }
                        $duplicates = array_filter($debugInfo, function($count) { return $count > 1; });
                        
                        $actionLabels = [
                            'view' => 'Xem',
                            'view_any' => 'Xem danh sách',
                            'create' => 'Tạo mới',
                            'update' => 'Chỉnh sửa',
                            'delete' => 'Xóa',
                            'delete_any' => 'Xóa nhiều',
                            'restore' => 'Khôi phục',
                            'restore_any' => 'Khôi phục nhiều',
                            'force_delete' => 'Xóa vĩnh viễn',
                            'force_delete_any' => 'Xóa vĩnh viễn nhiều',
                            'replicate' => 'Sao chép',
                            'reorder' => 'Sắp xếp',
                        ];
                        
                        $resourceLabels = [
                            'user' => 'Người dùng',
                            'role' => 'Vai trò',
                        ];
                        
                        // Đảm bảo mỗi permission chỉ xuất hiện một lần
                        $processedPermissions = [];
                        
                        // Nhóm permissions theo resource chính (user, role)
                        foreach ($permissions as $permission) {
                            $name = $permission->name;
                            
                            // Bỏ qua nếu đã xử lý
                            if (in_array($name, $processedPermissions)) {
                                continue;
                            }
                            $processedPermissions[] = $name;
                            
                            // Xác định resource chính
                            $mainResource = null;
                            foreach ($resourceLabels as $key => $label) {
                                // Kiểm tra cả dạng số ít và số nhiều
                                if (strpos($name, "_{$key}") !== false || strpos($name, "_{$key}s") !== false) {
                                    $mainResource = $key;
                                    break;
                                }
                            }
                            
                            if ($mainResource) {
                                if (!isset($permissionsByResource[$mainResource])) {
                                    $permissionsByResource[$mainResource] = [
                                        'label' => $resourceLabels[$mainResource],
                                        'permissions' => [],
                                    ];
                                }
                                
                                // Xác định action từ tên permission
                                $action = null;
                                foreach ($actionLabels as $actionKey => $actionLabel) {
                                    if (strpos($name, $actionKey) === 0) {
                                        $action = $actionKey;
                                        break;
                                    }
                                }
                                
                                // Thêm tên đầy đủ của permission để dễ phân biệt
                                $label = $action ? $actionLabels[$action] : $name;
                                $label .= " ({$name})";
                                
                                $permissionsByResource[$mainResource]['permissions'][$permission->name] = $label;
                            }
                        }
                        
                        // Tạo các components cho từng resource
                        $components = [];
                        foreach ($permissionsByResource as $resource => $data) {
                            $components[] = Forms\Components\Group::make()
                                ->schema([
                                    Forms\Components\Fieldset::make($data['label'])
                                        ->schema(function () use ($data) {
                                            $checkboxes = [];
                                            foreach ($data['permissions'] as $permissionName => $actionLabel) {
                                                $checkboxes[] = Forms\Components\Checkbox::make($permissionName)
                                                    ->label($actionLabel);
                                            }
                                            return $checkboxes;
                                        })
                                        ->columns(4),
                                ]);
                        }
                        
                        // Thêm field ẩn để lưu tất cả permissions
                        $components[] = Forms\Components\Hidden::make('permissions')
                            ->afterStateHydrated(function ($component, $state, $record) {
                                if (!$record) return;
                                
                                $permissionNames = $record->permissions->pluck('name')->toArray();
                                foreach ($permissionNames as $name) {
                                    $component->getContainer()->getComponent($name)?->state(true);
                                }
                            })
                            ->dehydrateStateUsing(function ($state, $get) use ($permissions) {
                                $selectedPermissions = [];
                                foreach ($permissions as $permission) {
                                    if ($get($permission->name) === true) {
                                        $selectedPermissions[] = $permission->name;
                                    }
                                }
                                return $selectedPermissions;
                            });
                        
                        return $components;
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên vai trò')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('guard_name')
                    ->label('Guard')
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('permissions_count')
                    ->label('Số quyền hạn')
                    ->counts('permissions')
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('permissions.name')
                    ->label('Quyền hạn')
                    ->badge()
                    ->color('info')
                    ->separator(',')
                    ->toggleable()
                    ->limitList(3)
                    ->expandableLimitedList(),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tạo lúc')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }
}
