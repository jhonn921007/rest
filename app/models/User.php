<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'grupo';
	protected $fillable = ['id','url'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');

    public static function construir_nombre($min=4, $max=8){
        $nombre = '';
        $vocales = array("a", "e", "i", "o", "u");
        $consonantes = array("b", "c", "d", "f", "g", "j", "l", "m", "n", "p", "r", "s", "t");
        $random_nombre = rand($min, $max);//largo de la palabra
        $random = rand(0,1);//si empieza por vocal o consonante
        for($j=0;$j<$random_nombre;$j++){//palabra
            switch($random){
                case 0: $random_vocales = rand(0, count($vocales)-1); $nombre.= $vocales[$random_vocales]; $random = 1; break;
                case 1: $random_consonantes = rand(0, count($consonantes)-1); $nombre.= $consonantes[$random_consonantes]; $random = 0; break;
            }
        }
        return $nombre;
    }

}
