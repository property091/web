<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimModel extends Model
{
    use HasFactory;

    protected $table = 'claims';


    public function getStatus($status) {
        switch($status) {
            case 1:
                return "ok";
                break;
            case 2:
                return "no";
                break;
            case 8:
                return "y";
                break;
            default:
                return "777";
                break;
        }
    }
}
