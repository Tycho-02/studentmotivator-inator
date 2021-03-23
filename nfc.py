import mysql.connector
import time

import serial
import os

mydb = mysql.connector.connect(
    host="localhost",
    user="damion",
    passwd="damion",
    database="ipmedt5",
    buffered=True
)
port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=3.0)

mycursor = mydb.cursor()

while True:
    mycursor.execute("SELECT * FROM mobiel;")
    rcv = port.readline().strip()
    if(rcv == 'a'):
        print('ja')
        mycursor.execute("UPDATE mobiel SET beschikbaar = true;")
    if(rcv == 'b'):
        print('nee')
        mycursor.execute("UPDATE mobiel SET beschikbaar = false;")

    time.sleep(1)
    mydb.commit()

mydb.close()