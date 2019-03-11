<?php
/**
 * Created by PhpStorm.
 * User: Vitalii
 * Date: 09.03.2019
 * Time: 17:22
 */
namespace brodovenko\saveimage\src;

class ImageValidator
{
    private $params;

    /**
     * ImageValidator constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->params = $params;
    }

    /**
     * @param DownloadedImage $downloadedImage
     * @return bool
     * @throws InvalidImageException
     */
    public function validate(DownloadedImage $downloadedImage)
    {
        $image = getimagesizefromstring($downloadedImage->getRaw());
        $this->findError($downloadedImage);
        $this->validateSize($image);
        $this->validateType($image);
        return true;
    }


    /**
     * @param $downloadedImage
     * @throws InvalidImageException
     */
    private function findError($downloadedImage)
    {
        if ($downloadedImage->getError() === CURLE_OPERATION_TIMEDOUT) {
            throw new InvalidImageException('Превышен лимит ожидания');
        }
        if ($downloadedImage->getError() === CURLE_ABORTED_BY_CALLBACK) {
            throw new InvalidImageException('Размер не должен превышать 5 Мбайт.');
        }
        if ($downloadedImage->getInfo()['http_code'] !== 200) {
            throw new InvalidImageException('Файл не доступен.');
        }
        $fi = finfo_open(FILEINFO_MIME_TYPE);
        $mime = (string)finfo_buffer($fi, $downloadedImage->getRaw());
        finfo_close($fi);
        if (strpos($mime, 'image') === false) {
            throw new InvalidImageException('Можно загружать только изображения.');
        }
    }

    //Ограничение размеров

    /**
     * @param array $image
     * @throws InvalidImageException
     */
    private function validateSize(array $image)
    {
        if ($image[1] > $this->params['height']) {
            throw new InvalidImageException('Высота изображения не должна превышать 768 точек.');
        }
        if ($image[0] > $this->params['width']) {
            throw new InvalidImageException('Ширина изображения не должна превышать 1280 точек.');
        }
    }

    //Валидация типа изображения

    /**
     * @param array $image
     * @throws InvalidImageException
     */
    private function validateType(array $image)
    {
        $allowedMimeTypes = $this->params['type'];
        $isValidMimeType = in_array($image['mime'], $allowedMimeTypes);
        if ($isValidMimeType === false) {
            throw new InvalidImageException('Неверный тип изображения');
        }
    }
}