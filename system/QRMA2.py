import requests
import random
import time
import string
import serial

# URL endpoint Anda
url = 'http://localhost/medical_ftdinus/api_magnetik/update/1'

# Konfigurasi Serial
ser = serial.Serial(
    port='COM7',  # Ganti sesuai dengan port ESP32 Anda
    baudrate=9600,
    timeout=1
)

# Fungsi untuk mengirim data ke API
def send_data_to_api(data):
    response = requests.post(url, json=data)  # Mengirim data sebagai JSON
    print(f"Data sent: {data}, Response status: {response.status_code}")

# Variabel string untuk menyimpan data masing-masing frekuensi
data_5Hz = ""
data_50Hz = ""
data_500Hz = ""
data_5KHz = ""
data_30KHz = ""

jtg_mag1 = ""
srf_mag1 = ""
drh_mag1 = ""
sel_mag1 = ""
tgi_mag1 = ""

try:
    while True:
        if ser.in_waiting > 0:
            prefix = ser.read(1)  # Membaca 1 byte awalan
            
            if prefix in [b'\xFF', b'\xFE', b'\xFD', b'\xFC', b'\xFB']:
                frequency_map = {
                    b'\xFF': '5Hz',
                    b'\xFE': '50Hz',
                    b'\xFD': '500Hz',
                    b'\xFC': '5KHz',
                    b'\xFB': '30KHz'
                }
                
                frequency = frequency_map[prefix]
                data_list = []

                for _ in range(5000):
                    high6Bits = ser.read(1)[0]
                    low6Bits = ser.read(1)[0]
                    analog_value = (high6Bits << 6) | low6Bits
                    data_list.append(str(analog_value))
                
                # Gabungkan data menjadi satu string dengan pemisah koma
                data_str = ",".join(data_list)
                
                # Simpan data ke variabel string sesuai dengan frekuensi
                if frequency == '5Hz':
                    data_5Hz = data_str
                elif frequency == '50Hz':
                    data_50Hz = data_str
                elif frequency == '500Hz':
                    data_500Hz = data_str
                elif frequency == '5KHz':
                    data_5KHz = data_str
                elif frequency == '30KHz':
                    data_30KHz = data_str

                print(f"Data untuk {frequency} OK")
                print(data_str)
                print("\n")

                jtg_mag1 = data_5Hz[0:999]
                jtg_mag2 = data_5Hz[1000:1999]
                jtg_mag3 = data_5Hz[2000:2999]
                jtg_mag4 = data_5Hz[3000:3999]
                jtg_mag5 = data_5Hz[4000:4999]
                srf_mag1 = data_50Hz[0:999]
                srf_mag2 = data_50Hz[1000:1999]
                srf_mag3 = data_50Hz[2000:2999]
                srf_mag4 = data_50Hz[3000:3999]
                srf_mag5 = data_50Hz[4000:4999]
                drh_mag1 = data_500Hz[0:999]
                drh_mag2 = data_500Hz[1000:1999]
                drh_mag3 = data_500Hz[2000:2999]
                drh_mag4 = data_500Hz[3000:3999]
                drh_mag5 = data_500Hz[4000:4999]
                sel_mag1 = data_5KHz[0:999]
                sel_mag2 = data_5KHz[1000:1999]
                sel_mag3 = data_5KHz[2000:2999]
                sel_mag4 = data_5KHz[3000:3999]
                sel_mag5 = data_5KHz[4000:4999]
                tgi_mag1 = data_30KHz[0:999]
                tgi_mag2 = data_30KHz[1000:1999]
                tgi_mag3 = data_30KHz[2000:2999]
                tgi_mag4 = data_30KHz[3000:3999]
                tgi_mag5 = data_30KHz[4000:4999]
        
                # Sesuaikan format data untuk dikirim ke API
                data = {
                    'id_pasien': 1,  # Pastikan id_pasien sesuai dengan database Anda
                    'ins_time': time.strftime("%Y-%m-%d %H:%M:%S"),
                    'jtg_mag1': jtg_mag1,
                    'jtg_mag2': jtg_mag2,
                    'jtg_mag3': jtg_mag3,
                    'jtg_mag4': jtg_mag4,
                    'jtg_mag5': jtg_mag5,
                    'srf_mag1': srf_mag1,
                    'srf_mag2': srf_mag2,
                    'srf_mag3': srf_mag3,
                    'srf_mag4': srf_mag4,
                    'srf_mag5': srf_mag5,
                    'drh_mag1': drh_mag1,
                    'drh_mag2': drh_mag2,
                    'drh_mag3': drh_mag3,
                    'drh_mag4': drh_mag4,
                    'drh_mag5': drh_mag5,
                    'sel_mag1': sel_mag1,
                    'sel_mag2': sel_mag2,
                    'sel_mag3': sel_mag3,
                    'sel_mag4': sel_mag4,
                    'sel_mag5': sel_mag5,
                    'tgi_mag1': tgi_mag1,
                    'tgi_mag2': tgi_mag2,
                    'tgi_mag3': tgi_mag3,
                    'tgi_mag4': tgi_mag4,
                    'tgi_mag5': tgi_mag5
                }

                send_data_to_api(data)

except KeyboardInterrupt:
    print("Program dihentikan oleh pengguna.")
finally:
    ser.close()
