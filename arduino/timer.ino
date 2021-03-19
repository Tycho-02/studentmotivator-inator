#include "TM1637_6D.h"
#include <TimeLib.h>

const int CLK = 6;
const int DIO = 9;
// const int POT = A3;

// time_t t = now();
// int seconds = second(0);
// int minuts = minute(1);
// int hours = hour(0);

TM1637_6D tm1637_6D(CLK,DIO);

void setup()
{
    Serial.begin(9600);
    // pinMode(POT, INPUT);
    tm1637_6D.init();
    tm1637_6D.set(5);//BRIGHT_TYPICAL = 2,BRIGHT_DARKEST = 0,BRIGHTEST = 7;
}
void loop()
{  
    // Array for displaying digits, the first number in the array will be displayed on the right
    int8_t ListDisp[6] = {0,0,0,3,1,0};
    // Array for displaying points, the first point in the array will be displayed on the right
    int8_t ListDispPoint[6] = {POINT_OFF,POINT_OFF,POINT_ON,POINT_OFF,POINT_ON,POINT_OFF};
    // String for converting millis value to seperate characters in the string
    String millisstring;
    // We send the entire array to the display along with the points array
    tm1637_6D.display(ListDisp, ListDispPoint);
    // int input =0;
    // if(Serial.available()){
    //     input = Serial.read();
    //     Serial.print("Number: " );
    //     Serial.println(input);
    // }
}