<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = [
            [
                "id" => 1,
                "title" => "iPhone 9",
                "description" => "An apple mobile which is nothing like apple",
                "price" => 20000000,
                "stock" => 94,
                "category" => "smartphones",
                "thumbnail" => "https://i.dummyjson.com/data/products/1/thumbnail.jpg",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id" => 2,
                "title" => "iPhone X",
                "description" =>
                    "SIM-Free, Model A19211 6.5-inch Super Retina HD display with OLED technology A12 Bionic chip with ...",
                "price" => 12000000,
                "stock" => 34,
                "category" => "smartphones",
                "thumbnail" => "https://i.dummyjson.com/data/products/2/thumbnail.jpg",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id" => 3,
                "title" => "Samsung Universe 9",
                "description" =>
                    "Samsung\'s new variant which goes beyond Galaxy to the Universe",
                "price" => 10000000,
                "stock" => 36,
                "category" => "smartphones",
                "thumbnail" => "https://i.dummyjson.com/data/products/3/thumbnail.jpg",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id" => 4,
                "title" => "OPPOF19",
                "description" => "OPPO F19 is officially announced on April 2021.",
                "price" => 2800000,
                "stock" => 123,
                "category" => "smartphones",
                "thumbnail" => "https://i.dummyjson.com/data/products/4/thumbnail.jpg",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id" => 5,
                "title" => "Huawei P30",
                "description" =>
                    "Huawei’s re-badged P30 Pro New Edition was officially unveiled yesterday in Germany and now the device has made its way to the UK.",
                "price" => 4990000,
                "stock" => 32,
                "category" => "smartphones",
                "thumbnail" => "https://i.dummyjson.com/data/products/5/thumbnail.jpg",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id" => 6,
                "title" => "MacBook Pro",
                "description" =>
                    "MacBook Pro 2021 with mini-LED display may launch between September, November",
                "price" => 17490000,
                "stock" => 83,
                "category" => "laptops",
                "thumbnail" => "https://i.dummyjson.com/data/products/6/thumbnail.png",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id" => 7,
                "title" => "Samsung Galaxy Book",
                "description" =>
                    "Samsung Galaxy Book S (2020) Laptop With Intel Lakefield Chip, 8GB of RAM Launched",
                "price" => 14990000,
                "stock" => 50,
                "category" => "laptops",
                "thumbnail" => "https://i.dummyjson.com/data/products/7/thumbnail.jpg",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id" => 8,
                "title" => "Microsoft Surface Laptop 4",
                "description" =>
                    "Style and speed. Stand out on HD video calls backed by Studio Mics. Capture ideas on the vibrant touchscreen.",
                "price" => 14990000,
                "stock" => 68,
                "category" => "laptops",
                "thumbnail" => "https://i.dummyjson.com/data/products/8/thumbnail.jpg",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id" => 9,
                "title" => "Infinix INBOOK",
                "description" =>
                    "Infinix Inbook X1 Ci3 10th 8GB 256GB 14 Win10 Grey – 1 Year Warranty",
                "price" => 10990000,
                "stock" => 96,
                "category" => "laptops",
                "thumbnail" => "https://i.dummyjson.com/data/products/9/thumbnail.jpg",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id" => 10,
                "title" => "HP Pavilion 15-DK1056WM",
                "description" =>
                    "HP Pavilion 15-DK1056WM Gaming Laptop 10th Gen Core i5, 8GB, 256GB SSD, GTX 1650 4GB, Windows 10",
                "price" => 10990000,
                "stock" => 89,
                "category" => "laptops",
                "thumbnail" =>
                    "https://i.dummyjson.com/data/products/10/thumbnail.jpeg",
                    "created_at" => now(),
                    "updated_at" => now(),
            ],
        ];

        Product::insert($product);
    }
}
