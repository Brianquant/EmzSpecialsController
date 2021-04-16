# Shopware 6 API Controller

Ein Beispiel Plugin, wie Entitäten von der mySql Datenbank bereitgestellt werden, durch einen API Controller.

# Hinweis 1
Damit das Plugin weitere Produkte anzeigt, muss der Controller zu aller 
erst die Entitäten generieren und demzufolge auf die Datenbak übertragen.

# Schritt Nr. 1 
Führen Sie über die Administration eine Integration aus. Sie erhalten zwei wichtige Infos:
1. client_id
2. client_secret

Für das Testen der API Route brauchen Sie einen API Client.

Empfehlungen: 

- [Insomnia.rest](https://insomnia.rest/)
- [postman.com](https://www.postman.com/)

### API Request für Oauth

Erstellen Sie eine POST Anfrage mit den zugehörigen Infos von der Integration,
damit Sie die Route für die Generation der Entitäten authentifizieren können. Die Anfrage besteht aus der client_id und
der client_secret, welches im **JSON** Format registriert werden muss. 

```json
{
	"client_id": "",
	"client_secret": "",
	"grant_type": "client_credentials"  
}
```
Die Oauth Route oder Url muss Ihre Domain und die Route api/oauth/token behinhalten.
> http://localhost:8888/api/oauth/token

Sie erhalten nach der Anfrage einen **access_token**, denn Sie in die nächste POST Anfrage einsetzen.

### API Request für die Generation der Entitäten

Erstelle eine weitere POST Anfrage mit der Route die sich im API Controller befindet
> http://localhost:8888/api/v1/_action/emz-specials-collection/generate

Setzen Sie den **access_token** ein über die Option Bearer Token

![insomnia](https://brianstemplats.site/assets/images/portfolio_imgs/emz_controller.jpeg)

Wie Sie auf den Screenshot sehen, müssten Sie die Response 
> No body returned for response 

erhalten.

Das bedeutet Ihre mySql Tabelle wurde in der Datenbank erstellt und ist über den Namen ***emz_specials_collection*** verfügbar.

---

# Schritt 2
 Aktvieren Sie ein paar Datensätze (empfohlen sind 4). Dafür müssen Sie sich in Ihre Datenbank Administration einloggen. 
 Ich spreche jetzt speziell für phpMyAdmin, dennoch müsste der Aufbau der UI sehr ähnlich sein und das gesuchte Feld 
 'active' leicht zu finden sein.
 
 Ändern Sie bei vier Datensätzen den Wert von 0 auf '1', damit die Datensätze aktiviert werden und der Storefront zur verfügung stehen.
 
 ![mySql table](https://brianstemplats.site/assets/images/portfolio_imgs/mySql.jpeg)
 
 ---
 
 # Schritt 3
 
 Im letzten Schritt öffnen Sie die Administration von Shopware und aktivieren Sie
 den Button 'showInStorefront'. 
 
 Die Administration ist über die angezeigte Url erreichbar:
 
 > http://localhost:8888/admin
 
 Sie öffnen Settings => System => Plugins => Discount collection => config. => aktiviere showInStorefront bzw. den Schalter
 
 und speichere die Konfiguration ab.
 
 FERTIG!
 
 ***Die Produkte müssten über die Storefront zu sehen sein***
 
 ![storefront](https://brianstemplats.site/assets/images/portfolio_imgs/storefront.jpeg)
 
 
 
 






