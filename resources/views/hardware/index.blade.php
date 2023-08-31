<x-volt-app title="Hardware">
    @push('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
    
    <style>
        #map {
            height: 500px;
        }
    </style>
    @endpush
    @if (auth()->user()->hasRole(['Super Admin', 'Admin']))
    <a href="{{ route('hardware.create') }}" class="ui compact labeled icon teal secondary button">
        <i class="plus icon"></i>
        Tambahkan
    </a>
    @endif

    <table class="ui celled table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Hardware</th>
                <th>Lokasi</th>
                <th>Timezone</th>
                <th>Waktu Lokal</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hardwares as $h => $hardware )
                <tr>
                    <td style="width: 10px">{{ $h+1 }} </td>
                    <td>{{ $hardware['hardware'] }}</td>
                    <td>{{ $hardware['location'] }}</td>
                    <td>{{ $hardware['timezone'] }}</td>
                    <td>{{ $hardware['local_time'] }}</td>
                    <td>{{ $hardware['latitude'] }}</td>
                    <td>{{ $hardware['longitude'] }}</td>
                    <td>
                        <a href="{{ route('hardware.show', ['hardware' => $hardware->hardware]) }}"
                            class="ui compact icon teal secondary button">
                            <i class="eye icon"></i>
                        </a>
                        
                        <a href="{{ route('hardware.edit', ['hardware' => $hardware->hardware]) }}"
                            class="ui compact icon teal secondary button">
                            <i class="pencil icon"></i>
                        </a>

                        @if (auth()->user()->hasRole(['Super Admin', 'Admin']))
                            <button form="hardware-{{ $hardware['hardware'] }}" type="submit"
                                class="ui compact icon red secondary button">
                                <i class="trash icon"></i>
                            </button>

                            <form id="hardware-{{ $hardware['hardware'] }}" role="form"
                                action="{{ route('hardware.destroy', ['hardware' => $hardware->hardware]) }}"
                                method="POST"
                                onsubmit="return confirm(`Apa anda yakin ingin menghapus data {{ $hardware['hardware'] }} ?`)">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div id="map"></div>

    @push('script')
        <script>
            var map = L.map('map').setView([0.7893, 113.9213], 5);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);

            @foreach ($hardwares as $hardware)
            var marker_{{ $hardware->hardware }} = L.marker([{{ $hardware->latitude }}, {{ $hardware->longitude }}]).addTo(map);
            marker_{{ $hardware->hardware }}.bindPopup("{{ $hardware->location }}").openPopup();
            @endforeach
            
            // var marker = L.marker([51.5, -0.09]).addTo(map);
        </script>
    @endpush
</x-volt-app>
