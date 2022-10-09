let laravelMix = require("laravel-mix");

laravelMix.minify([
  "./resources/css/app.css",
  "./resources/css/errors.css",
  "./resources/css/auth.css"
], "./public/css/app.css");

laravelMix.js("./resources/js/app.js", "./public/js/main.js");
