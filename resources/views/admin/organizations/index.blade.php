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
                Data Organization
            </h2>
            <p class="text-sm text-slate-500 mt-1">
                Kelola status persetujuan, informasi, dan data organisasi terdaftar.
            </p>
        </div>

        <!-- BUTTON TAMBAH ORGANIZATION -->
        <a href="{{ route('admin.organizations.create') }}"
           class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white text-xs font-semibold px-5 py-2.5 rounded-xl shadow-md shadow-indigo-100 hover:shadow-lg transition duration-150 self-start md:self-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Organization
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
                        <th class="py-4 px-6 text-center w-16">No</th>
                        <th class="py-4 px-6">Nama</th>
                        <th class="py-4 px-6">Deskripsi</th>
                        <th class="py-4 px-6 text-center">Status</th>
                        <th class="py-4 px-6 text-center">Aksi</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody class="divide-y divide-slate-100 text-xs text-slate-700">
                    @forelse($organizations as $organization)
                        <tr class="hover:bg-slate-50/60 transition duration-150">

                            <!-- NO -->
                            <td class="py-4 px-6 text-center font-medium text-slate-400">
                                {{ $loop->iteration }}
                            </td>

                            <!-- NAMA -->
                            <td class="py-4 px-6 font-semibold text-slate-900 text-sm whitespace-nowrap">
                                {{ $organization->name }}
                            </td>

                            <!-- DESKRIPSI -->
                            <td class="py-4 px-6 text-slate-500 max-w-xs truncate">
                                {{ $organization->description }}
                            </td>

                            <!-- STATUS -->
                            <td class="py-4 px-6 text-center whitespace-nowrap">
                                @if($organization->status == 'approved')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200/60">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Approved
                                    </span>
                                @elseif($organization->status == 'pending')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-amber-50 text-amber-700 border border-amber-200/60">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                        Pending
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-rose-50 text-rose-700 border border-rose-200/60">
                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                        Rejected
                                    </span>
                                @endif
                            </td>

                            <!-- AKSI -->
                            <td class="py-4 px-6">
                                <div class="flex items-center justify-center gap-2 flex-nowrap">

                                    <!-- EDIT -->
                                    <a href="{{ route('admin.organizations.edit', $organization->id) }}"
                                       class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-50 text-blue-600 hover:bg-blue-100 font-semibold text-[11px] rounded-lg transition duration-150">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit
                                    </a>

                                    <!-- HAPUS -->
                                    <form action="{{ route('admin.organizations.destroy', $organization->id) }}"
                                          method="POST"
                                          class="inline-block">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                                                class="inline-flex items-center gap-1 px-3 py-1.5 bg-rose-50 text-rose-600 hover:bg-rose-100 font-semibold text-[11px] rounded-lg transition duration-150">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>

                                    <!-- APPROVE & REJECT (JIKA PENDING) -->
                                    @if($organization->status == 'pending')

                                        <!-- APPROVE -->
                                        <form action="{{ route('admin.organizations.approve', $organization->id) }}"
                                              method="POST"
                                              class="inline-block">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                    class="inline-flex items-center gap-1 px-3 py-1.5 bg-emerald-50 text-emerald-600 hover:bg-emerald-100 font-semibold text-[11px] rounded-lg transition duration-150">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                Approve
                                            </button>
                                        </form>

                                        <!-- REJECT -->
                                        <form action="{{ route('admin.organizations.reject', $organization->id) }}"
                                              method="POST"
                                              class="inline-block">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                    class="inline-flex items-center gap-1 px-3 py-1.5 bg-amber-50 text-amber-700 hover:bg-amber-100 font-semibold text-[11px] rounded-lg transition duration-150">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                                Reject
                                            </button>
                                        </form>

                                    @endif

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-slate-400">
                                <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0h4m-4 0V11m0 0h4m-4 0H9m4 0V5"></path>
                                </svg>
                                <p class="text-xs font-medium">Belum ada data organization.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection