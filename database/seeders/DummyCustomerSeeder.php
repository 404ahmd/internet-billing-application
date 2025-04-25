<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $customers = [
            [
                'name' => 'Rani Putri',
                'username' => 'rani_putri',
                'paket' => '10Mbps',
                'address' => 'Jl. Ahmad Yani No. 76',
                'group' => 'Januari',
                'phone' => '081234567891',
                'join_date' => '2023-01-01',
                'status' => 'active',
                'last_payment_date' => '2024-12-01',
                'due_date' => '2025-01-01',
                'notes' => 'Pelanggan lama',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Budi Santoso',
                'username' => 'budi_santoso',
                'paket' => '20Mbps',
                'address' => 'Jl. Gajah Mada No. 88',
                'group' => 'Februari',
                'phone' => '081234567892',
                'join_date' => '2023-02-10',
                'status' => 'active',
                'last_payment_date' => '2024-12-10',
                'due_date' => '2025-01-10',
                'notes' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Siti Nurhaliza',
                'username' => 'siti_nurhaliza',
                'paket' => '25Mbps',
                'address' => 'Jl. Melati No. 15',
                'group' => 'Maret',
                'phone' => '081234567893',
                'join_date' => '2023-03-15',
                'status' => 'inactive',
                'last_payment_date' => '2024-11-15',
                'due_date' => '2024-12-15',
                'notes' => 'Belum membayar bulan ini',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Agus Haryanto',
                'username' => 'agus_haryanto',
                'paket' => '30Mbps',
                'address' => 'Jl. Merdeka No. 5',
                'group' => 'April',
                'phone' => '081234567894',
                'join_date' => '2023-04-20',
                'status' => 'active',
                'last_payment_date' => '2025-04-01',
                'due_date' => '2025-05-01',
                'notes' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dewi Lestari',
                'username' => 'dewi_lestari',
                'paket' => '10Mbps',
                'address' => 'Jl. Kebon Sirih No. 25',
                'group' => 'Mei',
                'phone' => '081234567895',
                'join_date' => '2023-05-01',
                'status' => 'terminated',
                'last_payment_date' => '2024-10-01',
                'due_date' => '2024-11-01',
                'notes' => 'Layanan dihentikan atas permintaan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fajar Nugroho',
                'username' => 'fajar_nugroho',
                'paket' => '20Mbps',
                'address' => 'Jl. Asia Afrika No. 33',
                'group' => 'Juni',
                'phone' => '081234567896',
                'join_date' => '2023-06-12',
                'status' => 'active',
                'last_payment_date' => '2025-03-12',
                'due_date' => '2025-04-12',
                'notes' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Indah Pertiwi',
                'username' => 'indah_pertiwi',
                'paket' => '25Mbps',
                'address' => 'Jl. Diponegoro No. 60',
                'group' => 'Juli',
                'phone' => '081234567897',
                'join_date' => '2023-07-22',
                'status' => 'inactive',
                'last_payment_date' => '2024-12-22',
                'due_date' => '2025-01-22',
                'notes' => 'Menunggu konfirmasi pembayaran',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Yudi Setiawan',
                'username' => 'yudi_setiawan',
                'paket' => '30Mbps',
                'address' => 'Jl. Pemuda No. 101',
                'group' => 'Agustus',
                'phone' => '081234567898',
                'join_date' => '2023-08-10',
                'status' => 'active',
                'last_payment_date' => '2025-04-10',
                'due_date' => '2025-05-10',
                'notes' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mega Andriani',
                'username' => 'mega_andriani',
                'paket' => '10Mbps',
                'address' => 'Jl. Rajawali No. 44',
                'group' => 'September',
                'phone' => '081234567899',
                'join_date' => '2023-09-01',
                'status' => 'terminated',
                'last_payment_date' => '2024-09-01',
                'due_date' => '2024-10-01',
                'notes' => 'Layanan dihentikan karena menunggak 3 bulan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Andi Saputra',
                'username' => 'andi_saputra',
                'paket' => '20Mbps',
                'address' => 'Jl. Cendrawasih No. 9',
                'group' => 'Oktober',
                'phone' => '081234567800',
                'join_date' => '2023-10-15',
                'status' => 'active',
                'last_payment_date' => '2025-04-15',
                'due_date' => '2025-05-15',
                'notes' => 'Pelanggan baru loyal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($customers as $val) {
            Customer::create($val);
        }
    }
}
