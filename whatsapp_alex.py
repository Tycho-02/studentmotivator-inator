#ontwikkeld door S1118551 


#We sturen in deze file een whatsapp bericht naar gebruiker wanner die wakker is geworden met de taken die hem te wachten staan op deze dag.
#mocht de gebruiker geen taak hebben op die dag, dan krijgt die een melding dat die goed bezig was de afgelopen dag
#Dit is een koppeling met subsysteem van Tycho!


import os
from twilio.rest import Client
import mysql.connector


mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="alex",
    database="ipmedt5"
)


#taken ophalen 
taken = []

mycursor = mydb.cursor()
sql_select_Query = "select title, omschrijving from taken where uitvoerdatum = curdate() and status = 'niet voltooid'" #we gaan een bericht sturen naar de gebruiker met taken die hij op die dag moet uitvoeren
mycursor.execute(sql_select_Query)
records = mycursor.fetchall()
for row in records:
    #print("tijdInBed  = ", row[2])
    taken.append(row[1])
takenOpen = ',\n'.join(taken) #we zetten list om in een string vol met taken op die dag


#gegevens ophalen
gegevens = []
sql_select_Query1 = "select name, telefoonnummer from users where userId = 1" #user gegevens ophalen
mycursor.execute(sql_select_Query1)
records = mycursor.fetchall()
for user in records:
    gegevens.append(user[0])
    gegevens.append(user[1])
naam = gegevens[0]
nummer = '+31' + str(gegevens[1])

print('naam is ' + naam)
print('nummer is ' + nummer)




# Your Account Sid and Auth Token from twilio.com/user/account
account_sid = os.environ['TWILIO_ACCOUNT_SID'] #We moeten dit prive houden vanwege security issues 
auth_token = os.environ['TWILIO_AUTH_TOKEN'] #We moeten dit prive houden vanwege security issues 
client = Client(account_sid, auth_token)


from_whatsapp_number='whatsapp:+14155238886'
to_whatsapp_number = 'whatsapp:' + nummer

if(taken > 0): #als gebruiker taken op die dag heeft staan

    client.messages.create(body='Beste ' + naam + ',\nvandaag heb je op planning de volgende taken staan:\n' + takenOpen + '.\nVeel succes en zet hem op!', from_=from_whatsapp_number,to=to_whatsapp_number)
else:
    client.messages.create(body='Beste ' + naam + ',\nvandaag heb je geen taken open staan. Je bent goed bezig geweest de afgelopen dagen, ga zo door!', from_=from_whatsapp_number,to=to_whatsapp_number)