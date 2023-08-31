<div class="field">
    <label>Hardware</label>
    <input type="number" name="hardware" value="{{ $hardware['hardware'] }}" required>
</div>
<div class="field">
    <label>Lokasi</label>
    <input type="text" name="location" value="{{ $hardware['location'] }}" required>
</div>
<div class="field">
    <label>Timezone</label>
    <input type="number" name="timezone" value="{{ $hardware['timezone'] }}" required>
</div>
<div class="field">
    <label>Tanggal Lokal</label>
    <input type="date" name="date" value="{{ $hardware['date'] }}" required>
</div>
<div class="field">
    <label>Waktu Lokal</label>
    <input type="text" name="time" value="{{ $hardware['time'] }}" placeholder="hh:mm:ss" required>
</div>
<div class="field">
    <label>Latitude</label>
    <input type="text" name="latitude" value="{{ $hardware['latitude'] }}" required>
</div>
<div class="field">
    <label>Longitude</label>
    <input type="text" name="longitude" value="{{ $hardware['longitude'] }}" required>
</div>
<button type="submit" class="ui teal button">Simpan</button>
<a href="{{ route('hardware.index') }}" class="ui compact labeled icon teal secondary button">
    <i class="arrow left icon"></i>
    Batal
</a>