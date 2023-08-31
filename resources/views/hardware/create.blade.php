<x-volt-app title="Tambahkan Hardware">
    <x-volt-panel title="Tambahkan Hardware" icon="plus">
        <form method="POST" action="/hardware" class="ui form">
            @csrf
            @include('hardware._form')
        </form>
    </x-volt-panel>
</x-volt-app>