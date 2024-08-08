import time

# Nama file simulasi
filename = 'simulated_serial.txt'

print("Memulai pembacaan data dari file...")

try:
    with open(filename, 'r') as file:
        while True:
            line = file.readline()
            if not line:
                time.sleep(0.1)  # Delay jika tidak ada data
                continue
            print(f"Data diterima: {line.strip()}")

except KeyboardInterrupt:
    print("Program dihentikan oleh pengguna.")

print("Pembacaan data selesai.")
