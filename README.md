# Isx

ISX is a set of functions to ease the usage of PHP's is_* functions (like `is_null` or `empty`) on multiple variables at the same time without the need to repeat the function name for each value.

For example, instead of writing:

```PHP
if (is_null($a) || is_null($b) || is_null($c)) {
```

You can simple do this:
```PHP
if (is_null_any($a, $b, $c)) {
```

## Installing

Using Composer just run:

`composer require faelv/isx`

**DO NOT FORGET TO IMPORT THE FUNCTIONS YOU WANT TO USE!**
```PHP
<?php

use function Isx\is_empty_all;
use function Isx\{is_null_all, is_any};
```

## Available Functions

### `is_null_all`

Returns true if all values are null, false otherwise

### `is_null_any`

Returns true if at least one value is null, false otherwise

### `is_false_all`

Returns true if all values are false, false otherwise

### `is_false_any`

Returns true if at least one value is false, false otherwise

### `is_true_all`

Returns true if all values are true, false otherwise

### `is_true_any`

Returns true if at least one value is true, false otherwise

### `is_empty_all`

Returns true if all values are empty, false otherwise

### `is_empty_any`

Returns true if at least one value is empty, false otherwise

### `is_all`

Returns true if a callback function (which receives one parameter) also returns true for all values, false otherwise _[see usage below]_

### `is_any`

Returns true if a callback function (which receives one parameter) also returns true for at least one value, false otherwise _[see usage below]_

## Using **is_all** and **is_any**

With **is_all** and **is_any** you can use any function to test your variables:

```PHP
is_all('is_int', 1, 2, 3)
```

```PHP
is_any(fn($value) => strlen($value) > 3, ...$strArray)
```
