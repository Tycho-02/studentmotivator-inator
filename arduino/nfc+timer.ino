#include "SevenSegmentTM1637.h"
#include "SevenSegmentExtended.h"
#include <Wire.h>
#include <PN532_I2C.h>
#include <PN532.h>
#include <NfcAdapter.h>

const int CLK = 6;
const int DIO = 9;

#define SEC_PER_MIN (60)
#define SEC_PER_HOUR (60ul * 60)
#define SEC_PER_DAY (24ul * 60 * 60)

unsigned long countdownTime = 0;
int run = 0;
boolean success;

SevenSegmentExtended display(CLK, DIO);
PN532_I2C pn532i2c(Wire);
PN532 nfc(pn532i2c);

void setup(){  
  Serial.begin(9600);
  nfc.begin();
  nfc.setPassiveActivationRetries(0xFF);
  // configure board to read RFID tags
  nfc.SAMConfig(); 
  
  delay(20);

  display.begin();            // initializes the display
  display.setBacklight(70);  // set the brightness to 100 %
}

void loop() {

  uint8_t uid[] = { 0, 0, 0, 0, 0, 0, 0 };  // Buffer to store the returned UID
  uint8_t uidLength;                        // Length of the UID (4 or 7 bytes depending on ISO14443A card type)
  success = nfc.readPassiveTargetID(PN532_MIFARE_ISO14443A, &uid[0], &uidLength); 
  
  if(run < 2){
    setuptTimer();
    run++;
  }
  
  n_fc(success);
  timer(success);
}

void timer(boolean success){
  static unsigned long lastTick = millis();  
  unsigned long currentMillis = millis();
  if(success){
    if (currentMillis - lastTick >= 1000){
      lastTick += 1000;
      countdownTime--;
      displayTime(countdownTime);
    }
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