<?php

class HomeController extends BaseController {
    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      | You may wish to use controllers instead of, or in addition to, Closure
      | based routes. That's great! Here is an example controller method to
      | get you started. To route to this controller, just add the route:
      |
      |	Route::get('/', 'HomeController@showWelcome');
      |
     */

    public function index() {
        return View::make('home.index');
    }

    public function galery() {
        $mainDir = "./img/galery";
        $filesPath = array();
        $rows = array();
        $max = 3;
        if ($manageDir = opendir($mainDir)) {
            while ($fileName = readdir($manageDir)) {
                if (preg_match("/^(.)*(\.(jpg|png|jpeg))$/", $fileName)) {
                    $path = $mainDir . "/" . $fileName;
                    if (!is_dir($path)) {
                        $filesPath[] = $path;
                        if (count($filesPath) >= $max) {
                            $rows[] = $filesPath;
                            $filesPath = array();
                        }
                    }
                }
            }
            if (!empty($filesPath)) {
                $rows[] = $filesPath;
            }
        }
        return View::make('home.galeria', array('page' => UIConstants::ID_PAGE_GALERIA, 'rows' => $rows));
    }

}
