var CACHE_NAME = 'my-site-cache-v1';

// Listen for install event, set callback
self.addEventListener('install', function(event) {
    event.waitUntil(
        caches.open(CACHE_NAME)
        .then(function(cache){
            console.log('Install serviceworker... cache openend');
            return cache.addAll(
                [
                    '/dashboard',
                    '/lending',
                    '/cashflow',
                    '/css/bootstrap.min.css',
                    '/css/dashboard.css',
                    '/css/main.css',
                    '/js/bootstrap.bundle.min.js',
                    '/js/dashboard.js',
                    '/js/main.js',
                    '/images/test.png'
                ]
            );
        })
    );
});

// self.addEventListener('fetch', function(event) {
//     event.respondWith(
//       caches.open('mysite-dynamic').then(function(cache) {
//         return cache.match(event.request).then(function (response) {
//           return response || fetch(event.request).then(function(response) {
//             cache.put(event.request, response.clone());
//             return response;
//           });
//         });
//       })
//     );
//   });

  self.addEventListener('fetch', function(event) {
    
    var request = event.request
    var url = new URL(request.url)

    if(url.origin == location.origin){
      event.respondWith(
        caches.match(request).then(function(response){
          return response || fetch(request)

        })
        )
    }else {
      event.respondWith(
        caches.open('catatyuk-cache').then(function(cache){
          return fetch(request).then(function(liveResponse){
            cache.put(request, liveResponse.clone())
            return liveResponse
          })
          // .catch(function(){
          //   return caches.match(request).then(function(response){
          //     if(response) return response
          //     return caches.match('/fallback.json')
          //   })
          // })
        })
      )
    }
  });

self.addEventListener('activate', function(event) {
    event.waitUntil(
        caches.keys().then(function(cacheNames){
            return Promise.all(
                cacheNames.filter(function(cacheName){
                    return cacheName != CACHE_NAME
                }).map(function(cacheName){
                    return caches.delete(cacheName)
                })
            );
        })
    );
  });