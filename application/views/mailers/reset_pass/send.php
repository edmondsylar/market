<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body style="margin:0px; background: #f8f8f8; ">
    <div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
        <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
                <tbody>
                    <tr>
                        <td style="vertical-align: top; padding-bottom:30px;" align="center"><a href="{main_url}" target="_blank">
                        <img src="<?php echo $site_logo; ?>" alt="logo"></a> </td>
                    </tr>
                </tbody>
            </table>
            <div style="padding: 40px; background: #fff;">
                <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                    <tbody>
                        <tr>
                            <td style="border-bottom:1px solid #f6f6f6;">
                                <h1 style="font-size:14px; font-family:arial; margin:0px; font-weight:bold;">Hello! <?php echo $user_firstname . ' ' . $user_lastname; ?></h1>
                                <p style="margin-top:0px; color:#bbbbbb;">You have request to reset your password</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:10px 0 30px 0;">
                                <p>Use this as your temporary password <center><h1><?php echo $password; ?></h1></center>
                                <br>
                                
                                <b>- Thanks (<?php echo $site_name; ?> team)</b> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
                <p> Powered by <?php echo $site_name; ?>
            </div>
        </div>
    </div>
</html>