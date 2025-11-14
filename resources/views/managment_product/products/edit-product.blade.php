<x-guest-layout>
    <form method="POST" action="{{ route('edit-product', $products->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mt-4">
            <div class="text-center text-gray-800 dark:text-white">
                EDITAR PRODUCTO
            </div>
 <div class="mt-4 justify-center justify-items-center text-center">
            <x-input-label for="image_product" value="('Foto del producto')"/>
            <x-text-input id="image_product"  class="block mt-1 w-full justify-center justify-items-center text-center" type="file" name="image_product" value/>
            <input type="hidden" name="image_product_actual" value="{{ $products->image_product }}">
 </div> 
            <!-- Mostrar imagen actual -->
@if ($products->image_product)
    <div class="mt-2 justify-center justify-items-center text-center">
        <p class="text-sm text-gray-600 dark:text-gray-300 text-center">Imagen actual:</p>
        <img src="{{ asset('storage/productos/' . $products->image_product) }}" alt="image_product_actual" class="w-16 h-16 object-contain rounded-md mx-auto">
    </div>
@endif
            <x-input-label for="name_product" :value="__('Nombre del producto')" />
            <x-text-input id="name_product" class="block mt-1 w-full" type="text" name="name_product" value="{{ $products->name_product }}" required />

            <x-input-label for="codeExt_product" :value="__('Codigo exterior del producto')" />
            <x-text-input id="codeExt_product" class="block mt-1 w-full" type="text" name="codeExt_product" value="{{ $products->codeExt_product }}"  />

            <x-input-label for="diameterMM_product" :value="__('Diametro(mm)')" />
            <x-text-input id="diameterMM_product" class="block mt-1 w-full" type="text" name="diameterMM_product" value="{{ $products->diameterMM_product }}"  />
            
             <x-input-label for="stock" :value="__('stock')" />
            <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock" value="{{ $products->stock }}"  />

            <x-input-label for="valueArt_product" :value="__('Valor por articulo')" />
            <x-text-input id="valueArt_product" class="block mt-1 w-full" type="number" name="valueArt_product" value="{{ $products->valueArt_product }}" required />
            
           
        </div>
        <div style="text-align: center;" class="mt-4">
            <x-primary-button class="ms-4">
                {{ __('Actualizar') }}
            </x-primary-button>

            <a href="{{ route('index-product') }}" class="ms-4 inline-block px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:bg-gray-500 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ ('Cancelar') }}
            </a>
        </div>
    </form>
     {{---Aqui es para mostrar los errores del sistema---}}

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
        <strong>¡Error!</strong> Revisa los campos marcados. <br>
        <ul class="mt-2 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</x-guest-layout>