<?php
/**
 * Created by PhpStorm.
 * User: Vitalii
 * Date: 09.03.2019
 * Time: 16:34
 */
namespace brodovenko\saveimage\src;

class ImageDownloader
{
    public $image;

    /**
     * ImageDownloader constructor.
     * @param string $imageUrl
     */
    public function __construct(string $imageUrl)
    {
        $this->image = $imageUrl;
    }

    /**
     * @return DownloadedImage
     * @throws InvalidImageException
     */
    public function download()
    {
        $this->checkHTTP();
        return $this->curlInit();
    }

    // проверка ссылки

    /**
     * @throws InvalidImageException
     */
    private function checkHTTP()
    {
        if (!preg_match("/^https?:/i", $this->image) && filter_var($this->image, FILTER_VALIDATE_URL)) {
            throw new InvalidImageException('Укажите корректную ссылку на удалённый файл.');
        }
    }

    // Запуск cURL и настройки для cURL

    /**
     * @return DownloadedImage
     */
    private function curlInit()
    {
        $ch = curl_init($this->image);
        curl_setopt_array($ch, [
            CURLOPT_TIMEOUT => 60,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_NOPROGRESS => 0,
            CURLOPT_BUFFERSIZE => 1024,
            CURLOPT_PROGRESSFUNCTION => function ($ch, $dwnldSize, $dwnld, $upldSize, $upld) {
                if ($dwnld > 1024 * 1024 * 5) {
                    return -1;
                }
            },
            CURLOPT_SSL_VERIFYPEER => 1,
            CURLOPT_SSL_VERIFYHOST => 2,
        ]);
        $result = new DownloadedImage(curl_exec($ch), curl_getinfo($ch), curl_errno($ch));
        curl_close($ch);
        return $result;
    }
}