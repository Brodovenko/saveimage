<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 11.03.2019
 * Time: 11:33
 */

use PHPUnit\Framework\TestCase;

class ImageValidatorTest extends TestCase
{

    public function testValidate()
    {
        $imageUrl = 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/2014-09-12_-_Vitali_Klitschko_-_9019.jpg/270px-2014-09-12_-_Vitali_Klitschko_-_9019.jpg';

        $params = [ 'width' => 1000, 'height' => 900, 'type' => ['image/gif', 'image/jpeg', 'image/png'] ];

        $imageDownloader = new \brodovenko\saveimage\src\ImageDownloader($imageUrl);
        $imageValidator = new \brodovenko\saveimage\src\ImageValidator($params);

        $this->asserTrue($imageValidator->validate($imageDownloader->download()));
    }
}
