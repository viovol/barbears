<?php
use App\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;//issikvieciam faker klase

class ProductsTableSeeder extends Seeder
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
        $product=new Product;
        $product->title=$faker->name();
        $product->description=$faker->sentence(150);
        $product->img_url=$faker->imageUrl(300,400, 'fashion');
        $product->price=$faker->numberBetween(1,20);
        $product->quantity=$faker->numberBetween(1,20);
        $product->category_id=$faker->numberBetween(1,5);

        $product->save();
      }
        //
    }
}
