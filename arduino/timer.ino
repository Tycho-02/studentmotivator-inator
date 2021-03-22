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

#include "TM1637.h"
#include <TimeLib.h>

const int CLK = 6;
const int DIO = 9;
// const int POT = A3;

int timer_val = 1;
//int timer_hours = 1;
//int timer_minuts = 5;
int timer_seconds = 10;

int firstnum = 0;
int secondnum = 0;
int thirdnum = 0;
int fournum= 0;
int fivenum = 0;
int sixnum = 0;

TM1637 tm1637(CLK,DIO);

void setup()
{
    Serial.begin(9600);
    // pinMode(POT, INPUT);
    tm1637.init();
    tm1637.set(5);//BRIGHT_TYPICAL = 2,BRIGHT_DARKEST = 0,BRIGHTEST = 7;
    delay(1500);
}
void loop(){
  
    while (timer_val == 0 && timer_seconds == 0) {
      tm1637.clearDisplay();  // Clear display 
      tm1637.display(0,0);
      tm1637.display(1,0);
      tm1637.display(2,0);
      tm1637.display(3,0);
      tm1637.display(4,0);
      tm1637.display(5,0);
      delay(500);
      tm1637.clearDisplay();  
    }

// Breakdown minutes and seconds in individual numbers
  if (timer_val > 9) {
    fournum = timer_val/10%10;
    fivenum = timer_val%10;
  }
  else {
    fivenum = timer_val;
  }

  if (timer_seconds > 9) {
    sixnum = timer_seconds/10%10;
    firstnum = timer_seconds%10;
  }
  else {
    sixnum = 0;
    firstnum = timer_seconds;
  }


// Display timer on 4 bits 7 segments display
  tm1637.clearDisplay();  // Clear display
  
  if (timer_val > 9) {
    tm1637.display(0,fournum); 
    }

  if (timer_val > 0) {
    tm1637.display(1,fivenum);
  }

  if (timer_seconds > 9 || timer_val > 0) {
    tm1637.display(2,sixnum);
  }
//  if (timer_minuts > 9 || timer_val > 0) {
//    tm1637.display(3,fournum);
//  }
//  if (timer_minuts > 9 || timer_val > 0) {
//    tm1637.display(4,fivenum);
//  }
  
//  tm1637.display(5,sixnum);
   tm1637.display(3, fournum);
   tm1637.display(4, fivenum);
   tm1637.display(5, sixnum);
// Decrease seconds
  timer_seconds=timer_seconds-1;
//  timer_minuts=timer_minuts-1;
//  timer_hours=timer_hours-1;
  delay(1000);  // Delay of 1 second

// Decrease timer
  if (timer_seconds == -1) {
    timer_val=timer_val-1;
    timer_seconds=59;
  }
//  if (timer_minuts == -1) {
//    timer_val=timer_val-1;
//    timer_minuts=59;
//  }
   
}