import requests
import random
import time
import string
import serial

# URL endpoint Anda
url = 'http://localhost/medical_ftdinus/api_auk/update/1'

# Konfigurasi Serial
ser = serial.Serial(
    port='COM5',  # Ganti sesuai dengan port ESP32 Anda
    baudrate=9600,
    timeout=1
)

# Fungsi untuk mengirim data ke API
def send_data_to_api(data):
    response = requests.post(url, json=data)  # Mengirim data sebagai JSON
    print(f"Data sent: {data}, Response status: {response.status_code}")

# Variabel string untuk menyimpan data masing-masing frekuensi
data_violet = ""
data_blue = ""
data_green = ""
data_yellow = ""
data_orange = ""
data_red = ""

try:
    while True:
        if ser.in_waiting > 0:
            prefix = ser.read(1)  # Membaca 1 byte awalan
            
            if prefix in [b'\xFF', b'\xFE', b'\xFD', b'\xFC', b'\xFB', b'\xFA']:
                frequency_map = {
                    b'\xFF': 'violet',
                    b'\xFE': 'blue',
                    b'\xFD': 'green',
                    b'\xFC': 'yellow',
                    b'\xFB': 'orange',
                    b'\xFA': 'red'
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
                if frequency == 'violet':
                    data_violet = data_str
                elif frequency == 'blue':
                    data_blue = data_str
                elif frequency == 'green':
                    data_green = data_str
                elif frequency == 'yellow':
                    data_yellow = data_str
                elif frequency == 'orange':
                    data_orange = data_str
                elif frequency == 'red':
                    data_red = data_str

                print(f"Data untuk {frequency} OK")
                print(data_str)
                print("\n")

                violet=data_violet
                blue=data_blue
                green=data_green
                yellow=data_yellow
                orange=data_orange
                red=data_red
        
                # Sesuaikan format data untuk dikirim ke API
                data = {
                    'id_pasien': 1,  # Pastikan id_pasien sesuai dengan database Anda
                    'ins_time': time.strftime("%Y-%m-%d %H:%M:%S"),
                    'violet': violet,
                    'blue': blue,
                    'green': green,
                    'yellow': yellow,
                    'orange': orange,
                    'red': red
                }

                send_data_to_api(data)

except KeyboardInterrupt:
    print("Program dihentikan oleh pengguna.")
finally:
    ser.close()
