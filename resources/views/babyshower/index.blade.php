<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel de administración Babyshower
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                    <div class="mt-8 text-2xl">
                        Panel de administración de eventos Babyshower
                    </div>

                    <div class="mt-6 text-gray-500">
                        Aquí se listan todos los eventos Babyshower registrados. Para ver más detalles presiona el botón <b>"Ver Detalles"</b> al fnal de cada fila.
                    </div>
                </div>
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-6 text-gray-500">
                        <div class="container mx-auto px-4 sm:px-8">
                            <div class="py-8">
                                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                        <table class="min-w-full leading-normal">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                        Nombre Mamá
                                                    </th>
                                                    <th
                                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                        Nombre Papá
                                                    </th>
                                                    <th
                                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                        Nombre Bebé
                                                    </th>
                                                    <th
                                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                        Fecha babyshower
                                                    </th>
                                                    <th
                                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                        Acciones
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($babyshower as $key => $baby)
                                                <tr>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                                            {{$baby->name_mama}}
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                                            {{$baby->name_papa}}
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                                            {{$baby->name_bebe}}
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                                            {{Carbon\Carbon::parse($baby->event_date)->format('d-m-Y')}}<br>
                                                            <small>{{Carbon\Carbon::parse($baby->date_babyshower)->diffForHumans()}}</small>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <a class="bg-blue-500 hover:bg-blue-600 text-white rounded-full px-10 py-2 transition-colors" href="{{route('edit',$baby->linkEdit)}}">Ver detalles</a>
                                                    </td>
                                                </tr>
                                               @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
