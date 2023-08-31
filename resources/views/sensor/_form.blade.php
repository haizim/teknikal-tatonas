<div class="field">
    <label>Sensor</label>
    <input type="text" name="sensor" value="{{ $sensor['sensor'] }}" required>
</div>
<div class="field">
    <label>Nama Sensor</label>
    <input type="text" name="sensor_name" value="{{ $sensor['sensor_name'] }}" required>
</div>
<div class="field">
    <label>Unit</label>
    <input type="text" name="unit" value="{{ $sensor['unit'] }}" required>
</div>
<button type="submit" class="ui teal button">Simpan</button>
<a href="{{ route('sensor.index') }}" class="ui compact labeled icon teal secondary button">
    <i class="arrow left icon"></i>
    Batal
</a>