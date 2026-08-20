@props([
    'inputTitle',
    'inputName',
    'value'
])
<div>
    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
        {{ $inputTitle }}
    </label>
    <input type="number" name="{{ $inputName }}" value="{{ $value ??  old($inputName) }}"
        @class([
            'dark:bg-dark-900 shadow-theme-xs h-11 w-full rounded-lg border bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:text-white/90 dark:placeholder:text-white/30',
            'border-gray-300 focus:border-brand-300 focus:ring-brand-500/10 dark:border-gray-700 dark:focus:border-brand-800' => ! $errors->has($inputName),
            'border-error-300 focus:border-error-300 focus:ring-error-500/10 dark:border-error-700 dark:focus:border-error-800' => $errors->has($inputName),
        ]) />

    @error($inputName)
        <p class="text-theme-xs text-error-500 mt-1.5">
            {{ $message }}
        </p>
    @enderror
</div>