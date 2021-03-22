int speakerPIN = 8;
int speakerMAP;

void setup() {
  // put your setup code here, to run once:
    Serial.begin(9600);
}

void loop() {
  // put your main code here, to run repeatedly:
    speakerMAP = map(0, 0, 1000, 120, 1500);
    tone(speakerPIN, speakerMAP, 1000);

    delay(10);
}