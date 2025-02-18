<x-app-layout>
    <x-slot name="header">

        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-5">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Exportar dados') }}
                </h2>
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="container">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="list-group">
                        @can('baixar-export')
                            <a href="{{ route('export.candidato') }}" class="list-group-item list-group-item-action">
                                Exportar candidatos <span class="badge badge-success">{{ $candidatos }}</span>
                            </a>
                            <a href="{{ route('export.lote') }}" class="list-group-item list-group-item-action">
                                Exportar Lotes <span class="badge badge-success">{{ $lotes }}</span>
                            </a>
                            <a href="{{ route('export.posto') }}" class="list-group-item list-group-item-action">
                                Exportar Postos <span class="badge badge-success">{{ $postos }}</span>
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>

    </x-slot>
</x-app-layout>
