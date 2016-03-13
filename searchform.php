<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
    <label class="screen-reader-text" for="s"></label>
    <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Search"/>
    <button type="submit" id="searchsubmit" value="" class="fa fa-search""/></button>
</form>