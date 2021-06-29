self.addEventListener("install", e => {
	console.log("### service worker instalado!!!");
});

self.addEventListener("fetch", e => {
	console.dir(e);
});