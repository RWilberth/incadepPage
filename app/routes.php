<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::get('/', function() {
            return View::make('hello');
        });
Route::get('home', function() {
            return View::make('home.index', array('page' => UIConstants::ID_PAGE_INDEX));
        });
Route::group(array('before' => 'auth'), function() {
            Route::get('capacitacion/registro', 'TrainingController@create');
            Route::get('capacitacion/edicion', 'TrainingController@edit');
            Route::post('capacitacion/registro', 'TrainingController@store');
            Route::post('capacitacion/activar-desactivar', 'TrainingController@updateState');
            Route::get('usuario/logout', 'UserController@logout');
        });
Route::get('capacitacion', function() {
            return View::make('home.capacitacion', array('page' => UIConstants::ID_PAGE_CAPACITACION));
        });
Route::get('galeria', 'HomeController@galery');
Route::get('capacitado/registro', 'TrainedController@create');
Route::post('capacitado/registro', 'TrainedController@store');
Route::get('contacto', function() {
            return View::make('home.contacto', array('page' => UIConstants::ID_PAGE_CONTACTO));
        });
Route::get('registro', function() {
            return View::make('home.index');
        });
Route::get('login', 'UserController@login');
Route::post('login', 'UserController@autenticate');
Route::get('capacitaciones', 'TrainingController@index');
Route::any('captcha-test', function() {
            if (Request::getMethod() == 'POST') {
                $rules = array('captcha' => array('required', 'captcha'));
                $validator = Validator::make(Input::all(), $rules);
                if ($validator->fails()) {
                    echo '<p style="color: #ff0000;">Incorrect!</p>';
                } else {
                    echo '<p style="color: #00ff30;">Matched :)</p>';
                }
            }

            $content = Form::open(array(URL::to(Request::segment(1))));
            $content .= '<p>' . HTML::image(Captcha::img(), 'Captcha image') . '</p>';
            $content .= '<p>' . Form::text('captcha') . '</p>';
            $content .= '<p>' . Form::submit('Check') . '</p>';
            $content .= '<p>' . Form::close() . '</p>';
            return $content;
        });