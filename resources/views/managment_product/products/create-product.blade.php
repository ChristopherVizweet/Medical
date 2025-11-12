
<x-guest-layout>  
    <form method="POST" action="{{ route('create-product') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div class="mt-4">
           
            <div class=" text-center text-gray-800 dark:text-white">
               <h1>REGISTRAR PRODUCTO</h1> 
            </div><br>
           
            <x-input-label  for="name_product" :value="__('Categoría')" />
            <select class="mb-2" name="id_categories" id="id_categories" required>
                <option value="">-- Selecciona una categoría --</option> 
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->name_categories }}</option><br>
                @endforeach
            </select>

            <x-input-label  for="name_product" :value="__('Nombre del producto')" />
            <x-text-input id="name_product" class="block mt-1 w-full is-invalid " type="text" name="name_product" :value="old('name_product')" required />
            <x-input-error :messages="$errors->get('name_product')" class="mt-2 is-invalid" /><br>

                <select class="mb-2" name="id_supplier" id="id_supplier" :value="__('Proveedor')" required>
                    <option value="">-- Selecciona un proveedor --</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name_supplier }}</option>
                    @endforeach
                </select>
                <x-input-label  for="codeExt_product" :value="__('Código exterior')" />
                <x-text-input id="codeExt_product" class="block mt-1 w-full is-invalid " type="text" name="codeExt_product" :value="old('codeExt_product')" required />
                <x-input-error :messages="$errors->get('codeExt_product')" class="mt-2 is-invalid" />

                  
                    <x-input-label  for="diameterMM_product" :value="__('Diametro(mm)')" />
                <x-text-input id="diameterMM_product" class="block mt-1 w-full is-invalid " type="text" name="diameterMM_product" :value="old('diameterMM_product')" required />
                <x-input-error :messages="$errors->get('codeInt_product')" class="mt-2 is-invalid" />


                    <x-input-label for="stock" :value="('Stock')" />
                    <input id="stock" class="block mt-1 w-full" type="number" name="stock" />
                    <x-input-error :messages="$errors->get('stock')" class="mt-2 is-invalid" />

                        <x-input-label  for="valueArt_product" :value="__('Valor por articulo')" />
                    <x-text-input id="valueArt_product" class="block mt-1 w-full is-invalid " type="text" name="valueArt_product" :value="old('valueArt_product')" required />
                    <x-input-error :messages="$errors->get('valueArt_product')" class="mt-2 is-invalid" />

                        <x-input-label for="image_product" :value="('Imagen del Producto')" />
                    <input id="image_product" class="block mt-1 w-full" type="file" name="image_product" />
                    <x-input-error :messages="$errors->get('image_product')" class="mt-2 is-invalid" />
        </div>
        <div style="text-align: center;" class="mt-4">
           <x-primary-button class="ms-4 ">
                Registrar
            </x-primary-button>
           
            <a href="{{ route('index-product') }}" class="ms-4 inline-block px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:bg-gray-500 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Cancelar
            </a>
        </div>
    </form>
</x-guest-layout>

