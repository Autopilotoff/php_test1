<? include("mailer.php"); ?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="windows-1251" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Limelight|Flamenco|Federo|Yesteryear|Josefin Sans|Spinnaker|Sansita One|Handlee|Droid Sans|Oswald:400,300,700" media="screen" rel="stylesheet" type="text/css" />
    <link href="Content/stylesheets/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="Content/stylesheets/bootstrap-responsive.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="Content/stylesheets/common.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="Content/stylesheets/fontawesome.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="Content/stylesheets/main.css" media="screen" rel="stylesheet" type="text/css" />
    <title>main</title>
  </head>
  
  <body>
    <div id="page-wrapper">
      <div id="absolute-wrapper">
        <div class="rectangle">
          <h3 class="heading">Форма обратной связи</h3>
            <form name="form_main_1" method="post" action="">
                <label id="error-name" class="error-label"><?=$error_name?></label>
                <input class="textinput" id="name" type="text"  placeholder="Введите ваше имя.." name="name" value="<?=$name ?>"/>
                <label id="error-email" class="error-label"><?=$error_email?></label>
                <input class="textinput" id="email" type="text" placeholder="Ваш email.." name="email" value="<?=$email?>"/>
                <label id="error-message" class="error-label"><?=$error_message?></label>
                <textarea  id="message" placeholder="Введите сообщение.." name="message"><?=$message?></textarea>
                <input  type="submit" name="submit_button" class="btn btn-success btn-large" style="display:<?=$visibleButton?>"/>
                <p class="success" style="display:<?=$visibleMessage?>">Спасибо! Форма успешно отправлена!</p>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
