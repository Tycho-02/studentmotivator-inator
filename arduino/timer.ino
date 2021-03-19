#include "TM1637_6D.h"
#include <TimeLib.h>

const int CLK = 6;
const int DIO = 9;
const int POT = A3;

int readValue = 0;
int value = 0;
// time_t t = now();
// int seconds = second(0);
// int minuts = minute(1);
// int hours = hour(0);
int brightness = 0;
int fadeAmount = 5;
// int timeValue = 0;
TM1637_6D tm1637_6D(CLK,DIO);

void setup()
{
    Serial.begin(9600);
    pinMode(POT, INPUT);
    tm1637_6D.init();
    tm1637_6D.set(5);//BRIGHT_TYPICAL = 2,BRIGHT_DARKEST = 0,BRIGHTEST = 7;
}
void loop()
{  
    readValue = analogRead(POT);
    value = map(readValue, 0, 60);
    brightness = brightness + fadeAmount;
    if(brightness < 59){
        tm1637_6D.displayInteger(brightness, false);
        delay(value);
    }
    
    Serial.print("read = ");Serial.println(value);

    
    delay(value);
}