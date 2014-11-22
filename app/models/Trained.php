<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

use LaravelBook\Ardent\Ardent;

/**
 * Description of Trained
 *
 * @author Zero
 */
class Trained extends Ardent {

    protected $guarded = array();
    public $autoHydrateEntityFromInput = true;
    public $autoPurgeRedundantAttributes = true;

    function __construct($attributes = array()) {
        parent::__construct($attributes);

        $this->purgeFilters[] = function($key) {
                    $purge = array('father_last_name', 'mother_last_name','recaptcha_challenge_field', 'recaptcha_response_field');
                    return !in_array($key, $purge);
                };
    }

    public static $rules = array(
        'mother_last_name' => 'required',
        'father_last_name' => 'required',
        'name' => 'required',
        'email' => 'required|email',
        'telephone' => 'required',
        'celphone' => 'required',
        'recaptcha_response_field' => 'required|recaptcha',
    );

    public function beforeSave() {
        $this->last_name = $this->father_last_name . " " . $this->mother_last_name;
        return true;
    }

    protected $table = "trained";

    //put your code here
}

?>
