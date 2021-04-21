curl -X POST -H "Authorization: key=TU_SERVER_KEY" \
   -H "Content-Type: application/json" \
   -d '{
        "data": {
            "notification": {
                "title": "GRIJALVAROMERO",
                "body": "Este es un mensaje asdsadsad",
                "icon": "http://localhost/notificaciones/img/icon.png",
            }
        },
        "to": "TOKEN_CLIENTE"
}' https://fcm.googleapis.com/fcm/send
