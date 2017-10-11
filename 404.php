<?php get_header(); ?>
<div class="content">
    <div class="breadcrumb-area gray-bg text-center ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <h2 class="page-cat"><?php esc_html_e( 'Not Found', 'nora' ); ?></h2>
                        <p><?php esc_html_e( 'Page Not Found', 'nora' ); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nora-standard-row white-bg ptb-150">
        <div class="container">
            <div class="row">
            	<div class="col-md-12">
            		<div class="not-found-content text-center">
            			<h1><?php esc_html_e( '404', 'nora' ); ?></h1>
            			<p class="mb-40"><?php esc_html_e( 'Ooopps. The page you were looking for, could not be found.', 'nora' ); ?></p>
						<a href="<?php echo get_home_url(); ?>" class="button medium"><?php esc_html_e( 'Home', 'nora' ); ?></a>
            		</div>
            	</div>
            </div>
        </div>
    </div>    
</div>
<?php get_footer(); ?>