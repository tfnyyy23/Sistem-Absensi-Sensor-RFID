#include <SPI.h>
#include <MFRC522.h>
#include <WiFiClient.h>
#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>

//Konfigurasi WiFi
const char* ssid = "SOEGIARTO";
const char* password = "soegiarto10";

//pengenalan host (server) = IP Address komputer server
const char* host = "192.168.100.20";

#define LED_PIN 15 //D8
#define BTN_PIN 2 //D4

#define SS_PIN 4 //D2
#define RST_PIN 5 //D1

MFRC522 rfid(SS_PIN, RST_PIN);

MFRC522::MIFARE_Key key;


void setup() {
  Serial.begin(9600);

  //setting koneksi wifi
  WiFi.hostname("NodeMCU");
  WiFi.begin(ssid, password);

  //cek koneksi wifi
  while(WiFi.status() != WL_CONNECTED)
  {
    //progress sedang mencari WiFi
    delay(500);
    Serial.print(".");  
  }
  Serial.println("");
  Serial.println("WiFi Connected");
  Serial.println("IP Address : ");
  Serial.println(WiFi.localIP());

  pinMode(LED_PIN, OUTPUT);
  pinMode(BTN_PIN, OUTPUT);

  SPI.begin();
  rfid.PCD_Init();

  for (byte i = 0; i < 6; i++) {
    key.keyByte[i] = 0xFF;
  }
  
  Serial.println("Dekatkan Kartu RFID Anda ke Reader");
  Serial.println();
  printHex(key.keyByte, MFRC522::MF_KEY_SIZE);
}

void loop() {
  
  //baca status pin button kemudian uji
  if(digitalRead(BTN_PIN)==1) //ditekan
  {
    Serial.println("OK");
    //nyalakan lampu LED
    digitalWrite(LED_PIN, HIGH);  
    while(digitalRead(BTN_PIN)==1) ; //menahan proses sampai tombol dilepas
    //ubah mode absensi di aplikasi web
    String getData,Link ;
    HTTPClient http ;
    //Get Data
    Link = "http://192.168.100.20/absensi/ubahmode.php"; 
    http.begin(Link);
    
    int httpCode = http.GET();
    String payload = http.getString();

    Serial.println(payload);
    http.end();  
  }

  //matikan lampu LED
  digitalWrite(LED_PIN, LOW);

  if ( ! rfid.PICC_IsNewCardPresent())
    return;

  if ( ! rfid.PICC_ReadCardSerial())
    return;

  String IDTAG = "";
  for(byte i = 0; i < rfid.uid.size; i++)
  {
    IDTAG += rfid.uid.uidByte[i];
  }

    Serial.println("");
    Serial.println(F("Nomor kartu RFID Anda:"));
    Serial.print(F("In hex: "));
    printHex(rfid.uid.uidByte, rfid.uid.size);
    Serial.println();
    Serial.print(F("In dec: "));
    printDec(rfid.uid.uidByte, rfid.uid.size);
    Serial.println();

  //nyalakan lampu LED
  digitalWrite(LED_PIN, HIGH);

  //kirim nomor kartu RFID untuk disimpan ke tabel tmprfid
  WiFiClient client;
  const int httpPort = 80;
  if(!client.connect(host, httpPort))
  {
    Serial.println("Connection Failed");
    return;
  }

  String Link;
  HTTPClient http;
  Link = "http://192.168.100.20/absensi/kirimkartu.php?nokartu=" + IDTAG;
  http.begin(Link);

  int httpCode = http.GET();
  String payload = http.getString();
  Serial.println(payload);
  http.end();

  delay(1000);
}

void printHex(byte *buffer, byte bufferSize) {
  for (byte i = 0; i < bufferSize; i++) {
    Serial.print(buffer[i] < 0x10 ? " 0" : " ");
    Serial.print(buffer[i], HEX);
  }
}

void printDec(byte *buffer, byte bufferSize) {
  for (byte i = 0; i < bufferSize; i++) {
    Serial.print(buffer[i] < 0x10 ? " 0" : " ");
    Serial.print(buffer[i], DEC);
  }
}
