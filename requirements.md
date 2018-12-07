# Requirements
- Download and install Selenium Standalone Jar to a specific bin folder inside the project.
- Install Google Chrome into the `/usr/bin` directory of the *server*
- Install ChromeDriver into the `/usr/bin` directory of the *server*
- Facebook Web Driver package required for the core:
```
php composer.phar require facebook/webdriver
```
- Start the chrome driver with these options:
```
$options->addArguments(array(
  '--headless', '--no-sandbox', '--disable-dev-shm-usage'
));
```
- The *process.json* structure should be like:
```
$process = [
    [
        'item' => 'cxgtu',
        'action' => 'click'
    ],
    [
        'item' => 'nbyts',
        'action' => 'crawl'
    ]
];
```