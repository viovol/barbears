<?php
use App\Category;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;//issikvieciam faker klase

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker=Faker::create();
      foreach (range(1,10) as $x) {
        # code...
        $category=new Category;
        $category->title=$faker->name();
        $category->img_url=$faker->imageUrl();
        $category->save();
      }
        //
    }
}
