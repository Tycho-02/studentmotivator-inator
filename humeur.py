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
        mycursor.execute("update users SET humeur = 'blij' WHERE userId = 1;")
        print("blij")
    elif( rcv == b'b'):
        mycursor.execute("update users SET humeur = 'meh' WHERE userId = 1;")
        print("meh")

    elif( rcv == b'c'):
        mycursor.execute("update users SET humeur = 'verdrietig' WHERE userId = 1;")
        print("verdrietig")
        
    time.sleep(1)
    mydb.commit()
    print(mycursor.rowcount, "humeur succesvol geupdate")
mydb.close()
