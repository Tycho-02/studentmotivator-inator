import mysql.connector
import time
# import datetime

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
    mycursor.execute("SELECT * FROM timer;")
    for x in mycursor:
        timer = str(x[2])
        print(timer)
        port.write(timer)

    # rcv = port.readline().strip()
    # if rcv:
    #     print(rcv) 
    
    time.sleep(1)
    mydb.commit()


mydb.close()