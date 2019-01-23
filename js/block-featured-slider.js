registerBlockType( 'childress/featured-slider', {
    title: 'Featured Slider',
    icon: 'format-gallery',
    category: 'custom-blocks',

    attributes: {
        bannerText: {
            type: 'string',
            src: 'text',
            selector: '.featured-slider-banner',
            default: 'FEATURED WORK'
        }
    },

    edit( { attributes, className, setAttributes } ) {
        const { bannerText } = attributes;

        return (
            <div className={ className }>
                <h2>
                    <PlainText
                        value={ bannerText }
                        onChange={ ( text ) => { setAttributes({ bannerText: text }) } }
                    />
                </h2>
                <InnerBlocks 
                    allowedBlocks={['childress/featured-slider-slide']}
                    template={[
                        ['childress/featured-slider-slide'],
                        ['childress/featured-slider-slide'],
                        ['childress/featured-slider-slide']
                    ]}
                />
            </div>
        );
    },

    save( { attributes } ) {
        const { bannerText } = attributes;

        return (
            <div className='wp-block-childress-featured-slider'>
                <h2 className='featured-slider-banner'>{ bannerText }</h2>
                <div className='featured-slider'>
                    <InnerBlocks.Content />
                </div>
            </div>
        );
    },
} );



registerBlockType( 'childress/featured-slider-slide', {
    title: 'Slide',
    icon: 'editor-contract',
    category: 'custom-blocks',
    parent: ['childress/featured-slider'],

    attributes: {
        backgroundUrl: {
            type: 'string',
        },
        backgroundId: {
            type: 'number'
        }
    },

    edit( { attributes, className, setAttributes } ) {
        const { backgroundUrl, backgroundId } = attributes;

        return (
            <div className={ className }>
                <p>Slide Image:</p>
                <MediaUpload
                    onSelect={ media => { setAttributes({ backgroundUrl: media.url, backgroundId: media.id }); } }
                    type="image"
                    value={ backgroundId }
                    render={ ({ open }) => (
                        <Button className={ backgroundId ? 'image-button' : 'button button-large' } onClick={ open }>
                            { backgroundId ? <img src={ backgroundUrl } /> : 'Select Image' }
                        </Button>
                    ) }
                />
            </div>
        );
    },

    save( { attributes } ) {
        const { backgroundUrl, backgroundId } = attributes;

        return (
            <div className='featured-slider__slide' style={{ backgroundImage: `url(${ backgroundUrl })` }}></div>
        );
    },
} );