<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form enctype="multipart/form-data" method="post">
        <p>Загрузите ваши фотографии на сервер</p>
        <p><input type="file" name="photo" accept="image/png,image/jpeg">
        <input type="submit" name="send" value="Отправить"></p>
    </form>
</body>
</html>

    <?php
        $Width = 1000;
        $Height = 300;

        $DataSet = [];
        $Result =[];

        $Size = $Width * $Height;
        if (isset($_POST['send']))
        {
            echo "<pre>";
                print_r($_FILES);
            echo "<pre>";

            $photo = $_FILES['photo'];
            if ($photo["type"]=="image/png"){

                makeGrayPic($photo["name"],"newphoto.png");

                $image = imagecreatefrompng($photo["name"]);
                $InputSize = getimagesize($photo["name"])[0] * getimagesize($photo["name"])[1];
                if ($InputSize!=$Size)
                {
                    $image = imagescale($image,$Width,$Height);
                }
                array_push($DataSet,$image);
                array_push($Result,"1");
            }
        
        }


        include_once("NeuralNetwork.php");
    
        $NN = new NeuralNetwork($Size,0,10,0.1);

        print("OK");



        function makeGrayPic(&$img){
            // задаем серую палитру для нового изображения
            for ($color = 0; $color <= 255; $color++) {
              imageColorAllocate($img, $color, $color, $color);
            }
          }
    ?>