<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserTableSeeder
 *
 * @author Zero
 */
class UserTableSeeder extends Seeder {

    public function run() {
        // DB::table('users')->delete();

        User::create(array('email' => 'cloud_ultimate@hotmail.com',
            'password' => Hash::make('4dm1n1nc4d3p'), 'userName' => 'administrador'));
    }

}


?>
