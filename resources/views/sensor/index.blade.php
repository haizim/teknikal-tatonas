<x-volt-app title="Sensor">
    @if (auth()->user()->hasRole(['Super Admin', 'Admin']))
    <a href="{{ route('sensor.create') }}" class="ui compact labeled icon teal secondary button">
        <i class="plus icon"></i>
        Tambahkan
    </a>
    @endif

    <table class="ui celled table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Sensor</th>
                <th>Nama Sensor</th>
                <th>Unit</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sensors as $s => $sensor )
                <tr>
                    <td style="width: 10px">{{ $s+1 }} </td>
                    <td>{{ $sensor['sensor'] }}</td>
                    <td>{{ $sensor['sensor_name'] }}</td>
                    <td>{{ $sensor['unit'] }}</td>
                    <td>
                        <a href="{{ route('sensor.show', ['sensor' => $sensor->sensor]) }}"
                            class="ui compact icon teal secondary button">
                            <i class="eye icon"></i>
                        </a>
                        @if (auth()->user()->hasRole(['Super Admin', 'Admin']))
                            <a href="{{ route('sensor.edit', ['sensor' => $sensor->sensor]) }}"
                                class="ui compact icon teal secondary button">
                                <i class="pencil icon"></i>
                            </a>
                            <button form="sensor-{{ $sensor['sensor'] }}" type="submit"
                                class="ui compact icon red secondary button">
                                <i class="trash icon"></i>
                            </button>

                            <form id="sensor-{{ $sensor['sensor'] }}" role="form"
                                action="{{ route('sensor.destroy', ['sensor' => $sensor->sensor]) }}"
                                method="POST"
                                onsubmit="return confirm(`Apa anda yakin ingin menghapus data {{ $sensor['sensor'] }} ?`)">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-volt-app>
