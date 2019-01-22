registerBlockType( 'childress/contacts', {
    title: 'Contacts',
    icon: 'groups',
    category: 'custom-blocks',

    attributes: {
        title: {
            type: 'string',
            default: 'Contacts'
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
                <InnerBlocks
                    allowedBlocks={['childress/contact']}
                    template={[
                        ['childress/contact']
                    ]}
                />
            </div>
        );
    },

    save( { attributes } ) {
        const { title } = attributes;

        return (
            <div className="wp-block-childress-contacts">
                <div className="container">
                    <h2>{ title }</h2>
                    <InnerBlocks.Content />
                </div>
            </div>
        );
    },
} );

registerBlockType( 'childress/contact', {
    title: 'Contact',
    icon: 'businessman',
    category: 'custom-blocks',
    parent: ['childress/contacts'],

    attributes: {
        name: {
            type: 'string'
        },
        title: {
            type: 'string'
        },
        email: {
            type: 'string'
        }
    },

    edit( { attributes, className, setAttributes } ){
        const { name, title, email } = attributes;

        return (
            <div className="contact">
                <h4 className="inquiry__name">
                    <PlainText
                        value={ name }
                        onChange={ ( value ) => setAttributes({ name: value }) }
                        placeholder="Name"
                    />
                </h4>
                <p className="inquiry__title">
                    <PlainText
                        value={ title }
                        onChange={ ( value ) => setAttributes({ title: value }) }
                        placeholder="Title"
                    />
                </p>
                <p className="inquiry__email">
                    <PlainText
                        value={ email }
                        onChange={ ( value ) => setAttributes({ email: value }) }
                        placeholder="email@example.com"
                    />
                </p>
            </div>
        );
    },

    save( { attributes } ) {
        const { name, title, email } = attributes;

        return (
            <div className="contact">
                <h4 className="contact__name">{ name }</h4>
                <p className="contact__title">{ title }</p>
                <a href={ "mailto:" + email } className="contact__email">{ email }</a>
            </div>
        );
    },
} );