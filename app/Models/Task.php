<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  use HasFactory;

  protected $table = 'tasks';
  protected $fillable = [
      'gorevAdi',
      'gorevTarih',
      'id',
      'created_at',
      'category_id'
  ];
    public function kategori_getir()
    {
        return $this->belongsTo(categories::class, 'category_id', 'id');
    }
}


