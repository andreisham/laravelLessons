<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public function getNews() {
        return \DB::table('news')
            ->get(); // тоже самое что select * from table
    }

    public function getOneNews(int $id) {
        return \DB::table('news')
            ->find($id);
    }
}
