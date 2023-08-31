<div class="field">
    <label>Hardware</label>
    <select class="ui fluid dropdown" name="hardware" required>
        <option>Pilih Hardware</option>
        @foreach ($hardwares as $hardware)
            @php
                $selected = $detail['hardware'] == $hardware->hardware ? 'selected' : '';
            @endphp
            <option value="{{ $hardware->hardware }}" {{ $selected }}>
                {{ "$hardware->hardware - $hardware->location" }}
            </option>
        @endforeach
    </select>
</div>
<div class="field">
    <label>Sensor</label>
    <select class="ui fluid dropdown" name="sensor" required>
        <option>Pilih Sensor</option>
        @foreach ($sensors as $sensor)
            @php
                $selected = $detail['sensor'] == $sensor->sensor ? 'selected' : '';
            @endphp
            <option value="{{ $sensor->sensor }}" {{ $selected }}>
                {{ "$sensor->sensor - $sensor->sensor_name" }}
            </option>
        @endforeach
    </select>
</div>
<button type="submit" class="ui teal button">Simpan</button>
<a href="{{ route('hardware-detail.index') }}" class="ui compact labeled icon teal secondary button">
    <i class="arrow left icon"></i>
    Batal
</a>