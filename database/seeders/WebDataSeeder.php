<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Inventory;
use Illuminate\Database\Seeder;

class WebDataSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Creando categorías...');
        Category::updateOrCreate(['id' => 1], ['name' => 'Camisetas', 'gender' => 'hombre']);
        Category::updateOrCreate(['id' => 2], ['name' => 'Sudaderas', 'gender' => 'hombre']);
        Category::updateOrCreate(['id' => 3], ['name' => 'Polos', 'gender' => 'hombre']);
        Category::updateOrCreate(['id' => 4], ['name' => 'Pantalones', 'gender' => 'hombre']);
        Category::updateOrCreate(['id' => 5], ['name' => 'Abrigos', 'gender' => 'hombre']);
        Category::updateOrCreate(['id' => 6], ['name' => 'Sudaderas', 'gender' => 'mujer']);
        Category::updateOrCreate(['id' => 7], ['name' => 'Pantalones', 'gender' => 'mujer']);
        Category::updateOrCreate(['id' => 8], ['name' => 'Punto', 'gender' => 'mujer']);
        Category::updateOrCreate(['id' => 9], ['name' => 'Acessorios', 'gender' => 'mujer']);
        Category::updateOrCreate(['id' => 10], ['name' => 'Abrigos', 'gender' => 'mujer']);
        Category::updateOrCreate(['id' => 11], ['name' => 'Camisetas', 'gender' => 'mujer']);

        $this->command->info('Creando productos e inventario...');

        $product = Product::updateOrCreate(['id' => 1], [
            'category_id' => 1,
            'name' => 'Camiseta Gilda Blanca',
            'description' => 'Blanca con logo Gilda',
            'price' => 45,
            'image_primary' => 'camiseta1.png',
            'image_secondary' => 'camiseta1_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 1, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 1, 'size' => 'M'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 1, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 1, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 1, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 1, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 2], [
            'category_id' => 1,
            'name' => 'Locally Hated Cherry Negra',
            'description' => 'Negra con estampado Cherry',
            'price' => 45,
            'image_primary' => 'camiseta2.png',
            'image_secondary' => 'camiseta2_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 2, 'size' => 'L'],
            ['stock_quantity' => 17]
        );
        Inventory::updateOrCreate(
            ['product_id' => 2, 'size' => 'M'],
            ['stock_quantity' => 15]
        );
        Inventory::updateOrCreate(
            ['product_id' => 2, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 2, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 2, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 2, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 3], [
            'category_id' => 1,
            'name' => 'Locally Hated Cherry Blanca',
            'description' => 'Blanca con estampado Cherry',
            'price' => 45,
            'image_primary' => 'camiseta3.png',
            'image_secondary' => 'camiseta3_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 3, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 3, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 3, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 3, 'size' => 'XL'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 3, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 3, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 4], [
            'category_id' => 1,
            'name' => 'Chateau Blanca Estilo',
            'description' => 'Blanca estilo Chateau',
            'price' => 45,
            'image_primary' => 'camiseta4.png',
            'image_secondary' => 'camiseta4_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 4, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 4, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 4, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 4, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 4, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 4, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 5], [
            'category_id' => 1,
            'name' => 'Más Vino Tee Marshmellow',
            'description' => 'Marshmellow edición Más Vino',
            'price' => 45,
            'image_primary' => 'camiseta5.png',
            'image_secondary' => 'camiseta5_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 5, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 5, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 5, 'size' => 'S'],
            ['stock_quantity' => 11]
        );
        Inventory::updateOrCreate(
            ['product_id' => 5, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 5, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 5, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 6], [
            'category_id' => 1,
            'name' => 'Yate Rojo',
            'description' => 'Roja estilo Yate',
            'price' => 45,
            'image_primary' => 'camiseta6.png',
            'image_secondary' => 'camiseta6_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 6, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 6, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 6, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 6, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 6, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 6, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 7], [
            'category_id' => 1,
            'name' => 'Camiseta Global Soon Blanca',
            'description' => 'A veces, una sonrisa puede salvar vidas',
            'price' => 45,
            'image_primary' => 'camiseta7.png',
            'image_secondary' => 'camiseta7_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 7, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 7, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 7, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 7, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 7, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 7, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 8], [
            'category_id' => 1,
            'name' => 'Camiseta Global Soon Gris Oscuro',
            'description' => 'Gris oscura con estilo urbano',
            'price' => 45,
            'image_primary' => 'camiseta8.png',
            'image_secondary' => 'camiseta8_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 8, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 8, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 8, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 8, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 8, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 8, 'size' => 'XXL'],
            ['stock_quantity' => 3]
        );

        $product = Product::updateOrCreate(['id' => 9], [
            'category_id' => 1,
            'name' => 'Camiseta Swan Garden Blanca',
            'description' => 'Blanca con diseño floral de cisnes',
            'price' => 45,
            'image_primary' => 'camiseta9.png',
            'image_secondary' => 'camiseta9_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 9, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 9, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 9, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 9, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 9, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 9, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 10], [
            'category_id' => 1,
            'name' => 'Camiseta Swan Garden Verde',
            'description' => 'Verde con estampado floral de cisnes',
            'price' => 45,
            'image_primary' => 'camiseta10.png',
            'image_secondary' => 'camiseta10_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 10, 'size' => 'L'],
            ['stock_quantity' => 17]
        );
        Inventory::updateOrCreate(
            ['product_id' => 10, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 10, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 10, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 10, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 10, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 11], [
            'category_id' => 1,
            'name' => 'Camiseta Tennis Blanca',
            'description' => 'Blanca con diseño inspirado en el tenis',
            'price' => 45,
            'image_primary' => 'camiseta11.png',
            'image_secondary' => 'camiseta11_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 11, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 11, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 11, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 11, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 11, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 11, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 12], [
            'category_id' => 1,
            'name' => 'Camiseta Tennis Gris Oscuro',
            'description' => 'Gris oscura estilo tenis',
            'price' => 45,
            'image_primary' => 'camiseta12.png',
            'image_secondary' => 'camiseta12_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 12, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 12, 'size' => 'M'],
            ['stock_quantity' => 19]
        );
        Inventory::updateOrCreate(
            ['product_id' => 12, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 12, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 12, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 12, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 13], [
            'category_id' => 1,
            'name' => 'Camiseta Mushroom Amarilla',
            'description' => 'Amarilla con estampado de hongos',
            'price' => 45,
            'image_primary' => 'camiseta13.png',
            'image_secondary' => 'camiseta13_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 13, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 13, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 13, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 13, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 13, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 13, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 14], [
            'category_id' => 1,
            'name' => 'Camiseta Call Gris',
            'description' => 'Gris con diseño minimalista Call',
            'price' => 45,
            'image_primary' => 'camiseta14.png',
            'image_secondary' => 'camiseta14_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 14, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 14, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 14, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 14, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 14, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 14, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 15], [
            'category_id' => 1,
            'name' => 'Camiseta Cherry Bomb Beige',
            'description' => 'Beige con estampado Cherry Bomb',
            'price' => 45,
            'image_primary' => 'camiseta15.png',
            'image_secondary' => 'camiseta15_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 15, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 15, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 15, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 15, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 15, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 15, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 16], [
            'category_id' => 1,
            'name' => 'Camiseta Cult Kid Azul Marino',
            'description' => 'Azul marino estilo Cult Kid',
            'price' => 45,
            'image_primary' => 'camiseta16.png',
            'image_secondary' => 'camiseta16_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 16, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 16, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 16, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 16, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 16, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 16, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 17], [
            'category_id' => 1,
            'name' => 'Camiseta Time Azul',
            'description' => 'Azul con diseño moderno Time',
            'price' => 45,
            'image_primary' => 'camiseta17.png',
            'image_secondary' => 'camiseta17_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 17, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 17, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 17, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 17, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 17, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 17, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 18], [
            'category_id' => 1,
            'name' => 'Camiseta Cherry Blanca',
            'description' => 'Blanca con diseño Cherry',
            'price' => 45,
            'image_primary' => 'camiseta18.png',
            'image_secondary' => 'camiseta18_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 18, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 18, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 18, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 18, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 18, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 18, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 19], [
            'category_id' => 1,
            'name' => 'Camiseta Cherry Negra',
            'description' => 'Negra con diseño Cherry',
            'price' => 45,
            'image_primary' => 'camiseta19.png',
            'image_secondary' => 'camiseta19_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 19, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 19, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 19, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 19, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 19, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 19, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 20], [
            'category_id' => 1,
            'name' => 'Camiseta Virginity Blanca',
            'description' => 'Blanca con diseño artístico Virginity',
            'price' => 45,
            'image_primary' => 'camiseta20.png',
            'image_secondary' => 'camiseta20_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 20, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 20, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 20, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 20, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 20, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 20, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 21], [
            'category_id' => 1,
            'name' => 'Camiseta Hot Azul Marino',
            'description' => 'En caso de que necesites definir aura a tu padre.',
            'price' => 45,
            'image_primary' => 'camiseta22.png',
            'image_secondary' => 'camiseta22_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 21, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 21, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 21, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 21, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 21, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 21, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 22], [
            'category_id' => 1,
            'name' => 'Chateau Blanca Diseño',
            'description' => 'Blanca con diseño Chateau',
            'price' => 45,
            'image_primary' => 'camiseta23.png',
            'image_secondary' => 'camiseta23_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 22, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 22, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 22, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 22, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 22, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 22, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 23], [
            'category_id' => 1,
            'name' => 'Camiseta Love SD Roja',
            'description' => 'Gracias eternas a mi vieja tarjeta de memoria de la PS2, guardaste mi infancia.',
            'price' => 65,
            'image_primary' => 'camiseta24.png',
            'image_secondary' => 'camiseta24_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 23, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 23, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 23, 'size' => 'S'],
            ['stock_quantity' => 11]
        );
        Inventory::updateOrCreate(
            ['product_id' => 23, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 23, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 23, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 24], [
            'category_id' => 2,
            'name' => 'Love SD Hood Washed Marshmallow',
            'description' => 'Color marshmallow lavado con capucha Love SD',
            'price' => 90,
            'image_primary' => 'sudadera1.png',
            'image_secondary' => 'sudadera1_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 24, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 24, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 24, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 24, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 24, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 24, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 25], [
            'category_id' => 2,
            'name' => 'Love SD Hood Washed Navy',
            'description' => 'Azul marino lavado con capucha Love SD',
            'price' => 85,
            'image_primary' => 'sudadera2.png',
            'image_secondary' => 'sudadera2_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 25, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 25, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 25, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 25, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 25, 'size' => 'XS'],
            ['stock_quantity' => 6]
        );
        Inventory::updateOrCreate(
            ['product_id' => 25, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 26], [
            'category_id' => 2,
            'name' => 'Sudadera Cult Kid Gris Oscuro',
            'description' => 'Gris oscura estilo Cult Kid',
            'price' => 75,
            'image_primary' => 'sudadera3.png',
            'image_secondary' => 'sudadera3_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 26, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 26, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 26, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 26, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 26, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 26, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 27], [
            'category_id' => 2,
            'name' => 'Sudadera Cult Kid Blanco Crema',
            'description' => 'Blanco crema estilo Cult Kid',
            'price' => 75,
            'image_primary' => 'sudadera4.png',
            'image_secondary' => 'sudadera4_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 27, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 27, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 27, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 27, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 27, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 27, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 28], [
            'category_id' => 2,
            'name' => 'Sudadera Cult Kid Azul Piedra',
            'description' => 'Azul piedra estilo Cult Kid',
            'price' => 75,
            'image_primary' => 'sudadera5.png',
            'image_secondary' => 'sudadera5_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 28, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 28, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 28, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 28, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 28, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 28, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 29], [
            'category_id' => 2,
            'name' => 'Sudadera Con Cremallera Global Soon Hombre',
            'description' => 'Azul marino con cremallera Global Soon',
            'price' => 80,
            'image_primary' => 'sudadera6.png',
            'image_secondary' => 'sudadera6_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 29, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 29, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 29, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 29, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 29, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 29, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 30], [
            'category_id' => 2,
            'name' => 'Sudadera Cherry Bomb Blanco Crema',
            'description' => 'Blanco crema con diseño Cherry Bomb',
            'price' => 69,
            'image_primary' => 'sudadera7.png',
            'image_secondary' => 'sudadera7_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 30, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 30, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 30, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 30, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 30, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 30, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 31], [
            'category_id' => 2,
            'name' => 'Sudadera Cherry Bomb Rosa',
            'description' => 'Rosa con estampado Cherry Bomb',
            'price' => 69,
            'image_primary' => 'sudadera8.png',
            'image_secondary' => 'sudadera8_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 31, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 31, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 31, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 31, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 31, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 31, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 32], [
            'category_id' => 2,
            'name' => 'Sudadera Cherry Gris Oscuro',
            'description' => 'Gris oscura con diseño Cherry',
            'price' => 69,
            'image_primary' => 'sudadera9.png',
            'image_secondary' => 'sudadera9_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 32, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 32, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 32, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 32, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 32, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 32, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 33], [
            'category_id' => 2,
            'name' => 'Sudadera Cherry Blanco Crema',
            'description' => 'Blanco crema con diseño Cherry',
            'price' => 69,
            'image_primary' => 'sudadera10.png',
            'image_secondary' => 'sudadera10_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 33, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 33, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 33, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 33, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 33, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 33, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 34], [
            'category_id' => 2,
            'name' => 'Sudadera Seoul Gris',
            'description' => 'Gris con estilo urbano Seoul',
            'price' => 85,
            'image_primary' => 'sudadera11.png',
            'image_secondary' => 'sudadera11_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 34, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 34, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 34, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 34, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 34, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 34, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 35], [
            'category_id' => 2,
            'name' => 'Sudadera Seoul Negra',
            'description' => 'Negra con estilo urbano Seoul',
            'price' => 85,
            'image_primary' => 'sudadera12.png',
            'image_secondary' => 'sudadera12_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 35, 'size' => 'L'],
            ['stock_quantity' => 16]
        );
        Inventory::updateOrCreate(
            ['product_id' => 35, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 35, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 35, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 35, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 35, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 36], [
            'category_id' => 2,
            'name' => 'Sudadera Swans Gris',
            'description' => 'Gris con estampado de cisnes',
            'price' => 90,
            'image_primary' => 'sudadera13.png',
            'image_secondary' => 'sudadera13_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 36, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 36, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 36, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 36, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 36, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 36, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 37], [
            'category_id' => 2,
            'name' => 'Sudadera Swans Negra',
            'description' => 'Negra con estampado de cisnes',
            'price' => 90,
            'image_primary' => 'sudadera14.png',
            'image_secondary' => 'sudadera14_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 37, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 37, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 37, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 37, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 37, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 37, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 38], [
            'category_id' => 2,
            'name' => 'Sudadera Nude Tour Blanco Crema',
            'description' => 'Blanco crema edición Nude Tour',
            'price' => 85,
            'image_primary' => 'sudadera15.png',
            'image_secondary' => 'sudadera15_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 38, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 38, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 38, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 38, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 38, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 38, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 39], [
            'category_id' => 2,
            'name' => 'Sudadera Seoul Azul Cielo',
            'description' => 'Azul cielo con estilo Seoul',
            'price' => 80,
            'image_primary' => 'sudadera16.png',
            'image_secondary' => 'sudadera16_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 39, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 39, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 39, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 39, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 39, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 39, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 40], [
            'category_id' => 2,
            'name' => 'Sudadera Sculpture Azul Cielo',
            'description' => 'Azul cielo con diseño artístico Sculpture',
            'price' => 80,
            'image_primary' => 'sudadera17.png',
            'image_secondary' => 'sudadera17_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 40, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 40, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 40, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 40, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 40, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 40, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 41], [
            'category_id' => 2,
            'name' => 'Sudadera Origins Negra',
            'description' => 'Negra edición Origins',
            'price' => 69,
            'image_primary' => 'sudadera18.png',
            'image_secondary' => 'sudadera18_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 41, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 41, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 41, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 41, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 41, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 41, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 42], [
            'category_id' => 2,
            'name' => 'Sudadera Origins Blanco Crema',
            'description' => 'Blanco crema edición Origins',
            'price' => 69,
            'image_primary' => 'sudadera19.png',
            'image_secondary' => 'sudadera19_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 42, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 42, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 42, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 42, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 42, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 42, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 43], [
            'category_id' => 2,
            'name' => 'Sudadera Origins Azul Marino',
            'description' => 'Azul marino edición Origins',
            'price' => 69,
            'image_primary' => 'sudadera20.png',
            'image_secondary' => 'sudadera20_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 43, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 43, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 43, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 43, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 43, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 43, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 44], [
            'category_id' => 3,
            'name' => 'Sleepy Shirt Green',
            'description' => 'Polo verde de Sleepy Shirt',
            'price' => 32,
            'image_primary' => 'polo1.png',
            'image_secondary' => 'polo1_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 44, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 44, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 44, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 44, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 44, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 44, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 45], [
            'category_id' => 3,
            'name' => 'Sleepy Shirt Navy',
            'description' => 'Polo azul marino de Sleepy Shirt',
            'price' => 45,
            'image_primary' => 'polo2.png',
            'image_secondary' => 'polo2_1.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 45, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 45, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 45, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 45, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 45, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 45, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 46], [
            'category_id' => 3,
            'name' => 'Cloud Shirt Yellow',
            'description' => 'Polo amarillo de Cloud Shirt',
            'price' => 69,
            'image_primary' => 'polo3.png',
            'image_secondary' => 'polo3_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 46, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 46, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 46, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 46, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 46, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 46, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 47], [
            'category_id' => 3,
            'name' => 'Cloud Shirt Ivory',
            'description' => 'Polo blanco marfil de Cloud Shirt',
            'price' => 68,
            'image_primary' => 'polo4.png',
            'image_secondary' => 'polo4_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 47, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 47, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 47, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 47, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 47, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 47, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 48], [
            'category_id' => 3,
            'name' => 'Romeo Shirt White',
            'description' => 'Polo blanco de Romeo Shirt',
            'price' => 40,
            'image_primary' => 'polo5.png',
            'image_secondary' => 'polo5_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 48, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 48, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 48, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 48, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 48, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 48, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 49], [
            'category_id' => 3,
            'name' => 'Romeo Shirt Blue',
            'description' => 'Polo azul de Romeo Shirt',
            'price' => 50,
            'image_primary' => 'polo6.png',
            'image_secondary' => 'polo6_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 49, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 49, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 49, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 49, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 49, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 49, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 50], [
            'category_id' => 3,
            'name' => 'Julieta Hooded Shirt',
            'description' => 'Polo con capucha de Julieta',
            'price' => 67,
            'image_primary' => 'polo7.png',
            'image_secondary' => 'polo7_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 50, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 50, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 50, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 50, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 50, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 50, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 51], [
            'category_id' => 3,
            'name' => 'Loop Shirt',
            'description' => 'Polo diseño Loop',
            'price' => 79,
            'image_primary' => 'polo8.png',
            'image_secondary' => 'polo8_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 51, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 51, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 51, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 51, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 51, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 51, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 52], [
            'category_id' => 3,
            'name' => 'Marbella Waffle Shirt Navy',
            'description' => 'Polo navy de Marbella Waffle',
            'price' => 79,
            'image_primary' => 'polo9.png',
            'image_secondary' => 'polo9_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 52, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 52, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 52, 'size' => 'S'],
            ['stock_quantity' => 11]
        );
        Inventory::updateOrCreate(
            ['product_id' => 52, 'size' => 'XL'],
            ['stock_quantity' => 9]
        );
        Inventory::updateOrCreate(
            ['product_id' => 52, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 52, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 53], [
            'category_id' => 3,
            'name' => 'Marbella Waffle Shirt Off-White',
            'description' => 'Polo blanco de Marbella Waffle',
            'price' => 70,
            'image_primary' => 'polo10.png',
            'image_secondary' => 'polo10_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 53, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 53, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 53, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 53, 'size' => 'XL'],
            ['stock_quantity' => 4]
        );
        Inventory::updateOrCreate(
            ['product_id' => 53, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 53, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 54], [
            'category_id' => 3,
            'name' => 'Camisa Romantica Marrón',
            'description' => 'Polo marrón estilo romántico',
            'price' => 68,
            'image_primary' => 'polo11.png',
            'image_secondary' => 'polo11_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 54, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 54, 'size' => 'M'],
            ['stock_quantity' => 19]
        );
        Inventory::updateOrCreate(
            ['product_id' => 54, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 54, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 54, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 54, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 55], [
            'category_id' => 3,
            'name' => 'Camisa Romantica Blanco Crema',
            'description' => 'Polo blanco crema estilo romántico',
            'price' => 79,
            'image_primary' => 'polo12.png',
            'image_secondary' => 'polo12_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 55, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 55, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 55, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 55, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 55, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 55, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 56], [
            'category_id' => 4,
            'name' => 'Pantalón Corto Denim Lace',
            'description' => 'Corto con encaje estilo denim',
            'price' => 50,
            'image_primary' => 'pan1.png',
            'image_secondary' => 'pan1_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 56, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 56, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 56, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 56, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 56, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 56, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 57], [
            'category_id' => 4,
            'name' => 'Pantalón Corto Denim Shorts',
            'description' => 'Corto vaquero clásico',
            'price' => 50,
            'image_primary' => 'pan2.png',
            'image_secondary' => 'pan2_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 57, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 57, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 57, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 57, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 57, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 57, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 58], [
            'category_id' => 4,
            'name' => 'Pantalón Corto Denim Flowers',
            'description' => 'Corto con flores en denim',
            'price' => 60,
            'image_primary' => 'pan3.png',
            'image_secondary' => 'pan3_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 58, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 58, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 58, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 58, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 58, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 58, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 59], [
            'category_id' => 4,
            'name' => 'Pantalón Corto Apple Crew Denim Raw',
            'description' => 'Edición Apple Crew sin tratar',
            'price' => 50,
            'image_primary' => 'pan4.png',
            'image_secondary' => 'pan4_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 59, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 59, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 59, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 59, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 59, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 59, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 60], [
            'category_id' => 4,
            'name' => 'Pantalón Corto Basic Denim Negro',
            'description' => 'Corto negro básico denim',
            'price' => 50,
            'image_primary' => 'pan5.png',
            'image_secondary' => 'pan5_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 60, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 60, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 60, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 60, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 60, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 60, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 61], [
            'category_id' => 4,
            'name' => 'Pantalón Corto Basic Denim Arena',
            'description' => 'Corto color arena básico denim',
            'price' => 50,
            'image_primary' => 'pan6.png',
            'image_secondary' => 'pan6_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 61, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 61, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 61, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 61, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 61, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 61, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 62], [
            'category_id' => 4,
            'name' => 'Pantalón Corto Basic Denim Azul',
            'description' => 'Corto azul básico denim',
            'price' => 50,
            'image_primary' => 'pan7.png',
            'image_secondary' => 'pan7_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 62, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 62, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 62, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 62, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 62, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 62, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 63], [
            'category_id' => 4,
            'name' => 'Basic Jeans Raw Indigo',
            'description' => 'Vaquero indigo sin tratar',
            'price' => 79,
            'image_primary' => 'pan8.png',
            'image_secondary' => 'pan8_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 63, 'size' => 'L'],
            ['stock_quantity' => 30]
        );
        Inventory::updateOrCreate(
            ['product_id' => 63, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 63, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 63, 'size' => 'XL'],
            ['stock_quantity' => 13]
        );
        Inventory::updateOrCreate(
            ['product_id' => 63, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 63, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 64], [
            'category_id' => 4,
            'name' => 'Pantalón Vaquero Básico Azul',
            'description' => 'Vaquero clásico azul',
            'price' => 89,
            'image_primary' => 'pan9.png',
            'image_secondary' => 'pan9_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 64, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 64, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 64, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 64, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 64, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 64, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 65], [
            'category_id' => 4,
            'name' => 'Pantalón Vaquero Verde Washed',
            'description' => 'Vaquero verde lavado',
            'price' => 89,
            'image_primary' => 'pan10.png',
            'image_secondary' => 'pan10_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 65, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 65, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 65, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 65, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 65, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 65, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 66], [
            'category_id' => 4,
            'name' => 'Pantalón Vaquero Básico Negro',
            'description' => 'Vaquero negro clásico',
            'price' => 89,
            'image_primary' => 'pan11.png',
            'image_secondary' => 'pan11_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 66, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 66, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 66, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 66, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 66, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 66, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 67], [
            'category_id' => 4,
            'name' => 'Pantalón Baggy Azul Old',
            'description' => 'Estilo baggy azul retro',
            'price' => 89,
            'image_primary' => 'pan13.png',
            'image_secondary' => 'pan13_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 67, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 67, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 67, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 67, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 67, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 67, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 68], [
            'category_id' => 4,
            'name' => 'Pantalón Vaquero Heart',
            'description' => 'Vaquero con diseño de corazón',
            'price' => 89,
            'image_primary' => 'pan14.png',
            'image_secondary' => 'pan14_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 68, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 68, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 68, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 68, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 68, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 68, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 69], [
            'category_id' => 4,
            'name' => 'Pantalón Soft Velvet',
            'description' => 'Terciopelo suave en estilo moderno',
            'price' => 89,
            'image_primary' => 'pan15.png',
            'image_secondary' => 'pan15_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 69, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 69, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 69, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 69, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 69, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 69, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 70], [
            'category_id' => 5,
            'name' => 'Iconic Puffer Jacket Black',
            'description' => 'Iconic Puffer Jacket Black',
            'price' => 100,
            'image_primary' => 'abri1.png',
            'image_secondary' => 'abri1_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 70, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 70, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 70, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 70, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 70, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 70, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 71], [
            'category_id' => 5,
            'name' => 'Iconic Puffer Jacket Olive Green',
            'description' => 'Iconic Puffer Jacket Olive Green',
            'price' => 100,
            'image_primary' => 'abri2.png',
            'image_secondary' => 'abri2_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 71, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 71, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 71, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 71, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 71, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 71, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 72], [
            'category_id' => 5,
            'name' => 'Iconic Puffer Jacket Burgundy',
            'description' => 'Iconic Puffer Jacket Burgundy',
            'price' => 100,
            'image_primary' => 'abri3.png',
            'image_secondary' => 'abri3_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 72, 'size' => 'L'],
            ['stock_quantity' => 17]
        );
        Inventory::updateOrCreate(
            ['product_id' => 72, 'size' => 'M'],
            ['stock_quantity' => 19]
        );
        Inventory::updateOrCreate(
            ['product_id' => 72, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 72, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 72, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 72, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 73], [
            'category_id' => 6,
            'name' => 'Sudadera con Cremallera Global Soon Mujer',
            'description' => 'Diseño waffle con cremallera, tono gris moderno',
            'price' => 79,
            'image_primary' => 'suda1.png',
            'image_secondary' => 'suda1_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 73, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 73, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 73, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 73, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 73, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 73, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 74], [
            'category_id' => 6,
            'name' => 'Sudadera con Cremallera Global Soon Waffle Verde',
            'description' => 'Estilo urbano verde con textura waffle',
            'price' => 79,
            'image_primary' => 'suda2.png',
            'image_secondary' => 'suda2_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 74, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 74, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 74, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 74, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 74, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 74, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 75], [
            'category_id' => 6,
            'name' => 'Sudadera Hot Gris',
            'description' => 'Corte relajado con estampado Hot en gris',
            'price' => 69,
            'image_primary' => 'suda3.png',
            'image_secondary' => 'suda3_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 75, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 75, 'size' => 'M'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 75, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 75, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 75, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 75, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 76], [
            'category_id' => 6,
            'name' => 'Sudadera Hot Verde',
            'description' => 'Estampado Hot en tono verde vibrante',
            'price' => 69,
            'image_primary' => 'suda4.png',
            'image_secondary' => 'suda4_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 76, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 76, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 76, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 76, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 76, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 76, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 77], [
            'category_id' => 6,
            'name' => 'Love SD Hood Washed Marshmallow Mujer',
            'description' => 'Capucha suave estilo marshmallow lavado',
            'price' => 79,
            'image_primary' => 'suda5.png',
            'image_secondary' => 'suda5_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 77, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 77, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 77, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 77, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 77, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 77, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 78], [
            'category_id' => 6,
            'name' => 'Love SD Hood Washed Navy Mujer',
            'description' => 'Sudadera con capucha azul navy lavado',
            'price' => 79,
            'image_primary' => 'suda6.png',
            'image_secondary' => 'suda6_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 78, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 78, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 78, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 78, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 78, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 78, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 79], [
            'category_id' => 6,
            'name' => 'Sudadera Cropped Varsity Rosa',
            'description' => 'Corte cropped con estilo varsity rosa',
            'price' => 69,
            'image_primary' => 'suda9.png',
            'image_secondary' => 'suda9_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 79, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 79, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 79, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 79, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 79, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 79, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 80], [
            'category_id' => 6,
            'name' => 'Sudadera Cropped Varsity Azul Marino',
            'description' => 'Sudadera varsity azul con corte corto',
            'price' => 69,
            'image_primary' => 'suda10.png',
            'image_secondary' => 'suda10_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 80, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 80, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 80, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 80, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 80, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 80, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 81], [
            'category_id' => 6,
            'name' => 'Sudadera Typa Day Blanco Crema',
            'description' => 'Diseño relajado blanco crema, ideal para el día',
            'price' => 79,
            'image_primary' => 'suda11.png',
            'image_secondary' => 'suda11_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 81, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 81, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 81, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 81, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 81, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 81, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 82], [
            'category_id' => 6,
            'name' => 'Sudadera Typa Day Gris Oscuro',
            'description' => 'Estilo moderno gris oscuro para el día a día',
            'price' => 79,
            'image_primary' => 'suda12.png',
            'image_secondary' => 'suda12_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 82, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 82, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 82, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 82, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 82, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 82, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 83], [
            'category_id' => 6,
            'name' => 'Sudadera Cult Kid Gris Oscuro Mujer',
            'description' => 'Gris oscuro con aire rebelde Cult Kid',
            'price' => 79,
            'image_primary' => 'suda13.png',
            'image_secondary' => 'suda13_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 83, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 83, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 83, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 83, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 83, 'size' => 'XS'],
            ['stock_quantity' => 6]
        );
        Inventory::updateOrCreate(
            ['product_id' => 83, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 84], [
            'category_id' => 6,
            'name' => 'Sudadera Cult Kid Blanco Crema Mujer',
            'description' => 'Toque elegante blanco crema estilo Cult Kid',
            'price' => 79,
            'image_primary' => 'suda14.png',
            'image_secondary' => 'suda14_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 84, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 84, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 84, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 84, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 84, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 84, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 85], [
            'category_id' => 6,
            'name' => 'Sudadera Cult Kid Azul Piedra Mujer',
            'description' => 'Sudadera azul piedra con esencia alternativa',
            'price' => 79,
            'image_primary' => 'suda15.png',
            'image_secondary' => 'suda15_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 85, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 85, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 85, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 85, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 85, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 85, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 86], [
            'category_id' => 6,
            'name' => 'Sudadera Con Cremallera Global Soon Mujer Azul',
            'description' => 'Cremallera completa azul marino urbana',
            'price' => 89,
            'image_primary' => 'suda16.png',
            'image_secondary' => 'suda16_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 86, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 86, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 86, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 86, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 86, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 86, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 87], [
            'category_id' => 6,
            'name' => 'Sudadera Nude Tour Negra',
            'description' => 'Negra con diseño exclusivo Nude Tour',
            'price' => 79,
            'image_primary' => 'suda17.png',
            'image_secondary' => 'suda17_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 87, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 87, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 87, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 87, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 87, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 87, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 88], [
            'category_id' => 6,
            'name' => 'Sudadera Seoul Gris Oscuro Mujer',
            'description' => 'Inspirada en el streetwear de Seúl',
            'price' => 79,
            'image_primary' => 'suda18.png',
            'image_secondary' => 'suda18_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 88, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 88, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 88, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 88, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 88, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 88, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 89], [
            'category_id' => 6,
            'name' => 'Sudadera Seoul Azul Cielo Mujer',
            'description' => 'Diseño moderno en azul cielo de Seúl',
            'price' => 79,
            'image_primary' => 'suda19.png',
            'image_secondary' => 'suda19_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 89, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 89, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 89, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 89, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 89, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 89, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 90], [
            'category_id' => 6,
            'name' => 'Sudadera Con Cremallera Kill Bill Lila',
            'description' => 'Estilo lila con inspiración en Kill Bill',
            'price' => 99,
            'image_primary' => 'suda20.png',
            'image_secondary' => 'suda20_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 90, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 90, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 90, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 90, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 90, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 90, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 91], [
            'category_id' => 7,
            'name' => 'Vaqueros Raw Capicci Indigo',
            'description' => 'Vaqueros de estilo clásico en tono índigo con acabado raw',
            'price' => 69,
            'image_primary' => 'p1.png',
            'image_secondary' => 'p1_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 91, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 91, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 91, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 91, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 91, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 91, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 92], [
            'category_id' => 7,
            'name' => 'Vaqueros Silver Capicci Azul',
            'description' => 'Vaqueros azul lavado con detalles plateados modernos',
            'price' => 79,
            'image_primary' => 'p2.png',
            'image_secondary' => 'p2_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 92, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 92, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 92, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 92, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 92, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 92, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 93], [
            'category_id' => 7,
            'name' => 'Pantalón Vaquero Azul Illegal',
            'description' => 'Diseño urbano en denim azul con acabado desgastado',
            'price' => 89,
            'image_primary' => 'p3.png',
            'image_secondary' => 'p3_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 93, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 93, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 93, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 93, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 93, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 93, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 94], [
            'category_id' => 7,
            'name' => 'Pantalón Vaquero Ash Illegal',
            'description' => 'Vaquero gris ceniza estilo streetwear con corte recto',
            'price' => 89,
            'image_primary' => 'p4.png',
            'image_secondary' => 'p4_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 94, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 94, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 94, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 94, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 94, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 94, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 95], [
            'category_id' => 7,
            'name' => 'Pantalón Corto Denim Lace Mujer',
            'description' => 'Short vaquero con detalles de encaje para un look romántico',
            'price' => 79,
            'image_primary' => 'p5.png',
            'image_secondary' => 'p5_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 95, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 95, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 95, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 95, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 95, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 95, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 96], [
            'category_id' => 7,
            'name' => 'Pantalón Corto Denim Shorts Mujer',
            'description' => 'Short clásico de mezclilla para outfits casuales',
            'price' => 79,
            'image_primary' => 'p6.png',
            'image_secondary' => 'p6_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 96, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 96, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 96, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 96, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 96, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 96, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 97], [
            'category_id' => 7,
            'name' => 'Pantalón Corto Denim Flowers Mujer',
            'description' => 'Short vaquero con estampado floral delicado',
            'price' => 79,
            'image_primary' => 'p7.png',
            'image_secondary' => 'p7_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 97, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 97, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 97, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 97, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 97, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 97, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 98], [
            'category_id' => 7,
            'name' => 'Pantalón Corto Apple Crew Denim Raw Mujer',
            'description' => 'Short denim sin tratar con estilo relajado Apple Crew',
            'price' => 69,
            'image_primary' => 'p8.png',
            'image_secondary' => 'p8_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 98, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 98, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 98, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 98, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 98, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 98, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 99], [
            'category_id' => 7,
            'name' => 'Pantalón Vaquero Bootcut Elvis',
            'description' => 'Vaquero bootcut inspirado en el estilo retro de Elvis',
            'price' => 89,
            'image_primary' => 'p9.png',
            'image_secondary' => 'p9_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 99, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 99, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 99, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 99, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 99, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 99, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 100], [
            'category_id' => 7,
            'name' => 'Pantalón Vaquero 90\'S Baby',
            'description' => 'Diseño baggy con aire noventero y corte suelto',
            'price' => 89,
            'image_primary' => 'p10.png',
            'image_secondary' => 'p10_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 100, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 100, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 100, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 100, 'size' => 'XL'],
            ['stock_quantity' => 190]
        );
        Inventory::updateOrCreate(
            ['product_id' => 100, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 100, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 101], [
            'category_id' => 7,
            'name' => 'Pantalón Soft Velvet Mujer',
            'description' => 'Pantalón de terciopelo suave para un look elegante y cómodo',
            'price' => 90,
            'image_primary' => 'p11.png',
            'image_secondary' => 'p11_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 101, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 101, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 101, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 101, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 101, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 101, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 102], [
            'category_id' => 7,
            'name' => 'Pantalón Baggy Azul Old Mujer',
            'description' => 'Pantalón baggy azul envejecido con estilo retro',
            'price' => 89,
            'image_primary' => 'p12.png',
            'image_secondary' => 'p12_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 102, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 102, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 102, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 102, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 102, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 102, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 103], [
            'category_id' => 7,
            'name' => 'Pantalón Baggy Sand Wash Old',
            'description' => 'Vaquero con lavado arena en corte baggy vintage',
            'price' => 89,
            'image_primary' => 'p13.png',
            'image_secondary' => 'p13_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 103, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 103, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 103, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 103, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 103, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 103, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 104], [
            'category_id' => 7,
            'name' => 'Pantalón Baggy Negro Old Mujer',
            'description' => 'Negro envejecido con corte ancho tipo old-school',
            'price' => 89,
            'image_primary' => 'p14.png',
            'image_secondary' => 'p14_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 104, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 104, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 104, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 104, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 104, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 104, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 105], [
            'category_id' => 7,
            'name' => 'Pantalón Corto Baggy Negro Old Denim',
            'description' => 'Short estilo baggy en denim negro clásico',
            'price' => 89,
            'image_primary' => 'p15.png',
            'image_secondary' => 'p15_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 105, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 105, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 105, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 105, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 105, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 105, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 106], [
            'category_id' => 7,
            'name' => 'Pantalón Vaquero La Star',
            'description' => 'Vaquero clásico con diseño \'La Star\' en pierna',
            'price' => 99,
            'image_primary' => 'p16.png',
            'image_secondary' => 'p16_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 106, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 106, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 106, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 106, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 106, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 106, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 107], [
            'category_id' => 7,
            'name' => 'Pantalón Vaquero Heart Mujer',
            'description' => 'Diseño con detalles de corazones, estilo romántico',
            'price' => 69,
            'image_primary' => 'p17.png',
            'image_secondary' => 'p17_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 107, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 107, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 107, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 107, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 107, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 107, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 108], [
            'category_id' => 7,
            'name' => 'Pantalón Bootcut Rojo Mujer',
            'description' => 'Vaquero rojo vibrante en corte bootcut',
            'price' => 89,
            'image_primary' => 'p18.png',
            'image_secondary' => 'p18_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 108, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 108, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 108, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 108, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 108, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 108, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 109], [
            'category_id' => 7,
            'name' => 'Pantalón Bootcut Amarillo Mujer',
            'description' => 'Color amarillo brillante en diseño bootcut moderno',
            'price' => 89,
            'image_primary' => 'p19.png',
            'image_secondary' => 'p19_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 109, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 109, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 109, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 109, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 109, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 109, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 110], [
            'category_id' => 7,
            'name' => 'Pantalón Bootcut Verde Mujer',
            'description' => 'Pantalón verde intenso en corte clásico bootcut',
            'price' => 89,
            'image_primary' => 'p20.png',
            'image_secondary' => 'p20_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 110, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 110, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 110, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 110, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 110, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 110, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 111], [
            'category_id' => 8,
            'name' => 'Vizcaya Football Polo Knit Grey',
            'description' => 'Jersey tipo polo en color gris con inspiración deportiva, ideal para looks relajados.',
            'price' => 89,
            'image_primary' => 'punto1.png',
            'image_secondary' => 'punto1_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 111, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 111, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 111, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 111, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 111, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 111, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 112], [
            'category_id' => 8,
            'name' => 'Vizcaya Football Polo Knit Navy Blue',
            'description' => 'Polo de punto azul marino con estilo varsity, perfecto para entretiempo.',
            'price' => 89,
            'image_primary' => 'punto2.png',
            'image_secondary' => 'punto2_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 112, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 112, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 112, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 112, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 112, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 112, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 113], [
            'category_id' => 8,
            'name' => 'Sudadera Con Capucha Papaya Blanco Crema',
            'description' => 'Sudadera suave y oversize con capucha y tono blanco crema elegante.',
            'price' => 89,
            'image_primary' => 'punto3.png',
            'image_secondary' => 'punto3_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 113, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 113, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 113, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 113, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 113, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 113, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 114], [
            'category_id' => 8,
            'name' => 'Chateau Knit',
            'description' => 'Jersey fino con textura sofisticada y diseño moderno, estilo Chateau.',
            'price' => 89,
            'image_primary' => 'punto4.png',
            'image_secondary' => 'punto4_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 114, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 114, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 114, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 114, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 114, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 114, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 115], [
            'category_id' => 8,
            'name' => 'Jersey Cerise Azul Marino',
            'description' => 'Jersey en azul marino con bordados delicados y cuello redondo clásico.',
            'price' => 79,
            'image_primary' => 'punto5.png',
            'image_secondary' => 'punto5_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 115, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 115, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 115, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 115, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 115, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 115, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 116], [
            'category_id' => 8,
            'name' => 'Jersey Cerise Blanco Crema',
            'description' => 'Jersey blanco crema suave al tacto con detalles minimalistas.',
            'price' => 89,
            'image_primary' => 'punto6.png',
            'image_secondary' => 'punto6_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 116, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 116, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 116, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 116, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 116, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 116, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 117], [
            'category_id' => 8,
            'name' => 'Liqueza Knit Ecru',
            'description' => 'Tejido ecru con textura ligera y acabado premium.',
            'price' => 89,
            'image_primary' => 'punto7.png',
            'image_secondary' => 'punto7_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 117, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 117, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 117, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 117, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 117, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 117, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 118], [
            'category_id' => 8,
            'name' => 'Liqueza Knit Black',
            'description' => 'Jersey negro versátil de punto con diseño atemporal.',
            'price' => 89,
            'image_primary' => 'punto8.png',
            'image_secondary' => 'punto8_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 118, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 118, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 118, 'size' => 'S'],
            ['stock_quantity' => 11]
        );
        Inventory::updateOrCreate(
            ['product_id' => 118, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 118, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 118, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 119], [
            'category_id' => 8,
            'name' => 'Reversed Seams Knit Blue',
            'description' => 'Diseño moderno con costuras a la vista en color azul eléctrico.',
            'price' => 69,
            'image_primary' => 'punto9.png',
            'image_secondary' => 'punto9_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 119, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 119, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 119, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 119, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 119, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 119, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 120], [
            'category_id' => 8,
            'name' => 'Reversed Seams Knit Brown',
            'description' => 'Jersey marrón con acabados invertidos para un estilo disruptivo.',
            'price' => 69,
            'image_primary' => 'punto10.png',
            'image_secondary' => 'punto10_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 120, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 120, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 120, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 120, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 120, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 120, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 121], [
            'category_id' => 8,
            'name' => 'Jersey Cutie Apple Vest Azul',
            'description' => 'Chaleco azul con estampado de manzana, ideal para superponer outfits.',
            'price' => 79,
            'image_primary' => 'punto11.png',
            'image_secondary' => 'punto11_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 121, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 121, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 121, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 121, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 121, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 121, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 122], [
            'category_id' => 8,
            'name' => 'Jersey Jonion Gris',
            'description' => 'Jersey gris cálido con tejido grueso y diseño urbano.',
            'price' => 99,
            'image_primary' => 'punto12.png',
            'image_secondary' => 'punto12_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 122, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 122, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 122, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 122, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 122, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 122, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 123], [
            'category_id' => 8,
            'name' => 'Jersey Jonion Beige',
            'description' => 'Versión beige del jersey Jonion, suave y con caída elegante.',
            'price' => 99,
            'image_primary' => 'punto13.png',
            'image_secondary' => 'punto13_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 123, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 123, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 123, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 123, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 123, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 123, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 124], [
            'category_id' => 8,
            'name' => 'Jersey Jonion Rosa',
            'description' => 'Jersey rosa pastel con toque romántico y fit relajado.',
            'price' => 99,
            'image_primary' => 'punto14.png',
            'image_secondary' => 'punto14_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 124, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 124, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 124, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 124, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 124, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 124, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 125], [
            'category_id' => 8,
            'name' => 'Jersey Quarter Zip Teteo Azul',
            'description' => 'Jersey azul con cremallera al pecho, estilo deportivo sofisticado.',
            'price' => 99,
            'image_primary' => 'punto15.png',
            'image_secondary' => 'punto15_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 125, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 125, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 125, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 125, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 125, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 125, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 126], [
            'category_id' => 8,
            'name' => 'Jersey Sour Azul',
            'description' => 'Diseño básico azul con detalles juveniles y textura suave.',
            'price' => 79,
            'image_primary' => 'punto16.png',
            'image_secondary' => 'punto16_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 126, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 126, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 126, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 126, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 126, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 126, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 127], [
            'category_id' => 8,
            'name' => 'Jersey Sour Rosa',
            'description' => 'Color rosa empolvado con corte relajado y costuras visibles.',
            'price' => 79,
            'image_primary' => 'punto17.png',
            'image_secondary' => 'punto17_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 127, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 127, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 127, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 127, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 127, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 127, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 128], [
            'category_id' => 8,
            'name' => 'Jersey Con Cremallera First Class Gris Oscuro',
            'description' => 'Jersey gris oscuro con cremallera completa, elegante y funcional.',
            'price' => 79,
            'image_primary' => 'punto18.png',
            'image_secondary' => 'punto18_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 128, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 128, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 128, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 128, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 128, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 128, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 129], [
            'category_id' => 10,
            'name' => 'Chaqueta Vaquera Trucker Washed Dark',
            'description' => 'Estilo clásico en lavado oscuro con un toque urbano.',
            'price' => 100,
            'image_primary' => 'ab1.png',
            'image_secondary' => 'ab1_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 129, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 129, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 129, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 129, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 129, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 129, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 130], [
            'category_id' => 10,
            'name' => 'Chaqueta Vaquera Trucker Washed Light',
            'description' => 'Estilo relajado y fresco en denim claro para el día a día.',
            'price' => 90,
            'image_primary' => 'ab2.png',
            'image_secondary' => 'ab2_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 130, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 130, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 130, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 130, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 130, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 130, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 131], [
            'category_id' => 10,
            'name' => 'The Leather Jacket Marrón',
            'description' => 'Chaqueta de cuero marrón para un look elegante y atemporal.',
            'price' => 89,
            'image_primary' => 'ab3.png',
            'image_secondary' => 'ab3_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 131, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 131, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 131, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 131, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 131, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 131, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 132], [
            'category_id' => 10,
            'name' => 'Chaqueta Tapiz',
            'description' => 'Diseño artístico y exclusivo con textura tipo tapiz.',
            'price' => 120,
            'image_primary' => 'ab4.png',
            'image_secondary' => 'ab4_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 132, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 132, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 132, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 132, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 132, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 132, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 133], [
            'category_id' => 10,
            'name' => 'Chaqueta Boucle Trucker',
            'description' => 'Boucle suave con corte trucker que combina confort y estilo.',
            'price' => 69,
            'image_primary' => 'ab5.png',
            'image_secondary' => 'ab5_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 133, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 133, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 133, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 133, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 133, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 133, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 134], [
            'category_id' => 10,
            'name' => 'Chaqueta Flap Twill Azul Marino',
            'description' => 'Twill de alta calidad con solapas amplias y color marino.',
            'price' => 110,
            'image_primary' => 'ab6.png',
            'image_secondary' => 'ab6_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 134, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 134, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 134, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 134, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 134, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 134, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 135], [
            'category_id' => 10,
            'name' => 'World Cup Leather Bomber Jacket',
            'description' => 'Chaqueta bomber de cuero con inspiración deportiva y vintage.',
            'price' => 105,
            'image_primary' => 'ab7.png',
            'image_secondary' => 'ab7_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 135, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 135, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 135, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 135, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 135, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 135, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 136], [
            'category_id' => 10,
            'name' => 'Chaqueta Sweetbreaker Azul Claro',
            'description' => 'Rompevientos moderno en azul claro para un estilo casual.',
            'price' => 99,
            'image_primary' => 'ab8.png',
            'image_secondary' => 'ab8_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 136, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 136, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 136, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 136, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 136, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 136, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 137], [
            'category_id' => 10,
            'name' => 'Heavy Canvas Trucker Jacket Khak',
            'description' => 'Chaqueta trucker en canvas pesado con color khaki resistente.',
            'price' => 115,
            'image_primary' => 'ab9.png',
            'image_secondary' => 'ab9_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 137, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 137, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 137, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 137, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 137, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 137, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 138], [
            'category_id' => 10,
            'name' => 'Heavy Canvas Trucker Jacket Offwhite',
            'description' => 'Chaqueta en canvas offwhite robusta con estilo urbano.',
            'price' => 89,
            'image_primary' => 'ab10.png',
            'image_secondary' => 'ab10_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 138, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 138, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 138, 'size' => 'S'],
            ['stock_quantity' => 6]
        );
        Inventory::updateOrCreate(
            ['product_id' => 138, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 138, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 138, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 139], [
            'category_id' => 11,
            'name' => 'Camiseta gráfico sardinas',
            'description' => 'Camiseta blanca con ilustración de sardinas, diseño original y veraniego',
            'price' => 45,
            'image_primary' => 'c1.png',
            'image_secondary' => 'c1_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 139, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 139, 'size' => 'M'],
            ['stock_quantity' => 0]
        );
        Inventory::updateOrCreate(
            ['product_id' => 139, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 139, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 139, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 139, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 140], [
            'category_id' => 11,
            'name' => 'Sudadera manga corta raglán',
            'description' => 'Estilo urbano con manga corta tipo sudadera, ideal para entretiempo',
            'price' => 49,
            'image_primary' => 'c2.png',
            'image_secondary' => 'c2_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 140, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 140, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 140, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 140, 'size' => 'XL'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 140, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 140, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 141], [
            'category_id' => 11,
            'name' => 'Camiseta gráfico frutas Tropical',
            'description' => 'Diseño colorido con frutas tropicales, perfecta para el verano',
            'price' => 42,
            'image_primary' => 'c3.png',
            'image_secondary' => 'c3_4.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 141, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 141, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 141, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 141, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 141, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 141, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 142], [
            'category_id' => 11,
            'name' => 'Camiseta gráfico frutas Pastel',
            'description' => 'Versión alternativa con ilustraciones más suaves y tonos pastel',
            'price' => 42,
            'image_primary' => 'c4.png',
            'image_secondary' => 'c4_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 142, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 142, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 142, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 142, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 142, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 142, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 143], [
            'category_id' => 11,
            'name' => 'Camiseta Rolling Stones',
            'description' => 'Camiseta clásica con el logotipo icónico de los Rolling Stones',
            'price' => 48,
            'image_primary' => 'c5.png',
            'image_secondary' => 'c5_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 143, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 143, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 143, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 143, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 143, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 143, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 144], [
            'category_id' => 11,
            'name' => 'Camiseta bordado cerezas',
            'description' => 'Camiseta con pequeño bordado de cerezas, minimalista y dulce',
            'price' => 44,
            'image_primary' => 'c6.png',
            'image_secondary' => 'c6_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 144, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 144, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 144, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 144, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 144, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 144, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 145], [
            'category_id' => 11,
            'name' => 'Camiseta Bob Marley corazón',
            'description' => 'Diseño con retrato de Bob Marley y corazón de colores vivos',
            'price' => 47,
            'image_primary' => 'c7.png',
            'image_secondary' => 'c7_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 145, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 145, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 145, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 145, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 145, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 145, 'size' => 'XXL'],
            ['stock_quantity' => 1]
        );

        $product = Product::updateOrCreate(['id' => 146], [
            'category_id' => 11,
            'name' => 'Camiseta osos',
            'description' => 'Ilustración tierna de ositos en tonos suaves, ideal para looks casual',
            'price' => 43,
            'image_primary' => 'c8.png',
            'image_secondary' => 'c8_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 146, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 146, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 146, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 146, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 146, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 146, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 147], [
            'category_id' => 11,
            'name' => 'Camiseta gráfico gallina',
            'description' => 'Diseño divertido con gallina ilustrada en el centro',
            'price' => 41,
            'image_primary' => 'c9.png',
            'image_secondary' => 'c9_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 147, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 147, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 147, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 147, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 147, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 147, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 148], [
            'category_id' => 11,
            'name' => 'Camiseta gráfico naranjas',
            'description' => 'Diseño cítrico con naranjas frescas, estilo fresco y natural',
            'price' => 45,
            'image_primary' => 'c10.png',
            'image_secondary' => 'c10_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 148, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 148, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 148, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 148, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 148, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 148, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 149], [
            'category_id' => 11,
            'name' => 'Camiseta gráfico flor',
            'description' => 'Camiseta con flor central en tonos rosados y verdes',
            'price' => 43,
            'image_primary' => 'c11.png',
            'image_secondary' => 'c11_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 149, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 149, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 149, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 149, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 149, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 149, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 150], [
            'category_id' => 11,
            'name' => 'Camiseta Billie Eilish',
            'description' => 'Diseño inspirado en la artista Billie Eilish con fondo oscuro',
            'price' => 49,
            'image_primary' => 'c12.png',
            'image_secondary' => 'c12_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 150, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 150, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 150, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 150, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 150, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 150, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 151], [
            'category_id' => 11,
            'name' => 'Camiseta gráfico cóctel',
            'description' => 'Camiseta divertida con dibujo de cóctel tropical',
            'price' => 42,
            'image_primary' => 'c13.png',
            'image_secondary' => 'c13_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 151, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 151, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 151, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 151, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 151, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 151, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 152], [
            'category_id' => 11,
            'name' => 'Camiseta blanca Snoopy',
            'description' => 'Diseño clásico con Snoopy en el pecho',
            'price' => 46,
            'image_primary' => 'c14.png',
            'image_secondary' => 'c14_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 152, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 152, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 152, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 152, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 152, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 152, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 153], [
            'category_id' => 11,
            'name' => 'Camiseta violeta Mickey Mouse',
            'description' => 'Camiseta violeta con ilustración de Mickey Mouse',
            'price' => 47,
            'image_primary' => 'c15.png',
            'image_secondary' => 'c15_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 153, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 153, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 153, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 153, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 153, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 153, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $product = Product::updateOrCreate(['id' => 154], [
            'category_id' => 11,
            'name' => 'Camiseta \'Run & Brunch\'',
            'description' => 'Diseño moderno para amantes del running y el brunch',
            'price' => 45,
            'image_primary' => 'c16.png',
            'image_secondary' => 'c16_2.png',
        ]);
        Inventory::updateOrCreate(
            ['product_id' => 154, 'size' => 'L'],
            ['stock_quantity' => 18]
        );
        Inventory::updateOrCreate(
            ['product_id' => 154, 'size' => 'M'],
            ['stock_quantity' => 20]
        );
        Inventory::updateOrCreate(
            ['product_id' => 154, 'size' => 'S'],
            ['stock_quantity' => 12]
        );
        Inventory::updateOrCreate(
            ['product_id' => 154, 'size' => 'XL'],
            ['stock_quantity' => 10]
        );
        Inventory::updateOrCreate(
            ['product_id' => 154, 'size' => 'XS'],
            ['stock_quantity' => 8]
        );
        Inventory::updateOrCreate(
            ['product_id' => 154, 'size' => 'XXL'],
            ['stock_quantity' => 6]
        );

        $this->command->info('Importación completada: ' . Product::count() . ' productos.');
    }
}
