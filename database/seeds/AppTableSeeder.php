<?php

use Illuminate\Database\Seeder;
use App\Seller;
use App\Product;
use App\Review;
use App\Tag;
use App\Address;


class AppTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numOfTags = 5;
        $numOfSellers = 2;
        $numOfProducts = 3;
        $numOfSellerAddresses = 2;
        $numOfReviews = 10;

        factory(Tag::class,$numOfTags)->create();

        factory(Address::class, $numOfSellerAddresses)->create();

        $sellers = factory(Seller::class,$numOfSellers)->create();

        foreach($sellers as $seller){
            factory(Product::class, $numOfProducts)
                -> create(['seller_id' => $seller->id])
                    -> each (
                        function ($product) use($numOfReviews){
                            $product ->tags()->sync(
                                App\Tag::all()->random(2)
                            );
                            factory(Review::class,$numOfReviews)->create(['product_id' => $product->id]);
                        }
                    );
        }
    }
}
