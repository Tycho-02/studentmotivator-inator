void setuptTimer(int daysBreak, int hoursBreak, int minutesBreak, int secondsBreak){
  int days = 0;
  String t_hours;
  String t_minutes;
  int seconds = 3;
  
  int hours;
  int minutes;
  delay(3000);

  //uilezen van de tijd uit de DB
  while (Serial.available()){
    Serial.println("ja1");
    t_hours = Serial.readStringUntil(':');
//    Serial.read();
    t_minutes = Serial.readStringUntil(':');
  }
  delay(3000);
  Serial.print(t_hours);
  Serial.print(t_minutes);
  // de uren en minuten worden integers ipv strings
  hours = t_hours.toInt();
  minutes = t_minutes.toInt();
  // de timer berekenen
  countdownTime = seconds + (minutes * SEC_PER_MIN) + (hours * SEC_PER_HOUR) + (days * SEC_PER_DAY); 
  // de pauzetimer berekenen
  countdownTimeBreak = secondsBreak + (minutesBreak * SEC_PER_MIN) + (hoursBreak * SEC_PER_HOUR) + (daysBreak * SEC_PER_DAY); 
}