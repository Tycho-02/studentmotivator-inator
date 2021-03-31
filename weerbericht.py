import requests
import mysql.connector
import numpy as np
from datetime import *
mydb = mysql.connector.connect(
    host="localhost",
    user="joey",
    passwd="password",
    database="ipmedt5"
)
userlat = ""
userlong = ""
mycursor = mydb.cursor()
mycursor.execute("SELECT * from studiebuddy;")
for x in mycursor:
    userlong = x[1]
    userlat = x[2]
mydb.commit()
mydb.close()
today = str(date.today())
allowedTimes = ["07:00","08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00"]

url = 'https://api.openweathermap.org/data/2.5/onecall?lat=' + str(userlat) + '&lon=' + str(userlong) + '&units=metric&exclude=current,minutely&appid=7deb7ae20398f8a5f63fb56749812be9'
response = requests.get(url)
response = response.json()
times = []
temps = []
planning = []
for response in response['hourly']:
    date = datetime.fromtimestamp(response['dt']).strftime('%Y-%m-%d')
    time = datetime.fromtimestamp(response['dt']).strftime('%H:%M')
    weather = response['weather'][0]['main']
    temp = response['temp']
    if(date == today):
        if(time in allowedTimes):
            times.append(time)
            temps.append(temp)



aantalpauzes = 0
if len(times) <= 3:
    aantalpauzes = 0
elif len(times) > 3 and len(times) <=6:
    aantalpauzes = 1
elif len(times) > 6 and len(times) <=9:
    aantalpauzes = 2
else:
    aantalpauzes = 3

print("Aantal pauzes: " + str(aantalpauzes))


if aantalpauzes == 0:
    y=0
    for temp in temps:
        planning.append('S')
        y+=1

elif aantalpauzes == 1:
    x = 0
    highestTempIndex = 0
    highestTemp = 0
    for temp in temps:
        if temp > highestTemp:
            highestTemp = temp
            highestTempIndex = x
        x+=1

    q = 0    
    for time in times:
        if(q == highestTempIndex):
            planning.append('P')
        else:
            planning.append('S')
        q+=1

elif aantalpauzes == 2:
    B = temps[:len(temps)//2]
    C = temps[len(temps)//2:]

    x = 0
    highestTempIndexB = 0
    highestTemp = 0
    for temp in B:
        if temp > highestTemp:
            highestTemp = temp
            highestTempIndexB = x
        x+=1
    
    x = len(B)
    highestTempIndexC = 0
    highestTemp = 0
    for temp in C:
        if temp > highestTemp:
            highestTemp = temp
            highestTempIndexC = x
        x+=1

    q = 0
    for time in times:
        if q == highestTempIndexB:
            planning.append('P')
        elif q == highestTempIndexC:
            planning.append('P')
        else:
            planning.append('S')
        q+=1

elif aantalpauzes == 3:
    numpyArray = np.array(temps)
    splitArray = np.array_split(numpyArray, 3)

    x = 0
    highestTempIndexA = 0
    highestTemp = 0
    for temp in splitArray[0]:
        if temp > highestTemp:
            highestTemp = temp
            highestTempIndexA = x
        x+=1
    
    x = len(splitArray[0])
    highestTempIndexB = 0
    highestTemp = 0
    for temp in splitArray[1]:
        if temp > highestTemp:
            highestTemp = temp
            highestTempIndexB = x
        x+=1

    x = len(splitArray[0]) + len(splitArray[1])
    highestTempIndexC = 0
    highestTemp = 0
    for temp in splitArray[2]:
        if temp > highestTemp:
            highestTemp = temp
            highestTempIndexC = x
        x+=1


    q = 0
    for time in times:
        if q == highestTempIndexA:
            planning.append('P')
        elif q == highestTempIndexB:
            planning.append('P')
        elif q == highestTempIndexC:
            planning.append('P')
        else:
            planning.append('S') 
        q+=1

    
print(planning)
