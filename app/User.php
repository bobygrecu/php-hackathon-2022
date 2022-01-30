<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'CNP', 'create',
    ];

    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }

    function validCNP($p_cnp) {
        if(strlen($p_cnp) != 13) {
            return false;
        }
        $cnp = str_split($p_cnp);
        unset($p_cnp);
        $hashTable = array( 2 , 7 , 9 , 1 , 4 , 6 , 3 , 5 , 8 , 2 , 7 , 9 );
        $hashResult = 0;
        for($i=0 ; $i<13 ; $i++) {
            if(!is_numeric($cnp[$i])) {
                return false;
            }
            $cnp[$i] = (int)$cnp[$i];
            if($i < 12) {
                $hashResult += (int)$cnp[$i] * (int)$hashTable[$i];
            }
        }
        unset($hashTable, $i);
        $hashResult = $hashResult % 11;
        if($hashResult == 10) {
            $hashResult = 1;
        }
        $year = ($cnp[1] * 10) + $cnp[2];
        switch( $cnp[0] ) {
            case 1  : case 2 : { $year += 1900; } break;
            case 3  : case 4 : { $year += 1800; } break;
            case 5  : case 6 : { $year += 2000; } break;
            case 7  : case 8 : case 9 : { 
                $year += 2000;
                if($year > (int)date('Y')-14) {
                    $year -= 100;
                }
            } break;
            default : {
                return false;
            } break;
        }
        return ($year > 1800 && $year < 2099 && $cnp[12] == $hashResult);
    }
}
