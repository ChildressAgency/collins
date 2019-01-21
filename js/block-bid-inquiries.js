registerBlockType( 'childress/bid-inquiries', {
    title: 'Bid Inquiries',
    icon: 'megaphone',
    category: 'custom-blocks',

    attributes: {
        title: {
            type: 'string',
            default: 'Bid Inquiries'
        }
    },

    edit( { attributes, className, setAttributes } ){
        const { title } = attributes;

        return (
            <div className={ className }>
                <h2>
                    <PlainText
                        value={ title }
                        onChange={ ( value ) => setAttributes({ title: value }) }
                    />
                </h2>
                <hr />
                <InnerBlocks
                    allowedBlocks={['childress/inquiry']}
                    template={[
                        ['childress/inquiry']
                    ]}
                />
            </div>
        );
    },

    save( { attributes } ) {
        const { title } = attributes;

        return (
            <div className="wp-block-childress-bid-inquiries">
                <div className="container">
                    <h2>{ title }</h2>
                    <hr />
                    <InnerBlocks.Content />
                </div>
            </div>
        );
    },
} );

registerBlockType( 'childress/inquiry', {
    title: 'Inquiry',
    icon: 'megaphone',
    category: 'custom-blocks',
    parent: ['childress/bid-inquiries'],

    attributes: {
        title: {
            type: 'string'
        },
        location: {
            type: 'string'
        },
        due: {
            type: 'string'
        },
        cost: {
            type: 'string'
        }
    },

    edit( { attributes, className, setAttributes } ){
        const { title, location, due, cost } = attributes;

        return (
            <div className="inquiry">
                <h3 class="inquiry__title">
                    <PlainText
                        value={ title }
                        onChange={ ( value ) => setAttributes({ title: value }) }
                        placeholder="Title"
                    />
                </h3>
                <p class="inquiry__location">
                    <PlainText
                        value={ location }
                        onChange={ ( value ) => setAttributes({ location: value }) }
                        placeholder="Location"
                    />
                </p>
                <p class="inquiry__info">
                    <PlainText
                        value={ due }
                        onChange={ ( value ) => setAttributes({ due: value }) }
                        placeholder="Due"
                    />
                </p>
                <p class="inquiry__info">
                    <PlainText
                        value={ cost }
                        onChange={ ( value ) => setAttributes({ cost: value }) }
                        placeholder="Cost"
                    />
                </p>
            </div>
        );
    },

    save( { attributes } ) {
        const { title, location, due, cost } = attributes;

        return (
            <div class="inquiry">
                <h3 class="inquiry__title">{ title }</h3>
                <p class="inquiry__location">{ location }</p>
                <p class="inquiry__info">Bids Due: { due }</p>
                <p class="inquiry__info">Estimated Cost: { cost }</p>
            </div>
        );
    },
} );