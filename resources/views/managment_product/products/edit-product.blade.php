<x-guest-layout>
    <form method="POST" action="{{ route('edit-product', $products->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mt-4">
            <div class="text-center text-gray-800 dark:text-white">
                EDITAR PRODUCTO
            </div>
            <x-input-label for="name_product" :value="__('Nombre del producto')" />
            <x-text-input id="name_product" class="block mt-1 w-full" type="text" name="name_product" value="{{ $products->name_product }}" required />

            <x-input-label for="codeExt_product" :value="__('Codigo exterior del producto')" />
            <x-text-input id="codeExt_product" class="block mt-1 w-full" type="text" name="codeExt_product" value="{{ $products->codeExt_product }}"  />

            <x-input-label for="codeInt_product" :value="__('Codigo interior del producto')" />
            <x-text-input id="codeInt_product" class="block mt-1 w-full" type="text" name="codeInt_product" value="{{ $products->codeInt_product }}"  />

            <x-input-label for="diameterMM_product" :value="__('Diametro(mm)')" />
            <x-text-input id="diameterMM_product" class="block mt-1 w-full" type="text" name="diameterMM_product" value="{{ $products->diameterMM_product }}"  />

            <x-input-label for="diameterIN_product" :value="__('Diametro(in)')" />
            <x-text-input id="diameterIN_product" class="block mt-1 w-full" type="text" name="diameterIN_product" value="{{ $products->diameterIN_product }}" />

            <x-input-label for="manufact_product" :value="__('Fabricante')" />
            <x-text-input id="manufact_product" class="block mt-1 w-full" type="text" name="manufact_product" value="{{ $products->manufact_product }}"  />
            
             <x-input-label for="stock" :value="__('stock')" />
            <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock" value="{{ $products->stock }}"  />

            <x-input-label for="valueArt_product" :value="__('Valor por articulo')" />
            <x-text-input id="valueArt_product" class="block mt-1 w-full" type="text" name="valueArt_product" value="{{ $products->valueArt_product }}" required />
            
            <x-input-label for="image_product" :value="('Imagen del producto')"/>
            <x-text-input id="image_product" class="block mt-1 w-full" type="file" name="image_product" value="{{$products->image_product}}" required/>
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