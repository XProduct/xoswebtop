<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Update Name</title>
</head>

<body>
<h1>Edit Your Name</h1>

<form action="process.php" method="POST">
<table align="left" border="0" cellspacing="0" cellpadding="3">
<tr>
	<td>Current Password:</td>
    <td><input type="password" name="curpass" maxlength="30" value="
    <?echo $form->value("curpass"); ?>"></td>
    <td><? echo $form->error("curpass"); ?></td>
</tr>
<tr>
    <td>New Password:</td>
    <td><input type="password" name="newpass" maxlength="30" value="
    <? echo $form->value("newpass"); ?>"></td>
    <td><? echo $form->error("newpass"); ?></td>
</tr>
<tr>
    <td>Email:</td>
    <td><input type="text" name="email" maxlength="50" value="
    <?
    if($form->value("email") == ""){
       echo $session->userinfo['email'];
    }else{
       echo $form->value("email");
    }
    ?>">
    </td>
    <td><? echo $form->error("email"); ?></td>
</tr>
</table>
    <a href="manage.php">Cancel</a>
    <input type="submit" value="Change Name"></td></tr>
</form>


</body>
</html>