<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sources')->insert($this->getData());
    }

    public function getData(): array
    {
        $faker = Factory::create('ru_RU');
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'title' => $faker->sentence(mt_rand(3,10)),
                'url' => $faker->url,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        return $data;
    }
}
