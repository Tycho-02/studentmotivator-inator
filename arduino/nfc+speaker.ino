#include <Wire.h>
#include <PN532_I2C.h>
#include <PN532.h>
#include <NfcAdapter.h>
#include <TimeLib.h>

//int speakerPIN = 8;
//int speakerMAP;

PN532_I2C pn532i2c(Wire);
PN532 nfc(pn532i2c);

time_t t = now();
int time = 0;
int data = 0;
char object = ' ';

void setup() {
  Serial.begin(9600);
  // Serial.println("Hello!");
  nfc.begin();

  uint32_t versiondata = nfc.getFirmwareVersion();
  
  if (! versiondata) {
    // Serial.print("Didn't find PN53x board");
    while (1); // halt
  }

  // Got ok data, print it out!
  // Serial.print("Found chip PN5"); Serial.println((versiondata>>24) & 0xFF, HEX); 
  // Serial.print("Firmware ver. "); Serial.print((versiondata>>16) & 0xFF, DEC); 
  // Serial.print('.'); Serial.println((versiondata>>8) & 0xFF, DEC);
  
  // Set the max number of retry attempts to read from a card
  // This prevents us from waiting forever for a card, which is
  // the default behaviour of the PN532.
  nfc.setPassiveActivationRetries(0xFF);

  // configure board to read RFID tags
  nfc.SAMConfig(); 

  // Serial.println("Waiting for an ISO14443A card");
}

void loop() {
  boolean success;

  uint8_t uid[] = { 0, 0, 0, 0, 0, 0, 0 };  // Buffer to store the returned UID

  uint8_t uidLength;                        // Length of the UID (4 or 7 bytes depending on ISO14443A card type)


  success = nfc.readPassiveTargetID(PN532_MIFARE_ISO14443A, &uid[0], &uidLength); 
  time += 1;

  while(Serial.available() > 0){
    data = Serial.read();
  }

  if (success) {
    // Serial.println("Found a card!");
//    time = 0;
//    speakerMAP = map(0,0, 1000, 300, 1000);
//    tone(speakerPIN, speakerMAP, 0);
    Serial.println('a');
    delay(3000);
  }
  if (!success){
    // PN532 probably timed out waiting for a card
    // Serial.println("Waiting for a card...");
//    speakerMAP = map(0,0, 1000, 300, 700);
//    tone(speakerPIN, speakerMAP);
    Serial.println('b');
    delay(1000);
  }
  Serial.println(time);
}