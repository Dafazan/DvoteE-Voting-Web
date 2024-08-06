<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condidate extends Model
{
    use HasFactory;
    protected $table = 'condidates';
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'image',

        'pos_id'
    ];


    public function positions()
    {
        return $this->belongsTo(Position::class, 'pos_id');
    }
}
