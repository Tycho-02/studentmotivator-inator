
//Developed by S1118551 for IPMEDT5 'wekker subsysteem' groep 2


#define echoPin 2 // D2 pin op sensor zetten
#define trigPin 3 // D3 pin op sensor zetten

// variabelen definieren
long duration; // duratie van geluidsgolf
int distance; // variabele om afstand te meten
int buzzer = 8;//D8 pin van buzzer
int lichtje = 6; // D6 pin van het lichtje
boolean stoppen = false;
int buzzerInstellingen;

boolean gestuurd = false;
int binnenAfstand; // calculeren hoe ver gebruikers hand is van sensor zelf
boolean reset = false;
boolean opstaan = false;
boolean echtWakker = false;
int data = 0;
char object = ' ';
void setup() {
  pinMode(trigPin, OUTPUT); // trigpin als output zetten
  pinMode(echoPin, INPUT); // echopin als input zetten
  pinMode(lichtje, OUTPUT); //lichtje als output zetten
  Serial.begin(9600); // // Seriele Communicatie op 9600 zetten
  pinMode(buzzer,OUTPUT);//buzzer pin als een output zetten
}



void loop() {

  digitalWrite(lichtje, HIGH); // lichtje aanzeten wanneer arduino aan gaat
  while(Serial.available()) { // wanner seriele communicatie beschikbaar is voeren we onderstaande code uit

    if(Serial.read() == 'u') {
      buzzerInstellingen = 2; 
      //buzzer uit
    } else if(Serial.read() == 'a') {
        buzzerInstellingen = 1; 
        //aan
    }
    while(binnenAfstand < 100) {
    digitalWrite(trigPin, LOW);
    delayMicroseconds(2);
    //Zet trigPin op actief voor 2 microseconden
    digitalWrite(trigPin, HIGH);
    delayMicroseconds(10);
    digitalWrite(trigPin, LOW);
    duration = pulseIn(echoPin, HIGH);
    distance = duration * 0.034 / 2;     // afstand calculeren


    // afstand op seriele monitor printen
    Serial.println(distance);
    
    if(distance <= 50) {
      binnenAfstand += 1;
      //We zetten boozer uit indien gebruikers hand heel dichtbij is bij sensor.
      noTone(buzzer);
      delay(10);
    }
    
    if(distance > 50 and gestuurd == false and reset == false and stoppen == false and Serial.read() == 'x' and buzzerInstellingen != 2) { 
      //we laten voor het slapen buzzer afgaan
      tone(buzzer, 10);
      delay(10);
    }

    if(distance > 50 and gestuurd == true and reset == true and stoppen == false and Serial.read() == 'b' and buzzerInstellingen != 2) { 
      //eerste keer wakker worden met de buzzer aan
      tone(buzzer, 10);
      delay(10);
  }

     if(distance > 50 and echtWakker == true and Serial.read() == 'v' and buzzerInstellingen != 2) { 
       //tweede keer wakker worden met de buzzer aan
      tone(buzzer, 10);
      delay(10);
  }
  

   //Gebruiker heeft lang genoeg zijn hand voor sensor gehouden nadat die is gaan slapen, we zetten paar variabele op true en printen 't' naar seriele communicatie
   //We resetten binnenAfstand op 0 voor de volgende keer voor wakker worden
   if(binnenAfstand >= 100 && gestuurd == false && stoppen == false) {
    Serial.println('s');
    reset = true;
    gestuurd = true;
    binnenAfstand = 0;
  }
  
  
  
  if(binnenAfstand >= 100 && reset == true && stoppen == false && echtWakker == false) {
   //Gebruiker heeft lang genoeg zijn hand voor sensor gehouden nadat die is gaan slapen, we zetten paar variabele op true en printen 't' naar seriele communicatie
   //We resetten binnenAfstand op 0 om een extra check te doen dat gebruiker echt wakker wordt
    Serial.println('t');
    reset = false;
    echtWakker = true;
    stoppen = true;
    binnenAfstand = 0;
  }

 if(binnenAfstand >= 100 && stoppen == true && echtWakker == true) {
    //We resetten binnenAfstand op 0 om een extra check te doen dat gebruiker echt wakker wordt. We resetten binnenAfstand niet meer
    Serial.println('w');
  }

    }

 

  }

  

  /*Extra testjes*/

  
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



 