<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    public function getSources() {
        return \DB::table('sources')
            ->get(); // тоже самое что select * from table
    }

    public function getSource(int $id) {
        return \DB::table('sources')
            ->find($id);
    }
}
