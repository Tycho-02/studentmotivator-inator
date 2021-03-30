
void n_fc(boolean success){
  // time += 1;

  // while(Serial.available() > 0){
  //   data = Serial.read();
  // }

  if (success) {
    Serial.println("m1");
    delay(1000);
  }
  else{
    Serial.println("m0");
    delay(1000);
  }
  // Serial.println(time);
}