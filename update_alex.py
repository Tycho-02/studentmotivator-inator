import mysql.connector

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="alex",
    database="ipmedt5"
)



mycursor = mydb.cursor()

mycursor.execute("INSERT into tijdslapen (userId, tijdInBedGegaan) values ('1', DEFAULT";)
mydb.commit()
print(geupdate)
