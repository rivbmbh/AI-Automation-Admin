@props(['successMessage' => session('success')])

{{--
    resources/views/components/alerts/success-toast.blade.php

    Cara pakai (taruh di manapun di dalam @section('content'), misalnya di halaman index):

    @if (session('success'))
        <x-alerts.success-toast :message="session('success')" />
    @endif

    Props yang bisa diatur:
    - title     : judul toast (default: "Success")
    - message   : isi pesan (wajib diisi)
    - duration  : lama tampil dalam milidetik sebelum hilang (default: 3000)
--}}

@props([
    'title' => 'Success',
    'message' => '',
    'duration' => 3000,
])

@php
    // id unik supaya tidak bentrok kalau ada lebih dari satu toast di halaman yang sama
    $toastId = 'successToast-' . uniqid();
@endphp

<div
    id="{{ $toastId }}"
    class="z-99999 w-full max-w-sm translate-x-[120%] opacity-0 transition-all duration-500 ease-out"
>
    <div class="flex items-start gap-3 rounded-xl border p-4 shadow-lg border-green-500 bg-green-50 dark:border-green-500/30 dark:bg-green-500/15">
        <div class="-mt-0.5 text-green-500">
            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.70186 12.0001C3.70186 7.41711 7.41711 3.70186 12.0001 3.70186C16.5831 3.70186 20.2984 7.41711 20.2984 12.0001C20.2984 16.5831 16.5831 20.2984 12.0001 20.2984C7.41711 20.2984 3.70186 16.5831 3.70186 12.0001ZM12.0001 1.90186C6.423 1.90186 1.90186 6.423 1.90186 12.0001C1.90186 17.5772 6.423 22.0984 12.0001 22.0984C17.5772 22.0984 22.0984 17.5772 22.0984 12.0001C22.0984 6.423 17.5772 1.90186 12.0001 1.90186ZM15.6197 10.7395C15.9712 10.388 15.9712 9.81819 15.6197 9.46672C15.2683 9.11525 14.6984 9.11525 14.347 9.46672L11.1894 12.6243L9.6533 11.0883C9.30183 10.7368 8.73198 10.7368 8.38051 11.0883C8.02904 11.4397 8.02904 12.0096 8.38051 12.3611L10.553 14.5335C10.7217 14.7023 10.9507 14.7971 11.1894 14.7971C11.428 14.7971 11.657 14.7023 11.8257 14.5335L15.6197 10.7395Z" fill=""></path>
            </svg>
        </div>

        <div class="flex-1">
            @if($title)
                <h4 class="mb-1 text-sm font-semibold text-gray-800 dark:text-white/90">
                    {{ $title }}
                </h4>
            @endif

            @if($message)
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $message }}</p>
            @endif
        </div>

        {{-- tombol close manual (opsional) --}}
        <button
            type="button"
            onclick="document.getElementById('{{ $toastId }}').remove()"
            class="-mt-0.5 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200"
        >
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L15 15M15 1L1 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
        </button>
    </div>
</div>

<script>
    (function () {
        const el = document.getElementById('{{ $toastId }}');
        if (!el) return;

        const showDelayFrame = () => {
            el.classList.remove('translate-x-[120%]', 'opacity-0');
            el.classList.add('translate-x-0', 'opacity-100');
        };

        // dua requestAnimationFrame supaya browser sempat render posisi awal
        // dulu (translate-x-[120%]) sebelum transisi ke posisi akhir dijalankan
        requestAnimationFrame(() => requestAnimationFrame(showDelayFrame));

        setTimeout(() => {
            el.classList.remove('translate-x-0', 'opacity-100');
            el.classList.add('translate-x-[120%]', 'opacity-0');

            // hapus elemen dari DOM setelah animasi keluar selesai (durasi 500ms)
            setTimeout(() => el.remove(), 500);
        }, {{ (int) $duration }});
    })();
</script>