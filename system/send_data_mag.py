import requests
import random
import time
import string


# URL endpoint Anda
url = 'http://localhost/medical_ftdinus/api_magnetik/update/1'

# Fungsi untuk mengirim data ke API
def send_data_to_api(data):
    response = requests.post(url, json=data)  # Mengirim data sebagai JSON
    print(f"Data sent: {data}, Response status: {response.status_code}")

print("Simulasi pengiriman data melalui HTTP request...")

# Membuat array mag_asli dengan 12000 elemen berupa string acak dengan panjang 6 karakter
mag_asli = [''.join(random.choices(string.ascii_letters + string.digits, k=4)) for _ in range(50000)]

# Membagi mag_asli menjadi 10 bagian dengan masing-masing 300 elemen dan menambahkan '#'
jtg_mag1 = mag_asli[0:300] + ['#']
jtg_mag2 = mag_asli[300:600] + ['#']
jtg_mag3 = mag_asli[600:900] + ['#']
jtg_mag4 = mag_asli[900:1200] + ['#']
jtg_mag5 = mag_asli[1200:1500] + ['#']
jtg_mag6 = mag_asli[1500:1800] + ['#']
jtg_mag7 = mag_asli[1800:2100] + ['#']
jtg_mag8 = mag_asli[2100:2400] + ['#']
jtg_mag9 = mag_asli[2400:2700] + ['#']
jtg_mag10 = mag_asli[2700:3000] + ['#']

srf_mag1 = mag_asli[3000:3300] + ['#']
srf_mag2 = mag_asli[3300:3600] + ['#']
srf_mag3 = mag_asli[3600:3900] + ['#']
srf_mag4 = mag_asli[3900:4200] + ['#']
srf_mag5 = mag_asli[4200:4500] + ['#']
srf_mag6 = mag_asli[4500:4800] + ['#']
srf_mag7 = mag_asli[4800:5100] + ['#']
srf_mag8 = mag_asli[5100:5400] + ['#']
srf_mag9 = mag_asli[5400:5700] + ['#']
srf_mag10 = mag_asli[5700:6000] + ['#']

drh_mag1 = mag_asli[6000:6300] + ['#']
drh_mag2 = mag_asli[6300:6600] + ['#']
drh_mag3 = mag_asli[6600:6900] + ['#']
drh_mag4 = mag_asli[6900:7200] + ['#']
drh_mag5 = mag_asli[7200:7500] + ['#']
drh_mag6 = mag_asli[7500:7800] + ['#']
drh_mag7 = mag_asli[7800:8100] + ['#']
drh_mag8 = mag_asli[8100:8400] + ['#']
drh_mag9 = mag_asli[8400:8700] + ['#']
drh_mag10 = mag_asli[8700:9000] + ['#']

sel_mag1 = mag_asli[9000:9300] + ['#']
sel_mag2 = mag_asli[9300:9600] + ['#']
sel_mag3 = mag_asli[9600:9900] + ['#']
sel_mag4 = mag_asli[9900:10200] + ['#']
sel_mag5 = mag_asli[10200:10500] + ['#']
sel_mag6 = mag_asli[10500:10800] + ['#']
sel_mag7 = mag_asli[10800:11100] + ['#']
sel_mag8 = mag_asli[11100:11400] + ['#']
sel_mag9 = mag_asli[11400:11700] + ['#']
sel_mag10 = mag_asli[11700:12000] + ['#']

tgi_mag1 = mag_asli[9000:9300] + ['#']
tgi_mag2 = mag_asli[9300:9600] + ['#']
tgi_mag3 = mag_asli[9600:9900] + ['#']
tgi_mag4 = mag_asli[9900:10200] + ['#']
tgi_mag5 = mag_asli[10200:10500] + ['#']
tgi_mag6 = mag_asli[10500:10800] + ['#']
tgi_mag7 = mag_asli[10800:11100] + ['#']
tgi_mag8 = mag_asli[11100:11400] + ['#']
tgi_mag9 = mag_asli[11400:11700] + ['#']
tgi_mag10 = mag_asli[11700:12000] + ['#']

# Menggabungkan data menjadi JSON
data = {
    'ins_time': time.strftime("%Y-%m-%d %H:%M:%S"),
    'jtg_mag1': jtg_mag1,
    'jtg_mag2': jtg_mag2,
    'jtg_mag3': jtg_mag3,
    'jtg_mag4': jtg_mag4,
    'jtg_mag5': jtg_mag5,
    'jtg_mag6': jtg_mag6,
    'jtg_mag7': jtg_mag7,
    'jtg_mag8': jtg_mag8,
    'jtg_mag9': jtg_mag9,
    'jtg_mag10': jtg_mag10,

    'srf_mag1': srf_mag1,
    'srf_mag2': srf_mag2,
    'srf_mag3': srf_mag3,
    'srf_mag4': srf_mag4,
    'srf_mag5': srf_mag5,
    'srf_mag6': srf_mag6,
    'srf_mag7': srf_mag7,
    'srf_mag8': srf_mag8,
    'srf_mag9': srf_mag9,
    'srf_mag10': srf_mag10,

    'drh_mag1': drh_mag1,
    'drh_mag2': drh_mag2,
    'drh_mag3': drh_mag3,
    'drh_mag4': drh_mag4,
    'drh_mag5': drh_mag5,
    'drh_mag6': drh_mag6,
    'drh_mag7': drh_mag7,
    'drh_mag8': drh_mag8,
    'drh_mag9': drh_mag9,
    'drh_mag10': drh_mag10,

    'sel_mag1': sel_mag1,
    'sel_mag2': sel_mag2,
    'sel_mag3': sel_mag3,
    'sel_mag4': sel_mag4,
    'sel_mag5': sel_mag5,
    'sel_mag6': sel_mag6,
    'sel_mag7': sel_mag7,
    'sel_mag8': sel_mag8,
    'sel_mag9': sel_mag9,
    'sel_mag10': sel_mag10,

    'tgi_mag1': tgi_mag1,
    'tgi_mag2': tgi_mag2,
    'tgi_mag3': tgi_mag3,
    'tgi_mag4': tgi_mag4,
    'tgi_mag5': tgi_mag5,
    'tgi_mag6': tgi_mag6,
    'tgi_mag7': tgi_mag7,
    'tgi_mag8': tgi_mag8,
    'tgi_mag9': tgi_mag9,
    'tgi_mag10': tgi_mag10
}

# Mengirim data ke API
send_data_to_api(data)
