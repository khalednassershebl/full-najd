<?php
$dir = __DIR__ . '/resources/views/front';
$files = new RegexIterator(
    new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir)),
    '/\.blade\.php$/i'
);

foreach ($files as $file) {
    $path = $file->getPathname();
    $content = file_get_contents($path);
    $original = $content;
    
    $content = str_replace("asset('assets/", "asset('nagd-front/assets/", $content);
    $content = str_replace("asset('main.css')", "asset('nagd-front/main.css')", $content);
    $content = str_replace("asset('main.js')", "asset('nagd-front/main.js')", $content);
    
    if ($content !== $original) {
        file_put_contents($path, $content);
        echo "Fixed: $path\n";
    }
}
echo "Done.\n";
