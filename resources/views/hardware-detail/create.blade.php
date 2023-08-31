<x-volt-app title="Tambahkan Hardware Detail">
    <x-volt-panel title="Tambahkan Hardware Detail" icon="plus">
        <form method="POST" action="/hardware-detail" class="ui form">
            @csrf
            @include('hardware-detail._form')
        </form>
    </x-volt-panel>
</x-volt-app>