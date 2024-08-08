import requests
import random
import time

url = 'http://localhost/medical_ftdinus/analisis_darah/send_data'

print("Simulasi pengiriman data melalui HTTP request...")

try:
    for i in range(300):
        data = {'value': random.randint(100, 999)}
        response = requests.post(url, data=data)
        print(f"Data sent: {data['value']}, Response status: {response.status_code}")
        time.sleep(0.1)  # Delay untuk simulasi pengiriman data

except KeyboardInterrupt:
    print("Simulasi dihentikan oleh pengguna.")
