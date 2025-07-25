<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class topic extends Model
{
    protected $allowincluded=[];
    protected $fillable=[
        'title',
        'description',
        'creation_date',
        'forum_id'

    ];
    public function answer(){
        return $this->hasmany(answer::class);
    }
    public function sock(){
        return $this->belonsto(sock::class);
    }
}
