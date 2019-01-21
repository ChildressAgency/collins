<?php get_header(); ?>

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
        } 

        $terms = get_the_terms( $post->ID, 'project-category' ); ?>

        <div class="project">
            <div class="container">
                <h2 class="project__about-this">About this Project</h2>
                <p class="project__breadcrumbs">HOME / <?php echo strtoupper( $terms[0]->name ); ?> / <?php echo strtoupper( get_the_title() ); ?></p>
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
