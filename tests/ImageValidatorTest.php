<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 11.03.2019
 * Time: 11:33
 */

namespace brodovenko\saveimage\src;


class ImageValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function testValidate()
    {
        $imageUrl = 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/2014-09-12_-_Vitali_Klitschko_-_9019.jpg/270px-2014-09-12_-_Vitali_Klitschko_-_9019.jpg';

        $params = [ 'width' => 1000, 'height' => 900, 'type' => ['image/gif', 'image/jpeg', 'image/png'] ];

        $imageDownloader = new ImageDownloader($imageUrl);
        $imageValidator = new ImageValidator($imageDownloader->download());

        $this->asserTrue($imageValidator->validate());
    }
}
