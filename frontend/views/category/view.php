<?php 
 use yii\widgets\ListView;

$this->title = $modelCategory->category_name;
?>
<style>

    #title h1 {
        text-align: right;font-weight: bold;font-size: 25px;margin: 0;color:#fff;
    }

    #sidebara {
        width:250px;float:left;
    }

    #content {
        width:80%;float:right;padding-left:12px;
    }

    #title {
        width: 900px;height: 60px;float: right;
    }

    .clear:after {
        visibility: hidden;display: block;content: "";clear: both;height: 0;
    }

    nave {
        width:213px;background-color:#605CA8;border: 2px solid #4F4D4D;padding:0 12px;
    }

    nave.stickydiv {
        position: fixed;top: 0;z-index: 10000;margin-top:12px;
    }
    nave.stickydive {
        position: fixed;top: 100px;z-index: 10000;margin-top:12px;
    }
    nave ul {
        list-style-type:none;margin:0;padding:0;
    }

    nave li {
        padding:5px 10px;
    }

    nave li a {
        color:#fff;font-weight:700;line-height: 25px;
    }

    a{
        text-decoration:none;
    }

    .activea {
        color: #F99;text-decoration: none;
    }

    p{
        font-family:Verdana,Arial,Helvetica,sans-serif;
    }

</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(window).scroll(function () {
            var window_top = $(window).scrollTop();
            // the "12" should equal the margin-top value for nave.stickydiv
            var div_top = $('#checkdiv').offset().top;
            if (window_top >= div_top) {
                $('nave').removeClass('stickydive');
                $('nave').addClass('stickydiv');
            } else {
                $('nave').addClass('stickydive');
                $('nave').removeClass('stickydiv');
            }
        });

        $(document).on("scroll", onScroll);

        $('a[href^="#"]').on('click', function (e) {
            e.preventDefault();
            $(document).off("scroll");
            $('a').each(function () {
                $(this).removeClass('activea');
            })
            $(this).addClass('activea');
            var target = this.hash,
                    menu = target;
            $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top
            }, 600, 'swing', function () {
                window.location.hash = target;
                $(document).on("scroll", onScroll);
            });
        });
    });

    function onScroll(event) {
        var scrollPos = $(document).scrollTop();
        $('#sidebara a').each(function () {
            var currLink = $(this);
            var refElement = $(currLink.attr("href"));
            if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                $('#sidebara ul li a').removeClass("activea");
                currLink.addClass("activea");
            }
            else {
                currLink.removeClass("activea");
            }
        });
    }
</script>

<div id="wrapper">    
    <div class="pad box box-default no-border">        
        <div class="box-body">            
    <div id="maindiv">
        <div class="container">
            <div id="sidebara">
                <div id="checkdiv"></div>
                <nave class="stickydive">
                    <ul>               
                        <?=
                        ListView::widget([
                            'dataProvider' => $model,
                            'itemOptions' => ['class' => 'item'],
                            'itemView' => 'menu',
                            'summary'=>'',
                        ])
                        ?>    

                    </ul>           
                </nave>
            </div>
            <div id="content">
                 <?=
                        ListView::widget([
                            'dataProvider' => $model,
                            'itemOptions' => ['class' => 'item'],
                            'itemView' => 'view_detail',
                            'summary'=>'',
                        ])
                        ?>    
        </div>
            </div>
    
</div>
</div>
</div>


