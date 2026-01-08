<x-app-layout>
    <x-slot name="header">
        <x-mode-button id="theme-toggle" class="text-sm float-right">
                Modo oscuro/claro
</x-mode-button>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white">
            Reporte de Gastos
        </h2>
         
    </x-slot>

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
    <div class="container mx-auto mt-6 px-4">
        {{--Aqui esta es la tabla de los gastos--}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white">Gastos Registrados</h3>
            </div>
             
            @if($payments->count() > 0)
                <div class="overflow-x-auto">
                    <button></button>
                    <table class="w-full text-sm">
                        <thead class="bg-gray-100 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                            <tr>
                                <th class="px-6 py-3 text-left font-semibold text-gray-700 dark:text-gray-300">Concepto</th>
                                <th class="px-6 py-3 text-left font-semibold text-gray-700 dark:text-gray-300">Fecha de Registro</th>
                                <th class="px-6 py-3 text-left font-semibold text-gray-700 dark:text-gray-300">Folio</th>
                                <th class="px-6 py-3 text-left font-semibold text-gray-700 dark:text-gray-300">Método de Pago</th>
                                <th class="px-6 py-3 text-left font-semibold text-gray-700 dark:text-gray-300">Empleado</th>
                                <th class="px-6 py-3 text-right font-semibold text-gray-700 dark:text-gray-300">Subtotal</th>
                                <th class="px-6 py-3 text-right font-semibold text-gray-700 dark:text-gray-300">IVA</th>
                                <th class="px-6 py-3 text-right font-semibold text-gray-700 dark:text-gray-300">Total</th>
                                <th class="px-6 py-3 text-center font-semibold text-gray-700 dark:text-gray-300">Comprobante</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($payments as $payment)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                    <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $payment->concepto }}</td>
                                    <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $payment->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $payment->folio ?? '-' }}</td>
                                    <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $payment->metodo_pago }}</td>
                                    <td class="px-6 py-4 text-gray-800 dark:text-gray-200">
                                        <span class="inline-block bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded px-3 py-1 text-xs font-semibold">
                                            {{ optional($payment->empleado)->full_name ?? 'ID: '.$payment->empleados_id }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right text-gray-800 dark:text-gray-200 font-semibold">${{ number_format($payment->subtotal, 2) }}</td>
                                    <td class="px-6 py-4 text-right text-gray-800 dark:text-gray-200 font-semibold">${{ number_format($payment->iva, 2) }}</td>
                                    <td class="px-6 py-4 text-right text-gray-800 dark:text-gray-200 font-bold text-green-600 dark:text-green-400">${{ number_format($payment->total, 2) }}</td>
                                    <td class="px-6 py-4 text-center">
                                        @if($payment->comprobante_path)
                                            <div class="flex justify-center">
                                                <a href="{{ asset('storage/' . $payment->comprobante_path) }}" target="_blank" class="inline-flex items-center justify-center w-10 h-10 bg-blue-500 hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-800 text-white rounded transition-colors" title="Ver comprobante">
                                                    📄
                                                </a>
                                            </div>
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="px-6 py-8 text-center">
                    <p class="text-gray-600 dark:text-gray-400">No hay gastos registrados</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>