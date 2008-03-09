

<div class="CFile CTopic" id=MainTopic><h1 class=CTitle><a name="Change Log"></a>Change Log</h1><div class=CBody>

<p class=CParagraph>
<?php

                $fp = fopen("./demo/ChangeLog.html", "r" );
                if(!$fp)
                {
                    echo "Couldn't open the data file. Try again later.";
                    exit;
                }
                $filename ="./demo/ChangeLog.html";
                $display_block .= fread( $fp, filesize( $filename ) );

                echo $display_block;
?>


</div></div>

</div><!--Content end-->
