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
        mycursor.execute("update users SET humeur = 'Blij' WHERE userId = 1;")
        print("Blij")
        print(mycursor.rowcount, "humeur succesvol geupdate")

    elif( rcv == b'b'):
        mycursor.execute("update users SET humeur = 'Meh' WHERE userId = 1;")
        print("Meh")
        print(mycursor.rowcount, "humeur succesvol geupdate")


    elif( rcv == b'c'):
        mycursor.execute("update users SET humeur = 'Verdrietig' WHERE userId = 1;")
        print("Verdrietig")
        print(mycursor.rowcount, "humeur succesvol geupdate")

        
    time.sleep(1)
    mydb.commit()
mydb.close()
