<div style="position:absolute; bottom:20px; left:55%; width:45%">
    <style>
        table.events {
            margin: 0 auto 0 auto;
        }
    	table.events td {
    		width:110px;
    		height:150px;
            padding: 0 5px 0 5px;
    	}

    	table.events div.event_image {
    		width:90px;
    		height:90px;
    		display:block;
    		margin:0 auto 0 auto;
    		border:2px solid #fff;
    		border-radius:1000px;
            margin-bottom: 10px;

    	}

    	table.events a {
    		display:block;
    	}

        table.events span {
            font-size:12px;
            color:#222;
            display:inline-block;
            width:100%;
        }

        table.events span.heading {
            color:#fff;
            font-size: 24px;
            line-height: 24px;
            padding: 0px;
        }

        table.events span.heading div{
            background: url(/res/white-star.svg) no-repeat;
            background-size: 22px auto;
            background-position: 0px 2px;
            height: 22px;
            width:24px;
            display:none;
        }
        table.events td.featured span.heading div{
            display:inline-block;
        }
    </style>
    <table class="events">
        <tr>
            <?php

                $template = '<td #featured#><a href="#url#"><div class="event_image" style="background:url(#image#); background-position:#imagepos#; background-size:#imagesize#"></div><span class="heading"><div></div>#name#</span><span>#description#</span></a></td>';
                $stream = fopen("events.json", "r");
                $data = fread($stream, filesize("events.json"));

                $json = json_decode($data);
                $json = $json->events;

                for($i=0;$i < count($json); $i++)
                {
                    $event = $template;
                    if($json[$i]->featured == "true")
                        $event = str_replace("#featured#", 'class="featured"', $event);
                    $event = str_replace("#url#", $json[$i]->url, $event);
                    $event = str_replace("#image#", $json[$i]->image, $event);
                    $event = str_replace("#imagepos#", $json[$i]->imagepos, $event);
                    $event = str_replace("#imagesize#", $json[$i]->imagesize, $event);
                    $event = str_replace("#name#", $json[$i]->name, $event);
                    $event = str_replace("#description#", $json[$i]->description, $event);

                    echo $event;
                }

            ?>
        </tr>
</table>
</div>