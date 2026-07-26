<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //organization dan users
        $this->call([
            OrganizationSeeder::class,
            UserSeeder::class,
        ]);

        //superadmin
        User::firstOrCreate(
            ['email' => 'admin@amikom.ac.id'],
            [
                'name' => 'Admin Amikom',
                'password' => bcrypt('password'),
                'role' => 'superadmin',
                'organization_id' => null,
            ]
        );
        
        //categories
        $seminar = Category::firstOrCreate(
            ['slug' => 'seminar-it'],
            ['name' => 'Seminar IT']
        );

        $entertainment = Category::firstOrCreate(
            ['slug' => 'entertainment'],
            ['name' => 'Entertainment']
        );

        $beginner = Category::firstOrCreate(
            ['slug' => 'seminar-it-beginner'],
            ['name' => 'Seminar IT Beginner']
        );

        $olahraga = Category::firstOrCreate(
            ['slug' => 'olahraga'],
            ['name' => 'Olahraga']
        );

        $turnamen = Category::firstOrCreate(
            ['slug' => 'turnamen'],
            ['name' => 'Turnamen']
        );
        
        //events
       // ==========================
// EVENT HIMA INFORMATIKA
// organization_id = 1
// ==========================

Event::firstOrCreate(
    ['title' => 'AI Summit 2026'],
    [
        'organization_id' => 1,
        'category_id' => $seminar->id,
        'description' => 'Seminar mengenai perkembangan Artificial Intelligence.',
        'date' => '2026-09-15 09:00:00',
        'location' => 'Auditorium Amikom',
        'price' => 50000,
        'stock' => 200,
        'poster_path' => 'posters/event-1.png',
    ]
);

Event::firstOrCreate(
    ['title' => 'Laravel Bootcamp'],
    [
        'organization_id' => 1,
        'category_id' => $beginner->id,
        'description' => 'Pelatihan Laravel untuk mahasiswa.',
        'date' => '2026-10-05 08:00:00',
        'location' => 'Lab Komputer 1',
        'price' => 75000,
        'stock' => 120,
        'poster_path' => 'posters/event-2.png',
    ]
);

// ==========================
// EVENT HIMA SISTEM INFORMASI
// organization_id = 2
// ==========================

Event::firstOrCreate(
    ['title' => 'Business Intelligence Seminar'],
    [
        'organization_id' => 2,
        'category_id' => $seminar->id,
        'description' => 'Belajar Business Intelligence dan Data Analytics.',
        'date' => '2026-09-20 09:00:00',
        'location' => 'Ruang Cinema',
        'price' => 45000,
        'stock' => 150,
        'poster_path' => 'posters/event-3.png',
    ]
);

Event::firstOrCreate(
    ['title' => 'UI/UX Design Workshop'],
    [
        'organization_id' => 2,
        'category_id' => $beginner->id,
        'description' => 'Workshop desain UI/UX menggunakan Figma.',
        'date' => '2026-10-18 08:00:00',
        'location' => 'Lab Multimedia',
        'price' => 60000,
        'stock' => 100,
        'poster_path' => 'posters/event-4.png',
    ]
);

// ==========================
// EVENT BEM
// organization_id = 3
// ==========================

Event::firstOrCreate(
    ['title' => 'Amikom Futsal Competition'],
    [
        'organization_id' => 3,
        'category_id' => $olahraga->id,
        'description' => 'Turnamen futsal antar mahasiswa.',
        'date' => '2026-11-01 08:00:00',
        'location' => 'GOR Amikom',
        'price' => 30000,
        'stock' => 250,
        'poster_path' => 'posters/event-5.png',
    ]
);

Event::firstOrCreate(
    ['title' => 'E-Sport Championship'],
    [
        'organization_id' => 3,
        'category_id' => $turnamen->id,
        'description' => 'Kompetisi Mobile Legends dan Valorant.',
        'date' => '2026-11-12 09:00:00',
        'location' => 'Hall Kampus',
        'price' => 25000,
        'stock' => 300,
        'poster_path' => 'posters/event-6.png',
    ]
);

// ==========================
// EVENT UKM MUSIK
// organization_id = 4
// ==========================

Event::firstOrCreate(
    ['title' => 'Amikom Music Festival'],
    [
        'organization_id' => 4,
        'category_id' => $entertainment->id,
        'description' => 'Festival musik terbesar Amikom.',
        'date' => '2026-12-05 18:00:00',
        'location' => 'Lapangan Utama',
        'price' => 120000,
        'stock' => 500,
        'poster_path' => 'posters/event-7.png',
    ]
);

Event::firstOrCreate(
    ['title' => 'Band Competition'],
    [
        'organization_id' => 4,
        'category_id' => $entertainment->id,
        'description' => 'Kompetisi band antar mahasiswa.',
        'date' => '2026-12-15 18:30:00',
        'location' => 'Auditorium Amikom',
        'price' => 50000,
        'stock' => 250,
        'poster_path' => 'posters/event-8.png',
    ]);
}
}