<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MasterDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('roles')->insert([
            ['name' => 'root'],
            ['name' => 'admin'],
            ['name' => 'staff'],
            ['name' => 'manager'],
            ['name' => 'user'],
        ]);

        $users = [
            ['name' => 'Super Admin', 'email' => 'root@example.com', 'role' => 'root'],
            ['name' => 'Admin', 'email' => 'admin@example.com', 'role' => 'admin'],
            ['name' => 'Staff', 'email' => 'staff@example.com', 'role' => 'staff'],
            ['name' => 'Manager', 'email' => 'manager@example.com', 'role' => 'manager'],
        ];

        foreach ($users as $userData) {
            $role = Role::where('name', $userData['role'])->first();

            if ($role) {
                User::updateOrCreate(
                    ['email' => $userData['email']], // Mencegah duplikasi
                    [
                        'name' => $userData['name'],
                        'password' => Hash::make('password'), // Default password
                        'role_id' => $role->id
                    ]
                );
            }
        }

        DB::table('categories')->insert([
            ['name' => 'Elektronik'],
            ['name' => 'Fashion'],
            ['name' => 'Pakaian'],
            ['name' => 'Sepatu'],
            ['name' => 'Aksesoris'],
        ]);

        DB::table('brands')->insert([
            ['name' => 'Moxie'],
            ['name' => 'Metaphores'],
            ['name' => 'Samsung'],
            ['name' => 'Nike'],
        ]);

        DB::table('warehouses')->insert([
            ['name' => 'Gudang A', 'location' => 'Jakarta'],
            ['name' => 'Gudang B', 'location' => 'Bandung'],
        ]);

        DB::table('vendors')->insert([
            ['name' => 'Vendor A', 'phone' => '08123456789', 'address' => 'Jakarta', 'bank_account' => '1234567890'],
            ['name' => 'Vendor B', 'phone' => '08129876543', 'address' => 'Bandung', 'bank_account' => '0987654321'],
        ]);

        DB::table('expeditions')->insert([
            ['name' => 'JNE', 'address' => 'Jakarta', 'customer_service_phone' => '021-123456'],
            ['name' => 'J&T', 'address' => 'Bandung', 'customer_service_phone' => '022-654321'],
        ]);

        DB::table('products')->insert([
            ['sku' => 'PROD001', 'name' => 'Kaos Polos', 'category_id' => 1, 'brand_id' => 1, 'warehouse_id' => 1, 'size' => 'M', 'qty' => 10, 'color' => 'Hitam', 'purchase_price' => 50000, 'photo' => null, 'barcode' => '1234567890'],
            ['sku' => 'PROD002', 'name' => 'Sepatu Sneakers', 'category_id' => 2, 'brand_id' => 2, 'warehouse_id' => 2, 'size' => '42', 'qty' => 5, 'color' => 'Putih', 'purchase_price' => 150000, 'photo' => null, 'barcode' => '9876543210'],
        ]);
    }
}
