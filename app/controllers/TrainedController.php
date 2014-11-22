<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TrainedController
 *
 * @author Zero
 */
class TrainedController extends BaseController {

    public function create() {
        return View::make("trained.form", array('page' => UIConstants::ID_PAGE_REGISTRO,
                    "trainings" => array("" => "Selecciona una opcion") + Training::lists('name', 'id')));
    }

    public function store() {
        $model = new Trained();
        if ($model->save()) {
            return View::make("trained.form", array('page' => UIConstants::ID_PAGE_REGISTRO,
                        "trainings" => array("" => "Selecciona una opcion") + Training::lists('name', 'id'), 'success' => true));
        } else {
            $msjErrors = $model->errors()->all();
            return View::make("trained.form", array('page' => UIConstants::ID_PAGE_REGISTRO,
                        "trainings" => array("" => "Selecciona una opcion") + Training::lists('name', 'id'), 'msjErrors' => $msjErrors));
        }
    }

}

?>
