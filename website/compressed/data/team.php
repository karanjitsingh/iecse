<div style="position:absolute; bottom:10%; right:4%; width:70%; height:175px;">
    <style>
table.team{position:absolute;left:0px;top:0px}@-webkit-keyframes fadeInOutTeam2{0%{opacity:0}45%{opacity:0}50%{opacity:1}95%{opacity:1}100%{opacity:0}}@-webkit-keyframes fadeInOutTeam1{0%{opacity:1}45%{opacity:1}50%{opacity:0}95%{opacity:0}100%{opacity:1}}@-moz-keyframes fadeInOutTeam2{0%{opacity:0}45%{opacity:0}50%{opacity:1}95%{opacity:1}100%{opacity:0}}@-moz-keyframes fadeInOutTeam1{0%{opacity:1}45%{opacity:1}50%{opacity:0}95%{opacity:0}100%{opacity:1}}@keyframes fadeInOutTeam2{0%{opacity:0}45%{opacity:0}50%{opacity:1}95%{opacity:1}100%{opacity:0}}@keyframes fadeInOutTeam1{0%{opacity:1}45%{opacity:1}50%{opacity:0}95%{opacity:0}100%{opacity:1}}#team_1, table.page_dot td:nth-child(1) div{-webkit-animation:fadeInOutTeam1 10s ease-out;-webkit-animation-iteration-count:infinite;-moz-animation:fadeInOutTeam1 10s ease-out;-moz-animation-iteration-count:infinite;animation:fadeInOutTeam1 10s ease-out;animation-iteration-count:infinite;opacity:1}#team_2, table.page_dot td:nth-child(3) div{-webkit-animation:fadeInOutTeam2 10s ease-out;-webkit-animation-iteration-count:infinite;-moz-animation:fadeInOutTeam2 10s ease-out;-moz-animation-iteration-count:infinite;animation:fadeInOutTeam2 10s ease-out;animation-iteration-count:infinite;opacity:0}table.members{margin:0 auto 0 auto}table.members td{width:120px;padding:0 5px 0 5px;padding-bottom:0px}table.dev div.member_image{width:80px !important;height:80px !important}table.members div.member_image{width:90px;height:90px;display:block;margin:0 auto 0 auto;border:2px solid #fff;border-radius:1000px;margin-bottom:10px}table.members span{font-size:12px;color:#222;display:block;width:100%;padding:0px}table.members span.heading{color:#fff;font-size:24px;line-height:24px;padding:0px;display:block}
    </style>
    <div style="width:780px;margin:0 auto 0 auto; height:100%; position:relative; left:0px; top:0px;">
    <table class="team members" id="team_1">
        <?php


            $template = '<td style="padding-bottom:20px;"><div class="member_image" style="background:url(#image#); background-position:#imagepos#; background-size:#imagesize#"></div><span class="heading">#name#</span><span>#title#</span></td>';
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

            fclose($stream);

        ?>
    </table>
    <table class="team members" id="team_2">
        <?php


            $template = '<td style="padding-bottom:20px;"><div class="member_image" style="background:url(#image#); background-position:#imagepos#; background-size:#imagesize#"></div><span class="heading">#name#</span><span>#title#</span></td>';
            $stream = fopen("team.json", "r");
            $data = fread($stream, filesize("team.json"));

            $json = json_decode($data);


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
    <div style="height:7px; width:100%;">
        <table style="margin:0 auto 0 auto;" class="page_dot">
            <tr>
                <td style="height:8px; width:8px; border-radius:100px; box-shadow:0px 4px 7px rgba(0,0,0,0.5) inset;">
                    <div style="margin:1px; height:6px; width:6px; background:#f0f0f0; border-radius:100px; opacity: 1;"></div>
                </td>
                <td style="width:6px;"></td>
                <td style="height:8px; width:8px; border-radius:100px; box-shadow:0px 4px 7px rgba(0,0,0,0.5) inset; ">
                    <div style="margin:1px; height:6px; width:6px; background:#f0f0f0; border-radius:100px; opacity: 0;"></div>
                </td>
            </tr>
        </table>
    </div>
</div>##<div style="height:100%; width:100%;">
    <table class="dev members" style="height:100%;">
        <tr>
            <td style="vertical-align:middle; width:130px; font-size:24px; padding-right:60px;">Under The Hood</td>
            <?php


                $template = '<td><div class="member_image" style="background:url(#image#); background-position:#imagepos#; background-size:#imagesize#"></div><span class="heading">#name#</span><span>#title#</span></td>';
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