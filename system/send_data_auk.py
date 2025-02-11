import requests
import random
import time

# URL endpoint Anda
url = 'http://localhost/medical_ftdinus/api_auk/update/1'

# Fungsi untuk mengirim data ke API
def send_data_to_api(data):
    response = requests.post(url, json=data)  # Mengirim data sebagai JSON
    print(f"Data sent: {data}, Response status: {response.status_code}")

print("Simulasi pengiriman data melalui HTTP request...")

# Membuat array auk_asli dengan 3000 elemen
auk_asli = [random.randint(100, 999) for _ in range(3000)]

# Membagi auk_asli menjadi 10 bagian dengan masing-masing 300 elemen dan menambahkan '#'
violet = auk_asli[0:300] + ['#']
blue = auk_asli[300:600] + ['#']
green = auk_asli[600:900] + ['#']
yellow = auk_asli[900:1200] + ['#']
orange = auk_asli[1200:1500] + ['#']
red = auk_asli[1500:1800] + ['#']

# Menggabungkan data menjadi JSON
data = {
    'ins_time': time.strftime("%Y-%m-%d %H:%M:%S"),
    'violet': violet,
    'blue': blue,
    'green': green,
    'yellow': yellow,
    'orange': orange,
    'red': red
}

# Mengirim data ke API
send_data_to_api(data)
