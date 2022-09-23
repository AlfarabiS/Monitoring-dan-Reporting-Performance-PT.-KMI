<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Process extends Model
{
    protected $guarded = [
        'id'
    ];
    use HasFactory;
    use Sortable;

    public $Sortable = [
        'process_id',
        'process_name',
        'gudang_id',
    ];
}
