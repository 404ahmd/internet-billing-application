<?php

namespace Database\Seeders;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $today = Carbon::today();
        $currentMonth = $today->format('April');
        $customers = [
            [
                'name' => 'Alice Johnson',
                'username' => 'alicejohnson',
                'phone' => '0811111111',
                'address' => 'Jl. Melati No.1',
                'group' => $currentMonth,
                'package' => 1,
                'join_date' => $today,
                'status' => 'active',
                'notes' => 'Pelanggan baru, paket basic.',
            ],
            [
                'name' => 'Bob Smith',
                'username' => 'bobsmith',
                'phone' => '0812222222',
                'address' => 'Jl. Mawar No.2',
                'group' => $currentMonth,
                'package' => 2,
                'join_date' => $today,
                'status' => 'active',
                'notes' => 'Pelanggan paket premium.',
            ],
            [
                'name' => 'Charlie Brown',
                'username' => 'charliebrown',
                'phone' => '0813333333',
                'address' => 'Jl. Anggrek No.3',
                'group' => $currentMonth,
                'package' => 1,
                'join_date' => $today,
                'status' => 'inactive',
                'notes' => 'Menunggu pembayaran.',
            ],
            [
                'name' => 'Diana Prince',
                'username' => 'dianaprince',
                'phone' => '0814444444',
                'address' => 'Jl. Tulip No.4',
                'group' => $currentMonth,
                'package' => 3,
                'join_date' => $today,
                'status' => 'active',
                'notes' => 'Upgrade paket bulan ini.',
            ],
            [
                'name' => 'Ethan Hunt',
                'username' => 'ethanhunt',
                'phone' => '0815555555',
                'address' => 'Jl. Lily No.5',
                'group' => $currentMonth,
                'package' => 2,
                'join_date' => $today,
                'status' => 'active',
                'notes' => 'Pelanggan prioritas.',
            ],
            [
                'name' => 'Fiona Gallagher',
                'username' => 'fionagallagher',
                'phone' => '0816666666',
                'address' => 'Jl. Kenanga No.6',
                'group' => $currentMonth,
                'package' => 1,
                'join_date' => $today,
                'status' => 'terminated',
                'notes' => 'Langganan dihentikan.',
            ],
            [
                'name' => 'George Clooney',
                'username' => 'georgeclooney',
                'phone' => '0817777777',
                'address' => 'Jl. Dahlia No.7',
                'group' => $currentMonth,
                'package' => 3,
                'join_date' => $today,
                'status' => 'active',
                'notes' => 'Langganan baru.',
            ],
            [
                'name' => 'Hannah Montana',
                'username' => 'hannahmontana',
                'phone' => '0818888888',
                'address' => 'Jl. Soka No.8',
                'group' => $currentMonth,
                'package' => 2,
                'join_date' => $today,
                'status' => 'inactive',
                'notes' => 'Menunggu aktivasi.',
            ],
            [
                'name' => 'Ian Somerhalder',
                'username' => 'iansomerhalder',
                'phone' => '0819999999',
                'address' => 'Jl. Cempaka No.9',
                'group' => $currentMonth,
                'package' => 1,
                'join_date' => $today,
                'status' => 'active',
                'notes' => 'Pelanggan loyal.',
            ],
            [
                'name' => 'Jessica Alba',
                'username' => 'jessicaalba',
                'phone' => '0820000000',
                'address' => 'Jl. Teratai No.10',
                'group' => $currentMonth,
                'package' => 3,
                'join_date' => $today,
                'status' => 'active',
                'notes' => 'Langganan baru di bulan ini.',
            ],
        ];

        foreach ($customers as $val) {
            Customer::create($val);
        }
    }
}
