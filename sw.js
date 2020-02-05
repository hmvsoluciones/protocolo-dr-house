// asignar nombre y version de la cache

const CACHE_NAME = 'v1_ca cache_pwa';

//Ficheros a cachear en la aplicación

var urlsToCache = [
        './',
        , './images/ajax-loader.gif'       
        /*, './images/slide128.png'
        , './images/slide144.png'
        , './images/slide256.png'
        , './images/slide48.png'
        , './images/slide512.png'
        , './images/slide64.png'        */
];

//eventos de instalacion, activacion, fetch

//Evento install, instalacion del service worker, almacena en cache los recursos estaticos de la aplicacion

self.addEventListener('install', e => {
    e.waitUntil(
            caches.open(CACHE_NAME)
            .then(cache => {
                return cache.addAll(urlsToCache)
                        .then(() => {
                            self.skipWaiting();
                        })
            })
            .catch(err => console.log("No se ha registrado el cache", err))
            );
});
//Evento activate

self.addEventListener('activate', e => {
    const cacheWhitelist = [CACHE_NAME];

    e.waitUntil(
            caches.keys()
            .then(cacheNames => {

                return Promise.all(
                        cacheNames.map(cacheName => {
                            if (cacheWhitelist.indexOf(cacheNames === -1)) {
                                //borra elementos que no se necesitan
                                return caches.delete(cacheName);
                            }
                        })
                        );
            })
            .then(() => {
                // activar la cahe
                self.clients.claim();
            })
            );
});

//Evento fetch, peticiones a internet, recupera la informacion de la cache si esxite o realiza una peticion ajax
self.addEventListener('fetch', e => {
    e.respondWith(
            caches.match(e.request)
            .then(res => {
                if (res) {
                    //devolviendo los datos desde cache
                    return res;
                } else {
                    return fetch(e.request);
                }
            })
            );
});