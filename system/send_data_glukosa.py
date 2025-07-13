import requests
import random
import time

# URL endpoint API
url = 'http://cemti.org/api_glukosa/update/1'

# Fungsi untuk mengirim data ke API
def send_data_to_api(data):
    try:
        response = requests.post(url, json=data)
        print(f"Data sent: {data}")
        print(f"Response status: {response.status_code}, Response body: {response.text}")
    except requests.exceptions.RequestException as e:
        print(f"Request failed: {e}")

print("Mengirim satu data dummy glukosa ke API...")

# Data dummy 1x
glukosa = random.randint(100, 200)
data = {
    'ins_time': time.strftime("%Y-%m-%d %H:%M:%S"),
    'glukosa': glukosa
}

# Kirim data
send_data_to_api(data)
