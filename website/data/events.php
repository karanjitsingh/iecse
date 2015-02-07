<style>
    #poster_container {
        position:absolute;
    }
    #poster_container .poster {
        height: 100%;
        width: auto;
        background-size: cover;
        transform-origin: 50% 50%;
        cursor: pointer;
        position: relative;
    }

    #poster_container .animate {
        transition:opacity ease-out 0.4s, transform ease-out 0.4s, margin-left ease-out 1s ;
    }

    #poster_container .poster img {
        max-height: 100%;
    }

    #poster_page img {
        height:500px;
    }

    #poster_container .poster div.tape {
        background: url(/res/tape.png);
        background-size: cover;
        position: absolute;
    }
    #poster_container div.zoom {
        
        height:2500px !important;
        width:2500px !important;
        margin-left:-1250px !important;
        margin-top:-1250px !important;
    }

    #zoom_container div {
        transition:all ease-in 0.2s;
    }

    #zoom_container {
        position: absolute; width: 0px; height: 0px; left: 50%;top: 50%;
    }

    #zoom_container div{
        border-radius:500%;margin-left:0px;margin-top:0px; width:0px; height:0px; background:rgba(0,0,0,0.8); cursor:default;
    }
    #poster_page {
        position:fixed; height:100%; width:100%; display:none; z-index:1;
        opacity: 0;
        transition:opacity ease-out 0.4s;
    }
    #poster_page.visible {
        display:block;
        opacity: 1;
    }

    .poster_close {
        position: absolute;
        top: 50px;
        height: 30px;
        width: 30px;
        right: 50px;
        cursor: pointer;
    }

    .poster_close svg {
        height:100%;
        width:100%;
    }

    .arrow_container a:visited svg,.arrow_container a:active svg, .arrow_container a svg {
        fill:#fff;
        stroke:#fff;
        opacity:0.3;
        transition:opacity ease-out 0.1s;
        cursor:pointer;
    }

    .arrow_container a:hover svg {
        opacity:0.8;
    }
</style>
<div style="height:100%; width:100%;" id="poster_container">
        <div style="position:absolute; right:16%; bottom:30px; height:65%;">
            
            <?php
                $template='<div class="poster" onclick="zoomInEventPage(this)" selected="#selected#" style="cursor:#cursor#; z-index:#zindex#; opacity:#opacity#; transform: rotate(#rotate#deg); top:-#i#00%;">
                    <img src="#image#"/>
                    <div class="tape" style="height: 20px; width: 55px; left: -20px; top: 0px; transform: rotate(-40deg);"></div>
                    <div class="tape" style="height: 20px; width: 45px; right: -15px; top: 0px; transform: rotate(50deg);"></div>
                    <div class="tape" style="height: 20px; width: 50px; right: -20px; transform: rotate(130deg); bottom: 0px;"></div>
                    <div class="tape" style="height: 20px; width: 55px; left: -20px; bottom: 0px; transform: rotate(40deg);"></div>

                </div>';
                $stream = fopen("events.json", "r");
                $data = fread($stream, filesize("events.json"));

                $json = json_decode($data);
                $json = $json->events;

                for($i=0;$i < count($json); $i++)
                {
                    $poster = $template;
                    if($i==count($json)-1)
                    {
                        $poster=str_replace("#opacity#", 1 , $poster);
                        $poster=str_replace("#zindex#", 1 , $poster);
                        $poster=str_replace("#cursor#", "pointer" , $poster);
                        $poster=str_replace("#selected#", "true" , $poster);
                    }
                    else
                    {
                        $poster=str_replace("#opacity#", 0 , $poster);
                        $poster=str_replace("#zindex#", "initial" , $poster);

                        $poster=str_replace("#cursor#", "default" , $poster);
                        $poster=str_replace("#selected#", "false" , $poster);
                    }
                    $poster=str_replace("#opacity#", 0 , $poster);
                    $poster=str_replace("#image#", $json[$i]->image , $poster);
                    $poster=str_replace("#rotate#", 5 * pow(-1,$i) , $poster);
                    $poster=str_replace("#i#", $i , $poster);
                    echo $poster;
                }


                $arrow='<div style="height:100%; width:100%; position:relative; top:-#i#00%;" class="arrow_container">
                    <div style="bottom:40px; height:100%; width:30px; float:left; margin-left:-100px;">
                        <div style="width:100%; position:relative; top:50%; margin-top:-100%;">
                            <a onclick="prevPoster()">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" id="Layer_1"
                                    x="0px" y="0px" viewBox="0 0 70 120" style="width:100%;" enable-background="new 0 0 32 32" xml:space="preserve">
                                    <path d="M 60 10 l -50 50 l 50 50 l 0 -100 z" stroke-width="20" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div style="bottom:40px; height:100%; width:30px; float:right; margin-right:-100px;">
                        <div style="width:100%; position:relative; top:50%; margin-top:-100%;">
                            <a onclick="nextPoster()">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" id="Layer_1"
                                    x="0px" y="0px" viewBox="0 0 70 120" style="width:100%;" enable-background="new 0 0 32 32" xml:space="preserve">
                                    <path d="M 10 10 l 50 50 l -50 50 l 0 -100 z" stroke-width="20" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>';

                $arrow=str_replace("#i#", count($json) , $arrow);
                echo$arrow;

            ?>
            
        </div>

        

        <div id="zoom_container">
            <div></div>
        </div>
    </div>

</div>


<div id="poster_page">
    <?php
        $template='<table class="poster_table" style="margin:5% auto 0 auto; box-sizing:border-box; height:80%; display:#display#;">
            <tr>
                <td>
                    <a target="_blank" href="#url#"><img src="#image#"></img></a>
                </td>
                <td style="padding-left: 30px;">
                    #description#
                </td>
            </tr>
        </table>';

        for($i=0;$i < count($json); $i++)
        {
            $poster=$template;
            if($i==count($json)-1)
                $poster=str_replace("#display#", "table" , $poster);
            else
                $poster=str_replace("#display#", "none" , $poster);
            $poster=str_replace("#image#", $json[$i]->image , $poster);
            $poster=str_replace("#description#", $json[$i]->description , $poster);
            $poster=str_replace("#url#", $json[$i]->url , $poster);
            
            echo $poster;
        }
    ?>
    <div class="poster_close" onclick="zoomOutEventPage()">
        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 700 700" xml:space="preserve">
            <line x1="0" y1="600" x2="700" y2="100.02970159603177" style="stroke:#fff;stroke-width:100"></line>
            <line x1="0" y1="100" x2="700" y2="599.9702984039683" style="stroke:#fff;stroke-width:100"></line>
        </svg>
    </div>
</div>
<!--<div style="position:absolute; bottom:20px; left:55%; width:45%">
    <style>
        table.events {
            margin: 0 auto 0 auto;
        }
    	table.events td {
    		height:150px;
            width: 150px;
            padding: 0 5px 0 5px;
            vertical-align: top;
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

                fclose($stream);

            ?>
        </tr>
</table>
</div>-->
