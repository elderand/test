function sendToTelegram(message) {
    const botToken = '7717200730:AAFr2UmhOG7Aek-aKw7iMe4PCGCylv3ZrAE';
    const chatId = '-4723096514';
    const url = `https://api.telegram.org/bot${botToken}/sendMessage`;

    const data = {
        chat_id: chatId,
        text: message,
        parse_mode: 'HTML'
    };

    const options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams(data)
    };

    fetch(url, options)
        .then(response => response.json())
        .then(data => console.log('Message sent successfully', data))
        .catch(error => console.error('Error sending message:', error));
}

sendToTelegram("Hello")
