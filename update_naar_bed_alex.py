import mysql.connector
import time

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="alex",
    database="ipmedt5"
)



mycursor = mydb.cursor()

#als de gebruiker bed in gaat zetten we data in database
mycursor.execute("INSERT into tijdslapen (userId, tijdInBedGegaan, tijdUitBedGegaan) values (1, now(), NULL);")



mydb.commit()
print(mycursor.rowcount, "naar bed succesvol geupdate")
#we printen naar console dat de update succesvol heeft plaatsgevonden
