<?php
/**
 * Created by PhpStorm.
 * User: Vitalii
 * Date: 10.03.2019
 * Time: 23:29
 */
namespace brodovenko\saveimage\src;

class ImageSaveServer
{
    /**
     * @param string $imageUrl
     * @param array $params
     * @param string $pathToSave
     */
    public static function saveImage(string $imageUrl, array $params, string $pathToSave)
    {
        $imageDownloader = new ImageDownloader($imageUrl);
        $imageValidator = new ImageValidator($params);
        $imageSaver = new ImageSaver($pathToSave);
        $downloadedImage = $imageDownloader->download();
        if (!$imageValidator->validate($downloadedImage)) {
            throw new InvalidImageException('Файл не прошел валидацию');
        }
        $imageSaver->save($downloadedImage);
        echo 'Изображение сохранено';

    }
}