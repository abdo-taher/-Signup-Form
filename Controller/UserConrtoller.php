<?php

require_once (realpath(dirname(__FILE__) . '/../Config/config.php'));

class UserController
{

    function LoginForm()
    {
        require ('View/login.php');
    }
    function registerForm()
    {
        require ('View/register.php');
    }
    function welcome()
    {
        require ('View/welcome.php');
    }
    function profile()
    {
            require ('View/profile.php');
    }

}