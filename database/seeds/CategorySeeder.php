<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $categories = [	"Technology", "Educational", "Fashion", "Food", "Entertainment", "Music", "Travel"];
        foreach ($categories as $key => $category) {
            Category::create([
                'category_name' => $category
            ]);
        }
    }
}
