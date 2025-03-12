<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Tongkang extends Model
{

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // if (Auth::user()->company == "BTJ") {
        // $tabb = "mstr_tongkang";
    // } else {
        // $tabb = "mstr_tongkang_bts";
    // }
    protected $table = 'mstr_tongkang';
    // protected $primaryKey = 'kode_lokasi';

    protected $fillable = [
        'kode_tongkang',
        'nama_tongkang',
    ];
    
    
}
