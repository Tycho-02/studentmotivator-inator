#include <Wire.h>
#include <PN532_I2C.h>
#include <PN532.h>
#include <NfcAdapter.h>
// #include <TimeLib.h>
#include "SevenSegmentTM1637.h"
#include "SevenSegmentExtended.h"

#define SEC_PER_MIN (60)
#define SEC_PER_HOUR (60ul * 60)
#define SEC_PER_DAY (24ul * 60 * 60)

const int CLK = 6;
const int DIO = 9;

PN532_I2C pn532i2c(Wire);
PN532 nfc(pn532i2c);
SevenSegmentExtended display(CLK, DIO);

unsigned long countdownTime = 0;

// time_t t = now();
// int time = 0;

void setup() {
  Serial.begin(9600);
  delay(20);
  int days = 0;
  String t_hours;
  String t_minutes;
  int seconds = 0;

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
  nfc.begin();

  uint32_t versiondata = nfc.getFirmwareVersion();
  
  if (! versiondata) {
    while (1); // halt
  }  

  nfc.setPassiveActivationRetries(0xFF);
  nfc.SAMConfig(); 

}

void loop() {
  
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

  boolean success;
  uint8_t uid[] = { 0, 0, 0, 0, 0, 0, 0 };  // Buffer to store the returned UID
  uint8_t uidLength;                        // Length of the UID (4 or 7 bytes depending on ISO14443A card type)

  success = nfc.readPassiveTargetID(PN532_MIFARE_ISO14443A, &uid[0], &uidLength); 
  // time += 1;

  if (success) {
    Serial.println('a');
    delay(3000);
  }
  if (!success){
    Serial.println('b');
    delay(1000);
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