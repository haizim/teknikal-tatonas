<x-volt-app title="Edit Sensor">
    <x-volt-panel title="Edit Sensor" icon="plus">
        <form method="POST" action="/sensor/{{ $sensor->sensor }}" class="ui form">
            @csrf
            @method('PUT')
            @include('sensor._form')
        </form>
    </x-volt-panel>
</x-volt-app>