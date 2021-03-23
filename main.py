import mysql.connector
import time

import serial
import os

mydb = mysql.connector.connect(
    host="localhost",
    user="joey",
    passwd="password",
    database="ipmedt5"
)

port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=3.0)


buddyName = "Snorly"
buddySkin = "1"

mycursor = mydb.cursor()
while True:
    port.write('<');
    port.write(buddyName);
    port.write('>');

    
    time.sleep(1)

mydb.close()