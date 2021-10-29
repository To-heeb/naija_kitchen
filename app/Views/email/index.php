<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!--[if !mso]><!-->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
      <!--<![endif]-->
        <!--[if (gte mso 9)|(IE)]>
        <xml>
          <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
          </o:OfficeDocumentSettings>
        </xml>
      <![endif]-->
      <!--[if (gte mso 9)|(IE)]>
        <style type="text/css">
          body {width: 600px;margin: 0 auto;}
          table {border-collapse: collapse;}
          table, td {mso-table-lspace: 0pt;mso-table-rspace: 0pt;}
          img {-ms-interpolation-mode: bicubic;}
        </style>
      <![endif]-->
      <style>
        .container {
          width:50%;
          margin:auto;
          background-color:#fff;
          min-height:95vh;

        }
        nav a{display:inline-block;float:left}
        nav div{display:inline-block;float:right}
        @media (max-width:480px) {
          .container{width:100%}
          nav a{display:inline-block;float:none}
          nav div{display:inline-block;float:none}
        }
      </style>
  </head> 

  <body style="background-color:#fff;margin:0px;font-family:arial,helvetica">
    <div class="container">
      <nav style="padding:1rem;clear:both">
        <a href="<?=base_url()?>"><img loading="lazy" src="<?=base_url("logo.png")?>" alt="<?=env('app.name')?>" style="height:45px"></a>
      </nav>
      <main style="min-height:60vh;padding:1rem;clear:both">      
        <?=$content?>
      </main>
      <footer style="padding:1rem;box-shadow:0px 0px 2px lightgrey; text-align:center;line-height:1.3rem">
        <?php foreach (["contact us","privacy policy","terms of use"] as $key):?>
          <a href="" style="display: inline-block;text-decoration: none;color:rgb(49, 48, 48);margin-right:1rem;text-transform:capitalize;" ><?=$key?></a>
        <?php endforeach ?>
        
        <div>
          <small style="color: #a5a5a5e7; font-size: 0.8rem; margin-bottom: 0.5rem;">You are receiving this email because you are using the <?=env('app.name')?> App.</small><br>
            <small >Copyright <?=date("Y")?> Uleval. All rights reserved.</small>
        </div>
      </footer>
    </div>
  </body>

</html>