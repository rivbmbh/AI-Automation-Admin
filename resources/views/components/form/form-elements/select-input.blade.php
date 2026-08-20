@props([
    'inputTitle',
    'inputName',
    'value' => '',
    'data' => []
])

<div>
    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
        {{ $inputTitle }}
    </label>
    <div x-data="{ isOptionSelected: {{ $value !== '' ? 'true' : 'false' }} }" class="relative z-20 bg-transparent">
        <select
            name="{{ $inputName }}"
            @class([
                'dark:bg-dark-900 shadow-theme-xs h-11 w-full appearance-none rounded-lg border bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:text-white/90 dark:placeholder:text-white/30',
                'border-gray-300 focus:border-brand-300 focus:ring-brand-500/10 dark:border-gray-700 dark:focus:border-brand-800' => ! $errors->has($inputName),
                'border-error-300 focus:border-error-300 focus:ring-error-500/10 dark:border-error-700 dark:focus:border-error-800' => $errors->has($inputName),
            ])
            :class="isOptionSelected && 'text-gray-800 dark:text-white/90'" @change="isOptionSelected = true">
            <option disabled value="" @selected($value === '') class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                Select Option
            </option>
            @foreach ($data as $option)
                <option
                    value="{{ $option }}"
                    @selected($value === $option)
                    class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                    {{ $option }}
                </option>
            @endforeach
        </select>
        <span
            class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </span>
    </div>

    @error($inputName)
        <p class="text-theme-xs text-error-500 mt-1.5">
            {{ $message }}
        </p>
    @enderror
</div>