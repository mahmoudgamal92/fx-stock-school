

function proceed_to_pay(id)
{
	if(id == 1)
	{
		location.href="subscribe.php?package="+id;
	}
	else{
		location.href="confirm.php?package="+id;
	}
}