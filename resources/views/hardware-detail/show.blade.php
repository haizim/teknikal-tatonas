<x-volt-app title="Detail Hardware Detail">

    <x-volt-panel title="Detail Hardware Detail" icon="microchip">
        <div class="ui stackable column grid">
            <div class="three wide column right aligned">ID :</div>
            <div class="nine wide column"><b>{{ $detail['id']}}</b></div>
        </div>
        <div class="ui stackable column grid">
            <div class="three wide column right aligned">Hardware :</div>
            <div class="nine wide column"><b>{{ $detail['hardware']}}</b></div>
        </div>
        <div class="ui stackable column grid">
            <div class="three wide column right aligned">Sensor :</div>
            <div class="nine wide column"><b>{{ $detail['sensor']}}</b></div>
        </div>
        <br>
        <a href="{{ route('hardware-detail.index') }}"
            class="ui compact labeled icon teal secondary button">
            <i class="arrow left icon"></i>
            Kembali
        </a>
    </x-volt-panel>
</x-volt-app>