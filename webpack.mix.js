let laravelMix = require("laravel-mix");

laravelMix.minify(["./resources/css/app.css", "./resources/css/auth.css"], "public/css/app.css");

