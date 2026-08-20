@props([
    'title',
    'data' => [],  
])


    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white pt-4 dark:border-white/5 dark:bg-white/3">
        <!-- Header -->
        <div class="flex flex-col gap-4 px-6 mb-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                    {{ $title }}
                </h3>
            </div>
            <div class="flex items-center gap-3">
                <button class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-3 font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/3 dark:hover:text-gray-200">
                    <svg class="stroke-current fill-white dark:fill-gray-800" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.29004 5.90393H17.7067" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17.7075 14.0961H2.29085" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.0826 3.33331C13.5024 3.33331 14.6534 4.48431 14.6534 5.90414C14.6534 7.32398 13.5024 8.47498 12.0826 8.47498C10.6627 8.47498 9.51172 7.32398 9.51172 5.90415C9.51172 4.48432 10.6627 3.33331 12.0826 3.33331Z" fill="" stroke="" stroke-width="1.5"/>
                        <path d="M7.91745 11.525C6.49762 11.525 5.34662 12.676 5.34662 14.0959C5.34661 15.5157 6.49762 16.6667 7.91745 16.6667C9.33728 16.6667 10.4883 15.5157 10.4883 14.0959C10.4883 12.676 9.33728 11.525 7.91745 11.525Z" fill="" stroke="" stroke-width="1.5"/>
                    </svg>
                    Filter
                </button>
                <button class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-3 font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/3 dark:hover:text-gray-200">
                    See all
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="max-w-full overflow-x-auto">
            <table class="w-full">
                <thead class="px-6 py-3.5 border-t border-gray-100 border-y bg-gray-50 dark:border-white/5 dark:bg-gray-900">
                    <tr>
                        <th class="px-6 py-3 font-medium text-gray-500 sm:px-6 text-theme-xs dark:text-gray-400 text-start">
                            <div class="flex items-center gap-3">
                                <div @click="handleSelectAll()"
                                    class="flex h-5 w-5 cursor-pointer items-center justify-center rounded-md border-[1.25px]"
                                    :class="selectAll ? 'border-blue-500 dark:border-blue-500 bg-blue-500' : 'bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700'">
                                    <svg :class="selectAll ? 'block' : 'hidden'" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.6668 3.5L5.25016 9.91667L2.3335 7" stroke="white" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">No</span>
                            </div>
                        </th>
                        <th class="px-6 py-3 font-medium text-gray-500 sm:px-6 text-theme-xs dark:text-gray-400 text-start">SKU</th>
                        <th class="px-6 py-3 font-medium text-gray-500 sm:px-6 text-theme-xs dark:text-gray-400 text-start">Name</th>
                        <th class="px-6 py-3 font-medium text-gray-500 sm:px-6 text-theme-xs dark:text-gray-400 text-start">Price</th>
                        <th class="px-6 py-3 font-medium text-gray-500 sm:px-6 text-theme-xs dark:text-gray-400 text-start">Stock</th>
                        <th class="px-6 py-3 font-medium text-gray-500 sm:px-6 text-theme-xs dark:text-gray-400 text-start">Category</th>
                        <th class="px-6 py-3 font-medium text-gray-500 sm:px-6 text-theme-xs dark:text-gray-400 text-start">Description</th>
                        <th class="px-6 py-3 font-medium text-gray-500 sm:px-6 text-theme-xs dark:text-gray-400 text-start">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 0;
                        $no - 1
                    @endphp
                    @foreach ($data as $value)    
                    <tr class="border-b border-gray-100 dark:border-white/5">
                        <td class="px-4 sm:px-6 py-3.5">
                            <div class="flex items-center gap-3">
                                <div @click="handleRowSelect(row.id)"
                                    class="flex h-5 w-5 cursor-pointer items-center justify-center rounded-md border-[1.25px]"
                                    :class="selectedRows.includes(row.id) ? 'border-blue-500 dark:border-blue-500 bg-blue-500' : 'bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700'">
                                    <svg :class="selectedRows.includes(row.id) ? 'block' : 'hidden'" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.6668 3.5L5.25016 9.91667L2.3335 7" stroke="white" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                {{-- number --}}
                               {{ $data->firstItem() + $loop->index }}
                            </div>
                        </td>
                        <td class="px-4 sm:px-6 py-3.5">
                            <div class="flex items-center gap-3">
                                {{ $value->sku }}
                            </div>
                        </td>
                        <td class="px-4 sm:px-6 py-3.5">
                            <div class="flex items-center gap-3">
                                {{ $value->name }}
                            </div>
                        </td>
                        <td class="px-4 sm:px-6 py-3.5">
                            <p class="text-gray-700 dark:text-gray-400">{{ $value->price }}</p>
                        </td>
                        <td class="px-4 sm:px-6 py-3.5">
                            <p class="text-gray-700 dark:text-gray-400">{{ $value->stock }}</p>
                        </td>
                        <td class="px-4 sm:px-6 py-3.5">
                            <p class="text-gray-700 dark:text-gray-400">{{ $value->category }}</p>
                        </td>
                        <td class="px-4 sm:px-6 py-3.5">
                            <p class="text-gray-700 dark:text-gray-400">{{ $value->description }}</p>
                        </td>
                        <td class="px-4 my-auto sm:px-6 py-3.5 flex justify-between items-center gap-3">
                            <a href="{{ route('products.edit', $value) }}" class="inline-block text-gray-700 dark:text-gray-400 hover:underline cursor-pointer hover:text-semibold hover:text-blue-500 transition-all duration-300 ease-in-out active:scale-105" >
                                edit
                            </a>
                            <form 
                            action="{{ route('products.destroy', $value) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="text-red-400 hover:underline cursor-pointer hover:text-semibold transition-all duration-300 ease-in-out active:scale-105"
                                >
                                    delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-7">
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
