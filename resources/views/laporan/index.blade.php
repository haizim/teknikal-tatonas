<x-volt-app title="Laporan">
    <form class="ui form">
        <div class="four fields">
            <div class="field">
                <label>Date From</label>
                <input type="date" name="date_from" id="date_from" value="{{ $request->date_from ?? '' }}">
            </div>
            <div class="field">
                <label>Date End</label>
                <input type="date" name="date_end" id="date_end" value="{{ $request->date_end ?? '' }}">
            </div>
            <div class="field">
                <label>Hardware</label>
                <select class="ui fluid dropdown" name="hardware" required>
                    <option>Pilih Hardware</option>
                    @foreach ($hardwares as $hardware)
                        @php
                            $selected = $request['hardware'] == $hardware->hardware ? 'selected' : '';
                        @endphp
                        <option value="{{ $hardware->hardware }}" {{ $selected }}>
                            {{ "$hardware->hardware - $hardware->location" }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <div class="bottom aligned content">
                    <button type="submit" class="ui teal secondary button">Load Data</button>
                </div>
            </div>
        </div>
    </form>

    <b>Location</b> : {{ $transaksi[0]->hardwares->location ?? '' }} <br>
    <b>Coordinate</b> : {{ $transaksi[0]->hardwares->latitude ?? '' }}, {{ $transaksi[0]->hardwares->longitude ?? '' }} <br>
    <b>Last Send</b> : {{ $transaksi[count($transaksi)-1]->created_at ?? '' }} <br>
    <b>Maximal Value</b> : {{ $max }}<br>
    <b>Minimal Value</b> : {{ $min }}<br>

    @if (isset($transaksi[0]))
    <canvas id="chartId" aria-label="chart" heigth="350" width="580"></canvas>
    @endif

    <table class="ui celled table">
        <thead>
            <tr>
                <th style="width: 10px">Nomor</th>
                <th>Local Time</th>
                @foreach ($sensors as $sensor)
                    <th>{{ $sensor->sensor_name }} ({{ $sensor->unit }})</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($tables as $t => $table )
                <tr>
                    <td>{{ $t + 1 }}</td>
                    <td>{{ $table['local_time'] }}</td>
                    @foreach ($sensors as $sensor)
                        <td>{{ $table[$sensor->sensor] }} </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    @if (isset($transaksi[0]))
        <a
            href="{{ route('laporan-excel') }}?date_from={{ $request->date_from }}&date_end={{ $request->date_end }}&hardware={{ $request->hardware }}"
        class="ui teal button">Download Excel</a>
        <a
            href="{{ route('laporan-pdf') }}?date_from={{ $request->date_from }}&date_end={{ $request->date_end }}&hardware={{ $request->hardware }}"
        class="ui red button">Download PDF</a>
    @endif
    
    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var labels = '{{ strval($label) }}'
            labels = labels.replaceAll("&quot;", '"')
            labels = JSON.parse(labels)

            var datasets = '{{ strval($dataset) }}'
            datasets = datasets.replaceAll("&quot;", '"')
            datasets = JSON.parse(datasets)

            var chrt = document.getElementById("chartId").getContext("2d");
            var chartId = new Chart(chrt, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: datasets,
                },
                options: {
                    responsive: false,
                },
            });
        </script>
    @endpush
    
</x-volt-app>