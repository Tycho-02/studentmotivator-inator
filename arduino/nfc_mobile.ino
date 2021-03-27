
void n_fc(boolean success){
  // time += 1;

  // while(Serial.available() > 0){
  //   data = Serial.read();
  // }

  if (success) {
    Serial.println('a');
    delay(1000);
  }
  if (!success){
    Serial.println('b');
    delay(1000);
  }
  // Serial.println(time);
}