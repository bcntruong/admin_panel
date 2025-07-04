<?php

namespace App\Enums;

/**
 * Language enumeration for application localization
 */
enum Language: string
{
    case ENGLISH = 'en';
    case VIETNAMESE = 'vi';

    /**
     * Get all available languages
     *
     * @return array<string> List of language codes
     */
    public static function getAvailableLanguages(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Get language name by code
     *
     * @param string $code Language code
     * @return string|null Language name or null if not found
     */
    public static function getLanguageName(string $code): ?string
    {
        return match ($code) {
            self::ENGLISH->value => 'Tiếng Anh',
            self::VIETNAMESE->value => 'Vietnamese',
            default => null,
        };
    }

    /**
     * Check if the given code is a valid language
     *
     * @param string $code Language code to check
     * @return bool True if valid, false otherwise
     */
    public static function isValid(string $code): bool
    {
        return in_array($code, self::getAvailableLanguages());
    }
}
