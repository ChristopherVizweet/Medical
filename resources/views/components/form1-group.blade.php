{{-- resources/views/components/form-group.blade.php --}}
@props(['label', 'value', 'name','id'])

<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
        {{ $label }}
    </label>
    <input 
        type="text" 
        name="{{ $name }}"
        id="{{ $id }}"
        value="{{ old($name, $value) }}"
        class="w-full px-4 py-2 rounded-md bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-200 border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500"
    >
</div>