<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barangay Health Workers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    
                    @role('Admin')
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th>
                                                {{ __('Sitio Assignment') }}
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ID
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Assign Sitio</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($bhws as $bhw)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $bhw->id }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $bhw->lastname }}, {{ $bhw->firstname }} {{ $bhw->middlename }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <label for="sitio">Assign A Sitio:</label>
                                                    <select id="sitio" name="sitio">
                                                        <option value="0">NONE</option>
                                                        @foreach ($sitios as $sitio)
                                                            <option value={{$sitio->id}}>{{ $sitio->sitioName }}</option>
                                                        @endforeach
                                                    </select>
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                <div class="mt-4">
                                    <x-button>
                                        Assign
                                    </x-button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
