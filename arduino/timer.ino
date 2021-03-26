#include "SevenSegmentTM1637.h"
#include "SevenSegmentExtended.h"

const int CLK = 6;
const int DIO = 9;

#define SEC_PER_MIN (60)
#define SEC_PER_HOUR (60ul * 60)
#define SEC_PER_DAY (24ul * 60 * 60)

unsigned long countdownTime = 0;

SevenSegmentExtended display(CLK, DIO);

void setup(){  
  Serial.begin(9600);
  delay(20);
  int days = 0;
  int hours = 1;
  int minutes = 2;
  int seconds = 0;
  
  countdownTime = seconds + (minutes * SEC_PER_MIN) + (hours * SEC_PER_HOUR) + (days * SEC_PER_DAY); 

  display.begin();            // initializes the display
  display.setBacklight(100);  // set the brightness to 100 %
}

void loop(){
  
  static unsigned long lastTick = millis();  
  unsigned long currentMillis = millis();
  
//  Way more accurate timing this way than with delay
//  Also allows for code to do other things during countdown
  if (currentMillis - lastTick >= 1000){
    lastTick += 1000;
    countdownTime--;
    displayTime(countdownTime);
  }
  
  if (countdownTime == 0){
    Serial.println(F("Countdown Finished"));
    while(1);  // infinite loop...  lock up program until reset
  }  
}

//Prints time to serial in D:H:M:S format  

void displayTime(unsigned long aTime){
  int seconds = aTime % SEC_PER_MIN;
  int minutes = (aTime % (SEC_PER_HOUR)) / SEC_PER_MIN;
  int hours = (aTime % (SEC_PER_DAY) / (SEC_PER_HOUR));
  
  Serial.println(F("tick"));
  Serial.print(hours);
  Serial.print(F(" : "));
  Serial.print(minutes);
  Serial.print(F(" : "));
  Serial.println(seconds);
  display.printTime(hours, minutes, true);
}
 