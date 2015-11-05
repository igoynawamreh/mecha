<?php


/**
 * Set Default Validator(s)
 * ------------------------
 */

// Check for IP address
Guardian::checker('this_is_ip', function($input) {
    return filter_var($input, FILTER_VALIDATE_IP);
});

// Check for URL address
Guardian::checker('this_is_url', function($input) {
    return filter_var($input, FILTER_VALIDATE_URL);
});

// Check for email address
Guardian::checker('this_is_email', function($input) {
    return filter_var($input, FILTER_VALIDATE_EMAIL);
});

// Check for boolean value
Guardian::checker('this_is_boolean', function($input) {
    return filter_var($input, FILTER_VALIDATE_BOOLEAN);
});

// Check whether the input value is too large
Guardian::checker('this_is_too_large', function($input, $max = 3000) {
    return is_numeric($input) ? $input > $max : false;
});

// Check whether the input value is too small
Guardian::checker('this_is_too_small', function($input, $min = 0) {
    return is_numeric($input) ? $input < $min : false;
});

// Check whether the input value is too long
Guardian::checker('this_is_too_long', function($input, $max = 3000) {
    return is_string($input) ? strlen($input) > $max : false;
});

// Check whether the input value is too short
Guardian::checker('this_is_too_short', function($input, $min = 0) {
    return is_string($input) ? strlen($input) < $min : false;
});

// Check whether the answer is incorrect
Guardian::checker('this_is_correct', function($a = true, $b = false) {
    return $a === $b;
});

// Forget all memories on page visit ...
Weapon::add('shield_after', function() {
    Guardian::forget();
});

// --ibid
Weapon::add('shield_cache_after', function() {
    Guardian::forget();
});