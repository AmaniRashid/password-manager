<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nette\Utils\Random;

class GeneratorController extends Controller
{
    public function index(): string
    {

        $values = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQIRSTUVWXYZ/*+-@#$%?.,';
        return $this->generate($values);

    }
    public function generate($values): string
    {
//      generates secure password
//      regex to check if password is strong enough
//      min of 8 characters 1 lowercase 1 uppercase 1 numeral and 1 special character
        $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[@#?!$%^&-+]).{8,}$/";

//      randomly generates 12 char password from string given
        $password = Random::generate(12, $values);

//        check if password is strong otherwise recurse
        if(preg_match($password_regex, $password)){
            return $password;
        } else {
            return $this->generate($values);
        }
    }
}
