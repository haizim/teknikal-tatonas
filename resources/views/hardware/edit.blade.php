<x-volt-app title="Edit Hardware">
    <x-volt-panel title="Edit Hardware" icon="plus">
        <form method="POST" action="/hardware/{{ $hardware->hardware }}" class="ui form">
            @csrf
            @method('PUT')
            @include('hardware._form')
        </form>
    </x-volt-panel>
</x-volt-app>