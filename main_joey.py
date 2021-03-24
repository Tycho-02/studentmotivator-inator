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

mycursor = mydb.cursor();




mycursor = mydb.cursor()
while True:
    mycursor.execute("SELECT * from studiebuddy")
    for x in mycursor:
        buddyName = x[3];
        buddySkin = x[4];
    
    stuurNaam = bytes(buddyName)
    stuurSkin = bytes(buddySkin)
    port.write('\n')
    time.sleep(0.1)
    port.write(stuurNaam)
    port.write('\n')
    time.sleep(0.1)
    port.write(stuurSkin)
    port.write('\n')

    time.sleep(1)
    

    
    

mydb.close()