<x-volt-app title="Hardware Detail">
    @if (auth()->user()->hasRole(['Super Admin', 'Admin']))
    <a href="{{ route('hardware-detail.create') }}" class="ui compact labeled icon teal secondary button">
        <i class="plus icon"></i>
        Tambahkan
    </a>
    @endif

    <table class="ui celled table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hardware</th>
                <th>Sensor</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $detail )
                <tr>
                    <td>{{ $detail['id'] }}</td>
                    <td>{{ $detail->hardware . " - " . $detail->hardwares->location }}</td>
                    <td>{{ $detail->sensor . " - " . $detail->sensors->sensor_name }}</td>
                    <td>
                        <a href="{{ route('hardware-detail.show', ['hardware_detail' => $detail->id]) }}"
                            class="ui compact icon teal secondary button">
                            <i class="eye icon"></i>
                        </a>
                        
                        <a href="{{ route('hardware-detail.edit', ['hardware_detail' => $detail->id]) }}"
                            class="ui compact icon teal secondary button">
                            <i class="pencil icon"></i>
                        </a>

                        @if (auth()->user()->hasRole(['Super Admin', 'Admin']))
                            <button form="detail-{{ $detail['id'] }}" type="submit"
                                class="ui compact icon red secondary button">
                                <i class="trash icon"></i>
                            </button>

                            <form id="detail-{{ $detail['id'] }}" role="form"
                                action="{{ route('hardware-detail.destroy', ['hardware_detail' => $detail->id]) }}"
                                method="POST"
                                onsubmit="return confirm(`Apa anda yakin ingin menghapus data {{ $detail['id'] }} ?`)">
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
