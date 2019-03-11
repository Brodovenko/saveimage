Тестовый пакет

Для скачивания добавьте запись в composer.json "brodovenko/saveimage": "dev-master"

Пример использования:

$imageUrl = 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/2014-09-12_-_Vitali_Klitschko_-_9019.jpg/270px-2014-09-12_-_Vitali_Klitschko_-_9019.jpg';

$params = [
    'width' => 1000,
    'height' => 900,
    'type' => ['image/gif', 'image/jpeg', 'image/png']
];

$pathToSave = 'image';

\brodovenko\saveimage\src\ImageSaveServer::saveImage($imageUrl,$params,$pathToSave);

Если загрузчик не зарегистрирован прописываем - регистрируем require DIR . '/vendor/autoload.php';