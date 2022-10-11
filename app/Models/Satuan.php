<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Satuan extends Model
{
    use HasFactory;
    Use Sortable;

    protected $fillable=[
        'satuan'
    ];

    public $sortable=['satuan'];
}
