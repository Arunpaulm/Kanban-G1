<?php

use \Illuminate\Support\Facades\Storage;

if (!function_exists('camelString')) {
    function camelString($string) {
        $arr = explode('_', $string);
        return strtoupper(implode(' ', $arr));
    }
}

function getImage($image, $type = null)
{
    if (Storage::disk('public')->exists($image) && !is_null($image)){
        return Storage::disk('public')->url($image);
    }
    elseif (is_null($type)){
        return asset('img/avatar.png');
    } else {
        return asset($type);
    }
}

function getTaskPriorityColor($code)
{
    $priority = array_flip(config('setting.priority'));
    $name = $priority[$code];
    $colors = config('setting.priority_color');
    return $colors[$name];
}

function getFile($location, $file)
{
    if (Storage::disk('public')->exists($location.$file) && !is_null($file)){
        return Storage::disk('public')->url($location.$file);
    } else {
        return null;
    }
}

if (!function_exists('passwordCheck')) {
    function passwordCheck($pass, $user)
    {
        // Rule 1. Check contain username or not
        $lc_pass = strtolower($pass);
        $lc_user = strtolower($user);
        $contain_username = str_contains($lc_pass, $lc_user);
        if ($contain_username) {
            return config('basic.password_not_contain_username');
        }
        //  Rule 2: the password must be at least 10 characters
        if (strlen($pass) < config('setting.password_min_length')) {
            return config('basic.password_required_character');
        }
        //Rule 3: count how many lowercase, uppercase, and digits are in the password
        $uc = 0;
        $lc = 0;
        $num = 0;
        $other = 0;
        for ($i = 0, $j = strlen($pass); $i < $j; $i++) {
            $c = substr($pass, $i, 1);
            if (preg_match('/[A-Z]/', $c)) {
                $uc = 1;
            } elseif (preg_match('/[a-z]/', $c)) {
                $lc = 1;
            } elseif (preg_match('/[0-9]/', $c)) {
                $num = 1;
            } else {
                $other = 1;
            }
        }

        if (($uc + $lc + $num + $other) < 3) {
            return config('basic.password_three_requirement');
        }

        //Rule 4: the password must not contain a dictionary word
        $word_file = config('basic.words');
        foreach ($word_file as $word) {
            $contain_word = str_contains($lc_pass, $word);
            if ($contain_word) {
                return config('basic.password_not_contain_words') . $word;
            }
        }
    }
}
