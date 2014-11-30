<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

use LaravelBook\Ardent\Ardent;

/**
 * Description of Training
 *
 * @author Zero
 */
class Training extends Ardent {

    protected $guarded = array();
    public $autoHydrateEntityFromInput = true;
    public $autoPurgeRedundantAttributes = true;
    public $forceEntityHydrationFromInput = true;
    public static $rules = array(
        'url_image' => 'required',
        'description' => 'required',
        'name' => 'required',
    );

    public function beforeSave() {
        if ($this->url_image instanceof Symfony\Component\HttpFoundation\File\UploadedFile) {
            if ($this->url_image->move(ServerConstants::TRAINING_IMG_PATH, $this->url_image->getClientOriginalName())) {
                $this->url_image = $this->url_image->getClientOriginalName();
                return true;
            }
            return false;
        }
        return true;
    }

    protected $table = "trainings";

}

?>
