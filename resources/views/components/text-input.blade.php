@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'is-invalid border-gray-300 dark:border-gray-700 dark:bg-white dark:text-black focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600  rounded-md shadow-sm']) }}>
