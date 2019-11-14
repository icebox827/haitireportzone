<?php $flickr_id = pionusnews_get_option('pionusnews_flickr_id'); ?>
<script type="text/javascript">
(function($) {     

    var id='<?php echo esc_attr( $flickr_id ); ?>';
    var limit ='12';

    $.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?id=" + id + "&lang=en-us&format=json&jsoncallback=?", 

    function(data){$.each(data.items,

    function(i,item){
         
        if(i < limit){

        $("<img/>").attr("src", item.media.m.replace('_m', '_s')).appendTo("#flickr").wrap("<a href='" + item.media.m.replace('_m', '_z') + "' name='"+ item.link + "' title='" +  item.title +"'></a>");


        }

    }); 

    }); 

    })(jQuery);
</script>