void smileyBlij(){
  // smiley blij maken 
  byte smileyBlij1[8] = {
    B00000,
    B00000,
    B00001,
    B00010,
    B00100,
    B00100,
    B00100,
    B00100,
  };
  byte smileyBlij2[8] = {
    B01111,
    B10000,
    B00000,
    B00110,
    B00110,
    B00110,
    B00000,
    B00000,
  };
  byte smileyBlij3[8] = {
    B11110,
    B00001,
    B00000,
    B01100,
    B01100,
    B01100,
    B00000,
    B00000,
  };
  byte smileyBlij4[8] = {
    B00000,
    B00000,
    B10000,
    B01000,
    B00100,
    B00100,
    B00100,
    B00100,
  };
  byte smileyBlij5[8] = {
    B00100,
    B00100,
    B00100,
    B00100,
    B00010,
    B00001,
    B00000,
    B00000,
  };
  
  byte smileyBlij6[8] = {
    B00000,
    B00000,
    B10000,
    B01000,
    B00111,
    B00000,
    B10000,
    B01111,
  };
  byte smileyBlij7[8] = {
    B00000,
    B00000,
    B00001,
    B00010,
    B11100,
    B00000,
    B00001,
    B11110,
  };
  byte smileyBlij8[8] = {
    B00100,
    B00100,
    B00100,
    B00100,
    B01000,
    B10000,
    B00000,
    B00000,
  };

  //smiley blij word toegewezen aan een cijfer
  lcd.createChar(1, smileyBlij1);
  lcd.createChar(2, smileyBlij2);
  lcd.createChar(3, smileyBlij3);
  lcd.createChar(4, smileyBlij4);
  lcd.createChar(5, smileyBlij5);
  lcd.createChar(6, smileyBlij6);
  lcd.createChar(7, smileyBlij7);
  lcd.createChar(8, smileyBlij8);
  lcd.home();
  //het neerzetten van elk onderdeel van de smiley
  lcd.setCursor(1, 0);
  lcd.write(1);
  lcd.write(2);
  lcd.write(3);
  lcd.write(4);
  lcd.setCursor(1, 1);
  lcd.write(5);
  lcd.write(6);
  lcd.write(7);
  lcd.write(8);
  lcd.setCursor(6, 0);
  lcd.write(1);
  lcd.write(2);
  lcd.write(3);
  lcd.write(4);
  lcd.setCursor(6, 1);
  lcd.write(5);
  lcd.write(6);
  lcd.write(7);
  lcd.write(8);
  lcd.setCursor(11, 0);
  lcd.write(1);
  lcd.write(2);
  lcd.write(3);
  lcd.write(4);
  lcd.setCursor(11, 1);
  lcd.write(5);
  lcd.write(6);
  lcd.write(7);
  lcd.write(8);
}
// smiley verdrietig maken 
void smileyVerdrietig(){
  byte smiley1[8] = {
    B00000,
    B00000,
    B00001,
    B00010,
    B00100,
    B00100,
    B00100,
    B00100,
  };
  byte smiley2[8] = {
    B01111,
    B10000,
    B00000,
    B00110,
    B00110,
    B00110,
    B00000,
    B00000,
  };
  byte smiley3[8] = {
    B11110,
    B00001,
    B00000,
    B01100,
    B01100,
    B01100,
    B00000,
    B00000,
  };
  byte smiley4[8] = {
    B00000,
    B00000,
    B10000,
    B01000,
    B00100,
    B00100,
    B00100,
    B00100,
  };
  byte smiley5[8] = {
    B00100,
    B00100,
    B00100,
    B00100,
    B00010,
    B00001,
    B00000,
    B00000,
  };
  
  byte smiley6[8] = {
    B00000,
    B00111,
    B01000,
    B10000,
    B00000,
    B00000,
    B10000,
    B01111,
  };
  byte smiley7[8] = {
    B00000,
    B11100,
    B00010,
    B00001,
    B00000,
    B00000,
    B00001,
    B11110,
  };
  byte smiley8[8] = {
    B00100,
    B00100,
    B00100,
    B00100,
    B01000,
    B10000,
    B00000,
    B00000,
  };
//smiley verdrietig word toegewezen aan een cijfer
  lcd.createChar(1, smiley1);
  lcd.createChar(2, smiley2);
  lcd.createChar(3, smiley3);
  lcd.createChar(4, smiley4);
  lcd.createChar(5, smiley5);
  lcd.createChar(6, smiley6);
  lcd.createChar(7, smiley7);
  lcd.createChar(8, smiley8);
  lcd.home();
//het neerzetten van elk onderdeel van de smiley
  lcd.setCursor(1, 0);
  lcd.write(1);
  lcd.write(2);
  lcd.write(3);
  lcd.write(4);
  lcd.setCursor(1, 1);
  lcd.write(5);
  lcd.write(6);
  lcd.write(7);
  lcd.write(8);
  lcd.setCursor(6, 0);
  lcd.write(1);
  lcd.write(2);
  lcd.write(3);
  lcd.write(4);
  lcd.setCursor(6, 1);
  lcd.write(5);
  lcd.write(6);
  lcd.write(7);
  lcd.write(8);
  lcd.setCursor(11, 0);
  lcd.write(1);
  lcd.write(2);
  lcd.write(3);
  lcd.write(4);
  lcd.setCursor(11, 1);
  lcd.write(5);
  lcd.write(6);
  lcd.write(7);
  lcd.write(8);
}