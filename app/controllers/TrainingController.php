<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TrainingController
 *
 * @author Zero
 */
class TrainingController extends BaseController {

    public function index() {
        if (Auth::check()) {
            $trainings = Training::orderBy('name','desc')->get();
        } else {
            $trainings = Training::where("is_active", "=", true)->orderBy('name','desc')->get();
        }
        return View::make('training.index')->with(array('trainings' => $trainings,
                    'page' => UIConstants::ID_PAGE_CAPACITACION));
    }

    public function create() {

        return View::make('training.form')->with(array('page' => ''));
    }

    public function edit() {

        return View::make('training.form')->with(array('page' => ''));
    }

    public function updateState() {
        $model = Training::find(Input::get('id'));
        $model->save();
    }

    public function store() {
        $model = new Training();
        if ($model->save()) {
            return Redirect::action('TrainingController@index', array('success' => 1));
        } else {
            $msjErrors = $model->errors()->all();
            return View::make("training.form", array('page' => '',
                        'msjErrors' => $msjErrors));
        }
    }

}

?>
