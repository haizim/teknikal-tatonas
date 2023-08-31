<x-volt-app title="Detail Hardware">

    <x-volt-panel title="Detail Hardware" icon="server">
        <div class="ui stackable column grid">
            <div class="three wide column right aligned">Hardware :</div>
            <div class="nine wide column"><b>{{ $hardware['hardware']}}</b></div>
        </div>
        <div class="ui stackable column grid">
            <div class="three wide column right aligned">Lokasi :</div>
            <div class="nine wide column"><b>{{ $hardware['location']}}</b></div>
        </div>
        <div class="ui stackable column grid">
            <div class="three wide column right aligned">Timezone :</div>
            <div class="nine wide column"><b>{{ $hardware['timezone']}}</b></div>
        </div>
        <div class="ui stackable column grid">
            <div class="three wide column right aligned">Waktu Lokal :</div>
            <div class="nine wide column"><b>{{ $hardware['local_time']}}</b></div>
        </div>
        <div class="ui stackable column grid">
            <div class="three wide column right aligned">Latitude :</div>
            <div class="nine wide column"><b>{{ $hardware['latitude']}}</b></div>
        </div>
        <div class="ui stackable column grid">
            <div class="three wide column right aligned">Longitude :</div>
            <div class="nine wide column"><b>{{ $hardware['longitude']}}</b></div>
        </div>

        <div class="ui stackable column grid">
            <div class="three wide column right aligned">Dibuat oleh :</div>
            <div class="nine wide column"><b>{{ $hardware['created_by']}}</b></div>
        </div>
        <div class="ui stackable column grid">
            <div class="three wide column right aligned">Dibuat pada :</div>
            <div class="nine wide column"><b>{{ $hardware['created_at']}}</b></div>
        </div>
        <br>
        <a href="{{ route('hardware.index') }}" class="ui compact labeled icon teal secondary button">
            <i class="arrow left icon"></i>
            Kembali
        </a>
    </x-volt-panel>
</x-volt-app>