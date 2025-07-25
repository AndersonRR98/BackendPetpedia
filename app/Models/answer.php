<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    protected $allofilter=[

    ];
  protected $fillable=[
    'content',
    'creation_date',
    'topic_id',
  ];
//creacion de las relaciones 
public function topics(){
    return $this->belongsTo(topic::class);
  }

  public function sock(){

return $this->hasmany(sock::class);
  }

}
