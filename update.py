import mysql.connector

mydb = mysql.connector.connect(
    host="localhost",
    user="damion",
    passwd="damion",
    database="ipmedt5"
)

mycursor = mydb.cursor()
mycursor.execute("UPDATE mobiel SET beschikbaar = NOT beschikbaar;")
mydb.commit()