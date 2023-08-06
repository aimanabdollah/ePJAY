<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function incomes()
    {
        return $this->hasMany(Income::class, 'id_kategori');
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class, 'id_kategori');
    }
}
