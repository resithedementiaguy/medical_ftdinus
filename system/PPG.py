import requests
import random
import time
import string
import serial

# URL endpoint Anda
url = 'http://cemti.org/api_superbright/update/1'

# Konfigurasi Serial
ser = serial.Serial(
    port='COM8',  # Ganti sesuai dengan port ESP32 Anda
    baudrate=115200,
    timeout=1
)

# Fungsi untuk mengirim data ke API
def send_data_to_api(data):
    response = requests.post(url, json=data)  # Mengirim data sebagai JSON
    print(f"Data sent: {data}, Response status: {response.status_code}")

dataPPG = ""
received_data = ""  # Variabel untuk menyimpan data dalam bentuk string

try:
    while True:
        if ser.in_waiting > 0:
            data = ser.read(1)  # Membaca satu byte
            received_data += data.decode('utf-8', errors='ignore')  # Mendekode byte ke string dan mengabaikan kesalahan
            
            if data == b'\n':  # Jika byte newline (enter) terdeteksi
                dataPPG = received_data
                print(dataPPG)  # Mencetak data yang diterima

                sb1 = dataPPG[0:999]
                sb2 = dataPPG[1000:1999]
                sb3 = dataPPG[2000:2999]
                sb4 = dataPPG[3000:3999]
                sb5 = dataPPG[4000:4999]

                # Sesuaikan format data untuk dikirim ke API
                data = {
                    'id_pasien': 1,  # Pastikan id_pasien sesuai dengan database Anda
                    'ins_time': time.strftime("%Y-%m-%d %H:%M:%S"),
                    'sb1': sb1,
                    'sb2': sb2,
                    'sb3': sb3,
                    'sb4': sb4,
                    'sb5': sb5
                }

                send_data_to_api(data)

                received_data = ""  # Mengosongkan buffer setelah data diterima

except KeyboardInterrupt:
    print("Program dihentikan oleh pengguna.")
finally:
    ser.close()
