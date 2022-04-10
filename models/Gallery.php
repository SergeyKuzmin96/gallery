<?php
require_once '../app/DB.php';

class Gallery
{
    const dir_original = "../public/uploads/original/";
    const dir_mini = "../public/uploads/mini/";
    public $connect;
    public $user_id;

    public function __construct()
    {
        $db = new DB;
        $this->connect = $db->getConnection();
        $this->user_id = $_SESSION['user']['id'];

    }

    //Метод получения изображений для галереи
    public function getImagesByUserId(): array
    {
        $query = "SELECT id, image_link FROM `users_images` WHERE `user_id` = '$this->user_id' ORDER BY id DESC ";
        $result = $this->connect->query($query);
        $images = array();
        while (($row = $result->fetch_assoc()) != FALSE) {
            $images[$row['id']] = $row['image_link'];
        }
        return $images;
    }

    //Метод удаления изображения из БД и с сервера
    public function deleteImage($name)
    {
        unlink(self::dir_mini . $name);
        unlink(self::dir_original . $name);
        $query = "DELETE  FROM `users_images` WHERE `image_link` = '$name' AND `user_id` = '$this->user_id'";
        $this->connect->query($query);
    }

    //Метод загрузки изображения на сервер и в БД
    public function newImageById($id, $name, $tmp_name, $type)
    {
        $path_original = self::dir_original . $name;
        $path_mini = self::dir_mini . $name;

        if (!is_dir(self::dir_original)) {
            mkdir(self::dir_original, 0777, true);
        }
        if (!is_dir(self::dir_mini)) {
            mkdir(self::dir_mini, 0777, true);
        }

        move_uploaded_file($tmp_name, $path_original);

        self::resize_image($type, $path_original, $path_mini);
        mysqli_query($this->connect, "INSERT INTO `users_images` (`user_id`, `image_link`) VALUES ('$id', '$name')");
    }

    //Метод ресайза картинки
    private function resize_image($type, $path_img, $path_new): void
    {
        $img = self::imageCreateFromType($path_img, $type);
        $img_width = imagesx($img);
        $img_height = imagesy($img);
        $k = $img_width / 100;
        $new_width = $img_width / $k;
        $new_height = $img_width / $k;

        $new_img = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($new_img, $img, 0, 0, 0, 0, $new_width, $new_height, $img_width, $img_height);
        self:: saveImageFromType($type, $new_img, $path_new);
        imagedestroy($img);
        imagedestroy($new_img);

    }

    //Вспомогательный метод создания картинки, согласно типу файла
    private function imageCreateFromType($path, $type)
    {
        if ($type == 'image/jpeg') {
            return imagecreatefromjpeg($path);
        } elseif ($type == 'image/gif') {
            return imagecreatefromgif($path);
        } elseif ($type == 'image/png') {
            return imagecreatefrompng($path);
        } else {
            return false;
        }
    }

    //Вспомогательный метод сохранения картинки, согласно типу файла
    private function saveImageFromType($type, $img, $path): void
    {
        if ($type == 'image/jpeg') {
            imagejpeg($img, $path);
        } elseif ($type == 'image/gif') {
            imagegif($img, $path);
        } elseif ($type == 'image/png') {
            imagepng($img, $path);
        }
    }

}