#include <Wire.h>
#include <LiquidCrystal_I2C.h>

LiquidCrystal_I2C lcd(0x27, 16 , 2);

const int analogInPin = A0;  // Analog input pin that the potentiometer is attached to
const int analogOutPin = 13; // Analog output pin that the LED is attached to
int sensorValue = 0;        // value read from the pot
int outputValue = 0;        // value output to the PWM (analog out)
const int buttonPin = 5;     // the number of the pushbutton pin
bool pressed = false;         // variable for reading the pushbutton status
String humeur = "";


//de bytes zijn zelf gemaakte figuurtjes die gedisplayed worden op het scherm
byte checkmark[] = {
  B00000,
  B00000,
  B00001,
  B00011,
  B00110,
  B11100,
  B01000,
  B00000
};

//in de setup word het scherm gecleared
void setup() {
  lcd.init();
  lcd.backlight();
  lcd.clear();
  lcd.setCursor(0,0);
  pinMode(buttonPin, INPUT_PULLUP);
  Serial.begin(9600);
}

void loop() {
  sensorValue = analogRead(analogInPin);
  outputValue = map(sensorValue, 0, 1023, 0, 255);
  analogWrite(analogOutPin, outputValue);
  delay(500);

  //met de potmeter word er gekeken naar de sensorvalue en zo een keuzegemaakt door de gebruiker wat zijn/haar humeur is.
  if(sensorValue <341 ){
    optie1();
    humeur = "a";
  }
  else if(sensorValue > 341 && sensorValue < 681 ){
    optie2();
    humeur = "b";
  }
  else{
    optie3();
    humeur= "c";
  }
}
// de opties die op het schermpje aangetoont worden
void optie1(){
    lcd.setCursor(0,0);
    lcd.write(0);
    lcd.print("Blokken                             ");
    lcd.setCursor(0,1);
    lcd.print("             ");
    buttonStatus();
 }
 void optie2(){
    lcd.setCursor(0,0);
    lcd.write(0);
    lcd.print("Stress                              ");
    lcd.setCursor(0,1);
    lcd.print("             ");
    buttonStatus();
 }
 void optie3(){
    lcd.setCursor(0,0);
    lcd.write(0);
  lcd.print("Pauze                      ");
    lcd.setCursor(0,1);
    lcd.print("             ");
    buttonStatus();
 }

 void buttonStatus(){
    if (!digitalRead(buttonPin))
    {
        delay(10);
        if (!digitalRead(buttonPin))
        {
            if (!pressed)
            {
                pressed = true;
                verstuur();
                
            }
        }
    }
    else
    {
        pressed = false;
    }
  }

//de data word verstuurd naar een pythonbestand
 void verstuur(){
    lcd.createChar(0, checkmark);
    lcd.setCursor(0,0);
    lcd.write(0);
    lcd.print(" verstuurd naar");
    lcd.setCursor(0,1);
    lcd.print("database");
    Serial.println(humeur);
}
