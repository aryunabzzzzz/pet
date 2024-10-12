<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportedFile extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'exported_files';

    protected $fillable = [
        'file_path',
        'status'
    ];
}
