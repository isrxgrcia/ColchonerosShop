<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Product;
use App\Models\Inventory;

class AndroidDataSeeder extends Seeder
{
    public function run(): void
    {
        $jsonPath = base_path('../tfg_tienda/extracted_data.json');
        
        if (!File::exists($jsonPath)) {
            $this->command->warn("ATENCIÓN: No se encontró el JSON en: {$jsonPath}");
            $this->command->info("Asegúrate de tener extracted_data.json ahí.");
            return;
        }

        $json = File::get($jsonPath);
        $data = json_decode($json, true);

        if (!$data) {
            $this->command->error("El archivo JSON parece corrupto o está vacío.");
            return;
        }

        $this->command->info('Importando Categorías desde Android...');
        foreach ($data['categorias'] ?? [] as $cat) {
            Category::updateOrCreate(
                ['id' => $cat['id']],
                [
                    'name' => $cat['nombre'],
                    'gender' => strtolower($cat['genero']),
                ]
            );
        }

        $this->command->info('Importando Productos y enlazando con categorías...');
        foreach ($data['productos'] ?? [] as $prod) {
            Product::updateOrCreate(
                ['id' => $prod['id']],
                [
                    'category_id' => $prod['categoria_id'],
                    'name' => $prod['nombre'],
                    'description' => $prod['descripcion'],
                    'price' => $prod['precio'],
                    'image_primary' => $prod['imagen_principal'],
                    'image_secondary' => $prod['imagen_secundaria'] ?? null,
                ]
            );
        }

        $this->command->info('Configurando Tallas y Volúmenes de Stock...');
        foreach ($data['inventario'] ?? [] as $inv) {
            Inventory::updateOrCreate(
                [
                    'product_id' => $inv['producto_id'],
                    'size' => $inv['talla']
                ],
                [
                    'stock_quantity' => $inv['cantidad'] ?? 0
                ]
            );
        }
        
        $this->command->info('Añadiendo Vídeos de Productos desde Android...');
        foreach ($data['videos_productos'] ?? [] as $vid) {
            DB::table('videos_productos')->updateOrInsert(
                [
                    'producto_id' => $vid['producto_id'],
                    'nombre_video' => $vid['nombre_video']
                ],
                ['created_at' => now(), 'updated_at' => now()]
            );
        }

        $this->command->info('Migración de Android a Laravel completada con éxito!');
    }
}
