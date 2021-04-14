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
    # mobiel aanwezig
    if(rcv == 'm1'):
        os.system("python update.py")
    #mobiel niet aanwezig 
    if(rcv == 'm0'):
        os.system("python update.py")
    # punten bij
    if(rcv == 'pb'):
        mycursor.execute("UPDATE puntentelling SET punten = punten + 10;")
    # punten af
    if(rcv == 'pa'):
        mycursor.execute("UPDATE puntentelling SET punten = punten - 10;")

    #pauze
    if(rcv == 'pauze'):
        mycursor.execute("UPDATE timer SET pauze = 1;")
    #pauze voorbij
    if(rcv == 'pauzeV'):
        mycursor.execute("UPDATE timer SET pauze = 0;")
        
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