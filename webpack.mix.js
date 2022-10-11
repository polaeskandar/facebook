let laravelMix = require("laravel-mix");

laravelMix.minify([
  "./resources/css/global.css",
  "./resources/css/errors.css",
  "./resources/css/navbar.css",
  "./resources/css/auth.css",
  "./resources/css/home.css",
  "./resources/css/posts.css",
  "./resources/css/comments.css",
], "./public/css/home.css");

laravelMix.js("./resources/js/app.js", "./public/js/main.js");
