<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // 1. Akun Admin Utama
    \App\Models\User::firstOrCreate(
        ['email' => 'admin@amikom.ac.id'],
        [
            'name' => 'Admin Amikom',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]
    );

    // 2. Insert Kategori Event
   $category = \App\Models\Category::firstOrCreate(
    ['slug' => 'seminar-it'],
    [
        'name' => 'Seminar IT',
    ]
);

  $category2 = \App\Models\Category::firstOrCreate(
    ['slug' => 'entertaiment'],
    [
        'name' => 'Entertaiment',
    ]
);
     // 3. Insert Sampel Events
        \App\Models\Event::create([
        'category_id' => $category2->id,
        'title' => 'Jazz Night 2025',
        'description' => 'Nikmati malam yang indah dengan
        alunan musik.',
        'date' => '2026-05-10 19:00:00',
        'location' => 'Amikom Baru',
        'price' => 50000,
        'stock' => 100,
        'poster_path' => 'posters/event-1.png',
    ]);

        \App\Models\Event::create([
        'category_id' => $category->id,
        'title' => 'AI Summit & Expo 2026',
        'description' => 'Jelajahi tren terkini dalam bidang
        Artificial Intelligence',
        'date' => '2026-05-01 13:00:00',
        'location' => 'Ruang Cinema',
        'price' => 45000,
        'stock' => 150,
        'poster_path' => 'posters/event-2.png',
    ]);

    //Tugas Praktikum 4 menambahkan kategori
        // Kategori
       $kategori1 = \App\Models\Category::firstOrCreate(
    ['slug' => 'seminar-it-beginner'],
    [
        'name' => 'Seminar IT Beginner',
    ]
);

      $kategori2 = \App\Models\Category::firstOrCreate(
    ['slug' => 'olahraga'],
    [
        'name' => 'Olahraga',
    ]
);
      $kategori3 = \App\Models\Category::firstOrCreate(
    ['slug' => 'turnamen'],
    [
        'name' => 'Turnamen',
    ]
);

    //menambahkan event
        \App\Models\Event::create([
            'category_id' => $category->id,
            'title' => 'Web Development Bootcamp',
            'description' => 'Belajar Laravel dari dasar.',
            'date' => '2026-06-01 09:00:00',
            'location' => 'Lab Komputer',
            'price' => 75000,
            'stock' => 50,
            'poster_path' => 'asset/concert.png',
         ]);

         \App\Models\Event::create([
            'category_id' => $kategori1->id,
            'title' => 'AI Summit 2026',
            'description' => 'Seminar AI',
            'date' => '2026-05-01 10:00:00',
            'location' => 'Amikom Purwokerto',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'asset/concert.png'
        ]);
        \App\Models\Event::create([
            'category_id' => $kategori2->id,
            'title' => 'Amikom Futsal Competition',
            'description' => 'Turnamen futsal',
            'date' => '2026-07-10 08:00:00',
            'location' => 'Kampus 2 Amikom',
            'price' => 30000,
            'stock' => 200,
            'poster_path' => 'asset/heckathon.png'
        ]);
        \App\Models\Event::create([
            'category_id' => $kategori2->id,
            'title' => 'Amikom E-Sport Tournament',
            'description' => 'Turnamen game',
            'date' => '2026-08-01 10:00:00',
            'location' => 'Citra 2',
            'price' => 25000,
            'stock' => 300,
            'poster_path' => 'asset/workshop.png'
        ]);
        \App\Models\Event::create([
            'category_id' => $kategori3->id,
            'title' => ' Amikom Music Festival',
            'description' => 'Festival musik besar',
            'date' => '2026-10-01 18:00:00',
            'location' => 'Kampus 2 Amikom Yogyakarta',
            'price' => 120000,
            'stock' => 400,
            'poster_path' => 'asset/concert.png'
        ]);
        \App\Models\Event::create([
            'category_id' => $kategori3->id,
            'title' => 'Pemeran Arsitektur',
            'description' => 'Pameran Arsitektur Amikom',
            'date' => '2026-10-01 18:00:00',
            'location' => 'Kampus 2 Amikom Yogyakarta',
            'price' => 120000,
            'stock' => 400,
            'poster_path' => 'asset/concert.png'
        ]);
    }
}