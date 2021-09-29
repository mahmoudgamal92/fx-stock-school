<?php
session_start();
include_once 'components/dbconnect.php';
include "lang/config.php";
?>

<?php
$id = $_GET['package'];
$cmd = "select * from packages where id = '$id'";
$res = mysqli_query($con,$cmd);
$package_info = mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html>
<head>
    <title>billing</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style type="text/css">
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        @media screen and (max-width: 480px) {
            .mobile-hide {
                display: none !important;
            }

            .mobile-center {
                text-align: center !important;
            }
        }

        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>

    <body>
    <table width="100%" style="margin-top:50px">
            <td>
                <table align ="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:800px;">

                    <tr>
                        <td align="center" valign="top" style="font-size:0; padding: 35px;" bgcolor="#000026">
                            <div style="display:inline-block;vertical-align:top; width:100%;">
                                <table align="left" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td  valign="top" style="font-size: 36px;" class="mobile-center" >
                                            <h1 style="font-size: 36px; font-weight: 800; margin: 0; color: #ffffff;width:100%">
                                             Confirmation Bill
                                        </h1>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:750px;">
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                      
                                        <tr>
                                                <td colspan="2" width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> 
                                                <span>Subscription Date # </span>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                                <span>Package Name</span>
                                        
                                                </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                                <span> <?php echo $package_info['name_ar'];?>
                                                 </td>
                                            </tr>

                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                                <span>
                                            Statrts At :
                                            </span>
                                                </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                            <span><?php
                                            echo  date("Y/m/d");
                                            ?></span>
                                                 </td>
                                            </tr>
                                            <tr>
                                                <td width="75%" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;  text-align:left">
                                            <span>Ends At :</span>
                                                </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                                <span>
                                              <?php
                                    echo date("Y/m/d",strtotime("+".$package_info['subscribe_time']."Days")) ;
                                              ?>
                                              </span>
                                                 </td>
                                            </tr>
                                      
                                      
                                      
                                            <tr>
                                                <td colspan="2"  width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                                 Order Details#
                                                  </td>
                                               
                                            </tr>
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                               Price
                                                </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                                <?php
                                           echo $package_info['price']."  EGP";
                                                ?>
                                               
                                                 </td>
                                            </tr>
                                          
                                          
                              
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td  style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td width="75%" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> Total After Discount</td>
                                                <td width="25%"  style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> 
                                                <span id="discount_price">
                                                <?php
                                                echo $package_info['price']."  EGP";
                                                ?>
                                               </span>
                                            </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100%"  style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;text-align:center"> 
                                        <form method='post' action = "payment/auth.php">
                                         <input name="price" id="form_price" type="hidden" 
                                         value="<?php echo $package_info['price']; ?>"/>
                                       <button type="submit" class="btn btn-danger">
                                       Proceed to Payment
                                       </button>
                                       </form>
                                            </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>                                   
                 </table>
                        </td>
                    </tr>
                   
                </table>
            </td>
        </tr>
    </table>
   
</body>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'>
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
</html>