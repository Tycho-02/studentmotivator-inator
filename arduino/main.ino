//lcd display - timer
#include "SevenSegmentTM1637.h"
#include "SevenSegmentExtended.h"
//nfc
#include <Wire.h>
#include <PN532_I2C.h>
#include <PN532.h>
#include <NfcAdapter.h>

#include <LiquidCrystal_I2C.h>
LiquidCrystal_I2C lcd(0x27, 16, 2);
//pinnen voor timer
const int CLK = 6;
const int DIO = 9;

#define SEC_PER_MIN (60)
#define SEC_PER_HOUR (60ul * 60)
#define SEC_PER_DAY (24ul * 60 * 60)
//krijgt de volledige tijd
unsigned long countdownTime = 0;
unsigned long countdownTimeBreak = 0;
//de pauze tijd
int daysBreak = 0;
int hoursBreak = 0;
int minutesBreak = 1; //10
int secondsBreak = 5;

int run = 0;
boolean success;
int punten = 10;
int verliesPunten = 0;

//speaker
int speakerPIN = 8;
int speakerMAP;

SevenSegmentExtended display(CLK, DIO);
PN532_I2C pn532i2c(Wire);
PN532 nfc(pn532i2c);

void setup(){  
  Serial.begin(9600);
  nfc.begin();
  nfc.setPassiveActivationRetries(0xFF);
  // configure board to read RFID tags
  nfc.SAMConfig(); 
  lcd.init();
  lcd.backlight();
  
  delay(20);

  display.begin();            // initializes the display
  display.setBacklight(70);  // set the brightness to 100 %
}

void loop() {

  uint8_t uid[] = { 0, 0, 0, 0, 0, 0, 0 };  // Buffer to store the returned UID
  uint8_t uidLength;                        // Length of the UID (4 or 7 bytes depending on ISO14443A card type)
  success = nfc.readPassiveTargetID(PN532_MIFARE_ISO14443A, &uid[0], &uidLength); 
//  lezen van de tijd uit de DB
  if(run < 2){
    setuptTimer(daysBreak, hoursBreak, minutesBreak, secondsBreak);
    run++;
  }
//de nieuwe tijd lezen uit de DB
  if(countdownTimeBreak == 1){
    run = 0;
      if(run < 2){
      setuptTimer(daysBreak, hoursBreak, minutesBreak, secondsBreak);
      run++;
    }
  }
  
  n_fc(success);
  timer(success);
}

void timer(boolean success){
  static unsigned long lastTick = millis();  
  unsigned long currentMillis = millis();
//  als de mobiel gelezen word, dat telt de timer af
  if(success){
    if (currentMillis - lastTick >= 1000){
      lastTick += 1000;
      countdownTime = countdownTime - 2;
      verliesPunten = 0;
      displayTime(countdownTime);
      smileyBlij();
      
    }
  }
//buzzer gaat af wanneer de timer is afgelopen
  if (countdownTime == 1 && success){
    Serial.println(F("Countdown Finished"));
    speakerMAP = map(5, 800, 1023, 800, 1000);
    tone(speakerPIN, speakerMAP, 10000);
    display.printTime(0,0,false);
    punten += 10;
    Serial.println("pb");
    delay(11000);
  }
//punten beloning word minder voor het te vroeg weg halen van de mobiel  
  if(countdownTime != 1 && !success && verliesPunten == 0){
    punten -= 10;  
    Serial.println("pa");
    verliesPunten = 1;
    smileyVerdrietig();
  }
//start de pauze timer
  if(!success && countdownTime == 1){
    timerBreak(hoursBreak, minutesBreak);
    smileyBlij();
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

void timerBreak(int hoursBreak, int minutesBreak){
  static unsigned long lastTick = millis();  
  unsigned long currentMillis = millis();
          
  if (currentMillis - lastTick >= 1000){
    lastTick += 1000;
    //countdownTime--;
    countdownTimeBreak = countdownTimeBreak - 4;
    displayTimeBreak(countdownTimeBreak);
  }
}

void displayTimeBreak(unsigned long countdownTimeBreak){
  
  int secondsBreak = countdownTimeBreak % SEC_PER_MIN;
  int minutesBreak = (countdownTimeBreak % (SEC_PER_HOUR)) / SEC_PER_MIN;
  int hoursBreak = (countdownTimeBreak % (SEC_PER_DAY) / (SEC_PER_HOUR));
  
  Serial.print(hoursBreak);
  Serial.print(F(":"));
  Serial.print(minutesBreak);
  Serial.print(F(":"));
  Serial.println(secondsBreak);
  display.printTime(hoursBreak, minutesBreak, true);

  if (countdownTimeBreak == 1){
    Serial.println(F("Countdown Finished"));
    speakerMAP = map(5, 800, 1023, 800, 1000);
    tone(speakerPIN, speakerMAP, 10000);
    display.printTime(0, 0, false);
    delay(30000);
  }

  if(countdownTimeBreak > 1 && success){
    display.printTime(0, 0, false);
    punten += 10;
    delay(30000);
  }
}