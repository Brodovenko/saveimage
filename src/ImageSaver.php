<?php
/**
 * Created by PhpStorm.
 * User: Vitalii
 * Date: 09.03.2019
 * Time: 17:52
 */
namespace brodovenko\saveimage\src;

class ImageSaver
{
    private $pathToSave;

    /**
     * ImageSaver constructor.
     * @param string $pathToSave
     */
    public function __construct(string $pathToSave)
    {
        $this->pathToSave = $pathToSave;
    }

    /**
     * @param DownloadedImage $downloadedImage
     * @throws InvalidImageException
     */
    public function save(DownloadedImage $downloadedImage)
    {
        $raw = $downloadedImage->getRaw();
        $image = getimagesizefromstring($raw);
        $name = md5($raw);
        $extension = image_type_to_extension($image[2]);
        if (!file_exists($this->pathToSave)) {
            mkdir($this->pathToSave, 0777);
        }
        if (!file_put_contents($this->pathToSave . '/' . $name . $extension, $raw)) {
            throw new InvalidImageException('При сохранении изображения на диск произошла ошибка.');
        }
    }

}