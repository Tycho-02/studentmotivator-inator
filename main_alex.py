
#created by 1118551 - student motivator-inator 1118551 voor ipmedt5

#functionaliteiten
#wakker worden met behulp van een arduino sensor 
#buzzer instellen op aan en uit





import mysql.connector
import time
import serial
import os
import datetime
import pause

#global variables
gebruikerNaarBed = False
gebruikerEerderUitBed = False

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

    slapen.append(row[2]) #tijdinbed
    slapen.append(row[3]) #tijduitbed
    slapen.append(row[4]) #buzzer
    slapen.append(row[5]) #meldingen


naar_bed = (datetime.datetime.min + slapen[0]).time()
uit_bed = (datetime.datetime.min + slapen[1]).time()
buzzerInstellingen = slapen[2]
meldingen = slapen[3]




print('tijd naar bed gebruiker: ' + str(naar_bed))
print('tijd uit bed gebruiker: ' + str(uit_bed))
print('buzzer instellingen: ' + str(buzzerInstellingen))
print('meldingen instellingen: ' + str(meldingen))

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
        gebruikerNaarBed = True
        gebruikerWordtWakker = False
        port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=3.0)
        time.sleep(3)
        if str(buzzerInstellingen) == 'aan':
            port.write('a')
        else:
            port.write('u')
        port.write('x') #we schrijven X naar port
        print('naar bed geschreven naar port')
        time.sleep(4)
        mycursor = mydb.cursor()
        while True:
            opstaan = int(1)
            rcv = port.readline().strip()
            print(rcv)
            if rcv == 's':
                print('geupdate, gebruiker gaat nu slapen')
                os.system("python update_naar_bed_alex.py")
                time.sleep(10)
                print('Nu gaat sensor kijken wanneer de gebruiker wakker is. Dit kan ook eerder zijn dan de ingestelde tijd!')
                ###while loop check om wekker af te laten gaan wanneer de gebruiker wakker wordt
                while(datetime.datetime.now().strftime("%H:%M:%S") <= str(uit_bed)):
                    print('#### USER WAKKERWORDEN BUZZER CHECK ####')
                    print('Gebruiker is nog niet wakker. Tijd dat gebruiker wakker wilt worden:' + str(uit_bed))
                    print("tijd nu :" + datetime.datetime.now().strftime("%H:%M:%S"))
                    time.sleep(1)
                else:
                    if str(buzzerInstellingen) == 'aan':
                        port.write('a')
                    else:
                        port.write('u')
                    print('gebruiker wordt wakker volgens de gekozen tijd!')
                    port.write('b')
                    time.sleep(3)
                    print('naar bed geschreven naar port')
                #mocht gebruiker eerder willen opstaan
            elif rcv == 't':
                print('geupdate, gebruiker gaat nu uit bed')
                os.system("python update_uit_bed_alex.py")
                time.sleep(2)
                if(meldingen == 'aan'):
                    os.system("python whatsapp_alex.py") #we sturen alvast een melding naar de gebruiker door middel van whatsapp berichtje
                    #we sturen het alleen als de gebruiker melding aan heeft staan
                print('we gaan checken of de gebruiker echt wakker wordt. Dit doen we door buzzer opnieuw af te laten gaan in 2 minuten')
                time.sleep(120)
            elif rcv == 'w':
                time.sleep(2)
                port.write('v')
                time.sleep(2)
                print('gebruiker is echt wakker') #gebruiker is nu echt wakker!
                 
            
               
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