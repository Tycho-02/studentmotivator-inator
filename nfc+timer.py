import mysql.connector
import time

import serial
import os

mydb = mysql.connector.connect(
    host="vserver385.axc.nl",
    user="tychogp385_ipmedt5",
    passwd="ipmedt5",
    database="tychogp385_ipmedt5",
    buffered=True
)
port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=3.0)

mycursor = mydb.cursor()
while True:
    rcv = port.readline().strip()
    # mobiel aanwezig
    if(rcv == 'm1'):
        mycursor.execute("UPDATE mobiel SET beschikbaar = false;")
    #mobiel niet aanwezig 
    if(rcv == 'm0'):
        mycursor.execute("UPDATE mobiel SET beschikbaar = true;")
    # punten bij
    if(rcv == 'pb'):
        mycursor.execute("UPDATE puntentelling SET punten = punten + 10;")
    # punten af
    if(rcv == 'pa'):
        mycursor.execute("UPDATE puntentelling SET punten = punten - 15;")
    #smiley blij 
    if(rcv == 'sb'):
        mycursor.execute("UPDATE mobiel SET smiley = true;")
    #smiley verdietig
    if(rcv == 'sv'):
        mycursor.execute("UPDATE mobiel SET smiley = false;")
    #pauze
    if(rcv == 'pauze'):
        mycursor.execute("UPDATE timer SET pauze = 1;")
        # andere muzieklijst voor de pauze
        mycursor.execute("UPDATE users SET humeur = 'Pauze' WHERE userId = 1;")
    #pauze voorbij
    if(rcv == 'pauzeV'):
        mycursor.execute("UPDATE timer SET pauze = 0;")
         # andere muzieklijst voor het blokken
        mycursor.execute("UPDATE users SET humeur = 'Blokken' WHERE userId = 1;")
        
    sql_timer = "SELECT tijd FROM timer WHERE mobielId = 1"
    mycursor.execute(sql_timer)
    for x in mycursor:
        #de tijd uit de DB wordt omgezet naar een string
        timer = str(x[0])
        #de tijd word geschreven naar de Arduino
        port.write(timer)
        if rcv:
            print(rcv) 
    # time.sleep(1)
    mydb.commit()

mydb.close()