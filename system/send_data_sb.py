import requests
import random
import time

# URL endpoint Anda
url = 'http://localhost/medical_ftdinus/api_superbright/update/1'

# Fungsi untuk mengirim data ke API
def send_data_to_api(data):
    response = requests.post(url, json=data)  # Mengirim data sebagai JSON
    print(f"Data sent: {data}, Response status: {response.status_code}")

print("Simulasi pengiriman data melalui HTTP request...")

# Membuat array us_asli dengan 3000 elemen
sb_asli = [random.randint(100, 999) for _ in range(3000)]

# Membagi us_asli menjadi 10 bagian dengan masing-masing 300 elemen dan menambahkan '#'
sb1 = sb_asli[0:300] + ['#']
sb2 = sb_asli[300:600] + ['#']
sb3 = sb_asli[600:900] + ['#']
sb4 = sb_asli[900:1200] + ['#']
sb5 = sb_asli[1200:1500] + ['#']
sb6 = sb_asli[1500:1800] + ['#']
sb7 = sb_asli[1800:2100] + ['#']
sb8 = sb_asli[2100:2400] + ['#']
sb9 = sb_asli[2400:2700] + ['#']
sb10 = sb_asli[2700:3000] + ['#']

# Menggabungkan data menjadi JSON
data = {
    'ins_time': time.strftime("%Y-%m-%d %H:%M:%S"),
    'sb1': sb1,
    'sb2': sb2,
    'sb3': sb3,
    'sb4': sb4,
    'sb5': sb5,
    'sb6': sb6,
    'sb7': sb7,
    'sb8': sb8,
    'sb9': sb9,
    'sb10': sb10
}

# Mengirim data ke API
send_data_to_api(data)
