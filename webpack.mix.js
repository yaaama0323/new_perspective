mix.js('resources/js/app.js', 'public/js')
    js( 'resources/js/chat.js', 'public/js' ) //追加
.autoload( { //追加ここから
    "jquery": [ '$', 'window.jQuery' ],
} )//追加ここまで
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
