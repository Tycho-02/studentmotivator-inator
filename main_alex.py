import mysql.connector
import time


import serial
import os

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="alex",
    database="ipmedt5"
)

port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=3.0)
print('hi')
mycursor = mydb.cursor()
while True:

    print(port.readline())
    rcv = port.readline().strip()
    if rcv == '101b':
        os.system("python update_alex.py")
        print('update gestart, gebruiker gaat slapen, bevestigd door arduino')
mydb.close()