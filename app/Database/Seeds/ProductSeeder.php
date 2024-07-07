<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Ramsey\Uuid\Uuid;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => Uuid::uuid4(),
                'category_id' => (new \App\Models\CategoryModel())->where('nama_kategori', 'Processor')->first()->id,
                'nama_produk' => 'Intel Core i9-11900K',
                'detail' => 'Clock Speed: 3.5 GHz (5.3 GHz Max Boost), Core: 8, Thread: 16, Socket: LGA1200, TDP: 125W, Integrated Graphics: Intel UHD Graphics 750',
                'stok' => '20',
                'berat' => '1000',
                'harga' => '100000',
                'rating' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::uuid4(),
                'category_id' => (new \App\Models\CategoryModel())->where('nama_kategori', 'Motherboard')->first()->id,
                'nama_produk' => 'ASUS ROG Maximus XIII Hero',
                'detail' => 'Chipset: Intel Z590, Socket: LGA1200, Memory: 4x DDR4 DIMM, Max Memory: 128GB, Form Factor: ATX',
                'stok' => '20',
                'berat' => '2000',
                'harga' => '500000',
                'rating' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::uuid4(),
                'category_id' => (new \App\Models\CategoryModel())->where('nama_kategori', 'RAM (Memory)')->first()->id,
                'nama_produk' => 'Corsair Vengeance RGB Pro 16GB (2x8GB) DDR4 3200MHz',
                'detail' => 'Type: DDR4, Capacity: 16GB (2x8GB), Speed: 3200MHz, CAS Latency: 16, Voltage: 1.35V, RGB: Yes',
                'stok' => '20',
                'berat' => '1000',
                'harga' => '100000',
                'rating' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::uuid4(),
                'category_id' => (new \App\Models\CategoryModel())->where('nama_kategori', 'VGA (Graphic Card)')->first()->id,
                'nama_produk' => 'NVIDIA GeForce RTX 3090',
                'detail' => 'GPU: NVIDIA Ampere, CUDA Cores: 10496, Memory: 24GB GDDR6X, Memory Bus: 384-bit, TDP: 350W, Interface: PCIe 4.0 x16',
                'stok' => '20',
                'berat' => '2000',
                'harga' => '500000',
                'rating' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::uuid4(),
                'category_id' => (new \App\Models\CategoryModel())->where('nama_kategori', 'Storage (HDD/SSD)')->first()->id,
                'nama_produk' => 'Samsung 970 EVO Plus 1TB NVMe M.2',
                'detail' => 'Type: NVMe M.2, Capacity: 1TB, Read Speed: 3500MB/s, Write Speed: 3300MB/s, Interface: PCIe 3.0 x4, Form Factor: M.2 2280',
                'stok' => '20',
                'berat' => '1000',
                'harga' => '100000',
                'rating' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::uuid4(),
                'category_id' => (new \App\Models\CategoryModel())->where('nama_kategori', 'Power Supply (PSU)')->first()->id,
                'nama_produk' => 'Corsair RM850x 850W 80+ Gold',
                'detail' => 'Type: ATX, Wattage: 850W, Efficiency: 80+ Gold, Modular: Full, Fan: 135mm, Warranty: 10 Years',
                'stok' => '20',
                'berat' => '2000',
                'harga' => '500000',
                'rating' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::uuid4(),
                'category_id' => (new \App\Models\CategoryModel())->where('nama_kategori', 'Cooling (Fan, Liquid Cooler, etc.)')->first()->id,
                'nama_produk' => 'NZXT Kraken X73 360mm AIO Liquid Cooler',
                'detail' => 'Type: AIO Liquid Cooler, Fan: 3x 120mm, Radiator: 360mm, Pump: Infinity Mirror, RGB: Yes, Warranty: 6 Years',
                'stok' => '20',
                'berat' => '2000',
                'harga' => '500000',
                'rating' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::uuid4(),
                'category_id' => (new \App\Models\CategoryModel())->where('nama_kategori', 'Casing (Case)')->first()->id,
                'nama_produk' => 'NZXT H510 Elite',
                'detail' => 'Type: Mid Tower, Motherboard Support: ATX, Micro-ATX, Mini-ITX, PSU Support: ATX, Front I/O: 1x USB 3.1 Gen 2 Type-C, 1x USB 3.1 Gen 1 Type-A, 1x 3.5mm Audio Jack',
                'stok' => '20',
                'berat' => '2000',
                'harga' => '500000',
                'rating' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::uuid4(),
                'category_id' => (new \App\Models\CategoryModel())->where('nama_kategori', 'Monitor (Screen)')->first()->id,
                'nama_produk' => 'ASUS TUF Gaming VG27AQ',
                'detail' => 'Size: 27", Resolution: 2560x1440, Refresh Rate: 165Hz, Panel: IPS, Response Time: 1ms, Adaptive Sync: G-Sync Compatible, FreeSync Premium',
                'stok' => '20',
                'berat' => '2000',
                'harga' => '500000',
                'rating' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::uuid4(),
                'category_id' => (new \App\Models\CategoryModel())->where('nama_kategori', 'Keyboard & Mouse (Peripheral)')->first()->id,
                'nama_produk' => 'Logitech G Pro X Superlight',
                'detail' => 'Type: Wireless, Sensor: HERO 25K, DPI: 25,600, Weight: 63g, Battery Life: 70 Hours, Switch: Mechanical, RGB: Yes',
                'stok' => '20',
                'berat' => '2000',
                'harga' => '500000',
                'rating' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        foreach ($data as $product) {
            $this->db->table('products')->insert($product);
        }
    }
}
