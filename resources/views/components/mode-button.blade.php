 <button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex .items-end px-4 py-2 bg-black dark:bg-white border border-transparent rounded-md font-semibold text-xs text-white dark:text-black uppercase tracking-widest hover:bg-gray-800 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-300 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 rounded-md']) }}> 
    {{ $slot }}
</button> 


  