import requests
import random
import time

# URL endpoint Anda
url = 'http://localhost/medical_ftdinus/api_ultrasound/create'

# Fungsi untuk mengirim data ke API
def send_data_to_api(data):
    response = requests.post(url, json=data)  # Mengirim data sebagai JSON
    print(f"Data sent: {data}, Response status: {response.status_code}")

print("Simulasi pengiriman data melalui HTTP request...")

# Membuat array us_asli dengan 3000 elemen
us_asli = [random.randint(100, 999) for _ in range(3000)]

# Membagi us_asli menjadi 10 bagian dengan masing-masing 300 elemen dan menambahkan '#'
us1 = us_asli[0:300] + ['#']
us2 = us_asli[300:600] + ['#']
us3 = us_asli[600:900] + ['#']
us4 = us_asli[900:1200] + ['#']
us5 = us_asli[1200:1500] + ['#']
us6 = us_asli[1500:1800] + ['#']
us7 = us_asli[1800:2100] + ['#']
us8 = us_asli[2100:2400] + ['#']
us9 = us_asli[2400:2700] + ['#']
us10 = us_asli[2700:3000] + ['#']

# Menggabungkan data menjadi JSON
data = {
    'id_pasien': '123456',
    'ins_time': time.strftime("%Y-%m-%d %H:%M:%S"),
    'us1': us1,
    'us2': us2,
    'us3': us3,
    'us4': us4,
    'us5': us5,
    'us6': us6,
    'us7': us7,
    'us8': us8,
    'us9': us9,
    'us10': us10
}

# Mengirim data ke API
send_data_to_api(data)
