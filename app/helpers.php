<?php

if (! function_exists('generateRandomString')) {
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i=0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}

if (! function_exists('fake_person_data')) {
    function fake_person_data() {
        return [
            'firstName' => fake()->firstName,
            'lastName' => fake()->lastName,
            'birthDay' => fake()->date,
            'address' => fake()->address,
            'job' => fake()->jobTitle,
        ];
    }
}