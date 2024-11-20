<div x-show="showAlerta" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50" style="display: none;">
    <div class="p-4 bg-white rounded-lg w-1/3 shadow-lg">
        <!-- Título -->
        <h3 class="text-lg font-bold text-red-800">{{ $titulo }}</h3>

        <!-- Contenido -->
        <p class="mt-2 text-sm text-gray-700">{{ $contenido }}</p>

        <!-- Botones -->
        <div class="flex mt-4 space-x-4 justify-end">
            <button @click="confirmarAccion(); showAlerta=false" class="px-4 py-2 text-white bg-red-800 hover:bg-red-700 rounded">Confirmar</button>
            <button @click="showAlerta = false" class="px-4 py-2 text-gray-800 bg-gray-200 hover:bg-gray-300 rounded">Cancelar</button>
        </div>
    </div>
</div>
