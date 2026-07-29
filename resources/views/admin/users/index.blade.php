@extends('layouts.admin')

@section('content')

<!-- Google Fonts: Inter -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="p-6 md:p-10 max-w-7xl mx-auto font-['Inter',sans-serif] text-slate-800 antialiased">

    <!-- HEADER SECTION -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight text-slate-900">
                Manajemen User
            </h2>
            <p class="text-sm text-slate-500 mt-1">
                Kelola hak akses pengguna, role, dan asosiasi organisasi platform Anda.
            </p>
        </div>

        <!-- BUTTON TAMBAH USER -->
        <a href="{{ route('admin.users.create') }}"
           class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white text-xs font-semibold px-5 py-2.5 rounded-xl shadow-md shadow-indigo-100 hover:shadow-lg transition duration-150 self-start md:self-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah User
        </a>
    </div>

    <!-- ALERT SUCCESS -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200/80 rounded-2xl flex items-center gap-3 text-emerald-800 text-xs font-medium shadow-sm">
            <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- TABLE CONTAINER -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-xl shadow-slate-100/80 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <!-- HEAD -->
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-100 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        <th class="py-4 px-6">Nama</th>
                        <th class="py-4 px-6">Email</th>
                        <th class="py-4 px-6">Role</th>
                        <th class="py-4 px-6">Organization</th>
                        <th class="py-4 px-6 text-center w-36">Aksi</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody class="divide-y divide-slate-100 text-xs text-slate-700">
                    @foreach($users as $user)
                        <tr class="hover:bg-slate-50/60 transition duration-150">
                            <!-- NAMA -->
                            <td class="py-4 px-6 font-semibold text-slate-900 text-sm">
                                {{ $user->name }}
                            </td>

                            <!-- EMAIL -->
                            <td class="py-4 px-6 text-slate-500 whitespace-nowrap">
                                {{ $user->email }}
                            </td>

                            <!-- ROLE -->
                            <td class="py-4 px-6 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-bold uppercase tracking-wider bg-slate-100 text-slate-700 border border-slate-200/60">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>

                            <!-- ORGANIZATION -->
                            <td class="py-4 px-6 font-medium text-slate-600 whitespace-nowrap">
                                {{ $user->organization->name ?? '-' }}
                            </td>

                            <!-- AKSI -->
                            <td class="py-4 px-6">
                                <div class="flex items-center justify-center gap-2">
                                    <!-- EDIT -->
                                    <a href="{{ route('admin.users.edit',$user->id) }}"
                                       class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-50 text-blue-600 hover:bg-blue-100 font-semibold text-[11px] rounded-lg transition duration-150">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit
                                    </a>

                                    <!-- DELETE -->
                                    <form action="{{ route('admin.users.destroy',$user->id) }}"
                                          method="POST"
                                          class="inline-block">
                                        @csrf
                                        @method('DELETE')

                                        <button onclick="return confirm('Hapus user?')"
                                                class="inline-flex items-center gap-1 px-3 py-1.5 bg-rose-50 text-rose-600 hover:bg-rose-100 font-semibold text-[11px] rounded-lg transition duration-150">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection