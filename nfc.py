import mysql.connector
import time

import serial
import os

mydb = mysql.connector.connect(
    host="localhost",
    user="damion",
    passwd="damion",
    database="ipmedt5"
)
port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=3.0)

mycursor = mydb.cursor()

while True:
    mycursor.execute("SELECT * FROM mobiel;")
    for x in mycursor:
        print(x[2])
    if (x[2] == True):
        print(x[2])
        port.write("a1")
    else:
        port.write("a0")

    # rcv = port.readline().strip()
    # if(rcv == 'b'):
    #     os.system("python update.py")

    time.sleep(2)
    mydb.commit()

mydb.close()