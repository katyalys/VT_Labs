<HTML>
<HEAD>

    <TITLE>Send message with attachments</TITLE>

</HEAD>

<BODY>

<form enctype="multipart/form-data" method="POST" action="send.php">
    <label> Receiver Email <input type="email" name="email" pattern="[a-zA-Z0-9\.][a-zA-Z0-9_\.\-]*@[a-zA-Z0-9\.]+\.[a-zA-Z]{2,5}" required/> </label></br>
    <label>Subject <input type="text" name="subject"/> </label></br>
    <label>Message <textarea name="message"></textarea> </label></br>
    <label>Attachment <input type="file" name="file[]" id="file" multiple/></label></br>
    <table><tr><td><img src="captcha.php"></td><td><input type="text" name="capt" size="4" pattern="[0-9]{4}" required></td></tr></table><br>
    <label><input type="submit" name="button" value="Submit" /></label></br>
</form>

</BODY>
</HTML>