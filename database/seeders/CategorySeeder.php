<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Eletrônicos', 'slug' => 'eletronicos'],
            ['name' => 'Periféricos', 'slug' => 'perifericos'],
            ['name' => 'Hardware', 'slug' => 'hardware'],
            ['name' => 'Acessórios', 'slug' => 'acessorios'],
            ['name' => 'Áudio & Vídeo', 'slug' => 'audio-video'],
        ]);
    }
}