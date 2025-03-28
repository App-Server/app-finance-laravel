self.addEventListener('install', (event) => {
event.waitUntil(
    caches.open('app-cache').then((cache) => {
    return cache.addAll([
        '/',
        '/css/app.css',
        '/js/app.js',
        // Adicione mais arquivos que devem ser cacheados
    ]);
    })
);
});

self.addEventListener('fetch', (event) => {
event.respondWith(
    caches.match(event.request).then((response) => {
    return response || fetch(event.request);
    })
);
});
  