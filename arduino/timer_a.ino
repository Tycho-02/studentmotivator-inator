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
  String t_hours;
  String t_minutes;
  int seconds = 0;
  // String data;
  
  int hours;
  int minutes;
  while(Serial.available() > 0){
    t_minutes = Serial.readStringUntil(':');
    Serial.read();
    t_hours = Serial.readStringUntil(':');
  }
  hours = t_hours.toInt();
  minutes = t_minutes.toInt();
  
  countdownTime = seconds + (minutes * SEC_PER_MIN) + (hours * SEC_PER_HOUR) + (days * SEC_PER_DAY); 

  display.begin();            // initializes the display
  display.setBacklight(70);  // set the brightness to 100 %
}

void loop(){
  static unsigned long lastTick = millis();  
  unsigned long currentMillis = millis();
  
  if (currentMillis - lastTick >= 1000){
    lastTick += 1000;
    countdownTime--;
    displayTime(countdownTime);
  }
  
  if (countdownTime == 0){
    Serial.println(F("Countdown Finished"));
  }  
}

void displayTime(unsigned long aTime){
  
  int seconds = aTime % SEC_PER_MIN;
  int minutes = (aTime % (SEC_PER_HOUR)) / SEC_PER_MIN;
  int hours = (aTime % (SEC_PER_DAY) / (SEC_PER_HOUR));
  
  Serial.print(hours);
  Serial.print(F(":"));
  Serial.print(minutes);
  Serial.print(F(":"));
  Serial.println(seconds);
  display.printTime(hours, minutes, true);
}
 