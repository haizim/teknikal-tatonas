<div>
    <b>Date From</b> : {{ $request['date_from'] ?? '' }} <br>
    <b>Date End</b> : {{ $request['date_end'] ?? '' }} <br>
    <b>Hardware</b> : {{ $request['hardware'] ?? '' }} <br>
    <b>Location</b> : {{ $transaksi[0]->hardwares->location ?? '' }} <br>
    <b>Coordinate</b> : {{ $transaksi[0]->hardwares->latitude ?? '' }}, {{ $transaksi[0]->hardwares->longitude ?? '' }} <br>
    <b>Last Send</b> : {{ $transaksi[count($transaksi)-1]->created_at ?? '' }} <br>
    <b>Maximal Value</b> : {{ $max }}<br>
    <b>Minimal Value</b> : {{ $min }}<br>

    <br>
    
    <table style="width: 100%; border: 1px solid #111111;">
        <thead>
            <tr style="border: 1px solid #111111;">
                <th style="width: 10px; border: 1px solid #111111;">Nomor</th>
                <th style="border: 1px solid #111111;">Local Time</th>
                @foreach ($sensors as $sensor)
                    <th style="border: 1px solid #111111;">{{ $sensor->sensor_name }} ({{ $sensor->unit }})</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($tables as $t => $table )
                <tr style="border: 1px solid #111111;">
                    <td style="border: 1px solid #111111;">{{ $t + 1 }}</td>
                    <td style="border: 1px solid #111111;">{{ $table['local_time'] }}</td>
                    @foreach ($sensors as $sensor)
                        <td style="border: 1px solid #111111;">{{ $table[$sensor->sensor] }} </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>