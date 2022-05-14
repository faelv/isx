<?php

/**
 * Ises is a set of functions to ease the usage of PHP's is_* functions on multiple variables
 *
 * @author faelv <rafael_alt_dev@outlook.com>
 * @license ISC License
 * @see https://github.com/faelv/ises
 */

namespace Isx;


if (!function_exists('Isx\\is_all')) {
    /**
     * Returns true if $callback returns true for all values, false otherwise
     *
     * @param callable $callback  A callable that will receive a single parameter
     * @param mixed    ...$values Values passed to $callback
     *
     * @return bool True if all values are true according to $callback, false otherwise
     */
    function is_all(callable $callback, ...$values): bool
    {
        foreach ($values as $value) {
            if (!(bool)call_user_func($callback, $value)) {
                return false;
            }
        }
        return count($values) > 0;
    }
}

if (!function_exists('Isx\\is_any')) {
    /**
     * Returns true if $callback returns true for at least one value, false otherwise
     *
     * @param callable $callback  A callable that will receive a single parameter
     * @param mixed    ...$values Values passed to $callback
     *
     * @return bool True if any value is true according to $callback, false otherwise
     */
    function is_any(callable $callback, ...$values): bool
    {
        foreach ($values as $value) {
            if ((bool)call_user_func($callback, $value)) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('Isx\\is_null_all')) {
    /**
     * Returns true if all values are null, false otherwise
     *
     * @param mixed ...$values Values to test
     *
     * @return bool True if all values are null, false otherwise
     */
    function is_null_all(...$values): bool
    {
        return is_all('is_null', ...$values);
    }
}

if (!function_exists('Isx\\is_null_any')) {
    /**
     * Returns true if at least one value is null, false otherwise
     *
     * @param mixed ...$values Values to test
     *
     * @return bool True if at least one value is null, false otherwise
     */
    function is_null_any(...$values): bool
    {
        return is_any('is_null', ...$values);
    }
}

if (!function_exists('Isx\\is_false_all')) {
    /**
     * Returns true if all values are false, false otherwise
     *
     * @param mixed ...$values Values to test
     *
     * @return bool True if all values are false, false otherwise
     */
    function is_false_all(...$values): bool
    {
        return is_all(
            function ($value) {
                return $value === false;
            },
            ...$values
        );
    }
}

if (!function_exists('Isx\\is_false_any')) {
    /**
     * Returns true if at least one value is false, false otherwise
     *
     * @param mixed ...$values Values to test
     *
     * @return bool True if at least one value is false, false otherwise
     */
    function is_false_any(...$values): bool
    {
        return is_any(
            function ($value) {
                return $value === false;
            },
            ...$values
        );
    }
}

if (!function_exists('Isx\\is_true_all')) {
    /**
     * Returns true if all values are true, false otherwise
     *
     * @param mixed ...$values Values to test
     *
     * @return bool True if all values are true, false otherwise
     */
    function is_true_all(...$values): bool
    {
        return is_all(
            function ($value) {
                return $value === true;
            },
            ...$values
        );
    }
}

if (!function_exists('Isx\\is_true_any')) {
    /**
     * Returns true if at least one value is true, false otherwise
     *
     * @param mixed ...$values Values to test
     *
     * @return bool True if at least one value is true, false otherwise
     */
    function is_true_any(...$values): bool
    {
        return is_any(
            function ($value) {
                return $value === true;
            },
            ...$values
        );
    }
}

if (!function_exists('Isx\\is_empty_all')) {
    /**
     * Returns true if all values are empty, false otherwise
     *
     * @param mixed ...$values Values to test
     *
     * @return bool True if all values are empty, false otherwise
     */
    function is_empty_all(...$values): bool
    {
        return is_all(
            function ($value) {
                return empty($value);
            },
            ...$values
        );
    }
}

if (!function_exists('Isx\\is_empty_any')) {
    /**
     * Returns true if at least one value is empty, false otherwise
     *
     * @param mixed ...$values Values to test
     *
     * @return bool True if at least one value is empty, false otherwise
     */
    function is_empty_any(...$values): bool
    {
        return is_any(
            function ($value) {
                return empty($value);
            },
            ...$values
        );
    }
}
