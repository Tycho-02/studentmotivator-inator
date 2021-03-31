import mysql.connector
import time

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="alex",
    database="ipmedt5"
)



mycursor = mydb.cursor()

#als de gebruiker uit bed gaat.
mycursor.execute("UPDATE tijdslapen SET tijdUitBedGegaan = now() WHERE userId = 1 order by tijdId DESC limit 1;")

mydb.commit()
print(mycursor.rowcount, "uit bed succesvol geupdate")

