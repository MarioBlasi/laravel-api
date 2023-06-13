<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Frontend', 'Backend', 'Full Stack', 'Code', 'DevOps'];

        foreach ($categories as $category){
            $newCategory = new Category();
            $newCategory->name = $category();
            $newCategory->slug = Str::slug($category->name);
            $newCategory->save;
        }
    }
}
