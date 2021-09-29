<?php
include_once './../../../components/dbconnect.php';

$key = $_POST['key'];
function update_val($val,$param)
{
    $con = new mysqli('localhost','root','','fxstockschool') 
    or die ("connection erorr".mysqli_error($con));
    $con->query('SET NAMES UTF8');
    $con->query('SET CHARACTER SET UTF8');   

    $cmd = "update settings set value = '$val' where title = '$param'";
    if(mysqli_query($con,$cmd))
    {
        header("Location:./../../settings.php?updated=true");
    } 
    else{
        die( "could not insert news right now : ". mysqli_error($con));
        }

}
switch ($key) {

  case "slider_1":
    update_val($_POST['slider1_title_ar'] , slider1_title_ar);
    update_val($_POST['slider1_title_en'] , slider1_title_en);
    update_val($_POST['slider1_desc_ar'] , slider1_description_ar);
    update_val($_POST['slider1_desc_en'] , slider1_description_en);
    break;

    case "slider_2":
    update_val($_POST['slider2_title_ar'] , slider2_title_ar);
    update_val($_POST['slider2_title_en'] , slider2_title_en);
    update_val($_POST['slider2_desc_ar'] , slider2_description_ar);
    update_val($_POST['slider2_desc_en'] , slider2_description_en);
    break;
        
    case "social_media":
    update_val($_POST['instagram'] , instagram);
    update_val($_POST['facebook'] , facebook);
    update_val($_POST['youtube'] , youtube);
    update_val($_POST['telegram'] , telegram);
    break;


    case "contact_info":
    update_val($_POST['office_address_ar'] , office_address_ar);
    update_val($_POST['office_address_en'] , office_address_en);
    update_val($_POST['contact_email'] , contact_email);
    update_val($_POST['working_hours'] , working_hours);
    update_val($_POST['mobile_phone'] , mobile_phone);
    break;

    case "company_vision":
        update_val($_POST['company_vision_ar'] , company_vision_ar);
        update_val($_POST['company_vision_en'] , company_vision_en);
        break;


        case "tax":
            update_val($_POST['tax_tegistration'] , tax_tegistration);
            update_val($_POST['commercial_register'] , commercial_register);
            break;

   default:
   header("Location:./../../settings.php?updated=false");
}
?>