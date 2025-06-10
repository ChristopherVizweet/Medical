<x-guest-layout>  
    <form method="POST" action="{{ route('create-entrance') }}">
        @csrf

        <!-- Name -->
        <div class="mt-4">
           
            <div class=" text-center text-gray-800 dark:text-white">
               <h1>Agregar existencia</h1> 
            </div><br>
            <!--AQUI COMIENZA EL REGISTRO FALTA HACER UN SELECT CON LA ENTIDAD PRODUCT-->

            <select class="" name="id_categories" id="id_categories" required>
                <option value="">-- Selecciona una categoría --</option> 
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->name_categories }}</option><br>
                @endforeach
            </select>

             <select class="" name="id" id="id" required>
                <option value="">-- Nombre del producto --</option> 
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name_product }}</option><br>
                @endforeach
            </select>


            <x-input-label  for="name_product" :value="__('Cantidad a ingresar')" />
            <x-text-input id="name_product" class="block mt-1 w-full is-invalid " type="number" name="name_product" :value="old('name_product')" required autocomplete="off"/>
            <x-input-error :messages="$errors->get('name_product')" class="mt-2 is-invalid" /><br>

            <x-input-label  for="name_product" :value="__('Categoria')" />
            <x-text-input id="name_product" class="block mt-1 w-full is-invalid " type="text" name="name_product" :value="old('name_product')" required autocomplete="off" />
            <x-input-error :messages="$errors->get('name_product')" class="mt-2 is-invalid" /><br>

            <x-input-label  for="name_product" :value="__('Fecha')" />
            <input type="datetime-local" id="fecha_hora" name="fecha_hora" value="<?php echo date('Y-m-d\TH:i'); ?>" >
        
            <div style="text-align: center;" class="mt-4">
           <x-primary-button class="ms-4 ">
                Registrar
            </x-primary-button>
           
            <a href="{{ route('index-entrance') }}" class="ms-4 inline-block px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:bg-gray-500 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Cancelar
            </a>
        </div>
    </form>
</x-guest-layout>
