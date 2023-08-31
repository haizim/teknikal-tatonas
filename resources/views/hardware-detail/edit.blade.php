<x-volt-app title="Edit Hardware Detail">
    <x-volt-panel title="Edit Hardware Detail" icon="plus">
        <form method="POST" action="/hardware-detail/{{ $detail->id }}" class="ui form">
            @csrf
            @method('PUT')
            @include('hardware-detail._form')
        </form>
    </x-volt-panel>
</x-volt-app>