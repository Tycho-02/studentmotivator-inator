#include <Wire.h>
#include <PN532_I2C.h>
#include <PN532.h>
#include <NfcAdapter.h>
// #include <TimeLib.h>

PN532_I2C pn532i2c(Wire);
PN532 nfc(pn532i2c);

// time_t t = now();
// int time = 0;
// int data = 0;
// char object = ' ';

void setup() {
  Serial.begin(9600);
  nfc.begin();

  uint32_t versiondata = nfc.getFirmwareVersion();
  
  if (! versiondata) {
    while (1); // halt
  }  
  // Set the max number of retry attempts to read from a card
  // This prevents us from waiting forever for a card, which is
  // the default behaviour of the PN532.
  nfc.setPassiveActivationRetries(0xFF);
  // configure board to read RFID tags
  nfc.SAMConfig(); 
}

void loop() {
  boolean success;

  uint8_t uid[] = { 0, 0, 0, 0, 0, 0, 0 };  // Buffer to store the returned UID

  uint8_t uidLength;                        // Length of the UID (4 or 7 bytes depending on ISO14443A card type)


  success = nfc.readPassiveTargetID(PN532_MIFARE_ISO14443A, &uid[0], &uidLength); 
  // time += 1;

  // while(Serial.available() > 0){
  //   data = Serial.read();
  // }

  if (success) {
    Serial.println('a');
    delay(3000);
  }
  if (!success){
    Serial.println('b');
    delay(1000);
  }
  // Serial.println(time);
}