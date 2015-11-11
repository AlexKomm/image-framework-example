<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Загрузка изображений</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
          integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
          crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"
          integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h3>Загрузка изображений</h3>
    <?php if (\imageframework\environment\Session::instance()->has('log')): ?>
        <div class="alert alert-info" role="alert">
        <?php foreach (\imageframework\environment\Session::instance()->get('log') as $msg): ?>
                <?php echo $msg; ?><br>
            <?php \imageframework\environment\Session::instance()->del('log'); ?>
        <?php endforeach ?>
        </div>
    <?php endif; ?>
    <div class="panel panel-default">
        <div class="panel-heading">Изображение 1</div>
        <div class="panel-body">
            <form enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <input type="file" name="image">
                </div>
                <div class="form-group">
                    <?php foreach ($this->getPlugins() as $plugin): ?>
                        <div class="form-inline">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="<?php echo $plugin->getTag(); ?>" name="plugins[]">
                                    <?php echo $plugin->getTitle(); ?>
                                </label>
                            </div>
                            <?php foreach ($plugin->getAttributes() as $plugin_attribute): ?>
                                <?php echo $plugin_attribute->getWidget()->render(); ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="form-group right">
                    <input type="submit" name="submit" value="Сохранить">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>