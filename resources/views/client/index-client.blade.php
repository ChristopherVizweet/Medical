<x-app-layout>
    <x-slot name="header">
         <!--Boton para cambiar el modo oscuro/claro-->
<x-mode-button id="theme-toggle" class="float-right " >
    Modo escuro/claro
 </x-mode-button>
 <script>
    document.addEventListener("DOMContentLoaded", function () {
        const themeToggle = document.getElementById("theme-toggle");
        const body = document.documentElement; 
        const currentTheme = localStorage.getItem("theme");
 
        if (currentTheme === "dark") {
            body.classList.add("dark");
        } else {
            body.classList.remove("dark");
        }
 
        themeToggle.addEventListener("click", function () {
            if (body.classList.contains("dark")) {
                body.classList.remove("dark");
                localStorage.setItem("theme", "light");
            } else {
                body.classList.add("dark");
                localStorage.setItem("theme", "dark");
            }
        });
    });
 </script>  
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Clientes
        </h2>            
    </x-slot>
    <div class="container mx-auto mt-8">
            @if (session('success'))
                <div class="fade-out bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
           
            <h1 class="text-2xl dark:text-white font-bold mb-4">Lista de clientes</h1>
            
            <table class="table-auto w-full border-collapse bg-white shadow-md">
                <thead class="bg-gray-100">
                    <form action="{{ route('index-client') }}" method="GET">
                        <div class="float-right text-dark dark:text-white">
                            <label class=" text-black dark:text-white text-base font-sans">Buscar por RFC</label>
                            <select class="text-black dark:text-black" name="RFC" id="RFC" required onchange="this.form.submit()">
                                <option class="text-center text-black dark:text-black" value="">--Todos--</option> 
                                @foreach ($clients as $client)
                                <option class="text black dark:text-black" value="{{ $client->RFC }}" {{ request('RFC') == $client->RFC ? 'selected' : '' }}>
                                    {{ $client->RFC }}
                                </option><br>
                                @endforeach
                            </select>
                           
                        </div>


                    <div class="float-right text-dark dark:text-white">
                            <label class=" text-black dark:text-white text-base font-sans">Buscar por Nombre</label>
                            <input class="text-black dark:text-black" placeholder="Escriba el nombre" name="name_Client" id="name_Client" required onchange="this.form.submit()">
                    </div>
                    </form>
                    <script>
    document.getElementById('RFC').addEventListener('change', function () {
        const rfcValue = this.value;
        const nameInput = document.getElementById('name_Client');

        // Si selecciona "Todos", borrar campo de nombre
        if (rfcValue === '') {
            nameInput.value = '';
        }
        if (nameInput=== ''){
            nameInput.value= '';
        }

        document.getElementById('filterForm').submit();
    });

    document.getElementById('name_Client').addEventListener('change', function () {
        document.getElementById('filterForm').submit();
    });
</script>
                    <tr>
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Nombre</th>
                        <th class="px-4 py-2 border">Dirección</th>
                        <th class="px-4 py-2 border">Telefono</th>
                        <th class="px-4 py-2 border">Email</th>
                        <th class="px-4 py-2 border">RFC</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td class="border px-4 py-2">{{ $client->id }}</td>
                            <td class="border px-4 py-2">{{ $client->name_Client }}</td>
                            <td class="border px-4 py-2">{{ $client->address_Client }}</td>
                            <td class="border px-4 py-2">{{ $client->phoneNumber_Client }}</td>
                            <td class="border px-4 py-2">{{ $client->email_Client }}</td>
                            <td class="border px-4 py-2">{{ $client->RFC }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-black dark:text-dark-100 text-center">
                               <a href="{{ route('edit_client', $client->id) }}" class="text-blue-600 hover:underline">Editar</a> |
                               <form action="{{ route('delete_client', $client->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('{{ __('¿Estas seguro de eliminar a este cliente?') }}')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <x-primary-button class="mt-4">
                <a href="{{ route('create-client') }}" class="text-dark"> 
                     {{ __('Crear cliente') }}
                 </a> 
            </x-primary-button>
        </table>
    </div>
</x-app-layout>