// var CACHE_NAME = 'catatyuk-cache-v1';

// // Listen for install event, set callback
// self.addEventListener('install', function(event) {
//     event.waitUntil(
//         caches.open(CACHE_NAME)
//         .then(function(cache){
//             console.log('Install serviceworker... cache openend');
//             return cache.addAll(
//                 [
//                     '/dashboard',
//                     '/lending',
//                     '/cashflow',
//                     '/stock',
//                     '/css/bootstrap.min.css',
//                     '/css/dashboard.css',
//                     '/css/main.css',
//                     '/js/bootstrap.bundle.min.js',
//                     '/js/dashboard.js',
//                     '/js/main.js',
//                     '/images/test.png'
//                 ]
//             );
//         })
//     );
// });

// self.addEventListener('activate', function(event) {
//   event.waitUntil(
//       caches.keys().then(function(cacheNames){
//           return Promise.all(
//               cacheNames.filter(function(cacheName){
//                   return cacheName != CACHE_NAME
//               }).map(function(cacheName){
//                   return caches.delete(cacheName)
//               })
//           );
//       })
//   );
// });

  // self.addEventListener('fetch', function(event) {
    
  //   var request = event.request
  //   var url = new URL(request.url)

  //   if(url.origin == location.origin){
  //     event.respondWith(
  //       caches.match(request).then(function(response){
  //         return response || fetch(request)

  //       })
  //       )
  //   }else {
  //     event.respondWith(
  //       caches.open('catatyuk-cache').then(function(cache){
  //         return fetch(request).then(function(liveResponse){
  //           cache.put(request, liveResponse.clone())
  //           return liveResponse
  //         })
  //       })
  //     )
  //   }
  // });

//   self.addEventListener('fetch', function (event) {
//     event.respondWith(
//         fetch(event.request).catch(function() {
//             return caches.match(event.request)
//         })
//     )
// })

// the cache version gets updated every time there is a new deployment
const CACHE_VERSION = 1;
const CURRENT_CACHE = `catatyuk-${CACHE_VERSION}`;

// these are the routes we are going to cache for offline support
const cacheFiles = [  '/dashboard',
                      '/lending',
                      '/cashflow',
                      '/stock',
                      '/css/bootstrap.min.css',
                      '/css/dashboard.css',
                      '/css/main.css',
                      '/js/bootstrap.bundle.min.js',
                      '/js/dashboard.js',
                      '/js/main.js',
                      '/images/test.png'];

// on activation we clean up the previously registered service workers
self.addEventListener('activate', evt =>
  evt.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cacheName => {
          if (cacheName !== CURRENT_CACHE) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  )
);

// on install we download the routes we want to cache for offline
self.addEventListener('install', evt =>
  evt.waitUntil(
    caches.open(CURRENT_CACHE).then(cache => {
      return cache.addAll(cacheFiles);
    })
  )
);

// fetch the resource from the network
const fromNetwork = (request, timeout) =>
  new Promise((fulfill, reject) => {
    const timeoutId = setTimeout(reject, timeout);
    fetch(request).then(response => {
      clearTimeout(timeoutId);
      fulfill(response);
      update(request);
    }, reject);
  });

// fetch the resource from the browser cache
const fromCache = request =>
  caches
    .open(CURRENT_CACHE)
    .then(cache =>
      cache
        .match(request)
        .then(matching => matching || cache.match('/offline/'))
    );

// cache the current page to make it available for offline
const update = request =>
  caches
    .open(CURRENT_CACHE)
    .then(cache =>
      fetch(request).then(response => cache.put(request, response))
    );

// general strategy when making a request (eg if online try to fetch it
// from the network with a timeout, if something fails serve from cache)
self.addEventListener('fetch', evt => {
  evt.respondWith(
    fromNetwork(evt.request, 10000).catch(() => fromCache(evt.request))
  );
  evt.waitUntil(update(evt.request));
});