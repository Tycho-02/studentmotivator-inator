import mysql.connector
import time
import requests

import serial
import os

mydb = mysql.connector.connect(
    host="localhost",
    user="joey",
    passwd="password",
    database="ipmedt5"
)

port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=3.0)

buddyName = "Test"
buddySkin = ""
idealTemp = ""


mycursor = mydb.cursor()
while True:
    mycursor.execute("SELECT * from studiebuddy;")
    for x in mycursor:    
        buddyName = x[3]
        buddySkin = x[4]
        idealTemp = int(x[5])

    
    stuurNaam = bytes(buddyName)
    stuurSkin = bytes(buddySkin)
    stuuridealTemp = bytes(idealTemp)
    port.write('\n')
    time.sleep(0.1)
    port.write(stuurNaam)
    port.write('\n')
    time.sleep(0.1)
    port.write(stuurSkin)
    port.write('\n')
    time.sleep(0.1)
    port.write(stuuridealTemp)
    port.write('\n')
    time.sleep(1)
    mydb.commit()

    
    

mydb.close()