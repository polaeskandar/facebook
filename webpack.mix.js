let laravelMix = require("laravel-mix");

laravelMix.minify([
  "./resources/css/auth.css",
  "./resources/css/comments.css",
  "./resources/css/errors.css",
  "./resources/css/global.css",
  "./resources/css/home.css",
  "./resources/css/navbar.css",
  "./resources/css/posts.css",
  "./resources/css/profile.css",
], "./public/css/style.css");

laravelMix.js("./resources/js/app.js", "./public/js/main.js");
