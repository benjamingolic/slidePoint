# Sachstandsbericht 2019-04-11

Im letzten halben Jahr haben wir folgende Aufgaben gelöst:

* Hochladen von Bildern
* Slideshow (aber nicht ganz funtionell)
* SlidePointUI (Userinterface)
* Pflichtenheft geschrieben
* Systemarchitektur gezeichnet
* User-Stories überlegt
* Use-Case Diagramm gezeichnet


## Wo kann man unsere Ergebnisse sehen?

Unsere Ergebnisse findet man in unserem GitHub-Repo (https://github.com/benjamingolic/slidePoint) und auch in YouTrack (http://vm81.htl-leonding.ac.at:8080/projects/11aedf38-40ff-4ffb-b5bd-a6868290fac7).

(Was es Slideshow angeht, die haben wir nicht auf unserem GitHub-Repo da es nicht vollstdig ist. Die Slideshow hat nicht mit den Fotos was hochgeladen wurden funktioniert.)

## Was müssen wir machen?

Da wir uns jetzt für PHP und NGINX (mit dockern) entschieden haben, müssen wir zuerst dockern und da mit NGINX und PHP arbeiten (ist erledigt). <br>
Dann müssen wir den FileUpload mit PHP machen(und nicht wie uhrsprünglich mit node.js). (Ist halbwegs fertig). <br>
Wir müssen zu jedem einzelnen Bild die Eigenschaften speichern (welches Format das Bild hat und wie es angezeigt sein soll (z.B.: zentriert,verzehrt, usw.)), das haben wir uns gedacht in eine json zu sprichern. Und dann soll noch die Slideshow erstellt werden(wir arbeiten daran).