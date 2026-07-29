@extends('layouts.admin')

@section('content')

<!-- Google Fonts: Inter -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="p-6 md:p-10 max-w-4xl mx-auto font-['Inter',sans-serif] text-slate-800 antialiased">

    <!-- HEADER SECTION -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight text-slate-900">
                Edit User
            </h2>
            <p class="text-sm text-slate-500 mt-1">
                Perbarui informasi akun, role, atau asosiasi organisasi pengguna.
            </p>
        </div>

        <!-- BUTTON KEMBALI -->
        <a href="{{ route('admin.users.index') }}" 
           class="inline-flex items-center gap-2 text-xs font-semibold text-slate-600 hover:text-slate-900 bg-slate-100 hover:bg-slate-200/80 px-4 py-2.5 rounded-xl transition duration-150 self-start md:self-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali
        </a>
    </div>

    <!-- MAIN FORM CONTAINER -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-xl shadow-slate-100/80 p-6 md:p-8">

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">

            @csrf
            @method('PUT')

            <!-- NAMA -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">
                    Nama <span class="text-rose-500">*</span>
                </label>

                <input
                    type="text"
                    name="name"
                    class="w-full bg-slate-50/80 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition duration-150"
                    value="{{ old('name', $user->name) }}"
                    required>
            </div>

            <!-- EMAIL -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">
                    Email <span class="text-rose-500">*</span>
                </label>

                <input
                    type="email"
                    name="email"
                    class="w-full bg-slate-50/80 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition duration-150"
                    value="{{ old('email', $user->email) }}"
                    required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- ROLE -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">
                        Role
                    </label>

                    <select
                        name="role"
                        class="w-full bg-slate-50/80 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition duration-150">

                        <option value="superadmin"
                            {{ $user->role == 'superadmin' ? 'selected' : '' }}>
                            Super Admin
                        </option>

                        <option value="organizer"
                            {{ $user->role == 'organizer' ? 'selected' : '' }}>
                            Organizer
                        </option>

                    </select>
                </div>

                <!-- ORGANIZATION -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">
                        Organization
                    </label>

                    <select
                        name="organization_id"
                        class="w-full bg-slate-50/80 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition duration-150">

                        <option value="">-- Pilih Organization --</option>

                        @foreach($organizations as $organization)

                            <option
                                value="{{ $organization->id }}"
                                {{ $user->organization_id == $organization->id ? 'selected' : '' }}>

                                {{ $organization->name }}

                            </option>

                        @endforeach

                    </select>
                </div>
            </div>

            <!-- ACTION BUTTONS -->
            <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-6 mt-8">

                <a href="{{ route('admin.users.index') }}"
                   class="px-5 py-2.5 rounded-xl font-semibold text-xs text-slate-500 hover:text-slate-800 bg-slate-100 hover:bg-slate-200 transition duration-150">
                    Batal
                </a>

                <button
                    type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white px-7 py-2.5 rounded-xl font-semibold text-xs shadow-md shadow-indigo-100 hover:shadow-lg transition duration-150">

                    Update

                </button>

            </div>

        </form>

    </div>

</div>

@endsection