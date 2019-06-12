# SlidePoint

Maria Milic, Benjamin Golic und Nina Holzinger
## Aufgabenstellung

Ziel ist es ein Projekt zu erstellen, welches das Anzeigen von Bildern am Digital Signage einfacher gestaltet, da es zurzeit sehr zeitaufwendig und umständlich ist. Der Benutzer soll selbst entscheiden können mit welcher Geschwindigkeit und in welchem Größenformat die Bilder angezeigt werden sollen.

![Systemarchitektur](Images/sysarchitektur.jpeg)
Systemarchitektur

![Use-Case Diagramm](Images/usecasediagram.jpg)
UseCase-Diagramm

<br>

# Anweisungen

1. Als erstes kopiert man den Link von unserer Repo und cloned das Repo mit:
   #### git clone link
   ![LinkzurRepo](Images/screen1.JPG)

2. Man sollte nun Docker starten. In unserem Fall haben wir Docker auf unserer VMware, also müssen wir mit Hilfe von FileZilla oder WinSCP auf            unsere VMware zugreifen und den Ordner dort hochladen.

3. Als nächstes gibt sollte folgender Befehl ausgeführt werden um Schreibrechte zu bekommen:
#### chmod 777 [foldername] 
falls dieser Befehl nicht funktioniert sollte man diesen anwenden
#### sudo chown -R www-data [foldername]

4. Nachdem sich der Ordner in einer Umgebung befindet in der Docker installiert ist und die Schreibrechte vergeben sind, führt man folgenden befehl aus um den Docker Container zu starten:

    #### docker-compose up -d
     
5. Wenn das auch fertig ist geht man in einen beliebigen Browser und gibt ein:
   #### ip-adresse:port
   ip-adresse: kann man mit Hilfe von ifconfig herausfinden<br>
   port: 8090<br>
   ![Browser](Images/browser.jpg)
