<form id="bcdlsearchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div class="input-group input-group-lg">
    <input id="bcdlsearchinput" type="text" class="form-control" name="s" placeholder="<?php echo esc_html__( 'Search the site', 'bcdlblue' ); ?>" aria-label="<?php _e( 'Search the site', 'bcdlblue' ); ?>" aria-describedby="button-addon2" value="<?php echo get_search_query(); ?>">
    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">

      <svg id="ii-search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="18" height="18" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
        <circle cx="14" cy="14" r="12" />
        <path d="M23 23 L30 30"  />
      </svg>

    </button>
  </div>
</form>