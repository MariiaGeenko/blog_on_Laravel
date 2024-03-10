<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnotherPost extends Model
{
    use HasFactory;

    protected $table = 'another_posts';

    protected $fillable = [
        'title',
        'author',
        'description',
    ];

    public function getAnotherPost(): array
    {
        return DB::select("select id, title, description, author from ($this->table)");
    }
}
