
#define echoPin 2 // attach pin D2 Arduino to pin Echo of HC-SR04
#define trigPin 3 //attach pin D3 Arduino to pin Trig of HC-SR04

// defines variables
long duration; // variable for the duration of sound wave travel
int distance; // variable for the distance measurement
int buzzer = 8;//the pin of the active buzzer
boolean stoppen = false;
int buzzerInstellingen;

boolean gestuurd = false;
int binnenAfstand; // withindistance - calculate how often user keeps his hand in front of sensor
boolean reset = false;
boolean opstaan = false;
int data = 0;
char object = ' ';
void setup() {
  pinMode(trigPin, OUTPUT); // Sets the trigPin as an OUTPUT
  pinMode(echoPin, INPUT); // Sets the echoPin as an INPUT
  Serial.begin(9600); // // Serial Communication is starting with 9600 of baudrate speed
  pinMode(buzzer,OUTPUT);//initialize the buzzer pin as an output
}



void loop() {

while(Serial.available()) {
  
    if(Serial.read() == 'u') {
      buzzerInstellingen = 2; 
      //buzzer uit
    } else if(Serial.read() == 'a') {
        buzzerInstellingen = 1; 
        //aan
    }
    while(binnenAfstand < 100) {
    // Clears the trigPin condition
    digitalWrite(trigPin, LOW);
    delayMicroseconds(2);
    // Sets the trigPin HIGH (ACTIVE) for 10 microseconds
    digitalWrite(trigPin, HIGH);
    delayMicroseconds(10);
    digitalWrite(trigPin, LOW);
    duration = pulseIn(echoPin, HIGH);
    // Calculating the distance
    distance = duration * 0.034 / 2; // Speed of sound wave divided by 2 (go and back)
   // Displays the distance on the Serial Monitor

    // Displays the distance on the Serial Monitor
    Serial.println(distance);
    
    if(distance <= 50) {
      binnenAfstand += 1;
      //We zetten boozer uit indien gebruikers object heel dichtbij is bij sensor.
      noTone(buzzer);
      delay(10);
    }
    
    if(distance > 50 and gestuurd == false and reset == false and stoppen == false and Serial.read() == 'x' and buzzerInstellingen != 2) {
      tone(buzzer, 10);
      delay(10);
    }

    if(distance > 50 and gestuurd == true and reset == true and stoppen == false and Serial.read() == 'b' and buzzerInstellingen != 2) {
      tone(buzzer, 10);
      delay(10);
  }
  }


   if(binnenAfstand >= 100 && gestuurd == false && stoppen == false) {
    Serial.println('s');
    reset = true;
    gestuurd = true;
    binnenAfstand = 0;
  }
  
  
  
  if(binnenAfstand >= 100 && reset == true && stoppen == false) {
    Serial.println('t');
    reset = false;
    stoppen = true;
  }
 

  }

  
  

  
 /* while(Serial.available()) {
    binnenAfstand = 0;
    Serial.read();
    if(Serial.read() <= 50) {
    binnenAfstand += 1;
    //We zetten boozer uit indien gebruikers object heel dichtbij is bij sensor.
    noTone(buzzer);
    delay(1000);
   }
   
   if(Serial.read() > 50) {
    //geluid weer aan, want gebruiker is niet uit bed gekomen
    tone(buzzer, 1000);
    delay(1000);
  }
  
  if(binnenAfstand >= 100) {
    noTone(buzzer);
    delay(1000);
    Serial.end();
    //we beeindigen serial communicatie
    break;
  }
 }*/
 }



 