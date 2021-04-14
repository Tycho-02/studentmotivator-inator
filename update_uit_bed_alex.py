import mysql.connector
import time

mydb = mysql.connector.connect(
    host="vserver385.axc.nl",
    user="tychogp385_ipmedt5",
    passwd="ipmedt5",
    database="tychogp385_ipmedt5"
)



mycursor = mydb.cursor()

#als de gebruiker uit bed gaat updaten we database.
mycursor.execute("UPDATE tijdslapen SET tijdUitBedGegaan = now() WHERE userId = 1 order by tijdId DESC limit 1;")

mydb.commit()
print(mycursor.rowcount, "uit bed succesvol geupdate")
#we printen naar console dat de update succesvol heeft plaatsgevonden
