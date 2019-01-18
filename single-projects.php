<?php get_header(); ?>

    <div class="wp-block-childress-hero-box hero-box" style="background-image:url(http://dev.childressagency.com/collins/wp-content/uploads/2019/01/projects-heading.png)">
        <div class="wp-block-childress-hero-all hero-all hero-all--gradient">
            <div class="container">
                <div style="height:200px" aria-hidden="true" class="wp-block-spacer"></div>

                <h2 style="text-align:center">PROJECTS<br></h2>

                <div style="height:200px" aria-hidden="true" class="wp-block-spacer"></div>
            </div>
        </div>
    </div>

    <div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>

    <div class="wp-block-childress-container container container--thin">
        <div class="wp-block-columns has-3-columns">
            <div class="wp-block-column">
                <div class="wp-block-image"><figure class="aligncenter"><img src="http://dev.childressagency.com/collins/wp-content/uploads/2019/01/residential-icon-selected.png" alt="" class="wp-image-535"/></figure></div>
                <p style="font-size:24px;text-align:center">RESIDENTIAL</p>
            </div>
            <div class="wp-block-column">
                <div class="wp-block-image"><figure class="aligncenter"><img src="http://dev.childressagency.com/collins/wp-content/uploads/2019/01/commercial-icon.png" alt="" class="wp-image-332"/></figure></div>
                <p style="font-size:24px;text-align:center">COMMERCIAL</p>
            </div>
            <div class="wp-block-column">
                <div class="wp-block-image"><figure class="aligncenter"><img src="http://dev.childressagency.com/collins/wp-content/uploads/2019/01/public-infrastructure-icon.png" alt="" class="wp-image-333"/></figure></div>
                <p style="font-size:24px;text-align:center">PUBLIC &amp; INFRASTRUCTURE</p>
            </div>
        </div>
    </div>

    <?php if( have_posts() ): while( have_posts() ): the_post(); ?>
        <?php 
        global $post;
        $blocks = '';
        $projectTemplate = '';
        $inner = '';
        $attr = '';

        if( has_blocks( $post->post_content ) ){
            $blocks = parse_blocks( $post->post_content );
        } 

        if( $blocks ){
            foreach( $blocks as $block ){
                if( 'childress/project-template' == $block['blockName'] ){
                    $projectTemplate = $block;

                    $inner = $block['innerBlocks'];
                }
            }
        }

        if( $projectTemplate ){
            $attr = $projectTemplate['attrs'];
        } ?>

        <div class="project">
            <div class="container">
                <h2 class="project__about-this">About this Project</h2>
                <p class="project__breadcrumbs">HOME / RESIDENTIAL / <?php echo strtoupper( get_the_title() ); ?></p>
                <hr />

                <div class="project__info">
                    <div class="project__info-text">
                        <h3 class="project__title"><?php echo get_the_title(); ?></h3>
                        <p class="project__location"><?php echo $attr['location']; ?></p>
                        <p class="project__misc"><?php echo $attr['info']; ?></p>
                    </div>
                    <div class="project__info-image">
                        <img src="<?php echo $attr['imageUrl']; ?>" alt="<?php echo $attr['imageAlt']; ?>" />
                    </div>
                </div>

                <hr />
            </div>

            <div class="container container--thin">
                <p class="project__description"><?php echo $attr['description']; ?></p>
            </div>

            <?php if( $inner ): ?>
                <div class="container">
                    <h2 class="project__gallery-heading">Project Gallery</h2>
                    <hr />
                    
                    <div class="project__gallery">
                        <?php foreach( $inner as $block ){ ?>
                            <?php echo $block['innerHTML']; ?>
                        <?php } ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    <?php endwhile; endif; ?>

<?php get_footer(); ?>