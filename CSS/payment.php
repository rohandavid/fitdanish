<?php





?>


<!DOCTYPE html>
<html>
<head>
	<title>Payment Portal</title>
</head>
<body>


<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<table>
<tr><td><input type="hidden" name="on0" value="Select Your Plan">Select Your Plan</td></tr><tr><td><select name="os0">
	<option value="Meal-Plan">Meal-Plan $37.00 USD</option>
	<option value="Workout-Plan">Workout-Plan $33.00 USD</option>
	<option value="Combo-Plan">Combo-Plan $62.00 USD</option>
</select> </td></tr>
</table>
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>

</body>
</html>
