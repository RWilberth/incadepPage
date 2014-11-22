<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author Zero
 */
class UserController extends BaseController {

    //put your code here
    public function login() {
        return View::make('emails.auth.login');
    }
    public function logout(){
         Auth::logout();
         return Redirect::to('home');
    }

    public function autenticate() {
        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))) {
            return Redirect::intended('home');
        }
        return View::make('emails.auth.login');
    }

}

?>
