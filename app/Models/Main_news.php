<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Main_news extends Model
{
    use HasFactory;

    protected $table = 'main_news';

    protected $fillable = [
        'title',
        'author',
        'description',
    ];

    public function getMainNews(): array
    {
        return DB::select("select id, title, description, author from ($this->table)");
    }
}
