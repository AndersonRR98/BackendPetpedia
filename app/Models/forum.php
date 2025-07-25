<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forum extends Model
{
protected $allowfilter=[
      
];
    protected $fillable = [
        'title',
        'description',
        'creation_date',
        'user_id',
    ];
    public function users(){
        return $this ->belongsto(User::class);
    }
    public function topics(){
        return $this->hasmany(topic::class);
    }
}
