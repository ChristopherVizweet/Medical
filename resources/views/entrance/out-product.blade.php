<x-guest-layout>  
    <form method="POST" action="{{ route('out-product') }}">
        @csrf
        <!-- Name -->
        <div class="mt-4">
            <div class=" text-center text-gray-800 dark:text-white">
               <h1>Saliad de productos</h1> 
            </div><br>
</x-guest-layout>