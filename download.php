<?php
$p = "{$_SERVER_REQUEST['HTTP_HOST']}/tp/downloads.php";
header("Cache-Control: public, max-age=29030400");
header("Location: $p");
header("Refresh: 0; URL=$p",1);
header('Accept-Encoding: gzip,deflate',1);
header('Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7',1);
header('Keep-Alive: 300',1);
header('Connection: keep-alive',1);

?>
<HTML>
        <HEAD>

		<TITLE>Automatic Redirection - Thousand Parsec</TITLE>
                <META HTTP-EQUIV="Refresh" CONTENT="0;URL=<?php echo $p; ?>">
                
		<SCRIPT LANGUAGE="JavaScript"><!--
                        function redirect () { setTimeout("go_now()",10); }
                        function go_now ()   { window.location.href = "<?php echo $p; ?>"; }
                //--></SCRIPT>

        </HEAD>

        <BODY onLoad="redirect()">
                <P>
                        <A HREF="<?php echo $p; ?>">
                                Please click here if you are not redirected within a couple of seconds.
                        </A>
                </P>
        </BODY>

</HTML>
