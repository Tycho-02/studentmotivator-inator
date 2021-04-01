import mysql.connector
from datetime import *
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


today = str(date.today())

mycursor = mydb.cursor()
while True:
    rcv = port.readline().strip()
    selectstring = "SELECT * from studiebuddy, studieplanning WHERE studieplanning.userId = 1 AND studieplanning.datum = %s"
    vals = (today,)
    mycursor.execute(selectstring, vals)
    selectvals =  ()
    for x in mycursor:    
        buddyName = x[3]
        buddySkin = x[4]
        idealTemp = int(x[5])
        idealHum = int(x[6])
        idealLight = int(x[7])
        planning = x[11]
    
    stuurNaam = bytes(buddyName)
    stuurSkin = bytes(buddySkin)
    stuuridealTemp = bytes(idealTemp)
    stuurPlanning = bytes(planning)
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
    time.sleep(0.1)
    port.write(stuurPlanning)
    port.write('\n')
    time.sleep(0.1)

    
    if(rcv == 'b'):
        os.system("python weerbericht.py")
    

    time.sleep(1)
    mydb.commit()

    
    

mydb.close()