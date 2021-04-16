# Shopware 6 API Controller

Ein Beispiel-Plugin, wie Entitäten von der mySql Datenbank, durch einen API Controller, bereitgestellt werden.

# Hinweis

Damit das Plugin weitere Produkte anzeigt, muss der Controller zuallererst die Entitäten generieren und demzufolge auf die Datenbank übertragen.

# Schritt Nr. 1

Führen Sie über die Administration eine Integration aus. Sie erhalten zwei wichtige Infos:

1. client_id
2. client_secret

Für das Testen der API Route brauchen Sie einen API Client.

Empfehlungen:

- [Insomnia.rest](https://insomnia.rest/)
- [postman.com](https://www.postman.com/)

### API Request für Oauth

Erstellen Sie eine POST Anfrage mit den zugehörigen Infos von der Integration, damit Sie die Route für die Generierung der Entitäten authentifizieren können. Die Anfrage besteht aus der client_id und der client_secret, welche im **JSON** Format registriert werden muss.

```json
{
  "client_id": "",
  "client_secret": "",
  "grant_type": "client_credentials"
}
```

Die Oauth Route oder URL muss Ihre Domain und die Route api/oauth/token beinhalten.

> http://localhost:8888/api/oauth/token

Sie erhalten nach Ihrer Anfrage einen **access_token**, den Sie in die nächste POST Anfrage einsetzen müssen.

### API Request für die Generation der Entitäten

Erstellen Sie eine weitere POST Anfrage mit der Route die sich im API Controller befindet.

> http://localhost:8888/api/v1/\_action/emz-specials-collection/generate

Setzen Sie den **access_token** über die Option Bearer Token ein.

![insomnia](https://brianstemplats.site/assets/images/portfolio_imgs/emz_controller.jpeg)

Wie Sie auf den Screenshot sehen, müssten Sie die Response

> No body returned for response

erhalten.

Das bedeutet Ihre mySql Tabelle wurde in der Datenbank erstellt und ist über den Namen **_emz_specials_collection_** verfügbar.

---

# Schritt 2

Aktivieren Sie ein paar Datensätze (empfohlen sind 4). Dafür müssen Sie sich in Ihre Datenbank Administration einloggen. Im folgenden wird speziell über den Fall phpMyAdmin gesprochen, jedoch sollte der Aufbau von anderen UIs sehr ähnlich sein und das gesuchte Feld 'active' leicht zu finden sein.

Ändern Sie bei vier Datensätzen den Wert von 0 auf '1', damit die Datensätze aktiviert werden und der Storefront zur Verfügung stehen.

![mySql table](https://brianstemplats.site/assets/images/portfolio_imgs/mySql.jpeg)

---

# Schritt 3

Öffnen Sie im letzten Schritt die Administration von Shopware und aktivieren Sie den Button 'showInStorefront'.

Die Administration ist über die angezeigte URL erreichbar:

> http://localhost:8888/admin

Sie öffnen Settings => System => Plugins => Discount collection => config. => aktiviere showInStorefront bzw. den Schalter

und speichere die Konfiguration ab.

FERTIG!

**_Die Produkte müssten über die Storefront zu sehen sein_**

![storefront](https://brianstemplats.site/assets/images/portfolio_imgs/storefront.jpeg)
