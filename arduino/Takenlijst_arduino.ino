// Tycho van Veen
// s1122689@student.hsleiden.nl
// IPMEDT5 studentmotivator-inator | Takenlijst

#include <U8g2lib.h>
#include <U8x8lib.h>
#ifdef U8X8_HAVE_HW_SPI
#include <SPI.h>
#endif
#ifdef U8X8_HAVE_HW_I2C
#include <Wire.h>
#endif

// Pinnen op de arduino
U8G2_ST7920_128X64_1_SW_SPI u8g2(U8G2_R0, /* clock=*/ 13, /* data=*/ 11, /* CS=*/ 10, /* reset=*/ 8);
const int SWITCH1 = 3;
const int SWITCH2 = 6;
const int SWITCH3 = 4;
const int RESET = 2;

// Globale variabelen
int pageState;
int oldPageState;
bool pressed = false;
bool load = true;

// Variabelen voor de taken
String vak1;
String vak2;
String vak3;
bool vak1Status = false;
bool vak2Status = false;
bool vak3Status = false;

void setup() { //Setup van het programma
  u8g2.begin();
  pinMode(SWITCH1, INPUT_PULLUP);
  pinMode(SWITCH2, INPUT_PULLUP);
  pinMode(SWITCH3, INPUT_PULLUP);
  pinMode(RESET, INPUT_PULLUP);
  Serial.begin(9600);
  Serial.println("r");
  pageState = 1;
}

void button() { //Als er op de knop van de doos word geklikt word deze code uitgevoerd
  if (pageState <= 4) { // Als de gebruiker bezig is met zijn taken kan hij met de knop door de pagina's klikken
    oldPageState = pageState;
    pageState = oldPageState + 1;
    if(pageState > 4) {
      pageState = 1;
    }
    // Als de gebruiker alle magneten heeft geplaatst:
  } else if (pageState == 5 && (!digitalRead(SWITCH1) && !digitalRead(SWITCH2) && !digitalRead(SWITCH3))) {
    pageState = 6;
  } else if (pageState == 6 && (digitalRead(SWITCH1) && digitalRead(SWITCH2) && digitalRead(SWITCH3))) {
    pageState = 7;
  } else if (pageState == 6 && (!digitalRead(SWITCH1) || !digitalRead(SWITCH2) || !digitalRead(SWITCH3))) {
    pageState = 6;
  }
}

void laadNieuweTaken() { // Zet de volgende tekst op het scherm
  u8g2.setFont(u8g2_font_t0_11_me);
  u8g2.drawStr(5, 16, "Haal de magneten");
  u8g2.drawStr(5, 36, "van de doos af!");
  u8g2.drawStr(5, 56, "En klik op de knop");
}

void nieuweTakenLadenPage() { // Zet de volgende tekst op het scherm
  u8g2.setFont(u8g2_font_open_iconic_arrow_2x_t);
  u8g2.drawStr(1, 41, "A");
  u8g2.setFont(u8g2_font_t0_11_me);
  u8g2.drawStr(18, 26, "Nieuwe");
  u8g2.drawStr(18, 36, "taken");
  u8g2.drawStr(18, 46, "laden");
  u8g2.setFont(u8g2_font_open_iconic_check_6x_t);
  u8g2.drawStr(70,59,"C");
}

void drawCheckTaakSwitch(int x, int y, int i) { // Tekent een vink of een kruis op het scherm
  u8g2.setFont(u8g2_font_open_iconic_check_2x_t);
  if (!digitalRead(i)) {
    u8g2.drawStr(x, y, "A");
  } else {
    u8g2.drawStr(x, y,"B");
  }
}

void drawOverzichtNummers() { // Tekent de nummers van de taken op het scherm
  u8g2.setFont(u8g2_font_logisoso24_tn);
  u8g2.drawStr(13,32,"1");
  u8g2.drawStr(56,32,"2");
  u8g2.drawStr(97,32,"3");
}

void overzichtTakenPage() { // Tekent de overzichtspagina van de taken op het scherm
    drawOverzichtNummers();
    drawCheckTaakSwitch(15, 56, SWITCH1);
    drawCheckTaakSwitch(56, 56, SWITCH2);
    drawCheckTaakSwitch(97, 56, SWITCH3);
}

void taak(int x) { // Tekent de gekozen detailpagina van het vak op het scherm
  switch(x) {
    case 1: drawTaak(x, 18, 20, vak1, vak1Status); break;
    case 2: drawTaak(x, 18, 20, vak2, vak2Status); break;
    case 3: drawTaak(x, 18, 20, vak3, vak3Status); break;
  }
}

void drawTaak(int i, int x, int y, String vak, bool vakStatus) { //Laat de taak op het scherm zien
  u8g2.setFont(u8g2_font_inr16_mf);
  u8g2.drawStr(0, 20, String(i).c_str()); //nummer
  u8g2.drawStr(x, y, vak.c_str()); //vak

  u8g2.setFont(u8g2_font_open_iconic_check_4x_t);
  if (vakStatus) {
    u8g2.drawStr(47, 60, "A"); //afgevinkt
  } else {
    u8g2.drawStr(47, 60,"B"); //nog niet gedaan
  }
}

void checkIfTaakChanged() { // Check of een taak is veranderd en als het zo is word dit geupdate met de backend
  if (!digitalRead(SWITCH1) && !vak1Status) { // Check Taak 1
    vak1Status = true;
    Serial.println("v1"); // v zet de taak in de database op "klaar"
  } else if (digitalRead(SWITCH1) && vak1Status) {
    vak1Status = false;
    Serial.println("x1"); // x zet de taak in de database op "niet voltooid"
  }
  if (!digitalRead(SWITCH2) && !vak2Status) { // Check Taak 2
    vak2Status = true;
    Serial.println("v2");
  } else if (digitalRead(SWITCH2) && vak2Status) {
    vak2Status = false;
    Serial.println("x2");
  }
  if (!digitalRead(SWITCH3) && !vak3Status) { // Check Taak 3
    vak3Status = true;
    Serial.println("v3");
  } else if (digitalRead(SWITCH3) && vak3Status) {
    vak3Status = false;
    Serial.println("x3");
  }
}

void nieuweTaken() { // Start de procedure om nieuwe taken te laden
  if(load == false) {
    load = true; // Zorgt dat het arduino programma stopt met de standaard functie's maar in de laad modus van nieuwe taken gaat
    Serial.println("r"); // Zorgt dat de server nieuwe taken stuurt
  }
  u8g2.setFont(u8g2_font_t0_11_me);
  u8g2.drawStr(18, 26, "Laden....");
}

void loop() {
  if(load) {
    nieuweTaken();
  } else {
    if(pageState <= 5) {
      checkIfTaakChanged();
    }
  }

  if (!digitalRead(RESET)){
    delay(10);
    if (!digitalRead(RESET)){
      if (!pressed){
        pressed = true;
        button();
      }
    }
  } else {
    pressed = false;
  }

  if (load) {
    delay(1500);
    int i = 0;
    while(Serial.available()) {
      while(i <= 3) {
        i++;
        String x = Serial.readStringUntil('#');
        switch(i) {
          case 1: vak1 = x; break;
          case 2: vak2 = x; break;
          case 3: vak3 = x; break;
        }
      }
    }
    load = false;
    pageState = 1;
  } else {
    u8g2.firstPage();
    do {
      if (pageState <= 5) {
        if (!digitalRead(SWITCH1) && !digitalRead(SWITCH2) && !digitalRead(SWITCH3)) {
          pageState = 5;
        } else if(pageState == 5 && (digitalRead(SWITCH1) || digitalRead(SWITCH2) || digitalRead(SWITCH3))) {
          pageState = 1;
        }
      }
      switch(pageState) {
        case 1: overzichtTakenPage(); break;
        case 2: taak(1); break;
        case 3: taak(2); break;
        case 4: taak(3); break;
        case 5: nieuweTakenLadenPage(); break;
        case 6: laadNieuweTaken(); break;
        case 7: nieuweTaken(); break;
        }
    } while ( u8g2.nextPage() );
  }
}
