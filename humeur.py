import mysql.connector
import time

import serial
import os

mydb = mysql.connector.connect(
    host="localhost",
    user="peter",
    passwd='gaaf345',
    database='laravel'
)
port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=3.0)

mycursor = mydb.cursor()

# in de while loop word gekeken wat de input van de gebruiker is en word de database geupdate
while True:
    rcv = port.read().strip()
    if( rcv == b'a'):
        mycursor.execute("update users SET humeur = 'Blokken' WHERE userId = 1;")
        print("Blokken")
        print(mycursor.rowcount, "humeur succesvol geupdate")

    elif( rcv == b'b'):
        mycursor.execute("update users SET humeur = 'Stress' WHERE userId = 1;")
        print("Stress")
        print(mycursor.rowcount, "humeur succesvol geupdate")


    elif( rcv == b'c'):
        mycursor.execute("update users SET humeur = 'Pauze' WHERE userId = 1;")
        print("Pauze")
        print(mycursor.rowcount, "humeur succesvol geupdate")

        
    time.sleep(1)
    mydb.commit()
mydb.close()
