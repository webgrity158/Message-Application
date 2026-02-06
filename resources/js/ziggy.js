const Ziggy = {"url":"http:\/\/192.168.0.215:8000","port":8000,"defaults":{},"routes":{"auth.login":{"uri":"auth\/login","methods":["GET","HEAD"]},"home.index":{"uri":"home","methods":["GET","HEAD"]},"storage.local":{"uri":"storage\/{path}","methods":["GET","HEAD"],"wheres":{"path":".*"},"parameters":["path"]}}};
if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
  Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };
