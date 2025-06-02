<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // membuat data
        $data = [
            [
                'nama' => 'Laptop',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Printer',
                'created_at' => date("Y-m-d H:i:s"),
            ],
        ];

        foreach ($data as $item) {
            // insert semua data ke tabel
            $this->db->table('category')->insert($item);
        }
    }
}