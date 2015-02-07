<div style="position:absolute; bottom:20px; right:2%; width:75%; height:275px;">
    <style>
        table.team{position:absolute;left:0;top:0}table.team td{width:145px!important;vertical-align:top}table.members{margin:0 auto}table.members td{width:140px;padding:0 5px}table.dev div.member_image{width:80px!important;height:80px!important}table.members div.member_image{width:80px;height:80px;display:block;margin:0 auto 10px;border:2px solid #fff;border-radius:1000px}table.members span{font-size:12px;color:#222;display:block;width:100%;padding:0}table.members span.heading{color:#fff;font-size:24px;line-height:24px;padding:0;display:block}
    </style>
    <div style="width:920px;margin:0 auto 0 auto; height:100%; position:relative; left:0px; top:0px;">
    <table class="team members">
        <?php


            $template = '<td><div class="member_image" style="background:url(#image#); background-position:#imagepos#; background-size:#imagesize#"></div><span class="heading">#name#</span><span>#title#</span></td>';
            $stream = fopen("team.json", "r");
            $data = fread($stream, filesize("team.json"));

            $json = json_decode($data);

            echo "<tr>";
            for($i=0;$i < count($json->team->row1); $i++)
            {
                $member = $template;
                $member = str_replace("#image#", $json->team->row1[$i]->image, $member);
                $member = str_replace("#imagepos#", $json->team->row1[$i]->imagepos, $member);
                $member = str_replace("#imagesize#", $json->team->row1[$i]->imagesize, $member);
                $member = str_replace("#name#", $json->team->row1[$i]->name, $member);
                $member = str_replace("#title#", $json->team->row1[$i]->title, $member);
                echo $member;
            }
            echo "</tr>";

            echo "<tr>";
            for($i=0;$i < count($json->team->row2); $i++)
            {
                $member = $template;
                $member = str_replace("#image#", $json->team->row2[$i]->image, $member);
                $member = str_replace("#imagepos#", $json->team->row2[$i]->imagepos, $member);
                $member = str_replace("#imagesize#", $json->team->row2[$i]->imagesize, $member);
                $member = str_replace("#name#", $json->team->row2[$i]->name, $member);
                $member = str_replace("#title#", $json->team->row2[$i]->title, $member);

                echo $member;
            }
            echo "</tr>";
            fclose($stream);
        ?>
    </table>
    </div>
</div><!--<div style="height:100%; width:100%;">
    <table class="dev members" style="height:100%;">
        <tr>
            <td style="vertical-align:middle; width:130px; font-size:24px; padding-right:60px;">Under The Hood</td>
            <?php


                $template = '<td><span class="heading">#name#</span><span>#title#</span></td>';
                $stream = fopen("team.json", "r");
                $data = fread($stream, filesize("team.json"));

                $json = json_decode($data);

                $json=$json->dev;
                for($i=0;$i < count($json); $i++)
                {
                    $member = $template;
                    $member = str_replace("#image#", $json[$i]->image, $member);
                    $member = str_replace("#imagepos#", $json[$i]->imagepos, $member);
                    $member = str_replace("#imagesize#", $json[$i]->imagesize, $member);
                    $member = str_replace("#name#", $json[$i]->name, $member);
                    $member = str_replace("#title#", $json[$i]->title, $member);
                    echo $member;
                }
            ?>
        </tr>
    </table>
</div>-->