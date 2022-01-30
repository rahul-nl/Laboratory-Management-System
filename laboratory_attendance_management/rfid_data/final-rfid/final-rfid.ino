#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include <SPI.h>
#include <MFRC522.h>
#define BUZZER 16 

constexpr uint8_t RST_PIN = 5;     // Configurable, see typical pin layout above
constexpr uint8_t SS_PIN = 4;     // Configurable, see typical pin layout above
 
MFRC522 mfrc522(SS_PIN, RST_PIN); // Create MFRC522 instance.
WiFiClient wifiClient;

/* Set these to your desired credentials. */
const char *ssid = "Realme1";  //ENTER YOUR WIFI SETTINGS
const char *password = "12345678";

// REPLACE with your Domain name and URL path or IP address with path
const char* serverName = "http://192.168.154.28/rfid_data/data1.php";

// Keep this API Key value to be compatible with the PHP code provided in the project page. 
// If you change the apiKeyValue value, the PHP file /post-esp-data.php also needs to have the same key 
String apiKeyValue = "tPmAT5Ab3j7F9";

void setup() {
  Serial.begin(115200);
  pinMode(BUZZER, OUTPUT);
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) { 
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
  digitalWrite(BUZZER, HIGH);  // Turn the LED off by making the voltage HIGH
  delay(1000); 
  digitalWrite(BUZZER, LOW);  // Turn the LED off by making the voltage HIGH
  delay(1000);
  
  SPI.begin();  // Init SPI bus
  mfrc522.PCD_Init(); // Init MFRC522 card
}

void loop() {
  //Check WiFi connection status
  if(WiFi.status()== WL_CONNECTED){
    HTTPClient http;
    
    // Your Domain name with URL path or IP address with path
    http.begin(wifiClient,serverName);

     //look for new card
  if ( ! mfrc522.PICC_IsNewCardPresent()) {
    return;//got to start of loop if there is no card present
  }
  // Select one of the cards
  if ( ! mfrc522.PICC_ReadCardSerial()) {
    return;//if read card serial(0) returns 1, the uid struct contians the ID of the read card.
  }
  String CardID ="";
  for (byte i = 0; i < mfrc522.uid.size; i++) {
    CardID += mfrc522.uid.uidByte[i];
  }
    
    // Specify content-type header
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    
    // Prepare your HTTP POST request data
    String httpRequestData = "api_key=" + apiKeyValue + "&sensor=" + String(CardID);
    Serial.print("httpRequestData: ");
    Serial.println(httpRequestData);
    
    // You can comment the httpRequestData variable above
    // then, use the httpRequestData variable below (for testing purposes without the BME280 sensor)
    //String httpRequestData = "api_key=tPmAT5Ab3j7F9&sensor=BME280&location=Office&value1=24.75&value2=49.54&value3=1005.14";
 // Send HTTP POST request
   int httpResponseCode = http.POST(httpRequestData);
    digitalWrite(BUZZER, HIGH);  // Turn the LED off by making the voltage HIGH
    delay(300); 
    digitalWrite(BUZZER, LOW);  // Turn the LED off by making the voltage HIGH
    delay(300);
     
    // If you need an HTTP request with a content type: text/plain
    //http.addHeader("Content-Type", "text/plain");
    //int httpResponseCode = http.POST("Hello, World!");
    
    // If you need an HTTP request with a content type: application/json, use the following:
    //http.addHeader("Content-Type", "application/json");
    //int httpResponseCode = http.POST("{\"value1\":\"19\",\"value2\":\"67\",\"value3\":\"78\"}");
  if (httpResponseCode>0) {
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
    }
    else {
      Serial.print("Error code: ");
      Serial.println(httpResponseCode);
    }
    
    // Free resources
    http.end();
  }
  else {
    Serial.println("WiFi Disconnected");
  }
  //Send an HTTP POST request every 15 seconds
  delay(1000);  
}
