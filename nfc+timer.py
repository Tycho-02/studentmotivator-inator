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
    rcv = port.readline().strip()
    if(rcv == 'a'):
        print('ja')
        # mycursor.execute("UPDATE mobiel SET beschikbaar = true;")
        os.system("python update.py")
    if(rcv == 'b'):
        print('nee')
        # mycursor.execute("UPDATE mobiel SET beschikbaar = false;")
        os.system("python update.py")
    
    sql_timer = "SELECT tijd FROM timer WHERE mobielId = 1"
    mycursor.execute(sql_timer)
    for x in mycursor:
        timer = str(x[0])
        # timer = str(x[2])
        # print(timer)
        port.write(timer)
        if rcv:
            print(rcv) 
    time.sleep(1)
    mydb.commit()

mydb.close()