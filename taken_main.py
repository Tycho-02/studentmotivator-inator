import mysql.connector
import time
import serial

mydb = mysql.connector.connect( #Verbinding maken met de database
    host="127.0.0.1",
    user="laravel",
    passwd="laravel",
    database="ipmedt5",
    buffered=True
)

port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=3.0)
mycursor = mydb.cursor()

def taakKlaar(id): #functie om taken KLAAR te markeren
    mycursor.execute("UPDATE taken SET status = 'klaar' WHERE id = " + str(id) + ";")
    mycursor.execute("UPDATE puntentelling SET punten = punten + 10;")

def taakNietKlaar(id): #functie om taken NIET VOLTOOID te markeren
    mycursor.execute("UPDATE taken SET status = 'niet voltooid' WHERE id = " + str(id) + ";")
    mycursor.execute("UPDATE puntentelling SET punten = punten - 12;")

def laadTaken():
    mycursor.execute("SELECT id, vak FROM taken WHERE (DATE(deadline) >= CURDATE() AND status != 'klaar') ORDER BY uitvoerdatum, deadline;")
    i = 0
    global ids
    global taken
    ids = []
    taken = []
    for x in mycursor:
        i+=1
        if (i <= 3):
            ids.append(x[0])
            taken.append(x[1])

    for x in taken:
        print(x)
        port.write(x.encode())
        port.write(str("#").encode())

while (True):
    rcv = port.readline().strip()

    if (rcv == "r"): #Taken synchroniseren met arduino
        print("r")
        laadTaken()

    if (rcv == "v1"): #Taak 1 van de lijst afvinken
        try:
            taakKlaar(ids[0])
        except:
            continue
    if (rcv == "v2"):  #Taak 2 van de lijst afvinken
        try:
            taakKlaar(ids[1])
        except:
            continue
    if (rcv == "v3"):  #Taak 3 van de lijst afvinken
        try:
            taakKlaar(ids[2])
        except:
            continue
    if (rcv == "x1"): #Taak 1 van de lijst niet voltooid markeren
        try:
            taakNietKlaar(ids[0])
        except:
            continue
    if (rcv == "x2"): #Taak 2 van de lijst niet voltooid markeren
        try:
            taakNietKlaar(ids[1])
        except:
            continue
    if (rcv == "x3"): #Taak 3 van de lijst niet voltooid markeren
        try:
            taakNietKlaar(ids[2])
        except:
            continue

    mydb.commit() #Alles opslaan op de database


mydb.close()
