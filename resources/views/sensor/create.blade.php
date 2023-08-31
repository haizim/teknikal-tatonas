<x-volt-app title="Tambahkan Sensor">
    <x-volt-panel title="Tambahkan Sensor" icon="plus">
        <form method="POST" action="/sensor" class="ui form">
            @csrf
            @include('sensor._form')
        </form>
    </x-volt-panel>
</x-volt-app>