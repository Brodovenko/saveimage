<?php
/**
 * Created by PhpStorm.
 * User: Vitalii
 * Date: 09.03.2019
 * Time: 17:07
 */
namespace brodovenko\saveimage\src;


class DownloadedImage
{
    private $raw;
    private $info;
    private $error;

    /**
     * DownloadedImage constructor.
     * @param string $raw
     * @param array|null $info
     * @param string|null $error
     */
    public function __construct(string $raw, ?array $info = null, ?string $error = null)
    {
        $this->raw = $raw;
        $this->info = $info;
        $this->error = $error;
    }

    /**
     * @return string
     */
    public function getRaw()
    {
        return $this->raw;
    }

    /**
     * @return array|null
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @return string|null
     */
    public function getError()
    {
        return $this->error;
    }
}