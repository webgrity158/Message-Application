const baseRoutes = {
  "back-end.auth.login": { "uri": "auth/login", "methods": ["GET", "HEAD"] },
  "front-end.home": { "uri": "home", "methods": ["GET", "HEAD"] },
  "back-end.home.initData": { "uri": "home", "methods": ["POST"] },
  "back-end.home.inboxData": { "uri": "home/inbox", "methods": ["POST"] },
  "storage.local": {
    "uri": "storage/{path}",
    "methods": ["GET", "HEAD"],
    "wheres": { "path": ".*" },
    "parameters": ["path"]
  }
};

const Ziggy = {
  url: "http://192.168.0.215:8000",
  port: 8000,
  defaults: {},
  routes: { ...baseRoutes },
};

const registerRoutes = (newRoutes = {}) => {
  Object.assign(Ziggy.routes, newRoutes);
};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
  registerRoutes(window.Ziggy.routes);
}

export { Ziggy, registerRoutes };
