<?php

namespace App\Filament\Components\Buttons;

use Filament\Tables\Actions\Action;
use Closure;

class TableActionButton
{
    protected string $label;
    protected string $icon;
    protected string $color;
    
    /**
     * Create a new button instance.
     *
     * @param string|null $label The button label
     * @param string|null $icon The button icon
     * @param string|null $color The button color
     */
    public function __construct(?string $label = null, ?string $icon = null, ?string $color = null)
    {
        $this->label = $label ?? $this->getDefaultLabel();
        $this->icon = $icon ?? $this->getDefaultIcon();
        $this->color = $color ?? $this->getDefaultColor();
    }
    
    /**
     * Get the default label for the button.
     *
     * @return string
     */
    protected function getDefaultLabel(): string
    {
        return '';
    }
    
    /**
     * Get the default icon for the button.
     *
     * @return string
     */
    protected function getDefaultIcon(): string
    {
        return '';
    }
    
    /**
     * Get the default color for the button.
     *
     * @return string
     */
    protected function getDefaultColor(): string
    {
        return 'primary';
    }
    
    /**
     * Evaluate a value, resolving it if it is a Closure.
     *
     * @param mixed $value
     * @param array $parameters
     * @return mixed
     */
    public function evaluate(mixed $value, array $parameters = []): mixed
    {
        if ($value instanceof Closure) {
            return $value(...$parameters);
        }
        
        return $value;
    }
    
    /**
     * Configure the action with the button's properties.
     *
     * @param mixed $action
     * @return mixed
     */
    public function configure(mixed $action): mixed
    {
        return $action
            ->label($this->label)
            ->icon($this->icon)
            ->color($this->color);
    }
    
    /**
     * Create a new button instance.
     *
     * @param string|null $label
     * @param string|null $icon
     * @param string|null $color
     * @return static
     */
    public static function make(?string $label = null, ?string $icon = null, ?string $color = null): static
    {
        return new static($label, $icon, $color);
    }
} 