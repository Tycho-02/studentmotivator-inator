import mysql.connector
import time
import serial
import os
import datetime
import pause

#global variables
gebruikerNaarBed = False

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="alex",
    database="ipmedt5"
)

slapen = []

mycursor = mydb.cursor()
sql_select_Query = "select * from tijd_instellingen where userId = 1"
mycursor.execute(sql_select_Query)
records = mycursor.fetchall()
for row in records:
    #print("tijdInBed  = ", row[2])

    slapen.append(row[2])
    slapen.append(row[3])


naar_bed = (datetime.datetime.min + slapen[0]).time()
uit_bed = (datetime.datetime.min + slapen[1]).time()



print('tijd naar bed gebruiker: ' + str(naar_bed))
print('tijd uit bed gebruiker: ' + str(uit_bed))


print(datetime.datetime.now().strftime("%H:%M:%S"))



def check_slapen():
    while(datetime.datetime.now().strftime("%H:%M:%S") < str(uit_bed)):
        #print(slapen)
        slapen = True
        time.sleep(2)
    else:
        time.sleep(2)
        slapen = False
        #print(slapen)
    today = datetime.date.today()
    print(today)

#naar bed update 
#we zetten gebruikernaarbed op false, zodat de loop kan starten
while gebruikerNaarBed == False:
    while(datetime.datetime.now().strftime("%H:%M:%S") < str(naar_bed)):
        gebruikerNaarBed = False
        print(datetime.datetime.now().strftime("%H:%M:%S"))
        time.sleep(1)
        print('het is nog geen tijd om naar bed te gaan')
    else:
        print('Gebruiker kan nu gaan slapen! Hier gaat de buzzer ook af')
        print('Sensoor gaat zijn werk doen!')
        time.sleep(3)
        gebruikerNaarBed = True
        port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=3.0)
        mycursor = mydb.cursor()
        while True:
            rcv = port.readline().strip()
            print(rcv)
            if rcv == 's':
                print('geupdate, gebruiker gaat nu slapen')
                os.system("python update_uit_bed_alex.py")
                time.sleep(10)
                print('Nu gaat sensor kijken wanneer de gebruiker wakker is. Dit kan ook eerder zijn dan de ingestelde tijd! ')
            elif rcv == 't':
                print('geupdate, gebruiker gaat nu uit bed')
                os.system("python update_naar_bed_alex.py")
                sys.exit("Gebruiker is klaar met slapen!")

mydb.close()



###EXTRA TESTS###



#tijd_uitBed = datetime.datetime.strptime(now(), "%H:%M:%S")

'''
tijd_naartime = datetime.datetime.strptime(uit_bed, "%H:%M:%S")
a_timedelta = tijd_naartime - datetime.datetime(1900, 1, 1)
print(a_timedelta)
seconds = a_timedelta.total_seconds()



print(seconds)

'''
#print(tijd_naartime)

#uit bed update
'''def uitBed():
    gebruikerNaarBed = True
    while gebruikerNaarBed == True:
        while(datetime.datetime.now().strftime("%H:%M:%S") < uit_bed):
            print(datetime.datetime.now().strftime("%H:%M:%S"))
            time.sleep(1)
            print('het is nog geen tijd uit bed te komen')
            gebruikerNaarBed = True
        else:
            time.sleep(2)
            gebruikerNaarBed = False
            port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=3.0)
            print('hi, de gebruiker wordt nu wakker, script wordt gerund')
            mycursor = mydb.cursor()
            while True:
                rcv = port.readline().strip()
                if rcv == 's':
                    print('geupdate, gebruiker gaat nu uit bed')
                    os.system("python update_naar_bed_alex.py")
                    sys.exit("Gebruiker is klaar met slapen!")



'''