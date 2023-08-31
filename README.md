# Tes Teknikal Fullstack Developer Muhammad Wahid Hasyim

## Server Requirements
1. PHP 8.x
1. Composer 2

## Local Setup
1. Clone repository
1. Jalankan `composer install`
1. Salin .env.example ke .env
1. Sesuaikan konfigurasi database dan lain-lain
1. Jalankan 'php artisan key:generate'
1. Jalankan 'php artisan migrate:fresh --seed'
1. Jalankan 'php artisan storage:link'
1. Jalankan 'php artisan vendor:publish --tag=laravolt-assets'
1. Pastikan folder-folder berikut _writeable_:
    1. bootstrap/cache
    1. storage
1. Jalankan 'php artisan serve'

## Screenshot

### Sensor
![Sensor](/screenshot/sensor.png)
![Detail Sensor](/screenshot/detail_sensor.png)
![Edit/Tambah Sensor](/screenshot/edit_sensor.png)

### Hardware
![Hardware](/screenshot/hardware.png)
![Detail Hardware](/screenshot/detail_hardware.png)
![Edit/Tambah Hardware](/screenshot/edit_hardware.png)

### Hardware Detail
![Hardware Detail](/screenshot/hardware_detail.png)
![Detail Hardware Detail](/screenshot/detail_hardware_detail.png)
![Edit/Tambah Hardware Detail](/screenshot/edit_hardware_detail.png)

### Laporan
![Laporan Blank](/screenshot/laporan_blank.png)
![Laporan](/screenshot/laporan.png)
![Laporan Pdf](/screenshot/laporan_pdf.png)
![Laporan Excel](/screenshot/laporan_excel.png)