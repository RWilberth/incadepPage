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
                    "trainings" => array("" => "Selecciona una opcion") + Training::where('is_active', true)->lists('name', 'id')));
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

    public function admin() {
        return View::make('trained.admin', ['page' => '',
                    "trainings" => array("" => "Todos") + Training::lists('name', 'id')]);
    }

    public function search() {
        $traineds = Trained::orderBy('father_last_name', 'asc')
                ->orderBy('mother_last_name', 'asc')
                ->orderBy('created_at', 'asc')
                ->orderBy('name', 'asc')
                ->orderBy('created_at', 'asc')
                ->groupBy('created_at');
        $trainedAttrFound = new Trained(Input::all());
        foreach ($trainedAttrFound->getAttributes() as $key => $value) {
            $traineds->where($key, 'like', '%'.$value.'%');
        }
        return View::make("trained.tableAdmin", array('traineds' => $traineds->get()));
    }
    public function delete($id){
        Trained::find($id)->delete();
        return Response::json('success');
    }

}

?>
