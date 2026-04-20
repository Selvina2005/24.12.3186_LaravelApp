@extends('layouts.app')

@section('content')

<div class="bg-slate-100 flex items-center justify-center min-h-screen">

    <!-- CARD PROFIL -->
    <div class="bg-white shadow-xl rounded-2xl p-6 w-full max-w-md border border-slate-200">

        <!-- HEADER PROFIL -->
        <div class="flex items-center gap-4">

            <img src="https://cdn.inspireuplift.com/uploads/images/seller_products/1678674695_Tiana1PNG.png"
                class="w-16 h-16 rounded-full object-cover shadow-md">

            <div>
                <h1 class="text-xl font-bold text-slate-800">Selvina Evarista</h1>
                <a href="mailto:Selvina@students.amikom.ac.id" 
                   class="text-slate-500 text-sm hover:text-indigo-600">
                    Selvina@students.amikom.ac.id
                </a>
            </div>

        </div>

        <!-- GARIS -->
        <div class="my-4 border-t border-slate-200"></div>

        <!-- BIO -->
        <p class="text-slate-600 text-sm leading-relaxed">
            I'm a student at Amikom University,
            majoring in information systems. 
            I'm interested in technology and website development.
        </p>

        <!-- GARIS -->
        <div class="my-4 border-t border-slate-200"></div>

        <!-- BUTTON -->
        <div class="flex gap-3">
            <a href="/" 
               class="flex-1 text-center bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">
                Kembali ke Home
            </a>
        </div>

    </div>

</div>

@endsection