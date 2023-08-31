<x-volt-app title="Detail Sensor">

    <x-volt-panel title="Detail Sensor" icon="sensor">
        <div class="ui stackable column grid">
            <div class="three wide column right aligned">Sensor :</div>
            <div class="nine wide column"><b>{{ $sensor['sensor']}}</b></div>
        </div>
        <div class="ui stackable column grid">
            <div class="three wide column right aligned">Nama Sensor :</div>
            <div class="nine wide column"><b>{{ $sensor['sensor_name']}}</b></div>
        </div>
        <div class="ui stackable column grid">
            <div class="three wide column right aligned">Unit :</div>
            <div class="nine wide column"><b>{{ $sensor['unit']}}</b></div>
        </div>
        <div class="ui stackable column grid">
            <div class="three wide column right aligned">Dibuat oleh :</div>
            <div class="nine wide column"><b>{{ $sensor['created_by']}}</b></div>
        </div>
        <div class="ui stackable column grid">
            <div class="three wide column right aligned">Dibuat pada :</div>
            <div class="nine wide column"><b>{{ $sensor['created_at']}}</b></div>
        </div>
        <br>
        <a href="{{ route('sensor.index') }}" class="ui compact labeled icon teal secondary button">
            <i class="arrow left icon"></i>
            Kembali
        </a>
    </x-volt-panel>
</x-volt-app>